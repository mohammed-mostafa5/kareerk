<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateCareerRequestRequest;
use App\Http\Requests\AdminPanel\UpdateCareerRequestRequest;
use App\Repositories\AdminPanel\CareerRequestRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CareerRequestController extends AppBaseController
{
    /** @var  CareerRequestRepository */
    private $careerRequestRepository;

    public function __construct(CareerRequestRepository $careerRequestRepo)
    {
        $this->careerRequestRepository = $careerRequestRepo;
    }

    /**
     * Display a listing of the CareerRequest.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $careerRequests = $this->careerRequestRepository->paginate(10);

        return view('adminPanel.career_requests.index')
            ->with('careerRequests', $careerRequests);
    }

    /**
     * Show the form for creating a new CareerRequest.
     *
     * @return Response
     */
    public function create()
    {
        return view('adminPanel.career_requests.create');
    }

    /**
     * Store a newly created CareerRequest in storage.
     *
     * @param CreateCareerRequestRequest $request
     *
     * @return Response
     */
    public function store(CreateCareerRequestRequest $request)
    {
        $input = $request->all();

        $careerRequest = $this->careerRequestRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/careerRequests.singular')]));

        return redirect(route('adminPanel.careerRequests.index'));
    }

    /**
     * Display the specified CareerRequest.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $careerRequest = $this->careerRequestRepository->find($id);

        if (empty($careerRequest)) {
            Flash::error(__('messages.not_found', ['model' => __('models/careerRequests.singular')]));

            return redirect(route('adminPanel.careerRequests.index'));
        }

        return view('adminPanel.career_requests.show')->with('careerRequest', $careerRequest);
    }

    /**
     * Show the form for editing the specified CareerRequest.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $careerRequest = $this->careerRequestRepository->find($id);

        if (empty($careerRequest)) {
            Flash::error(__('messages.not_found', ['model' => __('models/careerRequests.singular')]));

            return redirect(route('adminPanel.careerRequests.index'));
        }

        return view('adminPanel.career_requests.edit')->with('careerRequest', $careerRequest);
    }

    /**
     * Update the specified CareerRequest in storage.
     *
     * @param int $id
     * @param UpdateCareerRequestRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCareerRequestRequest $request)
    {
        $careerRequest = $this->careerRequestRepository->find($id);

        if (empty($careerRequest)) {
            Flash::error(__('messages.not_found', ['model' => __('models/careerRequests.singular')]));

            return redirect(route('adminPanel.careerRequests.index'));
        }

        $careerRequest = $this->careerRequestRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/careerRequests.singular')]));

        return redirect(route('adminPanel.careerRequests.index'));
    }

    /**
     * Remove the specified CareerRequest from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $careerRequest = $this->careerRequestRepository->find($id);

        if (empty($careerRequest)) {
            Flash::error(__('messages.not_found', ['model' => __('models/careerRequests.singular')]));

            return redirect(route('adminPanel.careerRequests.index'));
        }

        $this->careerRequestRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/careerRequests.singular')]));

        return redirect(route('adminPanel.careerRequests.index'));
    }
}
