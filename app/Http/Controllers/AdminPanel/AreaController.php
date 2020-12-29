<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateAreaRequest;
use App\Http\Requests\AdminPanel\UpdateAreaRequest;
use App\Repositories\AdminPanel\AreaRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Area;
use App\Models\City;
use Illuminate\Http\Request;
use Flash;
use Response;

class AreaController extends AppBaseController
{
    /** @var  AreaRepository */
    private $areaRepository;

    public function __construct(AreaRepository $areaRepo)
    {
        $this->areaRepository = $areaRepo;
    }

    /**
     * Display a listing of the Area.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(City $city)
    {
        $areas = Area::where('city_id', $city->id)->get();

        return view('adminPanel.areas.index', compact('areas', 'city'));
    }

    /**
     * Show the form for creating a new Area.
     *
     * @return Response
     */
    public function create(City $city)
    {
        return view('adminPanel.areas.create', compact('city'));
    }

    /**
     * Store a newly created Area in storage.
     *
     * @param CreateAreaRequest $request
     *
     * @return Response
     */
    public function store(CreateAreaRequest $request, City $city)
    {
        $input = $request->all();
        $input['city_id'] = $city->id;

        $area = $this->areaRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/areas.singular')]));

        return redirect(route('adminPanel.cities.areas.index', $city->id));
    }

    /**
     * Display the specified Area.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $area = $this->areaRepository->find($id);

        if (empty($area)) {
            Flash::error(__('messages.not_found', ['model' => __('models/areas.singular')]));

            return redirect(route('adminPanel.areas.index'));
        }

        return view('adminPanel.areas.show')->with('area', $area);
    }

    /**
     * Show the form for editing the specified Area.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id, City $city)
    {
        $area = $this->areaRepository->find($id);

        if (empty($area)) {
            Flash::error(__('messages.not_found', ['model' => __('models/areas.singular')]));

            return redirect(route('adminPanel.areas.index'));
        }

        return view('adminPanel.areas.edit', compact('area', 'city'));
    }

    /**
     * Update the specified Area in storage.
     *
     * @param int $id
     * @param UpdateAreaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAreaRequest $request)
    {
        $area = $this->areaRepository->find($id);

        if (empty($area)) {
            Flash::error(__('messages.not_found', ['model' => __('models/areas.singular')]));

            return redirect(route('adminPanel.areas.index'));
        }
        $input = $request->all();

        $area = $this->areaRepository->update($input, $id);

        Flash::success(__('messages.updated', ['model' => __('models/areas.singular')]));

        return redirect(route('adminPanel.cities.areas.index', $area->city_id));
    }

    /**
     * Remove the specified Area from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $area = $this->areaRepository->find($id);

        if (empty($area)) {
            Flash::error(__('messages.not_found', ['model' => __('models/areas.singular')]));

            return back();
        }

        $this->areaRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/areas.singular')]));

        return back();
    }
}
