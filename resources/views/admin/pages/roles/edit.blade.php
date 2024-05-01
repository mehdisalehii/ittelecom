@extends('layouts.app')

@section('title', 'ویرایش نقش "'. $role->title .'" | نقش‌ها')
@section('titleAdmin',' | داشبورد')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@section('content')
<div class="main-content">
    <div class="col">
        @include('admin.pages.roles.partials.toolbar')
        <section class="card form-db form-editor create hidden">
        @include('errors.messages')
           <form action="{{ route('admin.roles.update', [$role->id]) }}" method="POST" enctype="multipart/form-data" id="Form_Save">
                @csrf
                @method('PUT')
                @include('admin.pages.roles.form.document')
            </form>
        </section>
    </div>
</div>
@endsection
