<div class="breadcrumb">
    <i class="icn fill" style="background-image: url(/icons/map-pin.svg);"></i>
    <ul itemscope="" itemtype="http://schema.org/BreadcrumbList">
        <li class="last-0" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a href="{{route('home')}}" itemprop="item" title="خانه"><span itemprop="name">خانه</span></a><meta content="1" itemprop="position"></li>
        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a href="/blog" itemprop="item" title="بلاگ"><span itemprop="name">بلاگ</span></a><meta content="2" itemprop="position"></li>
        <li class="hidden"><span itemprop="name">{{$category->title}}</span></li>
    </ul>
    <div class="aria-clearfix"></div>
    <div class="txt">{{$category->title}}</div>
    <div class="aria-clearfix"></div>
</div>