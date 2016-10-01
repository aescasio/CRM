<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{{ url('/home') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">CRM</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>EK</b> - CRM</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                {{--<!-- Notifications: style can be found in dropdown.less -->--}}
                {{--<li class="dropdown messages-menu">--}}
                    {{--<!-- Menu toggle button -->--}}
                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                        {{--<i class="fa fa-envelope-o"></i>--}}
                        {{--<span class="label label-success">4</span>--}}
                    {{--</a>--}}
                    {{--<ul class="dropdown-menu">--}}
                        {{--<li class="header">You have 4 messages</li>--}}
                        {{--<li>--}}
                            {{--<!-- inner menu: contains the messages -->--}}
                            {{--<ul class="menu">--}}
                                {{--<li><!-- start message -->--}}
                                    {{--<a href="#">--}}
                                        {{--<div class="pull-left">--}}
                                            {{--<!-- User Image -->--}}
                                            {{--<img src="/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>--}}
                                        {{--</div>--}}
                                        {{--<!-- Message title and timestamp -->--}}
                                        {{--<h4>--}}
                                            {{--Support Team--}}
                                            {{--<small><i class="fa fa-clock-o"></i> 5 mins</small>--}}
                                        {{--</h4>--}}
                                        {{--<!-- The message -->--}}
                                        {{--<p>Why not buy a new awesome theme?</p>--}}
                                    {{--</a>--}}
                                {{--</li><!-- end message -->--}}
                            {{--</ul><!-- /.menu -->--}}
                        {{--</li>--}}
                        {{--<li class="footer"><a href="#">See All Messages</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<!-- /.messages-menu -->--}}

                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">{{ $notifications }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have {{ $notifications }} notifications</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                @foreach($accounts as $account)
                                <li>
                                    <a href="{!! route('accounts.show', [$account->id]) !!}">
                                        <i class="fa fa-user-secret text-aqua"></i>(Account) {!! $account->name !!}
                                    </a>
                                </li>
                                @endforeach

                                @foreach($contacts as $contact)
                                <li>
                                    <a href="{!! route('contacts.show', [$contact->id]) !!}">
                                        <i class="fa fa-list-alt text-red"></i>(Contact) {!! $contact->full_name !!}
                                    </a>
                                </li>
                                @endforeach

                                @foreach($opportunities as $opportunity)
                                <li>
                                    <a href="{!! route('opportunities.show', [$opportunity->id]) !!}">
                                        <i class="fa fa-shopping-cart text-red"></i>(Opportunity) {!! $opportunity->name !!}
                                    </a>
                                </li>
                                @endforeach

                                @foreach($leads as $lead)
                                <li>
                                    <a href="{!! route('leads.show', [$lead->id]) !!}">
                                        <i class="fa fa-shopping-cart text-green"></i>(Lead) {!! $lead->first_name.' '.$lead->last_name !!}
                                    </a>
                                </li>
                                @endforeach

                                @foreach($campaigns as $campaign)
                                <li>
                                    <a href="{!! route('campaigns.show',[$campaign->id]) !!}">
                                        <i class="fa  fa-heart text-red"></i>(Campaign) {!! $campaign->name !!}
                                    </a>
                                </li>
                                @endforeach

                                @foreach($targets as $target)
                                    <li>
                                        <a href="{!! route('targets.show',[$target->id]) !!}">
                                            <i class="fa fa-arrow-right text-orange"></i>(Target) {!! $target->first_name.' '.$target->last_name !!}
                                        </a>
                                    </li>
                                @endforeach

                                @foreach($calls as $call)
                                    <li>
                                        <a href="{!! route('calls.show',[$call->id]) !!}">
                                            <i class="fa  fa-phone text-olive"></i>(Call) {!! $call->subject !!}
                                        </a>
                                    </li>
                                @endforeach

                                    @foreach($meetings as $meeting)
                                        <li>
                                            <a href="{!! route('meetings.show',[$meeting->id]) !!}">
                                                <i class="fa fa-user text-light-blue"></i>(Meeting) {!! $meeting->subject !!}
                                            </a>
                                        </li>
                                    @endforeach

                                    @foreach($tasks as $task)
                                        <li>
                                            <a href="{!! route('tasks.show',[$task->id]) !!}">
                                                <i class="fa fa-tasks text-purple"></i>(Task) {!! $task->subject !!}
                                            </a>
                                        </li>
                                    @endforeach

                                    @foreach($projects as $project)
                                        <li>
                                            <a href="{!! route('projects.show',[$project->id]) !!}">
                                                <i class="fa fa-flask text-fuchsia"></i>(Project) {!! $project->name !!}
                                            </a>
                                        </li>
                                    @endforeach
                            </ul>
                        </li>
                        <li class="footer"><a href="{{ url('home') }}">View all</a></li>
                    </ul>
                </li>

                @if( Auth::guest()  )
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                        <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        {{--<img src="/img/user2-160x160.jpg" class="user-image" alt="User Image"/>--}}
                        @if(isset(Auth::user()->photo))
                            <img src="{{asset('/img/profile_picture/'.Auth::user()->id.'/'.Auth::user()->photo)}}" class="img-circle user-image" alt="User Image"/>
                        @else
                            <img src="{{asset('/img/png/user_default.png')}}" class="img-circle user-image" alt="User Image"/>
                        @endif
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">{{ Auth::user()->nick_name }}</span>

                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li classass="user-header">
                            @if(isset(Auth::user()->photo))
                                <div class="col-xs-12 text-center"><img src="{{asset('/img/profile_picture/'.Auth::user()->id.'/'.Auth::user()->photo)}}" class="img-circle" alt="User Image" width="160px" height="160px"/></div>
                            @else
                                <div class="col-xs-12 text-center"><img src="{{asset('/img/png/user_default.png')}}" class="img-circle" alt="User Image" width="160px" height="160px" /></div>
                            @endif
                        </li>
                        <li>
                            <div class="col-xs-12 text-center">{{ Auth::user()->nick_name  }}</div>
                        </li>
                        <li>
                            <div class="col-xs-12 text-center">
                                <small>Member since:</small>
                            </div>
                        </li>
                        <li>
                            <div class="col-xs-12 text-center">
                                <small>{{ Auth::user()->created_at  != null ? date_format(Auth::user()->created_at,'m-d-Y') : 'NA'  }}</small>
                            </div>
                        </li>
                        <!-- Menu Body -->
                        <!--
                        <li class="user-body">
                            <div class="col-xs-4 text-center">
                                <a href="#">Followers</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Sales</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Friends</a>
                            </div>
                        </li>
                       -->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{!! route('profiles.show', Auth::user()->id) !!}" class="btn btn-block btn-primary btn-sm">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('/logout') }}" class="btn btn-block btn-info btn-sm">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
                @endif
                        <!-- Control Sidebar Toggle Button -->

                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>

            </ul>
        </div>
    </nav>
</header>