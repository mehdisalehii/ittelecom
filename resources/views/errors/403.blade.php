@extends('layouts.errors')

@section('title', 'خطای ۴۰۳')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@section('content')

    <div class="toolbars hidden">
        <div class="toolbar">
            <div class="title">
                <i class="icn fill" style="background-image: url(/icons/frown.svg);"></i>
                <h1>خطای ۴۰۳ : دسترسی بخش داشبورد</h1>
            </div>
        </div>
    </div>

    <div class="index">
        <section class="card error-content e-red">
            <div class="txt-title">۴۰۳</div>
            <p data-title="Access to this resource on the server is denied">دسترسی بخش داشبورد</p>
            <hr>
            <p class="mt-2" data-title="Sorry !! You are Unauthorized to view dashboard !">
                دسترسی به این بخش مجاز نمی‌باشد.
            </p>
            <a href="{{ route('home') }}">بازگشت به صفحه اصلی</a>

        @auth('web')
            <a href="{{ route('admin.dashboard') }}">داشبورد</a>
        @endauth

        @guest('web')
            <a href="{{ route('admin.login') }}">ورود به داشبورد</a>
        @endguest

        </section>
    </div>

@endsection
