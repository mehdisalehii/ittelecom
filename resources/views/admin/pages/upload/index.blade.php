@extends('layouts.app')

@section('title', 'آپلود')
@section('titleAdmin',' | داشبورد')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@section('content')
<div class="lists index">
    <div class="box-pan">
        @include('admin.pages.upload.partials.toolbar')
        <section class="card form-db archive-back-box hidden">
            @include('admin.pages.upload.partials.box')
        </section>
    </div>
</div>
@endsection
