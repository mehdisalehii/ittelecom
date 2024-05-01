@extends('amp.layouts.app')

@section('title', '')

@section('web_robots', 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' )
@section('web_description', 'مرجع نقد و بررسی و فروش محصولات شبکه ، دوربین مدار بسته و فیبرنوری' )
@section('web_type', 'website' )
@section('web_date', date('Y-m-d\TH:i:s+03:00') )
@section('web_size_w', '1765')
@section('web_size_h', '505' )

@section('schema_org')
{{-- @include('web.inc.schema.app') --}}
@endsection

@section('content')

<div class="wrapped">

    <x-app.navlist></x-app.navlist>

    <div class="sidebar">
        <ul class="social col-m-12">
        <li><a class="block red" href="//instagram.com/ittelecomco" title="اینستاگرام" itemprop="url"><i class="icn" style="background-image: url('/icons/instagram.svg')"></i>اینستاگرام</a></li>
        <li><a class="block blue" href="//t.me/Parhammee" title="تلگرام" itemprop="url"><i class="icn" style="background-image: url('/icons/telegram.svg')"></i>کانال تلگرام</a></li>
        </ul>
    </div>

    <aside class="ados-v">
        <div class="title-wcd bold">مشاوره تلفنی با متخصصین شبکه و فیبر نوری</div>
        <div class="title-wcd bold">می‌توانید با شماره زیر تماس بگیرید.</div>
        <div class="title-wcd bold ltr"><a class="ltr" href="tel:+982144446012">۰۲۱-۴۴۴۴۶۰۱۲</a></div>
        <i class="icn" style="background-image:url(/icons/phone-call.svg)"></i>
    </aside>


    <aside class="red-2 padd-10 topoif">

        <div class="lists-pd first col-m-12">
            <div class="head box">

                <div class="h1 bold">
                    <span class="txt"><i class="icn block fill" style="background-image:url('/icons/twitch.svg');"></i>جدیدترین تاپیک‌ها</span>
                </div>

                <ul class="category lists-s">
                @php $i_numb=1; @endphp
                @foreach($topic_last as $row)
                    @if ( $row->title )
                        @if (mb_strlen( $row->title ) > 25)
                            @php $title = mb_substr( $row->title ,0,25, "utf-8").'...'; @endphp
                        @else
                            @php $title = $row->title; @endphp
                        @endif
                    @endif

                    <li class="topic list">
                        <a class="block" href="forum/{{$row->slug}}/amp" title="{{$row->title}}">
                            <i class="icn block black" style="background-image:url('/icons/arrow-up-left.svg');"></i>
                            <div class="txt">{{$title}}</div>
                        </a>
                    </li>
                    @php $i_numb++; @endphp
                @endforeach

                </ul>
            </div>
        </div>
        <div class="lists-pd last col-m-12">
            <div class="head box">

                <div class="h1 bold">
                    <span class="txt"><i class="icn block fill" style="background-image:url('/icons/package.svg');"></i>انبار تاپیک‌ها</span>
                </div>

                <ul class="category lists-s">
                @php $i_numb=1; @endphp
                @foreach($topic_visited as $row)
                    @if ( $row->title )
                        @if (mb_strlen( $row->title ) > 25)
                            @php $title = mb_substr( $row->title ,0,25, "utf-8").'...'; @endphp
                        @else
                            @php $title = $row->title; @endphp
                        @endif
                    @endif

                    <li class="topic list">
                        <a class="block" href="forum/{{$row->slug}}/amp" title="{{$row->title}}">
                            <i class="icn block black" style="background-image:url('/icons/arrow-up-left.svg');"></i>
                            <div class="txt">{{$title}}</div>
                        </a>
                    </li>
                    @php $i_numb++; @endphp
                @endforeach

                </ul>
            </div>
        </div>

    </aside>

</div>
@endsection
