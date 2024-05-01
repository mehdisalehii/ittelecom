@if ($url_fetch == 'invoice' )
@foreach($invoices as $row)
<li class="content-ma display-flex lid">
        <div class="col-1 txt"><span>{{ $row->order_no }}</span></div>
        <div class="col-2 txt">
            <span>{{ \Morilog\Jalali\CalendarUtils::convertNumbers(jdate($row->created_at)->format('%H:%S - %Y/%m/%d')) }}</span>
        </div>
        <div class="col-2 txt"><span>{{ $row->customer_name }}</span></div>
        <div class="col-1 txt">
            <span>
                @foreach($companys as $row_co)
                    @if( $row_co->parentId == $row->company_id )
                        {{$row_co->name}}
                    @endif
                @endforeach
            </span>
        </div>
        <div class="col-1 txt badge-list">
            <span class="default">
                @switch($row->invoice_type)
                    @case('Proforma') غیررسمی @break
                    @case('Commerical') صورتحساب رسمی @break
                    @case('BeforeCommerical') پیش‌فاکتور رسمی @break
                    @case('BeforeInvoice') پیش‌فاکتور @break
                    @case('Sale') فاکتور فروش @break
                    @default -
                @endswitch
            </span>
        </div>
        <div class="col-2 txt">
            <span>{{ \Morilog\Jalali\CalendarUtils::convertNumbers(number_format( $row->total_amount)) }}</span>
        </div>
        <div class="col-1 txt">
            <span>
                @foreach($users as $row_ad)
                    @if( $row_ad->id == $row->created_by )
                        {{$row_ad->name ? $row_ad->name : $row_ad->username }}
                    @endif
                @endforeach
            </span>
        </div>
        <div class="col-2 tools">
        @can('sale_delete')
            @if($row->invoice_type != 'Commerical')
                <button class="btn btn-danger text-white delete-btn-sql" title="حذف" data-txt="شماره فاکتور {{ $row->order_no }}" data-id="{{ $row->id }}"><i class="icn white" style="background-image: url(/icons/trash-2.svg);"></i></button>
                <div class="bt-fr otw"><form class="delete-form-{{ $row->id }} hidden" action="{{ route('admin.invoice.destroy', $row->id) }}" method="POST">  @csrf @method('DELETE') <input class="hidden" type="text" name="company_id" autocomplete="off" value="{{ $row->company_id }}"><input class="hidden" type="text" name="order_no" autocomplete="off" value="{{ $row->order_no }}"></form></div>
            @else
                <button class="btn btn-perimary text-white disable"><i class="icn white" style="background-image: url(/icons/x.svg);"></i></button>
            @endif
        @endcan

        @php
            $orientation = '';
            if($row->invoice_type == 'Commerical') {
                $orientation = 'r';
            }elseif($row->invoice_type == 'BeforeCommerical') {
                $orientation = 'w';
            }elseif($row->invoice_type == 'BeforeInvoice') {
                $orientation = 'p';
            }elseif($row->invoice_type == 'Sale') {
                $orientation = 's';
            }
        @endphp

            <a class="btn btn-update text-white" href="{{  '/invoice/' . $row->order_no . '/' . $orientation .'/'. $row->hash .'.pdf' }}" target="_blank" title="پیش‌نمایش"><i class="icn white" style="background-image: url(/icons/printer.svg);"></i></a>
            {{--<a class="btn btn-warning text-white" href="{{ 'admin/invoice/' . $row->order_no . $orientation .'-'. $row->hash .'.pdf' }}" target="_blank" title="دانلود PDF"><i class="icn white" style="background-image: url(/icons/download-cloud.svg);"></i></a>--}}

            @can('sale_edit')
            <a class="btn btn-success" href="admin/invoice/{{$row->id}}/edit" title="ویرایش"><i class="icn white" style="background-image: url(/icons/pencil.svg);"></i></a>
            @endif

        </div>
    </li>
