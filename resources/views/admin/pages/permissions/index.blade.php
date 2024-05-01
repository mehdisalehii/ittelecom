@extends('layouts.app')

@section('title', 'مجوز دسترسی‌ها | داشبورد')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@section('content')
<div class="main-content">
    <div class="index">
        @include('admin.pages.permissions.partials.toolbar')
        <aside class="card form-db archive-back-box hidden">
            <ul class="archive-back lists" data-str="0" data-limit="20">
                <li class="display-flex header">
                    <div class="col-1">ردیف</div>
                    <div class="col-2">نام مجوز دسترسی</div>
                </li>
            @foreach ($permissions as $permission)
                <li class="content-ma display-flex lid">
                    <div class="col-1">{{ $loop->index+1 }}</div>
                    <div class="col-2">{{ $permission->name }}</div>
                </li>
            @endforeach
            </ul>
        </aside>
    </div>
</div>
@endsection
