@can('content_view')
<div class="box-flex">
    <ul class=" icn-middle-color">
        <li class="col-12"><a class="block" title="عکس مقاله" href="{{route('admin.upload.post')}}"><i class="icn" style="background-image: url(/icons/book-open.svg);"></i>عکس مقاله</a></li>
        <li class="col-12"><a class="block" title="عکس محصول" href="{{route('admin.upload.product')}}"><i class="icn" style="background-image: url(/icons/box.svg);"></i>عکس محصول</a></li>
        <li class="col-12"><a class="block" title="فایل PDF" href="{{route('admin.upload.pdf')}}"><i class="icn" style="background-image: url(/icons/upload-cloud.svg);"></i>فایل PDF</a></li>
        <li class="col-12"><a class="block" title="فایل فشرده" href="{{route('admin.upload.zip')}}"><i class="icn" style="background-image: url(/icons/upload-cloud.svg);"></i>فایل فشرده</a></li>
    </ul>
</div>
@endcan