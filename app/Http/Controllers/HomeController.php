<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Meeting;
use App\Models\Project;
use App\Models\Target;
use App\Models\Task;
use App\User;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\Account;
use App\Models\Contact;
use App\Models\Opportunities;
use App\Models\Lead;
use App\Models\Campaign;
use App\Models\Call;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user_id = Auth::user()->id;

        $administrators = DB::table('role_user')->where('role_id','1')->pluck('user_id');

        $accounts = Account::where('assigned_to',$user_id)->orderBy('created_at', 'asc')->paginate(10);

        $contacts = Contact::paginate(10);

        $opportunities = Opportunities::where('assigned_to',$user_id)->orderBy('created_at', 'asc')->paginate(10);

        $leads = Lead::where('assigned_to',$user_id)->orderBy('created_at', 'asc')->paginate(10);

        $campaigns = Campaign::where('assigned_to',$user_id)->orderBy('created_at', 'asc')->paginate(10);

        $targets = Target::where('assigned_to',$user_id)->orderBy('created_at', 'asc')->paginate(10);

        $calls = Call::where('assigned_to',$user_id)->orderBy('created_at', 'asc')->paginate(10);

        $meetings = Meeting::where('assigned_to',$user_id)->orderBy('created_at', 'asc')->paginate(10);

        $tasks = Task::where('assigned_to',$user_id)->orderBy('created_at', 'asc')->paginate(10);


        $projects = Project::where('project_manager', $user_id)->orderBy('created_at', 'asc')->paginate(10);

        if(Auth::user()->hasRole(['admin'])){
            $accounts = Account::orderBy('created_at', 'asc')->paginate(10);

            $opportunities = Opportunities::orderBy('created_at', 'asc')->paginate(10);

            $leads = Lead::orderBy('created_at', 'asc')->paginate(10);

            $campaigns = Campaign::orderBy('created_at', 'asc')->paginate(10);

            $targets = Target::orderBy('created_at', 'asc')->paginate(10);

            $calls = Call::orderBy('created_at', 'asc')->paginate(10);

            $meetings = Meeting::orderBy('created_at', 'asc')->paginate(10);

            $tasks = Task::orderBy('created_at', 'asc')->paginate(10);

            $projects = Project::orderBy('created_at', 'asc')->paginate(10);
        }

        $accnt_no = $accounts->firstItem();
        $cntct_no = $contacts->firstItem();
        $opprt_no = $opportunities->firstItem();
        $ld_no = $leads->firstItem();
        $cmpgn_no = $campaigns->firstItem();
        $trgt_no = $targets->firstItem();
        $cll_no = $calls->firstItem();
        $mtng_no = $meetings->firstItem();
        $tsk_no = $tasks->firstItem();
        $prjcts_no = $projects->firstItem();

        return view('home',compact(
            'accounts','contacts','opportunities','leads','campaigns','targets','calls','meetings','tasks','projects','notifications',
            'accnt_no','cntct_no','opprt_no','ld_no','cmpgn_no','trgt_no','cll_no','mtng_no','tsk_no','prjcts_no'
        ));

    }

}
