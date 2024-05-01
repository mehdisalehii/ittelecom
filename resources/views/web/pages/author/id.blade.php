@extends('layouts.app')

@section('web_robots', 'noindex,nofollow' )
@section('web_description', 'مرجع نقد و بررسی و فروش محصولات شبکه ، دوربین مدار بسته و فیبرنوری' )
@section('web_type', 'archive' )
@section('web_date', date('Y-m-d\TH:i:s+03:00') )

@section('web_size_w', '1765')
@section('web_size_h', '505' )
@section('frony_theme_color', '#08c' )

@section('content')
<div class="col-full ui-part-full">
    <div class="lists">
        <div class="col-m-12 authors">

    @foreach($users as $row_a)
        @if( $row_a->username == $url )
            <div class="thumb">

                @if($row_a->name)
                    @php $title = $row_a->name  @endphp
                @else
                    @php $title = $row_a->username @endphp
                @endif

                @php
                    $checkThumb = $row_a->photo;
                    $strUSERName = $row_a->username;
                    $strUSERName_up = strtoupper($strUSERName);
                @endphp

                @if (strpos($checkThumb, '#') !== false)
                    <div class="string-back profile" style="background:{{$checkThumb}}">{{mb_substr($strUSERName_up, 0, 1)}}</div>
                @else
                    <img class="profile" src="{{route('home')}}/{{ '/images/uploads/picture/profile' .'/'. $checkThumb }}" width="100" height="100" alt="{{$title}}">
                @endif

            </div>

            @section('title','کاربران | '. $title )

            <div class="txt">
                <div class="txt-teoe bold">{{$title}}</div>
            </div>

            <div class="topics archive-archive">
                <ul class="forum category lists las-er">
            @foreach($forum as $row_b)
            @if( $row_b->author_id == $row_a->id )

                @if ( $row_b->title )
                    @if (mb_strlen( $row_b->title ) > 45)
                        @php $title = mb_substr( $row_b->title ,0,45, "utf-8").'...'; @endphp
                    @else
                        @php $title = $row_b->title; @endphp
                    @endif
                @endif

                <li class="topic list card">
                    <article class="box">
                        <div class="arch-content">
                            <a class="block" href="forum/{{$row_b->slug}}" title="{{$title}}">
                                <div class="txt-o bold"><i class="icn fill" style="background-image: url(/icons/twitch.svg);"></i>{{$title}}</div>
                            </a>
                            <div class="para">{!! mb_substr( strip_tags( str_replace('   ','',$row_b->content)) ,0,250, "utf-8") !!}...</div>
                        </div>
                        <div class="arch-cater 8">
                            <div class="txt-ww date"><i class="icn fill" style="background-image: url(/icons/clock.svg);"></i> {{  jdate($row_b->created_at)->ago()  }}</div>
                            @foreach($users as $row_a)
                            @if( $row_a->id == $row_b->author_id )
                                <a href="author/{{$row_a->username}}" class="hidden"><img class="profile hidden" src="{{'/images/uploads/picture/profile'}}/{{$row_a->photo}}" alt="{{$row_a->name}}" width="40" height="40"></a>
                                <div class="txt-ww"><i class="icn fill" style="background-image: url(/icons/user.svg);"></i>{{$row_a->name}}</div>
                            @endif
                            @endforeach

                            <div class="txt-ww bo-btb no-hov">
                                <div class="txt ans">
                                    <i class="icn fill" style="background-image: url(/icons/corner-up-left.svg);"></i>{{$row->answer}} پاسخ
                                </div>
                            </div>
                            <div class="txt-ww more">
                                <a class="btn-border more bo-btb" href="forum/{{$row->slug}}">
                                ادامه مطلب<i class="icn fill" style="background-image: url(/icons/arrow-left.svg);"></i></a>
                            </div>

                            @foreach(explode(",", $row_b->menu_ids) as $split_cat)
                            @foreach($category_blog as $cat_menu)
                            @if( $cat_menu->id == $split_cat  )
                            <a class="bo-btb" href="forum/cats/{{$cat_menu->slug}}"><i class="icn fill" style="background-image: url(/icons/folder.svg);"></i>{{$cat_menu->title}}</a>
                            @endif
                            @endforeach
                            @endforeach
                        </div>
                    </article>
                </li>

            @endif
            @endforeach

                </ul>
            </div>

        @endif
    @endforeach

        </div>
    </div>
</div>
@endsection
