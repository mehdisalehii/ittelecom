@extends('layouts.app')

@section('title', 'موجودی انبار')
@section('titleAdmin',' | داشبورد')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@section('content')
<div class="main-content">
    <div class="index" data-fetch="scroll">
        <div class="box-pan">
            @include('admin.pages.stock.partials.toolbar')
            @include('admin.pages.stock.partials.summery')
            @include('errors.messages')
            <section class="card form-db archive-back-box hidden">
                <ul class="archive-back lists" data-str="0" data-limit="20">
                    @include('admin.pages.stock.partials.list')
                </ul>
            </section>
        </div>
    </div>
</div>
@endsection
