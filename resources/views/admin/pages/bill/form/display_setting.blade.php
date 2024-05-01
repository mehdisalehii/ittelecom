<div class="form-checkbox last inline-table form-group chek @if(!isset($bill))  hide @endif">
    {{-- <div class="label-txt">تنظیمات نمایش:</div> --}}

    <ul class="ul-lists">
        <li data-txt="1" class=" @if(isset($bill)) {{$bill->show_company=='1' ? 'active' : ''}} @else active @endif">
            <i class="check"></i>
            <div class="type-checkbox">اطلاعات فروشنده</div>
        </li>
    </ul>
    <input class="type hidden" type="text" name="show_company" value="{{ old('show_company', isset($bill) ? $bill->show_company : '1') }}">

    <ul class="ul-lists">
        <li data-txt="arzesh-afzodeh-show" class=" @if(isset($bill)) {{$bill->tax=='arzesh-afzodeh-show' ? 'active' : ''}} @endif">
            <i class="check"></i>
            <div class="type-checkbox">ارزش افزوده</div>
        </li>
    </ul>
    <input class="type hidden" type="text" name="tax" value="{{ old('tax', isset($bill) ? $bill->tax : '') }}">

    <ul class="ul-lists hidden">
        <li data-txt="on" class="@if(isset($bill)) {{$bill->headerfooter=='on' ? 'active' : ''}} @endif">
            <i class="check"></i>
            <div class="type-checkbox">آرم</div>
        </li>
    </ul>
    <input class="type hidden" type="text" name="headerfooter" value="{{ old('headerfooter', isset($bill) ? $bill->headerfooter : '') }}">

</div>

<div class="form-radio hidden">
<div class="label-txt">واحد پول:</div>
    <input type="radio" id="money1" name="money" value="reial" autocomplete="off" checked="checked"><label for="money1">ریال</label>
    {{--<input type="radio" id="money2" name="money" value="usd" autocomplete="off" {{$bill->price_unit=='usd' ? 'checked' : ''}}><label for="money2">دلار</label>
    <input type="radio" id="money3" name="money" value="euro" autocomplete="off" {{$bill->price_unit=='euro' ? 'checked' : ''}}><label for="money3">یورو</label>
    <input type="radio" id="money4" name="money" value="rmb" autocomplete="off" {{$bill->price_unit=='rmb' ? 'checked' : ''}}><label for="money4">RMB</label>--}}
    <input class="type hidden" type="text" name="price_unit" value="reial">
</div>


<div class="clear"></div>