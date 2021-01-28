<nav class="navbar navbar-inverse navbar-light bg-light navbar-expand-lg" >
    <div class="container">
        
        <div class="navbar-header">
            <a class="navbar-brand" href="{{route('home')}}" style="max-width: 80%;height:60px;">
                    <img src="{{asset('images/du-logo.png')}}" class="img-fluid">
            </a>
            <!-- <a class="navbar-brand" href="{{route('home')}}">Testimonial</a> -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
            </button>
        
        </div>
      

        <div class="collapse navbar-collapse " id="navbarSupportedContent">
                 <ul class=" navbar-nav  ml-auto ">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('home')}}" style="color:white; font-size:1.5vw;">Home <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('student.search_status')}}" style="color:white; font-size:1.5vw;">Application_Status <span class="sr-only">(current)</span></a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="{{route('about')}}" style="color:white; font-size:1.5vw;">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contact')}}" style="color:white; font-size:1.5vw;">Contact</a>
                    </li>

                       <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white; font-size:1.5vw;">
                        Services
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('t_home')}}" >Testimonial</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('l_home')}}">Language Certificate</a>
                        </div>
                    </li>
                 
                </ul>

                        {{-- <form class="form-inline my-2 my-lg-0" action="{{route('search')}}" method="GET">
                        

                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Recipients username" name = "search" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fa fa-search"></i></button>
                                </div>
                            </div>

                        </form> --}}
                </div>
            </div>
</nav>