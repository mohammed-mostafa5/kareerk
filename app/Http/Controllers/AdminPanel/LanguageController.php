<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateLanguageRequest;
use App\Http\Requests\AdminPanel\UpdateLanguageRequest;
use App\Repositories\AdminPanel\LanguageRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class LanguageController extends AppBaseController
{
    /** @var  LanguageRepository */
    private $languageRepository;

    public function __construct(LanguageRepository $languageRepo)
    {
        $this->languageRepository = $languageRepo;
    }

    /**
     * Display a listing of the Language.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $languages = $this->languageRepository->all();

        return view('adminPanel.languages.index')
            ->with('languages', $languages);
    }

    /**
     * Show the form for creating a new Language.
     *
     * @return Response
     */
    public function create()
    {
        return view('adminPanel.languages.create');
    }

    /**
     * Store a newly created Language in storage.
     *
     * @param CreateLanguageRequest $request
     *
     * @return Response
     */
    public function store(CreateLanguageRequest $request)
    {
        $input = $request->all();

        $language = $this->languageRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/languages.singular')]));

        return redirect(route('adminPanel.languages.index'));
    }

    /**
     * Display the specified Language.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $language = $this->languageRepository->find($id);

        if (empty($language)) {
            Flash::error(__('messages.not_found', ['model' => __('models/languages.singular')]));

            return redirect(route('adminPanel.languages.index'));
        }

        return view('adminPanel.languages.show')->with('language', $language);
    }

    /**
     * Show the form for editing the specified Language.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $language = $this->languageRepository->find($id);

        if (empty($language)) {
            Flash::error(__('messages.not_found', ['model' => __('models/languages.singular')]));

            return redirect(route('adminPanel.languages.index'));
        }

        return view('adminPanel.languages.edit')->with('language', $language);
    }

    /**
     * Update the specified Language in storage.
     *
     * @param int $id
     * @param UpdateLanguageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLanguageRequest $request)
    {
        $language = $this->languageRepository->find($id);

        if (empty($language)) {
            Flash::error(__('messages.not_found', ['model' => __('models/languages.singular')]));

            return redirect(route('adminPanel.languages.index'));
        }

        $language = $this->languageRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/languages.singular')]));

        return redirect(route('adminPanel.languages.index'));
    }

    /**
     * Remove the specified Language from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $language = $this->languageRepository->find($id);

        if (empty($language)) {
            Flash::error(__('messages.not_found', ['model' => __('models/languages.singular')]));

            return redirect(route('adminPanel.languages.index'));
        }

        $this->languageRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/languages.singular')]));

        return redirect(route('adminPanel.languages.index'));
    }
}
