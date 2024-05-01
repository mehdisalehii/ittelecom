<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>فعالسازی حساب کاربری</title>
</head>
<body style="direction:rtl">

{{-- @php
    $username="UserName"; $password="Password"; $token="sdfsdREFFSDXCXXZc"
@endphp --}}

    <div style="border:1px solid #9f9f9f;border-radius:15px;padding:0;overflow: hidden;">

        <div style="text-align:center;padding:30px 0;background:#e9e9e9;">
            <a href="{{route('home')}}" title="فروشگاه اینترنتی آی‌تی‌ تلکام" >
                <img src="{{route('home')}}/assets/logo/logo.svg" width="200">
            </a>
        </div>

        <div style="padding:15px">

            <h1>فعالسازی حساب کاربری</h1>

            <h2>با سلام ؛ {{ $username }} عزیز ، به سایت {{ 'آی‌تی‌تلکام' }} خوش آمدی!</h2>

            <p>برای شروع می‌توانید بر روی گزینه "فعالسازی حساب" کلیک کنید.</p>

            <a href="{{ route('user.verify', $token) }}" style="background:#08c;color:#fff;padding:5px 15px;border-radius:15px">فعالسازی حساب</a>

            <br><br>

            <hr>

            <p>اگر لینک بالا کار نکرد، می‌توانید لینک زیر را کپی کنید و در مرورگر دیگری را باز کنید.</p>

            <p><a href="{{ route('user.verify', $token) }}">{{ route('user.verify', $token) }}</a></p>

            <hr>

            <p>ما را در شبکه‌های اجتماعی دنبال کنید.</p>

            <ul class="links-wcd bold">
{{--                @if (\App\Models\Setting::where('name', 'facebook')->first()?->value) --}}
{{--                    <li>--}}
{{--                    فیسبوک: <a href="{{\App\Models\Setting::where('name', 'facebook')->first()?->value}}">{{\App\Models\Setting::where('name', 'facebook')->first()?->value}}</a>--}}
{{--                    </li> --}}
{{--                @endif--}}

{{--                @if (\App\Models\Setting::where('name', 'twitter')->first()?->value) --}}
{{--                    <li>--}}
{{--                    تویتتر: <a href="{{\App\Models\Setting::where('name', 'twitter')->first()?->value}}">{{\App\Models\Setting::where('name', 'twitter')->first()?->value}}</a>--}}
{{--                    </li> --}}
{{--                @endif--}}

                    <li>
                    اینستاگرام: <a href="//instagram.com/ittelecomco">instagram.com/ittelecomco</a>
                    </li>

{{--                @if (\App\Models\Setting::where('name', 'linkedin')->first()?->value) --}}
{{--                    <li>--}}
{{--                    لینکدین: <a href="{{\App\Models\Setting::where('name', 'linkedin')->first()?->value}}">{{\App\Models\Setting::where('name', 'linkedin')->first()?->value}}</a>--}}
{{--                    </li> --}}
{{--                @endif--}}

                    <li>
                    تلگرام: <a href="//t.me/Parhammee">t.me/Parhammee</a>
                    </li>

                    <li>
                    آپارات: <a href="//www.aparat.com/ittelecom">aparat.com/ittelecom</a>
                    </li>

                    <li>
                    پینترست: <a href="//www.pinterest.com/ittelecomco">pinterest.com/ittelecomco</a>
                    </li>
            </ul>

        </div>

    </div>

</body>
</html>
