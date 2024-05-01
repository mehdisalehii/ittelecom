@extends('layouts.app')

@section('title', 'دیتاشیت جدید | دیتاشیت‌ها')
@section('titleAdmin',' | داشبورد')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@section('content')
<div class="col">
    <div class="box-pan">
        <div class="content-datasheet single datasheet">
            @include('admin.pages.datasheet.partials.toolbar')
            <form action="{{ route('admin.datasheet.store') }}" method="POST" id="Form_Save">
            @csrf
                @include('admin.pages.datasheet.page.first')
                @include('admin.pages.datasheet.page.next')
                @include('admin.pages.datasheet.partials.popup')
            </form>
        </div>
    </div>
</div>
@endsection
