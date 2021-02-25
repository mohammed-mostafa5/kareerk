<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateCareerRequest;
use App\Http\Requests\AdminPanel\UpdateCareerRequest;
use App\Repositories\AdminPanel\CareerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CareerController extends AppBaseController
{
    /** @var  CareerRepository */
    private $careerRepository;

    public function __construct(CareerRepository $careerRepo)
    {
        $this->careerRepository = $careerRepo;
    }

    /**
     * Display a listing of the Career.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $careers = $this->careerRepository->all();

        return view('adminPanel.careers.index')
            ->with('careers', $careers);
    }

    /**
     * Show the form for creating a new Career.
     *
     * @return Response
     */
    public function create()
    {
        return view('adminPanel.careers.create');
    }

    /**
     * Store a newly created Career in storage.
     *
     * @param CreateCareerRequest $request
     *
     * @return Response
     */
    public function store(CreateCareerRequest $request)
    {
        $input = $request->all();

        $career = $this->careerRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/careers.singular')]));

        return redirect(route('adminPanel.careers.index'));
    }

    /**
     * Display the specified Career.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $career = $this->careerRepository->find($id);

        if (empty($career)) {
            Flash::error(__('messages.not_found', ['model' => __('models/careers.singular')]));

            return redirect(route('adminPanel.careers.index'));
        }

        return view('adminPanel.careers.show')->with('career', $career);
    }

    /**
     * Show the form for editing the specified Career.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $career = $this->careerRepository->find($id);

        if (empty($career)) {
            Flash::error(__('messages.not_found', ['model' => __('models/careers.singular')]));

            return redirect(route('adminPanel.careers.index'));
        }

        return view('adminPanel.careers.edit')->with('career', $career);
    }

    /**
     * Update the specified Career in storage.
     *
     * @param int $id
     * @param UpdateCareerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCareerRequest $request)
    {
        $career = $this->careerRepository->find($id);

        if (empty($career)) {
            Flash::error(__('messages.not_found', ['model' => __('models/careers.singular')]));

            return redirect(route('adminPanel.careers.index'));
        }

        $career = $this->careerRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/careers.singular')]));

        return redirect(route('adminPanel.careers.index'));
    }

    /**
     * Remove the specified Career from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $career = $this->careerRepository->find($id);

        if (empty($career)) {
            Flash::error(__('messages.not_found', ['model' => __('models/careers.singular')]));

            return redirect(route('adminPanel.careers.index'));
        }

        $this->careerRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/careers.singular')]));

        return redirect(route('adminPanel.careers.index'));
    }
}
