@extends('layouts.app')

@php
    $excerpt = $post->short_description ?? preg_replace( "/\r|\n|\t/", "", mb_substr( strip_tags( str_replace('   ','',$post->content)) ,0,100, "utf-8") . '‍...');
@endphp

@php $i_er=1; @endphp
@foreach( explode(',',$post->thumb) as $thumb )
    @if ($i_er < 2)
        @php
            $thumb_t =  url('/images/uploads/picture/post'.'/'.$thumb.'.jpg');
        @endphp
    @endif
    @php $i_er++; @endphp
@endforeach

@section('title',  $post->title . ' | بلاگ' )
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@section('web_robots', $post->robots )
@section('web_description', $excerpt )
@section('web_type', 'article' )
@section('web_date', $post->created_at )
@section('thumb', $thumb_t )
@section('web_size_w', '800' )
@section('web_size_h', '400' )
@section('web_amp', route('home').'/blog/'.$post->slug.'/amp' )

@push('css')
<style>nav a.blog{border-bottom:2px solid #0f73b9;color:#0f73b9}a.blog i.icn{filter:invert(35%) sepia(93%) saturate(818%) hue-rotate(170deg) brightness(90%) contrast(94%)}</style>
@endpush
@push('javascripts')
<script>
    $(document).ready(function(){
        scrollpup({
            background: 'linear-gradient(to right, #0f73b9, #0f73b9)',
            height: '8px'
        })
    });
</script>
@endpush
@section('menubar')
<div class="menubar-page blue scrollbar-horizon" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
    <nav class="nav">
        <div class="menu-link menu-back menu-front">
            <ul class="menu">
                @foreach( $category_blog as $row_main )
                    <li class="iltr"><a class="block  @if(URL::current()==route('home').'/'.'category/article'.'/'.$row_main->slug) active @endif" href="{{'category/article'}}/{{$row_main->slug}}" itemprop="url">{{$row_main->title}}</a></li>
                @endforeach
            </ul>
        </div>
    </nav>
</div>
@endsection

@section('content')
    <div style="">
        <div class="blog-content-container" style="">
            <div class="col">
                <div class="box-pan">
                    <div class="content-post col-m-12">
                        <article class="single card hidden">

                            @can('content_edit')
                                <div class="toolbar-editor">
                                    <a class="edit btn btn-danger text-white btn-edit" href="admin/post/{{$post->id}}/edit">
                                        <i class="icn block white" style="background-image:url('/icons/pencil.svg');"></i>
                                        ویرایش مقاله
                                    </a>
                                </div>
                            @endcan

                            @if(isset($post))
                                @if($post->publish == 'draft')
                                    <div class="panel draft">
                                        <div class="circ"></div>
                                        <div class="txt">پیش‌نویس</div>
                                    </div>
                                @endif
                            @endif
                            <div class="arch-content thumb gallary">
                                @foreach( explode(',',$post->thumb) as $thumb => $val)
                                    @if($thumb == 0)
                                        @section('thumb', url('/images/uploads/picture/post/'. $val . '.jpg'))
                                        <div class="images thumbnail post-bl">
                                            <img class="thumb" src="/generated/images/post/w600/{{$val}}.webp" alt="{{$post->title}}" width="100%">
                                        </div>
                                    @endif
                                @endforeach
                            </div>

                            <div class="clear"></div>

                            <div class="description">
                                <h1>{{$post->title}}</h1>
                                {!! $post->content !!}
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
        <div class="blog-sidebar-container" style="">
            @include('web.v2.partials.sidebars.blog-post')
        </div>
        <div class="aria-clearfix"></div>
    </div>
{{--    <div style="">--}}
{{--        <div class="aria-clearfix"></div>--}}
{{--        <div class="box-pan">--}}
{{--            <div class="lists-pan">--}}
{{--                <section class="card box-lists">--}}
{{--                    <div class="title-ts">--}}
{{--                        <div class="txt extra">--}}
{{--                            <i class="icn block" style="background-image:url('/icons/book-open.svg');"></i>--}}
{{--                            <h3>مقالات مرتبط</h3></div>--}}
{{--                        <a class="btn-border block" href="/blog">--}}
{{--                            مشاهدهٔ همه--}}
{{--                            <i class="icn block fill" style="background-image:url('/icons/arrow-left.svg');"></i>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                    <ul class="lists grid grid-1 gap-2">--}}
{{--                        @foreach($related_posts as $row)--}}
{{--                            <li>--}}
{{--                                <a href="/blog/{{$row->slug}}" title="{{$row->title}}">--}}
{{--                                    @foreach( explode(',',$row->thumb) as $thumb => $val)--}}
{{--                                        <div class="thumb-l">--}}
{{--                                            @if($thumb == 0)--}}
{{--                                                <img class="thumb" src="/generated/images/post/340x170/{{$val}}.webp" alt="{{$row->title}}" width=340 height=170>--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                    @endforeach--}}
{{--                                    <div class="text-center">{{ $row->title }}</div>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                    <div class="aria-clearfix"></div>--}}
{{--                </section>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection

@section('breadcrumb')
<div class="breadcrumb">
    <i class="icn fill" style="background-image: url(/icons/map-pin.svg);"></i>
    <ul itemscope="" itemtype="http://schema.org/BreadcrumbList">
        <li class="last-0" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a href="{{route('home')}}" itemprop="item" title="خانه"><span itemprop="name">خانه</span></a><meta content="1" itemprop="position"></li>
        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a href="/blog" itemprop="item" title="بلاگ"><span itemprop="name">بلاگ</span></a><meta content="2" itemprop="position"></li>
        @foreach(explode(",", $post->menu_ids) as $split_cat)
        @foreach($category_blog as $cat_menu  )
        @if( $cat_menu->id == $split_cat )
        <li class="lin"><a href="{{'category/article'}}/{{$cat_menu->slug}}" itemprop="item">{{$cat_menu->title}}</a><meta content="3" itemprop="position"></li>
        @endif
        @endforeach
        @endforeach
        <li class="las-tit"><span itemprop="name">{{$post->title}}</span></li>
    </ul>
    <div class="aria-clearfix"></div>
    {{--<div class="txt">{{$post->title}}</div>--}}
</div>
@endsection

@section('schema_org')
    <script type="application/ld+json">
        {
            "@context":"https://schema.org",
            "@type":"Article",
            "headline": "{{ $post->title }}",
            "description": "{{ $excerpt }}",
            "datePublished": "{{ $post->created_at }}",
            "dateModified": "{{ $post->created_at }}",
            "publisher":{
                "@type": "Organization",
                "url": "{{ url("/") }}",
                "name": "{{ $post->title }}",
                "logo": {
                    "@type": "ImageObject",
                    "url": "{{ url('/assets/logo.jpg') }}"
                    },
                "contactPoint": {
                    "@type": "ContactPoint",
                    "telephone": "+982144446012",
                    "email": "sale@ittelecom.ir",
                    "contactType": "Customer service"
                }
            },
            "mainEntityOfPage":{
                "@type":"WebPage",
                "@id":"{{ url("/shop/" . $post->slug) }}"
            },
            "author":{
                "@type":"Person",
                "name": "فروشگاه اینترنتی آی‌تی‌تلکام",
                "url": "{{ url("/") }}"
            },
            "image":{
                "@type":"ImageObject",
                "url":"{{ $thumb_t }}","width":1200,"height":630
            }
        }
    </script>
@endsection
