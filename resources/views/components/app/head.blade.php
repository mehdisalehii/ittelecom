<meta charset="UTF-8">
<title>@yield('title')@yield('titlePage')@yield('titleAdmin')@yield('titleWebname')</title>
<base href="{{route('home')}}">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" type="image/svg+xml" href="{{ url('/favicon.svg') }}" />
<link rel="canonical" href="{{URL::current()}}"/>