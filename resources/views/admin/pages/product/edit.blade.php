@extends('layouts.app')

@section('title', 'ویرایش محصول '. ($product->id) .' | محصولات')
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
                <form action="{{ route('admin.product.update', $product->id) }}" method="POST" id="Form_Save">
                @method('PUT')
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
