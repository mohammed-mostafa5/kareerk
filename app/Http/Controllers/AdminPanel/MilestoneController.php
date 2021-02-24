<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateJobRequest;
use App\Http\Requests\AdminPanel\UpdateJobRequest;
use App\Repositories\AdminPanel\JobRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\ProposalMilestone;
use Illuminate\Http\Request;
use Flash;
use Response;

class MilestoneController extends AppBaseController
{

    public function index(Request $request)
    {
        $milestones = ProposalMilestone::whereIn('status', [3, 4])->get();

        return view('adminPanel.milestones.index', compact('milestones'));
    }

    public function show($id)
    {
        $milestone = ProposalMilestone::find($id);

        if (empty($milestone)) {
            Flash::error(__('messages.not_found', ['model' => __('models/milestones.singular')]));

            return redirect(route('adminPanel.milestones.index'));
        }

        return view('adminPanel.milestones.show')->with('milestone', $milestone);
    }

    public function done($id)
    {
        $milestone = ProposalMilestone::find($id);

        $milestone->update(['status' => 3, 'admin_status' => 3]);

        return back();
    }

    public function underReview($id)
    {
        $milestone = ProposalMilestone::find($id);

        $milestone->update(['admin_status' => 2]);

        return back();
    }
}
