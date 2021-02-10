<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateServiceRequest;
use App\Http\Requests\AdminPanel\UpdateServiceRequest;
use App\Repositories\AdminPanel\ServiceRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Service;
use Illuminate\Http\Request;
use Flash;
use Response;

class ServiceController extends AppBaseController
{
    /** @var  ServiceRepository */
    private $serviceRepository;

    public function __construct(ServiceRepository $serviceRepo)
    {
        $this->serviceRepository = $serviceRepo;
    }

    /**
     * Display a listing of the Service.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $services = $this->serviceRepository->paginate(10);

        return view('adminPanel.services.index')
            ->with('services', $services);
    }

    /**
     * Show the form for creating a new Service.
     *
     * @return Response
     */
    public function create()
    {
        $parents = Service::parent()->get()->pluck('name', 'id');

        return view('adminPanel.services.create', compact('parents'));
    }

    /**
     * Store a newly created Service in storage.
     *
     * @param CreateServiceRequest $request
     *
     * @return Response
     */
    public function store(CreateServiceRequest $request)
    {
        $input = $request->all();

        // dd($input);
        $service = $this->serviceRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/services.singular')]));

        return redirect(route('adminPanel.services.index'));
    }

    /**
     * Display the specified Service.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $service = $this->serviceRepository->find($id);

        if (empty($service)) {
            Flash::error(__('messages.not_found', ['model' => __('models/services.singular')]));

            return redirect(route('adminPanel.services.index'));
        }

        return view('adminPanel.services.show')->with('service', $service);
    }

    /**
     * Show the form for editing the specified Service.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $service = $this->serviceRepository->find($id);
        $parents = Service::parent()->get()->pluck('name', 'id');

        if (empty($service)) {
            Flash::error(__('messages.not_found', ['model' => __('models/services.singular')]));

            return redirect(route('adminPanel.services.index'));
        }



        return view('adminPanel.services.edit', compact('parents', 'service'));
    }

    /**
     * Update the specified Service in storage.
     *
     * @param int $id
     * @param UpdateServiceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateServiceRequest $request)
    {
        $service = $this->serviceRepository->find($id);

        if (empty($service)) {
            Flash::error(__('messages.not_found', ['model' => __('models/services.singular')]));

            return redirect(route('adminPanel.services.index'));
        }


        // Define Currunt Photo Path
        $photo = $service->photo_path;
        // $photo_thumbnail = "uploads/images/thumbnail/$service->photo";

        $service = $this->serviceRepository->update($request->all(), $id);
        // dd($service);
        if ($request->photo) {
            // Deleting Current Photo
            if (file_exists($photo) && $photo != $service->photo) {
                unlink(public_path($photo));
            }
            // if (file_exists($photo_thumbnail)  && $photo != $service->photo) {
            //     unlink(public_path($photo_thumbnail));
            // }
        }

        Flash::success(__('messages.updated', ['model' => __('models/services.singular')]));

        return redirect(route('adminPanel.services.index'));
    }

    /**
     * Remove the specified Service from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $service = $this->serviceRepository->find($id);

        if (empty($service)) {
            Flash::error(__('messages.not_found', ['model' => __('models/services.singular')]));

            return redirect(route('adminPanel.services.index'));
        }

        $this->serviceRepository->delete($id);

        // Define Currunt Photo Path
        $photo = "uploads/images/original/$service->photo";
        $photo_thumbnail = "uploads/images/thumbnail/$service->photo";

        // Deleting Current Photo
        if (file_exists($photo)) {
            unlink(public_path($photo));
        }
        if (file_exists($photo_thumbnail)) {
            unlink(public_path($photo_thumbnail));
        }

        Flash::success(__('messages.deleted', ['model' => __('models/services.singular')]));

        return redirect(route('adminPanel.services.index'));
    }
}
