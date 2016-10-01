<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateTargetRequest;
use App\Http\Requests\UpdateTargetRequest;
use App\Models\Target;
use App\Repositories\TargetRepository;
use Illuminate\Http\Request;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use App\User;
use Auth;

class TargetController extends AppBaseController
{
    /** @var  TargetRepository */
    private $targetRepository;

    public function __construct(TargetRepository $targetRepo)
    {
        $this->targetRepository = $targetRepo;
    }

    /**
     * Display a listing of the Target.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->targetRepository->pushCriteria(new RequestCriteria($request));

        $targets = Target::where('assigned_to',Auth::user()->id)->paginate(10);

        if(Auth::user()->hasRole(['admin'])){
            $targets = $this->targetRepository->paginate(10);
        }

        $i = $targets->firstItem();

        return view('targets.index',compact(
            'i',
            'targets'
        ));
    }

    /**
     * Show the form for creating a new Target.
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

        return view('targets.create',compact(
            'users'
        ));

    }

    /**
     * Store a newly created Target in storage.
     *
     * @param CreateTargetRequest $request
     *
     * @return Response
     */
    public function store(CreateTargetRequest $request)
    {
        $input = $request->all();

        $target = $this->targetRepository->create($input);

        Flash::success('Target saved successfully.');

        return redirect(route('targets.index'));
    }

    /**
     * Display the specified Target.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $target = $this->targetRepository->findWithoutFail($id);

        Target::find($id)->where('assigned_to', \Auth::user()->id)->update(['notifications'=>false]);

        if (empty($target)) {
            Flash::error('Target not found');

            return redirect(route('targets.index'));
        }

        return view('targets.show',compact(
            'target'
        ));
    }

    /**
     * Show the form for editing the specified Target.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $target = $this->targetRepository->findWithoutFail($id);

        Target::find($id)->where('assigned_to', \Auth::user()->id)->update(['notifications'=>false]);

        if(Auth::user()->hasRole('admin')){
            $users = User::pluck( 'nick_name' , 'id' );
        }elseif(Auth::user()->hasRole('sales')){
            $users = Role::find(2)->users()->pluck('full_name','id');
        }elseif(Auth::user()->hasRole('marketing')){
            $users = Role::find(3)->users()->pluck('full_name','id');
        }

        if (empty($target)) {
            Flash::error('Target not found');

            return redirect(route('targets.index'));
        }

        return view('targets.edit',compact(
            'target',
            'users'
        ));
    }

    /**
     * Update the specified Target in storage.
     *
     * @param  int              $id
     * @param UpdateTargetRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTargetRequest $request)
    {
        $target = $this->targetRepository->findWithoutFail($id);

        if (empty($target)) {
            Flash::error('Target not found');

            return redirect(route('targets.index'));
        }

        $target = $this->targetRepository->update($request->all(), $id);

        Flash::success('Target updated successfully.');

        return redirect(route('targets.index'));
    }

    /**
     * Remove the specified Target from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $target = $this->targetRepository->findWithoutFail($id);

        if (empty($target)) {
            Flash::error('Target not found');

            return redirect(route('targets.index'));
        }

        $this->targetRepository->delete($id);

        Flash::success('Target deleted successfully.');

        return redirect(route('targets.index'));
    }

    public function modal(){
        $targets = $this->targetRepository->paginate(10);
        return view('modals.content.targets',compact(
            'counter',
            'targets'
        ));
    }
}
