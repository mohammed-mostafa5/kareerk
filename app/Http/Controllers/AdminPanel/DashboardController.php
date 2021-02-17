<?php

namespace App\Http\Controllers\AdminPanel;

use App\Models\Freelancer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Job;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $freelancersCount = Freelancer::get()->count();
        $clientsCount = Client::get()->count();
        $jobsCount = Job::get()->count();
        // dd('home');
        return view('adminPanel.home', compact('freelancersCount', 'clientsCount', 'jobsCount'));
    }
}
