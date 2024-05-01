<div class="title-ht toolbar">
    <i class="icn block fill" style="background-image:url('/icons/message-circle.svg');"></i>
    <h1 class="text-right">تماس با آی‌تی‌تلکام</h1>
</div>

<div style="padding:30px">

    <div class="img-box hidden">
        <img src="/assets/background/sale.svg" width="300" height="300" alt="sale">
    </div>

    <div class="cont-chat-box">
        @if ('Parhammee')
        <div class="cont-chat blue-2">
            <a class="link-oix telegram" href="https://t.me/share/url?url={{'Parhammee'}}" data-href="https://t.me/share/url?url={{'Parhammee'}}">
                <i class="icn white" style="background-image: url(/icons/telegram.svg);"></i>
                <div class="txt">
                    <div class="title-er bold">شروع مکالمه</div>
                    <div class="intro">آیدی تلگرام: {{'Parhammee'}}</div>
                </div>

            </a>
        </div>
        @endif

        @if ('+989215967805')
        <div class="cont-chat green">
            <a class="link-oix whatsapp" href="https://web.whatsapp.com/send?phone={{'+989215967805'}}" data-href="https://api.whatsapp.com/send?phone={{'+989215967805'}}">
                <i class="icn white" style="background-image: url(/icons/whatsapp.svg);"></i>
                <div class="txt">
                    <div class="title-er bold">شروع مکالمه</div>
                    <div class="intro">واتساپ</div>
                </div>
            </a>
        </div>
        @endif

        @if ('ittelecomco')
        <div class="cont-chat blue">
            <a class="link-oix" href="skype:{{'ittelecomco'}}?chat">
                <i class="icn white" style="background-image: url(/icons/skype.svg);"></i>
                <div class="txt">
                    <div class="title-er bold">شروع مکالمه</div>
                    <div class="intro">آیدی اسکایپ: {{'ittelecomco'}}</div>
                </div>
            </a>
        </div>
        @endif
    </div>

    <div class="clear"></div>

    <div class="info-map">
        <div class="txt-eer">برای اطلاعات بیشتر به راه‌های ارتباطی زیر مراجعه فرمایید.</div>
        <div class="col-u-12 que-ans-cont"><div class="txt qwe bold" style="background-image: url(/icons/map-pin.svg);">نشانی شرکت:</div><div class="txt ans">{{'تهران، جنت‌آباد جنوبی، انتهای خیابان چهارباغ غربی، پلاک ۵۵ '}}</div></div>
        <div class="col-u-12 que-ans-cont"><div class="txt qwe bold" style="background-image: url(/icons/tent.svg);">کدپستی:</div><div class="txt ans">{{ \Morilog\Jalali\CalendarUtils::convertNumbers('1473845845') }}</div></div>
        <div class="col-u-12 que-ans-cont"><div class="txt qwe bold" style="background-image: url(/icons/mail.svg);">رایانامه:</div> <div class="txt ans">{{'sale@ittelecom.ir'}}</div></div>
        <div class="col-u-12 que-ans-cont"><div class="txt qwe bold" style="background-image: url(/icons/phone.svg);">شماره تماس:</div><div class="txt ans ltr"><a class="ltr" href="tel:+982144446012">۰۲۱-۴۴۴۴۶۰۱۲</a></div></div>
        <div class="col-u-12 que-ans-cont"><div class="txt qwe bold" style="background-image: url(/icons/printer.svg);">شماره نمابر:</div><div class="txt ans">{{ \Morilog\Jalali\CalendarUtils::convertNumbers('021-45812575') }}</div></div>
        <div class="col-u-12 que-ans-cont"><div class="txt qwe bold" style="background-image: url(/icons/smartphone.svg);">شماره تلفن همراه:</div> <div class="txt ans">{{ \Morilog\Jalali\CalendarUtils::convertNumbers('+989215967805') }}</div></div>
        <div class="col-u-12 que-ans-cont"><div class="txt qwe bold" style="background-image: url(/icons/clock.svg);">ساعات کاری:</div> <div class="txt ans">{{'شنبه تا چهارشنبه از ساعت ۹ صبح الی ۵ بعد از ظهر'}}</div></div>
        <div class="aria-clearfix"></div>
    </div>

    <div class="clear"></div>

</div>
