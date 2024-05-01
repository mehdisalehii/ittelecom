{{--@if(strpos( 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' , 'noindex') !== false )--}}
{{--<meta name="robots" content="noindex,nofollow"/>--}}
{{--@else--}}
<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1"/>
{{--@endif--}}
<meta name="theme-color" content="#e62067"/>
<meta name="keyword" content="">
<meta name="description" content="@hasSection('web_description')@yield('web_description')@else{{'مرجع نقد و بررسی و فروش محصولات شبکه ، دوربین مدار بسته و فیبرنوری'}}@endif">
<meta itemprop="name" content="@yield('title') @unless(Route::is('home')) | @endunless {{ 'آی‌تی‌تلکام' }}">
<meta itemprop="description" content="@hasSection('web_description')@yield('web_description')@else{{'مرجع نقد و بررسی و فروش محصولات شبکه ، دوربین مدار بسته و فیبرنوری'}}@endif">
<meta itemprop="image" content="@hasSection('thumb')@yield('thumb')@else {{ url('/assets/logo/logo.jpg') }} @endif">
<meta property="og:locale" content="fa_IR">
<meta property="og:type" content="@yield('web_type')">
<meta property="og:title" content="@yield('title') @unless(Route::is('home')) | @endunless {{ 'آی‌تی‌تلکام' }}">
<meta property="og:description" content="@hasSection('web_description')@yield('web_description')@else{{'مرجع نقد و بررسی و فروش محصولات شبکه ، دوربین مدار بسته و فیبرنوری'}}@endif">
<meta property="og:url" content="{{URL::current()}}">
<meta property="og:site_name" content="@yield('title') @unless(Route::is('home')) | @endunless {{ 'آی‌تی‌تلکام' }}">
<meta property="og:updated_time" content="@hasSection('web_date')@yield('web_date')@else{{date('Y-m-d\TH:i:s+03:00')}}@endif">
<meta property="og:image" content="@hasSection('thumb')@yield('thumb')@else {{ url('/assets/logo/logo.jpg') }} @endif">
<meta property="og:image:secure_url" content="@hasSection('thumb')@yield('thumb')@else {{ url('/assets/logo/logo.jpg') }} @endif">
<meta property="og:image:width" content="@hasSection('web_size_w')@yield('web_size_w')@else@php echo '1765'; @endphp@endif">
<meta property="og:image:height" content="@hasSection('web_size_h')@yield('web_size_h')@else@php echo '505'; @endphp@endif">
<meta property="og:image:alt" content="@yield('title') @unless(Route::is('home')) | @endunless {{ 'آی‌تی‌تلکام' }}">
<meta property="og:image:type" content="image/jpg">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="@yield('title') @unless(Route::is('home')) | @endunless {{ 'آی‌تی‌تلکام' }}">
<meta name="twitter:description" content="@hasSection('web_description')@yield('web_description')@else{{'مرجع نقد و بررسی و فروش محصولات شبکه ، دوربین مدار بسته و فیبرنوری'}}@endif">
<meta name="twitter:site" content="{{ '@'.'ittelecom' }}">
<meta name="twitter:creator" content="{{ '@'.'ittelecom' }}">
<meta name="twitter:image" content="@hasSection('thumb')@yield('thumb')@else{{route('home') . '/assets/logo' . '/logo.jpg'}}@endif">
<meta name="twitter:label1" content="Price">
<meta name="twitter:data1" content="ریال">

{{-- <meta name="author" content="آی‌تی‌تلکام"/> --}}
{{-- <meta name="abstract" content="@hasSection('web_description')@yield('web_description')@else{{'مرجع نقد و بررسی و فروش محصولات شبکه ، دوربین مدار بسته و فیبرنوری'}}@endif"> --}}
{{-- <meta name="subject" content="@hasSection('web_description')@yield('web_description')@else{{'مرجع نقد و بررسی و فروش محصولات شبکه ، دوربین مدار بسته و فیبرنوری'}}@endif"> --}}
{{-- <meta name="copyright" content="{{ \App\Models\Setting::where('name', 'copyright')->first()?->value }}"> --}}
