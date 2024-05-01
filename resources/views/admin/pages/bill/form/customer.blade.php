<div class="title">مشخصات خریدار</div>

<div class="box form-word panel-btn-side right form-type-wetr">

    <div class="bt-fr otw">
        <input class="type-text hidden" name="created_by" value="{{ $bill->created_by ?? '' }}">
        <input class="type-text hidden" name="hash" value="{{ $bill->hash ?? '' }}">
    </div>

    <div class="form-input float-right">
        <label class="txt @if(isset($bill)) @if($bill->name) active @endif @endif">نام خریدار (شخص حقیقی/حقوقی)</label>
        <input class="type-text" title="نام خریدار (شخص حقیقی/حقوقی)" name="name" value="{{$bill->name ?? ''}}" autocomplete="off">
    </div>


    <div class="clear"></div>
</div>