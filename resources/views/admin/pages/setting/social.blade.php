@extends('layouts.app')

@section('title', 'تنظیمات | شبکه اجتماعی')
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
                        <h1 class="text-right">شبکه اجتماعی</h1>
                    </div>

                    <form action="{{ route('admin.settings.post.social') }}" method="POST" id="Form_Save">
                    @csrf
                        <label>فیسبوک</label>
                        <input class="input-form" placeholder="فیسبوک" value="{{$set_facebook}}" name="set_facebook" type="text" autocomplete="off">
                        <label>توییتر</label>
                        <input class="input-form" placeholder="توییتر" value="{{$set_twitter}}" name="set_twitter" type="text" autocomplete="off">
                        <label>اینستاگرام</label>
                        <input class="input-form" placeholder="اینستاگرام" value="{{$set_instagram}}" name="set_instagram" type="text" autocomplete="off">
                        <label>لینکدین</label>
                        <input class="input-form" placeholder="لینکدین" value="{{$set_linkedin}}" name="set_linkedin" type="text" autocomplete="off">
                        <label>تلگرام</label>
                        <input class="input-form" placeholder="تلگرام" value="{{$set_telegram}}" name="set_telegram" type="text" autocomplete="off">
                        <label>اپارات</label>
                        <input class="input-form" placeholder="اپارات" value="{{$set_aparat}}" name="set_aparat" type="text" autocomplete="off">
                        <label>پینترست</label>
                        <input class="input-form" placeholder="ggggg" value="{{$set_pinterest}}" name="set_pinterest" type="text" autocomplete="off">
                    </form>
                </div>

            </section>
        </div>

    </div>
</div>
@endsection
