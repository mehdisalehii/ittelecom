@extends('layouts.app')

@section('title','فروشگاه')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@section('web_type', 'Shop' )
@section('web_amp', route('home').'/shop/amp' )

@section('content')
<div class="lists" data-fetch="scroll">
    <div class="lists-pan col-m-12">
    @include('web.inc.breadcrumb.shop')
        <aside class="card hidden toolbar">
            <i class="icn fill" style="background-image: url(/icons/box.svg);"></i>
            <h1 class="text-right">همه محصولات</h1>
            @can('content_create')
            <div class="content-admin">
                <a class="btn btn-success" href="{{ route('admin.product.create') }}"><i class="icn block white" style="background-image:url('/icons/plus-circle.svg');"></i>محصول جدید</a>
                <a class="btn btn-danger" href="{{ route('admin.draft.product') }}"><i class="icn block white" style="background-image:url('/icons/list.svg');"></i>پیش‌نویس محصولات</a>
            </div>
            @endcan
            <div class="aria-clearfix"></div>
        </aside>
        <div class="archive">
            <ul class="products de category lists grid grid-1 gap-3 columns col-4 mobile:col-1 tablet:col-2 desktop:col-3" data-str="0" data-limit="20">
                @include('web.pages.product.partials.list')
            </ul>
        </div>
    </div>
</div>
@endsection
