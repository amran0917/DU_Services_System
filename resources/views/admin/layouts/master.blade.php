<!DOCTYPE html>
<html lang="en">
    <head>
       
         @include('admin.partials.header')


    </head>

    <body>
        @include('admin.partials.nav')

        @yield('contents')
        @include('admin.partials.footer')
        @include('admin.partials.script')

    </body>
</html>