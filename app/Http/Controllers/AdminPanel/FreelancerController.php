<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateFreelancerRequest;
use App\Http\Requests\AdminPanel\UpdateFreelancerRequest;
use App\Repositories\AdminPanel\FreelancerRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Freelancer;
use Illuminate\Http\Request;
use Flash;
use Response;

class FreelancerController extends AppBaseController
{
    /** @var  FreelancerRepository */
    private $freelancerRepository;

    public function __construct(FreelancerRepository $freelancerRepo)
    {
        $this->freelancerRepository = $freelancerRepo;
    }

    /**
     * Display a listing of the Freelancer.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $freelancers = $this->freelancerRepository->all();

        return view('adminPanel.freelancers.index')
            ->with('freelancers', $freelancers);
    }

    /**
     * Show the form for creating a new Freelancer.
     *
     * @return Response
     */
    public function create()
    {
        return view('adminPanel.freelancers.create');
    }

    /**
     * Store a newly created Freelancer in storage.
     *
     * @param CreateFreelancerRequest $request
     *
     * @return Response
     */
    public function store(CreateFreelancerRequest $request)
    {
        $input = $request->all();

        $freelancer = $this->freelancerRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/freelancers.singular')]));

        return redirect(route('adminPanel.freelancers.index'));
    }

    /**
     * Display the specified Freelancer.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $freelancer = Freelancer::find($id);

        if (empty($freelancer)) {
            Flash::error(__('messages.not_found', ['model' => __('models/freelancers.singular')]));

            return redirect(route('adminPanel.freelancers.index'));
        }
        return view('adminPanel.freelancers.show')->with('freelancer', $freelancer);
    }

    /**
     * Show the form for editing the specified Freelancer.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $freelancer = $this->freelancerRepository->find($id);

        if (empty($freelancer)) {
            Flash::error(__('messages.not_found', ['model' => __('models/freelancers.singular')]));

            return redirect(route('adminPanel.freelancers.index'));
        }

        return view('adminPanel.freelancers.edit')->with('freelancer', $freelancer);
    }

    /**
     * Update the specified Freelancer in storage.
     *
     * @param int $id
     * @param UpdateFreelancerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFreelancerRequest $request)
    {
        $freelancer = $this->freelancerRepository->find($id);

        if (empty($freelancer)) {
            Flash::error(__('messages.not_found', ['model' => __('models/freelancers.singular')]));

            return redirect(route('adminPanel.freelancers.index'));
        }

        $freelancer = $this->freelancerRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/freelancers.singular')]));

        return redirect(route('adminPanel.freelancers.index'));
    }

    /**
     * Remove the specified Freelancer from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $freelancer = $this->freelancerRepository->find($id);

        if (empty($freelancer)) {
            Flash::error(__('messages.not_found', ['model' => __('models/freelancers.singular')]));

            return redirect(route('adminPanel.freelancers.index'));
        }

        $this->freelancerRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/freelancers.singular')]));

        return redirect(route('adminPanel.freelancers.index'));
    }



    public function approve($id)
    {
        $freelancer = Freelancer::find($id);
        $freelancer->update(['status' => 3]);

        // Mail::to($user->email)->send(new UserApproveMail($user));

        return back();
    }
}
