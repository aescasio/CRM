@extends('layouts.app')

@section('htmlheader_title') Account @endsection

@section('main-content')

    <div class="container spark-screen">

        <div class="clearfix"></div>

        @include('common.errors')

        <div class="clearfix"></div>

        @if( Auth::user()->hasRole(['admin','sales','marketing']))

        {{-- Start Account --}}
        <div class="row">
            <div class="col-md-12 col-md-pull-0">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"> Accounts </h3>
                        <div class="box-tools">
                            @if( Auth::user()->hasRole(['admin']))
                            <div class="box-tools">
                                <a class="btn btn-block btn-primary btn-sm" href="{!! route('accounts.create') !!}">Add New</a>
                            </div>
                            @endif
                        </div>
                    </div>
                    <!-- Body start -->
                    <div class="box-body no-padding">
                        <table class="table table-responsive" id="meetings-table">
                            @if($accounts->isEmpty())
                                <div class="well text-center">No Accounts found assigned to you.</div>
                            @else
                                <thead>
                                <th>#</th>
                                <th>Name</th>
                                <th>Website</th>
                                <th>office_phone</th>
                                <th>office_fax</th>
                                <th>Assigned To</th>
                                <th>Campaign Name</th>
                                <th colspan="3">Action</th>
                                </thead>
                            @endif

                            <tbody>
                            @foreach($accounts as $account)

                                <tr>
                                    <td> {!! $accnt_no++ !!} </td>
                                    <td>{!! $account->name !!}</td>
                                    <td>{!! $account->website !!}</td>
                                    <td>{!! $account->office_phone !!}</td>
                                    <td>{!! $account->office_fax !!}</td>
                                    <td>{!! $account->User['nick_name'] !!}</td>
                                    <td>{!! $account->Campaign['name'] !!}</td>
                                    <td>

                                        {!! Form::open(['route' => ['accounts.destroy', $account->id], 'method' => 'delete']) !!}
                                        <div class='btn-group'>
                                            @if($account->notifications)
                                                <a href="{!! route('accounts.show', [$account->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-bell text-green"></i></a>
                                            @else
                                                <a href="{!! route('accounts.show', [$account->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                                            @endif
                                            <a href="{!! route('accounts.edit', [$account->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                                            {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure you want to delete $account->name?')"]) !!}
                                        </div>
                                        {!! Form::close() !!}
                                    </td>

                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>

        {{-- Start Contacts --}}
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"> Contacts </h3>
                        <div class="box-tools">
                            @if( Auth::user()->hasRole(['admin']))
                                <div class="box-tools">
                                    <a class="btn btn-block btn-primary btn-sm" href="{!! route('contacts.create') !!}">Add New</a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- Body start -->
                    <div class="box-body no-padding">
                        <table class="table table-responsive" id="contacts-table">
                            <thead>
                            <th>#</th>
                            <th>Salutation</th>
                            <th>First Name:</th>
                            <th>M.I.</th>
                            <th>Last Name</th>
                            <th>Phone No.:</th>
                            <th>Account</th>
                            <th colspan="3">Action</th>
                            </thead>
                            <tbody>
                            @foreach($contacts as $contact)
                                <tr>
                                    <td> {!! $cntct_no++ !!}</td>
                                    <td>{{ $contact->salutation }}</td>
                                    <td>{{ $contact->first_name }}</td>
                                    <td>{{ $contact->mi }}.</td>
                                    <td>{{ $contact->last_name }}</td>
                                    <td>{{ $contact->office_phone }}</td>
                                    <td>{{ $contact->Accounts['name'] }}</td>
                                    <td>
                                        {!! Form::open(['route' => ['contacts.destroy', $contact->id], 'method' => 'delete']) !!}
                                        <div class='btn-group'>
                                            @if($contact->notifications)
                                                <a href="{!! route('contacts.show', [$contact->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-bell text-green"></i></a>
                                            @else
                                                <a href="{!! route('contacts.show', [$contact->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                                            @endif
                                            <a href="{!! route('contacts.edit', [$contact->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                                            {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                        </div>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
        @endif

        {{-- Start Opportunities --}}
        @if( Auth::user()->hasRole(['admin','sales']))

        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"> Opportunities </h3>
                        <div class="box-tools">
                            @if( Auth::user()->hasRole(['admin']))
                                <div class="box-tools">
                                    <a class="btn btn-block btn-primary btn-sm" href="{!! route('opportunities.create') !!}">Add New</a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- Body start -->
                    <div class="box-body no-padding">
                        <table class="table table-responsive" id="opportunities-table">
                            @if($opportunities->isEmpty())
                                <div class="well text-center">No Opportunities found assigned to you.</div>
                            @else
                                <thead>
                                <th>#</th>
                                <th>Name</th>
                                <th>Account Name</th>
                                <th>Closed Date</th>
                                <th>Amount</th>
                                <th>Sales Stage</th>
                                <th>Lead Source</th>
                                <th>Probability</th>
                                <th>Campaign</th>
                                <th>Assigned To</th>
                                <th colspan="3">Action</th>
                                </thead>
                                </thead>
                            @endif

                            <tbody>
                            @foreach($opportunities as $opportunities)
                                <tr>

                                    <td> {!! $opprt_no++ !!}</td>
                                    <td>{!! $opportunities->name !!}</td>
                                    <td>{!! $opportunities->Account->name !!}</td>
                                    <td>{!! $opportunities->closed_date !!}</td>
                                    <td>{!! number_format($opportunities->amount,2) !!}</td>

                                    <td>{!! $opportunities->sales_stage !!}</td>
                                    <td>{!! $opportunities->lead_source !!}</td>
                                    <td>{!! $opportunities->probability.' %' !!}</td>
                                    <td>{!! $opportunities->Campaign['name'] !!}</td>
                                    <td>{!! $opportunities->User->full_name !!}</td>
                                    <td>
                                        {!! Form::open(['route' => ['opportunities.destroy', $opportunities->id], 'method' => 'delete']) !!}
                                        <div class='btn-group'>
                                            @if($opportunities->notifications)
                                                <a href="{!! route('opportunities.show', [$opportunities->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-bell text-green"></i></a>
                                            @else
                                                <a href="{!! route('opportunities.show', [$opportunities->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                                            @endif
                                            <a href="{!! route('opportunities.edit', [$opportunities->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                                            {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                        </div>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
        @endif

        {{-- Start Leads --}}
        @if( Auth::user()->hasRole(['admin','sales','marketing']))
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"> Leads </h3>
                        <div class="box-tools">
                            @if( Auth::user()->hasRole(['admin']))
                                <div class="box-tools">
                                    <a class="btn btn-block btn-primary btn-sm" href="{!! route('leads.create') !!}">Add New</a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- Body start -->
                    <div class="box-body no-padding">
                        <table class="table table-responsive" id="leads-table">
                            @if($leads->isEmpty())
                                <div class="well text-center">No Leads found assigned to you.</div>
                            @else
                                <thead>
                                <th>#</th>
                                <th>Salutation</th>
                                <th>Fullname</th>
                                <th>Position</th>
                                <th>Account Name</th>
                                <th>Assigned To</th>
                                <th>Status</th>
                                <th>Lead Source Id</th>
                                <th>Referred By</th>
                                <th>Campaign Id</th>
                                <th colspan="3">Action</th>
                                </thead>
                            @endif

                            <tbody>
                            @foreach($leads as $lead)
                                <tr>
                                    <td> {!! $ld_no++ !!}</td>
                                    <td>{!! $lead->salutation !!}</td>
                                    <td>{!! $lead->first_name.' '. $lead->last_name !!}</td>
                                    <td>{!! $lead->position !!}</td>
                                    <td>{!! $lead->account_name !!}</td>
                                    <td>{!! $lead->AssignedTo->full_name !!}</td>
                                    <td>{!! $lead->status !!}</td>
                                    <td>{!! $lead->lead_source !!}</td>
                                    <td>{!! $lead->referred_by !!}</td>
                                    <td>{!! $lead->campaign_name !!}</td>
                                    <td>
                                        {!! Form::open(['route' => ['leads.destroy', $lead->id], 'method' => 'delete']) !!}
                                        <div class='btn-group'>
                                            @if($lead->notifications)
                                                <a href="{!! route('leads.show', [$lead->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-bell text-green"></i></a>

                                            @else
                                                <a href="{!! route('leads.show', [$lead->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                                            @endif
                                            <a href="{!! route('leads.edit', [$lead->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                                            {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure you want to delete $lead->fullname?')"]) !!}
                                        </div>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
        @endif

        {{-- Start Campaigns --}}
        @if(Auth::user()->hasRole(['admin','marketing']))

        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"> Campaigns </h3>
                        <div class="box-tools">
                            @if( Auth::user()->hasRole(['admin']))
                                <div class="box-tools">
                                    <a class="btn btn-block btn-primary btn-sm" href="{!! route('campaigns.create') !!}">Add New</a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- Body start -->
                    <div class="box-body no-padding">
                        <table class="table table-responsive" id="opportunities-table">
                            @if($campaigns->isEmpty())
                                <div class="well text-center">No Campaigns found assigned to you.</div>
                            @else
                                <thead>
                                <th>#</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Type</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Assigned To</th>
                                <th> Date Created</th>
                                <th colspan="3">Actions</th>
                                </thead>
                            @endif

                            <tbody>
                            @foreach($campaigns as $campaign)
                                <tr>
                                    <td> {!! $cmpgn_no++ !!} </td>

                                    <td>{!! $campaign->name !!}</td>
                                    <td>{!! $campaign->status !!}</td>
                                    <td>{!! $campaign->type !!}</td>
                                    <td>{!! date_format($campaign->start_date,'Y-d-m')  !!}</td>
                                    <td>{!! date_format($campaign->end_date,'Y-d-m') !!}</td>

                                    <td>{!! $campaign->frmUser->full_name !!}</td>
                                    <td> {{ $campaign->created_at }}</td>
                                    <td>
                                        {!! Form::open(['route' => ['campaigns.destroy', $campaign->id], 'method' => 'delete']) !!}
                                        <div class='btn-group'>
                                            @if($campaign->notifications)
                                                <a href="{!! route('campaigns.show', [$campaign->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-bell text-green"></i></a>
                                            @else
                                                <a href="{!! route('campaigns.show', [$campaign->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                                            @endif
                                            <a href="{!! route('campaigns.edit', [$campaign->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                                            {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure you want to delete $campaign->name?')"]) !!}
                                        </div>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>

        {{-- Start Targets --}}
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"> Targets </h3>
                        <div class="box-tools">
                            @if( Auth::user()->hasRole(['admin']))
                                <div class="box-tools">
                                    <a class="btn btn-block btn-primary btn-sm" href="{!! route('targets.create') !!}">Add New</a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- Body start -->
                    <div class="box-body no-padding">
                        <table class="table table-responsive" id="targets-table">
                            @if($targets->isEmpty())
                                <div class="well text-center">No Targets found assigned to you.</div>
                            @else
                                <thead>
                                <th>#</th>
                                <th>Target Name</th>
                                <th>Account Id</th>
                                <th>Address</th>
                                <th>Contact Office</th>
                                <th>Contact Mobile</th>
                                <th>Contact Fax</th>
                                <th>Assigned To</th>
                                <th colspan="3">Action</th>
                                </thead>
                            @endif

                            <tbody>
                            @foreach($targets as $target)
                                <tr>
                                    <td> {!! $trgt_no++ !!} </td>

                                    <td>{!! $target->salutation.' '.$target->first_name.' '.$target->last_name !!}</td>
                                    <td>{!! $target->company_name !!}</td>
                                    <td>{!! $target->primary_city.' '.$target->primary_state.' '.$target->primary_postal.' '.$target->primary_country !!}</td>
                                    <td>{!! $target->contact_office !!}</td>
                                    <td>{!! $target->contact_mobile !!}</td>
                                    <td>{!! $target->contact_fax !!}</td>
                                    <td>{!! $target->User->full_name !!}</td>

                                    <td>
                                        {!! Form::open(['route' => ['targets.destroy', $target->id], 'method' => 'delete']) !!}
                                        <div class='btn-group'>
                                            @if($target->notifications)
                                                <a href="{!! route('targets.show', [$target->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-bell text-green"></i></a>

                                            @else
                                                <a href="{!! route('targets.show', [$target->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                                            @endif
                                            <a href="{!! route('targets.edit', [$target->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                                            {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                        </div>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
        @endif

        {{-- Start Calls --}}
        @if(Auth::user()->hasRole(['admin','sales','marketing']))
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"> Calls </h3>
                        <div class="box-tools">
                            @if( Auth::user()->hasRole(['admin']))
                                <div class="box-tools">
                                    <a class="btn btn-block btn-primary btn-sm" href="{!! route('calls.create') !!}">Add New</a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- Body start -->
                    <div class="box-body no-padding">
                        <table class="table table-responsive" id="calls-table">
                            @if($calls->isEmpty())
                                <div class="well text-center">No Calls found assigned to you.</div>
                            @else
                                <thead>
                                <th>#</th>
                                <th>Subject</th>
                                <th>Status</th>
                                <th>Status2</th>
                                <th>Date Time</th>
                                <th>Related To</th>
                                <th>Related Results</th>
                                <th>Description</th>
                                <th>Assigned To</th>
                                <th colspan="3">Action</th>
                                </thead>
                            @endif

                            <tbody>
                            @foreach($calls as $call)

                                <tr>
                                    <td> {!! $cll_no++ !!} </td>

                                    <td>{!! $call->subject !!}</td>
                                    <td>{!! $call->status !!}</td>
                                    <td>{!! $call->status2 !!}</td>
                                    <td>{!! $call->date_time !!}</td>
                                    <td>{!! ucwords($call->related_to) !!}</td>

                                    @if($call->related_to == 'accounts')
                                        <td>{!! $call->Account->name !!}</td>
                                    @elseif($call->related_to == 'contacts')
                                        <td>{!! $call->Contact->full_name !!}</td>
                                    @elseif($call->related_to == 'leads')
                                        <td>{!! $call->Lead->first_name.' '.$call->Lead->last_name !!}</td>
                                    @elseif($call->related_to == 'opportunities')
                                        <td>{!! $call->Opportunities->name!!}</td>
                                    @elseif($call->related_to == 'projects')
                                        <td>{!! $call->Project->name!!}</td>
                                    @elseif($call->related_to == 'targets')
                                        <td>{!! $call->Target->salutation.'. '.$call->Target->first_name.' '.$call->Target->last_name !!}</td>
                                    @elseif($call->related_to == 'tasks')
                                        <td>{!! $call->Task->subject !!}</td>
                                    @endif

                                    <td>{!! $call->description !!}</td>
                                    <td>{!! $call->User->full_name !!}</td>
                                    <td>
                                        {!! Form::open(['route' => ['calls.destroy', $call->id], 'method' => 'delete']) !!}
                                        <div class='btn-group'>
                                            @if($call->notifications)
                                                <a href="{!! route('calls.show', [$call->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-bell text-green"></i></a>
                                            @else
                                                <a href="{!! route('calls.show', [$call->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                                            @endif
                                                <a href="{!! route('calls.edit', [$call->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                                            {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                        </div>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
        @endif

        {{-- Start Meetings --}}
        @if(Auth::user()->hasRole(['admin','sales','marketing']))
            <div class="row">
                <div class="col-md-12 col-md-offset-0">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title"> Meetings </h3>
                            <div class="box-tools">
                                @if( Auth::user()->hasRole(['admin']))
                                    <div class="box-tools">
                                        <a class="btn btn-block btn-primary btn-sm" href="{!! route('meetings.create') !!}">Add New</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- Body start -->
                        <div class="box-body no-padding">
                            <table class="table table-responsive" id="calls-table">
                                @if($calls->isEmpty())
                                    <div class="well text-center">No Meetings found assigned to you.</div>
                                @else
                                    <thead>
                                    <th>#</th>
                                    <th>Subject</th>
                                    <th>Status</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Related To</th>
                                    <th>Related Result</th>
                                    <th>Location</th>
                                    <th>Assigned To</th>
                                    <th colspan="3">Action</th>
                                    </thead>
                                @endif

                                <tbody>
                                @foreach($meetings as $meeting)
                                    <tr>
                                        <td> {!! $mtng_no++ !!} </td>
                                        <td>{!! $meeting->subject !!}</td>
                                        <td>{!! $meeting->status !!}</td>
                                        <td>{!! date('m/d/Y h:i A',strtotime($meeting->start_date)) !!}</td>
                                        <td>{!! date('m/d/Y h:i A',strtotime($meeting->end_date)) !!}</td>
                                        <td>{!! ucwords(substr($meeting->related_to,0,-1)) !!}</td>
                                        <td>{!! $meeting->related_result !!}</td>

                                        {{--
                                        @if($meeting->related_to == 'accounts')
                                            <td>{!! $meeting->Account->name !!}</td>
                                        @elseif($meeting->related_to == 'contacts')
                                            <td>{!! $meeting->Contact->full_name !!}</td>
                                        @elseif($meeting->related_to == 'leads')
                                            <td>{!! $meeting->Lead->first_name.' '.$meeting->Lead->last_name !!}</td>
                                        @elseif($meeting->related_to == 'opportunities')
                                            <td>{!! $meeting->Opportunities->name!!}</td>
                                        @elseif($meeting->related_to == 'projects')
                                            <td>{!! $meeting->Project->name!!}</td>
                                        @elseif($meeting->related_to == 'targets')
                                            <td>{!! $meeting->Target->salutation.'. '.$meeting->Target->first_name.' '.$meeting->Target->last_name !!}</td>
                                        @elseif($meeting->related_to == 'tasks')
                                            <td>{!! $meeting->Task->subject !!}</td>
                                        @endif
                                        --}}

                                        <td>{!! $meeting->location !!}</td>
                                        <td>{!! $meeting->User->full_name !!}</td>
                                        <td>
                                            {!! Form::open(['route' => ['meetings.destroy', $meeting->id], 'method' => 'delete']) !!}
                                            <div class='btn-group'>
                                                @if($meeting->notifications)
                                                    <a href="{!! route('meetings.show', [$meeting->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-bell text-green"></i></a>
                                                @else
                                                    <a href="{!! route('meetings.show', [$meeting->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                                                @endif

                                                <a href="{!! route('meetings.edit', [$meeting->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                                                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                            </div>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        @endif

        {{-- Start Tasks --}}
        @if(Auth::user()->hasRole(['admin','sales','marketing']))
            <div class="row">
                <div class="col-md-12 col-md-offset-0">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title"> Tasks </h3>
                            <div class="box-tools">
                                @if( Auth::user()->hasRole(['admin']))
                                    <div class="box-tools">
                                        <a class="btn btn-block btn-primary btn-sm" href="{!! route('tasks.create') !!}">Add New</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- Body start -->
                        <div class="box-body no-padding">
                            <table class="table table-responsive" id="tasks-table">
                                @if($calls->isEmpty())
                                    <div class="well text-center">No Tasks found assigned to you.</div>
                                @else
                                    <thead>
                                    <th>#</th>
                                    <th>Subject</th>
                                    <th>Status</th>
                                    <th>Start Date</th>
                                    <th>Due Date</th>
                                    <th>Related To</th>
                                    <th>Related Result</th>
                                    <th>Contact Name</th>
                                    <th>Priority</th>
                                    <th>Assigned To</th>
                                    <th colspan="3">Action</th>
                                    </thead>
                                @endif

                                <tbody>
                                @foreach($tasks as $task)
                                    <tr>
                                        <td>{!! $tsk_no++ !!}</td>
                                        <td>{!! $task->subject !!}</td>
                                        <td>{!! $task->status !!}</td>
                                        <td>{!! $task->start_date !!}</td>
                                        <td>{!! $task->due_date !!}</td>
                                        <td>{!! ucwords(substr($task->related_to,0,-1)) !!}</td>
                                        <td>{!! $task->related_result !!}</td>

                                        {{--
                                        @if($task->related_to == 'accounts')
                                            <td>Account</td>
                                            <td>{!! $task->Account->name !!}</td>
                                        @elseif($task->related_to == 'contacts')
                                            <td>Contact</td>
                                            <td>{!! $task->Contact->full_name !!}</td>
                                        @elseif($task->related_to == 'leads')
                                            <td>Lead</td>
                                            <td>{!! $task->Lead->salutation.'. '.$task->Lead->first_name.' '.$task->Lead->last_name !!}</td>
                                        @elseif($task->related_to == 'opportunities')
                                            <td>Opportunity</td>
                                            <td>{!! $task->Opportunities->name !!}</td>
                                        @elseif($task->related_to == 'projects')
                                            <td>Project</td>
                                            <td>{!! $task->Project->name !!}</td>
                                        @elseif($task->related_to == 'targets')
                                            <td>Target</td>
                                            <td>{!! $task->Target->salutation.'. '.$task->Target->first_name.' '.$task->Target->last_name !!}</td>
                                        @elseif($task->related_to == 'tasks')
                                            <td>Task</td>
                                            <td>{!! $task->subject !!}</td>
                                        @endif--}}

                                        <td>{!! $task->Contact['full_name'] !!}</td>
                                        <td>{!! $task->priority !!}</td>
                                        <td>{!! $task->User->full_name !!}</td>
                                        <td>
                                            {!! Form::open(['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
                                            <div class='btn-group'>
                                                @if($task->notifications)
                                                <a href="{!! route('tasks.show', [$task->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-bell text-green"></i></a>
                                                @else
                                                    <a href="{!! route('tasks.show', [$task->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                                                @endif
                                                <a href="{!! route('tasks.edit', [$task->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                                                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                            </div>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        @endif

        {{-- Start Tasks --}}
        @if(Auth::user()->hasRole(['admin','sales','marketing']))
            <div class="row">
                <div class="col-md-12 col-md-offset-0">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title"> Projects </h3>
                            <div class="box-tools">
                                @if( Auth::user()->hasRole(['admin']))
                                    <div class="box-tools">
                                        <a class="btn btn-block btn-primary btn-sm" href="{!! route('projects.create') !!}">Add New</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- Body start -->
                        <div class="box-body no-padding">
                            <table class="table table-responsive" id="projects-table">
                                @if($calls->isEmpty())
                                    <div class="well text-center">No Projects found assigned to you.</div>
                                @else
                                    <thead>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Priority</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Project Manager</th>
                                    <th colspan="3">Action</th>
                                    </thead>
                                @endif

                                <tbody>
                                @foreach($projects as $project)
                                    <tr>
                                        <td> {!! $prjcts_no++ !!} </td>
                                        <td>{!! $project->name !!}</td>
                                        <td>{!! $project->status !!}</td>
                                        <td>{!! $project->priority !!}</td>
                                        <td>{!! date('m/d/Y',strtotime($project->start_date)) !!}</td>
                                        <td>{!! date('m/d/Y',strtotime($project->end_date)) !!}</td>
                                        <td>{!! $project->User->full_name !!}</td>
                                        <td>
                                            {!! Form::open(['route' => ['projects.destroy', $project->id], 'method' => 'delete']) !!}
                                            <div class='btn-group'>
                                                @if($project->notifications)
                                                    <a href="{!! route('projects.show', [$project->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-bell text-green"></i></a>
                                                @else
                                                    <a href="{!! route('projects.show', [$project->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                                                @endif

                                                <a href="{!! route('projects.edit', [$project->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                                                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                            </div>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        @endif

    </div>

@endsection