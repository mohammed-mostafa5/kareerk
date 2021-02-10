<?php

namespace App\Http\Controllers\API;

use App\Models\Faq;
use App\Models\Job;
use App\Models\Chat;
use App\Models\Meta;
use App\Models\Page;
use App\Models\User;
use App\Models\Skill;
use App\Models\Client;
use App\Models\Slider;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Deposit;
use App\Models\Message;
use App\Models\Product;
use App\Models\Service;
use App\Models\Category;
use App\Models\JobFiles;
use App\Models\Language;
use App\Models\Freelancer;
use App\Models\Invitation;
use App\Models\Newsletter;
use App\Models\SocialLink;
use App\Events\SendMessage;
use App\Helpers\MailsTrait;
use App\Models\ChatContact;
use App\Models\FaqCategory;
use App\Models\Information;
use App\Models\JobProposal;
use App\Models\MessageFiles;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\ProductReview;
use App\Events\ProductDetails;
use App\Models\ProductGallery;
use App\Events\SendNotification;
use App\Mail\ProductReceivedMail;
use App\Mail\ProductDeliveredMail;
use Illuminate\Support\Facades\DB;
use App\Models\FreelancerEducation;
use App\Helpers\HelperFunctionTrait;
use App\Http\Controllers\Controller;
use App\Models\FreelancerEmployment;
use App\Models\ProposalMilestone;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Builder;

class HomeController extends Controller
{
    use HelperFunctionTrait, MailsTrait;

