@extends('layouts.app')

@section('web_type', 'Forum' )
@section('title','تاپیک‌های '. $category->title )
@section('titleWebname',' | '. 'آی‌تی‌تلکام')
@section('web_robots', 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' )
@section('web_description', 'مرجع نقد و بررسی و فروش محصولات شبکه ، دوربین مدار بسته و فیبرنوری' )

@section('content')

    <div class="menubar-page blue-2 scrollbar-horizon">
        <nav class="nav">
            <div class="menu-link menu-back">
                <ul class="menu">
                    <li class="-0"><a class="block active" href="forum/cats/{{$category->slug}}">
                            تاپیک‌های
                            {{$category->title}}
                        </a></li>
{{--                    <li class="-0"><a class="block" href="forum/products/{{$category->slug}}">اتاق انبار {{$category->title}}</a></li>--}}
                </ul>
            </div>
        </nav>
    </div>

    <div class="lists" data-fetch="scroll">
        <div class="lists-pan col-m-12">

            @include('web.inc.breadcrumb.category_forum')
            <a class="block" href="/forum/cats/{{$category->slug}}">
                <div style="margin-bottom: 1rem; background: url('/generated/images/assets-forum/1600x200/{{$category->thumb}}.webp') #666;">
                    {{--                <img class="thumb" src="/assets/menu/{{$category->thumb}}" alt="{{$category->title}}" width="100%">--}}
    {{--                    <img class="thumb" src="/generated/images/assets-forum/1600x200/active.webp" alt="{{$category->title}}" width="100%">--}}
                    {{-- <img class="thumb back" src="/assets/background/back-300.png" alt="{{$category->title}}" width=200 height=200> --}}
                    <div style="background: rgba(0,0,0,0.5); color:#fff; font-wight: bold; font-size: 3rem; text-shadow: #000 0px 0px 5px; padding: 3rem 1rem;">
                        اتاق
                        {{$category->title}}
                    </div>
                </div>
            </a>

            <div class="archive-col-s-12">
                <div class="new-btn">
                    <a href="{{'/login'}}" class="btn btn-border"><i class="icn fill" style="background-image: url(/icons/plus-circle.svg);"></i>ثبت تاپیک جدید</a>
                </div>
                <div class="archive category col-9 last-bl hidden">
                    <div class="">
                        @forelse($posts as $row)
                            <div class="card">
                                <table style="width:100%;" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td class="forum-avatar-container-td @if ($loop->first) first @elseif($loop->last) last @else other-replies @endif">
                                            <img class="forum-avatar" src="/icons/forum-default-avatar.svg"/>
                                            <br/>
                                            @if(!empty($row->user?->name))
                                                توسط
                                                {{ $row->user->name }}
                                                <br/>
                                            @endif
                                            {{ jdate($row->created_at)->ago() }}
                                        </td>
                                        <td>
                                            <article class="" style="padding:1rem;">
                                                <div class="">
                                                    <a class="block" href="forum/{{$row->slug}}" title="{{$row->title}}">
                                                        <h3>{{$row->title}}</h3>
                                                    </a>
                                                    <div class="" style="font-size:0.9rem; line-height:1.6rem;">{!! $row->content !!}</div>
                                                </div>
                                                <div class="">
                                                    <div class="" style="font-size:0.8rem; text-align:left;margin-top:2rem;">
                                                        @if(!empty($row->user?->name))
                                                            توسط
                                                            {{ $row->user->name }}
                                                            ⟵
                                                        @endif
                                                        {{ jdate($row->created_at)->ago() }}
                                                        {{--                                            <span style="color:#999">|</span>--}}
                                                        {{--                                            پاسخ:--}}
                                                        {{--                                            {{$row->answer}}--}}
                                                    </div>
                                                </div>
                                            </article>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        @empty
                            <div class="no-topic-data">تاپیک وجود ندارد.</div>
                        @endforelse
                    </div>
                    @auth
                    <hr/>
                    <div>
                        <h5 class="my-4">
                            پاسخ به:
                            {{ $posts[0]->title }}
                        </h5>
                    </div>
                    {{ Form::open(array('route' => array('forum.category.topic.create', $posts[0]->id))) }}
                    <div>
                        {{ Form::token() }}
                        {{ Form::textarea('reply', null, ['placeholder'=>'متن پاسخ خود را اینجا بنویسید.', 'class'=> 'w-full', 'style'=>'display:block;', 'autocomplete'=>'off']) }}
                    </div>
                    <div>
                        {{ Form::submit('ثبت', ['class'=> 'w-full btn btn-success', 'style'=>'display:block;']) }}
                    </div>
                    {{ Form::close() }}
                    @else
                        <a class="login-to-reply-a-class" href="{{ url('login?redirect_to=' . urlencode(request()->url())) }}" target="_self">
                            <div class="my-2 login-to-reply-a-class-content">
                                    برای نوشتن پاسخ یا طرح سؤال جدید لطفا لاگین کنید
                            </div>
                        </a>
                    @endauth
                </div>
                <div class="partials-social-networks-container-in-replies">
                @include('web.pages.forum.partials.aside')
                </div>
                <div class="aria-clearfix"></div>
            </div>
        </div>
    </div>
@endsection
