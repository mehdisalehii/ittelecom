<div class="panel form-is">
    <div class="box white">
        <div class="form-input">
            <i class="icn fill" style="background-image: url(/icons/gem.svg);"></i>
            <input class="type-text" placeholder=" نام شرکت" title="نام شرکت" type="text" name="name" value="{{ old('name', isset($company) ? $company->name : '') }}" autocomplete="off">
            <label class="txt @if(isset($company)) @if($company->name) active @endif @endif">نام شرکت</label>
        </div>
        <div class="form-input">
            <i class="icn fill" style="background-image: url(/icons/clipboard-list.svg);"></i>
            <input class="type-text" placeholder=" نوع فاکتور" title="نوع فاکتور" type="text" name="title" value="{{ old('title', isset($company) ? $company->title : '') }}" autocomplete="off">
            <label class="txt @if(isset($company)) @if($company->title) active @endif @endif">نوع فاکتور</label>
        </div>
        <div class="form-input">
            <i class="icn fill" style="background-image: url(/icons/binary.svg);"></i>
            <input class="type-text number-comma" placeholder="  شماره فاکتور بعدی" title="شماره فاکتور بعدی" type="text" name="number_last" value="{{ old('number_last', isset($company) ?  number_format ( $company->number_last ,0,'',',') : '') }}" autocomplete="off">
            <label class="txt @if(isset($company)) @if($company->number_last) active @endif @endif">شماره فاکتور بعدی</label>
        </div>
    </div>
</div>


<div class="panel form-is">
    <div class="box white">
        <div class="form-input">
            <i class="icn fill" style="background-image: url(/icons/binary.svg);"></i>
            <input class="type-text" placeholder="  شماره اقتصادی" title="شماره اقتصادی" type="text" name="economynum" value="{{ old('economynum', isset($company) ? $company->economynum : '') }}" autocomplete="off">
            <label class="txt @if(isset($company)) @if($company->economynum) active @endif @endif">شماره اقتصادی</label>
        </div>
        <div class="form-input">
            <i class="icn fill" style="background-image: url(/icons/file-digit.svg);"></i>
            <input class="type-text" placeholder="  شماره ثبت/شناسه ملی" title="شماره ثبت/شناسه ملی" type="text" name="regnationalnum" value="{{ old('regnationalnum', isset($company) ? $company->regnationalnum : '') }}" autocomplete="off">
            <label class="txt @if(isset($company)) @if($company->regnationalnum) active @endif @endif">شماره ثبت/شناسه ملی</label>
        </div>
    </div>
</div>
<div class="panel form-is">
    <div class="box white">
        <div class="form-input">
            <i class="icn fill" style="background-image: url(/icons/mail.svg);"></i>
            <input class="type-text" placeholder="  ایمیل" title="ایمیل" type="text" name="email" value="{{ old('email', isset($company) ? $company->email : '') }}" autocomplete="off">
            <label class="txt @if(isset($company)) @if($company->email) active @endif @endif">ایمیل</label>
        </div>
        <div class="form-input">
            <i class="icn fill" style="background-image: url(/icons/phone.svg);"></i>
            <input class="type-text" placeholder="  شماره تلفن" title="شماره تلفن" type="text" name="telnum" value="{{ old('telnum', isset($company) ? $company->telnum : '') }}" autocomplete="off">
            <label class="txt @if(isset($company)) @if($company->telnum) active @endif @endif">شماره تلفن</label>
        </div>
        <div class="form-input">
            <i class="icn fill" style="background-image: url(/icons/printer.svg);"></i>
            <input class="type-text" placeholder="  شماره فکس" title="شماره فکس" type="text" name="fax" value="{{ old('fax', isset($company) ? $company->fax : '') }}" autocomplete="off">
            <label class="txt @if(isset($company)) @if($company->fax) active @endif @endif">شماره فکس</label>
        </div>
        <div class="form-input">
            <i class="icn fill" style="background-image: url(/icons/phone.svg);"></i>
            <input class="type-text" placeholder="  شماره موبایل" title="شماره موبایل" type="text" name="mobile" value="{{ old('mobile', isset($company) ? $company->mobile : '') }}" autocomplete="off">
            <label class="txt @if(isset($company)) @if($company->mobile) active @endif @endif">شماره موبایل</label>
        </div>
    </div>
</div>
<div class="panel form-is">
    <div class="box white">
        <div class="form-input">
            <i class="icn fill" style="background-image: url(/icons/map.svg);"></i>
            <input class="type-text" placeholder="  آدرس" title="آدرس" type="text" name="adderss" value="{{ old('adderss', isset($company) ? $company->adderss : '') }}" autocomplete="off">
            <label class="txt @if(isset($company)) @if($company->adderss) active @endif @endif">آدرس</label>
        </div>
        <div class="form-input">
            <i class="icn fill" style="background-image: url(/icons/tent.svg);"></i>
            <input class="type-text" placeholder="  کد پستی" title="کد پستی" type="text" name="zipcode" value="{{ old('zipcode', isset($company) ? $company->zipcode : '') }}" autocomplete="off">
            <label class="txt @if(isset($company)) @if($company->zipcode) active @endif @endif">کد پستی</label>
        </div>
    </div>
</div>