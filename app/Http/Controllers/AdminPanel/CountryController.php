<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateCountryRequest;
use App\Http\Requests\AdminPanel\UpdateCountryRequest;
use App\Repositories\AdminPanel\CountryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CountryController extends AppBaseController
{
    /** @var  CountryRepository */
    private $countryRepository;

    public function __construct(CountryRepository $countryRepo)
    {
        $this->countryRepository = $countryRepo;
    }

    /**
     * Display a listing of the Country.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $countries = $this->countryRepository->all();

        return view('adminPanel.countries.index')
            ->with('countries', $countries);
    }

    /**
     * Show the form for creating a new Country.
     *
     * @return Response
     */
    public function create()
    {
        return view('adminPanel.countries.create');
    }

    /**
     * Store a newly created Country in storage.
     *
     * @param CreateCountryRequest $request
     *
     * @return Response
     */
    public function store(CreateCountryRequest $request)
    {
        $input = $request->all();

        $country = $this->countryRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/countries.singular')]));

        return redirect(route('adminPanel.countries.index'));
    }

    /**
     * Display the specified Country.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $country = $this->countryRepository->find($id);

        if (empty($country)) {
            Flash::error(__('messages.not_found', ['model' => __('models/countries.singular')]));

            return redirect(route('adminPanel.countries.index'));
        }

        return view('adminPanel.countries.show')->with('country', $country);
    }

    /**
     * Show the form for editing the specified Country.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $country = $this->countryRepository->find($id);

        if (empty($country)) {
            Flash::error(__('messages.not_found', ['model' => __('models/countries.singular')]));

            return redirect(route('adminPanel.countries.index'));
        }

        return view('adminPanel.countries.edit')->with('country', $country);
    }

    /**
     * Update the specified Country in storage.
     *
     * @param int $id
     * @param UpdateCountryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCountryRequest $request)
    {
        $country = $this->countryRepository->find($id);

        if (empty($country)) {
            Flash::error(__('messages.not_found', ['model' => __('models/countries.singular')]));

            return redirect(route('adminPanel.countries.index'));
        }

        $country = $this->countryRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/countries.singular')]));

        return redirect(route('adminPanel.countries.index'));
    }

    /**
     * Remove the specified Country from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $country = $this->countryRepository->find($id);

        if (empty($country)) {
            Flash::error(__('messages.not_found', ['model' => __('models/countries.singular')]));

            return redirect(route('adminPanel.countries.index'));
        }

        $this->countryRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/countries.singular')]));

        return redirect(route('adminPanel.countries.index'));
    }
}
