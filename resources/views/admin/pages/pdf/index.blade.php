@extends('layouts.app')

@section('title', 'فایل‌های PDF')
@section('titleAdmin',' | داشبورد')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@section('content')
<div class="index" data-fetch="scroll">
    @include('admin.pages.pdf.partials.toolbar')
    {{-- @include('admin.pages.pdf.partials.summery') --}}
    <section class="card form-db archive-back-box hidden">
        <ul class="archive-back lists" data-str="0" data-limit="20">
            @include('admin.pages.pdf.partials.list')
        </ul>
    </section>
</div>
@endsection
