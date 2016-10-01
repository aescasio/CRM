<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCalendarRequest;
use App\Http\Requests\UpdateCalendarRequest;
use App\Models\Calendar;
use App\Repositories\CalendarRepository;
use App\User;
use Illuminate\Http\Request;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CalendarController extends AppBaseController
{
    /** @var  CalendarRepository */
    private $calendarRepository;

    public function __construct(CalendarRepository $calendarRepo)
    {
        $this->calendarRepository = $calendarRepo;
    }

    /**
     * Display a listing of the Calendar.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->calendarRepository->pushCriteria(new RequestCriteria($request));

        if(\Auth::user()->hasRole(['admin','developer'])){
            $calendars = Response::json(Calendar::get());
        }else{
            $calendars = Response::json(Calendar::where('assigned_to', 'LIKE', \Auth::user()->id.';%')
                ->orWhere('assigned_to', 'LIKE', '%;'.\Auth::user()->id.';%')
                ->orWhere('assigned_to', 'LIKE', '%;'.\Auth::user()->id)
                ->get());
        }

        return view('calendars.index',compact(
            'calendars'
        ));
    }

    /**
     * Show the form for creating a new Calendar.
     *
     * @return Response
     */
    public function create()
    {


        if(\Auth::user()->hasRole(['admin','developer'])){
            $assigned_to = User::pluck( 'full_name' , 'id' )->toArray();
        }elseif(\Auth::user()->hasRole('sales')){
            $assigned_to = \App\Models\Role::find(2)->users()->pluck('full_name','id');
        }elseif(\Auth::user()->hasRole('marketing')){
            $assigned_to = \App\Models\Role::find(3)->users()->pluck('full_name','id');
        }

        $selected_users = null;

        $indicator = 'create';

        return view('calendars.create', compact(
            'indicator',
            'assigned_to',
            'selected_users'
        ));
    }

    /**
     * Store a newly created Calendar in storage.
     *
     * @param CreateCalendarRequest $request
     *
     * @return Response
     */
    public function store(CreateCalendarRequest $request)
    {
        $input = $request->all();

        $last = \DB::connection('mysql2')->table('INFORMATION_SCHEMA.TABLES')->select('AUTO_INCREMENT')->where('TABLE_SCHEMA','enchan_crm')->where('TABLE_NAME','enchan_calendars')->pluck('AUTO_INCREMENT');

        $input['url'] = url('calendars/'.$last[0].'/edit');

        if(isset($request->start_time) || isset($request->end_time))
        {
            $input[ 'start' ] = date( 'Y-m-d H:i:s' , strtotime( $input[ 'start' ] . ' ' . $input[ 'start_time' ] ) );
            $input[ 'end' ] = date( 'Y-m-d H:i:s' , strtotime( $input[ 'end' ] . ' ' . $input[ 'end_time' ] ) );
        }

        $input['assigned_to'] = implode(';',$input['assigned_to']);

        $calendar = $this->calendarRepository->create($input);

        Flash::success('Calendar saved successfully.');

        return redirect(route('calendars.index'));
    }

    /**
     * Display the specified Calendar.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $calendar = $this->calendarRepository->findWithoutFail($id);

        if (empty($calendar)) {
            Flash::error('Calendar not found');

            return redirect(route('calendars.index'));
        }

        return view('calendars.show',compact(
            'calendar'
        ));
    }

    /**
     * Show the form for editing the specified Calendar.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $indicator = 'edit';

        $calendar = $this->calendarRepository->findWithoutFail($id);

        //$calendar->assigned_to = json_decode($calendar->assigned_to, true);
        if (empty($calendar)) {
            Flash::error('Calendar not found');

            return redirect(route('calendars.index'));
        }

        if(\Auth::user()->hasRole(['admin','developer'])){
            $assigned_to = User::pluck( 'full_name' , 'id' )->toArray();
        }elseif(\Auth::user()->hasRole('sales')){
            $assigned_to = \App\Models\Role::find(2)->users()->pluck('full_name','id');
        }elseif(\Auth::user()->hasRole('marketing')){
            $assigned_to = \App\Models\Role::find(3)->users()->pluck('full_name','id');
        }

        $calendar = Calendar::find($id);

        $selected_users = explode(';', $calendar->assigned_to);

        return view('calendars.edit',compact(
            'calendar',
            'indicator',
            'assigned_to',
            'selected_users'
        ));
    }

    /**
     * Update the specified Calendar in storage.
     *
     * @param  int              $id
     * @param UpdateCalendarRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCalendarRequest $request)
    {

        $calendar = $this->calendarRepository->findWithoutFail($id);

        if (empty($calendar)) {
            Flash::error('Calendar not found');

            return redirect(route('calendars.index'));
        }

        $input = $request->all();

        $input['start'] = date('Y-m-d H:i:s',strtotime($input['start'].' '.$input['start_time']));
        $input['end'] = date('Y-m-d H:i:s',strtotime($input['end'].' '.$input['end_time']));

        $input['assigned_to'] = implode(';',$input['assigned_to']);

        $calendar = $this->calendarRepository->update($input, $id);

        Flash::success('Calendar updated successfully.');

        return redirect(route('calendars.index'));
    }

    /**
     * Remove the specified Calendar from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $calendar = $this->calendarRepository->findWithoutFail($id);

        if (empty($calendar)) {
            Flash::error('Calendar not found');

            return redirect(route('calendars.index'));
        }

        $this->calendarRepository->delete($id);

        Flash::success('Calendar deleted successfully.');

        return redirect(route('calendars.index'));
    }
}
