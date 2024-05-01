@extends('layouts.app')

@php $title_page = ''; @endphp
@if( URL::current() ==  route('contact') )
    @php $title_page = 'تماس با ما'; @endphp
@endif

@if( URL::current() ==  route('about') )
@php $title_page = 'درباره ما' ; @endphp
@endif

@if( URL::current() ==  route('certificate') )
@php $title_page = 'گواهینامه‌ها' ; @endphp
@endif

@section('web_type', 'article' )

@section('title', $title_page )
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@section('content')
<div class="lists">
    <div class="box-pan">
        <div class="content-page">
            @include('web.inc.breadcrumb.page_info')
            <section class="card info hidden">
                @if( URL::current() ==  route('contact') )
                    @include('web.pages.page.partials.contactus')
                @endif
                @if( URL::current() ==  route('about') )
                    @include('web.pages.page.partials.aboutus')
                @endif
                @if( URL::current() ==  route('certificate') )
                    @include('web.pages.page.partials.certificates')
                @endif
            </section>
        </div>
    </div>
</div>
@endsection
