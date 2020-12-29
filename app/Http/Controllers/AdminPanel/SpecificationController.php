<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateSpecificationRequest;
use App\Http\Requests\AdminPanel\UpdateSpecificationRequest;
use App\Repositories\AdminPanel\SpecificationRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class SpecificationController extends AppBaseController
{
    /** @var  SpecificationRepository */
    private $specificationRepository;

    public function __construct(SpecificationRepository $specificationRepo)
    {
        $this->specificationRepository = $specificationRepo;
    }

    /**
     * Display a listing of the Specification.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $specifications = $this->specificationRepository->paginate(10);

        return view('adminPanel.specifications.index')
            ->with('specifications', $specifications);
    }

    /**
     * Show the form for creating a new Specification.
     *
     * @return Response
     */
    public function create()
    {
        return view('adminPanel.specifications.create');
    }

    /**
     * Store a newly created Specification in storage.
     *
     * @param CreateSpecificationRequest $request
     *
     * @return Response
     */
    public function store(CreateSpecificationRequest $request)
    {
        $input = $request->all();

        $specification = $this->specificationRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/specifications.singular')]));

        return redirect(route('adminPanel.specifications.index'));
    }

    /**
     * Display the specified Specification.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $specification = $this->specificationRepository->find($id);

        if (empty($specification)) {
            Flash::error(__('messages.not_found', ['model' => __('models/specifications.singular')]));

            return redirect(route('adminPanel.specifications.index'));
        }

        return view('adminPanel.specifications.show')->with('specification', $specification);
    }

    /**
     * Show the form for editing the specified Specification.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $specification = $this->specificationRepository->find($id);

        if (empty($specification)) {
            Flash::error(__('messages.not_found', ['model' => __('models/specifications.singular')]));

            return redirect(route('adminPanel.specifications.index'));
        }

        return view('adminPanel.specifications.edit')->with('specification', $specification);
    }

    /**
     * Update the specified Specification in storage.
     *
     * @param int $id
     * @param UpdateSpecificationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSpecificationRequest $request)
    {
        $specification = $this->specificationRepository->find($id);

        if (empty($specification)) {
            Flash::error(__('messages.not_found', ['model' => __('models/specifications.singular')]));

            return redirect(route('adminPanel.specifications.index'));
        }

        $specification = $this->specificationRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/specifications.singular')]));

        if($specification->specificationable_type == 'App\Models\Camera'){
            return redirect(route('adminPanel.cameras.specs', ['id' => $specification->specificationable_id]));
        }

        return redirect(route('adminPanel.lens.specs', ['id' => $specification->specificationable_id]));
    }

    /**
     * Remove the specified Specification from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $specification = $this->specificationRepository->find($id);

        if (empty($specification)) {
            Flash::error(__('messages.not_found', ['model' => __('models/specifications.singular')]));

            return redirect(route('adminPanel.specifications.index'));
        }

        $this->specificationRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/specifications.singular')]));

        if($specification->specificationable_type == 'App\Models\Camera'){
            return redirect(route('adminPanel.cameras.specs', ['id' => $specification->specificationable_id]));
        }

        return redirect(route('adminPanel.lens.specs', ['id' => $specification->specificationable_id]));
    }
}
