<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    @if(isset(Auth::user()->photo))
                        <img src="{{asset('/img/profile_picture/'.Auth::user()->id.'/'.Auth::user()->photo)}}" class="img-circle user-image" alt="User Image"/>
                    @else

                        <img src="{{asset('/img/png/user_default.png')}}" class="img-circle user-image" alt="User Image"/>
                    @endif
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->nick_name  }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>

            <!-- search form (Optional) -->
            <!--
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search..."/>
                  <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                  </span>
                </div>
            </form>
            -->
            <!-- /.search form -->

            <!-- Sidebar Menu -->
            <ul class="sidebar-menu">
                {{--<li class="header">EK-CRM</li>--}}
                        <!-- Optionally, you can add icons to the links -->

                <li class="active"><a href="{{ url('home') }}"><i class='fa fa-link'></i> <span>Home</span></a></li>
                {{-- Has role of admin or sales --}}
                @if( Auth::user()->hasRole(['admin','sales']))
                    <li class="treeview">
                        <a href="#"><i class='fa fa-link'></i> <span>Sales</span> <i
                                    class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('accounts') }}">Accounts</a></li>
                            <li><a href="{{ url('contacts') }}">Contacts</a></li>
                            <li><a href="{{ url('opportunities') }}">Oppotunities</a></li>
                            <li><a href="{{ url('leads') }}">Leads</a></li>
                        </ul>
                    </li>
                @endif
                {{-- Has role of admin or marketing --}}
                @if( Auth::user()->hasRole(['admin','marketing']))
                    <li class="treeview">
                        <a href="#"><i class='fa fa-link'></i> <span>Marketing</span> <i
                                    class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('accounts') }}">Accounts</a></li>
                            <li><a href="{{ url('contacts') }}">Contacts</a></li>
                            <li><a href="{{ url('leads') }}">Leads</a></li>
                            <li><a href="{{ url('campaigns') }}">Campaigns</a></li>
                            <li><a href="{{ url('targets') }}">Targets</a></li>
                            <li><a href="{{ url('opportunities') }}">Oppotunities</a></li>
                        </ul>
                    </li>
                @endif
                {{-- Has role of admin and associate --}}
                @if( Auth::user()->hasRole(['admin', 'sales', 'marketing' , 'associate']))
                    <li class="treeview">
                        <a href="#"><i class='fa fa-link'></i> <span>Activities</span> <i
                                    class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('calendars') }}">Calendar</a></li>
                            <li><a href="{{ url('calls') }}">Calls</a></li>
                            <li><a href="{{ url('meetings') }}">Meetings</a></li>
                            {{--<li><a href="{{ url('emails') }}">Emails</a></li>--}}
                            <li><a href="{{ url('tasks') }}">Tasks</a></li>
                            <li><a href="{{ url('projects') }}">Projects</a></li>
                            {{--<li><a href="{{ url('notes') }}">Notes</a></li>--}}

                        </ul>
                    </li>
                @endif

                @if( Auth::user()->hasRole('admin') )
                    <li class="treeview">
                        <a href="#"><i class='fa fa-link'></i> <span>Administration</span> <i
                                    class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('manageUsers') }}">Manage Users</a></li>
                            <li><a href="{{ url('manageRoles') }}">Roles</a></li>
                            <li><a href="{{ url('managePermissions') }}">Permissions</a></li>
                            <li><a href="{{ url('uc') }}">Purge Records</a></li>
                        </ul>
                    </li>
                @endif
                <li class="treeview">
                    <a href="#"><i class='fa fa-link'></i> <span>Help</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="#">About</a></li>
                        <li><a href="#">Help</a></li>
                    </ul>
                </li>
            </ul>
            <!-- /.sidebar-menu -->
        @endif
    </section>
    <!-- /.sidebar -->
</aside>