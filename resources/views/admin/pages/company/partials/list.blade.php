<li class="display-flex header">
    <div class="col-2">نام شرکت</div>
    <div class="col-3">نوع فاکتور</div>
    <div class="col-2">نقش</div>
    <div class="col-2">شماره فاکتور بعدی</div>
    <div class="col-3">ابزار</div>
</li>

@foreach ($companys as $row)
<li class="content-ma display-flex lid">
    <div class="col-2">{{ $row->name }}</div>
    <div class="col-3">{{ $row->title }}</div>
    <div class="col-2">
        <span>
            @switch($row->job)
                @case('seller') فروشنده @break
                @case('customer') مشتری @break
                @default -
            @endswitch
        </span>
    </div>
    <div class="col-2">{{ $row->number_last }}</div>
    <div class="col-3 tools">
{{--        @can('sale_delete')--}}
{{--            <button class="btn btn-danger text-white delete-btn-sql" title="حذف" data-txt="( شرکت {{ $row->part_no }} )" data-id="{{ $row->id }}"><i class="icn white" style="background-image: url(/icons/trash-2.svg);"></i></button>--}}
{{--            <div class="bt-fr otw"><form class="delete-form-{{ $row->id }} hidden" action="{{ route('admin.company.destroy', $row->id) }}" method="POST">  @csrf @method('DELETE') </form></div>--}}
{{--        @endcan--}}
        @can('sale_edit')
            <a class="btn btn-success" href="{{ route('admin.company.edit', $row->id) }}" title="ویرایش"><i class="icn white" style="background-image: url(/icons/pencil.svg);"></i></a>
        @endcan
    </div>
</li>
@endforeach
