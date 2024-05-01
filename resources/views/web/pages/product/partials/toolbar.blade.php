<div class="toolbars hidden">
    <div class="toolbar">

        <div class="title">
            <i class="icn fill" style="background-image: url(/icons/eye.svg);"></i>
            <h1>{{ \Illuminate\Support\Str::limit( strip_tags( str_replace('   ','', $product->title )) ,50) }}</h1>
        </div>

        <div class="buttons">

            @can('content_create')
                <a class="btn btn-success bold" href="{{ route('admin.product.create') }}"><i class="icn white" style="background-image: url(/icons/plus-circle.svg);"></i>محصول جدید</a>
            @endcan

            @can('admin_view')
                <button class="btn btn-danger text-white bold delete-btn-sql" title="حذف" data-txt="شماره محصول {{ $product->id }}" data-id="{{ $product->id }}"><i class="icn white" style="background-image: url(/icons/trash-2.svg);"></i>حذف</button>
                <div class="bt-fr otw hidden"><form class="delete-form-{{ $product->id }}" action="{{ route('admin.product.destroy', $product->id) }}" method="POST">  @csrf @method('DELETE') <input class="hidden" type="text" name="id" autocomplete="off" value="{{ $product->id }}"></form></div>
            @endcan

                <a class="btn btn-update text-white bold" href="{{  '/shop/'. $product->slug }}" target="_blank"><i class="icn white" style="background-image: url(/icons/eye.svg);"></i>پیش‌نمایش</a>

                <a class="btn btn-update text-white bold" href="{{ route('admin.product.index') }}"><i class="icn white" style="background-image: url(/icons/life-buoy.svg);"></i>لیست محصول‌ها</a>

                <a class="btn btn-danger text-white bold" href="{{ route('admin.product.index') }}/draft"><i class="icn white" style="background-image: url(/icons/clipboard-list.svg);"></i>پیشنویس محصولات</a>

        </div>
    </div>
</div>
