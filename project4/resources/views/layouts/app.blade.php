<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <!-- Include Toastr CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
 
        <script>
            @if(Session::has('success'))
                toastr.success("{{ Session::get('success') }}");
            @endif
            
            @if(Session::has('warning'))
                toastr.warning("{{ Session::get('warning') }}");
            @endif
            
            @if(Session::has('error'))
                toastr.error("{{ Session::get('error') }}");
            @endif
        </script>



    </body>
</html>