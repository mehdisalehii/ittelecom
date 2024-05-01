@can('content_view')
<div class="panel-mid show">
    <aside class="card ds">
        <div class="title-ts bold"><div class="txt"><i class="icn fill" style="background-image: url(/icons/book-open.svg);"></i>
        @can('content_edit')
        <div class="ti">پیش‌نویس مقالات</div><a href="">بیشتر ببینید</a>
        @else
        <div class="ti">آخرین مقالات</div>
        @endcan
        </div></div>
        <div class="lists">
            <ul>
            @forelse($posts as $row)
                <li class="col-u-12">
                    <a href="{{$row->slug}}">{{ \Illuminate\Support\Str::limit( strip_tags( str_replace('   ','',$row->title)) ,50) }}</a>
                    @can('content_edit')
                    <a class="btn-edit" href="admin/post/{{$row->id}}/edit">ویرایش</a>
                    @endcan
                </li>
            @empty
                <li class="no-data">مقاله اضافه نشده است.</li>
            @endforelse
            </ul>
        </div>
    </aside>            
</div>
@endcan
@can('widget_view')
<div class="panel-mid show">
    <aside class="card ds">
        <div class="title-ts bold"><div class="txt"><i class="icn fill" style="background-image: url(/icons/box.svg);"></i>
        @can('content_edit')
        <div class="ti">پیش‌نویس محصولات</div><a href="admin/product/draft">بیشتر ببینید</a>
        @else
        <div class="ti">آخرین محصولات</div>
        @endcan
        </div></div>
        <div class="lists">
            <ul>
            @forelse($products as $row)
                <li class="col-u-12">
                    <a href="/shop/{{$row->slug}}">{{ \Illuminate\Support\Str::limit( strip_tags( str_replace('   ','',$row->title)) ,50) }}</a>
                    @can('content_edit')
                        <a class="btn-edit" href="admin/product/{{$row->id}}/edit">ویرایش</a>
                    @endcan
                </li>
            @empty
                <li class="no-data">محصول اضافه نشده است.</li>
            @endforelse
            </ul>
        </div>
    </aside>            
</div>
@endcan