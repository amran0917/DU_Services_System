<!DOCTYPE html>
<html lang="en">
    <head>
       
         @include('admin.partials.header')


    </head>

    <body>
        @include('admin.partials.nav')
       
         <div style="margin-top: 50px"> @yield('contents')</div>
        @include('admin.partials.footer')
        @include('admin.partials.script')

    </body>
</html>