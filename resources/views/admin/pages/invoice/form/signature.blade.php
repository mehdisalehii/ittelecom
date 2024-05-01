<div class="form-radio form-group-item box gray col-11 last form-type-wetr form-no-enter">
<div class="label-txt">مهر و امضاء:</div>
    <ul class="ul-lists full relative z-0">
        <li class="col-12">
            <input type="radio" id="signature0" name="signatures" value="0" autocomplete="off" @if(isset($invoice)){{ $invoice->signature == 'blank' ||  $invoice->signature == '0' ||  $invoice->signature == 'stamp'  ? 'checked' : ''}} @else checked="checked" @endif>
            <label title="پیش فرض" for="signature0">پیش فرض</label>
        </li>
        @foreach($companys_group as $row_com)
        <li class="col-12">
            <input type="radio" id="signature{{$row_com->id}}" name="signatures" value="{{$row_com->id}}" autocomplete="off" @if(isset($invoice)){{ $invoice->signature == $row_com->id ? 'checked' : ''}}@endif>
            <label for="signature{{$row_com->id}}" title="{{$row_com->name}}">{{$row_com->name}}</label>
        </li>
        @endforeach
    </ul>
    <input class="type hidden" type="text" name="signature" value="{{ old('signature', isset($invoice) ? $invoice->signature : '0') }}" autocomplete="off">
    <div class="clear"></div>
</div>