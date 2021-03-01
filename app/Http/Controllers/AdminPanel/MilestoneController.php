<?php

namespace App\Http\Controllers\AdminPanel;

use Flash;
use Response;
use App\Models\SiteOption;
use Illuminate\Http\Request;
use App\Models\ProposalMilestone;
use App\Http\Controllers\AppBaseController;
use App\Repositories\AdminPanel\JobRepository;
use App\Http\Requests\AdminPanel\CreateJobRequest;
use App\Http\Requests\AdminPanel\UpdateJobRequest;

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


    public function underReview($id)
    {
        $milestone = ProposalMilestone::find($id);

        $milestone->update(['admin_status' => 2]);

        return back();
    }

    public function solved($id)
    {
        $milestone = ProposalMilestone::find($id);

        $milestone->update(['status' => 3, 'admin_status' => 3]);

        return back();
    }

    public function notSolved($id)
    {
        $milestone = ProposalMilestone::find($id);

        $milestone->update(['admin_status' => 4]);

        return back();
    }

    public function pay($id)
    {
        $milestone = ProposalMilestone::find($id);
        $user = $milestone->proposal->freelancer->user;

        $milestonePercentage = SiteOption::first()->milestone_percentage;
        $milestoneFees = $milestone->amount / 100  * $milestonePercentage;
        // dd($milestone->amount);

        $user->increment('balance', $milestone->amount);

        $user->transactions()->create([
            'user_id' => $user->id,
            'value'   => $milestone->amount,
            'action'  => 4,
        ]);

        $user->decrement('balance', $milestoneFees);

        $user->transactions()->create([
            'user_id' => $user->id,
            'value'   => -$milestoneFees,
            'action'  => 3,
        ]);

        $milestone->update(['admin_status' => 5]);

        return back();
    }

    public function refund($id)
    {
        $milestone = ProposalMilestone::find($id);

        $milestone->update(['admin_status' => 6]);

        return back();
    }
}
