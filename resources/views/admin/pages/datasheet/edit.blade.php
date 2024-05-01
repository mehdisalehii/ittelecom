@extends('layouts.app')

@section('title', 'ویرایش دیتاشیت '. ($datasheet->id) .' | دیتاشیت‌ها')
@section('titleAdmin',' | داشبورد')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@section('content')
<div class="col">
    <div class="box-pan">
        <div class="content-datasheet single datasheet">
            @include('admin.pages.datasheet.partials.toolbar')
            <form action="{{ route('admin.datasheet.update', $datasheet->id) }}" method="POST" id="Form_Save">
            @method('PUT')
            @csrf
                @include('admin.pages.datasheet.page.first')
                @include('admin.pages.datasheet.page.next')
                @include('admin.pages.datasheet.partials.popup')
            </form>
        </div>
    </div>
</div>
@endsection
