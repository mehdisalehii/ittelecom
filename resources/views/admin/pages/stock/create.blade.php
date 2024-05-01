@extends('layouts.app')

@section('title', 'کالا جدید | موجودی کالا (انبار)')
@section('titleAdmin',' | داشبورد')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@section('content')
<div class="main-content">
    <div class="col">
        @include('admin.pages.stock.partials.toolbar')
        <section class="card form-db form-editor create hidden">
        @include('errors.messages')
            <form action="{{ route('admin.stock.store') }}" method="POST" enctype="multipart/form-data" id="Form_Save">
                @csrf
                @include('admin.pages.stock.form.document')
            </form>
        </section>
    </div>
</div>
@endsection
