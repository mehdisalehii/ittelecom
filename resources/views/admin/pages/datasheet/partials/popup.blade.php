<div class="popup-form">

@component('components.popup')
    @slot('data','title')
    @slot('style','width:570px;height:250px')
    @slot('option','')
    @slot('title','عنوان و ادرس دیتاشیت')
    @slot('type','')
    @slot('fetch','')
    @slot('btn','btn-ok-title')

        <div class="form-group position-relative" data-txt="title-get-kit">
            {{-- <label>عنوان</label> --}}
            <input class="title-get input" data-txt="title-get-kit" placeholder=" عنوان دیتاشیت" title="عنوان دیتاشیت" value="{{ old('title', isset($datasheet) ? $datasheet->title : '') }}" data-id="{{ old('title', isset($datasheet) ? $datasheet->id : '') }}" autocomplete="off">
        </div>

        <div class="form-group relative float-right w-full" data-txt="slug-get"> 
            <span class="col-5 bold direction-ltr float-left">{{ route('home') }}/dl/catalog/</span>
            <div class="slug-par relative float-left">
                <input class="slug-get input col-7 direction-ltr {{ URL::current() == route('admin.datasheet.create') ? 'create' : '' }}" name="slug" data-txt="slug-get" placeholder=" ادرس دیتاشیت" title="ادرس دیتاشیت" value="{{ old('slug', isset($datasheet) ? $datasheet->slug : '') }}" data-id="{{ old('title', isset($datasheet) ? $datasheet->id : '') }}" autocomplete="off">
                <div class="check-url-result">
                    <i class="icn fill ico-ok {{ old('slug', isset($datasheet) ? 'show' : '') }}" style="background-image: url(/icons/check-circle-2.svg);" title="عالی"></i>
                    <i class="icn fill ico-x" style="background-image: url(/icons/x-circle.svg);"  title="مشکل دارد"></i>
                </div>      
            </div>
            <span class="col-1 bold float-left direction-ltr">.pdf</span>   
        </div>

@endcomponent

@component('components.popup')
    @slot('data','change')
    @slot('style','width:550px;height:250px')
    @slot('option','')
    @slot('title','تغییرات ویرایش')
    @slot('type','')
    @slot('fetch','')
    @slot('btn','btn-ok-title')

        <ul>
            @isset($todos)
                @foreach ($todos as $todo)
                    <li class="col-12">
                        <span>
                        {{$loop->index}}. تاریخ:
                        {{ \Morilog\Jalali\CalendarUtils::convertNumbers(jdate($todo->created_at)->format('%H:%S - %Y/%m/%d')) }}
                        </span>
                        <span>توسط:‌{{$todo->user}}</span>
                    </li>   
                @endforeach                
            @endisset
        </ul>

@endcomponent

@can('admin_view')
@component('components.popup')
    @slot('data','partno')
    @slot('style','width:550px;height:200px')
    @slot('option','')
    @slot('title','پارت نامبر')
    @slot('type','')
    @slot('fetch','')
    @slot('btn','btn-ok-part-no')

        <div class="form-radio form-group-item last select-mid">
            <div class="box-wie @isset($datasheet) @if($datasheet->sku == '-') hidden @endif @endisset">
                <input class="input sku-number-get typer-get input-wie w-full" type="text" value="{{ old('sku', isset($datasheet) ?  $datasheet->sku_n  : $sku_n ) }}" autocomplete="off">
                <span class="out-box skunumber">P/N: <span class="bold upper span-wie">@if(isset($datasheet)) {{$datasheet->sku_n}} @else - @endif</span></span>
            </div>
            <div class="form-checkbox">
                <input id="wie" type="checkbox" class="wie" autocomplete="off" @isset($datasheet) @if($datasheet->sku == '-') checked @endif @endisset>
                {{-- <label for="wie" title="بدون پارت نامبر" >بدون پارت نامبر</label> --}}
            </div>
        </div>

@endcomponent
@endcan

</div>