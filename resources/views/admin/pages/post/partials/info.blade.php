@if(isset($post))
    @if($post->publish == 'draft')
        <div class="panel draft">
            <div class="circ"></div>
            <div class="txt">پیش‌نویس</div>
        </div>
    @endif
@endif
<div class="aria-clearfix"></div>
<h4>Subject:</h4>
<div class="title title-ht cio toolbar">
    {{-- <i class="icn fill" style="background-image: url(/icons/book-open.svg);"></i> --}}
    {{-- <h1 class="title-s">@if(isset($post)) {{$post->title}} @else {{'...عنوان مقاله...'}} @endif</h1> --}}
    <input class="title-get input" name="title" data-txt="title-get" placeholder=" عنوان مقاله" title="عنوان مقاله" value="{{ old('title', isset($post) ? $post->title : '') }}" data-id="{{ old('title', isset($post) ? $post->id : '') }}" autocomplete="off">
    <div class="address-get direction-ltr">
        <span class="link-input">{{route('home')}}//blog/</span>
        <span class="link-input-get btn-popup {{ URL::current() == route('admin.post.create') ? 'create' : '' }}" data-popup="title" title="ویرایش ادرس">{{ old('slug', isset($post) ? urldecode($post->slug) : '') }}</span>
        <span class="result-txt-check"></span>
        <input class="link-slug-get hidden {{ URL::current() == route('admin.post.create') ? 'create' : '' }}" name="slug" data-txt="slug-get" value="{{ old('slug', isset($post) ? $post->slug : '') }}" autocomplete="off">
    </div>
    {{-- <div class="btn-popup f" data-popup="title" title="ویرایش آدرس"><i style="background-image:url('/icons/pencil.svg')"></i></div> --}}
</div>
<div class="aria-clearfix"></div>
<div class="">
    <h4>Header Meta Description:</h4>
    <textarea id="short-description" name="short-description" maxlength=156 placeholder="توضیح مختصری برای موتورهای جستجو در ۱۵۶ کاراکتر">{{ $post->short_description ?? '' }}</textarea>
    <div id="description-counter" class="text-left ltr"></div>
    <script>
        // Get the textarea element
        const textarea = document.getElementById("short-description");

        // Get the character limit from the textarea's data attribute
        const charLimit = 156;

        // Get the current length of the textarea's value
        const currentLength = textarea.value.length;

        // Update the counter element with the current length and limit
        const counter = document.getElementById("description-counter");
        counter.innerHTML = `${currentLength} / ${charLimit}`;

        // Update the counter every time the textarea's value changes
        textarea.addEventListener("input", () => {
            const currentLength = textarea.value.length;
            counter.innerHTML = `${currentLength} / ${charLimit}`;
        });
    </script>
</div>
<div class="info-le form-db col-m-12">
    <div class="form-radio form-group-item box last col-3">

    </div>
    <div class="form-radio form-group-item box last col-3">
        <input type="hidden" id="index" name="robo" value="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" autocomplete="off">
        <input class="type hidden" type="text" name="robots" autocomplete="off" value="{{ old('robots', isset($post) ? $post->robots : 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1') }}">
    </div>
</div>
