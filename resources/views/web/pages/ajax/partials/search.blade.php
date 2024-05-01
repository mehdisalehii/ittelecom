@if (Request()->url_fetch == '/search/' )

    @if ( Auth::guard('web')->user() )

        @if($keyword_posts != '[]' || $keyword_menu != '[]' || $keyword_products != '[]' || $keyword_topics != '[]' || $keyword_users != '[]' || $keyword_invoices != '[]'|| $keyword_datasheets != '[]')

            @include('web.inc.head.search.search_foreach')
            @include('web.inc.head.search.search_foreach_admin')

        @else
            <p class="notfoundaj">با عرض پوزش، "{{Request()->keyword}}" پیدا نکردیم!<br><i class="icn fill" style="background-image: url(/icons/frown.svg);"></i></p>
        @endif

    @else

        @if($keyword_posts != '[]' || $keyword_menu != '[]' || $keyword_products != '[]' || $keyword_topics != '[]' || $keyword_users != '[]' || $keyword_dls_pdf != '[]' || $keyword_datasheets != '[]' )

            @include('web.inc.head.search.search_foreach')

        @else
        <p class="notfoundaj">با عرض پوزش، "{{Request()->keyword}}" پیدا نکردیم!<br><i class="icn fill" style="background-image: url(/icons/frown.svg);"></i></p>
        @endif

    @endif

@endif