@extends('layouts.app')

@section('title', 'تنظیمات | مپ گوگل')
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
                        <h1 class="text-right">کانفیگ مپ گوگل</h1>
                    </div>

                    <form action="{{ route('admin.settings.post.map') }}" method="POST" id="Form_Save">
                    @csrf
                        <label>طول جغرافیایی</label>
                        <input class="input-form" placeholder="طول جغرافیایی" value="{{$set_map_latitude}}" name="set_map_latitude" type="text" autocomplete="off">
                        <label>عرض جغرافیایی</label>
                        <input class="input-form" placeholder="عرض جغرافیایی" value="{{$set_map_longitude}}" name="set_map_longitude" type="text" autocomplete="off">
                        <label>آدرس جغرافیایی گوگل</label>
                        <input class="input-form" placeholder="آدرس جغرافیایی گوگل" value="{{$set_map_address}}" name="set_map_address" type="text" autocomplete="off">
                        <label>آدرس مپ گوگل</label>
                        <input class="input-form" placeholder="آدرس مپ گوگل" value="{{$set_map_url}}" name="set_map_url" type="text" autocomplete="off">
                    </form>
                </div>
            </section>
        </div>

    </div>
</div>
@endsection
