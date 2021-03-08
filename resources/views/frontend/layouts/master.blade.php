<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
  

    @include('frontend.partials.headerLink')
    <link rel="icon" href="https://www.du.ac.bd/assets/img/favicon.png" type="image/x-icon">
    <title>University of Dhaka || the highest echelon of academic excellence || Services|| @yield('title')</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script> 
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>

  
  <body>
    <div class="wrapper">
    <!-- {{-- Navigation --}} -->
      @include('sweetalert::alert')

        @include('frontend.partials.nav')

        <!-- end navbar -->

        <!-- sidebar+mainContent -->

        @yield('content')
        <!--End sdiebar content -->

        <!--fooer -->
        @include('frontend.partials.footer')
        <!-- end of footer -->
   
    </div>
  
<!-- all js script -->
  @include('frontend.partials.scripts')

   
  </body>
</html>