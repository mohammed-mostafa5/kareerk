<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateSkillRequest;
use App\Http\Requests\AdminPanel\UpdateSkillRequest;
use App\Repositories\AdminPanel\SkillRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Service;
use App\Models\Skill;
use Illuminate\Http\Request;
use Flash;
use Response;

class SkillController extends AppBaseController
{
    /** @var  SkillRepository */
    private $skillRepository;

    public function __construct(SkillRepository $skillRepo)
    {
        $this->skillRepository = $skillRepo;
    }

    /**
     * Display a listing of the Skill.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $skills = $this->skillRepository->all();

        return view('adminPanel.skills.index')
            ->with('skills', $skills);
    }

    /**
     * Show the form for creating a new Skill.
     *
     * @return Response
     */
    public function create()
    {
        $services = Service::active()->get()->pluck('name', 'id');
        $parents = Skill::parent()->get()->pluck('name', 'id');

        return view('adminPanel.skills.create', compact('services', 'parents'));
    }

    /**
     * Store a newly created Skill in storage.
     *
     * @param CreateSkillRequest $request
     *
     * @return Response
     */
    public function store(CreateSkillRequest $request)
    {
        $input = $request->all();

        $skill = $this->skillRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/skills.singular')]));

        return redirect(route('adminPanel.skills.index'));
    }

    /**
     * Display the specified Skill.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $skill = $this->skillRepository->find($id);

        if (empty($skill)) {
            Flash::error(__('messages.not_found', ['model' => __('models/skills.singular')]));

            return redirect(route('adminPanel.skills.index'));
        }

        return view('adminPanel.skills.show')->with('skill', $skill);
    }

    /**
     * Show the form for editing the specified Skill.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $skill = $this->skillRepository->find($id);
        $services = Service::active()->get()->pluck('name', 'id');

        $parents = Skill::parent()->get()->pluck('name', 'id');
        if (empty($skill)) {
            Flash::error(__('messages.not_found', ['model' => __('models/skills.singular')]));

            return redirect(route('adminPanel.skills.index'));
        }

        return view('adminPanel.skills.edit', compact('services', 'skill', 'parents'));
    }

    /**
     * Update the specified Skill in storage.
     *
     * @param int $id
     * @param UpdateSkillRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSkillRequest $request)
    {
        $skill = $this->skillRepository->find($id);

        if (empty($skill)) {
            Flash::error(__('messages.not_found', ['model' => __('models/skills.singular')]));

            return redirect(route('adminPanel.skills.index'));
        }

        $skill = $this->skillRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/skills.singular')]));

        return redirect(route('adminPanel.skills.index'));
    }

    /**
     * Remove the specified Skill from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $skill = $this->skillRepository->find($id);

        if (empty($skill)) {
            Flash::error(__('messages.not_found', ['model' => __('models/skills.singular')]));

            return redirect(route('adminPanel.skills.index'));
        }

        $this->skillRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/skills.singular')]));

        return redirect(route('adminPanel.skills.index'));
    }
}
