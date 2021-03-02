<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateFeaturedFreelancerRequest;
use App\Http\Requests\AdminPanel\UpdateFeaturedFreelancerRequest;
use App\Repositories\AdminPanel\FeaturedFreelancerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class FeaturedFreelancerController extends AppBaseController
{
    /** @var  FeaturedFreelancerRepository */
    private $featuredFreelancerRepository;

    public function __construct(FeaturedFreelancerRepository $featuredFreelancerRepo)
    {
        $this->featuredFreelancerRepository = $featuredFreelancerRepo;
    }

    /**
     * Display a listing of the FeaturedFreelancer.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $featuredFreelancers = $this->featuredFreelancerRepository->all();

        return view('adminPanel.featured_freelancers.index')
            ->with('featuredFreelancers', $featuredFreelancers);
    }

    /**
     * Show the form for creating a new FeaturedFreelancer.
     *
     * @return Response
     */
    public function create()
    {
        return view('adminPanel.featured_freelancers.create');
    }

    /**
     * Store a newly created FeaturedFreelancer in storage.
     *
     * @param CreateFeaturedFreelancerRequest $request
     *
     * @return Response
     */
    public function store(CreateFeaturedFreelancerRequest $request)
    {
        $input = $request->all();

        $featuredFreelancer = $this->featuredFreelancerRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/featuredFreelancers.singular')]));

        return redirect(route('adminPanel.featuredFreelancers.index'));
    }

    /**
     * Display the specified FeaturedFreelancer.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $featuredFreelancer = $this->featuredFreelancerRepository->find($id);

        if (empty($featuredFreelancer)) {
            Flash::error(__('messages.not_found', ['model' => __('models/featuredFreelancers.singular')]));

            return redirect(route('adminPanel.featuredFreelancers.index'));
        }

        return view('adminPanel.featured_freelancers.show')->with('featuredFreelancer', $featuredFreelancer);
    }

    /**
     * Show the form for editing the specified FeaturedFreelancer.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $featuredFreelancer = $this->featuredFreelancerRepository->find($id);

        if (empty($featuredFreelancer)) {
            Flash::error(__('messages.not_found', ['model' => __('models/featuredFreelancers.singular')]));

            return redirect(route('adminPanel.featuredFreelancers.index'));
        }

        return view('adminPanel.featured_freelancers.edit')->with('featuredFreelancer', $featuredFreelancer);
    }

    /**
     * Update the specified FeaturedFreelancer in storage.
     *
     * @param int $id
     * @param UpdateFeaturedFreelancerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFeaturedFreelancerRequest $request)
    {
        $featuredFreelancer = $this->featuredFreelancerRepository->find($id);

        if (empty($featuredFreelancer)) {
            Flash::error(__('messages.not_found', ['model' => __('models/featuredFreelancers.singular')]));

            return redirect(route('adminPanel.featuredFreelancers.index'));
        }

        $featuredFreelancer = $this->featuredFreelancerRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/featuredFreelancers.singular')]));

        return redirect(route('adminPanel.featuredFreelancers.index'));
    }

    /**
     * Remove the specified FeaturedFreelancer from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $featuredFreelancer = $this->featuredFreelancerRepository->find($id);

        if (empty($featuredFreelancer)) {
            Flash::error(__('messages.not_found', ['model' => __('models/featuredFreelancers.singular')]));

            return redirect(route('adminPanel.featuredFreelancers.index'));
        }

        $this->featuredFreelancerRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/featuredFreelancers.singular')]));

        return redirect(route('adminPanel.featuredFreelancers.index'));
    }
}
