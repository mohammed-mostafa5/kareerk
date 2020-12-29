<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateColorRequest;
use App\Http\Requests\AdminPanel\UpdateColorRequest;
use App\Repositories\AdminPanel\ColorRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ColorController extends AppBaseController
{
    /** @var  ColorRepository */
    private $colorRepository;

    public function __construct(ColorRepository $colorRepo)
    {
        $this->colorRepository = $colorRepo;
    }

    /**
     * Display a listing of the Color.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $colors = $this->colorRepository->paginate(10);

        return view('adminPanel.colors.index')
            ->with('colors', $colors);
    }

    /**
     * Show the form for creating a new Color.
     *
     * @return Response
     */
    public function create()
    {
        return view('adminPanel.colors.create');
    }

    /**
     * Store a newly created Color in storage.
     *
     * @param CreateColorRequest $request
     *
     * @return Response
     */
    public function store(CreateColorRequest $request)
    {
        $input = $request->all();

        $color = $this->colorRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/colors.singular')]));

        return redirect(route('adminPanel.colors.index'));
    }

    /**
     * Display the specified Color.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $color = $this->colorRepository->find($id);

        if (empty($color)) {
            Flash::error(__('messages.not_found', ['model' => __('models/colors.singular')]));

            return redirect(route('adminPanel.colors.index'));
        }

        return view('adminPanel.colors.show')->with('color', $color);
    }

    /**
     * Show the form for editing the specified Color.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $color = $this->colorRepository->find($id);

        if (empty($color)) {
            Flash::error(__('messages.not_found', ['model' => __('models/colors.singular')]));

            return redirect(route('adminPanel.colors.index'));
        }

        return view('adminPanel.colors.edit')->with('color', $color);
    }

    /**
     * Update the specified Color in storage.
     *
     * @param int $id
     * @param UpdateColorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateColorRequest $request)
    {
        $color = $this->colorRepository->find($id);

        if (empty($color)) {
            Flash::error(__('messages.not_found', ['model' => __('models/colors.singular')]));

            return redirect(route('adminPanel.colors.index'));
        }

        $color = $this->colorRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/colors.singular')]));

        return redirect(route('adminPanel.colors.index'));
    }

    /**
     * Remove the specified Color from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $color = $this->colorRepository->find($id);

        if (empty($color)) {
            Flash::error(__('messages.not_found', ['model' => __('models/colors.singular')]));

            return redirect(route('adminPanel.colors.index'));
        }

        $this->colorRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/colors.singular')]));

        return redirect(route('adminPanel.colors.index'));
    }
}
