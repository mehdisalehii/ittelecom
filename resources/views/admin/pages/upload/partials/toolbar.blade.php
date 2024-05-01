<div class="toolbars hidden">
    <div class="toolbar">
        <div class="title">
            @if( URL::current() == route('admin.upload.index') )
                <i class="icn fill" style="background-image: url(/icons/upload-cloud.svg);"></i>
                <h1>آپلود</h1>
            @endif
            @if( URL::current() == route('admin.upload.post') )
                <i class="icn fill" style="background-image: url(/icons/upload-cloud.svg);"></i>
                <h1>آپلود عکس مقاله</h1>
            @endif
            @if( URL::current() == route('admin.upload.product') )
                <i class="icn fill" style="background-image: url(/icons/upload-cloud.svg);"></i>
                <h1>آپلود عکس محصول</h1>
            @endif
            @if( URL::current() == route('admin.upload.pdf') )
                <i class="icn fill" style="background-image: url(/icons/upload-cloud.svg);"></i>
                <h1>آپلود فایل PDF</h1>
            @endif           
            @if( URL::current() == route('admin.upload.zip') )
                <i class="icn fill" style="background-image: url(/icons/upload-cloud.svg);"></i>
                <h1>آپلود فایل فشرده</h1>
            @endif
        </div>
        <div class="buttons">
            @if( URL::current() != route('admin.upload.index') )
                <a class="btn btn-success bold" href="{{ route('admin.upload.post') }}"><i class="icn white" style="background-image: url(/icons/upload-cloud.svg);"></i>آپلود عکس مقاله</a>
                <a class="btn btn-success bold" href="{{ route('admin.upload.product') }}"><i class="icn white" style="background-image: url(/icons/upload-cloud.svg);"></i>آپلود عکس محصول</a>
                <a class="btn btn-success bold" href="{{ route('admin.upload.pdf') }}"><i class="icn white" style="background-image: url(/icons/upload-cloud.svg);"></i>آپلود فایل PDF</a>
                <a class="btn btn-success bold" href="{{ route('admin.upload.zip') }}"><i class="icn white" style="background-image: url(/icons/upload-cloud.svg);"></i>آپلود فایل فشرده</a>
            @endif
        </div>         
    </div>         
</div>