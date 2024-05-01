@extends('layouts.app')

@section('title','مقالات')
@section('titleAdmin',' | داشبورد')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@section('content')
<div class="lists index" data-fetch="scroll">
    <div class="lists-pan">
        {{-- @include('web.inc.breadcrumb.blog') --}}
        @include('admin.pages.post.partials.toolbar')
        @include('admin.pages.post.partials.summery')
        @include('errors.messages')
            <div class="archive">
                <ul class="posts category lists grid grid-1 gap-3 columns col-4 mobile:col-1 tablet:col-2 desktop:col-3" data-str="0" data-limit="20">
                    @include('admin.pages.post.partials.list')
                </ul>
            </div>
    </div>
</div>
@endsection
