@extends('layouts.app')

@section('title','پیش‌نویس محصولات')
@section('titleAdmin',' | داشبورد')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@section('content')
<div class="lists" data-fetch="scroll">
    <div class="box-pan">
        <div class="col-m-12">
        @include('web.inc.breadcrumb.shop')
        @include('admin.pages.product.partials.toolbar')
            <div class="archive">
                <ul class="products we category lists grid grid-1 gap-3 columns col-4 mobile:col-1 tablet:col-2 desktop:col-3" data-str="0" data-limit="20">
                    @include('admin.pages.product.partials.list')
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
    <style>
    .admin-sidebar{display:none !important}
    </style>
@endpush
