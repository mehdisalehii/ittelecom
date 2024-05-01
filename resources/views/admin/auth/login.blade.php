@extends('layouts.app')

@section('title',' ورود به داشبورد')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@section('content')
     <div class="login-area">
        <div class="container" style="padding-top: 10rem;">
            <div class="aside-box">
                <aside class="card login-box">
                    <form method="POST" action="{{ route('login') }}" class="block">
                        @csrf
                        <div class="hidden">
                            <input type="hidden" value="{{ request()->get('redirect_to') }}" name="redirect_to" autocomplete="off">
                        </div>
                        <div class="login-form-head">
                            <div class="h4"><i class="icn white" style="background-image: url(/icons/user.svg);"></i>ورود به داشبورد</div>
                            <p class="text-right">برای استفاده از خدمات آی‌تی‌تلکام، باید وارد سایت شوید.</p>
                            <div class="bot ere">
                                <a class="btn white" href="/register">ثبت‌نام نکرده‌ام</a>
                            </div>
                        </div>
                        <div class="login-form-body">
                            @include('errors.messages')
                            <div class="form-gp">
                                <input type="text" placeholder="نام کاربری" name="username" class="input-form">
                            </div>

                            {{-- @error('username')
                                <div class="form-gp invalid-feedback">{{ $errors->first('username') }}</div>
                            @enderror --}}

                            <div class="form-gp">
                                <div class="btn-side-input password-showhide" data-action="password" style="background-image: url(/icons/eye.svg);"></div>
                                <input type="password" placeholder="رمز عبور" name="password" class="input-form action">
                            </div>

                            {{-- @error('password')
                                <div class="form-gp invalid-feedback">{{ $errors->first('password') }}</div>
                            @enderror --}}

                            <div class="submit-btn-area">
                                <button class="btn btn-default login-submit-btn" type="submit">ورود به پنل</button>
                            </div>
                            <div class="row mb-4 rmber-area">
                                <div class="col-6">
                                    <div class="custom-control custom-checkbox mr-sm-2">
                                        <input type="checkbox" class="custom-control-input" id="customControlAutosizing" name="remember">
                                        <label class="custom-control-label" for="customControlAutosizing">مرا به خاطر بسپار!</label>
                                    </div>
                                </div>

                                {{-- @if(env('MAIL_USERNAME') != null && env('MAIL_PASSWORD') != null)
                                    <div class="col-sm-6">
                                        <div class="checkbox pad-btm text-right">
                                            <a href="{{ route('password.request') }}" class="btn-link">{{__('Forgot password')}} ?</a>
                                        </div>
                                    </div>
                                @endif --}}

                                {{-- <div class="col-6"><a href="#">بازیابی رمز عبور</a></div>  --}}
                            </div>
                        </div>
                    </form>
                </aside>
            </div>
        </div>
    </div>
@endsection

@push('css')
@endpush
