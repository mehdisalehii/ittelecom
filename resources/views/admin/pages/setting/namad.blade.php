@extends('layouts.app')

@section('title', 'تنظیمات | نمادها')
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

                    <form action="{{ route('admin.settings.post.namad') }}" method="POST" id="Form_Save">
                    @csrf

                    <div class=" title-ht toolbar">
                        <i class="icn fill" style="background-image: url(/icons/settings-2.svg);"></i>
                        <h1 class="text-right">نماد الکترونیکی</h1>
                    </div>

                    <label>آدرس e-namad</label>
                    <input class="input-form" placeholder="آدرس e-namad" value="{{$set_enamad_url}}" name="set_enamad_url" type="text">
                    <label>آدرس لوگو e-namad</label>
                    <input class="input-form" placeholder="آدرس لوگو e-namad" value="{{$set_enamad_logo}}" name="set_enamad_logo" type="text">

                    <div class=" title-ht toolbar">
                        <i class="icn fill" style="background-image: url(/icons/settings-2.svg);"></i>
                        <h1 class="text-right">نماد رسانه دیجیتال</h1>
                    </div>

                    <label>آدرس رسانه</label>
                    <input class="input-form" placeholder="آدرس رسانه" value="{{$set_sazmandehi_url}}" name="set_sazmandehi_url" type="text">
                    <label>آدرس لوگو رسانه</label>
                    <input class="input-form" placeholder="آدرس لوگو رسانه" value="{{$set_sazmandehi_logo}}" name="set_sazmandehi_logo" type="text">

                    </form>
                </div>
            </section>


        </div>

    </div>
</div>
@endsection
