<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateMeetingRequest;
use App\Http\Requests\UpdateMeetingRequest;
use App\Models\Meeting;
use App\Repositories\MeetingRepository;
use Illuminate\Http\Request;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use App\User;
use App\Models\Role;
use Auth;

class MeetingController extends AppBaseController
{
    /** @var  MeetingRepository */
    private $meetingRepository;

    public function __construct(MeetingRepository $meetingRepo)
    {
        $this->meetingRepository = $meetingRepo;
    }

    /**
     * Display a listing of the Meeting.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->meetingRepository->pushCriteria(new RequestCriteria($request));

        $meetings = Meeting::where('assigned_to',Auth::user()->id)->paginate(10);

        if(Auth::user()->hasRole(['admin'])){
            $meetings = $this->meetingRepository->paginate(10);
        }

        $i = $meetings->firstItem();
        return view('meetings.index',compact(
            'counter',
            'meetings',
            'i'
        ));
    }

    /**
     * Show the form for creating a new Meeting.
     *
     * @return Response
     */
    public function create()
    {

        if(Auth::user()->hasRole('admin')){
            $users = User::pluck( 'nick_name' , 'id' );
        }elseif(Auth::user()->hasRole('sales')){
            $users = Role::find(2)->users()->pluck('full_name','id');
        }elseif(Auth::user()->hasRole('marketing')){
            $users = Role::find(3)->users()->pluck('full_name','id');
        }

        return view('meetings.create',compact(
            'users'
        ));
    }

    /**
     * Store a newly created Meeting in storage.
     *
     * @param CreateMeetingRequest $request
     *
     * @return Response
     */
    public function store(CreateMeetingRequest $request)
    {
        $input = $request->all();

        $input['start_date'] = date('Y-m-d H:i:s',strtotime($input['start_date'].' '.$input['start_time']));
        $input['end_date'] = date('Y-m-d H:i:s',strtotime($input['end_date'].' '.$input['end_time']));
        $meeting = $this->meetingRepository->create($input);

        Flash::success('Meeting saved successfully.');

        return redirect(route('meetings.index'));
    }

    /**
     * Display the specified Meeting.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $meeting = $this->meetingRepository->findWithoutFail($id);

        Meeting::where('id', $id)->where('assigned_to', \Auth::user()->id)->update(['notifications'=>false]);

        if (empty($meeting)) {
            Flash::error('Meeting not found');

            return redirect(route('meetings.index'));
        }
        /*
        if($meeting->related_to == 'accounts'){
            $results = \App\Models\Account::where('id',$meeting->related_result)->first();
            $related_result = $results->name;
        }elseif($meeting->related_to == 'contacts'){
            $results = \App\Models\Contact::where('id',$meeting->related_result)->first();
            $related_result = $results->salutation.'. '.$results->full_name;
        }elseif($meeting->related_to == 'leads'){
            $results = \App\Models\Lead::where('id',$meeting->related_result)->first();
            $related_result = $results->salutation .'. '.$results->first_name. ' '. $results->last_name;
        }elseif($meeting->related_to == 'opportunities'){
            $results = \App\Models\Opportunities::where('id',$meeting->related_result)->first();
            $related_result = $results->name;
        }elseif($meeting->related_to == 'projects'){
            $results = \App\Models\Project::where('id',$meeting->related_result)->first();
            $related_result = $results->name;
        }elseif($meeting->related_to == 'targets'){
            $results = \App\Models\Target::where( 'id' , $meeting->related_result )->first();
            $related_result = $results->salutation . '. ' . $results->first_name . ' ' . $results->last_name;
        }elseif($meeting->related_to == 'tasks'){
            $results = \App\Models\Task::where( 'id' , $meeting->related_result)->first();
            $related_result = $results->subject;
        }
*/
        return view('meetings.show',compact(
            'meeting',
            'related_result'
        ));
    }

    /**
     * Show the form for editing the specified Meeting.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $meeting = $this->meetingRepository->findWithoutFail($id);

        Meeting::where('id', $id)->where('assigned_to', \Auth::user()->id)->update(['notifications'=>false]);

        if($meeting->assigned_to != Auth::user()->id && ( ! Auth::user()->hasRole('admin') || ! Auth::user()->can('global-permission')) ){
            return view('errors.403');
        }

        if (empty($meeting)) {
            Flash::error('Meeting not found');

            return redirect(route('meetings.index'));
        }
/*
        if($meeting->related_to == 'accounts'){
            $results = \App\Models\Account::where('id',$meeting->related_result)->first();
            $related_result_name = $results->name;
        }elseif($meeting->related_to == 'contacts'){
            $results = \App\Models\Contact::where('id',$meeting->related_result)->first();
            $related_result_name = $results->salutation.'. '.$results->full_name;
        }elseif($meeting->related_to == 'leads'){
            $results = \App\Models\Lead::where('id',$meeting->related_result)->first();
            $related_result_name = $results->salutation .'. '.$results->first_name. ' '. $results->last_name;
        }elseif($meeting->related_to == 'opportunities'){
            $results = \App\Models\Opportunities::where('id',$meeting->related_result)->first();
            $related_result_name = $results->name;
        }elseif($meeting->related_to == 'projects'){
            $results = \App\Models\Project::where('id',$meeting->related_result)->first();
            $related_result_name = $results->name;
        }elseif($meeting->related_to == 'targets'){
            $results = \App\Models\Target::where( 'id' , $meeting->related_result)->first();
            $related_result_name = $results->salutation . '. ' . $results->first_name . ' ' . $results->last_name;
        }elseif($meeting->related_to == 'tasks'){
            $results = \App\Models\Task::where('id',$meeting->related_result)->first();
            $related_result_name = $results->subject;
        }
*/
        if(Auth::user()->hasRole('admin')){
            $users = User::pluck( 'nick_name' , 'id' );
        }elseif(Auth::user()->hasRole('sales')){
            $users = Role::find(2)->users()->pluck('full_name','id');
        }elseif(Auth::user()->hasRole('marketing')){
            $users = Role::find(3)->users()->pluck('full_name','id');
        }

        return view('meetings.edit',compact(
            'meeting',
            'users',
            'related_result_name'
        ));
    }

    /**
     * Update the specified Meeting in storage.
     *
     * @param  int              $id
     * @param UpdateMeetingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMeetingRequest $request)
    {
        $meeting = $this->meetingRepository->findWithoutFail($id);

        if (empty($meeting)) {
            Flash::error('Meeting not found');

            return redirect(route('meetings.index'));
        }
        $input = $request->all();
        $input['start_date'] = date('Y-m-d H:i:s',strtotime($input['start_date'].' '.$input['start_time']));
        $input['end_date'] = date('Y-m-d H:i:s',strtotime($input['end_date'].' '.$input['end_time']));

        $meeting = $this->meetingRepository->update($input, $id);

        Flash::success('Meeting updated successfully.');

        return redirect(route('meetings.index'));
    }

    /**
     * Remove the specified Meeting from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $meeting = $this->meetingRepository->findWithoutFail($id);

        if (empty($meeting)) {
            Flash::error('Meeting not found');

            return redirect(route('meetings.index'));
        }

        $this->meetingRepository->delete($id);

        Flash::success('Meeting deleted successfully.');

        return redirect(route('meetings.index'));
    }
}
