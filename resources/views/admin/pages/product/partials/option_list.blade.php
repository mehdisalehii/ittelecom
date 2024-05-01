@can('content_view')
    <div class="option">
    @can('content_edit')
        <a href="/admin/product/{{$row->id}}/edit" title="ویرایش" class="green block">
            <i class="icn fill" style="background-image: url(/icons/pencil.svg);"></i>
        </a>
    @endcan
    @can('content_delete')
        <button class="btn-grid-ert last block delete-btn-sql" title="حذف" data-txt="شماره محصول {{ $row->id }}" data-id="{{ $row->id }}"><i class="icn fill" style="background-image: url(/icons/trash-2.svg);"></i></button>
        <div class="bt-fr otw"><form class="delete-form-{{ $row->id }} hidden" action="{{ route('admin.product.destroy', $row->id) }}" method="POST">  @csrf @method('DELETE') <input class="hidden" type="text" name="id" autocomplete="off" value="{{ $row->id }}"></form></div>
    @endcan
    </div>
@endcan
