@can('content_view')
<div class="box-flex">
    <ul class=" icn-middle-color">
        <li class="col-12"><a class="block" title="دسته‌بندی مقاله" href="{{route('admin.category.post')}}"><i class="icn" style="background-image: url(/icons/book-open.svg);"></i>دسته‌بندی مقاله</a></li>
        <li class="col-12"><a class="block" title="دسته‌بندی محصول" href="{{route('admin.category.product')}}"><i class="icn" style="background-image: url(/icons/box.svg);"></i>دسته‌بندی محصول</a></li>
        <li class="col-12"><a class="block" title="دسته‌بندی انجمن" href="{{route('admin.category.forum')}}"><i class="icn" style="background-image: url(/icons/twitch.svg);"></i>دسته‌بندی انجمن</a></li>
    </ul>
</div>
@endcan