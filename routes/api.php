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
Route::get('reviews', 'HomeController@reviews');
Route::get('faqs', 'HomeController@faqs');
Route::get('informations', 'HomeController@informations');
Route::get('pages/{id}', 'HomeController@pages');
Route::get('metas', 'HomeController@metas');
Route::post('send-contact', 'HomeController@sendContactMessage');
Route::post('newsletter', 'HomeController@newsletter');

// Products
Route::get('categories', 'HomeController@categories');
Route::get('products', 'HomeController@products');
Route::get('products/{id}', 'HomeController@product');

Route::get('services', 'HomeController@services');
Route::get('freelancers', 'HomeController@freelancers');
Route::get('skills', 'HomeController@skills');
Route::get('countries', 'HomeController@countries');
Route::get('languages', 'HomeController@languages');
Route::get('job/{id}', 'HomeController@job');
Route::get('freelancer/{id}', 'HomeController@freelancer');
// Authenticated Routes
Route::group(['middleware' => ['auth:api']], function () {

    Route::post('logout', 'HomeController@logout');

    Route::group(['middleware' => 'freelancer'], function () {
        // User Dashboard
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
        Route::get('freelancer-jobs', 'HomeController@freelancerJobs');
        Route::get('freelancer-proposals', 'HomeController@freelancerProposals');
        Route::get('freelancer-invitations', 'HomeController@freelancerInvitations');
    });

    Route::group(['middleware' => 'client'], function () {
        Route::post('create_job', 'HomeController@createJob');
        Route::post('job-title', 'HomeController@jobTitle');
        Route::post('job-description', 'HomeController@jobDescription');
        Route::post('job-expertise', 'HomeController@jobExpertise');
        Route::post('job-visibility', 'HomeController@jobVisibility');
        Route::post('job-budget', 'HomeController@jobBudget');
        Route::post('job-publish', 'HomeController@jobPublish');
        Route::post('job-invitation', 'HomeController@jobInvitation');
        Route::post('accept-proposal', 'HomeController@acceptProposal');
        Route::get('client-jobs', 'HomeController@clientJobs');
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



















    // Route::post('create-product', 'HomeController@createProduct');
    // Route::post('add-bid/{id}', 'HomeController@addBid');
    // Route::post('add-review/{id}', 'HomeController@addReview');
    // Route::get('current-user-bids', 'HomeController@currentUserBids');
    // Route::get('pending-user-bids', 'HomeController@pendingUserBids');
    // Route::get('finished-user-bids', 'HomeController@finishedUserBids');
    // Route::get('upcoming-my-bids', 'HomeController@upcomingMyBids');
    // Route::get('current-my-bids', 'HomeController@currentMyBids');
    // Route::get('past-my-bids', 'HomeController@pastMyBids');
    // Route::get('winning-bids', 'HomeController@winningBids');
    // Route::post('add-or-remove-favourites/{id}', 'HomeController@addOrRemoveFavourites');
    // Route::get('my-favourites', 'HomeController@myFavourites');
    // Route::get('dashboard', 'HomeController@dashboard');
    // Route::post('update-personal-information', 'HomeController@updatePersonalInformation');
    // Route::post('update-password', 'HomeController@updatePassword');
    // Route::post('charge-balance', 'HomeController@chargeBalance');
    // Route::get('transactions', 'HomeController@transactions');
    // Route::post('subscription', 'HomeController@subscription');
});
