@extends('layouts.app')

@section('title', 'تغییر رمز عبور کاربر "'. $user->username .'" | کاربران')
@section('titleAdmin',' | داشبورد')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@section('content')
<div class="main-content">
    <div class="col">
        @include('admin.pages.users.partials.toolbar')
        <section class="card form-db form-editor hidden">
            <form action="{{ route('admin.users.password.post', $user->id ) }}" method="POST" id="Form_Save" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                @include('admin.pages.users.form.password')
            </form>
        </section>
    </div>
</div>
@endsection

@push('popup')
@include('admin.pages.users.partials.popup')
@endpush
