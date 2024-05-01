@extends('layouts.app')

@section('web_type', 'Forum' )
@section('title',$topic->title)
@section('titleWebname',' | '. 'آی‌تی‌تلکام')
@section('web_robots', $topic->robots )
@section('web_description', $excerpt )


@section('content')
    @if($topic->type == 'q')
        @include('web.inc.head.menu.menubar_forum')
    @else
        <div class="menubar-page topic red scrollbar-horizon">
            <nav class="nav">
                <div class="menu-link menu-back">
                    <ul class="menu">
                        @foreach( $category_forum as $row_main )

                            <li class="-0"><a class="block @if(URL::current()==route('home').'/forum/products/'.$row_main->slug) active @endif" href="forum/products/{{$row_main->slug}}">{{$row_main->title}}</a></li>
                        @endforeach

                    </ul>
                </div>
            </nav>
        </div>
    @endif

    <div class="no-scroll-fetch">
        <div>
            <div class="content-topic col-m-12">

                @include('web.inc.breadcrumb.topic')

                <section class="card {{ $topic->type == 'q' ? 'border-blue' : 'border-red' }} hidden">
                    <div style="padding: 1rem;">

                        <div class="">
                            <h2 class="">{{$topic->title}}</h2>
                        </div>

                        <div class="">
                            <div class="">
                                <div class="" style="font-size:0.8rem; text-align:left;">
                                    تاریخ ارسال:
                                    {{ jdate($topic->created_at)->ago() }}
                                    <span style="color:#999">|</span>
                                    دسته‌بندی:
                                    <span class="">
                                    @foreach(explode(",", $topic->menu_ids) as $split_cat)
                                            @foreach($category_forum as $cat_menu)
                                                @if($cat_menu->id == $split_cat)
                                                    @if($topic->type == 'q')
                                                        <a href="forum/cats/{{$cat_menu->slug}}">{{$cat_menu->title}}</a>
                                                    @else
                                                        <a href="forum/products/{{$cat_menu->slug}}">{{$cat_menu->title}}</a>
                                                    @endif
                                                @endif
                                            @endforeach
                                        @endforeach
                                </span>
                                </div>
                            </div>
                            {{--            <div class="arch-header author">--}}
                            {{--                @foreach($users as $row_a)--}}
                            {{--                    @if( $row_a->id == $topic->author_id )--}}
                            {{--                        <a href="author/{{$row_a->username}}" class="block">--}}
                            {{--                            <img class="profile" src="{{'/images/uploads/picture/profile'}}/{{$row_a->photo}}" alt="{{$row_a->name}}" width="40" height="40">--}}
                            {{--                            <div class="txt-o">{{$row_a->name ? $row_a->name : $row_a->username}}</div>--}}
                            {{--                        </a>--}}
                            {{--                    @endif--}}
                            {{--                @endforeach--}}
                            {{--            </div>    --}}
                            {{-- <div class="arch-header">
                                <div class="pa-ic">
                                    <i class="icn fill" style="background-image: url(/icons/eye.svg);"></i>
                                    <div class="cio txt bold">{{ $topic->view  }} بازدید</div>
                                </div>
                            </div>     --}}
                        </div>
                        <div class="" style="margin-top:1rem;">{!! $topic->content !!}</div>
                    </div>
                </section>

                <div class="ans-lists hidden">

                    <div class="txt bold"><i class="icn fill" style="background-image: url(/icons/corner-down-left.svg);"></i>جواب‌ها:</div>

                    <ul class="lists">
                        @foreach($answer as $row_ans)
                            @if( $row_ans->parent_id == $topic->id )
                                <li>
                                    <aside class="card hidden">
                                        <div class="info hidden">
                                            {{--                            <div class="arch-header">--}}
                                            {{--                                @foreach($users as $row_a)--}}
                                            {{--                                    @if( $row_a->id == $row_ans->author_id )--}}
                                            {{--                                        <a href="author/{{$row_a->username}}" class="block">--}}
                                            {{--                                        <img class="profile" src="{{'/images/uploads/picture/profile'}}/{{$row_a->photo}}" alt="{{$row_a->name}}" width="40" height="40">--}}
                                            {{--                                        <div class="txt-o">{{$row_a->name}}</div>--}}
                                            {{--                                        </a>--}}
                                            {{--                                    @endif--}}
                                            {{--                                @endforeach--}}
                                            {{--                                <div class="extra txt" data-date="{{jdate($row_ans->created_at)->format('%A %d %B %Y')}}">{{  jdate($row_ans->created_at)->ago() }}</div>--}}
                                            {{--                            </div>   --}}
                                        </div>
                                        <div class="desc ">{!! $row_ans->content !!}</div>
                                    </aside>
                                </li>
                            @endif
                        @endforeach

                        @php $i = 0; @endphp
                        @foreach($answer as $ans)
                            @if( $row_ans->parent_id != $topic->id )
                                <li class="desc">جوابی برای این تاپیک داده نشده است.</li>
                                @php $i++; @endphp
                                @if($i == 1)
                                    @break
                                @endif
                            @endif
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
