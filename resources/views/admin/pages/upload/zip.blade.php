@extends('layouts.app')

@section('title', 'آپلود ZIP')
@section('titleAdmin',' | فایل‌ها | داشبورد')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@push('css')
<style>.nav-admin ul li.files a{background:#68717b}main .alert{display:none}main .content .alert{display:block}</style>
@endpush

@section('content')
<div class="lists index">
    <div class="box-pan">
        @include('admin.pages.upload.partials.toolbar')
        <section class="card form-db hidden">
            @include('errors.messages')
            <form action="{{ route('admin.upload.store.zip') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('admin.pages.upload.form.document')
            </form>
            @include('admin.pages.upload.form.result')
        </section>
    </div>
</div>
@endsection
