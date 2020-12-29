<?php

namespace App\Http\Controllers\API;

use App\Events\ProductDetails;
use App\Events\UserActiveBids;
use App\Models\Faq;
use App\Models\File;
use App\Models\Page;
use App\Models\User;
use App\Models\Slider;
use App\Models\Contact;
use App\Models\Deposit;
use App\Models\Product;
use App\Models\Category;
use App\Models\Newsletter;
use App\Models\SocialLink;
use App\Helpers\MailsTrait;
use App\Models\FaqCategory;
use App\Models\Information;
use Illuminate\Http\Request;
use App\Models\ProductReview;
use App\Models\ProductGallery;
use Illuminate\Support\Facades\DB;
use App\Helpers\HelperFunctionTrait;
use App\Http\Controllers\Controller;
use App\Mail\ProductDeliveredMail;
use App\Mail\ProductReceivedMail;
use App\Models\Meta;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Builder;

class HomeController extends Controller
{
    use HelperFunctionTrait, MailsTrait;

    public function test()
    {
        return ('test home');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['msg' => __('lang.wrongCredential')], 401);
        } else {
            $user = auth('api')->user();
            if ($user->status == 'Inactive') {
                return response()->json(['msg' => __('lang.notActive')], 403);
            }
            if (!$user->approved_at) {
                return response()->json(['msg' => __('lang.notApproved')], 403);
            }
        }

        $user = auth('api')->user();

        return response()->json(compact('user', 'token'));
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'address' => 'required',
            'identification' => 'required|image',
        ]);
        $validated['code'] = strtoupper($request->first_name[0]) . strtoupper($request->last_name[0]) .  $this->randomCode(4);
        $user = User::create($validated);

        return response()->json(['msg' => 'ok']);
    }

    public function updatePersonalInformation(Request $request)
    {
        $data = $request->validate([
            'phone' => 'required|numeric',
            "address" => "required|string|min:3|max:191",
        ]);

        $user = auth('api')->user();

        $user->update($data);

        return response()->json(compact('user'));
    }

    public function updatePassword(Request $request)
    {
        $user = auth('api')->user();
        $password = $request->validate(['password' => 'required|string|min:6|confirmed']);
        if (Hash::check(request('old_password'), $user->password)) {

            $user->update($password);

            return response()->json(['msg',  'success']);
        }

        return response()->json(['msg',  'Wrong old password']);
    }

    public function logout()
    {
        auth('api')->logout();

        return response()->json(['msg' => __('lang.logoutMsg')]);
    }

    public function home()
    {
        $sliders = Slider::active()->inOrderToWeb()->get();
        $categories = Category::get();
        $products = Product::where('end_at', '>', now())->limit(9)->get();

        return response()->json(compact('sliders', 'categories', 'products'));
    }

    public function reviews()
    {
        $reviews = ProductReview::where('in_home', 1)->with('user')->get();

        return response()->json(compact('reviews'));
    }

    public function informations()
    {
        $informations = Information::get();

        $phone = $informations->where('id', 1)->first()->value;
        $phone2 = $informations->where('id', 2)->first()->value;
        $email = $informations->where('id', 3)->first()->value;
        $address = $informations->where('id', 4)->first()->value;

        $social = SocialLink::get();

        $facebook = $social->where('id', 1)->first()->link;
        $twitter = $social->where('id', 2)->first()->link;
        $instagram = $social->where('id', 3)->first()->link;
        $linkedIn = $social->where('id', 4)->first()->link;

        return response()->json(compact('phone', 'phone2', 'email', 'address', 'facebook', 'twitter', 'instagram', 'linkedIn'));
    }

    public function sendContactMessage(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:191',
            'email' => 'required|email|min:3|max:191',
            'phone' => 'required',
            'message' => 'required|string|min:3',
        ]);
        Contact::create($validated);

        return response()->json(['msg' => 'success']);
    }

    public function newsletter(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|min:3|max:191|unique:newsletters,email',
        ]);
        Newsletter::create($validated);

        return response()->json(['msg' => 'success']);
    }

    public function createProduct(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3',
            'category_id' => 'required',
            'description' => 'required|string|min:3',
            'min_price' => '',
            'number_of_items' => 'required',
            'category_id' => 'required',
            'photos' => 'required|array|min:6',
            'photos.*' => 'image',
        ]);

        $validated['user_id'] = auth('api')->id();
        $validated['code'] = uniqid();
        $product = Product::create($validated);

        foreach ($request->photos as $photo) {

            ProductGallery::create([
                'product_id' => $product->id,
                'photo' => $photo
            ]);
        }

        return response()->json(['msg' => 'success']);
    }

    public function categories()
    {
        $categories = Category::get();

        return response()->json(compact('categories'));
    }

    public function products(Request $request)
    {

        $perPage = request()->filled('per_page') ? request('per_page') : 9;

        $productsQuery = Product::where('end_at', '>', now());

        if ($request->filled('sort') == 'name') {
            $productsQuery->orderBy('name');
        } elseif ($request->filled('sort') == 'date') {
            $productsQuery->orderBy('created_at', 'desc');
        } else {
            $productsQuery->orderBy('created_at');
        }


        if ($request->filled('name')) {
            $productsQuery->where('name', 'like', '%' . request('name') . '%');
        }

        if ($request->filled('category_id')) {
            $productsQuery->where('category_id', request('category_id'));
        }

        $products = $productsQuery->paginate($perPage);

        return response()->json(compact('products'));
    }

    public function product($id)
    {
        $product = Product::with(['category', 'biders' => function ($query) {
            $query->latest('pivot_id');
        }])->findOrFail($id);
        $product->increment('watched_count', 1);
        $biders = DB::table('product_user')->distinct('user_id')->count('user_id');

        return response()->json(compact('product', 'biders'));
    }

    public function addBid(Request $request, $productId)
    {
        $user = auth('api')->user();
        $product = Product::findOrFail($productId);
        $deposit = $product->deposit;
        $highestValue = $product->highest_value ?? $product->start_bid_price;
        $minBid = $product->min_bid_price;

        if ($product->user_id == auth('api')->id()) {
            return response()->json(['msg' => __('lang.canotBid')], 420);
        }

        if ($product->end_at < now()) {
            return response()->json(['msg' => __('lang.auctionEnded')], 420);
        }

        $depositRecord = Deposit::where('user_id', $user->id)->where('product_id', $product->id);

        if ($depositRecord->count() == 0) {
            if ($user->balance < $deposit) {
                return response()->json(['msg' => __('lang.notEnoughBalance')], 420);
            }

            $user->decrement('balance', $deposit);
            // dd($user->balance);

            $user->transactions()->create([
                'user_id' => $user->id,
                'value' => -$deposit,
                'action' => 2,
            ]);

            $product->deposit()->sync([$user->id => ['deposit' => $deposit]]);
        }


        $request->validate([
            'value' => 'required|integer|min:' . $minBid,
        ]);

        $product->biders()->attach($user->id, ['value' => $highestValue + request('value')]);
        $product->update(['highest_value' => $highestValue + request('value'), 'winner_id' => $user->id]);

        $biders = $product->biders;
        $bidersCount = DB::table('product_user')->distinct('user_id')->count('user_id');
        $newBider = $product->biders()->latest('pivot_id')->first();

        $data = [
            'id' => $product->id,
            'highest_value' => $product->highest_value,
            'watched_count' => $product->watched_count,
            'total_bids'    => $product->total_bids,
            'active_biders' => $bidersCount,
            'check_deposit' => $product->check_deposit,
            'new_bider'     => $newBider,
        ];

        event(new ProductDetails($data));
        // event(new UserActiveBids($user, $activeBids));

        return response()->json(compact('biders', 'user'));
    }

    public function dashboard()
    {
        $user = auth('api')->user();
        $userBidsCount = $user->bidItems()->count();
        $winningBidsCount = Product::where('winner_id', $user->id)->count();
        $favouritesCount = $user->favourites()->count();

        return response()->json(compact('userBidsCount', 'winningBidsCount', 'favouritesCount'));
    }

    public function currentUserBids()
    {
        $products = Product::active()->whereHas('bids', function (Builder $query) {
            $query->where('user_id', auth('api')->id());
        })->with(['bids' => function ($query) {
            $query->where('user_id', auth('api')->id())->latest()->first();
        }])->paginate(20);

        return response()->json(compact('products'));
    }

    public function pendingUserBids()
    {
        $products = Product::where('winner_id', auth('api')->id())->whereIn('status', [2, 3])->with(['bids' => function ($query) {
            $query->where('user_id', auth('api')->id())->latest()->first();
        }])->paginate(20);

        return response()->json(compact('products'));
    }

    public function finishedUserBids()
    {
        $products = Product::where('winner_id', auth('api')->id())->finished()->with(['bids' => function ($query) {
            $query->where('user_id', auth('api')->id())->latest()->first();
        }])->paginate(20);

        return response()->json(compact('products'));
    }

    public function upcomingMyBids()
    {
        $user = auth('api')->user();
        $upcoming = $user->products()->inactive()->paginate(10);

        return response()->json(compact('upcoming'));
    }

    public function currentMyBids()
    {
        $user = auth('api')->user();
        $current = $user->products()
            ->whereIn('status', [1, 2, 3])
            ->paginate(10);

        return response()->json(compact('current'));
    }

    public function pastMyBids()
    {
        $user = auth('api')->user();
        $past = $user->products()->finished()->paginate(10);

        return response()->json(compact('past'));
    }

    public function winningBids(Request $request)
    {
        $productsQuery = Product::where('winner_id', auth('api')->id())->active();

        if ($request->sort == 'name') {
            $productsQuery->orderBy('name');
        } elseif ($request->sort == 'date') {
            $productsQuery->orderBy('approved_at', 'desc');
        } else {
            $productsQuery->orderBy('approved_at', 'asc');
        }

        if ($request->filled('name')) {
            $productsQuery->where('name', 'like', '%' . request('name') . '%');
        }

        $products = $productsQuery->paginate(10);

        return response()->json(compact('products'));
    }

    public function addOrRemoveFavourites($productId)
    {
        $product = Product::findOrFail($productId);

        $user = auth('api')->user();

        $user->favourites()->toggle($productId);
        $isfav = $product->is_fav;

        return response()->json(['msg' => 'Success', 'isfav' => $isfav]);
    }

    public function myFavourites(Request $request)
    {
        $user = auth('api')->user();
        $myFavouritesQuery = $user->favourites();

        if ($request->sort == 'name') {
            $myFavouritesQuery->orderBy('name');
        } elseif ($request->sort == 'date') {
            $myFavouritesQuery->orderBy('approved_at', 'desc');
        } else {
            $myFavouritesQuery->orderBy('approved_at', 'asc');
        }

        if ($request->filled('name')) {
            $myFavouritesQuery->where('name', 'like', '%' . request('name') . '%');
        }

        $myFavourites = $myFavouritesQuery->paginate(10);


        return response()->json(compact('myFavourites'));
    }

    public function faqs()
    {
        $faqCategories = FaqCategory::get();
        $faqs = Faq::get();

        return response()->json(compact('faqCategories', 'faqs'));
    }

    public function pages($id)
    {
        $page = Page::find($id);

        return response()->json(compact('page'));
    }

    public function metas()
    {
        $metas = Meta::get();

        return response()->json(compact('metas'));
    }

    public function addReview(Request $request, $product_id)
    {
        $product = Product::find($product_id);
        $validated = $request->validate([
            'comment' => 'required|string|min:3',
        ]);
        $validated['user_id'] = auth('api')->id();
        $validated['product_id'] = $product_id;
        $validated['user_type'] = $product->user_id == $validated['user_id'] ? 0 : 1;

        $review = ProductReview::create($validated);

        if ($validated['user_type'] == 0) {
            $product->update(['status' => 3]);
            Mail::to($product->winner->email)->send(new ProductDeliveredMail($product));
        } else {
            $product->update(['status' => 4]);
            Mail::to($product->owner->email)->send(new ProductReceivedMail($product));
        }

        return response()->json(compact('review'));
    }

    public function chargeBalance(Request $request)
    {
        $user = auth('api')->user();
        $validated = $request->validate([
            'value' => 'required'
        ]);

        $validated['user_id'] = $user->id;
        $validated['action'] = 1;

        $transaction = $user->transactions()->create($validated);

        $user->increment('balance', $validated['value']);
        $userBalance = $user->balance;
        return response()->json(compact('transaction', 'userBalance', 'user'));
    }

    public function transactions(Request $request)
    {
        $user = auth('api')->user();
        $transactionsQuery = $user->transactions();

        if ($request->filled('type')) {
            $transactionsQuery->where('action', $request->type);
        }
        $transactions = $transactionsQuery->paginate(10);

        return response()->json(compact('transactions'));
    }

    public function subscription()
    {
        $user = auth('api')->user();
        $subscribeValue = 150;
        $user->update(['subscription' => $subscribeValue]);

        return response()->json(compact('user'));
    }



    // Helper Methods
    public function randomCode($length = 8)
    {
        // 0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ
        // $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }
}
