<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script> --}}
    <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

        @include('nav')

        <main class="py-4">
            <div class="container">
                {{-- @if (session()->has('message'))
                <div class="alert alert-success" role="alert">
                    <strong>Success</strong> {{session()->get('message')}}
                </div>
                @endif --}}

                {{-- @if ($alertFm = Session::get('success'))
                <script type="text/javascript">
                    swal({
                        title:'Its a big success.',
                        text:"{{Session::get('success')}}",
                        timer:4000,
                        type:'success'
                    }).then((value) => {
                    }).catch(swal.noop);
                </script>
                @endif --}}

                @yield('content')
            </div>
        </main>
    </div>
    @stack('child-scripts')
</body>
</html>
