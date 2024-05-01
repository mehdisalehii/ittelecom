@extends('amp.layouts.app')

@section('title','لیست، خرید محصولات '. $menu->title)

@section('web_robots', 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' )
@section('web_description', 'مرجع نقد و بررسی و فروش محصولات شبکه ، دوربین مدار بسته و فیبرنوری' )
@section('web_type', 'Archive' )
@section('web_date', date('Y-m-d\TH:i:s+03:00') )
@section('web_size_w', '1765')
@section('web_size_h', '505' )

@section('content')

<div class="breadcrumb">
    <ul itemscope="" itemtype="http://schema.org/BreadcrumbList">
        <li class="last-0" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a href="{{route('home')}}/amp" itemprop="item" title="خانه"><span itemprop="name">خانه</span></a><meta content="1" itemprop="position"></li>

        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a href="{{route('home')}}/shop/amp" itemprop="item" title="فروشگاه"><span itemprop="name">فروشگاه</span></a><meta content="2" itemprop="position"></li>

        @if ($menu->parent == 0)
        <li class="hidden"><span itemprop="name">{{$menu->title}}</span></li>
        @else
        @foreach( cache()->remember('aria.menuWhereTypeIsProductAndParentIsZero', 518400, function () { return \App\Models\Menu::orderBy('sort', 'ASC')->where('type','=','product')->where('parent','=','0')->get(); }) as $cat_menu  )
            @php $before_slug= str_replace(array( route('home').'/' . 'products/cat' .'/', '/'.$menu->slug ),'',URL::current()); @endphp
            @if( $cat_menu->slug == $before_slug )
            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a href="{{route('home')}}/products/cat/{{$cat_menu->slug}}/amp" itemprop="item" title="{{$cat_menu->title}}"><span itemprop="name">{{$cat_menu->title}}</span></a><meta content="3" itemprop="position"></li>
            @endif
        @endforeach

        <li class="hidden"><span itemprop="name">{{$menu->title}}</span></li>
        @endif

    </ul>
    <div class="txt">{{$menu->title}}</div>
</div>


<aside class="gray">

    <div class="lists-pd col-m-12">
        <div class="head box">

            <div class="h1 bold">
                <span class="txt">محصولات {{$menu->title}}</span>
                @if ($menu->descr)<div class="desc cuntter">{!!$menu->descr!!}</div>@endif
            </div>

            <ul class="category lists-s">
            @php $i_numb=1; @endphp
            @forelse($archive_cat_products as $row)


                <li class="list col-6 col-u-6">
                    <a class="block" href="{{route('home')}}/shop/{{$row->slug}}/amp" title="@if ($row->title) {{$row->title}} @else {{$row->header}} @endif">
                        @foreach( explode(',',$row->thumb) as $thumb => $val)
                            @if($thumb == 0)
                            <amp-img src="/images/uploads/picture/product/{{$val}}.jpg" layout="responsive" alt="@if ($row->title) {{$row->title}} @else {{$row->header}} @endif"  width="300" height="300" ></amp-img>
                            @endif
                        @endforeach
                        <div class="txt">@if ($row->title) {{$row->title}} @else {{$row->header}} @endif</div>
                    </a>
                </li>
                @php $i_numb++; @endphp
                @empty
                <li class="no-data">محصولی وجود ندارد.</li>
            @endforelse

            </ul>
        </div>
    </div>

</aside>

@endsection
