<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateJobRequest;
use App\Http\Requests\AdminPanel\UpdateJobRequest;
use App\Repositories\AdminPanel\JobRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class JobController extends AppBaseController
{
    /** @var  JobRepository */
    private $jobRepository;

    public function __construct(JobRepository $jobRepo)
    {
        $this->jobRepository = $jobRepo;
    }

    /**
     * Display a listing of the Job.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $jobs = $this->jobRepository->all();

        return view('adminPanel.jobs.index')
            ->with('jobs', $jobs);
    }

    /**
     * Show the form for creating a new Job.
     *
     * @return Response
     */
    public function create()
    {
        return view('adminPanel.jobs.create');
    }

    /**
     * Store a newly created Job in storage.
     *
     * @param CreateJobRequest $request
     *
     * @return Response
     */
    public function store(CreateJobRequest $request)
    {
        $input = $request->all();

        $job = $this->jobRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/jobs.singular')]));

        return redirect(route('adminPanel.jobs.index'));
    }

    /**
     * Display the specified Job.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $job = $this->jobRepository->find($id);

        if (empty($job)) {
            Flash::error(__('messages.not_found', ['model' => __('models/jobs.singular')]));

            return redirect(route('adminPanel.jobs.index'));
        }

        return view('adminPanel.jobs.show')->with('job', $job);
    }

    /**
     * Show the form for editing the specified Job.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $job = $this->jobRepository->find($id);

        if (empty($job)) {
            Flash::error(__('messages.not_found', ['model' => __('models/jobs.singular')]));

            return redirect(route('adminPanel.jobs.index'));
        }

        return view('adminPanel.jobs.edit')->with('job', $job);
    }

    /**
     * Update the specified Job in storage.
     *
     * @param int $id
     * @param UpdateJobRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJobRequest $request)
    {
        $job = $this->jobRepository->find($id);

        if (empty($job)) {
            Flash::error(__('messages.not_found', ['model' => __('models/jobs.singular')]));

            return redirect(route('adminPanel.jobs.index'));
        }

        $job = $this->jobRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/jobs.singular')]));

        return redirect(route('adminPanel.jobs.index'));
    }

    /**
     * Remove the specified Job from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $job = $this->jobRepository->find($id);

        if (empty($job)) {
            Flash::error(__('messages.not_found', ['model' => __('models/jobs.singular')]));

            return redirect(route('adminPanel.jobs.index'));
        }

        $this->jobRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/jobs.singular')]));

        return redirect(route('adminPanel.jobs.index'));
    }
}
