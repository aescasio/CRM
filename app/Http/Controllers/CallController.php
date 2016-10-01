<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCallRequest;
use App\Http\Requests\UpdateCallRequest;
use App\Models\Call;
use App\Repositories\CallRepository;
use App\User;
use Illuminate\Http\Request;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Account;
use Auth;

class CallController extends AppBaseController
{
    /** @var  CallRepository */
    private $callRepository;

    public function __construct(CallRepository $callRepo)
    {
        $this->callRepository = $callRepo;
    }

    /**
     * Display a listing of the Call.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->callRepository->pushCriteria(new RequestCriteria($request));


        $calls = Call::where('assigned_to',Auth::user()->id)->paginate(10);

        $i = $calls->firstItem();

        if(Auth::user()->hasRole(['admin'])){
            $calls = $this->callRepository->paginate( 10 );
        }

        return view('calls.index',compact(
            'calls',
            'i'
        ));
    }

    /**
     * Show the form for creating a new Call.
     *
     * @return Response
     */
    public function create()
    {
        if(Auth::user()->hasRole('admin')){
            $assigned_to = User::pluck( 'nick_name' , 'id' );
        }elseif(Auth::user()->hasRole('sales')){
            $assigned_to = Role::find(2)->users()->pluck('full_name','id');
        }elseif(Auth::user()->hasRole('marketing')){
            $assigned_to = Role::find(3)->users()->pluck('full_name','id');
        }

        return view('calls.create', compact(
            'assigned_to'
        ));
    }

    /**
     * Store a newly created Call in storage.
     *
     * @param CreateCallRequest $request
     *
     * @return Response
     */
    public function store(CreateCallRequest $request)
    {
        $input = $request->all();

        $input['date_time'] = date('Y-m-d H:i:s',strtotime($input['date_time'].' '.$input['time']));

        $call = $this->callRepository->create($input);

        Flash::success('Call saved successfully.');

        return redirect(route('calls.index'));
    }

    /**
     * Display the specified Call.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $call = $this->callRepository->findWithoutFail($id);

        Call::where('id', $id)->where('assigned_to',\Auth::user()->id)->update(['notifications'=>false]);
        if (empty($call)) {
            Flash::error('Call not found');

            return redirect(route('calls.index'));
        }

        if($call->related_to == 'accounts'){
            $results = \App\Models\Account::where('id',$call->related_results)->first();
            $related_results_dummy = $results->name;
        }elseif($call->related_to == 'contacts'){
            $results = \App\Models\Contact::where('id',$call->related_results)->first();
            $related_results_dummy = $results->salutation.'. '.$results->full_name;
        }elseif($call->related_to == 'leads'){
            $results = \App\Models\Lead::where('id',$call->related_results)->first();
            $related_results_dummy = $results->salutation .'. '.$results->first_name. ' '. $results->last_name;
        }elseif($call->related_to == 'opportunities'){
            $results = \App\Models\Opportunities::where('id',$call->related_results)->first();
            $related_results_dummy = $results->name;
        }elseif($call->related_to == 'projects'){
            $results = \App\Models\Project::where('id',$call->related_results)->first();
            $related_results_dummy = $results->name;
        }elseif($call->related_to == 'targets'){
            $results = \App\Models\Target::where( 'id' , $call->related_results )->first();
            $related_results_dummy = $results->salutation . '. ' . $results->first_name . ' ' . $results->last_name;
        }elseif($call->related_to == 'tasks'){
            $results = \App\Models\Task::where( 'id' , $call->related_results )->first();
            $related_results_dummy = $results->subject;
        }

        return view('calls.show',compact(
            'call',
            'related_results_dummy'
        ));
    }

    /**
     * Show the form for editing the specified Call.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $call = $this->callRepository->findWithoutFail($id);

        Call::where('id', $id)->where('assigned_to',\Auth::user()->id)->update(['notifications'=>false]);

        if (empty($call)) {
            Flash::error('Call not found');

            return redirect(route('calls.index'));
        }

        if($call->related_to == 'accounts'){
            $results = \App\Models\Account::where('id',$call->related_results)->first();
            $related_results_dummy = $results->name;
        }elseif($call->related_to == 'contacts'){
            $results = \App\Models\Contact::where('id',$call->related_results)->first();
            $related_results_dummy = $results->salutation.'. '.$results->full_name;
        }elseif($call->related_to == 'leads'){
            $results = \App\Models\Lead::where('id',$call->related_results)->first();
            $related_results_dummy = $results->salutation .'. '.$results->first_name. ' '. $results->last_name;
        }elseif($call->related_to == 'opportunities'){
            $results = \App\Models\Opportunities::where('id',$call->related_results)->first();
            $related_results_dummy = $results->name;
        }elseif($call->related_to == 'projects'){
            $results = \App\Models\Project::where('id',$call->related_results)->first();
            $related_results_dummy = $results->name;
        }elseif($call->related_to == 'targets'){
            $results = \App\Models\Target::where( 'id' , $call->related_results )->first();
            $related_results_dummy = $results->salutation . '. ' . $results->first_name . ' ' . $results->last_name;
        }elseif($call->related_to == 'tasks'){
            $results = \App\Models\Task::where('id',$call->related_results)->first();
            $related_results_dummy = $results->subject;
        }

        if(Auth::user()->hasRole('admin')){
            $assigned_to = User::pluck( 'nick_name' , 'id' );
        }elseif(Auth::user()->hasRole('sales')){
            $assigned_to = Role::find(2)->users()->pluck('full_name','id');
        }elseif(Auth::user()->hasRole('marketing')){
            $assigned_to = Role::find(3)->users()->pluck('full_name','id');
        }

        return view('calls.edit',compact(
            'call',
            'assigned_to',
            'related_results_dummy'
        ));
    }

    /**
     * Update the specified Call in storage.
     *
     * @param  int              $id
     * @param UpdateCallRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCallRequest $request)
    {
        $call = $this->callRepository->findWithoutFail($id);

        if (empty($call)) {
            Flash::error('Call not found');

            return redirect(route('calls.index'));
        }
        $input = $request->all();

        $input['date_time'] = date('Y-m-d H:i:s',strtotime($input['date_time'].' '.$input['time']));

        $call = $this->callRepository->update($input, $id);

        Flash::success('Call updated successfully.');

        return redirect(route('calls.index'));
    }

    /**
     * Remove the specified Call from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $call = $this->callRepository->findWithoutFail($id);

        if (empty($call)) {
            Flash::error('Call not found');

            return redirect(route('calls.index'));
        }

        $this->callRepository->delete($id);

        Flash::success('Call deleted successfully.');

        return redirect(route('calls.index'));
    }
}
