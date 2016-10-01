<?php

namespace App\Providers;

use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use View;
use App\Models\Account;
use App\Models\Lead;
use App\Models\Opportunities;
use App\Models\Call;
use App\Models\Project;
use App\Models\Meeting;
use App\Models\Task;
use App\Models\Campaign;
use App\Models\Target;
use App\User;

use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        View::composer('layouts.partials.mainheader', function($view, $isAdmin = false, $user_id = 0){
            if(\Auth::check()){
                $user_id = \Auth::user()->id;
                $isAdmin = \Auth::user()->hasRole(['admin','developer']);

            }

            if($isAdmin){
                $accounts = Account::where('notifications', true)->get();
                $leads = Lead::where('notifications', true)->get();
                $opportunities = Opportunities::where('notifications', true)->get();
                $calls = Call::where('notifications',true)->get();
                $projects = Project::where('notifications',true )->get();
                $meetings = Meeting::where('notifications',true)->get();
                $tasks = Task::where('notifications',true)->get();
                $campaigns = Campaign::where('notifications',true)->get();
                $targets = Target::where('notifications', true)->get();
                $contacts = Contact::where('notifications', true)->get();

            }else{
                $accounts = Account::where('assigned_to', $user_id )->where('notifications', true)->get();
                $leads = Lead::where('assigned_to', $user_id)->where('notifications', true)->get();
                $opportunities = Lead::where('assigned_to', $user_id)->where('notifications', true)->get();
                $calls = Call::where('assigned_to', $user_id)->where('notifications',true)->get();
                $projects = Project::where('project_manager', $user_id)->where('notifications',true)->get();
                $meetings = Meeting::where('assigned_to',$user_id)->where('notifications',true)->get();
                $tasks = Task::where('assigned_to', $user_id)->where('notifications',true)->get();
                $campaigns = Campaign::where('assigned_to', $user_id)->where('notifications',true)->get();
                $targets = Target::where('assigned_to', $user_id)->where('notifications', true)->get();
                $contacts = Contact::where('assigned_to', $user_id)->where('notifications', true)->get();

            }

            $view->with('notifications', ( $accounts->count() + $leads->count() + $opportunities->count() + $calls->count() + $projects->count() + $meetings->count() + $tasks->count() + $campaigns->count() + $targets->count()) + $contacts->count()  )
                ->with('accounts', $accounts)
                ->with('leads', $leads)
                ->with('opportunities', $opportunities)
                ->with('calls', $calls)
                ->with('projects',$projects)
                ->with('meetings', $meetings)
                ->with('tasks', $tasks)
                ->with('campaigns', $campaigns)
                ->with('targets', $targets)
                ->with('contacts', $contacts);
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
