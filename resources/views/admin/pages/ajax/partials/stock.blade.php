@if ($url_fetch == 'stock' )
@foreach ($stocks as $row)
<li class="content-ma display-flex lid">
    <div class="col-1">{{ $row->part_no }}</div>
    <div class="col-4">{{ $row->title }}</div>
    <div class="col-2">{{ $row->number }}</div>
    <div class="col-5 tools">
        @can('sale_delete')
            <button class="btn btn-danger text-white delete-btn-sql" title="حذف" data-txt="( کالا {{ $row->part_no }} )" data-id="{{ $row->id }}"><i class="icn white" style="background-image: url(/icons/trash-2.svg);"></i></button>
            <div class="bt-fr otw"><form class="delete-form-{{ $row->id }} hidden" action="{{ route('admin.stock.destroy', $row->id) }}" method="POST">  @csrf @method('DELETE') </form></div>
        @endcan
        @can('sale_edit')
            <a class="btn btn-success" href="{{ route('admin.stock.edit', $row->id) }}" title="ویرایش"><i class="icn white" style="background-image: url(/icons/pencil.svg);"></i></a>
        @endcan
    </div>
</li>
@endforeach
@endif
