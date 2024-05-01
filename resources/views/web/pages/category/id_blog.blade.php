@extends('layouts.app')

@section('title', $category->title)
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@section('web_type', 'Archive' )
@section('web_amp', URL::current().'/amp' )

@section('web_description', $category->content )
@section('web_type', 'product' )
@section('web_date', $category->created_at )

@section('schema_org')
@include('web.inc.schema.post_category')
@endsection

{{--@section('menubar')--}}
{{--<div class="menubar-page blue scrollbar-horizon" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">--}}
{{--    <nav class="nav">--}}
{{--        <div class="menu-link menu-back menu-front">--}}
{{--            <ul class="menu">--}}
{{--                @foreach( $category_blog as $row_main )--}}
{{--                    <li class="iltr"><a class="block  @if(URL::current()==route('home').'/'.'category/article'.'/'.$row_main->slug) active @endif" href="{{'category/article'}}/{{$row_main->slug}}" itemprop="url">{{$row_main->title}}</a></li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </nav>--}}
{{--</div>--}}
{{--@endsection--}}

@section('content')
<div class="lists" data-fetch="scroll">
        <div class="lists-pan col-m-12">

        @include('web.inc.breadcrumb.category_blog')

            <div class="archive-rou">

                <div class="archive category col-9 last-bl hidden">
{{--                    <div class="head box">--}}
{{--                        <h1 class="text-right"><i class="icn white" style="background-image: url(/icons/feather.svg);"></i>{{$category->title}}</h1>--}}
{{--                        @if ($category->content)<div class="desc">{!!$category->content!!}</div>@endif--}}
{{--                    </div>    --}}
                    <ul class="posts category lists las-er" data-str="0" data-limit="5" data-id="{{$cat_id}}" data-slug="{{$last_url}}">

                    @foreach ($posts_id as $id)

                        @forelse($archive_cat_posts as $row)

                        @if ( $id->no_id == $row->id )

                            <li class="post list card">
                                <article class="box">
{{--                                <div class="arch-header">--}}
{{--                                        @foreach($users as $row_a)--}}
{{--                                            @if( $row_a->id == $row->author )--}}
{{--                                                <a href="author/{{$row_a->username}}" class="pa-ic block">--}}
{{--                                                    <img class="profile" src="{{'/images/uploads/picture/profile'}}/{{$row_a->photo}}" alt="{{$row_a->name}}" width="40" height="40">--}}
{{--                                                    <div class="txt-o">{{$row_a->name}}</div>--}}
{{--                                                </a>--}}
{{--                                            @endif--}}
{{--                                        @endforeach--}}
{{--                                    </div>                                    --}}
                                    <div class="arch-content">
                                        <a class="block" href="/blog/{{$row->slug}}" title="{{$row->title}}">
                                            <div class="arch-cater 9 p-4">
                                                @foreach(explode(",", $row->menu_ids) as $split_cat)
                                                    @foreach($category_blog as $cat_menu  )
                                                        @if( $cat_menu->id == $split_cat  )
{{--                                                            <a class="bo-btb" href="{{'category/article'}}/{{$cat_menu->slug}}">{{$cat_menu->title}}</a>--}}
                                                            دسته‌بندی:
                                                            {{$cat_menu->title}}
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                                <div class="date">تاریخ انتشار: {{ jdate($row->created_at)->ago()  }}</div>
                                            </div>
                                            <div class="txt-o bold p-4">{{$row->title}}</div>
                                            @foreach( explode(',',$row->thumb) as $thumb => $val)
                                                @if($thumb == 0)
                                                <div class="thumbnail wewtq">
                                                    @if ( file_exists(storage_path( 'uploads/picture/post' .'/'. $val .'.jpg' )) )
                                                        <img class="thumb" src="{{'/images/uploads/picture/post'}}/{{$val}}.jpg" alt="{{$row->title}}" width=800 height=400>
                                                    @else
                                                        <img class="thumb" src="/assets/lazy/post.jpg" alt="{{$row->title}}" width=800 height=400>
                                                    @endif
                                                </div>
                                                @endif
                                            @endforeach
                                            <div class="para">{!! \Illuminate\Support\Str::limit( strip_tags( str_replace('   ','',$row->content)) ,250) !!}...<span class="more bold" title="ادامه مطلب {{$row->title}}">ادامه مطلب</span></div>
                                        </a>
                                    </div>
                                </article>
                            </li>

                            @endif
                        @empty
                            <li class="no-data">مقاله‌ای وجود ندارد.</li>
                        @endforelse

                        @endforeach
                    </ul>
                </div>

                <div class="sidebar archive">

                    @include('web.v2.partials.insightful')
                    @include('web.v2.partials.social-networks')
                </div>

            </div>
        </div>
</div>
@endsection
