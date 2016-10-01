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

Route::group( [ 'middleware' => 'web' ] , function ()
{
    Route::auth();

    Route::get( '/home' , 'HomeController@index' );

    Route::get( '/' , 'HomeController@index' );

    Route::group(['middleware'=>['role:admin|permission:global-permission']], function(){
        Route::resource( 'departments' , 'DepartmentController' );
        Route::resource('manageUsers', 'ManageUserController');
        //Route::resource('profiles','ProfileController');
        Route::get('profiles',['as'=>'profiles.index', 'uses'=>'ProfileController@index']);
        Route::get('profiles/{profiles}',['as'=>'profiles.show','uses'=>'ProfileController@show']);
        Route::patch('profiles/{profiles}',['as'=>'profiles.update','uses'=>'ProfileController@update']); //Update edited records
        Route::get('profiles/{profiles}/edit',['as'=>'profiles.edit','uses'=>'ProfileController@edit']); //Edit


        //Route::resource('manageRoles', 'manageRolesController');
        Route::get('manageRoles',['as'=>'manageRoles.index' , 'uses'=>'manageRolesController@index']);
        Route::post('manageRoles',['as'=>'manageRoles.store','uses'=>'manageRolesController@store']); //store created
        Route::get('manageRoles/create',['middleware' => ['permission:global-permission|create-new'], 'as' => 'manageRoles.create','uses' => 'manageRolesController@create']); //create route
        Route::delete('manageRoles/{manageRoles}',['middleware' => ['permission:dev,global-permission|delete-record'],'as'=>'manageRoles.destroy','uses'=>'manageRolesController@destroy']); //delete route
        Route::patch('manageRoles/{manageRoles}',['as'=>'manageRoles.update','uses'=>'manageRolesController@update']); //Update edited records
        Route::get('manageRoles/{manageRoles}',['as'=>'manageRoles.show','uses'=>'manageRolesController@show']);
        Route::get('manageRoles/{manageRoles}/edit',['middleware'=>['permission:dev,global-permission|edit-record'], 'as'=>'manageRoles.edit','uses'=>'manageRolesController@edit']); //Edit

        //Route::resource('managePermissions', 'managePermissionsController');
        Route::get('managePermissions',['middleware' => ['permission:dev'], 'as'=>'managePermissions.index' , 'uses'=>'managePermissionsController@index']);
        Route::post('managePermissions',['middleware' => ['permission:dev'], 'as'=>'managePermissions.store','uses'=>'managePermissionsController@store']); //store created
        Route::get('managePermissions/create',['middleware' => ['permission:dev'], 'as' => 'managePermissions.create','uses' => 'managePermissionsController@create']); //create route
        Route::delete('managePermissions/{leads}',['middleware' => ['permission:dev'],'as'=>'managePermissions.destroy','uses'=>'managePermissionsController@destroy']); //delete route
        Route::patch('managePermissions/{managePermissions}',['middleware' => ['permission:dev'], 'as'=>'managePermissions.update','uses'=>'managePermissionsController@update']); //Update edited records
        Route::get('managePermissions/{managePermissions}',['middleware' => ['permission:dev'], 'as'=>'managePermissions.show','uses'=>'managePermissionsController@show']);
        Route::get('managePermissions/{managePermissions}/edit',['middleware' => ['permission:dev'], 'middleware'=>['permission:dev,global-permission|edit-record'], 'as'=>'managePermissions.edit','uses'=>'managePermissionsController@edit']); //Edit
    });

    Route::group( [ 'middleware' => ['role:admin|sales|marketing'] ] , function ()
    {
        Route::get( 'modalCampaigns' , 'CampaignController@modal' );
        Route::get('modalAccounts', 'AccountController@modal');
        Route::get('modalContacts', 'ContactController@modal');
        Route::get('modalLeads', 'LeadController@modal');
        Route::get('modalOpportunities', 'OpportunitiesController@modal');
        Route::get('modalTargets', 'TargetController@modal');
        Route::get('modalTasks', 'TaskController@modal');
        Route::get('modalProjects', 'ProjectController@modal');

        //Route::resource('calendars', 'CalendarController');
        Route::get('calendars',['as'=>'calendars.index' , 'uses'=>'CalendarController@index']);
        Route::post('calendars',['as'=>'calendars.store','uses'=>'CalendarController@store']); //store created
        Route::get('calendars/create',['as' => 'calendars.create','uses' => 'CalendarController@create']); //create route
        Route::delete('calendars/{calendars}',['middleware'=>'role:admin|developer','as'=>'calendars.destroy','uses'=>'CalendarController@destroy']); //delete route
        Route::patch('calendars/{calendars}',['as'=>'calendars.update','uses'=>'CalendarController@update']); //Update edited records
        Route::get('calendars/{calendars}',['as'=>'calendars.show','uses'=>'CalendarController@show']);
        Route::get('calendars/{calendars}/edit',['as'=>'calendars.edit','uses'=>'CalendarController@edit']); //Edit

        //Route::resource( 'accounts' , 'AccountController' );
        Route::get('accounts',['as'=>'accounts.index' , 'uses'=>'AccountController@index']);
        Route::post('accounts',['as'=>'accounts.store','uses'=>'AccountController@store']); //store created
        Route::get('accounts/create',['middleware' => ['permission:global-permission|create-new'], 'as' => 'accounts.create','uses' => 'AccountController@create']); //create route
        Route::delete('accounts/{accounts}',['middleware' => ['role:admin|permission:global-permission|delete-record'],'as'=>'accounts.destroy','uses'=>'AccountController@destroy']); //delete route
        Route::patch('accounts/{accounts}',['as'=>'accounts.update','uses'=>'AccountController@update']); //Update edited records
        Route::get('accounts/{accounts}',['as'=>'accounts.show','uses'=>'AccountController@show']);
        Route::get('accounts/{accounts}/edit',['middleware'=>['permission:global-permission|edit-record'], 'as'=>'accounts.edit','uses'=>'AccountController@edit']); //Edit

        //Route::resource('contacts', 'ContactController');
        Route::get('contacts',['as'=>'contacts.index' , 'uses'=>'ContactController@index']);
        Route::post('contacts',['as'=>'contacts.store','uses'=>'ContactController@store']); //store created
        Route::get('contacts/create',['middleware' => ['permission:global-permission|create-new'], 'as' => 'contacts.create','uses' => 'ContactController@create']); //create route
        Route::delete('contacts/{contacts}',['middleware' => ['permission:global-permission|delete-record'],'as'=>'contacts.destroy','uses'=>'ContactController@destroy']); //delete route
        Route::patch('contacts/{contacts}',['as'=>'contacts.update','uses'=>'ContactController@update']); //Update edited records
        Route::get('contacts/{contacts}',['as'=>'contacts.show','uses'=>'ContactController@show']);
        Route::get('contacts/{contacts}/edit',['middleware'=>['permission:global-permission|edit-record'], 'as'=>'contacts.edit','uses'=>'ContactController@edit']); //Edit

        //Route::resource( 'leads' , 'LeadController' );
        Route::get('leads',['as'=>'leads.index' , 'uses'=>'LeadController@index']);
        Route::post('leads',['as'=>'leads.store','uses'=>'LeadController@store']); //store created
        Route::get('leads/create',['middleware' => ['permission:global-permission|create-new'], 'as' => 'leads.create','uses' => 'LeadController@create']); //create route
        Route::delete('leads/{leads}',['middleware' => ['permission:global-permission|delete-record'],'as'=>'leads.destroy','uses'=>'LeadController@destroy']); //delete route
        Route::patch('leads/{leads}',['as'=>'leads.update','uses'=>'LeadController@update']); //Update edited records
        Route::get('leads/{leads}',['as'=>'leads.show','uses'=>'LeadController@show']);
        Route::get('leads/{leads}/edit',['middleware'=>['permission:global-permission|edit-record'], 'as'=>'leads.edit','uses'=>'LeadController@edit']); //Edit


        //Route::resource('opportunities', 'OpportunitiesController');
        Route::get('opportunities',['as'=>'opportunities.index' , 'uses'=>'OpportunitiesController@index']);
        Route::post('opportunities',['as'=>'opportunities.store','uses'=>'OpportunitiesController@store']); //store created
        Route::get('opportunities/create',['middleware' => ['permission:global-permission|create-new'], 'as' => 'opportunities.create','uses' => 'OpportunitiesController@create']); //create route
        Route::delete('opportunities/{opportunities}',['middleware' => ['permission:global-permission|delete-record'],'as'=>'opportunities.destroy','uses'=>'OpportunitiesController@destroy']); //delete route
        Route::patch('opportunities/{opportunities}',['as'=>'opportunities.update','uses'=>'OpportunitiesController@update']); //Update edited records
        Route::get('opportunities/{opportunities}',['as'=>'opportunities.show','uses'=>'OpportunitiesController@show']);
        Route::get('opportunities/{opportunities}/edit',['middleware'=>['permission:global-permission|edit-record'], 'as'=>'opportunities.edit','uses'=>'OpportunitiesController@edit']); //Edit

        //Route::resource('calls', 'CallController');
        Route::get('calls',['as'=>'calls.index' , 'uses'=>'CallController@index']);
        Route::post('calls',['as'=>'calls.store','uses'=>'CallController@store']); //store created
        Route::get('calls/create',['middleware' => ['permission:global-permission|create-new'], 'as' => 'calls.create','uses' => 'CallController@create']); //create route
        Route::delete('calls/{calls}',['middleware' => ['permission:global-permission|delete-record'],'as'=>'calls.destroy','uses'=>'CallController@destroy']); //delete route
        Route::patch('calls/{calls}',['as'=>'calls.update','uses'=>'CallController@update']); //Update edited records
        Route::get('calls/{calls}',['as'=>'calls.show','uses'=>'CallController@show']);
        Route::get('calls/{calls}/edit',['middleware'=>['permission:global-permission|edit-record'], 'as'=>'calls.edit','uses'=>'CallController@edit']); //Edit

        //Route::resource('projects', 'ProjectController');
        Route::get('projects',['as'=>'projects.index' , 'uses'=>'ProjectController@index']);
        Route::post('projects',['as'=>'projects.store','uses'=>'ProjectController@store']); //store created
        Route::get('projects/create',['middleware' => ['permission:global-permission|create-new'], 'as' => 'projects.create','uses' => 'ProjectController@create']); //create route
        Route::delete('projects/{projects}',['middleware' => ['permission:global-permission|delete-record'],'as'=>'projects.destroy','uses'=>'ProjectController@destroy']); //delete route
        Route::patch('projects/{projects}',['as'=>'projects.update','uses'=>'ProjectController@update']); //Update edited records
        Route::get('projects/{projects}',['as'=>'projects.show','uses'=>'ProjectController@show']);
        Route::get('projects/{projects}/edit',['middleware'=>['permission:global-permission|edit-record'], 'as'=>'projects.edit','uses'=>'ProjectController@edit']); //Edit

        //Route::resource('meetings', 'MeetingController');
        Route::get('meetings',['as'=>'meetings.index' , 'uses'=>'MeetingController@index']);
        Route::post('meetings',['as'=>'meetings.store','uses'=>'MeetingController@store']); //store created
        Route::get('meetings/create',['middleware' => ['permission:global-permission|create-new'], 'as' => 'meetings.create','uses' => 'MeetingController@create']); //create route
        Route::delete('meetings/{meetings}',['middleware' => ['permission:global-permission|delete-record'],'as'=>'meetings.destroy','uses'=>'MeetingController@destroy']); //delete route
        Route::patch('meetings/{meetings}',['as'=>'meetings.update','uses'=>'MeetingController@update']); //Update edited records
        Route::get('meetings/{meetings}',['as'=>'meetings.show','uses'=>'MeetingController@show']);
        Route::get('meetings/{meetings}/edit',['middleware'=>['permission:global-permission|edit-record'], 'as'=>'meetings.edit','uses'=>'MeetingController@edit']); //Edit

        //Route::resource('tasks', 'TaskController');
        Route::get('tasks',['as'=>'tasks.index' , 'uses'=>'TaskController@index']);
        Route::post('tasks',['as'=>'tasks.store','uses'=>'TaskController@store']); //store created
        Route::get('tasks/create',['middleware' => ['permission:global-permission|create-new'], 'as' => 'tasks.create','uses' => 'TaskController@create']); //create route
        Route::delete('tasks/{tasks}',['middleware' => ['permission:global-permission|delete-record'],'as'=>'tasks.destroy','uses'=>'TaskController@destroy']); //delete route
        Route::patch('tasks/{tasks}',['as'=>'tasks.update','uses'=>'TaskController@update']); //Update edited records
        Route::get('tasks/{tasks}',['as'=>'tasks.show','uses'=>'TaskController@show']);
        Route::get('tasks/{tasks}/edit',['middleware'=>['permission:global-permission|edit-record'], 'as'=>'tasks.edit','uses'=>'TaskController@edit']); //Edit
    } );

    Route::group( [ 'middleware' => 'role:admin|marketing' ] , function ()
    {
        //Route::resource( 'campaigns' , 'CampaignController' );
        Route::get('campaigns',['as'=>'campaigns.index' , 'uses'=>'CampaignController@index']);
        Route::post('campaigns',['as'=>'campaigns.store','uses'=>'CampaignController@store']); //store created
        Route::get('campaigns/create',['middleware' => ['permission:global-permission|create-new'], 'as' => 'campaigns.create','uses' => 'CampaignController@create']); //create route
        Route::delete('campaigns/{campaigns}',['middleware' => ['permission:global-permission|delete-record'],'as'=>'campaigns.destroy','uses'=>'CampaignController@destroy']); //delete route
        Route::patch('campaigns/{campaigns}',['as'=>'campaigns.update','uses'=>'CampaignController@update']); //Update edited records
        Route::get('campaigns/{campaigns}',['as'=>'campaigns.show','uses'=>'CampaignController@show']);
        Route::get('campaigns/{campaigns}/edit',['middleware'=>['permission:global-permission|edit-record'], 'as'=>'campaigns.edit','uses'=>'CampaignController@edit']); //Edit

        //Route::resource('targets', 'TargetController');
        Route::get('targets',['as'=>'targets.index' , 'uses'=>'TargetController@index']);
        Route::post('targets',['middleware'=>['permission:global-permission|store-record'],'as'=>'targets.store','uses'=>'TargetController@store']); //store created
        Route::get('targets/create',['middleware' => ['permission:global-permission|create-new'], 'as' => 'targets.create','uses' => 'TargetController@create']); //create route
        Route::delete('targets/{targets}',['middleware' => ['permission:global-permission|delete-record'],'as'=>'targets.destroy','uses'=>'TargetController@destroy']); //delete route
        Route::patch('targets/{targets}',['middleware'=>['permission:global-permission|update-record'],'as'=>'targets.update','uses'=>'TargetController@update']); //Update edited records
        Route::get('targets/{targets}',['middleware'=>['permission:global-permission|show-record'],'as'=>'targets.show','uses'=>'TargetController@show']);
        Route::get('targets/{targets}/edit',['middleware'=>['permission:global-permission|edit-record'], 'as'=>'targets.edit','uses'=>'TargetController@edit']); //Edit
    } );

    //Access Denied
    Route::get('/403',function(){
        return view('errors.403');
    });

    //Under construction
    Route::get('uc',function(){
        return view('errors.uc');
    });
} );

/*
|--------------------------------------------------------------------------
| API routes
|--------------------------------------------------------------------------
*/
Route::group( [ 'prefix' => 'api' , 'namespace' => 'API' ] , function ()
{
    Route::group( [ 'prefix' => 'v1' ] , function ()
    {
        require config( 'infyom.laravel_generator.path.api_routes' );
    } );
} );

//Route::group(['middleware'=>['web','role:admin']], function(){
//    Route::resource( 'tests' , 'TestController' );
//});

//Route::get('test/create ', ['middleware' => ['role:admin'], 'as'=>'test.create','uses' => 'TestController@create']);


