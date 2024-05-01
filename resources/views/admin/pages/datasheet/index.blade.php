@extends('layouts.app')

@section('title', 'دیتاشیت‌ها | پنل کاربری')
@section('titleAdmin',' | داشبورد')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@push('css')
<style>.nav-admin ul li.datasheet a{background:#68717b}</style>
@endpush

@section('content')
<div class="lists index" data-fetch="scroll">
    <div class="box-pan">
        @include('admin.pages.datasheet.partials.toolbar')
        @include('errors.messages')
        <section class="card form-db archive-back-box hidden">
            <ul class="archive-back lists" data-str="0" data-limit="20">
                @include('admin.pages.datasheet.partials.list')
            </ul>
        </section>
    </div>
</div>
@endsection
