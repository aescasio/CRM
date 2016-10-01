<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatemanageRolesRequest;
use App\Http\Requests\UpdatemanageRolesRequest;
use App\Models\Permission;
use App\Repositories\manageRolesRepository;
use Illuminate\Http\Request;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use DB;

class manageRolesController extends AppBaseController
{
    /** @var  manageRolesRepository */
    private $manageRolesRepository;

    public function __construct(manageRolesRepository $manageRolesRepo)
    {
        $this->manageRolesRepository = $manageRolesRepo;
    }

    /**
     * Display a listing of the manageRoles.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->manageRolesRepository->pushCriteria(new RequestCriteria($request));
        $manageRoles = $this->manageRolesRepository->all();
        $counter = 1;
        return view('manageRoles.index',compact(
            'counter',
            'manageRoles'
        ));
    }

    /**
     * Show the form for creating a new manageRoles.
     *
     * @return Response
     */
    public function create()
    {
        $permits = Permission::all()->pluck('name','id');
        $selected_permits = null;
        return view('manageRoles.create', compact('permits','selected_permits'));
    }

    /**
     * Store a newly created manageRoles in storage.
     *
     * @param CreatemanageRolesRequest $request
     *
     * @return Response
     */
    public function store(CreatemanageRolesRequest $request)
    {
        $input = $request->all();

        $manageRoles = $this->manageRolesRepository->create($input);

        if(! empty($request->permits)){
            foreach($request->permits as $permit){
                $insert_new_roles = DB::table('permission_role')->insert(
                    [ 'role_id' => $manageRoles->id, 'permission_id' => $permit ]
                );
            }
        }

        Flash::success('manageRoles saved successfully.');

        return redirect(route('manageRoles.index'));
    }

    /**
     * Display the specified manageRoles.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $manageRoles = $this->manageRolesRepository->findWithoutFail($id);

        if (empty($manageRoles)) {
            Flash::error('manageRoles not found');

            return redirect(route('manageRoles.index'));
        }

        return view('manageRoles.show',compact(
            'manageRoles'
        ));
    }

    /**
     * Show the form for editing the specified manageRoles.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $manageRoles = $this->manageRolesRepository->findWithoutFail($id);

        if (empty($manageRoles)) {

            Flash::error('manageRoles not found');

            return redirect(route('manageRoles.index'));
        }
        $permits = Permission::all()->pluck('name','id');
        $selected_permits = DB::table('permission_role')->where('role_id', $id)->pluck('permission_id');

        return view('manageRoles.edit',compact(
            'manageRoles',
            'permits',
            'selected_permits'
        ));
    }

    /**
     * Update the specified manageRoles in storage.
     *
     * @param  int              $id
     * @param UpdatemanageRolesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatemanageRolesRequest $request)
    {
        $manageRoles = $this->manageRolesRepository->findWithoutFail($id);

        if (empty($manageRoles)) {
            Flash::error('manageRoles not found');

            return redirect(route('manageRoles.index'));
        }

        $manageRoles = $this->manageRolesRepository->update($request->all(), $id);

        //$role_id = DB::table('role_user')->where('')
        $delete_permissions = DB::table('permission_role')->where('role_id',$id)->delete();

        if( ! empty($request->permits)){
            foreach($request->permits as $permit){
                $insert_new_permission = DB::table('permission_role')->insert(
                    [ 'role_id' => $id, 'permission_id' => $permit ]
                );
            }
        }

        Flash::success('manageRoles updated successfully.');

        return redirect(route('manageRoles.index'));
    }

    /**
     * Remove the specified manageRoles from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $manageRoles = $this->manageRolesRepository->findWithoutFail($id);

        if (empty($manageRoles)) {
            Flash::error('manageRoles not found');

            return redirect(route('manageRoles.index'));
        }

        $this->manageRolesRepository->delete($id);

        Flash::success('manageRoles deleted successfully.');

        return redirect(route('manageRoles.index'));
    }
}
