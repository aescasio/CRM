<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use App\Models\Account;
use App\Repositories\AccountRepository;
use App\Repositories\CampaignRepository;
use Illuminate\Http\Request;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use App\Models\Codelookups;
use App\User;
use App\Standards;
use App\Models\Campaign;
use Auth;
use App\Models\Role;

class AccountController extends AppBaseController
{
    /** @var  AccountRepository */
    private $accountRepository;

    public function __construct( AccountRepository $accountRepo )
    {
        $this->accountRepository = $accountRepo;
    }

    /**
     * Display a listing of the Account.
     * @param Request $request
     * @return Response
     */
    public function index( Request $request )
    {
        $this->accountRepository->pushCriteria( new RequestCriteria( $request ) );

        $accounts = Account::where('assigned_to',Auth::user()->id)->paginate(10);

        if(Auth::user()->hasRole(['admin'])){
            $accounts = $this->accountRepository->paginate( 10 );
        }

        $i = $accounts->firstItem();



        return view( 'accounts.index' , compact(
            'accounts',
            'i'
        ));
    }

    /**
     * Show the form for creating a new Account.
     * @return Response
     */
    public function create()
    {
        //$industry_options = Industrytype::lists('name','id');
        //$industry_options = DB::table('codelookups')->where('typename', 'INDUSTYPE')->distinct()->lists('string','code');

        $industry_type = Codelookups::where( 'typename' , 'INDUSTYPE' )
            ->distinct()
            ->lists( 'string' , 'code' );

        $account_type = Codelookups::where( 'typename' , 'ACCTTYPE' )
            ->distinct()
            ->pluck( 'string' , 'code' );

        if(Auth::user()->hasRole('admin')){
            $users_options = User::pluck( 'nick_name' , 'id' );
        }elseif(Auth::user()->hasRole('sales')){
            $users_options = Role::find(2)->users()->pluck('full_name','id');
        }elseif(Auth::user()->hasRole('marketing')){
            $users_options = Role::find(3)->users()->pluck('full_name','id');
        }

        return view( 'accounts.create' , compact(
            'industry_type' ,
            'account_type' ,
            'users_options' ,
            'campaigns'
        ) );

    }

    /**
     * Store a newly created Account in storage.
     * @param CreateAccountRequest $request
     * @return Response
     */
    public function store( CreateAccountRequest $request )
    {
        $standard = new Standards();

        $input = $request->all();

        $input[ 'annual_revenue' ] = $standard->unMask( $input[ 'annual_revenue' ] );

        $account = $this->accountRepository->create( $input );

        Flash::success( 'Account saved successfully.' );

        return redirect( route( 'accounts.index' ) );
    }

    /**
     * Display the specified Account.
     * @param  int $id
     * @return Response
     */
    public function show( $id )
    {
        $account = $this->accountRepository->findWithoutFail( $id );

        Account::where('id',$id)->where('assigned_to', \Auth::user()->id)->update(['notifications'=>0]);

        $industry_type = Codelookups::where( 'typename' , 'INDUSTYPE' )
            ->where('code', $account->industry_type)
            ->pluck('string');

        $account_type = Codelookups::where( 'typename' , 'ACCTTYPE' )
            ->where('code',$account->account_type)
            ->pluck('string');

        if ( empty( $account ) )
        {
            Flash::error( 'Account not found' );

            return redirect( route( 'accounts.index' ) );
        }

        return view( 'accounts.show' )
            ->with( 'account' , $account )
            ->with('industry_type',$industry_type[0])
            ->with('account_type',$account_type[0]);
    }

    /**
     * Show the form for editing the specified Account.
     * @param  int $id
     * @return Response
     */
    public function edit( $id )
    {
        $account = $this->accountRepository->findWithoutFail( $id );

        Account::where('id',$id)->where('assigned_to', \Auth::user()->id)->update(['notifications'=>false]);

        if(Auth::user()->hasRole('admin') || Auth::user()->can('global-permission')){

        }elseif($account->assigned_to != Auth::user()->id){
            return view('errors.403');
        }

        if ( empty( $account ) )
        {

            Flash::error( 'Account not found' );

            return redirect( route( 'accounts.index' ) );
        }

        $industry_type = Codelookups::where( 'typename' , 'INDUSTYPE' )
            ->distinct()
            ->lists( 'string' , 'code' );

        $account_type = Codelookups::where( 'typename' , 'ACCTTYPE' )
            ->distinct()
            ->lists( 'string' , 'code' );

        if(Auth::user()->hasRole('admin')){
            $users_options = User::pluck( 'nick_name' , 'id' );
        }elseif(Auth::user()->hasRole('sales')){
            $users_options = Role::find(2)->users()->pluck('full_name','id');
        }elseif(Auth::user()->hasRole('marketing')){
            $users_options = Role::find(3)->users()->pluck('full_name','id');
        }

        return view( 'accounts.edit' , compact(
            'account' ,
            'industry_type' ,
            'account_type' ,
            'users_options'
        ) );
    }

    /**
     * Update the specified Account in storage.
     * @param  int                 $id
     * @param UpdateAccountRequest $request
     * @return Response
     */
    public function update( $id , UpdateAccountRequest $request )
    {
        $standards = new Standards();
        $account = $this->accountRepository->findWithoutFail( $id );

        if ( empty( $account ) )
        {
            Flash::error( 'Account not found' );

            return redirect( route( 'accounts.index' ) );
        }

        $account = $this->accountRepository->update( $standards->unMaskArray( $request->all() ) , $id );

        Flash::success( 'Account updated successfully.' );

        return redirect( route( 'accounts.index' ) );
    }

    /**
     * Remove the specified Account from storage.
     * @param  int $id
     * @return Response
     */
    public function destroy( $id )
    {
        $account = $this->accountRepository->findWithoutFail( $id );

        if ( empty( $account ) )
        {
            Flash::error( 'Account not found' );

            return redirect( route( 'accounts.index' ) );
        }

            $this->accountRepository->delete( $id );


        Flash::success( 'Account deleted successfully.' );

        return redirect( route( 'accounts.index' ) );
    }

    public function modal(){
        $accounts = Account::paginate(10);

        return view( 'modals.content.accounts', compact(
            'accounts'
        ));
    }
}
