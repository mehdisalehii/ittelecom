<div class="panel form-is">
    <div class="box white">
        <div class="form-input">
            <i class="icn fill" style="background-image: url(/icons/package.svg);"></i>
            <input class="type-text" placeholder=" نام کالا" title="نام کالا" type="text" name="title" value="{{ old('title', isset($stock) ? $stock->title : '') }}" autocomplete="off">
            <label class="txt @if(isset($stock)) @if($stock->title) active @endif @endif">نام کالا</label>
        </div>
        <div class="form-input">
            <i class="icn fill" style="background-image: url(/icons/qr-code.svg);"></i>
            <input class="type-text" placeholder=" پارت نامبر" title="پارت نامبر" type="text" name="part_no" value="{{ old('part_no', isset($stock) ? $stock->part_no : '') }}" autocomplete="off">
            <label class="txt @if(isset($stock)) @if($stock->part_no) active @endif @endif">پارت نامبر</label>
        </div>
        <div class="form-input">
            <i class="icn fill" style="background-image: url(/icons/binary.svg);"></i>
            <input class="type-text number-comma" placeholder="  تعداد کالا" title="تعداد کالا" type="text" name="number" value="{{ old('number', isset($stock) ?  number_format ( $stock->number ,0,'',',') : '') }}" autocomplete="off">
            <label class="txt @if(isset($stock)) @if($stock->number) active @endif @endif">تعداد کالا</label>
        </div>
    </div>
</div>