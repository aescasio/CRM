<?php

    namespace App\Http\Controllers;

    use App\Http\Requests;
    use App\Http\Requests\CreateCampaignRequest;
    use App\Http\Requests\UpdateCampaignRequest;
    use App\Models\Campaign;
    use App\Repositories\CampaignRepository;
    use Illuminate\Http\Request;
    use Flash;
    use InfyOm\Generator\Controller\AppBaseController;
    use Prettus\Repository\Criteria\RequestCriteria;
    use Response;

    use App\User;
    use App\Standards;
    use App\Models\Codelookups;
    use Auth;

    class CampaignController extends AppBaseController
    {
        /** @var  CampaignRepository */
        private $campaignRepository;


        public function __construct( CampaignRepository $campaignRepo )
        {
            $this->campaignRepository = $campaignRepo;
        }

        /**
         * Display a listing of the Campaign.
         * @param Request $request
         * @return Response
         */
        public function index( Request $request )
        {

            $this->campaignRepository->pushCriteria( new RequestCriteria( $request ) );

            $campaigns = Campaign::where('assigned_to',Auth::user()->id)->paginate(10);

            if(Auth::user()->hasRole(['admin'])){
                $campaigns = $this->campaignRepository->paginate(10);
            }

            $i = $campaigns->firstItem();

            return view( 'campaigns.index', compact(
                'i',
                'campaigns'
            ) );

        }

        /**
         * Show the form for creating a new Campaign.
         * @return Response
         */
        public function create()
        {
            $status = Codelookups::where( 'typename', 'CMPGNSTAT' )
                ->distinct()
                ->orderBy( 'string' )
                ->pluck( 'string', 'string2' );

            $types = Codelookups::where( 'typename', 'CMPGNTYPE' )
                ->distinct()
                ->orderBy( 'string' )
                ->pluck( 'string', 'string2' );

            if(Auth::user()->hasRole('admin')){
                $users_options = User::pluck( 'nick_name' , 'id' );
            }elseif(Auth::user()->hasRole('sales')){
                $users_options = Role::find(2)->users()->pluck('full_name','id');
            }elseif(Auth::user()->hasRole('marketing')){
                $users_options = Role::find(3)->users()->pluck('full_name','id');
            }

            return view( 'campaigns.create', compact(
                'users_options',
                'status',
                'types'
            ) );
        }

        /**
         * Store a newly created Campaign in storage.
         * @param CreateCampaignRequest $request
         * @return Response
         */
        public function store( CreateCampaignRequest $request )
        {

            $standard = new Standards();
            $input = $request->all();

            $input[ 'start_date' ] = $standard->dateToDB( $input[ 'start_date' ] );
            $input[ 'end_date' ] = $standard->dateToDB( $input[ 'end_date' ] );
            $input = $standard->unMaskArray( $input );

            //dd($input);

            $campaign = $this->campaignRepository->create( $input );

            Flash::success( 'Campaign saved successfully.' );

            return redirect( route( 'campaigns.index' ) );
        }

        /**
         * Display the specified Campaign.
         * @param  int $id
         * @return Response
         */
        public function show( $id )
        {
            $campaign = $this->campaignRepository->findWithoutFail( $id );

            Campaign::where('id', $id)->where('assigned_to', \Auth::user()->id)->update(['notifications'=>false]);

            if ( empty( $campaign ) )
            {
                Flash::error( 'Campaign not found' );

                return redirect( route( 'campaigns.index' ) );
            }

            return view( 'campaigns.show', compact(
                'campaign'
            ) );
        }

        /**
         * Show the form for editing the specified Campaign.
         * @param  int $id
         * @return Response
         */
        public function edit( $id )
        {
            $campaign = $this->campaignRepository->findWithoutFail( $id );

            Campaign::where('id', $id)->where('assigned_to', \Auth::user()->id)->update(['notifications'=>false]);

            $status = Codelookups::where( 'typename', 'CMPGNSTAT' )
                ->distinct()
                ->orderBy( 'string' )
                ->pluck( 'string', 'string2' );

            $types = Codelookups::where( 'typename', 'CMPGNTYPE' )
                ->distinct()
                ->orderBy( 'string' )
                ->pluck( 'string', 'string2' );

            if ( empty( $campaign ) )
            {
                Flash::error( 'Campaign not found' );

                return redirect( route( 'campaigns.index' ) );
            }

            if(Auth::user()->hasRole('admin')){
                $users_options = User::pluck( 'nick_name' , 'id' );
            }elseif(Auth::user()->hasRole('sales')){
                $users_options = Role::find(2)->users()->pluck('full_name','id');
            }elseif(Auth::user()->hasRole('marketing')){
                $users_options = Role::find(3)->users()->pluck('full_name','id');
            }

            return view( 'campaigns.edit', compact(
                'campaign',
                'users_options',
                'status',
                'types'
            ) );
        }

        /**
         * Update the specified Campaign in storage.
         * @param  int $id
         * @param UpdateCampaignRequest $request
         * @return Response
         */
        public function update( $id, UpdateCampaignRequest $request )
        {
            $standards = new Standards();
            $campaign = $this->campaignRepository->findWithoutFail( $id );

            if ( empty( $campaign ) )
            {
                Flash::error( 'Campaign not found' );

                return redirect( route( 'campaigns.index' ) );
            }

            $campaign = $this->campaignRepository->update( $standards->unMaskArray( $request->all() ), $id );

            Flash::success( 'Campaign updated successfully.' );

            return redirect( route( 'campaigns.index' ) );
        }

        /**
         * Remove the specified Campaign from storage.
         * @param  int $id
         * @return Response
         */
        public function destroy( $id )
        {
            $campaign = $this->campaignRepository->findWithoutFail( $id );

            if ( empty( $campaign ) )
            {
                Flash::error( 'Campaign not found' );

                return redirect( route( 'campaigns.index' ) );
            }

            $this->campaignRepository->delete( $id );

            Flash::success( 'Campaign deleted successfully.' );

            return redirect( route( 'campaigns.index' ) );
        }

        public function modal()
        {
            $campaigns = Campaign::paginate(10);

            return view( 'modals.content.campaigns', compact(
                'campaigns'
            ));
        }
    }
