@extends('layouts.app')

@section('web_type', 'Forum' )
@section('title','تاپیک‌های '. $category->title )
@section('titleWebname',' | '. 'آی‌تی‌تلکام')
@section('web_robots', 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' )
@section('web_description', 'مرجع نقد و بررسی و فروش محصولات شبکه ، دوربین مدار بسته و فیبرنوری' )

@section('content')
<script>
    function scrollTo(hash) {
        location.hash = "#" + hash;
        return false;
    }

    document.addEventListener("DOMContentLoaded", function() {
        var createNewTopicButton = document.getElementById("create-new-topic-button");
        createNewTopicButton.addEventListener("click", function(event) {
            event.preventDefault();
            scrollTo("create-new-topic-title");
            return false;
        });
    });
</script>
    <div class="menubar-page blue-2 scrollbar-horizon">
        <nav class="nav">
            <div class="menu-link menu-back">
                <ul class="menu">
                    <li class="-0"><a class="block active" href="/forum/cats/{{$category->slug}}">
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
                @auth
                    <div class="new-btn">
                        <a href="{{'/login'}}" class="btn btn-border"><i class="icn fill" style="background-image: url(/icons/plus-circle.svg);"></i>ثبت تاپیک جدید</a>
                    </div>
                @endauth
                <div class="archive category col-9 last-bl mb-4">
                    @auth
                    <div class="">
                        <a id="create-new-topic-button" class="btn btn-danger mb-5 float-left" href="javascript:void(0)" target="_self">ایجاد تاپیک جدید</a>
                        <div class="aria-clearfix"></div>
                    </div>
                    @else
{{--                        <div class="">--}}
{{--                            <a class="btn btn-danger mb-5 float-left" href="/login" target="_self">ایجاد تاپیک جدید</a>--}}
{{--                            <div class="aria-clearfix"></div>--}}
{{--                        </div>--}}
                    @endauth
                    @auth
                        {{ Form::open(array('route' => array('forum.category.topic.create', $category->id))) }}
                        {{ Form::token() }}
                        <div class="my-2">
                            {{ Form::text('subject', null, ['placeholder'=>'عنوان تاپیک جدید', 'class'=> 'w-full', 'style'=>'display:block;', 'autocomplete'=>'off']) }}
                        </div>
                        <div class="my-2">
                            {{ Form::textarea('body', null, ['placeholder'=>'متن سؤال یا نقد و بررسی', 'class'=> 'w-full', 'style'=>'display:block;', 'autocomplete'=>'off']) }}
                        </div>
                        <div>
                            {{ Form::submit('ثبت', ['class'=> 'w-full btn btn-success', 'style'=>'display:block;']) }}
                        </div>
                        {{ Form::close() }}
                        <div style="height:1rem;"></div>
                    @else
                            <a class="login-to-reply-a-class" href="{{ url('login?redirect_to=' . urlencode(request()->url())) }}" target="_self">
                                <div class="my-2 login-to-reply-a-class-content">
                                        برای نوشتن پاسخ یا طرح سؤال جدید لطفا لاگین کنید
                                </div>
                            </a>
                        <hr/>
                    @endauth
                    <div class="card">
                        @forelse($cats_forum as $row)
                            <a class="block topics-rows-links" href="forum/{{$row->slug}}" title="{{$row->title}}">
                            <div class="">
                                <article class="" style="padding:1rem; @if(!$loop->last) border-bottom: 1px solid #909090; @endif">
                                    <div class="">
                                            <div class="h-full float-right" style="width:30px; margin:0 0 0 0.6rem;">
                                                <img style="width:100%;" src="/icons/topic-selection.svg" alt="{{ $row->title }}"/>
                                            </div>
                                            <h3>{{$row->title}}</h3>
{{--                                        <div class="" style="font-size:0.9rem; line-height:1.6rem;">--}}
{{--                                            @if(strlen($row->content) > 1000)--}}
{{--                                                {!! mb_substr( strip_tags( str_replace('   ','',$row->content)) ,0,250, "utf-8") !!}...--}}
{{--                                            @else--}}
{{--                                                {!! $row->content !!}--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
                                        <div class="aria-clearfix"></div>
                                    </div>
                                    <div class="" style="font-size:0.8rem; margin-top:0rem;">
                                        <div class="" style="float:right; direction:rtl; ">
                                            @if(!empty($row->user?->name))
                                            توسط
                                            {{ $row->user->name }}
                                            ⟵
                                            @endif
                                            {{ jdate($row->created_at)->ago() }}
                                        </div>
{{--                                        <div class="" style="float:left;">--}}
{{--                                            تعداد--}}
{{--                                            پاسخ‌ها:--}}
{{--                                            {{$row->answer}}--}}
{{--                                        </div>--}}
                                        <div class="aria-clearfix"></div>
                                    </div>
                                </article>
                            </div>
                            </a>
                        @empty
                            <div class="no-topic-data">تاپیک وجود ندارد.</div>
                        @endforelse
                    </div>
                </div>
                <div class="partials-social-networks-container-in-forums">
                @include('web.pages.forum.partials.aside')
                </div>
                <div class="aria-clearfix"></div>
            </div>
        </div>
    </div>
@endsection
