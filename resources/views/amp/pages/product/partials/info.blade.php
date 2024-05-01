<div class="info">

<div class="title-ht toolbar">
    <h1 class="text-right">{{$title}}</h1>
</div>

<div class="info-right">

<div class="box-pa">
    <div class="box blue">
        <div class="pa-ic">
            <div class="cio txt"><div class="que">پارت نامبر محصول:</div><div class="txt extra"><h2 class="sku-number-txt">{{$product->sku_n}}</h2></div></div>
        </div>
    </div>
</div>

<div class="box-pa category">
    <div class="box default">
        <div class="pa-ic">
            <div class="cio txt">
                <div class="que">دسته‌بندی:</div>
                <ul class="extra txt">
                @foreach(explode(",", $product->menu_ids) as $split_cat)
                    @foreach($category_menu as $cat_menu  )
                        @if( $cat_menu->id == $split_cat )
                            <li><a href="products/cat/{{$cat_menu->slug}}" title="{{$cat_menu->title}}">{{$cat_menu->title}}</a>,</li>
                        @endif
                    @endforeach
                @endforeach
                <li></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="box-pa">
    <div class="box yellow">
        <div class="pa-ic">
            <i class="icn block fill float-right" style="background-image:url('/icons/verified.svg');"></i>
            پشتیبانی ضمانت محصول
        </div>
        <div class="pa-ic">
            <i class="icn block fill" style="background-image:url('/icons/truck.svg');"></i>
            <div class="txt">ارسال سریع به سراسر کشور</div>
        </div>
    </div>
</div>

<div class="box-pa">
    <div class="box orange big-icn">
        <i class="icn fill" style="background-image: url(/icons/fcc.svg);"></i>
        <i class="icn fill" style="background-image: url(/icons/ce.svg);"></i>
        <i class="icn fill" style="background-image: url(/icons/rohs.svg);"></i>
    </div>
</div>

@if($pdf)
<div class="box-pa attach">
    <ul class="box default-0">
        @foreach( explode(',',$pdf) as $item )
        <li class="pa-ic li-sd">
            <i class="icn fill" style="background-image: url(/icons/download-cloud.svg);"></i>
            <div class="txt bold"><a href="{{config('path.download.pdf')}}/{{$item}}.pdf" target="_blank">دانلود فایل راهنمای {{$item}}.pdf</a></div>
        </li>
        @endforeach
    </ul>
</div>
@endif


@if($zip)
<div class="box-pa attach">
    <ul class="box default-0">
        @foreach( explode(',',$zip) as $item )
        <li class="pa-ic li-sd">
            <i class="icn fill" style="background-image: url(/icons/download-cloud.svg);"></i>
            <div class="txt bold"><a href="{{config('path.download.zip')}}/{{$item}}.zip" target="_blank">دانلود فایل فشرده {{$item}}.zip</a></div>
        </li>
        @endforeach
    </ul>
</div>
@endif

</div>

<div class="info-left">

<div class="box-pa no-select">
    <div class="box rfr">
        <i class="icn fill" style="background-image: url(/icons/award.svg);"></i>
        <div class="que big bold">فروشنده: آی‌تی‌تلکام</div>
    </div>
</div>

<div class="box-pa eer no-select">
    <div class="box">
        <div class="qe">
            <i class="icn block fill" style="background-image:url('/icons/help-circle.svg');"></i>
            به مشاوره نیاز دارید؟<br>فقط کافیست با ما در میان بگذارید تا شما را راهنمایی کنیم.
        </div>
        <div class="ay">
            <div class="bold"><i class="icn block fill" style="background-image:url('/icons/phone.svg');"></i>تماس بگیرید</div>
            <div class="bold ltr"><a class="ltr" href="tel:+982144446012">۰۲۱-۴۴۴۴۶۰۱۲</a></div>
        </div>
    </div>
</div>

</div>

</div>
