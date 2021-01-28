
<div class="sidebar" id="side">
    <ul class="widget widget-menu unstyled">
        <li class="active"><a href="{{url('/admin')}}"><i class="menu-icon icon-dashboard"></i>Dashboard
        </a></li>
        <li><a href="activity.html"><i class="menu-icon icon-bullhorn"></i>News Feed </a>
        </li>
        <li><a href="{{route('student.index')}}"><i class="menu-icon icon-inbox"></i>Inbox <b class="label green pull-right">
            11</b> </a></li>
        <li><a href="{{route('student.list')}}"><i class="menu-icon icon-user"></i>Student List <b class="label orange pull-right">
            19</b> </a></li>
    </ul>
    <!--/.widget-nav-->
    
    
    <ul class="widget widget-menu unstyled">
        @if(Session::has('type')) 
            @if (Session::get('type')=='super-admin' )
                <li><a class="collapsed" data-toggle="collapse" href="#togglePages"><i class="menu-icon icon-user">
                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                </i>Manage Admin</a>
                    <ul id="togglePages" class="collapse unstyled">
                        <li><a href="{{route('admin.list')}}"><i class="icon-inbox"></i>Admin List </a></li>
                        <li><a href="{{route('admin.create')}}"><i class="icon-inbox"></i>Add Admin </a></li>
        
                    </ul>
                </li> 
            @endif
        @endif

        <ul class="widget widget-menu unstyled">
            <li><a class="collapsed" data-toggle="collapse" href="#togglePage"><i class="menu-icon icon-book">
            </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
            </i>Departments </a>
                <ul id="togglePage" class="collapse unstyled">
                    <li><a href="{{route('dept.list')}}"><i class="icon-inbox"></i>Department List </a></li>
                    <li><a href="{{route('dept.create')}}"><i class="icon-inbox"></i>Add Department</a></li>

                </ul>
            </li>
    
        </ul>

        <li><a href="form.html"><i class="menu-icon icon-paste"></i>Forms </a></li>
        <li><a href="table.html"><i class="menu-icon icon-table"></i>Tables </a></li>
        <li><a href="charts.html"><i class="menu-icon icon-bar-chart"></i>Charts </a></li>
    </ul>
    <!--/.widget-nav-->
    <ul class="widget widget-menu unstyled">
        <li><a class="collapsed" data-toggle="collapse" href="#togglePage"><i class="menu-icon icon-cog">
        </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
        </i>More Pages </a>
            <ul id="togglePage" class="collapse unstyled">
                <li><a href="other-login.html"><i class="icon-inbox"></i>Login </a></li>
                <li><a href="other-user-profile.html"><i class="icon-inbox"></i>Profile </a></li>
                <li><a href="other-user-listing.html"><i class="icon-inbox"></i>All Users </a></li>
            </ul>
        </li>
        <li><a href="{{route('admin.logout')}}"><i class="menu-icon icon-signout"></i>Logout</a></li>

    </ul>
</div>

