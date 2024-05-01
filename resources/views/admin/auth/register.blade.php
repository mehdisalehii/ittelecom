@extends('layouts.app')

@section('title','ثبت نام کاربران')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@section('content')
     <div class="login-area">
        <div class="container">
            <div class="aside-box">
                <aside class="card login-box register">
                    <form method="POST" action="{{ route('register') }}" class="col-12">
                        @csrf
                        <div class="login-form-head">
                            <div class="h4"><i class="icn white" style="background-image: url(/icons/user-plus.svg);"></i>ثبت نام کاربران</div>
                            <p class="text-right">برای استفاده از خدمات آی‌تی‌تلکام، باید عضو سایت شوید.</p>
                            <div class="bot ere">
                                <a class="btn white" href="/login">ورود به سایت</a>
                            </div>
                        </div>
                        <div class="login-form-body">

                            {{-- @include('errors.messages') --}}

                            <div class="form-gp">
                                <input type="text" placeholder="نام کاربری" name="username" class="input-form" autocomplete="on">
                            </div>

                            {{-- @if ($errors->has('username')) --}}
                            @error('username')
                                <div class="form-gp invalid-feedback">{{ $errors->first('username') }}</div>
                            @enderror

                            <div class="form-gp">
                                <input type="text" placeholder="ایمیل کاربری" name="email" class="input-form" autocomplete="on">
                            </div>

                            {{-- @if ($errors->has('username')) --}}
                            @error('email')
                                <div class="form-gp invalid-feedback">{{ $errors->first('email') }}</div>
                            @enderror

                            {{-- <div class="form-gp">
                                <input type="text" placeholder="شماره موبایل (912XXXXXXX)" name="mobile"
                                       class="input-form input-mobile-gracy number-input number-required" min="10" maxlength="11" required="required" autocomplete="on">
                                <button type="button" class="btn-side btn-mobile-gracy cruy hidden"
                                        id="sendVerifyCode">دریافت کد تاییدیه
                                </button>
                            </div> --}}

                            {{-- @error('mobile')
                                <div class="form-gp invalid-feedback">{{ $errors->first('mobile') }}</div>
                            @enderror --}}

                            {{-- <div class="form-gp hidden box-relative box-mobile-gracy">
                                <input type="text" placeholder="کد تاییدیه" name="gracy"
                                       class="input-form input-mobile-cruy" autocomplete="off">
                                <button type="button" class="btn-side btn-mobile-gracy" id="checkVerifyCode">بررسی کد
                                    تاییدیه
                                </button>
                            </div> --}}

                            {{-- @error('gracy')
                                <div class="form-gp invalid-feedback">{{ $errors->first('gracy') }}</div>
                            @enderror --}}

                            <div class="form-gp">
                                <div class="btn-side-input password-showhide" data-action="password" style="background-image: url(/icons/eye.svg);"></div>
                                <input type="password" placeholder="رمز عبور" name="password" class="input-form action">
                            </div>

                            @error('password')
                                <div class="form-gp invalid-feedback">{{ $errors->first('password') }}</div>
                            @enderror

                            <div class="form-gp">
                                <div class="btn-side-input password-showhide" data-action="password" style="background-image: url(/icons/eye.svg);"></div>
                                <input type="password" placeholder="تاییدیه رمز عبور" name="confirm_password" class="input-form action">
                            </div>

                            @error('confirm_password')
                                <div class="form-gp invalid-feedback">{{ $errors->first('confirm_password') }}</div>
                            @enderror

                            <div class="form-gp captcha">
                                <input id="captcha" name="captcha" type="text" class="input-form action" placeholder="کد تاییدیه امنیتی" autocomplete="off">
                                <div class="form-ab captcha">
                                    <img class="captcha thumb" src="{{ captcha_src() }}" alt="کد تاییدیه امنیتی">
                                </div>
                                <div class="btn-side-input btn-captcha" title="کد تازه" data-action="password" style="background-image: url(/icons/refresh-cw.svg);"></div>
                            </div>

                            @error('captcha')
                                <div class="form-gp invalid-feedback">{{ $errors->first('captcha') }}</div>
                            @enderror

                            <button id="form_submit" class="btn btn-default login-submit-btn" type="submit">ثبت نام<i class="ti-arrow-right"></i></button>

                        </div>
                    </form>
                </aside>
            </div>
        </div>
    </div>
@endsection

@push('css')
<style>main .alert{display:none}main .content .alert{display:block}</style>
@endpush
