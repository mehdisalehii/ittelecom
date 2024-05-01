@extends('amp.layouts.app')

@php
$title = $product->title;
$pdf = $product->pdf;
$zip = $product->zip;
@endphp

@php
    $excerpt = preg_replace( "/\r|\n|\t/", "", mb_substr( strip_tags( str_replace('   ','',$product->content)) ,0,250, "utf-8") . '‍...');
@endphp

@php $i_er=1; @endphp
@foreach( explode(',',$product->thumb) as $thumb )
    @if ($i_er < 2)
        @php
            $thumb_t =  url('/images/uploads/picture/product/'.$thumb.'.jpg');
        @endphp
    @endif
    @php $i_er++; @endphp
@endforeach

@section('title','خرید، فروش، قیمت و مشخصات '. $title )
@section('web_robots', $product->robots )
@section('web_description', $excerpt )
@section('web_type', 'article' )
@section('web_date', $product->created_at )
@section('thumb', $thumb_t )
@section('web_size_w', '1080' )
@section('web_size_h', '1080' )

@section('content')

{{-- @include('web.inc.breadcrumb.product') --}}

<aside class="gray">
    <div class="lists-pd">
        <div class="header-title">
            <h1 class="title-txt">{{$title}}</h1>
        </div>
        <article class="box no-header item title-centered" id="item">
            <div class="item-summary">
                <figure class="item-img gallary">
                    <amp-carousel id="carouselWithPreview" width="400" height="400" layout="responsive" type="slides" on="slideChange:carouselWithPreviewSelector.toggle(index=event.index,value=true)">
                    @php $i_er=1; @endphp
                    @foreach( explode(',',$product->thumb) as $thumb )
                        @if ($i_er < 2)
                    <amp-img src="/images/uploads/picture/product/{{$thumb}}.jpg" layout="fill" alt="{{$title}}"></amp-img>
                        @endif
                        @php $i_er++; @endphp
                    @endforeach
                    </amp-carousel>
                    <amp-selector id="carouselWithPreviewSelector" class="carousel-preview" on="select:carouselWithPreview.goToSlide(index=event.targetOption)" layout="container">
                        @php $i_er=1; $select = ''; @endphp
                        @foreach( explode(',',$product->thumb) as $thumb )
                        @if ($i_er < 2)
                        <div class="box-img-select">
                        @if ( $i_er == '0' ) @php $select = 'selected'; @endphp @endif
                        <amp-img option="{{$i_er}}" {{ $select }} src="/images/uploads/picture/product/{{$thumb}}.jpg" width="60" height="60" alt="{{$title}}"></amp-img>
                        </div>
                        @endif
                        @php $i_er++; @endphp
                        @endforeach
                    </amp-selector>
                </figure>
            </div>
            @include('amp.pages.product.partials.info')
            <div class="content-desc">
                <div class="desc">
                    <h3>
                        توضیحات
                        {{$title}}
                    </h3>
                    {!! $product->content !!}
                </div>
                <div class="desc">
                    <h3>
                        مشخصات فنی
                        {{$title}}
                    </h3>
                    {!! $product->detials !!}
                </div>
            </div>
        </article>
    </div>
</aside>
@endsection
