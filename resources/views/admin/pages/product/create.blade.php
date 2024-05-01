@extends('layouts.app')

@section('title', 'محصول جدید | محصولات')
@section('titleAdmin',' | داشبورد')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@push('css')
<style>.nav-admin ul li.product a{background:#68717b}</style>
@endpush

@section('content')
<div class="col">
    <div class="box-pan">
        <div class="content-product product">
            @include('admin.pages.product.partials.toolbar')
            <section class="single card form-editor hidden">
                @include('errors.messages')
                <form action="{{ route('admin.product.store') }}" method="POST" id="Form_Save">
                @csrf
                    <div class="panel">
                        @include('admin.pages.product.partials.info')
                        @include('admin.pages.product.partials.content')
                        @include('admin.pages.product.partials.popup')
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
@endsection
