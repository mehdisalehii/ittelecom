@extends('amp.layouts.app')

@php
    $title = $topic->title;
    $excerpt = preg_replace( "/\r|\n|\t/", "", mb_substr( strip_tags( str_replace('   ','',$topic->content)) ,0,250, "utf-8") . '‍...');
@endphp

@section('title', $title )
@section('web_robots', $topic->robots ) 
@section('web_description', $excerpt ) 

@section('content')

<aside class="gray">

    <div class="lists-pd col-m-12" style="border-top: 0;">

        <div class="header-title">
            <h1 class="title-txt">{{$title}}</h1>
        </div>

        <article class="box no-header item title-centered" id="item">

            <div class="content-desc">
                <div class="desc">
                    <h3>{{$title}}</h3>
                    {!! $topic->content !!}
                </div>
            </div>

            <div class="txt bold">جواب‌ها:</div>

            <ul class="lists">
            @foreach($answer as $row_ans)
                @if( $row_ans->parent_id == $topic->id )
                <li>
                    <div class="content-desc">
                        <div class="desc ">{!! $row_ans->content !!}</div>
                    </div>
                </li>
                @endif
            @endforeach

            @if(!$answer->isEmpty())
                <li class="desc">جوابی برای این تاپیک داده نشده است.</li>
            @endif

            </ul>
            
        </article>

    </div>

</aside>

@endsection