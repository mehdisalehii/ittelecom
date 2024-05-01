<div class="breadcrumb">
    <i class="icn fill" style="background-image: url(/icons/map-pin.svg);"></i>
    <ul itemscope="" itemtype="http://schema.org/BreadcrumbList">
        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a href="{{route('home')}}" itemprop="item" title="خانه"><span itemprop="name">خانه</span></a><meta content="1" itemprop="position"></li>

        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a href="/shop" itemprop="item" title="فروشگاه"><span itemprop="name">فروشگاه</span></a><meta content="2" itemprop="position"></li>

        @if ($menu->parent == 0)
            <li><span itemprop="name">{{$menu->title}}</span></li>
        @else
            @foreach( cache()->remember('aria.menuWhereTypeIsProductAndParentIsZero', 518400, function () { return \App\Models\Menu::orderBy('sort', 'ASC')->where('type','=','product')->where('parent','=','0')->get(); }) as $cat_menu  )
                @php $before_slug= str_replace(array( route('home').'/'.'products/cat'.'/', '/'.$menu->slug ),'',URL::current()); @endphp
                @if( $cat_menu->slug == $before_slug )
                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a href="/products/cat/{{$cat_menu->slug}}" itemprop="item" title="{{$cat_menu->title}}"><span itemprop="name">{{$cat_menu->title}}</span></a><meta content="3" itemprop="position"></li>
                @endif
            @endforeach

            <li><span itemprop="name">{{$menu->title}}</span></li>
        @endif

    </ul>
    <div class="aria-clearfix"></div>
    {{--<div class="txt">{{$menu->title}}</div>--}}
</div>
