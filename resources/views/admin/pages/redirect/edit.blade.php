@extends('layouts.app')

@section('title', 'ویرایش لینک "'. $redirect->slug .'" | ریردایرکت')
@section('titleAdmin',' | داشبورد')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@section('content')
<div class="main-content">
    <div class="col">
        @include('admin.pages.redirect.partials.toolbar')
        <section class="card form-db form-editor create hidden">
        @include('errors.messages')
           <form action="{{ route('admin.redirect.update', [$redirect->id]) }}" method="POST" enctype="multipart/form-data" id="Form_Save">
                @csrf
                @method('PUT')
                @include('admin.pages.redirect.form.document')
            </form>
        </section>
    </div>
</div>
@endsection
