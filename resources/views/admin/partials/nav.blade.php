<div class="navbar navbar-fixed-top">
    {{-- /navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row --}}
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                <i class="icon-reorder shaded"></i></a><a class="brand" href="#">Admin </a>
            <div class="nav-collapse collapse navbar-inverse-collapse">
                <ul class="nav nav-icons">
                    {{-- <li class="active"><a href="#"><i class="icon-envelope"></i></a></li>
                    <li><a href="#"><i class="icon-eye-open"></i></a></li>
                    adminPanel/code/index.html
                    <li><a href="#"><i class="icon-bar-chart"></i></a></li> --}}
                </ul>
                <form class="navbar-search pull-left input-append" action="{{route('search')}}" method="GET">
                <input type="text" class="span3" name="search" placeholder="search applicant or dept">
                <button class="btn" type="submit">
                    <i class="icon-search"></i>
                </button>
                </form>
                <ul class="nav pull-right">
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown
                        <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Item No. 1</a></li>
                            <li><a href="#">Don't Click</a></li>
                            <li class="divider"></li>
                            <li class="nav-header">Example Header</li>
                            <li><a href="#">A Separated link</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Support </a></li>
                    <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{asset('adminPanel/code/images/user.png')}}" class="nav-avatar" />
                        <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('admin.logIn')}}"
                                class="nav-link" > Log In</a></li>
                            
                            <li class="divider"></li>
                            <li><a href="{{route('admin.logout')}}">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.nav-collapse -->
        </div>
    </div>
    <!-- /navbar-inner -->
</div>
<!-- /navbar -->