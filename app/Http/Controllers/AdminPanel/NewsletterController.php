<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateNewsletterRequest;
use App\Http\Requests\AdminPanel\UpdateNewsletterRequest;
use App\Repositories\AdminPanel\NewsletterRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class NewsletterController extends AppBaseController
{
    /** @var  NewsletterRepository */
    private $newsletterRepository;

    public function __construct(NewsletterRepository $newsletterRepo)
    {
        $this->newsletterRepository = $newsletterRepo;
    }

    /**
     * Display a listing of the Newsletter.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $newsletters = $this->newsletterRepository->paginate(10);

        return view('adminPanel.newsletters.index')
            ->with('newsletters', $newsletters);
    }

    /**
     * Show the form for creating a new Newsletter.
     *
     * @return Response
     */
    public function create()
    {
        return view('adminPanel.newsletters.create');
    }

    /**
     * Store a newly created Newsletter in storage.
     *
     * @param CreateNewsletterRequest $request
     *
     * @return Response
     */
    public function store(CreateNewsletterRequest $request)
    {
        $input = $request->all();

        $newsletter = $this->newsletterRepository->updateOrCreate($input);

        Flash::success(__('messages.saved', ['model' => __('models/newsletters.singular')]));

        return redirect(route('adminPanel.newsletters.index'));
    }

    /**
     * Display the specified Newsletter.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $newsletter = $this->newsletterRepository->find($id);

        if (empty($newsletter)) {
            Flash::error(__('messages.not_found', ['model' => __('models/newsletters.singular')]));

            return redirect(route('adminPanel.newsletters.index'));
        }

        return view('adminPanel.newsletters.show')->with('newsletter', $newsletter);
    }

    /**
     * Show the form for editing the specified Newsletter.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $newsletter = $this->newsletterRepository->find($id);

        if (empty($newsletter)) {
            Flash::error(__('messages.not_found', ['model' => __('models/newsletters.singular')]));

            return redirect(route('adminPanel.newsletters.index'));
        }

        return view('adminPanel.newsletters.edit')->with('newsletter', $newsletter);
    }

    /**
     * Update the specified Newsletter in storage.
     *
     * @param int $id
     * @param UpdateNewsletterRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNewsletterRequest $request)
    {
        $newsletter = $this->newsletterRepository->find($id);

        if (empty($newsletter)) {
            Flash::error(__('messages.not_found', ['model' => __('models/newsletters.singular')]));

            return redirect(route('adminPanel.newsletters.index'));
        }

        $newsletter = $this->newsletterRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/newsletters.singular')]));

        return redirect(route('adminPanel.newsletters.index'));
    }

    /**
     * Remove the specified Newsletter from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $newsletter = $this->newsletterRepository->find($id);

        if (empty($newsletter)) {
            Flash::error(__('messages.not_found', ['model' => __('models/newsletters.singular')]));

            return redirect(route('adminPanel.newsletters.index'));
        }

        $this->newsletterRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/newsletters.singular')]));

        return redirect(route('adminPanel.newsletters.index'));
    }
}
