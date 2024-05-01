@extends('layouts.app')

@section('title', 'نقش‌ها')
@section('titleAdmin',' | داشبورد')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@section('content')
<div class="main-content">
    <div class="index">
        @include('admin.pages.roles.partials.toolbar')
        @include('errors.messages')
        <section class="card form-db archive-back-box hidden">
            <ul class="archive-back lists" data-str="0" data-limit="20">
                @include('admin.pages.roles.partials.list')
            </ul>
        </section>
    </div>
</div>
@endsection
