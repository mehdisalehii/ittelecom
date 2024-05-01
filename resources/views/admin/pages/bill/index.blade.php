@extends('layouts.app')

@section('title','حواله‌ها')
@section('titleAdmin',' | داشبورد')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@section('content')
<div class="lists index" data-fetch="scroll">
    <div class="box-pan">
        @include('admin.pages.bill.partials.toolbar')
        @include('admin.pages.bill.partials.summery')
        @include('errors.messages')
        <section class="card panel form-db archive-back-box hidden">
            <ul class="archive-back lists" data-str="0" data-limit="20">
                @include('admin.pages.bill.partials.list')
            </ul>
        </section>
    </div>
</div>
@endsection
