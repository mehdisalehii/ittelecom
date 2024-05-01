@extends('layouts.app')

@section('title', 'لیست تاریخ آمار')
@section('titleAdmin',' | داشبورد')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@section('content')
<div class="lists index">
    <div class="box-pan">
        @include('admin.pages.stat.partials.toolbar')
        <section class="card form-db archive-back-box hidden">
            <ul class="archive-back lists" data-str="0" data-limit="20">
                @include('admin.pages.stat.partials.list')
            </ul>
        </section>
    </div>
</div>
@endsection
