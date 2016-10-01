<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
        @endif

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
            <li class="header">EK-CRM</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-link'></i> <span>Home</span></a></li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Sales</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('accounts') }}">Accounts</a></li>
                    <ul>
                        <li><a href="{{ url('industry') }}">Industry</a></li>
                        <li><a href="{{ url('clientTypes') }}">Client Type</a></li>
                    </ul>
                    <li><a href="#">Contacts</a></li>
                    <li><a href="#">Oppotunities</a></li>
                    <li><a href="#">Leads</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Marketing</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('accounts') }}">Accounts</a></li>
                    <ul>
                        <li><a href="{{ url('industry') }}">Industry</a></li>
                        <li><a href="/{{ url('clientTypes') }}">Client Type</a></li>
                    </ul>
                    <li><a href="#">Contacts</a></li>
                    <li><a href="#">Leads</a></li>
                    <li><a href="#">Campaigns</a></li>
                    <li><a href="#">Targets</a></li>
                    <li><a href="#">Target List</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Administration</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">Employees</a></li>
                    <ul>
                        <li><a href="{{ url('departments') }}">Department</a></li>
                        <li><a href="{{ url('iMTypes') }}">IM Type</a></li>
                    </ul>
                    <li><a href="#">Purge</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Help</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">About</a></li>
                    <li><a href="#">Help</a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
