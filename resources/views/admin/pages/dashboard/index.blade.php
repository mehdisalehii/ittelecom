@extends('layouts.app')

@section('title','داشبورد')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@push('css')
<style>.admin nav.admin .dashboard a{background:#68717b}</style>
@endpush

@section('content')
<div class="lists index">
    <div class="box-pan">
        @include('admin.pages.dashboard.partials.toolbar')
        @include('admin.pages.dashboard.partials.summery')
        @include('errors.messages')
        <div class="panel-man col-10 grid grid-1 gap-3">
            @include('admin.pages.dashboard.partials.stat')
            @include('admin.pages.dashboard.partials.last')
        </div>
    </div>
</div>
@endsection
