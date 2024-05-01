@extends('layouts.app')

@section('title', 'ویرایش کالا "'. $stock->title .'" | موجودی کالا (انبار)')
@section('titleAdmin',' | داشبورد')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@section('content')
<div class="main-content">
    <div class="col">
        @include('admin.pages.stock.partials.toolbar')
        <section class="card form-db form-editor create hidden">
        @include('errors.messages')
           <form action="{{ route('admin.stock.update', [$stock->id]) }}" method="POST" enctype="multipart/form-data" id="Form_Save">
                @csrf
                @method('PUT')
                @include('admin.pages.stock.form.document')
            </form>
        </section>
    </div>
</div>
@endsection
