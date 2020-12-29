<?php

namespace App\Http\Controllers\AdminPanel;

use App\DataTables\AdminPanel\AdsDataTable;
use App\Http\Requests\AdminPanel;
use App\Http\Requests\AdminPanel\CreateAdsRequest;
use App\Http\Requests\AdminPanel\UpdateAdsRequest;
use App\Repositories\AdminPanel\AdsRepository;
use Illuminate\Http\Request;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class AdsController extends AppBaseController
{
    /** @var  AdsRepository */
    private $adsRepository;

    public function __construct(AdsRepository $adsRepo)
    {
        $this->adsRepository = $adsRepo;
    }

    /**
     * Display a listing of the Ads.
     *
     * @param AdsDataTable $adsDataTable
     * @return Response
     */
    public function index(Request $request)
    {
        // dd($request->all());
        $ads = $this->adsRepository
        ->allQuery(['page' => $request->page_name])
        ->paginate(10);

        return view('adminPanel.ads.index')
            ->with('ads', $ads);
    }

    /**
     * Show the form for creating a new Ads.
     *
     * @return Response
     */
    public function create()
    {
        return view('adminPanel.ads.create');
    }

    /**
     * Store a newly created Ads in storage.
     *
     * @param CreateAdsRequest $request
     *
     * @return Response
     */
    public function store(CreateAdsRequest $request)
    {
        $input = $request->all();

        $ads = $this->adsRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/ads.singular')]));

        return redirect(route('adminPanel.ads.index'));
    }

    /**
     * Display the specified Ads.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ads = $this->adsRepository->find($id);

        if (empty($ads)) {
            Flash::error(__('models/ads.singular').' '.__('messages.not_found'));

            return redirect(route('adminPanel.ads.index'));
        }

        return view('adminPanel.ads.show')->with('ads', $ads);
    }

    /**
     * Show the form for editing the specified Ads.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ads = $this->adsRepository->find($id);

        if (empty($ads)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ads.singular')]));

            return redirect(route('adminPanel.ads.index'));
        }

        return view('adminPanel.ads.edit')->with('ads', $ads);
    }

    /**
     * Update the specified Ads in storage.
     *
     * @param  int              $id
     * @param UpdateAdsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAdsRequest $request)
    {
        $ads = $this->adsRepository->find($id);

        if (empty($ads)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ads.singular')]));

            return redirect(route('adminPanel.ads.index'));
        }

        $ads = $this->adsRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/ads.singular')]));

        return redirect(route('adminPanel.ads.index'));
    }

    /**
     * Remove the specified Ads from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ads = $this->adsRepository->find($id);

        if (empty($ads)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ads.singular')]));

            return redirect(route('adminPanel.ads.index'));
        }

        $this->adsRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/ads.singular')]));

        return redirect(route('adminPanel.ads.index'));
    }
}
