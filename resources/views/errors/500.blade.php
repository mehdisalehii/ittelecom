@extends('layouts.errors')

@section('title', 'خطای ۵۰۰')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@section('content')
    <div class="index">
        <section class="card error-content e-blue">
            <div class="txt-title">۵۰۰</div>
            <p>خطای سرور!</p>
            <hr>
            <a href="{{ route('home') }}">بازگشت به صفحه اصلی</a>
            <a href="{{ route('shop') }}">فروشگاه</a>
        </section>
    </div>
@endsection
