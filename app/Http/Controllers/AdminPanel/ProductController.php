<?php

namespace App\Http\Controllers\AdminPanel;

use Flash;
use App\Models\Size;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Style;
use App\Models\Weight;
use App\Models\Product;
use App\Mail\MyTestMail;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ProductGallery;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AppBaseController;
use App\Repositories\AdminPanel\ProductRepository;
use App\Http\Requests\AdminPanel\CreateProductRequest;
use App\Http\Requests\AdminPanel\UpdateProductRequest;
use App\Mail\ChargeYourBalanceMail;
use App\Mail\ProductApproveMail;
use App\Mail\TestMail;
use App\Models\UserTransactions;

class ProductController extends AppBaseController
{
    /** @var  ProductRepository */
    private $productRepository;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepository = $productRepo;
    }

    public function index(Request $request)
    {
        $products = Product::get();

        return view('adminPanel.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::active()->get();

        return view('adminPanel.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $input['admin_id'] = auth()->id();

        $product = $this->productRepository->create($input);

        foreach ($request->photo as $photo) {

            ProductGallery::create([
                'product_id' => $product->id,
                'photo' => $photo
            ]);
        }


        Flash::success(__('messages.saved', ['model' => __('models/products.singular')]));

        return redirect(route('adminPanel.products.index'));
    }

    public function show($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error(__('messages.not_found', ['model' => __('models/products.singular')]));

            return redirect(route('adminPanel.products.index'));
        }

        return view('adminPanel.products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = $this->productRepository->find($id);

        $categories = Category::active()->get()->pluck('name', 'id');



        if (empty($product)) {
            Flash::error(__('messages.not_found', ['model' => __('models/products.singular')]));

            return redirect(route('adminPanel.products.index'));
        }

        return view('adminPanel.products.edit', compact('categories', 'product'));
    }

    public function update($id, Request $request)
    {
        $product = Product::find($id);
        $owner = $product->owner;
        // dd($deposit);
        $validated = $request->validate([
            'category_id' => 'required',
            'start_bid_price' => 'required',
            'min_bid_price' => 'required',
        ]);

        $deposit = $request->start_bid_price / 100 * 10;

        if (empty($product)) {
            Flash::error(__('messages.not_found', ['model' => __('models/products.singular')]));

            return redirect(route('adminPanel.products.index'));
        }

        $validated['deposit'] = $deposit;
        if ($owner->balance < $deposit) {
            Session::flash('error', "User don't have enough balance . The user balance is [ $owner->balance ] and required deposit is [ $deposit ] . you can change start price or ");
            $product->update($validated);
            return back();
        }

        $owner->decrement('balance', $deposit);

        $validated['approved_at'] = now();
        $validated['end_at'] = now()->addDays(5);
        $validated['status'] = 1;
        $product->update($validated);
        $owner->transactions()->create([
            'user_id' => $owner->id,
            'value' => -$deposit,
            'action' => 2,
        ]);
        $product->deposit()->sync([$owner->id => ['deposit' => $deposit]]);


        Flash::success(__('messages.updated', ['model' => __('models/products.singular')]));

        Mail::to($owner->email)->send(new ProductApproveMail($product));

        return redirect(route('adminPanel.products.index'));
    }

    public function destroy($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error(__('messages.not_found', ['model' => __('models/products.singular')]));

            return redirect(route('adminPanel.products.index'));
        }

        $this->productRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/products.singular')]));

        return redirect(route('adminPanel.products.index'));
    }
    public function destroyImage($imageId)
    {
        $image = ProductGallery::find($imageId);

        $image->delete($imageId);

        Flash::success(__('messages.deleted', ['model' => __('models/products.singular')]));

        // return redirect(route('adminPanel.products.index'));
        return back();
    }


    public function approve($id)
    {
        $product = Product::find($id);
        $product->update(['approved_at' => now(), 'end_at' => now()->addDays(3), 'status' => 1]);

        return back();
    }


    public function balanceMail($id)
    {
        $product = Product::find($id);
        $owner = $product->owner;
        Mail::to($owner->email)->send(new ChargeYourBalanceMail($product, $owner));
        Flash::success('Email sent successfuly', ['model' => __('models/products.singular')]);
        return back();
    }
}
