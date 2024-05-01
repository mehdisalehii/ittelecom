@extends('layouts.app')

@section('title', 'کاربران')
@section('titleAdmin',' | داشبورد')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@section('content')
<div class="index lists" data-fetch="scroll">
    @include('admin.pages.users.partials.toolbar')
    @include('errors.messages')
    <section class="card form-db archive-back-box hidden">
        <ul class="archive-back lists" data-str="0" data-limit="20">
            @include('admin.pages.users.partials.list')
        </ul>
    </section>
</div>
@endsection
