@extends('layouts.app')

@section('title','دسته‌بندی مقالات')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@section('content')
<div class="main-content">
    <div class="col">
        @include('admin.pages.category.partials.toolbar')
        <section class="card form-db form-editor hidden menuable-form">
            {{-- @include('admin.pages.category.partials.load') --}}
            @include('admin.pages.category.form.option')
            @include('admin.pages.category.form.dropmenu')
        </section>
    </div>
</div>
@endsection

@push('css')
    <style>
    .admin-sidebar{display:none !important}
    </style>
@endpush
