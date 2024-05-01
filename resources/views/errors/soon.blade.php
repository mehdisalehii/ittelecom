@extends('layouts.app')

@section('title', 'بزودی')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@section('content')
    <div class="toolbars hidden">
        <div class="toolbar">
            <div class="title">
                <i class="icn fill" style="background-image: url(/icons/frown.svg);"></i>
                <h1>بزودی : بزودی این صفحه می‌آید!</h1>
            </div>
        </div>
    </div>

    <section class="card error-content e-blue">
        <div class="txt-title">بزودی</div>
        <p>زیاد منتظر این صفحه نباش، ولی بزودی می‌آید، دلبندم!</p>
        <hr>
        <a href="{{ route('home') }}">بازگشت به صفحه اصلی</a>
        <a href="{{ route('shop') }}">فروشگاه</a>
    </section>
@endsection
