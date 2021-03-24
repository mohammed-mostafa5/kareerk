<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('test', 'HomeController@test');

// Authentication
Route::post('register', 'HomeController@register');
Route::post('login', 'HomeController@login');
Route::post('forgotPassword', '\App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail');

// Pages
Route::get('home', 'HomeController@home');
Route::get('informations', 'HomeController@informations');
Route::get('pages/{id}', 'HomeController@pages');
Route::get('metas', 'HomeController@metas');

Route::get('blogs', 'HomeController@blogs');
Route::get('blog/{id}', 'HomeController@blog');

Route::get('careers', 'HomeController@careers');
Route::get('career/{id}', 'HomeController@career');
Route::post('send-career-request', 'HomeController@sendCareerRequest');

Route::post('send-contact', 'HomeController@sendContactMessage');
Route::post('newsletter', 'HomeController@newsletter');

Route::get('landing-page', 'HomeController@landingPage');
Route::get('landing-page-search', 'HomeController@landingPageSearch');
Route::get('landing-page-search-autocomplete', 'HomeController@landingPageSearchAutoComplete');
Route::get('services', 'HomeController@services');
Route::get('service/{id}', 'HomeController@service');
Route::get('freelancers', 'HomeController@freelancers');
Route::get('freelancer/{id}', 'HomeController@freelancer');
Route::get('client/{id}', 'HomeController@client');
Route::get('skills', 'HomeController@skills');
Route::get('countries', 'HomeController@countries');
Route::get('languages', 'HomeController@languages');



// Authenticated Routes
Route::group(['middleware' => ['auth:api', 'logoutUser']], function () {

    Route::post('logout', 'HomeController@logout')->name('users.logout');

    Route::post('update-personal-information', 'HomeController@updatePersonalInformation');
    Route::post('update-password', 'HomeController@updatePassword');

    Route::post('charge-balance', 'HomeController@chargeBalance');
    Route::get('transactions', 'HomeController@transactions');

    Route::get('user-job-review', 'HomeController@userJobReview');
    Route::post('submit-review', 'HomeController@submitReview');

    Route::group(['middleware' => 'checkUserType:Freelancer'], function () {
        Route::post('freelancer-expertise', 'HomeController@freelancerExpertise');
        Route::post('freelancer-education', 'HomeController@freelancerEducation');
        Route::post('freelancer-employment', 'HomeController@freelancerEmployment');
        Route::post('freelancer-languages', 'HomeController@freelancerLanguages');
        Route::post('freelancer-hourly-rate', 'HomeController@freelancerHourlyRate');
        Route::post('freelancer-title-overview', 'HomeController@freelancerTitleOverview');
        Route::post('freelancer-profile-photo', 'HomeController@freelancerProfilePhoto');
        Route::post('freelancer-location', 'HomeController@freelancerLocation');
        Route::post('freelancer-finish-profile', 'HomeController@freelancerFinishProfile');
        Route::post('submit-proposal', 'HomeController@submitProposal');
        Route::get('freelancer-home', 'HomeController@freelancerHome');
        Route::get('freelancer-proposals', 'HomeController@freelancerProposals');
        Route::get('freelancer-invitations', 'HomeController@freelancerInvitations');
        Route::post('featured-subscribe', 'HomeController@featuredSubscribe');
        Route::get('featured-history', 'HomeController@featuredHistory');
    });

    Route::group(['middleware' => 'checkUserType:Client'], function () {
        Route::post('create_job', 'HomeController@createJob');
        Route::post('job-title', 'HomeController@jobTitle');
        Route::post('job-description', 'HomeController@jobDescription');
        Route::post('job-expertise', 'HomeController@jobExpertise');
        Route::post('job-visibility', 'HomeController@jobVisibility');
        Route::post('job-availability', 'HomeController@jobAvailability');
        Route::post('job-switch-visibility', 'HomeController@jobSwitchVisibility');
        Route::post('job-budget', 'HomeController@jobBudget');
        Route::post('job-publish', 'HomeController@jobPublish');
        Route::post('job-invitation', 'HomeController@jobInvitation');
        Route::get('freelancers-search', 'HomeController@freelancersSearch');
        Route::post('accept-proposal', 'HomeController@acceptProposal');
        Route::post('complete-job', 'HomeController@completeJob');
        Route::get('client-unpublished-jobs', 'HomeController@clientUnpublishedJobs');
        Route::get('client-invitations', 'HomeController@clientInvitations');
    });

    // Chat
    Route::get('messages', 'HomeController@messages');
    Route::get('user-chat-contacts', 'HomeController@userChatContacts');
    Route::post('send-message', 'HomeController@sendMessage');

    // Notifications
    Route::get('notifications', 'HomeController@notifications');
    Route::get('delete-notification/{id}', 'HomeController@deleteNotification');
    Route::get('clear-notifications', 'HomeController@clearNotifications');
    Route::get('notification-seen/{id}', 'HomeController@notificationSeen');
    Route::get('reset-notifications-count', 'HomeController@resetNotificationsCount');

    // Milestones
    Route::post('add-milestone', 'HomeController@addMilestone');
    Route::post('update-milestone', 'HomeController@updateMilestone');
    Route::post('delete-milestone', 'HomeController@deleteMilestone');
    Route::post('milestone-payment', 'HomeController@milestonePayment');
    Route::post('milestone-finish', 'HomeController@milestonefinish');
    Route::post('milestone-accept', 'HomeController@milestoneAccept');
    Route::post('milestone-done', 'HomeController@milestoneDone');
    Route::post('milestone-has-problem', 'HomeController@milestoneHasProblem');

    Route::get('job/{id}', 'HomeController@job');
    Route::get('proposal/{id}', 'HomeController@proposal');

    Route::get('freelancer-jobs/{id}', 'HomeController@freelancerJobs');
    Route::get('client-jobs/{id}', 'HomeController@clientJobs');
    Route::get('site-options', 'HomeController@siteOptions');
});
