@extends('layouts.errors')

@section('title', 'خطای ۴۰۴')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@section('content')

    <div class="toolbars hidden">
        <div class="toolbar">
            <div class="title">
                <i class="icn fill" style="background-image: url(/icons/frown.svg);"></i>
                <h1>خطای ۴۰۴ : آدرس موردنظر یافت نشد!</h1>
            </div>
        </div>
    </div>

    <div class="index">
        <section class="card error-content e-blue">
            <div class="txt-title">۴۰۴</div>
            <p>آدرس مورد نظر یافت نشد</p>
{{--            <hr>--}}
{{--            <p class="mt-2">--}}
{{--            دوست عزیز! به نظر می‌رسد که در بین صفحات گم شده‌اید،--}}
{{--            <br>--}}
{{--            ما به شما کمک می‌کنیم تا از اینجا به بیرون بروید.--}}
{{--            </p>--}}
            {{-- <a href="{{ route('home') }}">بازگشت به صفحه اصلی</a> --}}
            <a href="#" class="back-page">بازگشت به صفحه قبلی</a>
            <a href="{{ route('shop') }}">فروشگاه</a>
        </section>
    </div>

@endsection
