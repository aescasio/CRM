<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateManageUserRequest;
use App\Http\Requests\UpdateManageUserRequest;
use App\Repositories\ManageUserRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use InfyOm\Generator\Controller\AppBaseController;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use App\Models\Permission;
use App\Models\Role;
use App\User;


class ManageUserController extends AppBaseController
{
    /** @var  ManageUserRepository */
    private $manageUserRepository;

    public function __construct( ManageUserRepository $manageUserRepo )
    {
        $this->manageUserRepository = $manageUserRepo;
    }

    /**
     * Display a listing of the ManageUser.
     * @param Request $request
     * @return Response
     */
    public function index( Request $request )
    {
        $this->manageUserRepository->pushCriteria( new RequestCriteria( $request ) );
        $manageUsers = $this->manageUserRepository->paginate( 15 );
        $counter = 1;

        return view( 'manageUsers.index' , compact(
            'counter' ,
            'manageUsers'
        ) );
    }

    /**
     * Show the form for creating a new ManageUser.
     * @return Response
     */
    public function create()
    {
        $roles = Role::all()->pluck( 'name' , 'id' );

        return view( 'manageUsers.create' , [ 'roles' => $roles , 'selected_roles' => null ] );
    }

    /**
     * Store a newly created ManageUser in storage.
     * @param CreateManageUserRequest $request
     * @return Response
     */
    public function store( CreateManageUserRequest $request )
    {
        $input = $request->all();

        if($request->hasFile('photo')){

            $photo = $request->file('photo');

            $filename = $photo->getClientOriginalName();

            $last_id = implode(',', \DB::connection('mysql2')->table('INFORMATION_SCHEMA.TABLES')
                ->select('AUTO_INCREMENT')->where('TABLE_SCHEMA','enchan_crm')
                ->where('TABLE_NAME','enchan_users')->pluck('AUTO_INCREMENT'));

            $destination = public_path().'/img/profile_picture/'.$last_id;

            //Check if folder not exists
            if(!is_dir($destination)){
                \File::makeDirectory($destination, 0777 ,true);
            }

            $photo->move($destination, $filename);

            $input['photo'] = $filename;
        }


        $input[ 'password' ] = bcrypt( $request[ 'password' ] );

        $manageUser = $this->manageUserRepository->create( $input ); //Insert new record

        if ( ! empty( $request->roles ) )
        {
            foreach ( $request->roles as $role )
            {
                $insert_new_roles = DB::table( 'role_user' )->insert(
                    [ 'user_id' => $manageUser->id , 'role_id' => $role ]
                );
            }
        }

        Flash::success( 'User credentials saved successfully.' );

        return redirect( route( 'manageUsers.index' ) );
    }

    /**
     * Display the specified ManageUser.
     * @param  int $id
     * @return Response
     */
    public function show( $id )
    {
        $manageUser = $this->manageUserRepository->findWithoutFail( $id );

        if ( empty( $manageUser ) )
        {
            Flash::error( 'ManageUser not found' );

            return redirect( route( 'manageUsers.index' ) );
        }

        return view( 'manageUsers.show' , compact(
            'manageUser'
        ) );
    }

    /**
     * Show the form for editing the specified ManageUser.
     * @param  int $id
     * @return Response
     */
    public function edit( $id )
    {
        $manageUser = $this->manageUserRepository->findWithoutFail( $id );

        if ( empty( $manageUser ) )
        {
            Flash::error( 'ManageUser not found' );

            return redirect( route( 'manageUsers.index' ) );
        }

        $roles = Role::all()->pluck( 'name' , 'id' );
        $selected_roles = DB::table( 'role_user' )->where( 'user_id' , $id )->pluck( 'role_id' );

        return view( 'manageUsers.edit' , compact(
            'manageUser' ,
            'roles' ,
            'selected_roles'
        ) );
    }

    /**
     * Update the specified ManageUser in storage.
     * @param  int                    $id
     * @param UpdateManageUserRequest $request
     * @return Response
     */
    public function update( $id , UpdateManageUserRequest $request )
    {
        $manageUser = $this->manageUserRepository->findWithoutFail( $id );
        $input = $request->all();

        $prev_pass = User::where('id',$id)->pluck('password'); //Get previous password

        if ( empty( $manageUser ) )
        {
            Flash::error( 'ManageUser not found' );

            return redirect( route( 'manageUsers.index' ) );
        }

        $delete_roles = DB::table( 'role_user' )->where( 'user_id' , $id )->delete();

        foreach ( $request->roles as $role )
        {
            $insert_new_roles = DB::table( 'role_user' )->insert(
                [ 'user_id' => $id , 'role_id' => $role ]
            );
        }


        if($request->hasFile('photo')){
            $photo = $request->file('photo');

            $filename = $photo->getClientOriginalName();

            $last_id = implode(',', \DB::connection('mysql2')->table('INFORMATION_SCHEMA.TABLES')->select('AUTO_INCREMENT')->where('TABLE_SCHEMA','enchan_crm')->where('TABLE_NAME','enchan_users')->pluck('AUTO_INCREMENT'));

            $destination = public_path().'/img/profile_picture/'.$last_id;

            if(Auth::user()->id == $id){
                $destination = public_path().'/img/profile_picture/'.$id;
            }

            if(!is_dir($destination)){ //if directory path not exists
                \File::makeDirectory($destination, 0777 ,true);
            }

            if(\File::exists($destination.'/'.User::find($id)->photo)){
                \File::delete($destination.'/'.User::find($id)->photo);
            }

            $photo->move($destination, $filename);

            $input['photo'] = $filename;
        }

        isset($request[ 'password' ]) ? $input[ 'password' ] = bcrypt( $request[ 'password' ] ) : $request[ 'password' ] = $prev_pass  ;

        $manageUser = $this->manageUserRepository->update( $input , $id );

        Flash::success( 'User updated successfully.' );

        return redirect( route( 'manageUsers.index' ) );
    }

    /**
     * Remove the specified ManageUser from storage.
     * @param  int $id
     * @return Response
     */
    public function destroy( $id )
    {
        $manageUser = $this->manageUserRepository->findWithoutFail( $id );

        if ( empty( $manageUser ) )
        {
            Flash::error( 'ManageUser not found' );

            return redirect( route( 'manageUsers.index' ) );
        }

        $this->manageUserRepository->delete( $id );

        Flash::success( 'ManageUser deleted successfully.' );

        return redirect( route( 'manageUsers.index' ) );
    }
}
