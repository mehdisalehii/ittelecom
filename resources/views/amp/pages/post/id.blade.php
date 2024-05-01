@extends('amp.layouts.app')

@if ( $post->header )
    @php $title = $post->header; @endphp
@else
    @php $title = $post->title; @endphp
@endif

@php
    $excerpt = $post->short_description;
@endphp

@php $i_er=1; @endphp
@foreach( explode(',',$post->thumb) as $thumb )
    @if ($i_er < 2)
        @php
            $thumb_t =  url('/images/uploads/picture/post/'.$thumb.'.jpg');
        @endphp
    @endif
    @php $i_er++; @endphp
@endforeach

@section('title',  $title . ' | بلاگ' )
@section('web_robots', $post->robots )
@section('web_description', $excerpt )
@section('web_type', 'article' )
@section('web_date', $post->created_at )
@section('thumb', $thumb_t )
@section('web_size_w', '800' )
@section('web_size_h', '400' )

@section('content')

<aside class="gray">

    <div class="lists-pd" style="border-top: 0;">

        <div class="header-title">
            <h1 class="title-txt">{{$title}}</h1>
        </div>

        <article class="box no-header item title-centered" id="item">

            <div class="item-summary">
                <figure class="item-img gallary">
                    <amp-carousel id="carouselWithPreview" width="800" height="400" layout="responsive" type="slides" on="slideChange:carouselWithPreviewSelector.toggle(index=event.index,value=true)">
                    @php $i_er=1; @endphp
                    @foreach( explode(',',$post->thumb) as $thumb )
                        @if ($i_er < 2)
                    <amp-img src="{{'/images/uploads/picture/post'}}/{{$thumb}}.jpg" layout="fill" alt="{{$title}}"></amp-img>
                        @endif
                        @php $i_er++; @endphp
                    @endforeach
                    </amp-carousel>
                </figure>
            </div>

            <div class="content-desc">
                <div class="desc">
                    <h3>توضیحات {{$title}}</h3>
                    {!! $post->content !!}
                </div>
            </div>

        </article>

    </div>

</aside>

@endsection
