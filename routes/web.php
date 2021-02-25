<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('welcome');
})->name('website.home');


Auth::routes(['verify' => true]);

/*
|--------------------------------------------------------------------------
| Builder Generator Routes
|--------------------------------------------------------------------------
*/

Route::get('/home', 'HomeController@index')->middleware('verified');

Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');

Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');

Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');

Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
)->name('io_generator_builder_generate_from_file');



///////////////////////////////////////////////////////////////////////////
///								end builder routes 						///
///////////////////////////////////////////////////////////////////////////


/*
|--------------------------------------------------------------------------
| Admin Panel Routes
|--------------------------------------------------------------------------
*/

Route::get('logout', 'AuthController@logout')->name('logout');

Route::group(['prefix' => 'adminPanel', 'namespace' => 'AdminPanel', 'as' => 'adminPanel.'], function () {
    Route::get('logout', 'AuthController@logout')->name('logout');

    Route::get('/login', 'AuthController@login')->name('login');
    Route::post('/postLogin', 'AuthController@postLogin')->name('postLogin');

    Route::group(['middleware' => ['auth:admin', 'permissionHandler']], function () {

        Route::get('/', 'DashboardController@dashboard')->name('dashboard');

        // Roles CRUD
        Route::resource('roles', 'RolesController');
        Route::get('updatePermissions', 'RolesController@updatePermissions')->name('roles.updatePermissions');

        // Admins CRUD
        Route::resource('admins', 'AdminController');

        //Metas CRUD
        Route::resource('metas', 'MetaController');

        // Pages CRUD
        Route::resource('pages', 'PageController');
        Route::resource('pages.paragraphs', 'ParagraphController')->shallow();
        Route::resource('pages.images', 'imagesController')->shallow();
        Route::resource('socialLinks', 'SocialLinkController');

        // CkEditor Upload Image By Ajax
        Route::post('ckeditor/upload', 'CkeditorController@upload')->name('ckeditor.upload');

        // User CURD
        Route::resource('users', 'UserController')->only(['index', 'show', 'update']);
        Route::get('transactions', 'UserController@transactions')->name('users.transactions');

        // Informations CURD
        Route::resource('information', 'InformationController');

        // Slider CURD
        Route::resource('sliders', 'sliderController');

        // Contact Us CURD
        Route::resource('contacts', 'ContactController');

        // Newsletter CURD
        Route::resource('newsletters', 'NewsletterController');

        // Categories CURD
        Route::resource('categories', 'CategoryController');

        Route::resource('faqCategories', 'FaqCategoryController');
        Route::resource('faqs', 'FaqController');

        Route::get('reviews', 'ReviewController@index')->name('reviews.index');
        Route::get('reviews/{id}', 'ReviewController@show')->name('reviews.show');
        Route::patch('reviews/add-to-home/{id}', 'ReviewController@addToHome')->name('reviews.addToHome');
        Route::patch('reviews/remove-from-home/{id}', 'ReviewController@removeFromHome')->name('reviews.removeFromHome');

        Route::resource('services', 'ServiceController');
        Route::resource('skills', 'SkillController');
        Route::resource('clients', 'ClientController');

        Route::resource('freelancers', 'FreelancerController');
        Route::patch('freelancers/approve/{id}', 'FreelancerController@approve')->name('freelancers.approve');

        Route::resource('countries', 'CountryController');
        Route::resource('languages', 'LanguageController');
        Route::resource('jobs', 'JobController');

        Route::resource('milestones', 'MilestoneController')->only(['index', 'show']);
        Route::patch('milestones/solved/{id}', 'MilestoneController@solved')->name('milestones.solved');
        Route::patch('milestones/not-solved/{id}', 'MilestoneController@notSolved')->name('milestones.notSolved');
        Route::patch('milestones/pay/{id}', 'MilestoneController@pay')->name('milestones.pay');
        Route::patch('milestones/refund/{id}', 'MilestoneController@refund')->name('milestones.refund');
        Route::patch('milestones/under-review/{id}', 'MilestoneController@underReview')->name('milestones.underReview');

        Route::resource('blogs', 'BlogController');

        Route::resource('careers', 'CareerController');
        Route::resource('careerRequests', 'CareerRequestController');

        // //Settings
        Route::get('customSettings', 'CustomSettingController@settings')->name('customSettings.show');
        Route::patch('customSettings/{id}', 'CustomSettingController@update')->name('customSettings.update');
    });
});

///////////////////////////////////////////////////////////////////////////
///								end admin panel routes 					///
///////////////////////////////////////////////////////////////////////////
