<div class="title-ht toolbar rrtr">
    {{-- <i class="icn fill" style="background-image: url(/icons/box.svg);"></i> --}}

    <input class="type-text hidden" name="user_id" value="{{ $datasheet->user_id ?? '' }}">

    <h1 class="title-s">@if(isset($datasheet)) {{$datasheet->title}} @else {{'...عنوان دیتاشیت...'}} @endif</h1>
    <input class="title-s" name="title" value="{{ old('title', isset($datasheet) ? $datasheet->title : '') }}" autocomplete="off">

    <div class="btn-popup" data-popup="title" title="ویرایش عنوان"><i style="background-image:url('/icons/pencil.svg')"></i></div>

    
    <input class="slug-s hidden" name="slug" value="{{ old('slug', isset($datasheet) ? $datasheet->slug : '') }}" autocomplete="off">
</div>