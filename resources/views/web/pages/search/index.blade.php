@extends('layouts.app')

@section('title', Request()->keyword ? 'جستجو | '. Request()->keyword : 'جستجو' )
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@if(strpos('index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1','noindex') !== false)
    @section('web_robots', 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' )
@endif

@section('web_type', 'Search' )

@section('content')
<div class="ui-part lists">
    <div class="lists-pan col-m-12">

    @include('web.inc.breadcrumb.search')

        <aside class="card search-box hidden">
            <i class="icn fill tiltle-th" style="background-image: url(/icons/search.svg);"></i>
            <h1 class="text-right title-header-t">{{ Request()->keyword ? 'جستجو: "'. Request()->keyword.'"' : 'جستجو: " " ' }}</h1>

            <input class="form-control search-input search-input-page" placeholder="  جستجو" maxlength="2048" name="keyword" type="text" aria-autocomplete="both" aria-haspopup="false" autocapitalize="off" autocomplete="off" spellcheck="false" title="جستجو" aria-label="Search" value="{{ Request()->keyword }}">

            <a href="/search" class="navbarsearchbtn"><i class="icn fill tiltle-th" style="background-image: url(/icons/search.svg);"></i></a>
            <div class="aria-clearfix"></div>
        </aside>

        <aside class="card search-page hidden res-pop">

            <ul class="resultaj result-p">

                @if ( Auth::guard('web')->user() )

                    @if (Request()->keyword != '')

                        @if($keyword_posts != '[]' || $keyword_menu != '[]' || $keyword_products != '[]' || $keyword_topics != '[]' || $keyword_users != '[]' || $keyword_invoices != '[]'  || $keyword_dls_pdf != '[]'  || $keyword_datasheets != '[]'  )

                            @include('web.inc.head.search.search_foreach')
                            @include('web.inc.head.search.search_foreach_admin')

                        @else

                            @if(strpos( Request::fullUrl(), 'search?keyword=') !== false )

                                @php
                                    $keyword = str_replace( route('home').'/search?keyword=' , '' , Request::fullUrl() );
                                    /// echo $keyword;
                                @endphp

                                <script> // window.location.href= "{{route('home')}}/search/{{$keyword}}"; </script>

                                @php
                                    // ob_start();
                                    header('Location:'.route('home').'/search/'.$keyword );
                                    exit();
                                @endphp

                            @else
                                <p class="notfound">با عرض پوزش، "{{Request()->keyword}}" پیدا نکردیم!<br><i class="icn fill" style="background-image: url(/icons/frown.svg);"></i></p>
                            @endif

                        @endif

                    @else
                        <p class="notfound">لطفا عبارت موردنظر خود را در سایت آی‌تی‌تلکام سرچ کنید تا نتایج دقیق‌تری را دریافت کنید.<br><i class="icn fill" style="background-image: url(/icons/smile.svg);"></i></p>
                    @endif

                @else

                    @if (Request()->keyword != '')

                        @if($keyword_posts != '[]' || $keyword_menu != '[]' || $keyword_products != '[]' || $keyword_topics != '[]' || $keyword_users != '[]'  || $keyword_dls_pdf != '[]' || $keyword_datasheets != '[]' )

                            @include('web.inc.head.search.search_foreach')

                        @else

                            @if(strpos( Request::fullUrl(), 'search?keyword=') !== false )

                                @php
                                    $keyword = str_replace( route('home').'/search?keyword=' , '' , Request::fullUrl() );
                                    /// echo $keyword;
                                @endphp

                                <script> // window.location.href= "{{route('home')}}/search/{{$keyword}}"; </script>

                                @php
                                    // ob_start();
                                    header('Location:'.route('home').'/search/'.$keyword );
                                    exit();
                                @endphp

                            @else
                                <p class="notfound">با عرض پوزش، "{{Request()->keyword}}" پیدا نکردیم!<br><i class="icn fill" style="background-image: url(/icons/frown.svg);"></i></p>
                            @endif

                        @endif

                    @else
                        <p class="notfound">لطفا عبارت موردنظر خود را در سایت آی‌تی‌تلکام سرچ کنید تا نتایج دقیق‌تری را دریافت کنید.<br><i class="icn fill" style="background-image: url(/icons/smile.svg);"></i></p>
                    @endif

                @endif

            </ul>
            <div class="aria-clearfix"></div>
        </aside>
        <div class="aria-clearfix"></div>
    </div>
</div>
@endsection
