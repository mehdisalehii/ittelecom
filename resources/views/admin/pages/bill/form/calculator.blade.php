<input class="total_item_input hidden" value="0" autocomplete="off">
<input class="grand_total_val_input hidden" name="sum_qty" value="0" autocomplete="off">
<input class="grand_total_input hidden" name="total_amount" value="0" autocomplete="off">



<div class="box gray col-11">
    <div class="panel-btn-side">
        <div class="txt">هزینه‌ها:</div>
        <div>
            <div class="form-input">
                <label class="txt @if(isset($bill)) @if($bill->name) active @endif @endif">حمل و نقل: </label>
                <input class="type-text number-comma" placeholder="  حمل و نقل" title="حمل و نقل" name="total_amount" value="{{ old('total_amount', isset($bill) ? number_format ( $bill->total_amount ,0,'', ',') : '') }}" autocomplete="off">
                <label class="txt @if(isset($bill)) @if($bill->name) active @endif @endif">ریال</label>
            </div>
        </div>
    </div>
</div>

{{-- 
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
        <div class="bo-ete  @if(!isset($bill)) hidden @endif">
            <div class="txt">تعداد لیست‌ها: <span class="total-count-txt bold">@if(isset($bill)) {{$i_count}} @else 0 @endif</span> </div>
            <input class="total_item_input hidden" value="{{$i_count ?? ''}}" autocomplete="off">
        </div>
        <div class="bo-ete">
            <div class="txt">تعداد کل کالا: <span class="grand_total_val bold">@if(isset($bill)) {{ $sum_qty }} @else 0 @endif</span> </div>
            <input class="grand_total_val_input hidden" name="sum_qty" value="{{$sum_qty ?? ''}}" autocomplete="off">
        </div>           
        <div class="bo-ete">
            <div class="txt">جمع کل مالیات: 
                @php 
                    $amount_tot = $bill->total_amount ?? '0'; 
                    $amount_arzesh_afz = $amount_tot*0.09;
                @endphp
                <span class="gr_arzesh_afzodeh bold">@if(isset($bill)) {{ number_format ( $amount_arzesh_afz ,2,'.', ',') }} @else 0 @endif</span> ریال
            </div>
        </div>
        <div class="bo-ete">
            <div class="txt last">قیمت کل نهایی: <span class="grand_total bold">@if(isset($bill)) {{  number_format ( $bill->total_amount ,0,'', ',') }} @else 0 @endif</span> ریال</div>
            <input class="grand_total_input hidden" name="total_amount" value="@if(isset($bill)){{ $bill->total_amount }}@else{{'0'}}@endif" autocomplete="off">
        </div>
    </div>
</div> --}}