@php 
    $i_count = 0;
    $sum_qty = 0;
@endphp

@php if(!isset($InvoiceItem)) { $InvoiceItem = []; } @endphp
@foreach ( $InvoiceItem as $row_item ) 
    @php 
        $i_count++;
        $sum_qty += $row_item->quantity;
    @endphp
@endforeach

<div class="box form-type-wetr form-no-enter">
    <div class="panel-btn-side">
        <div class="bo-ete  @if(!isset($invoice)) hidden @endif">
            <div class="txt">تعداد لیست‌ها: <span class="total-count-txt bold">@if(isset($invoice)) {{$i_count}} @else 0 @endif</span> </div>
            <input class="total_item_input hidden" value="{{$i_count ?? ''}}" autocomplete="off">
        </div>
        <div class="bo-ete">
            <div class="txt">تعداد کل کالا: <span class="grand_total_val bold">@if(isset($invoice)) {{ $sum_qty }} @else 0 @endif</span> </div>
            <input class="grand_total_val_input hidden" name="sum_qty" value="{{$sum_qty ?? ''}}" autocomplete="off">
        </div>           
        <div class="bo-ete">
            <div class="txt">جمع کل مالیات: (%{{ $tax_percent}}) 
                @php 
                    $amount_tot = $invoice->total_amount ?? '0'; 
                    $amount_arzesh_afz = $amount_tot*0.010;
                @endphp
                <span class="gr_arzesh_afzodeh bold">@if(isset($invoice)) {{ number_format ( $amount_arzesh_afz ,2,'.', ',') }} @else 0 @endif</span> ریال
            </div>
        </div>
        <div class="bo-ete">
            <div class="txt last">قیمت کل نهایی: <span class="grand_total bold">@if(isset($invoice)) {{  number_format ( $invoice->total_amount ,0,'', ',') }} @else 0 @endif</span> ریال</div>
            <input class="grand_total_input hidden" name="total_amount" value="@if(isset($invoice)){{ $invoice->total_amount }}@else{{'0'}}@endif" autocomplete="off">
        </div>
    </div>
</div>