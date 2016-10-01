<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateOpportunitiesRequest;
use App\Http\Requests\UpdateOpportunitiesRequest;
use App\Models\Opportunities;
use App\Repositories\OpportunitiesRepository;
use Illuminate\Http\Request;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use DB;
use App\Standards;
use Auth;
use App\User;

class OpportunitiesController extends AppBaseController
{
    /** @var  OpportunitiesRepository */
    private $opportunitiesRepository;

    public function __construct(OpportunitiesRepository $opportunitiesRepo)
    {
        $this->opportunitiesRepository = $opportunitiesRepo;
    }

    /**
     * Display a listing of the Opportunities.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->opportunitiesRepository->pushCriteria(new RequestCriteria($request));

        $opportunities = Opportunities::where('assigned_to',Auth::user()->id)->paginate(10);

        if(Auth::user()->hasRole(['admin'])){
            $opportunities = $this->opportunitiesRepository->paginate(10);
        }
        $counter = $opportunities->firstItem();

        return view('opportunities.index',compact(
            'counter',
            'opportunities'
        ));
    }

    /**
     * Show the form for creating a new Opportunities.
     *
     * @return Response
     */
    public function create()
    {

        $lead_source = DB::table('codelookups')->where('typename','LEADSOURCE')->orderBy('string','asc')->pluck('string','string2');


        if(Auth::user()->hasRole('admin')){
            $assigned_to = User::pluck( 'nick_name' , 'id' );
        }elseif(Auth::user()->hasRole('sales')){
            $assigned_to = Role::find(2)->users()->pluck('full_name','id');
        }elseif(Auth::user()->hasRole('marketing')){
            $assigned_to = Role::find(3)->users()->pluck('full_name','id');
        }

        return view('opportunities.create', compact(
            'lead_source',
            'assigned_to'
        ));
    }

    /**
     * Store a newly created Opportunities in storage.
     *
     * @param CreateOpportunitiesRequest $request
     *
     * @return Response
     */
    public function store(CreateOpportunitiesRequest $request)
    {
        $Standards = new Standards();
        $input = $request->all();

        $input = $Standards->unMaskArray($input);

        $opportunities = $this->opportunitiesRepository->create($input);

        Flash::success('Opportunities saved successfully.');

        return redirect(route('opportunities.index'));
    }

    /**
     * Display the specified Opportunities.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $opportunities = $this->opportunitiesRepository->findWithoutFail($id);

        Opportunities::where('id', $id)->where('assigned_to', \Auth::user()->id)->update(['notifications'=>false]);

        if (empty($opportunities)) {
            Flash::error('Opportunities not found');

            return redirect(route('opportunities.index'));
        }

        return view('opportunities.show',compact(
            'opportunities'
        ));
    }

    /**
     * Show the form for editing the specified Opportunities.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $opportunities = $this->opportunitiesRepository->findWithoutFail($id);
        Opportunities::where('id', $id)->where('assigned_to', \Auth::user()->id)->update(['notifications'=>false]);

        $lead_source = DB::table('codelookups')->where('typename','LEADSOURCE')->orderBy('string','asc')->pluck('string','string2');
        if(Auth::user()->hasRole('admin')){
            $assigned_to = User::pluck( 'nick_name' , 'id' );
        }elseif(Auth::user()->hasRole('sales')){
            $assigned_to = Role::find(2)->users()->pluck('full_name','id');
        }elseif(Auth::user()->hasRole('marketing')){
            $assigned_to = Role::find(3)->users()->pluck('full_name','id');
        }

        if (empty($opportunities)) {
            Flash::error('Opportunities not found');

            return redirect(route('opportunities.index'));
        }

        $closed_date = implode('',DB::table('opportunities')->where('id',$id)->pluck('closed_date')) ;

        return view('opportunities.edit',compact(
            'opportunities',
            'lead_source',
            'assigned_to'
        ));
    }

    /**
     * Update the specified Opportunities in storage.
     *
     * @param  int              $id
     * @param UpdateOpportunitiesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOpportunitiesRequest $request)
    {
        $Standards = new Standards();
        $opportunities = $this->opportunitiesRepository->findWithoutFail($id);

        if (empty($opportunities)) {
            Flash::error('Opportunities not found');

            return redirect(route('opportunities.index'));
        }
        $input = $request->all();
        $input = $Standards->unMaskArray($input);

        $opportunities = $this->opportunitiesRepository->update($input, $id);

        Flash::success('Opportunities updated successfully.');

        return redirect(route('opportunities.index'));
    }

    /**
     * Remove the specified Opportunities from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $opportunities = $this->opportunitiesRepository->findWithoutFail($id);

        if (empty($opportunities)) {
            Flash::error('Opportunities not found');

            return redirect(route('opportunities.index'));
        }

        $this->opportunitiesRepository->delete($id);

        Flash::success('Opportunities deleted successfully.');

        return redirect(route('opportunities.index'));
    }

    public function modal()
    {
        $opportunities = $this->opportunitiesRepository->paginate(10);
        return view('modals.content.opportunities',compact(
            'opportunities'
        ));
    }
}
