@extends('layouts.app')

@section('title',' تغییر رمز عبور کاربری | داشبورد')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@section('content')
<div class="main-content">
    <div class="col">
        <div class="toolbars hidden">
            <div class="toolbar">
                <div class="title">
                    <i class="icn fill" style="background-image: url(/icons/user.svg);"></i>
                    <h1>تغییر رمز عبور کاربری "{{Auth::user()->username}}"</h1>
                </div>

                @can('admin_view')
                    <a class="btn btn-update text-white bold" href="{{ route('admin.permissions.index') }}"><i class="icn white" style="background-image: url(/icons/lock.svg);"></i>مجوز دسترسی‌ها</a>
                @endcan

                @can('admin_view')
                    <a class="btn btn-update text-white bold" href="{{ route('admin.roles.index') }}"><i class="icn white" style="background-image: url(/icons/life-buoy.svg);"></i>نقش‌ها</a>
                @endcan

                @can('admin_create')
                    <a class="btn btn-success bold" href="{{ route('admin.users.create') }}"><i class="icn white" style="background-image: url(/icons/plus-circle.svg);"></i>کاربران</a>
                @endcan
                <button class="btn btn-success send bold" type="submit" form="Form_edit_password"><i class="icn white" style="background-image: url(/icons/save.svg);"></i>ذخیره</button>
            </div>
        </div>
        <section class="card form-db archive-back-box hidden hide-lo">
        @include('errors.messages')
            <form action="{{ route('admin.auth.change_password') }}" method="POST" enctype="multipart/form-data" id="Form_edit_password">
                @csrf
                @method('PATCH')
                <div class="panel form-is">
                    <div class="box white right">
                        <div class="form-input">
                            <i class="icn fill" style="background-image: url(/icons/user.svg);"></i>
                            <input class="type-text" placeholder="  اسم" title="اسم" type="text" name="username" value="{{Auth::user()->username}}" disabled autocomplete="off">
                            <label class="txt {{ $user->username ? 'active' : '' }}">نام کاربری</label>
                        </div>
                        <div class="form-input">
                            <i class="icn fill" style="background-image: url(/icons/lock.svg);"></i>
                            <input class="type-text" placeholder="  رمز عبور فعلی" title="رمز عبور فعلی" type="password" name="current_password" value="" autocomplete="off">
                            <label class="txt">رمز عبور فعلی</label>
                        </div>
                        <div class="form-input">
                            <i class="icn fill" style="background-image: url(/icons/lock.svg);"></i>
                            <div class="btn-side-input password-showhide orw" data-action="password" style="background-image: url(/icons/eye.svg);"></div>
                            <input class="type-text" placeholder="  رمز عبور جدید" title="رمز عبور جدید" type="password" name="new_password" value="" autocomplete="off">
                            <label class="txt">رمز عبور جدید</label>
                        </div>
                        <div class="form-input">
                            <i class="icn fill" style="background-image: url(/icons/lock.svg);"></i>
                            <div class="btn-side-input password-showhide orw" data-action="password" style="background-image: url(/icons/eye.svg);"></div>
                            <input class="type-text" placeholder="  تاییدیه رمز عبور جدید" title="تاییدیه رمز عبور جدید" type="password" name="new_password_confirmation" value="" autocomplete="off">
                            <label class="txt">تاییدیه رمز عبور جدید</label>
                        </div>
                    </div>
                </div>
                <div class="panel form-is">
                    <div class="box white">
                        <div class="form-input select-disable-theme">
                            <label style="margin-bottom:10px;">ابزار</label>
                            <div class="btn btn-popup btn-popup-success text-black bold btn-w-full" data-popup="password">تولید رمز تصادفی</div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
</div>
@endsection

@push('popup')
@include('admin.pages.users.partials.popup')
@endpush
