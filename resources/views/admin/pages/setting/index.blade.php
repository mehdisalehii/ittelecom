@extends('layouts.app')

@section('title', 'تنظیمات | عنوان')
@section('titleAdmin',' | داشبورد')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@section('content')
<div class="index">
    <div class="box-pan">
        @include('admin.pages.setting.partials.toolbar')
        @include('errors.messages')

        <div class="panel-mid col-10">

            <section class="card info hidden set-tab-option">

                <div class="nav-side col-2">
                    @include('admin.pages.setting.partials.sidebar')
                </div>

                <div class="form-body col-6">
                    <div class=" title-ht toolbar">
                        <i class="icn fill" style="background-image: url(/icons/settings-2.svg);"></i>
                        <h1 class="text-right">عنوان</h1>
                    </div>

                    <form action="{{ route('admin.settings.post.index') }}" method="POST" id="Form_Save">
                    @csrf
                        <label>عنوان سایت صفحه اصلی</label>
                        <input class="input-form @can('seo_view'){{'disabled'}}@endcan" placeholder="عنوان سایت صفحه اصلی" value="{{$set_name}}" name="set_name" type="text" autocomplete="off" @can('seo_view'){{' disabled=""'}}@endcan>
                        <label>عنوان کوتاه و مختصر</label>
                        <input class="input-form @can('seo_view'){{'disabled'}}@endcan" placeholder="عنوان کوتاه و مختصر" value="{{$set_page}}" name="set_page" type="text" autocomplete="off" @can('seo_view'){{' disabled=""'}}@endcan>
                        <label>عنوان تجاری</label>
                        <input class="input-form @can('seo_view'){{'disabled'}}@endcan" placeholder="عنوان تجاری" value="{{$set_bussiness}}" name="set_bussiness" type="text" autocomplete="off" @can('seo_view'){{' disabled=""'}}@endcan>
                        <label>عنوان برند</label>
                        <input class="input-form @can('seo_view'){{'disabled'}}@endcan" placeholder="عنوان برند" value="{{$set_brand}}" name="set_brand" type="text" autocomplete="off" @can('seo_view'){{' disabled=""'}}@endcan>
                    </form>
                </div>

            </section>
        </div>

    </div>
</div>
@endsection
