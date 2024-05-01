@extends('layouts.app')

@section('title','بلاگ')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@section('web_type', 'Blog' )
@section('web_amp', route('home').'/blog/amp' )

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

@section('breadcrumb')
    <div class="breadcrumb">
        <i class="icn fill" style="background-image: url(/icons/map-pin.svg);"></i>
        <ul itemscope="" itemtype="http://schema.org/BreadcrumbList">
            <li class="last-0" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a href="{{route('home')}}" itemprop="item" title="خانه"><span itemprop="name">خانه</span></a><meta content="1" itemprop="position"></li>
            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a href="/blog" itemprop="item" title="بلاگ"><span itemprop="name">بلاگ</span></a><meta content="2" itemprop="position"></li>
        </ul>
        <div class="aria-clearfix"></div>
        {{--<div class="txt">{{$post->title}}</div>--}}
    </div>
@endsection

@section('content')
<div class="lists" data-fetch="scroll">
    <div class="lists-pan col-m-12">
        @if($posts->currentPage() == 1)
            <div class="carousel-sli-blog">
                <div class="slider">
                    <div class="panel-box-s">
                        <div class="box">
                            <aside class="car-slide">
                                <div class="box-img slide-img change-box grid grid-1 gap-3">
                                    @foreach($slideshow as $row)
                                        <a class="card img-src change-obj item-{{ $row->id }}" href="/blog/{{$row->slug}}">
                                            <div class="thumbnail wrwru">
                                                @if(explode(',', $row->thumb) && explode(',', $row->thumb)[0])
                                                    <img class="thumb" src="/generated/images/post/473x288/{{ explode(',', $row->thumb)[0] }}.webp" alt="{{$row->title}}"  width="100%">
                                                @else
                                                    <img class="thumb" src="/generated/images/post/473x288/{{ $row->thumb }}.webp" alt="{{$row->title}}"  width="100%">
                                                @endif
                                            </div>
                                            <span class="txt">{{$row->title}}</span>
                                        </a>
                                    @endforeach
                                </div>
                                {{-- <div class="btn-box">
                                    <div class="next" style="background-image: url(/icons/chevron-right.svg);"></div>
                                    <div class="prev" style="background-image: url(/icons/chevron-left.svg);"></div>
                                </div> --}}
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="archive-rou">
            <div class="archive last-bl">
                <ul class="blog category lists las-er" data-str="0" data-limit="5">
                    @foreach($posts as $row)
                        <li class="post list card">
                            <article class="pan">
                                {{--                                <div class="arch-header">--}}
                                {{--                                    @foreach($users as $row_a)--}}
                                {{--                                        @if( $row_a->id == $row->author )--}}
                                {{--                                            <a href="author/{{$row_a->username}}" class="block">--}}
                                {{--                                                <img class="profile" src="{{'/images/uploads/picture/profile'}}/{{$row_a->photo}}" alt="{{$row_a->name}}" width="40" height="40">--}}
                                {{--                                                <div class="txt-o">{{$row_a->name}}</div>--}}
                                {{--                                            </a>--}}
                                {{--                                        @endif--}}
                                {{--                                    @endforeach--}}
                                {{--                                </div>                                    --}}
                                <div class="arch-content">
                                    <a class="block" href="/blog/{{$row->slug}}" title="{{$row->title}}">
                                        <div class="arch-cater 13 p-4">
                                            @foreach(explode(",", $row->menu_ids) as $split_cat)
                                                @foreach($category_blog as $cat_menu)
                                                    @if( $cat_menu->id == $split_cat  )
                                                        {{--                                                        <a class="bo-btb" href="{{'category/article'}}/{{$cat_menu->slug}}">{{$cat_menu->title}}</a>--}}
                                                        دسته‌بندی:
                                                        {{$cat_menu->title}}
                                                    @endif
                                                @endforeach
                                            @endforeach
                                            <div class="date">تاریخ انتشار: {{ jdate($row->created_at)->ago()   }}</div>
                                        </div>
                                        <h4 class="txt-o p-4">{{$row->title}}</h4>
                                        @foreach( explode(',',$row->thumb) as $thumb => $val)
                                            @if($thumb == 0)
                                                <div class="thumbnail wewtq">
                                                    <img class="thumb" src="/generated/images/post/800x400/{{$val}}.webp" alt="{{$row->title}}" width=800 height=400>
                                                </div>
                                            @endif
                                        @endforeach
                                        <div class="para">{!! \Illuminate\Support\Str::words( strip_tags( str_replace('   ','',$row->content)) ,100) !!}<span class="more bold" title="ادامه مطلب {{$row->title}}">ادامه مطلب</span></div>
                                    </a>
                                </div>
                            </article>
                        </li>
                    @endforeach
                </ul>
                <div class='aria-clearfix'></div>

                <!-- BEGIN PAGINATION -->
                <nav class="pagination text-center" aria-label="Page navigation example">
                    <ul class="inline-flex -space-x-px text-base h-10">
                        @if($posts->currentPage() == 1)
                            <li>
                                <a
                                   href="/blog/?page={{ 1 }}"
                                   aria-current="page"
                                   class="flex items-center justify-center px-2 h-10 text-blue-600 border border-gray-300 rounded-r-lg bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white"
                                >
                                    1
                                </a>
                            </li>
                        @else
                            <li>
                                <a
                                    rel="prev"
                                    href="/blog/?page={{ $posts->currentPage() - 1 }}"
                                    class="flex items-center justify-center px-2 h-10 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                                >
                                    قبل
                                </a>
                            </li>
                            <li>
                                <a
                                    rel="prev"
                                    href="/blog/?page={{ 1 }}"
                                    class="flex items-center justify-center px-2 h-10 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                                >
                                    1
                                </a>
                            </li>
                        @endif
                        @if($posts->currentPage() > $mobile_pagination_margin)
                            <li>
                                <span class="flex items-center justify-center px-2 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">...</span>
                            </li>
                        @endif
                        @for($pageCounter=2;$pageCounter<$posts->lastPage();$pageCounter++)
                            @continue($pageCounter <= ($posts->currentPage() - $mobile_pagination_margin) || $pageCounter >= ($posts->currentPage() + $mobile_pagination_margin))
                            <li>
                                <a href="/blog/?page={{ $pageCounter }}"
                                   @if($pageCounter < $posts->currentPage())
                                   rel="prev"
                                   class="flex items-center justify-center px-2 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                                   @elseif($pageCounter > $posts->currentPage())
                                   rel="next"
                                   class="flex items-center justify-center px-2 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                                   @elseif($pageCounter == $posts->currentPage())
                                   aria-current="page"
                                   class="flex items-center justify-center px-2 h-10 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white"
                                   @endif
                                >
                                    {{ $pageCounter }}
                                </a>
                            </li>
                        @endfor
                        @if($posts->currentPage() < ($posts->lastPage() - $mobile_pagination_margin))
                            <li>
                                <span class="flex items-center justify-center px-2 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">...</span>
                            </li>
                        @endif
                        @if($posts->currentPage() == $posts->lastPage())
                            <li>
                                <a
                                        href="/blog?page={{ $posts->lastPage() }}"
                                        aria-current="page"
                                        class="flex items-center justify-center px-2 h-10 text-blue-600 border border-gray-300 rounded-l-lg bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white"
                                >
                                    {{ $posts->lastPage() }}
                                </a>
                            </li>
                        @else
                            <li>
                                <a
                                        rel="next"
                                        href="/blog?page={{ $posts->lastPage() }}"
                                        class="flex items-center justify-center px-2 h-10 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                                >
                                    {{ $posts->lastPage() }}
                                </a>
                            </li>
                            <li>
                                <a
                                        rel="next"
                                        href="/blog?page={{ $posts->currentPage() + 1 }}"
                                        class="flex items-center justify-center px-2 h-10 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                                >
                                    بعد
                                </a>
                            </li>
                        @endif
                    </ul>
                </nav>
                <!-- END PAGINATION -->
                <div class='aria-clearfix'></div>
            </div>
            <div class="sidebar archive">
                @can('content_create')
                    <div class="card content-admin sidebar-btn-head">
                        <a class="btn btn-success" href="{{ route('admin.post.create') }}"><i class="icn block white" style="background-image:url('/icons/plus-circle.svg');"></i>مقاله جدید</a>
                        <a class="btn btn-danger" href="{{ route('admin.draft.post') }}"><i class="icn block white" style="background-image:url('/icons/list.svg');"></i>پیش‌نویس مقالات</a>
                        <div class="aria-clearfix"></div>
                    </div>
                @endcan
                @include('web.v2.partials.sidebars.common')
                <div class='aria-clearfix'></div>
            </div>
            <div class='aria-clearfix'></div>
        </div>
    </div>
</div>
@endsection
