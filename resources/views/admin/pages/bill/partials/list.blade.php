<li class="display-flex header">
    <div class="col-1">شماره حواله</div>
    <div class="col-2">تاریخ صدور</div>
    <div class="col-3">نام</div>
    <div class="col-6">ابزار</div>
</li>

@foreach($bills as $row)
    <li class="content-ma display-flex lid">
        <div class="col-1 txt"><span>{{ $row->order_no }}</span></div>
        <div class="col-2 txt">
            <span>{{ \Morilog\Jalali\CalendarUtils::convertNumbers(jdate($row->created_at)->format('%Y/%m/%d')) }}</span>
        </div>
        <div class="col-3 txt"><span>{{ $row->name }}</span></div>
        <div class="col-6 tools">

            <button class="btn btn-danger text-white delete-btn-sql" title="حذف" data-txt="شماره حواله‌ {{ $row->order_no }}" data-id="{{ $row->id }}"><i class="icn white" style="background-image: url(/icons/trash-2.svg);"></i></button>
            <div class="bt-fr otw"><form class="delete-form-{{ $row->id }} hidden" action="{{ route('admin.bill.destroy', $row->id) }}" method="POST">  @csrf @method('DELETE') <input class="hidden" type="text" name="company_id" autocomplete="off" value="{{ $row->company_id }}"><input class="hidden" type="text" name="order_no" autocomplete="off" value="{{ $row->order_no }}"></form></div>

            <a class="btn btn-update text-white" href="{{  '/bill/' . $row->order_no .'-'. $row->hash .'.pdf' }}" target="_blank" title="چاپ"><i class="icn white" style="background-image: url(/icons/printer.svg);"></i></a>
            {{--<a class="btn btn-warning text-white" href="{{ 'admin/bill/' . $row->order_no . $orientation .'-'. $row->hash .'.pdf' }}" target="_blank" title="دانلود PDF"><i class="icn white" style="background-image: url(/icons/download-cloud.svg);"></i></a>--}}

            @can('sale_edit')
            <a class="btn btn-success" href="admin/bill/{{$row->id}}/edit" title="ویرایش"><i class="icn white" style="background-image: url(/icons/pencil.svg);"></i></a>
            @endif

        </div>
    </li>
@endforeach
