<div class="title">مشخصات خریدار</div>

<div class="box form-word panel-btn-side right form-type-wetr form-no-enter">

    <div class="bt-fr otw">
        <input class="type-text hidden" name="created_by" value="{{ $invoice->created_by ?? '' }}">
        <input class="type-text hidden" name="hash" value="{{ $invoice->hash ?? '' }}">
    </div>

    <div class="form-input float-right">
        <label class="txt @if(isset($invoice)) @if($invoice->customer_name) active @endif @endif">نام خریدار (شخص حقیقی/حقوقی)</label>
        <input class="type-text" title="نام خریدار (شخص حقیقی/حقوقی)" name="customer_name" value="{{$invoice->customer_name ?? ''}}" autocomplete="off">
    </div>

    <div class="form-input input-rasmi float-right">
        <label class="txt @if(isset($invoice)) @if($invoice->customer_economynum) active @endif @endif">شماره اقتصادی</label>
        <input class="type-text number-comma0" title="شماره اقتصادی" name="customer_economynum" value="@if(isset($invoice)){{ $invoice->customer_economynum == '0' ||  $invoice->customer_economynum == ''  ? '' :  $invoice->customer_economynum  }}@endif" autocomplete="off">
    </div>

    <div class="form-input input-rasmi float-right">
        <label class="txt @if(isset($invoice)) @if($invoice->customer_regnationalnum) active @endif @endif">شماره ثبت/شناسه ملی</label>
        <input class="type-text number-comma0" title="شماره ثبت/شناسه ملی" name="customer_regnationalnum" value="@if(isset($invoice)){{ $invoice->customer_regnationalnum == '0' || $invoice->customer_regnationalnum == ''  ? '' : $invoice->customer_regnationalnum  }}@endif" autocomplete="off">
    </div>

    <div class="form-input float-right">
        <label class="txt @if(isset($invoice)) @if($invoice->customer_tel) active @endif @endif">شماره تلفن</label>
        <input class="type-text number-required" title="شماره تلفن" name="customer_tel" value="{{$invoice->customer_tel ?? ''}}" autocomplete="off" >
    </div>

    <div class="form-input float-right">
        <label class="txt @if(isset($invoice)) @if($invoice->customer_fax) active @endif @endif">شماره نمابر</label>
        <input class="type-text number-required" title="شماره نمابر" name="customer_fax" value="{{$invoice->customer_fax ?? ''}}" autocomplete="off">
    </div>

    @if ( old('customer_fax', isset($invoice) ? $invoice->customer_city : '') )
    <div class="form-input float-right">
        <label class="txt @if(isset($invoice)) @if($invoice->customer_city) active @endif @endif">شهر</label>
        <input class="type-text" title="شهر" name="customer_city" value="{{$invoice->customer_city ?? ''}}" autocomplete="off">
    </div>
    @endif

    @if ( old('customer_fax', isset($invoice) ? $invoice->customer_country : '') )
    <div class="form-input float-right">
        <label class="txt @if(isset($invoice)) @if($invoice->customer_country) active @endif @endif">شهرستان</label>
        <input class="type-text" title="شهرستان" name="customer_country" value="{{$invoice->customer_country ?? ''}}" autocomplete="off">
    </div>
    @endif

    <div class="form-textarea float-right w-full flex mb-5">
        <label class="txt @if(isset($invoice)) @if($invoice->customer_address) active @endif @endif">نشانی</label>
        <div class="textarea-form w-full">
            <textarea name="customer_address" class="textarea editor type-text hidden" autocomplete="off" placeholnder="  نشانی" tintle="نشانی" @if(isset($invoice)){{ $invoice->customer_address ? 'rows=3' : 'rows=1' }}@endif cols="1">@if(isset($invoice)){{$invoice->customer_address}}@endif</textarea>
        </div>
    </div>

    <div class="form-input float-right">
        <label class="txt @if(isset($invoice)) @if($invoice->customer_zipcode) active @endif @endif">کدپستی</label>
        <input class="type-text" title="کدپستی" name="customer_zipcode" value="{{$invoice->customer_zipcode ?? ''}}" autocomplete="off">
    </div>

    <div class="clear"></div>
</div>
