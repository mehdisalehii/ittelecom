@extends('layouts.app')

@section('title', 'آی پی')
@section('titleAdmin',' | داشبورد')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@section('content')
<div class="lists index">
    <div class="box-pan">
        @include('admin.pages.stat.partials.toolbar')
        <section class="card hidden" style="padding: 15px;">

            @if ($data)
                <p>آی پی: <a href="https://iplocation.io/ip/{{ $data->ip }}" target="_blank">{{ $data->ip }}</a></p>
                <p>نام کشور: {{ $data->countryName }}</p>
                {{-- <p>کد کشور: {{ $data->countryCode }}</p> --}}
                {{-- <p>کد شهر: {{ $data->regionCode }}</p> --}}
                <p>نام شهر: {{ $data->regionName }}</p>
                <p>نام استان: {{ $data->cityName }}</p>
                {{-- <p>کد پستی: {{ $data->zipCode }}</p> --}}
                <p>موقعیت جغرافیایی: {{ $data->latitude .','.$data->longitude }}</p>
            @else
                <p>آی پی: <a href="https://iplocation.io/ip/{{ $ip }}" target="_blank">{{ $ip }}</a></p>
                <p>نام کشور: -</p>
                {{-- <p>کد کشور: -</p> --}}
                {{-- <p>کد شهر: -</p> --}}
                <p>نام شهر: -</p>
                <p>نام استان: -</p>
                {{-- <p>کد پستی: -</p> --}}
                <p>موقعیت جغرافیایی: -</p>
            @endif

        </section>
    </div>
</div>
@endsection
