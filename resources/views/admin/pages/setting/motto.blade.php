@extends('layouts.app')

@section('title', 'تنظیمات | شعار سایت')
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

                <div class="form-body col-6">

                    <div class=" title-ht toolbar">
                        <i class="icn fill" style="background-image: url(/icons/settings-2.svg);"></i>
                        <h1 class="text-right">شعار سایت</h1>
                    </div>

                    <form action="{{ route('admin.settings.post.motto') }}" method="POST" id="Form_Save">
                    @csrf
                        <label>شعار فوتر به فارسی</label>
                        <input class="input-form" placeholder="شعار به فارسی" value="{{$set_motto_fa}}" name="set_motto_fa" type="text" autocomplete="off">
                        <label>شعار فوتر به انگلیسی</label>
                        <input class="input-form" placeholder="شعار به انگلیسی" value="{{$set_motto_en}}" name="set_motto_en" type="text" autocomplete="off">
                        <label>تبلیغ مشاوره در صفحه اصلی</label>
                        <input class="input-form" placeholder="تبلیغ مشاوره" value="{{$set_confer}}" name="set_confer" type="text" autocomplete="off">
                        <label>کپی رایت در فوتر</label>
                        <input class="input-form" placeholder="کپی رایت فوتر" value="{{$set_footer_copyright}}" name="set_footer_copyright" type="text" autocomplete="off">
                    </form>
                </div>

            </section>
        </div>

    </div>
</div>
@endsection
