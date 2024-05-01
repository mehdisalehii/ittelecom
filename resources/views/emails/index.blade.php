@extends('layouts.app')

@section('title', 'فعالسازی حساب ')
@section('titleWebname', ' | '.  'فروشگاه اینترنتی آی‌تی‌تلکام' )

@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@section('body_class','verify')
@section('web_type', 'website' )
{{-- @section('web_amp', route('home').'/amp' ) --}}

@section('content')

<div class="lists index">

    @include('errors.messages')

    <div class="panel-mid stat show">
        <aside class="card bold etra paragraph">
            <h2>هشدار!</h2>
            <p>ایمیل شما فعالسازی نشده است. جهت فعالسازی یک لینک وریفای را به ایمیل صندوق پستی یا صندوق اسپم <b>{{$email}}</b> ارسال کردیم. لطفا آن لینک را فعالسازی کنید.</p>
            <p>فقط یکبار ایمیل خود را تایید نمایید ، کمتر از ۱۰ ثانیه وقت شما را می‌گیرد!</p>
            <br>
            <hr>
            <br>
            <p>اگر ایمیل تان پیامی را دریافت نکرده اید، می‌توانید دکمه زیر را کلیک کنید و فعالسازی کنید.</p>
            <br>

            <button class="btn btn-success text-white send loadfer" title="لینک فعالسازی" form="Form_Save">لینک فعالسازی را دوباره بفرست!</button>
            <div class="bt-fr otw hidden">
            <form class="hidden" action="{{ route('again.verify') }}" method="POST" id="Form_Save">
            @csrf
            </form></div>

        </aside>
    </div>

</div>

@endsection
