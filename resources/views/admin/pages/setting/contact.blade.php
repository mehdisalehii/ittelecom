@extends('layouts.app')

@section('title', 'تنظیمات | تماس')
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

                    <form action="{{ route('admin.settings.post.contact') }}" method="POST" id="Form_Save">
                    @csrf

                    <div class=" title-ht toolbar">
                        <i class="icn fill" style="background-image: url(/icons/settings-2.svg);"></i>
                        <h1 class="text-right">شرکت</h1>
                    </div>

                    <label>ساعت کاری</label>
                    <input class="input-form" placeholder="ساعت کاری" value="{{$set_work_time}}" name="set_work_time" type="text" autocomplete="off">
                    <label>نشانی</label>
                    <input class="input-form" placeholder="نشانی" value="{{$set_address}}" name="set_address" type="text" autocomplete="off">
                    <label>کد پستی</label>
                    <input class="input-form" placeholder="کد پستی" value="{{$set_postal}}" name="set_postal" type="text" autocomplete="off">


                    <div class=" title-ht toolbar">
                        <i class="icn fill" style="background-image: url(/icons/settings-2.svg);"></i>
                        <h1 class="text-right">راه ارتباطی</h1>
                    </div>

                    <label>ایمیل</label>
                    <input class="input-form" placeholder="ایمیل" value="{{$set_email}}" name="set_email" type="text" autocomplete="off">
                    <label>شماره تلفن</label>
                    <input class="input-form" placeholder="شماره تلفن" value="{{$set_telephone}}" name="set_telephone" type="text" autocomplete="off">
                    <label>شماره فکس</label>
                    <input class="input-form" placeholder="شماره فکس" value="{{$set_fax}}" name="set_fax" type="text" autocomplete="off">
                    <label>شماره موبایل</label>
                    <input class="input-form" placeholder="شماره موبایل" value="{{$set_mobile}}" name="set_mobile" type="text" autocomplete="off">
                    <label>آی دی اسکایپ</label>
                    <input class="input-form" placeholder="آی دی اسکایپ" value="{{$set_skype_id}}" name="set_skype_id" type="text" autocomplete="off">
                    <label>آی دی تلگرام</label>
                    <input class="input-form" placeholder="آی دی تلگرام" value="{{$set_telegram_id}}" name="set_telegram_id" type="text" autocomplete="off">

                    </form>

                </div>
            </section>


        </div>

    </div>
</div>
@endsection
