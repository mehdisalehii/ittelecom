@extends('amp.layouts.app')

@section('title','فروشگاه')

@section('web_robots', 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' )
@section('web_description', 'مرجع نقد و بررسی و فروش محصولات شبکه ، دوربین مدار بسته و فیبرنوری' )
@section('web_type', 'Shop' )
@section('web_date', date('Y-m-d\TH:i:s+03:00') )

@section('web_size_w', '1765')
@section('web_size_h', '505' )

@section('content')

<div class="breadcrumb">
    <ul itemscope="" itemtype="http://schema.org/BreadcrumbList">
        <li class="last-0" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a href="{{route('home')}}/amp" itemprop="item" title="خانه"><span itemprop="name">خانه</span></a><meta content="1" itemprop="position"></li>
        <li class="hidden"><span itemprop="name">فروشگاه</span></li>
    </ul>
    <div class="txt">فروشگاه</div>
</div>

<aside class="card hidden">
    <h1 class="text-right">همه محصولات</h1>
</aside>

<div class="lists-pd">
    <div class="head box">
        <div class="archive">
            <ul class="products lists-s" data-str="0" data-limit="20">
                @foreach($products as $row)
                    <li class="list">
                        <a class="block" href="{{route('home')}}/shop/{{$row->slug}}/amp" title="@if ($row->title) {{$row->title}} @else {{$row->header}} @endif">
                            @if($row->publish == 'draft')
                                    <div class="draft"><div class="circ"></div><div class="txt">پیش‌نویس</div></div>
                            @endif
                            @foreach( explode(',',$row->thumb) as $thumb => $val)
                                @if($thumb == 0)
                                <amp-img src="/images/uploads/picture/product/{{$val}}.jpg" layout="responsive" alt="{{$row->title}}"  width="300" height="300" ></amp-img>
                                @endif
                            @endforeach
                            <div class="txt">@if ( $row->header ) {{$row->header}} @else {{$row->title}} @endif</div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

@endsection
