@extends('layouts.errors')

@section('title', 'خطای ۴۱۹')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@section('content')

    <div class="toolbars hidden">
        <div class="toolbar">
            <div class="title">
                <i class="icn fill" style="background-image: url(/icons/frown.svg);"></i>
                <h1>خطای ۴۱۹ : امنیت ورود به سایت!</h1>
            </div>
        </div>
    </div>

    <div class="index">
        <section class="card error-content e-red">
            <div class="txt-title">۴۱۹</div>
            <p>امنیت ورود به سایت!</p>
            <hr>
            <p class="mt-2">
            دوست عزیز! به نظر می‌رسد درخواست ورود به سایت به مشکل برخورید،
            <br>
            ما به شما کمک می‌کنیم تا از اینجا به بیرون بروید.
            </p>
            <a href="{{ route('home') }}">صفحه اصلی</a>
            <a href="{{ route('contact') }}">تماس با ما</a>
        </section>
    </div>

@endsection
