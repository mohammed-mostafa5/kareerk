<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateSiteOptionRequest;
use App\Http\Requests\AdminPanel\UpdateSiteOptionRequest;
use App\Repositories\AdminPanel\SiteOptionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class SiteOptionController extends AppBaseController
{
    /** @var  SiteOptionRepository */
    private $siteOptionRepository;

    public function __construct(SiteOptionRepository $siteOptionRepo)
    {
        $this->siteOptionRepository = $siteOptionRepo;
    }


    public function edit($id)
    {
        $siteOption = $this->siteOptionRepository->find($id);

        if (empty($siteOption)) {
            Flash::error(__('messages.not_found', ['model' => __('models/siteOptions.singular')]));

            return back();
        }

        return view('adminPanel.site_options.edit')->with('siteOption', $siteOption);
    }


    public function update($id, UpdateSiteOptionRequest $request)
    {
        $siteOption = $this->siteOptionRepository->find($id);

        if (empty($siteOption)) {
            Flash::error(__('messages.not_found', ['model' => __('models/siteOptions.singular')]));

            return back();
        }

        $siteOption = $this->siteOptionRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/siteOptions.singular')]));

        return back();
    }
}
