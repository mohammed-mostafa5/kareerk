<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateDeliveryRequest;
use App\Http\Requests\AdminPanel\UpdateDeliveryRequest;
use App\Repositories\AdminPanel\DeliveryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class DeliveryController extends AppBaseController
{
    /** @var  DeliveryRepository */
    private $deliveryRepository;

    public function __construct(DeliveryRepository $deliveryRepo)
    {
        $this->deliveryRepository = $deliveryRepo;
    }

    /**
     * Display a listing of the Delivery.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $deliveries = $this->deliveryRepository->paginate(10);

        return view('adminPanel.deliveries.index')
            ->with('deliveries', $deliveries);
    }

    /**
     * Show the form for creating a new Delivery.
     *
     * @return Response
     */
    public function create()
    {
        return view('adminPanel.deliveries.create');
    }

    /**
     * Store a newly created Delivery in storage.
     *
     * @param CreateDeliveryRequest $request
     *
     * @return Response
     */
    public function store(CreateDeliveryRequest $request)
    {
        $input = $request->all();

        $delivery = $this->deliveryRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/deliveries.singular')]));

        return redirect(route('adminPanel.deliveries.index'));
    }

    /**
     * Display the specified Delivery.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $delivery = $this->deliveryRepository->find($id);

        if (empty($delivery)) {
            Flash::error(__('messages.not_found', ['model' => __('models/deliveries.singular')]));

            return redirect(route('adminPanel.deliveries.index'));
        }

        return view('adminPanel.deliveries.show')->with('delivery', $delivery);
    }

    /**
     * Show the form for editing the specified Delivery.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $delivery = $this->deliveryRepository->find($id);

        if (empty($delivery)) {
            Flash::error(__('messages.not_found', ['model' => __('models/deliveries.singular')]));

            return redirect(route('adminPanel.deliveries.index'));
        }

        return view('adminPanel.deliveries.edit')->with('delivery', $delivery);
    }

    /**
     * Update the specified Delivery in storage.
     *
     * @param int $id
     * @param UpdateDeliveryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDeliveryRequest $request)
    {
        $delivery = $this->deliveryRepository->find($id);

        if (empty($delivery)) {
            Flash::error(__('messages.not_found', ['model' => __('models/deliveries.singular')]));

            return redirect(route('adminPanel.deliveries.index'));
        }

        $delivery = $this->deliveryRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/deliveries.singular')]));

        return redirect(route('adminPanel.deliveries.index'));
    }

    /**
     * Remove the specified Delivery from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $delivery = $this->deliveryRepository->find($id);

        if (empty($delivery)) {
            Flash::error(__('messages.not_found', ['model' => __('models/deliveries.singular')]));

            return redirect(route('adminPanel.deliveries.index'));
        }

        $this->deliveryRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/deliveries.singular')]));

        return redirect(route('adminPanel.deliveries.index'));
    }
}
