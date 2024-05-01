
<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">

<head>
    @include('components.app.error-head')
    <link href="{{ mix('/assets/css/web.css') }}" media="all" rel="stylesheet" as="style">
    @include('components.app.amp')
    @include('components.app.meta')

    @yield('schema_org')

</head>

@php
    if (Auth::guard('web')->user()) {
        if (strpos(URL::current(), '/admin') !== false) {
            $guard = 'admin admin-logined';
        } else {
            $guard = 'web admin-logined';
        }
    } else {
        switch (URL::current()) {
            case(strpos(URL::current(), '/login') !== false) :
                $guard = 'login';
                break;
            case(strpos(URL::current(), '/register') !== false) :
                $guard = 'login register';
                break;
            default :
                $guard = '';
        }
    }
    switch (URL::current()) {
        case(route('home')) :
            $page_name = 'home';
            break;
        case(strpos(URL::current(), 'forum') !== false) :
            $page_name = 'forum';
            break;
        default :
            $page_name = 'page';
    }
    $class_body = $guard . ' ' . $page_name;
@endphp
<body class="{{ $class_body  }} {{-- $theme --}}">

    <header>
        @include('components.app.navmain')
        @include('components.app.navbar')
        @include('components.app.navtab')
        @include('components.app.navadmin')
    </header>

    <main>
        {{-- @can('admin_panel') --}}
        {{-- @include('errors.messages') --}}
        {{-- @endcan --}}
        <div style="padding-top:10rem;">
                @if(str_contains(URL::current(), '/create') !== false)
                    <div class="content wrapped form-content create">
                @elseif(str_contains(URL::current(), '/edit') !== false)
                    <div class="content wrapped form-content edit">
                @else
                    <div class="content wrapped no-form">
                @endif
                @yield('menubar')
                @can('admin_panel')
                    @include('admin.inc.side.bar')
                @endcan
                @yield('breadcrumb')
                @yield('content')
                @stack('css')
                @stack('popup')
            </div>
        </div>
    </main>

    <footer>
        @include('components.app.footbar')
        <div class="data_href" data-href="{{ URL::current() }}" curr-page="{{ $class_body }}" data-home="{{ route('home') }}" csrf-token="{{ csrf_token() }}"></div>
        @include('components.app.scripts')
    </footer>

    @include('components.app.tokens')
</body>
</html>
