<!DOCTYPE html>
<html>
<head>
        <!-- Title with PUP logo -->
        <link rel="icon" href="{{ asset('img/pup.png') }}" />
        <title>PUPQC | Faculty Records and Monitoring System</title>

    @yield('head')

    {{-- CSS DEPENDENCIES --}}
    @include('layouts.Dependencies.CSS_dependencies')

    {{-- HEAD JS DEPENDENCIES --}}
    @include('layouts.Dependencies.HEAD_JS_dependencies')

</head>

<body class="hold-transition sidebar-mini layout-fixed">
{{-- TOP NAVBAR --}}
        @include('NavigationBar.AcadHead_Navbars.Top_NavBar')

{{-- LEFT NAVBAR --}}
        @include('NavigationBar.AcadHead_Navbars.Left_NavBar')
        
    @yield('content')

{{-- BODY JS DEPENDENCIES --}}
    @include('layouts.Dependencies.BODY_JS_dependencies')

</body>
</html>