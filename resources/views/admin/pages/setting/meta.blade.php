@extends('layouts.app')

@section('title', 'تنظیمات | متاها')
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
                        <h1 class="text-right">متاها</h1>
                    </div>

                    <form action="{{ route('admin.settings.post.meta') }}" method="POST" id="Form_Save">
                    @csrf
                        <label>زبان سایت</label>
                        <input class="input-form" placeholder="زبان سایت" value="{{$set_language}}" name="set_language" type="text" autocomplete="off">
                        <div class="form-input box">
                            <label style="margin-bottom:10px;">ربات اصلی</label>
                            <div class="form-radio form-group-item last select-mid">
                            <select class="selectoption sku-get" autocomplete="off" name="set_robots">
                                <option value="noindex‌,nofollow" {{ $set_robots== 'noindex‌,nofollow' ? 'selected' : '' }}> noindex‌, nofollow</option>
                                {{-- <option value="noindex,nofollow,noarchive,noimageindex,nosnippet" {{ $set_robots== 'noindex,nofollow,noarchive,noimageindex,nosnippet' ? 'selected' : '' }}>noindex, nofollow, noarchive, noimageindex, nosnippet</option> --}}
                                <option value="index‌,follow" {{ $set_robots== 'index‌,follow' ? 'selected' : '' }}> index‌, follow</option>
                            </select>
                            </div>
                        </div>
                        <label>واحد پول</label>
                        <input class="input-form" placeholder="واحد پول" value="{{$set_unit}}" name="set_unit" type="text" autocomplete="off">
                        <label>کپی رایت</label>
                        <input class="input-form" placeholder="کپی رایت" value="{{$set_copyright}}" name="set_copyright" type="text" autocomplete="off">
                    </form>
                </div>

            </section>
        </div>

    </div>
</div>
@endsection
