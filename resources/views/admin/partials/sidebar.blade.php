
<div class="sidebar" id="side">
    <ul class="widget widget-menu unstyled">

        <li><a href="{{route('student.list')}}"><i class="menu-icon icon-inbox"></i>Inbox 
              </a></li>  {{-- <b class="label green pull-right">     11</b>  {{route('student.index')}} --}}

        <li><a href="{{route('student.list')}}"><i class="menu-icon icon-user"></i>Testimonial Applicant List
             {{-- <b class="label orange pull-right"> 19</b> --}}
            </a></li>
        <li><a href="{{route('applicant.list')}}"><i class="menu-icon icon-bullhorn"></i>Certificate Applicant List </a></li>

        <li><a class="collapsed" data-toggle="collapse" href="#togglePage"><i class="menu-icon icon-book">
        </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
        </i>Departments </a>
            <ul id="togglePage" class="collapse unstyled">
                <li><a href="{{route('dept.list')}}"><i class="icon-inbox"></i>Department List </a></li>
                <li><a href="{{route('dept.create')}}"><i class="icon-inbox"></i>Add Department</a></li>

            </ul>
        </li>
    
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

           
    

            <li><a class="collapsed" data-toggle="collapse" href="#dirPage"><i class="menu-icon icon-paste">
            </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
            </i>Directors </a>
                <ul id="dirPage" class="collapse unstyled">
                    <li><a href="{{route('director.list')}}"><i class="icon-inbox"></i>Director List </a></li>
                    <li><a href="{{route('director.create')}}"><i class="icon-inbox"></i>Add Director</a></li>

                </ul>
            </li>
    
       

            <li><a class="collapsed" data-toggle="collapse" href="#lang"><i class="menu-icon icon-table">
            </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
            </i>Languages </a>
                <ul id="lang" class="collapse unstyled">
                    <li><a href="{{route('language.list')}}"><i class="icon-inbox"></i>Language List </a></li>
                    <li><a href="{{route('language.create')}}"><i class="icon-inbox"></i>Add Language</a></li>

                </ul>
            </li>

           

    </ul>
    <!--/.widget-nav-->
    <ul class="widget widget-menu unstyled">
        <li><a href="{{route('admin.logout')}}"><i class="menu-icon icon-signout"></i>Sign out</a></li>

        <li><a href="{{route('admin.logIn')}}"><i class="menu-icon icon-signin"></i>Sign in </a></li>

        {{-- <li><a class="collapsed" data-toggle="collapse" href="#x"><i class="menu-icon icon-cog">
        </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
        </i>More Pages </a>
            <ul id="x" class="collapse unstyled">
                <li><a href="other-login.html"><i class="icon-inbox"></i>Login </a></li>
                <li><a href="other-user-profile.html"><i class="icon-inbox"></i>Profile </a></li>
                <li><a href="other-user-listing.html"><i class="icon-inbox"></i>All Users </a></li>
            </ul>
        </li> --}}
    </ul>

    </ul>
</div>

