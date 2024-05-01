@extends('layouts.app')

@section('title', 'دسته‌بندی‌ها')
@section('titleAdmin',' | داشبورد')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@section('content')
<div class="main-content">
    <div class="index">
        @include('admin.pages.category.partials.toolbar')
        @include('errors.messages')
        <section class="card form-db archive-back-box hidden menuable-form">
            @include('admin.pages.category.partials.box')
        </section>
    </div>
</div>
@endsection