    public function test()
    {
        return ('test home');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'     => 'required|email',
            'password'  => 'required',
        ]);
        $freelancer = null;
        $client = null;

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['msg' => __('lang.wrongCredential')], 401);
        } else {
            $user = auth('api')->user();
            if ($user->status == 'Inactive') {
                return response()->json(['msg' => __('lang.notActive')], 403);
            }
        }
        $user = auth('api')->user();
        if ($user->userable_type == 'App\Models\Freelancer') {
            $freelancer = Freelancer::with('services', 'mainService', 'skills', 'education', 'employment', 'languages')->find($user->userable_id);
        } else {
            $client = Client::find($user->userable_id);
        }

        $chatContactsData = $this->userChatContacts(true);

        return response()->json(compact('user', 'token', 'freelancer', 'client', 'chatContactsData'));
    }


    public function register(Request $request)
    {
        $validated = $request->validate([
            'name'       => 'required|string|min:3',
            'phone'      => 'required',
            'email'      => 'required|email|max:255|unique:users',
            'password'   => 'required|string|min:6|confirmed',
            'country_id' => 'required',
            'user_type'  => 'required',
        ]);
        $freelancer = null;
        $client = null;

        if ($request->user_type == 1) {
            $client = Client::create();
            $validated['userable_id'] = $client->id;
            $validated['userable_type'] = 'App\Models\Client';
        } else {
            $freelancer = Freelancer::create();
            $validated['userable_id'] = $freelancer->id;
            $validated['userable_type'] = 'App\Models\Freelancer';
        }
        $user = User::create($validated);

        if ($user->userable_type == 'App\Models\Freelancer') {
            $freelancer = Freelancer::with('services', 'mainService', 'skills', 'education', 'employment', 'languages')->find($user->userable_id);
        } else {
            $client = Client::find($user->userable_id);
        }
        $token = auth('api')->login($user);
        return response()->json(compact('user', 'token', 'freelancer', 'client'));
    }

    public function logout()
    {
        auth('api')->logout();

        return response()->json(['msg' => __('lang.logoutMsg')]);
    }

    ##########################################################################

    public function pages($id)
    {
        $page = Page::with('paragraph', 'image')->find($id);

        return response()->json(compact('page'));
    }

    public function services()
    {
        $services = Service::parent()->with('children')->active()->get();

        return response()->json(compact('services'));
    }

    public function landingPage()
    {
        $slider = Slider::active()->orderBy('in_order_to')->get();
        $services = Service::active()->get();

        return response()->json(compact('slider', 'services'));
    }

    public function landingPageSearch()
    {
        $servicesQuery = Service::query();

        if (request()->filled('service')) {
            $servicesQuery->whereTranslationLike('name', '%' . request('service') . '%');
        }

        $services = $servicesQuery->get();

        return response()->json(compact('services'));
    }

    public function freelancers()
    {
        $freelancers = User::where('userable_type', 'App\Models\Freelancer')->with('userable')->active()->get();

        return response()->json(compact('freelancers'));
    }

    public function skills()
    {
        $skills = Skill::parent()->with('children')->active()->get();

        return response()->json(compact('skills'));
    }

    public function countries()
    {
        $countries = Country::active()->get();

        return response()->json(compact('countries'));
    }

    public function languages()
    {
        $languages = Language::active()->get();

        return response()->json(compact('languages'));
    }

    public function job($id)
    {
        $job = Job::with('client.user', 'files', 'skills', 'service.mainService', 'proposals.freelancer.user', 'proposals.milestones', 'proposals.files')->find($id);

        return response()->json(compact('job'));
    }

    public function proposal($id)
    {
        $proposal = JobProposal::with('freelancer.user', 'job', 'milestones', 'files')->find($id);

        return response()->json(compact('proposal'));
    }

    public function freelancer($id)
    {
        $freelancer = Freelancer::with('services', 'mainService', 'skills', 'education', 'employment', 'languages')->find($id);

        return response()->json(compact('freelancer'));
    }

    ##########################################################################

    // Freelancer Step 1
    public function freelancerExpertise(Request $request)
    {
        $validated = $request->validate([
            'main_service_id' => 'required',
            'expertise_level' => 'required',
        ]);
        $freelancer = auth('api')->user();

        $freelancer->userable->update($validated);
        $freelancer->userable->services()->sync($request->service_id);
        $freelancer->userable->skills()->sync($request->skill_id);
        $freelancer->userable->update(['step' => 2]);
        $freelancerData = $freelancer->userable->load('services', 'mainService', 'skills', 'education', 'employment', 'languages');
        return response()->json(compact('freelancerData'));
    }

    // Freelancer Step 2
    public function freelancerEducation(Request $request)
    {
        $educations = json_decode($request->education);
        $freelancer = auth('api')->user()->userable;
        if ($freelancer->education()) {
            $freelancer->education()->delete();
        }
        foreach ($educations as $education) {
            FreelancerEducation::create([
                'freelancer_id' => $freelancer->id,
                'school'        => $education->school,
                'study'         => $education->study,
                'degree'        => $education->degree,
                'from_date'     => $education->from_date,
                'to_date'       => $education->to_date,
                'description'   => $education->description,
            ]);
        }

        $freelancer->update(['step' => 3]);
        $freelancerData = $freelancer->load('services', 'mainService', 'skills', 'education', 'employment', 'languages');
        return response()->json(compact('freelancerData'));
    }

    // Freelancer Step 3
    public function freelancerEmployment(Request $request)
    {
        $employments = json_decode($request->employment);
        $freelancer = auth('api')->user()->userable;

        if ($freelancer->employment()) {
            $freelancer->employment()->delete();
        }

        foreach ($employments as $employment) {
            $toDate = $employment->to_date ?? null;

            FreelancerEmployment::create([
                'freelancer_id' => $freelancer->id,
                'country_id'    => $employment->country_id,
                'city'          => $employment->city,
                'company'       => $employment->company,
                'title'         => $employment->title,
                'from_date'     => $employment->from_date,
                'to_date'       => $toDate,
                'description'   => $employment->description,
                'still_working' => $employment->still_working,
            ]);
        }

        $freelancer->update(['step' => 4]);
        $freelancerData = $freelancer->load('services', 'mainService', 'skills', 'education', 'employment', 'languages');
        return response()->json(compact('freelancerData'));
    }

    // Freelancer Step 4
    public function freelancerLanguages(Request $request)
    {
        $freelancer = auth('api')->user()->userable;
        $languages = json_decode($request->languages, true);

        $freelancer->languages()->sync($languages);

        $freelancer->update(['step' => 5]);
        $freelancerData = $freelancer->load('services', 'mainService', 'skills', 'education', 'employment', 'languages');
        return response()->json(compact('freelancerData'));
    }

    // Freelancer Step 5
    public function freelancerHourlyRate(Request $request)
    {
        $freelancer = auth('api')->user();
        $request->validate([
            'hourly_rate' => 'required',
        ]);
        $freelancer->userable->update(['step' => 6, 'hourly_rate' => $request->hourly_rate]);
        $freelancerData = $freelancer->userable->load('services', 'mainService', 'skills', 'education', 'employment', 'languages');
        return response()->json(compact('freelancerData'));
    }

    // Freelancer Step 6
    public function freelancerTitleOverview(Request $request)
    {
        $freelancer = auth('api')->user();
        $request->validate([
            'title'     => 'required',
            'overview'  => 'required',
        ]);
        $freelancer->userable->update(['step' => 7, 'title' => $request->title, 'overview' => $request->overview]);
        $freelancerData = $freelancer->userable->load('services', 'mainService', 'skills', 'education', 'employment', 'languages');
        return response()->json(compact('freelancerData'));
    }

    // Freelancer Step 7
    public function freelancerProfilePhoto(Request $request)
    {
        $freelancer = auth('api')->user();
        $request->validate([
            'photo' => 'required',
        ]);
        $freelancer->userable->update(['step' => 7, 'photo' => $request->photo]);
        $freelancerData = $freelancer->userable->load('services', 'mainService', 'skills', 'education', 'employment', 'languages');
        return response()->json(compact('freelancerData'));
    }

    // Freelancer Step 8
    public function freelancerLocation(Request $request)
    {
        $request->validate([
            'city'    => 'required',
            'address' => 'required',
        ]);

        $freelancer = auth('api')->user()->userable;

        $status = $freelancer->status < 1 ? 1 :  $freelancer->status;
        $freelancer->update(['step' => 8, 'status' => $status, 'city' => $request->city, 'address' => $request->address]);
        $freelancerData = $freelancer->load('services', 'mainService', 'skills', 'education', 'employment', 'languages');
        return response()->json(compact('freelancerData'));
    }

    // Freelancer Finish Profile
    public function freelancerFinishProfile()
    {
        $freelancer = auth('api')->user()->userable;
        $status = $freelancer->status < 2 ? 2 :  $freelancer->status;
        $freelancer->update(['status' => $status]);
        $freelancerData = $freelancer->load('services', 'mainService', 'skills', 'education', 'employment', 'languages');
        return response()->json(compact('freelancerData'));
    }

    public function submitProposal(Request $request)
    {
        $validated = $request->validate([
            'job_id'        => 'required',
            'expected_time' => 'required',
            'cover_letter'  => 'required',
            'file'          => 'nullable|array',
            'file.*'        => 'nullable|mimes:jpeg,png,jpg,pdf,docx',
        ]);

        $job = Job::find($request->job_id);
        $milestones = json_decode($request->milestone);

        $validated['freelancer_id'] = auth('api')->user()->userable_id;

        $proposal = $job->proposals()->create($validated);
        if ($milestones) {
            foreach ($milestones as $milestone) {
                $proposal->milestones()->create([
                    'description'    => $milestone->description,
                    'duration'       => $milestone->duration,
                    'duration_type'  => $milestone->duration_type,
                    'amount'         => $milestone->amount,
                    'expected_start' => $milestone->expected_start,
                ]);
            }
        }

        foreach ($request->file as $file) {
            $proposal->files()->create([
                'proposal_id' => $proposal->id,
                'file' => $file
            ]);
        }

        $proposalData = $proposal->load('milestones', 'files');

        $invitation = $job->invitations()->where('freelancer_id', $proposal->freelancer_id)->first();

        if ($invitation) {
            $invitation->pivot->update(['proposaled' => 1]);
        }

        $notification = Notification::create([
            'user_id'        => $proposal->job->client_id,
            'other_user_id'  => $proposal->freelancer_id,
            'text'           => 'New Job Proposal',
            'type'           => 'job',
            'notifable_id'   => $job->id,
            'notifable_type' => 'App\Models\Job',
        ]);

        event(new SendNotification($notification));

        return response()->json(compact('proposalData'));
    }

    public function freelancerHome()
    {
        $jobsQuery = Job::public()->open()->with('service');

        if (request()->filled('services')) {
            $jobsQuery->whereIn('service_id', request('services'));
        } elseif (request()->filled('main_service_id')) {
            // $jobsQuery->whereIn('service_id', function ($subQuery) {
            //     $subQuery->select('id')->from('services')
            //         ->where('parent_id', request('main_service_id'));
            // });
            $jobsQuery->whereHas('service', function (Builder $query) {
                $query->where('parent_id', request('main_service_id'));
            });
        }

        if (request()->filled('skills')) {
            $jobsQuery->whereHas('skills', function (Builder $query) {
                $query->whereIn('skill_id', request('skills'));
            });
        }

        if (request()->filled('title')) {
            $jobsQuery->where('title', 'like', '%' .  request('title') . '%');
        }

        if (request()->filled('expertise_level')) {
            $jobsQuery->where('expertise_level', request('expertise_level'));
        }

        if (request()->filled('payment_type')) {
            $jobsQuery->where('payment_type', request('payment_type'));
        }

        $jobs = $jobsQuery->get();

        return response()->json(compact('jobs'));
    }

    public function freelancerJobs()
    {
        $jobs = Job::whereHas('proposals', function (Builder $query) {
            $query->where('freelancer_id', auth('api')->user()->userable_id)
                ->where('accepted', 1);
        })->get();

        $jobs->load('proposals', 'files', 'skills', 'service.mainService');

        return response()->json(compact('jobs'));
    }

    public function freelancerProposals()
    {
        $jobs = Job::whereHas('proposals', function (Builder $query) {
            $query->where('freelancer_id', auth('api')->user()->userable_id);
        })->get();

        $jobs->load('proposals', 'files', 'skills', 'service.mainService');

        return response()->json(compact('jobs'));
    }

    public function freelancerInvitations()
    {
        $freelancer = Freelancer::find(auth('api')->user()->userable_id);
        $invitations = $freelancer->invitations()->with('job.files', 'job.skills', 'job.service.mainService')->get();

        return response()->json(compact('invitations'));
    }

    ##########################################################################

    // Create Job
    public function createJob(Request $request)
    {
        $jobData = Job::where('status', 0)->firstOrCreate([
            'client_id' => auth('api')->user()->userable->id
        ]);
        $jobData->load('client.user', 'files', 'skills', 'service.mainService');
        return response()->json(compact('jobData'));
    }

    // Job Step 1
    public function jobTitle(Request $request)
    {
        $validated = $request->validate([
            'job_id'     => 'required',
            'title'      => 'required',
            'service_id' => 'required',
        ]);

        $job = Job::find($request->job_id);
        $status = $job->status < 1 ? 1 :  $job->status;
        $job->update([
            'step'       => 2,
            'status'     => $status,
            'title'      => $request->title,
            'service_id' => $request->service_id
        ]);

        $jobData = $job->load('client.user', 'files', 'skills', 'service.mainService');

        return response()->json(compact('jobData'));
    }

    // Job Step 2
    public function jobDescription(Request $request)
    {
        $validated = $request->validate([
            'job_id'        => 'required',
            'description'   => 'required',
            'file'          => 'array',
            'file.*'        => 'nullable|mimes:jpeg,png,jpg,pdf,docx',
            'deleted_files' => 'nullable|array',
        ]);
        $job = Job::find($request->job_id);

        $job->update(['step' => 3, 'description' => $request->description]);

        if (request()->filled('deleted_files')) {
            JobFiles::whereIn('id', request('deleted_files'))->delete();
        }

        if ($request->file) {
            foreach ($request->file as $file) {
                JobFiles::create([
                    'job_id' => $job->id,
                    'file' => $file
                ]);
            }
        }
        $jobData = $job->load('client.user', 'files', 'skills', 'service.mainService');
        return response()->json(compact('jobData'));
    }

    // Job Step 3
    public function jobExpertise(Request $request)
    {
        $validated = $request->validate([
            'job_id'          => 'required',
            'expertise_level' => 'required',
        ]);
        $job = Job::find($request->job_id);

        $job->update(['step' => 4, 'expertise_level' => $request->expertise_level]);
        $job->skills()->sync($request->skill_id);

        $jobData = $job->load('client.user', 'files', 'skills', 'service.mainService');
        return response()->json(compact('jobData'));
    }

    // Job Step 4
    public function jobVisibility(Request $request)
    {
        $validated = $request->validate([
            'job_id'            => 'required',
            'visibility'        => 'required',
            'freelancers_count' => 'required',
        ]);
        $job = Job::find($request->job_id);

        $job->update(['step' => 5, 'visibility' => $request->visibility, 'freelancers_count' => $request->freelancers_count]);

        $jobData = $job->load('client.user', 'files', 'skills', 'service.mainService');
        return response()->json(compact('jobData'));
    }

    // Job Step 5
    public function jobBudget(Request $request)
    {
        $validated = $request->validate([
            'job_id'        => 'required',
            'budget'        => 'required',
            'payment_type'  => 'required',
            'expected_time' => 'required',
        ]);
        $job = Job::find($request->job_id);
        $status = $job->status < 2 ? 2 :  $job->status;
        $job->update([
            'budget'        => $request->budget,
            'payment_type'  => $request->payment_type,
            'expected_time' => $request->expected_time,
            'status'        => $status
        ]);

        $jobData = $job->load('client.user', 'files', 'skills', 'service.mainService');

        return response()->json(compact('jobData'));
    }

    // Job Publish
    public function jobPublish(Request $request)
    {

        $job = Job::find($request->job_id);
        $status = $job->status < 3 ? 3 :  $job->status;
        $job->update(['status' => $status]);

        $jobData = $job->load('client.user', 'files', 'skills', 'service.mainService');

        return response()->json(compact('jobData'));
    }

    public function freelancersSearch()
    {
        $freelancersQuery = Freelancer::query();

        if (request()->filled('name')) {
            $freelancersQuery->whereHas('user', function (Builder $query) {
                $query->where('name', 'like', '%' . request('name') . '%');
            });
        }

        if (request()->filled('service_id')) {
            $freelancersQuery->whereHas('services', function (Builder $query) {
                $query->where('services.id', request('service_id'));
            });
        }

        $freelancers = $freelancersQuery->with('user', 'services', 'mainService', 'skills', 'education', 'employment', 'languages')->get();

        return response()->json(compact('freelancers'));
    }


    public function jobInvitation(Request $request)
    {
        $request->validate([
            'freelancer_id'   => 'array',
            'freelancer_id.*' => 'required',
        ]);
        $job = Job::find($request->job_id);

        if ($job->visibility != 2) {
            return response()->json(['msg' => 'Job visibility must be invited only'], 420);
        }

        $job->invitations()->syncWithoutDetaching(request('freelancer_id'));

        $jobData = $job->with('invitations')->get();

        foreach (request('freelancer_id') as $freelancerId) {
            $notification = Notification::create([
                'user_id'        => $freelancerId,
                'other_user_id'  => $job->client_id,
                'text'           => 'New Job Invitation',
                'type'           => 'job',
                'notifable_id'   => $job->id,
                'notifable_type' => 'App\Models\Job',
            ]);
        }

        event(new SendNotification($notification));

        return response()->json(compact('jobData'));
    }

    public function clientJobs()
    {
        $jobs = Job::where('client_id', auth('api')->user()->userable->id)->with('client.user', 'files', 'skills', 'service.mainService')->get();

        return response()->json(compact('jobs'));
    }

    public function clientUnpublishedJobs()
    {
        $jobs = Job::where('client_id', auth('api')->user()->userable_id)
            ->whereIn('status', [1, 2])
            ->with('client.user', 'files', 'skills', 'service.mainService')
            ->get();

        return response()->json(compact('jobs'));
    }

    public function clientInvitations()
    {
        $client = Client::find(auth('api')->user()->userable_id);
        $invitations = $client->invitations()->with('freelancer.services', 'freelancer.mainService', 'freelancer.skills', 'freelancer.education', 'freelancer.employment', 'freelancer.languages')->get();

        return response()->json(compact('invitations'));
    }

    public function acceptProposal()
    {
        $job = Job::find(request('job_id'));
        $proposal = $job->proposals()->where('id', request('proposal_id'));
        $proposal->update(['accepted' => 1]);

        $proposalData  = $proposal->first();

        $notification = Notification::create([
            'user_id'        => $proposalData->freelancer_id,
            'other_user_id'  => $job->client_id,
            'text'           => 'Accept Proposal',
            'type'           => 'job',
            'notifable_id'   => $job->id,
            'notifable_type' => 'App\Models\Job',
        ]);
        event(new SendNotification($notification));

        return response()->json(compact('proposalData'));
    }

    public function clientProfile()
    {
        $jobs = Job::where('client_id', request('client_id'))->with('client.user', 'files', 'skills', 'service.mainService', 'proposals.freelancer')->get();

        return response()->json(compact('jobs'));
    }

    ##########################################################################

    // Chat
    public function userChatContacts($flag = false)
    {
        $this->handleChatContact();

        $chatContactsQuery = ChatContact::join('chats', 'chat_contacts.chat_id', '=', 'chats.id')
            ->where('user_id', auth('api')->id())
            ->with(
                'otherUser:id,name,email,phone,userable_id,userable_type,country_id',
                'otherUser.country',
                'otherUser.userable',
                'chat',
            )
            ->orderBy('chats.updated_at', 'desc');

        if ($flag) {
            $chatContactsQuery->whereNotNull('latest_message');
        }

        $chatContacts = $chatContactsQuery->get();

        $unseenMessagesCount = $chatContacts->sum('unseen_count');

        if ($flag) {
            return compact('chatContacts', 'unseenMessagesCount');
        }

        return response()->json(compact('chatContacts', 'unseenMessagesCount'));
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'chat_id' => 'required',
            'text'    => 'nullable',
            'file'    => 'nullable|array',
            'file.*'  => 'nullable|image',
        ]);

        $user = auth('api')->user();

        $request['user_id'] = $user->id;
        $message = Message::create($request->all());

        $files = $request->file;
        if ($files) {
            foreach ($files as $file) {
                MessageFiles::create([
                    'message_id' => $message->id,
                    'file'       => $file
                ]);
            };
        }

        Chat::where('id', $message->chat_id)->update([
            'latest_message' => $message->text ?? 'Photo'
        ]);

        ChatContact::where('chat_id', request('chat_id'))->where('user_id', '!=', $user->id)
            ->increment('unseen_count');

        Message::where('chat_id', $message->chat_id)->where('user_id', '!=', $user->id)
            ->update(['seen' => 1]);

        ChatContact::where('chat_id', request('chat_id'))->where('user_id', $user->id)
            ->update(['unseen_count' => 0]);

        $otherContactId = $user->chatContacts()->where('chat_id', request('chat_id'))->first()->id;

        event(new SendMessage($message, $otherContactId));

        return response()->json(compact('message'));
    }

    public function messages(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
        ]);

        $chatId = $this->handleChatContact();

        // messages get reversed in client
        $messages = Message::where('chat_id', $chatId)->with('user.userable', 'files')->latest('id')->paginate(10);

        Message::where('chat_id', $chatId)
            ->where('user_id', '!=', auth('api')->id())
            ->update(['seen' => 1]);

        return response()->json(compact('messages'));
    }

    private function handleChatContact()
    {
        if (!request()->filled('user_id')) {
            return null;
        }
        $authUserId = auth('api')->id();
        $otherUserId = request('user_id');
        if ($authUserId == $otherUserId) {
            // dd('ok');
            return response()->json(['msg' => 'invalid user_id'], 409);
        }

        $contact = ChatContact::where(['user_id' => $authUserId, 'other_user_id' => $otherUserId])->first();
        // dd($contact);

        if (!$contact) {
            $chat = Chat::create(['created_by' => $authUserId]);

            $contact = $chat->contacts()->create([
                'user_id'       => $authUserId,
                'other_user_id' => $otherUserId
            ]);
            $chat->contacts()->create([
                'user_id'       => $otherUserId,
                'other_user_id' => $authUserId
            ]);
        }

        return $contact->chat_id;
    }

    ##########################################################################

    // Notifications
    public function notifications()
    {
        $userId = auth('api')->id();

        $notifications = Notification::where('user_id', $userId)->with('otherUser', 'notifable')->get();
        $unseenCount = $notifications->where('user_id', $userId)->where('seen', 0)->count();

        return response()->json(compact('notifications', 'unseenCount'));
    }

    public function deleteNotification($id)
    {
        $notification = Notification::find($id);
        if (!$notification || $notification->user_id != auth('api')->id()) {
            return response()->json(['msg' => 'cannot delete this notification'], 409);
        }

        $notification->delete();

        return response()->json(['msg' => 'ok']);
    }

    public function clearNotifications()
    {
        Notification::where('user_id', auth('api')->id())->delete();

        return response()->json(['msg' => 'ok']);
    }

    public function notificationSeen($id)
    {
        $notification = Notification::find($id);
        if ($notification && $notification->user_id == auth('api')->id()) {
            $notification->update(['seen' => 1]);
        }

        return response()->json(['msg' => 'ok']);
    }


    // Milestones Handle
    public function addMilestone(Request $request)
    {
        $request->validate([
            'proposal_id'       => 'required',
            'description'       => 'required',
            'duration'          => 'required',
            'duration_type'     => 'required',
            'amount'            => 'required',
            'expected_start'    => 'required',
        ]);

        $milestone = ProposalMilestone::create([
            'proposal_id'       => $request->proposal_id,
            'description'       => $request->description,
            'duration'          => $request->duration,
            'duration_type'     => $request->duration_type,
            'amount'            => $request->amount,
            'expected_start'    => $request->expected_start,
        ]);

        return response()->json(compact('milestone'));
    }

    public function updateMilestone(Request $request)
    {
        $request->validate([
            'milestone_id'      => 'required',
            'proposal_id'       => 'required',
            'description'       => 'required',
            'duration'          => 'required',
            'duration_type'     => 'required',
            'amount'            => 'required',
            'expected_start'    => 'required',
        ]);
        $milestone = ProposalMilestone::findOrFail($request->milestone_id);
        $milestone->update([
            'proposal_id'       => $request->proposal_id,
            'description'       => $request->description,
            'duration'          => $request->duration,
            'duration_type'     => $request->duration_type,
            'amount'            => $request->amount,
            'expected_start'    => $request->expected_start,
        ]);

        return response()->json(compact('milestone'));
    }

    public function deleteMilestone(Request $request)
    {
        $request->validate([
            'milestone_id'      => 'required',
        ]);
        $milestone = ProposalMilestone::findOrFail($request->milestone_id);
        $milestone->delete();

        return response()->json(['msg' => 'Milestone Deleted Successfuly']);
    }

    public function milestonePayment(Request $request)
    {
        $request->validate([
            'milestone_id'      => 'required',
        ]);
        $milestone = ProposalMilestone::findOrFail($request->milestone_id);
        $milestone->update(['payment_at' => now()]);

        return response()->json(['msg' => 'Done']);
    }

    public function milestoneFinish(Request $request)
    {
        $request->validate([
            'milestone_id'      => 'required',
        ]);
        $milestone = ProposalMilestone::findOrFail($request->milestone_id);
        $milestone->update(['finished_at' => now()]);

        return response()->json(['msg' => 'Done']);
    }

    public function milestoneAccept(Request $request)
    {
        $request->validate([
            'milestone_id'      => 'required',
        ]);
        $milestone = ProposalMilestone::findOrFail($request->milestone_id);
        $milestone->update(['status' => 2]);

        return response()->json(['msg' => 'Done']);
    }

    public function milestoneDone(Request $request)
    {
        $request->validate([
            'milestone_id'      => 'required',
        ]);
        $milestone = ProposalMilestone::findOrFail($request->milestone_id);
        $milestone->update(['status' => 3]);

        return response()->json(['msg' => 'Done']);
    }

    public function milestoneHasProblem(Request $request)
    {
        $request->validate([
            'milestone_id'      => 'required',
        ]);
        $milestone = ProposalMilestone::findOrFail($request->milestone_id);
        $milestone->update(['status' => 4]);

        return response()->json(['msg' => 'Done']);
    }
























    // public function updatePersonalInformation(Request $request)
    // {
    //     $data = $request->validate([
    //         'phone' => 'required|numeric',
    //         "address" => "required|string|min:3|max:191",
    //     ]);

    //     $user = auth('api')->user();

    //     $user->update($data);

    //     return response()->json(compact('user'));
    // }

    // public function updatePassword(Request $request)
    // {
    //     $user = auth('api')->user();
    //     $password = $request->validate(['password' => 'required|string|min:6|confirmed']);
    //     if (Hash::check(request('old_password'), $user->password)) {

    //         $user->update($password);

    //         return response()->json(['msg',  'success']);
    //     }

    //     return response()->json(['msg',  'Wrong old password']);
    // }

    // public function logout()
    // {
    //     auth('api')->logout();

    //     return response()->json(['msg' => __('lang.logoutMsg')]);
    // }

    // public function home()
    // {
    //     $sliders = Slider::active()->inOrderToWeb()->get();
    //     $categories = Category::get();
    //     $products = Product::where('end_at', '>', now())->limit(9)->get();

    //     return response()->json(compact('sliders', 'categories', 'products'));
    // }

    // public function reviews()
    // {
    //     $reviews = ProductReview::where('in_home', 1)->with('user')->get();

    //     return response()->json(compact('reviews'));
    // }

    // public function informations()
    // {
    //     $informations = Information::get();

    //     $phone = $informations->where('id', 1)->first()->value;
    //     $phone2 = $informations->where('id', 2)->first()->value;
    //     $email = $informations->where('id', 3)->first()->value;
    //     $address = $informations->where('id', 4)->first()->value;

    //     $social = SocialLink::get();

    //     $facebook = $social->where('id', 1)->first()->link;
    //     $twitter = $social->where('id', 2)->first()->link;
    //     $instagram = $social->where('id', 3)->first()->link;
    //     $linkedIn = $social->where('id', 4)->first()->link;

    //     return response()->json(compact('phone', 'phone2', 'email', 'address', 'facebook', 'twitter', 'instagram', 'linkedIn'));
    // }

    // public function sendContactMessage(Request $request)
    // {
    //     $validated = $request->validate([
    //         'name' => 'required|string|min:3|max:191',
    //         'email' => 'required|email|min:3|max:191',
    //         'phone' => 'required',
    //         'message' => 'required|string|min:3',
    //     ]);
    //     Contact::create($validated);

    //     return response()->json(['msg' => 'success']);
    // }

    // public function newsletter(Request $request)
    // {
    //     $validated = $request->validate([
    //         'email' => 'required|email|min:3|max:191|unique:newsletters,email',
    //     ]);
    //     Newsletter::create($validated);

    //     return response()->json(['msg' => 'success']);
    // }

    // public function createProduct(Request $request)
    // {
    //     $validated = $request->validate([
    //         'name' => 'required|string|min:3',
    //         'category_id' => 'required',
    //         'description' => 'required|string|min:3',
    //         'min_price' => '',
    //         'number_of_items' => 'required',
    //         'category_id' => 'required',
    //         'photos' => 'required|array|min:6',
    //         'photos.*' => 'image',
    //     ]);

    //     $validated['user_id'] = auth('api')->id();
    //     $validated['code'] = uniqid();
    //     $product = Product::create($validated);

    //     foreach ($request->photos as $photo) {

    //         ProductGallery::create([
    //             'product_id' => $product->id,
    //             'photo' => $photo
    //         ]);
    //     }

    //     return response()->json(['msg' => 'success']);
    // }

    // public function categories()
    // {
    //     $categories = Category::get();

    //     return response()->json(compact('categories'));
    // }

    // public function products(Request $request)
    // {

    //     $perPage = request()->filled('per_page') ? request('per_page') : 9;

    //     $productsQuery = Product::where('end_at', '>', now());

    //     if ($request->filled('sort') == 'name') {
    //         $productsQuery->orderBy('name');
    //     } elseif ($request->filled('sort') == 'date') {
    //         $productsQuery->orderBy('created_at', 'desc');
    //     } else {
    //         $productsQuery->orderBy('created_at');
    //     }


    //     if ($request->filled('name')) {
    //         $productsQuery->where('name', 'like', '%' . request('name') . '%');
    //     }

    //     if ($request->filled('category_id')) {
    //         $productsQuery->where('category_id', request('category_id'));
    //     }

    //     $products = $productsQuery->paginate($perPage);

    //     return response()->json(compact('products'));
    // }

    // public function product($id)
    // {
    //     $product = Product::with(['category', 'biders' => function ($query) {
    //         $query->latest('pivot_id');
    //     }])->findOrFail($id);
    //     $product->increment('watched_count', 1);
    //     $biders = DB::table('product_user')->distinct('user_id')->count('user_id');

    //     return response()->json(compact('product', 'biders'));
    // }

    // public function addBid(Request $request, $productId)
    // {
    //     $user = auth('api')->user();
    //     $product = Product::findOrFail($productId);
    //     $deposit = $product->deposit;
    //     $highestValue = $product->highest_value ?? $product->start_bid_price;
    //     $minBid = $product->min_bid_price;

    //     if ($product->user_id == auth('api')->id()) {
    //         return response()->json(['msg' => __('lang.canotBid')], 420);
    //     }

    //     if ($product->end_at < now()) {
    //         return response()->json(['msg' => __('lang.auctionEnded')], 420);
    //     }

    //     $depositRecord = Deposit::where('user_id', $user->id)->where('product_id', $product->id);

    //     if ($depositRecord->count() == 0) {
    //         if ($user->balance < $deposit) {
    //             return response()->json(['msg' => __('lang.notEnoughBalance')], 420);
    //         }

    //         $user->decrement('balance', $deposit);
    //         // dd($user->balance);

    //         $user->transactions()->create([
    //             'user_id' => $user->id,
    //             'value' => -$deposit,
    //             'action' => 2,
    //         ]);

    //         $product->deposit()->sync([$user->id => ['deposit' => $deposit]]);
    //     }


    //     $request->validate([
    //         'value' => 'required|integer|min:' . $minBid,
    //     ]);

    //     $product->biders()->attach($user->id, ['value' => $highestValue + request('value')]);
    //     $product->update(['highest_value' => $highestValue + request('value'), 'winner_id' => $user->id]);

    //     $biders = $product->biders;
    //     $bidersCount = DB::table('product_user')->distinct('user_id')->count('user_id');
    //     $newBider = $product->biders()->latest('pivot_id')->first();

    //     $data = [
    //         'id' => $product->id,
    //         'highest_value' => $product->highest_value,
    //         'watched_count' => $product->watched_count,
    //         'total_bids'    => $product->total_bids,
    //         'active_biders' => $bidersCount,
    //         'check_deposit' => $product->check_deposit,
    //         'new_bider'     => $newBider,
    //     ];

    //     event(new ProductDetails($data));
    //     // event(new UserActiveBids($user, $activeBids));

    //     return response()->json(compact('biders', 'user'));
    // }

    // public function dashboard()
    // {
    //     $user = auth('api')->user();
    //     $userBidsCount = $user->bidItems()->count();
    //     $winningBidsCount = Product::where('winner_id', $user->id)->count();
    //     $favouritesCount = $user->favourites()->count();

    //     return response()->json(compact('userBidsCount', 'winningBidsCount', 'favouritesCount'));
    // }

    // public function currentUserBids()
    // {
    //     $products = Product::active()->whereHas('bids', function (Builder $query) {
    //         $query->where('user_id', auth('api')->id());
    //     })->with(['bids' => function ($query) {
    //         $query->where('user_id', auth('api')->id())->latest()->first();
    //     }])->paginate(20);

    //     return response()->json(compact('products'));
    // }

    // public function pendingUserBids()
    // {
    //     $products = Product::where('winner_id', auth('api')->id())->whereIn('status', [2, 3])->with(['bids' => function ($query) {
    //         $query->where('user_id', auth('api')->id())->latest()->first();
    //     }])->paginate(20);

    //     return response()->json(compact('products'));
    // }

    // public function finishedUserBids()
    // {
    //     $products = Product::where('winner_id', auth('api')->id())->finished()->with(['bids' => function ($query) {
    //         $query->where('user_id', auth('api')->id())->latest()->first();
    //     }])->paginate(20);

    //     return response()->json(compact('products'));
    // }

    // public function upcomingMyBids()
    // {
    //     $user = auth('api')->user();
    //     $upcoming = $user->products()->inactive()->paginate(10);

    //     return response()->json(compact('upcoming'));
    // }

    // public function currentMyBids()
    // {
    //     $user = auth('api')->user();
    //     $current = $user->products()
    //         ->whereIn('status', [1, 2, 3])
    //         ->paginate(10);

    //     return response()->json(compact('current'));
    // }

    // public function pastMyBids()
    // {
    //     $user = auth('api')->user();
    //     $past = $user->products()->finished()->paginate(10);

    //     return response()->json(compact('past'));
    // }

    // public function winningBids(Request $request)
    // {
    //     $productsQuery = Product::where('winner_id', auth('api')->id())->active();

    //     if ($request->sort == 'name') {
    //         $productsQuery->orderBy('name');
    //     } elseif ($request->sort == 'date') {
    //         $productsQuery->orderBy('approved_at', 'desc');
    //     } else {
    //         $productsQuery->orderBy('approved_at', 'asc');
    //     }

    //     if ($request->filled('name')) {
    //         $productsQuery->where('name', 'like', '%' . request('name') . '%');
    //     }

    //     $products = $productsQuery->paginate(10);

    //     return response()->json(compact('products'));
    // }

    // public function addOrRemoveFavourites($productId)
    // {
    //     $product = Product::findOrFail($productId);

    //     $user = auth('api')->user();

    //     $user->favourites()->toggle($productId);
    //     $isfav = $product->is_fav;

    //     return response()->json(['msg' => 'Success', 'isfav' => $isfav]);
    // }

    // public function myFavourites(Request $request)
    // {
    //     $user = auth('api')->user();
    //     $myFavouritesQuery = $user->favourites();

    //     if ($request->sort == 'name') {
    //         $myFavouritesQuery->orderBy('name');
    //     } elseif ($request->sort == 'date') {
    //         $myFavouritesQuery->orderBy('approved_at', 'desc');
    //     } else {
    //         $myFavouritesQuery->orderBy('approved_at', 'asc');
    //     }

    //     if ($request->filled('name')) {
    //         $myFavouritesQuery->where('name', 'like', '%' . request('name') . '%');
    //     }

    //     $myFavourites = $myFavouritesQuery->paginate(10);


    //     return response()->json(compact('myFavourites'));
    // }

    // public function faqs()
    // {
    //     $faqCategories = FaqCategory::get();
    //     $faqs = Faq::get();

    //     return response()->json(compact('faqCategories', 'faqs'));
    // }

    // public function pages($id)
    // {
    //     $page = Page::find($id);

    //     return response()->json(compact('page'));
    // }

    // public function metas()
    // {
    //     $metas = Meta::get();

    //     return response()->json(compact('metas'));
    // }

    // public function addReview(Request $request, $product_id)
    // {
    //     $product = Product::find($product_id);
    //     $validated = $request->validate([
    //         'comment' => 'required|string|min:3',
    //     ]);
    //     $validated['user_id'] = auth('api')->id();
    //     $validated['product_id'] = $product_id;
    //     $validated['user_type'] = $product->user_id == $validated['user_id'] ? 0 : 1;

    //     $review = ProductReview::create($validated);

    //     if ($validated['user_type'] == 0) {
    //         $product->update(['status' => 3]);
    //         Mail::to($product->winner->email)->send(new ProductDeliveredMail($product));
    //     } else {
    //         $product->update(['status' => 4]);
    //         Mail::to($product->owner->email)->send(new ProductReceivedMail($product));
    //     }

    //     return response()->json(compact('review'));
    // }

    // public function chargeBalance(Request $request)
    // {
    //     $user = auth('api')->user();
    //     $validated = $request->validate([
    //         'value' => 'required'
    //     ]);

    //     $validated['user_id'] = $user->id;
    //     $validated['action'] = 1;

    //     $transaction = $user->transactions()->create($validated);

    //     $user->increment('balance', $validated['value']);
    //     $userBalance = $user->balance;
    //     return response()->json(compact('transaction', 'userBalance', 'user'));
    // }

    // public function transactions(Request $request)
    // {
    //     $user = auth('api')->user();
    //     $transactionsQuery = $user->transactions();

    //     if ($request->filled('type')) {
    //         $transactionsQuery->where('action', $request->type);
    //     }
    //     $transactions = $transactionsQuery->paginate(10);

    //     return response()->json(compact('transactions'));
    // }

    // public function subscription()
    // {
    //     $user = auth('api')->user();
    //     $subscribeValue = 150;
    //     $user->update(['subscription' => $subscribeValue]);

    //     return response()->json(compact('user'));
    // }



    // // Helper Methods
    // public function randomCode($length = 8)
    // {
    //     // 0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ
    //     // $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    //     $characters = '0123456789';
    //     $charactersLength = strlen($characters);
    //     $randomString = '';
    //     for ($i = 0; $i < $length; $i++) {
    //         $randomString .= $characters[rand(0, $charactersLength - 1)];
    //     }

    //     return $randomString;
    // }
}
