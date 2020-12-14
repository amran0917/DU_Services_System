<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
  

    @include('frontend.partials.headerLink')
    <title>Online Testimonial </title>

  </head>

  
  <body>
    <div class="wrapper">
    <!-- {{-- Navigation --}} -->
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