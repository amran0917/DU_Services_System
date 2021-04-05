<nav onload="load({{ isset($name)?$name:'Services'}});" class="navbar navbar-inverse navbar-light bg-light navbar-expand-lg" >
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
                        <a class="nav-link" href="{{route('status')}}" style="color:white; font-size:1.5vw;">Application_Status <span class="sr-only">(current)</span></a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="{{route('about')}}" style="color:white; font-size:1.5vw;">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contact')}}" style="color:white; font-size:1.5vw;">Contact</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white; font-size:1.5vw;">
                         <span id="selected">Services </span> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                             <li> <a class="dropdown-item"  id="testimonial"  href="{{route('t_home')}}">Testimonial</a> </li>
                            <div class="dropdown-divider"></div>
                           <li>  <a class="dropdown-item" href="{{route('l_home')}}" id="course">Course Certificate</a></li>
                        </ul>
                    </li>
                 
                </ul>

        </div>
    </div>
</nav>

<script type="text/javascript">
    $(document).ready (function () {
        jQuery.each ($("[onload]"), function (index, item) {
            $(item).prop ("onload").call (item);
            return false;
        });
    });

    $(document).ready(function(){
                $("#course").click(function(){
                    $("#selected").text($(this).text());
                });
                $("#testimonial").click(function(){
                    $("#selected").text($(this).text());
                });
                
      
    });

    function load(name)
    {
       // alert("i am called");
        console.log("data2"+name);
        var str=""+name;
        if(str.includes("testimonial")){
            $("#selected").text("Testimonial");
            console.log("data2"+name);
        }
       else if(str.includes("language")){
        $("#selected").text("Course Certificate");
        console.log("data3"+name);
       }
       else if(str.includes("service")){
        $("#selected").text("Services");
        console.log("data3"+name);
       }

       else if(str.includes("About")){
        $("#selected").text("About");
        
       }

       else if(str.includes("Contact")){
        $("#selected").text("Contact");
        alert("data3"+name);
       }
       else if(str.includes("Application_Status")){
        $("#selected").text("Application_Status");
        alert("data3"+name);
       }
    }
                    
               
</script>