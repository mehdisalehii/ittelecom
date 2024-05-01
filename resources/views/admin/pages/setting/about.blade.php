@extends('layouts.app')

@section('title', 'تنظیمات | درباره سایت')
@section('titleAdmin',' | داشبورد')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@section('content')
<div class="index">
    <div class="box-pan">
        @include('admin.pages.setting.partials.toolbar')

        <div class="panel-mid col-10">

            <section class="card info hidden set-tab-option">

                <div class="nav-side col-2">
                    @include('admin.pages.setting.partials.sidebar')
                </div>

                <div class="form-body">

                    <div class=" title-ht toolbar">
                        <i class="icn fill" style="background-image: url(/icons/settings-2.svg);"></i>
                        <h1 class="text-right">درباره سایت</h1>
                    </div>

                    <form action="{{ route('admin.settings.post.about') }}" method="POST" id="Form_Save">
                    @csrf
                        <label>توضیح فوتر</label>
                        <textarea class="input-form text-black" placeholder="توضیح فوتر" name="set_about_footer" type="text" cols=1 rows=5>{{$set_about_footer}}</textarea>
                        <label>توضیحات کامل درباره سایت</label>
                        <textarea class="input-form text-black" placeholder="توضیحات کامل درباره سایت" name="set_description" type="text" autocomplete="off" cols=1 rows=20>{{$set_description}}</textarea>
                        <textarea class="input-form text-black" placeholder="توضیحات کامل درباره سایت" name="set_description" type="text" autocomplete="off" cols=1 rows=20>{{$set_description}}</textarea>
                    </form>
                </div>

            </section>
        </div>

    </div>
</div>
@endsection
