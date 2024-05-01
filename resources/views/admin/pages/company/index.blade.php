@extends('layouts.app')

@section('title', 'لیست شرکت‌ها')
@section('titleAdmin',' | داشبورد')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@section('content')
<div class="lists index" data-fetch="scroll">
    <div class="box-pan">
        @include('admin.pages.company.partials.toolbar')
        @include('errors.messages')
        <section class="card form-db archive-back-box hidden">
            <ul class="archive-back lists" data-str="0" data-limit="20">
                @include('admin.pages.company.partials.list')
            </ul>
        </section>
    </div>
</div>
@endsection