@endforeach
@endif

@if ($url_fetch == 'invoice-types' )
@foreach($invoices as $row)
<li class="content-ma display-flex lid">
        <div class="col-1 txt"><span>{{ $row->order_no }}</span></div>
        <div class="col-2 txt">
            <span>{{ \Morilog\Jalali\CalendarUtils::convertNumbers(jdate($row->created_at)->format('%H:%S - %Y/%m/%d')) }}</span>
        </div>
        <div class="col-2 txt"><span>{{ $row->customer_name }}</span></div>
        <div class="col-1 txt">
            <span>
                @foreach($companys as $row_co)
                    @if( $row_co->parentId == $row->company_id )
                        {{$row_co->name}}
                    @endif
                @endforeach
            </span>
        </div>
        <div class="col-1 txt badge-list">
            <span class="badge badge-info red">
                @switch($row->invoice_type)
                    @case('Proforma') غیررسمی @break
                    @case('Commerical') صورتحساب رسمی @break
                    @case('BeforeCommerical') پیش‌فاکتور رسمی @break
                    @case('BeforeInvoice') پیش‌فاکتور @break
                    @case('Sale') فاکتور فروش @break
                    @default -
                @endswitch
            </span>
        </div>
        <div class="col-2 txt">
            <span>{{ \Morilog\Jalali\CalendarUtils::convertNumbers(number_format( $row->total_amount)) }}</span>
        </div>
        <div class="col-1 txt">
            <span>
                @foreach($users as $row_ad)
                    @if( $row_ad->id == $row->created_by )
                        {{$row_ad->name ? $row_ad->name : $row_ad->username }}
                    @endif
                @endforeach
            </span>
        </div>
        <div class="col-2 tools">
        @can('sale_delete')
            @if($row->invoice_type != 'Commerical')
                <button class="btn btn-danger text-white delete-btn-sql" title="حذف" data-txt="شماره فاکتور {{ $row->order_no }}" data-id="{{ $row->id }}"><i class="icn white" style="background-image: url(/icons/trash-2.svg);"></i></button>
                <div class="bt-fr otw"><form class="delete-form-{{ $row->id }} hidden" action="{{ route('admin.invoice.destroy', $row->id) }}" method="POST">  @csrf @method('DELETE') <input class="hidden" type="text" name="company_id" autocomplete="off" value="{{ $row->company_id }}"><input class="hidden" type="text" name="order_no" autocomplete="off" value="{{ $row->order_no }}"></form></div>
            @else
                <button class="btn btn-perimary text-white disable"><i class="icn white" style="background-image: url(/icons/x.svg);"></i></button>
            @endif
        @endcan

        @php
            $orientation = '';
            if($row->invoice_type == 'Commerical') {
                $orientation = 'r';
            }elseif($row->invoice_type == 'BeforeCommerical') {
                $orientation = 'w';
            }elseif($row->invoice_type == 'BeforeInvoice') {
                $orientation = 'p';
            }elseif($row->invoice_type == 'Sale') {
                $orientation = 's';
            }
        @endphp

            <a class="btn btn-update text-white" href="{{  '/invoice/' . $row->order_no .'/'. $orientation .'/'. $row->hash .'.pdf' }}" target="_blank" title="پیش‌نمایش"><i class="icn white" style="background-image: url(/icons/printer.svg);"></i></a>
            {{--<a class="btn btn-warning text-white" href="{{ 'admin/invoice/' . $row->order_no . $orientation .'-'. $row->hash .'.pdf' }}" target="_blank" title="دانلود PDF"><i class="icn white" style="background-image: url(/icons/download-cloud.svg);"></i></a>--}}

            @can('sale_edit')
            <a class="btn btn-success" href="admin/invoice/{{$row->id}}/edit" title="ویرایش"><i class="icn white" style="background-image: url(/icons/pencil.svg);"></i></a>
            @endif

        </div>
    </li>
@endforeach
@endif
