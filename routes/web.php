<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'Frontend\FrontendController@index')->name('index');
Route::get('/project', 'Frontend\FrontendController@project')->name('project');
Route::get('/project/{title}', 'Frontend\FrontendController@singleProject')->name('frontend.singleProject');
Route::get('/portfolio', 'Frontend\FrontendController@portfolio')->name('portfolio');
Route::get('/clients', 'Frontend\FrontendController@client')->name('client');
Route::get('/team-member', 'Frontend\FrontendController@team')->name('team');
Route::get('/career', 'Frontend\FrontendController@career')->name('career');
Route::get('/career/circular/{title}', 'Frontend\FrontendController@circular')->name('circular');
Route::get('/contact', 'Frontend\FrontendController@contact')->name('contact');

Route::resource('cv-upload', 'Frontend\CvController');

Route::group(['prefix' => 'admin'], function () {
    Auth::routes([
        'register' => false, // Registration Routes...
        'reset' => false, // Password Reset Routes...
        'verify' => false, // Email Verification Routes...
    ]);
});

//test route
Route::post('/multiple/update', 'TestController@upload')->name('multi_upload');

Route::get('/backend-dashboard', 'HomeController@index')->name('home');

Route::resource( 'slider', 'Backend\SliderController');
Route::resource( 'backend-project', 'Backend\ProjectController');
Route::resource( 'backend-portfolio', 'Backend\PortfolioController');
Route::resource( 'backend-client', 'Backend\ClientController');
Route::resource( 'backend-circular', 'Backend\CareerController');
Route::resource( 'cv', 'Backend\CvController');
Route::resource( 'backend-contact', 'Backend\ContactController');
Route::get('/site-settings', 'Backend\SiteController@settings')->name('settings');
Route::post('/site-settings/update', 'Backend\SiteController@site_update')->name('settings_update');
Route::get('/social-settings', 'Backend\SiteController@social')->name('social');
Route::get('/change-password', 'Backend\SiteController@password')->name('password');
Route::resource('add-user', 'Backend\UserController');


Route::group(['prefix' => 'team', 'as'=>'team_member.'], function (){
    Route::resource('/list', 'Backend\TeamController');
});

Route::group(['prefix' => 'testimonial', 'as'=>'testimonial.'], function (){
    Route::resource('/testimonial', 'Backend\TestimonialController');
});
