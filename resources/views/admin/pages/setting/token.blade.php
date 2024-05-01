@extends('layouts.app')

@section('title', 'تنظیمات | توکن')
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

                    <form action="{{ route('admin.settings.post.token') }}" method="POST" id="Form_Save">
                    @csrf

                    <div class=" title-ht toolbar">
                        <i class="icn fill" style="background-image: url(/icons/settings-2.svg);"></i>
                        <h1 class="text-right">توکن گوگل</h1>
                    </div>

                    <label>گوگل وریفای</label>
                    <input class="input-form" placeholder="گوگل وریفای" value="{{$set_google_verification}}" name="set_google_verification" type="text">
                    <label>گوگل تگ منجر</label>
                    <input class="input-form" placeholder="گوگل تگ منجر" value="{{$set_google_tagmanager_id}}" name="set_google_tagmanager_id" type="text">


                    <div class=" title-ht toolbar">
                        <i class="icn fill" style="background-image: url(/icons/settings-2.svg);"></i>
                        <h1 class="text-right">توکن یکتانت</h1>
                    </div>

                    <label>آی دی یکتانت</label>
                    <input class="input-form" placeholder="آی دی یکتانت" value="{{$set_yektanet}}" name="set_yektanet" type="text">


                    {{-- <div class=" title-ht toolbar">
                        <i class="icn fill" style="background-image: url(/icons/settings-2.svg);"></i>
                        <h1 class="text-right">توکن هاتجار</h1>
                    </div>
                    <label>آی دی هاتجار</label> --}}


                    <div class=" title-ht toolbar">
                        <i class="icn fill" style="background-image: url(/icons/settings-2.svg);"></i>
                        <h1 class="text-right">توکن کلاریتی</h1>
                    </div>

                    <label>آی دی کلاریتی</label>
                    <input class="input-form" placeholder="آی دی کلاریتی" value="{{$set_clarity}}" name="set_clarity" type="text">


                    <div class=" title-ht toolbar">
                        <i class="icn fill" style="background-image: url(/icons/settings-2.svg);"></i>
                        <h1 class="text-right">توکن پیام رسان</h1>
                    </div>

                    <label>وریفای پیام رسان</label>
                    <input class="input-form" placeholder="وریفای پیام رسان" value="{{$set_sms}}" name="set_sms" type="text">

                    </form>
                </div>
            </section>




        </div>

    </div>
</div>
@endsection
