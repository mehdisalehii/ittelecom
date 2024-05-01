@if(isset($invoice))

<div class="form-radio col-6 form-group last">
<div class="label-txt">نام فروشنده:</div>

    @foreach($companys as $row_com)
        @if($row_com->parentId == $invoice->company_id)
        <input class="data-lastnum data-grouplist" type="radio" id="company{{$row_com->id}}" data-lastnum="{{$row_com->number_last}}" data-group="{{$row_com->styled}}" name="companys" value="{{$row_com->parentId}}" autocomplete="off" checked disabled=disabled>
        <label for="company{{$row_com->id}}" title="{{$row_com->name}}">{{$row_com->name}}</label>
        @endif
    @endforeach

    <input class="type hidden" type="text" name="company_id" value="{{$invoice->company_id}}" autocomplete="off">
    <input class="lastnum hidden" type="text" name="order_no" value="{{$invoice->order_no}}" autocomplete="off">
</div>
<div class="form-radio form-group last chek">
<div class="label-txt data-group-txt">نوع فاکتور:</div>

    @php $i = 0; @endphp
    @foreach($companys as $row_com)
        @if($invoice->invoice_type == $row_com->type)
        <div class="data-group" data-group="{{$row_com->styled}}">
            <input class="data-lastnum " type="radio" id="type{{$row_com->id}}" data-lastnum="{{$row_com->number_last}}" name="type" value="{{$row_com->type}}" autocomplete="off" checked disabled=disabled>
            <label for="type{{$row_com->id}}" title="{{$row_com->title}}">{{$row_com->title}}</label>                            
        </div>
            @php $i++; @endphp
            @if($i == 1) @break @endif
        @endif
    @endforeach

    <input class="type hidden" type="text" name="invoice_type" value="{{$invoice->invoice_type}}" autocomplete="off">
</div>

@else

<div class="form-radio form-group last-0">
<div class="label-txt">نام فروشنده:</div>

    @foreach($companys_group as $row_com)
        <input class="data-lastnum data-grouplist" type="radio" id="company{{$row_com->id}}" data-lastnum="{{$row_com->number_last}}" data-group="{{$row_com->styled}}" name="companys" value="{{$row_com->parentId}}" autocomplete="off">
        <label for="company{{$row_com->id}}" title="{{$row_com->name}}">{{$row_com->name}}</label>
    @endforeach

</div>
<div class="form-radio form-group last chek hide">
<div class="label-txt data-group-txt">نوع فاکتور:</div>

<ul class="radio-show">
@foreach($companys as $row_com)
    <li class="radio-show hidden">
        <input disabled=disabled type="radio" id="type{{$row_com->id}}" value="{{$row_com->type}}" autocomplete="off">
        <label for="type{{$row_com->id}}" title="{{$row_com->title}}">{{$row_com->title}}</label>
        <span class="message red bold hidden">لطفا نام فروشنده را انتخاب کنید.</span>                            
    </li>
@endforeach
</ul>

    @foreach($companys as $row_com)
        <div class="data-group hidden" data-group="{{$row_com->styled}}">
            <input class="data-lastnum data-type-bt" type="radio" id="type{{$row_com->id}}" data-lastnum="{{$row_com->number_last}}" name="type" value="{{$row_com->type}}" data-parent="{{$row_com->parentId}}" autocomplete="off">
            <label for="type{{$row_com->id}}" title="{{$row_com->title}}">{{$row_com->title}}</label>                            
        </div>
    @endforeach

    <input class="company hidden" type="text" name="company_id" autocomplete="off">
    <input class="lastnum order_no hidden" type="text" name="order_no" autocomplete="off">
    <input class="type type-group hidden" type="text" name="invoice_type" autocomplete="off">
</div>

@endif

