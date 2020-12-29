<?php

namespace App\Http\Controllers\AdminPanel;

use Flash;
use Response;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\AppBaseController;
use App\Repositories\AdminPanel\CategoryRepository;
use App\Http\Requests\AdminPanel\CreateCategoryRequest;
use App\Http\Requests\AdminPanel\UpdateCategoryRequest;

class CategoryController extends AppBaseController
{
    /** @var  CategoryRepository */
    private $CategoryRepository;

    public function __construct(CategoryRepository $categoryRepo)
    {
        $this->CategoryRepository = $categoryRepo;
    }

    /**
     * Display a listing of the category.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $categories = Category::get();

        return view('adminPanel.categories.index')
            ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new category.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::parent()->get();

        return view('adminPanel.categories.create', compact('categories'));
    }

    /**
     * Store a newly created category in storage.
     *
     * @param CreatecategoryRequest $request
     *
     * @return Response
     */
    public function store(CreatecategoryRequest $request)
    {
        // return $request;
        $input = $request->all();

        $category = $this->CategoryRepository->create($input);
        $allData = [
            [
                'page' => $category->translate('en')->name,
                'photo' => '1591528943_ad-1.jpg',
                'link' => '#',
                'width' => '1170',
                'height' => '245',
            ],
            [
                'page' => $category->translate('en')->name,
                'photo' => '1591529245_ad-2.jpg',
                'link' => '#',
                'width' => '1170',
                'height' => '245',
            ],
        ];

        foreach ($allData as $data) {
            DB::table('ads')->insert($data);
        }
        Flash::success(__('messages.saved', ['model' => __('models/categories.singular')]));

        return redirect(route('adminPanel.categories.index'));
    }

    /**
     * Display the specified category.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $category = $this->CategoryRepository->find($id);

        if (empty($category)) {
            Flash::error(__('messages.not_found', ['model' => __('models/categories.singular')]));

            return redirect(route('adminPanel.categories.index'));
        }

        return view('adminPanel.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $category = $this->CategoryRepository->find($id);

        if (empty($category)) {
            Flash::error(__('messages.not_found', ['model' => __('models/categories.singular')]));

            return redirect(route('adminPanel.categories.index'));
        }

        $categories = Category::parent()->with('children')->get();


        return view('adminPanel.categories.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified category in storage.
     *
     * @param int $id
     * @param UpdatecategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecategoryRequest $request)
    {
        $category = $this->CategoryRepository->find($id);

        if (empty($category)) {
            Flash::error(__('messages.not_found', ['model' => __('models/categories.singular')]));

            return redirect(route('adminPanel.categories.index'));
        }


        // Define Currunt Photo Path
        $photo = "uploads/images/original/$category->photo";
        $photo_thumbnail = "uploads/images/thumbnail/$category->photo";

        $category = $this->CategoryRepository->update($request->all(), $id);

        // Deleting Current Photo
        if (file_exists($photo)) {
            unlink(public_path($photo));
        }
        if (file_exists($photo_thumbnail)) {
            unlink(public_path($photo_thumbnail));
        }

        Flash::success(__('messages.updated', ['model' => __('models/categories.singular')]));

        return redirect(route('adminPanel.categories.index'));
    }

    /**
     * Remove the specified category from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $category = $this->CategoryRepository->find($id);

        if (empty($category)) {
            Flash::error(__('messages.not_found', ['model' => __('models/categories.singular')]));

            return redirect(route('adminPanel.categories.index'));
        }

        $this->CategoryRepository->delete($id);

        // Define Currunt Photo Path
        $photo = "uploads/images/original/$category->photo";
        $photo_thumbnail = "uploads/images/thumbnail/$category->photo";

        // Deleting Current Photo
        if (file_exists($photo)) {
            unlink(public_path($photo));
        }
        if (file_exists($photo_thumbnail)) {
            unlink(public_path($photo_thumbnail));
        }

        Flash::success(__('messages.deleted', ['model' => __('models/categories.singular')]));

        return redirect(route('adminPanel.categories.index'));
    }
}
