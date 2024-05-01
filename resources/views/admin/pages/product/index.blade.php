@extends('layouts.app')

@section('title','فروشگاه (همه محصولات)')
@section('titleAdmin',' | داشبورد')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@section('content')
<div class="lists index" data-fetch="scroll">
    <div class="box-pan">
    {{-- @include('web.inc.breadcrumb.shop') --}}
    @include('admin.pages.product.partials.toolbar')
    @include('admin.pages.product.partials.summery')
    @include('errors.messages')
        <div class="archive">
            <ul class="products de category lists grid grid-1 gap-3 columns col-4 mobile:col-1 tablet:col-2 desktop:col-3" data-str="0" data-limit="20">
                @include('admin.pages.product.partials.list')
            </ul>
        </div>
    </div>
</div>
@endsection
