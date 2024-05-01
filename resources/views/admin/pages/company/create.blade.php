@extends('layouts.app')

@section('title', 'شرکت جدید | لیست شرکت‌ها')
@section('titleAdmin',' | داشبورد')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@section('content')
<div class="lists index">
    <div class="box-pan">
        @include('admin.pages.company.partials.toolbar')
        <section class="card form-db form-editor create hidden">
        @include('errors.messages')
            <form action="{{ route('admin.company.store') }}" method="POST" enctype="multipart/form-data" id="Form_Save">
                @csrf
                @include('admin.pages.company.form.document')
            </form>
        </section>
    </div>
</div>
@endsection
