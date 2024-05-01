<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/svg+xml" href="{{ url('/favicon.svg') }}" />
{{--    @include('admin.inc.styles')--}}
    @yield('styles')
</head>
<body>
    <div class="error-area ptb--100">
        <div class="container">
            <div class="card error-content">
               @yield('error-content')
            </div>
        </div>
    </div>
{{--    @include('admin.inc.scripts')--}}
    @yield('scripts')
</body>
</html>