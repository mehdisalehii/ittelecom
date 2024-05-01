<div class="breadcrumb index">
    <i class="icn fill" style="background-image: url(/icons/map-pin.svg);"></i>
    <ul itemscope="" itemtype="http://schema.org/BreadcrumbList">
        <li class="last-0 hidden" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a href="{{route('home')}}" itemprop="item" title="خانه"><span itemprop="name">خانه</span></a><meta content="1" itemprop="position"></li>
        <li class="last-0" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a href="/forum" itemprop="item" title="انجمن"><span itemprop="name">انجمن</span></a><meta content="2" itemprop="position"></li>
        <li class="hidden"><span itemprop="name">انبار {{$category->title}}</span></li>
    </ul>
    <div class="aria-clearfix"></div>
    <div class="txt">انبار {{$category->title}}</div>
    <div class="aria-clearfix"></div>
</div>