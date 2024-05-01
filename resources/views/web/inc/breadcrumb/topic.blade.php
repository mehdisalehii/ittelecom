<div class="breadcrumb">
    <i class="icn fill" style="background-image: url(/icons/map-pin.svg);"></i>
    <ul itemscope="" itemtype="http://schema.org/BreadcrumbList">
        <li class="last-0 hidden" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a href="{{route('home')}}" itemprop="item" title="خانه"><span itemprop="name">خانه</span></a><meta content="1" itemprop="position"></li>
        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a href="/forum" itemprop="item" title="انجمن"><span itemprop="name">انجمن</span></a><meta content="2" itemprop="position"></li>
        @foreach(explode(",", $topic->menu_ids) as $split_cat)
        @foreach($category_forum as $cat_menu  )
        @if( $cat_menu->id == $split_cat )
        @if($topic->type == 'q')
        <li><a href="forum/cats/{{$cat_menu->slug}}" itemprop="item">تاپیک‌های {{$cat_menu->title}}</a></li>
        @else
        <li><a href="forum/products/{{$cat_menu->slug}}" itemprop="item">انبار {{$cat_menu->title}}</a></li>
        @endif
        @endif
        @endforeach
        @endforeach
        <li class="last-tit"><span itemprop="name">{{$topic->title}}</span></li>
    </ul>
    <div class="aria-clearfix"></div>
    {{--<div class="txt">{{$topic->title}}</div>--}}
</div>
