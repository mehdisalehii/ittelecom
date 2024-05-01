@extends('layouts.forum')

@section('web_type', 'Forum' )
@section('title','نقد و بررسی')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')
@section('web_robots', 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' )
@section('web_description', 'مرجع نقد و بررسی و فروش محصولات شبکه ، دوربین مدار بسته و فیبرنوری' )
@section('main-head-section')
    <div style="background: url('/assets/forum/header_dark_small.png'); width:100%; height:900px; background-size:cover; position:relative;">
        <div style="text-align:center; color:#fff; position: absolute; left: 50%; top: 50%; -webkit-transform: translate(-50%, -50%); transform: translate(-50%, -50%);">
            <div>
                <h1>
                    به انجمن سایت آی تی تلکام خوش آمدید
                </h1>
                <p class="my-4">
                    کلیه حقوق این سایت متعلق به فروشگاه اینترنتی آی‌تی‌تلکام (آرمان تجارت هوشمند اهورا) می‌باشد.
                </p>
                <div style="position:relative;">
                    <div>
                        <input class="search-input" type="text" placeholder="جست و جو ..." style="width:100%;" value="" autocomplete="false">
                    </div>
                    <div class="resultDiv" style="background:#fff;max-height:300px; overflow-x:hidden; overflow-y:scroll;">
                        <div class="aria-clearfix"></div>
                        <div class="res-pop">
                            <ul class="result-p resultaj"></ul>
                        </div>
                        <div class="aria-clearfix"></div>
                    </div>
                </div>
                @guest
                    <div class="my-4" style="text-align:right;">
                        <div style="height:8px"></div>
                        <a href="/login" class="forum-header-links first-link">
                            عضو انجمن شوید
                        </a>
                        <a href="/login" class="forum-header-links second-link">
                            اگر قبلا عضو هستید لاگین کنید
                        </a>
                        <div class="aria-clearfix"></div>
                    </div>
                @endguest
            </div>
        </div>
        <div class="forum-header-bottom">
            <div class="forum-header-flex">
                <div class="forum-header-flex-items">
                    تعداد موضوعات مطرح شده
                    <br/>
                    {{ $data['countQuestions'] }}
                </div>
                <div class="forum-header-flex-items">
                    تعداد کل پیام‌ها
                    <br/>
                    {{ $data['countAnswers'] }}
                </div>
                <div class="forum-header-flex-items">
                    تعداد افراد عضو انجمن
                    <br/>
                    {{ $data['countUsers'] }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="col-full ui-part-full">
        <div style="height:40px;"></div>
        <div class="lists">
            <div class="lists-pan archive-col-s-12">
                <div class="archive index">
                    <ul class="box-ter grid grid-1 gap-3">
                        @foreach($category_forum as $row)
                            <li class="cat-topic list">
                                <section class="card box">
                                    <div class="pan thumb">
                                        <a class="display-bock " href="forum/cats/{{$row->slug}}" title="{{$row->title}}">
                                            <img class="col-u-12 thumb" src="/generated/images/assets-forum/280x280/{{$row->thumb}}.webp" alt="{{$row->title}}" width=300 height=300>
                                            <span>{{$row->title}}</span>
                                        </a>
                                    </div>
                                </section>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- @include('web.pages.forum.partials.sidebar') --}}

            </div>
        </div>

    </div>
@endsection
