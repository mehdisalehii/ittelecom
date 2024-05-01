@extends('layouts.app')

@section('title', 'مقاله جدید | مقالات')
@section('titleAdmin',' | داشبورد')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@push('css')
    <style>.nav-admin ul li.post a {
            background: #68717b
        }</style>
@endpush

@section('content')
    @if (isset($post))
        @include('web.inc.head.menu.menubar_blog')
    @endif
    <form action="{{ route('admin.post.store') }}" method="POST" id="Form_Save">
        @csrf
        <div class="aria-clearfix"></div>
        <div style="height:30px;"></div>
        <div class="blog-edit-article-container">
            <div class="col">
                <div class="box-pan">
                    <div class="content-post">
                        @if (isset($post))
                            @include('web.inc.breadcrumb.post')
                        @endif
                        @include('admin.pages.post.partials.toolbar')
                        <section class="single card form-editor hidden">
                            @include('errors.messages')
                            <div class="panel">
                                @include('admin.pages.post.partials.info_box')
                                @include('admin.pages.post.partials.info')
                                @include('admin.pages.post.partials.content')
                                @include('admin.pages.post.partials.popup')
                            </div>
                        </section>
                    </div>
                </div>
            </div>
    </div>
    <div class="blog-edit-article-sidebar">
        <aside class="card box blog-edit-article-sidebar-card">
            @include('admin.pages.post.partials.blog-edit-article-images')
            @include('admin.pages.post.partials.info_box')
            <div class="aria-clearfix"></div>
            <ul class="ul-lists">
                <li class="col-12">
                    <input type="radio" id="publish" name="publ" value="on" autocomplete="off" @if(isset($post)) {{ $post->publish == 'on' ? 'checked="checked"' : '' }} @endif>
                    <label title="انتشار" for="publish">انتشار</label>
                </li>
                <li class="col-12">
                    <input type="radio" id="draft" name="publ" value="draft" autocomplete="off" @if(isset($post)) {{ $post->publish == 'draft' ? 'checked="checked"' : '' }} @else {{'checked="checked"'}} @endif>
                    <label title="پیش‌نویس" for="draft">پیش‌نویس</label>
                </li>
            </ul>
            <input class="type hidden" type="text" name="publish" autocomplete="off" @if(isset($post)) value="{{ old('publish', $post->publish == 'on' ? 'on' : 'draft') }}" @endif />
            <div class="aria-clearfix"></div>
        </aside>
        </div>
    </form>
@endsection
