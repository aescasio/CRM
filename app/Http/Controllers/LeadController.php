<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateLeadRequest;
use App\Http\Requests\UpdateLeadRequest;
use App\Models\Lead;
use App\Repositories\LeadRepository;
use Illuminate\Http\Request;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use DB;
use App\User;
use App\Standards;
use App\Models\Role;
use Auth;

class LeadController extends AppBaseController
{
    /** @var  LeadRepository */
    private $leadRepository;

    public function __construct(LeadRepository $leadRepo)
    {
        $this->leadRepository = $leadRepo;
    }

    /**
     * Display a listing of the Lead.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->leadRepository->pushCriteria(new RequestCriteria($request));

        $leads = Lead::where('assigned_to', Auth::user()->id)->paginate(10);

        $i = $leads->firstItem();

        if(Auth::user()->hasRole('admin')){
            $leads = $this->leadRepository->paginate(10);
        }

        return view('leads.index',compact(
            'i',
            'leads'
        ));
    }

    /**
     * Show the form for creating a new Lead.
     *
     * @return Response
     */
    public function create()
    {
        $lead_source = DB::table('codelookups')->where('typename', 'LEADSOURCE')->pluck('string','string2');

        if(Auth::user()->hasRole('admin')){
            $assigned_to = User::pluck( 'nick_name' , 'id' );
        }elseif(Auth::user()->hasRole('sales')){
            $assigned_to = Role::find(2)->users()->pluck('full_name','id');
        }elseif(Auth::user()->hasRole('marketing')){
            $assigned_to = Role::find(3)->users()->pluck('full_name','id');
        }

        return view('leads.create', compact(
            'lead_source',
            'assigned_to'
        ));
    }

    /**
     * Store a newly created Lead in storage.
     *
     * @param CreateLeadRequest $request
     *
     * @return Response
     */
    public function store(CreateLeadRequest $request)
    {
        $input = $request->all();
        $standards = new Standards();

        $lead = $this->leadRepository->create($standards->unMaskArray($input));

        Flash::success('Lead saved successfully.');

        return redirect(route('leads.index'));
    }

    /**
     * Display the specified Lead.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $lead = $this->leadRepository->findWithoutFail($id);
        Lead::where('id', $id)->where('assigned_to', \Auth::user()->id)->update(['notifications'=>false]);

        if (empty($lead)) {
            Flash::error('Lead not found');

            return redirect(route('leads.index'));
        }

        return view('leads.show',compact(
            'lead'
        ));
    }

    /**
     * Show the form for editing the specified Lead.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $lead = $this->leadRepository->findWithoutFail($id);

        Lead::where('id', $id)->where('assigned_to', \Auth::user()->id)->update(['notifications'=>false]);

        if(Auth::user()->hasRole('admin') || Auth::user()->can('global-permission')){
        }elseif($lead->assigned_to != Auth::user()->id){
            return view('errors.403');
        }

        $lead_source = DB::table('codelookups')->where('typename', 'LEADSOURCE')->pluck('string','string2');

        if (empty($lead)) {
            Flash::error('Lead not found');

            return redirect(route('leads.index'));
        }

        if(Auth::user()->hasRole('admin')){
            $assigned_to = User::pluck( 'nick_name' , 'id' );
        }elseif(Auth::user()->hasRole('sales')){
            $assigned_to = Role::find(2)->users()->pluck('full_name','id');
        }elseif(Auth::user()->hasRole('marketing')){
            $assigned_to = Role::find(3)->users()->pluck('full_name','id');
        }

        return view('leads.edit',compact(
            'lead',
            'lead_source',
            'assigned_to'
        ));
    }

    /**
     * Update the specified Lead in storage.
     *
     * @param  int              $id
     * @param UpdateLeadRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLeadRequest $request)
    {
        $lead = $this->leadRepository->findWithoutFail($id);
        $standards = new Standards();

        if (empty($lead)) {
            Flash::error('Lead not found');

            return redirect(route('leads.index'));
        }

        $lead = $this->leadRepository->update($standards->unMaskArray($request->all()), $id);

        Flash::success('Lead updated successfully.');

        return redirect(route('leads.index'));
    }

    /**
     * Remove the specified Lead from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $lead = $this->leadRepository->findWithoutFail($id);

        if (empty($lead)) {
            Flash::error('Lead not found');

            return redirect(route('leads.index'));
        }

        $this->leadRepository->delete($id);

        Flash::success('Lead deleted successfully.');

        return redirect(route('leads.index'));
    }

    public function modal(){

        $leads = $this->leadRepository->paginate(15);

        return view( 'modals.content.leads', compact(
            'leads'
        ));
    }
}
