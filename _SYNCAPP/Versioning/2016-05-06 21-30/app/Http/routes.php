<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home');
});

/*
Route::get('/', function ()
{
    if (Auth::guest())
    {
        return Redirect::to('login');
    } else
    {
        return view('home');
    }
});
/********************* industry ***********************************************/
Route::resource('industry' , 'IndustryController' );

Route::resource('clientTypes', 'ClientTypeController');

Route::resource('departments', 'DepartmentController');

Route::resource('accounts', 'AccountController');

Route::resource('iMTypes', 'IMTypeController');

Route::resource('leads', 'LeadController');

Route::resource('campaigns', 'CampaignController');
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
Route::group(['middlewareGroups' => ['web']], function ()
{

    /*
    Route::get('industry', [
        'as' => 'industry.index',
        'uses' => 'IndustryController@index'
    ]);

    Route::get('industry/create', [
        'as' => 'industry.create',
        'uses' => 'IndustryController@create'
    ]);

    Route::get('industry/{industry}', [
        'as' => 'industry.show ',
        'uses' => 'IndustryController@show'
    ]);

    Route::post('industry', [
        'as' => 'industry.store',
        'uses' => 'IndustryController@store'
    ]);

    Route::get('industry/{industry}/edit', [
        'as' => 'industry.edit',
        'uses' => 'IndustryController@edit'
    ]);

    Route::put('industry/{industry}', [
        'as' => 'industry.update',
        'uses' => 'IndustryController@update'
    ]);

    Route::post('industry.{industry}', [
        'as' => 'industry.destroy ',
        'uses' => 'IndustryController@destroy'
    ]);

     //Route::post('industry.{industry}','Controller@name_method')->name('');
*/
});

/*
|--------------------------------------------------------------------------
| API routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'api', 'namespace' => 'API'], function ()
{
    Route::group(['prefix' => 'v1'], function () {
        require config('infyom.laravel_generator.path.api_routes');
    });
});
