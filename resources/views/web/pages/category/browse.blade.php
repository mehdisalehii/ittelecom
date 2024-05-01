@extends('layouts.app')

@section('title','همه دسته‌ها')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@section('web_type', 'Archive' )

@section('content')
<div class="lists">
    <div class="col-m-12">
        {{-- <aside class="card hidden">
            <i class="icn fill" style="background-image: url(/icons/layout-dashboard.svg);"></i>
            <h1 class="text-right">همه دسته‌ها</h1>
        </aside>  --}}
    <ul>
        <li class="list main-list"><a href="/blog" title="بلاگ" class="extra blog @if(URL::current()==route('home').'/blog' || strpos(URL::current(), 'category/article') !== false ) active @endif"><i class="icn fill" style="background-image: url(/icons/book-open.svg);"></i>بلاگ</a></li>
        <li class="list main-list last"><a href="/forum" title="انجمن" class="extra @if(URL::current()==route('home').'/forum') active @endif"><i class="icn fill" style="background-image: url(/icons/users.svg);"></i>انجمن</a></li>
        </ul>
    </div>
</div>
@endsection
