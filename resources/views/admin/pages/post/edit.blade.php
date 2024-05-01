@extends('layouts.app')

@section('title', 'ویرایش مقاله '. ($post->id) .' | مقالات')
@section('titleAdmin',' | داشبورد')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@push('css')
<style>.nav-admin ul li.post a{background:#68717b}</style>
@endpush

{{--@section('menubar')--}}
{{--<div class="menubar-page blue scrollbar-horizon" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">--}}
{{--    <nav class="nav">--}}
{{--        <div class="menu-link menu-back menu-front">--}}
{{--            <ul class="menu">--}}
{{--                @foreach( $category_blog as $row_main )--}}
{{--                    <li class="iltr"><a class="block  @if(URL::current()==route('home').'/'.'category/article'.'/'.$row_main->slug) active @endif" href="{{'category/article'}}/{{$row_main->slug}}" itemprop="url">{{$row_main->title}}</a></li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </nav>--}}
{{--</div>--}}
{{--@endsection--}}

@section('content')
<form action="{{ route('admin.post.update', $post) }}/update" method="POST" id="Form_Save">
    @csrf
    <div class="aria-clearfix"></div>
    <div style="height:30px;"></div>
    <div class="blog-edit-article-container">
        <div class="col">
            <div class="box-pan">
                <div class="content-post">
                @include('admin.pages.post.partials.toolbar')
                    <section class="single card form-editor hidden {{--Request()->url--}} {{--$url--}}">
                        @include('errors.messages')
                        <div class="panel">
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
            <input class="type hidden" type="text" name="publish" autocomplete="off" value="{{ old('publish', $post->publish == 'on' ? 'on' : 'draft') }}" />
            <div class="aria-clearfix"></div>
        </aside>
    </div>
</form>
@endsection
