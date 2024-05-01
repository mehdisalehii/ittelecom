@extends('layouts.app')

@section('title', 'کاربر  جدید | کاربران')
@section('titleAdmin',' | داشبورد')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@section('content')
<div class="main-content">
    <div class="col">
        @include('admin.pages.users.partials.toolbar')
        <section class="card form-db form-editor hidden">
        @include('errors.messages')
            <form action="{{ route('admin.users.store') }}" method="POST" id="Form_Save" enctype="multipart/form-data">
                @csrf
                @include('admin.pages.users.form.document')
            </form>
        </section>
    </div>
</div>
@endsection

@push('popup')
@include('admin.pages.users.partials.popup')
@endpush
