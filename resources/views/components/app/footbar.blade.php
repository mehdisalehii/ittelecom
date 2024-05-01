<div class="pic-top-footer" style="background-image: url(/assets/background/town-3.png?t=170147);"></div>
<div class="footer" itemscope="itemscope" itemtype="https://schema.org/WPFooter">
    <div class="wrapped">
        <div class="foot-ar">
            <div class="foot-links">
                <div class="part links">
                    <span class="head bold">پیوندهای دسترسی</span>
                    <ul>
                        <li><a href="/forum" class="@if(strpos(URL::current(), 'forum') !== false ) active @endif" title="انجمن" itemprop="url">انجمن</a></li>
                        <li><a href="/contactus" class="@if(strpos(URL::current(), 'contactus') !== false ) active @endif" title="تماس با آی‌تی‌تلکام" itemprop="url">ارتباط با ما</a></li>
                        <li><a href="/aboutus" class="@if(strpos(URL::current(), 'aboutus') !== false ) active @endif" title="درباره آی‌تی‌تلکام" itemprop="url">درباره ما</a></li>
                    </ul>
                </div>
                <div class="part links">
                    <span class="head bold">خدمات</span>
                    <ul>
                        <li><a href="/blog" class="@if(strpos(URL::current(), 'blog') !== false ) active @endif" title="بلاگ" itemprop="url">بلاگ</a></li>
                        <li><a href="/shop" class="@if(strpos(URL::current(), 'shop') !== false ) active @endif" title="فروشگاه" itemprop="url">فروشگاه</a></li>
                    </ul>
                </div>
                <div class="part links contactus">
                    <span class="head bold">راه‌های ارتباطی با ما</span>
                    <div class="aria-clearfix"></div>
                    <table style="width:100%; line-height:1.7rem; border-collapse: separate; border-spacing: 0.7rem;">
                        <tr>
                            <td width="40" style="vertical-align: middle;">
                                <i class="icn block white" style="background-image:url('/icons/phone-call.svg');"></i>
                            </td>
                            <td style="vertical-align: middle;">
                                <a class="ltr" href="tel:+982144446012">۰۲۱-۴۴۴۴۶۰۱۲</a>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle;">
                                <i class="icn block white" style="background-image:url('/icons/mail.svg');"></i>
                            </td>
                            <td style="vertical-align: middle;">
                                <a href="mailto:sale@ittelecom.ir">
                                    {{ \Morilog\Jalali\CalendarUtils::convertNumbers('sale@ittelecom.ir') }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle;">
                                <i class="icn block white" style="background-image:url('/icons/map.svg');"></i>
                            </td>
                            <td style="vertical-align: middle;">
                                <span class="content">تهران، جنت‌آباد جنوبی، انتهای خیابان چهارباغ غربی، پلاک ۵۵ </span>
                            </td>
                        </tr>
                    </table>
                    <div class="aria-clearfix"></div>
                </div>
                <div class="footer-flag foot-social part">
                    <table>
                        <tr>
                            <td style="width:30px"></td>
                            <td style="text-align:center;">
                                <ul class="flag">
                                    <li style="background-color: #d9d9d9; margin-left:24px;">
                                        <a referrerpolicy="origin" target="_blank" href="https://trustseal.enamad.ir/?id=181911&Code=qLjavg1wIWTDp9i5Q4vs" class="block" title="اینماد">
                                            {{-- <img referrerpolicy="origin" src="https://Trustseal.eNamad.ir/logo.aspx?id=181911&Code=qLjavg1wIWTDp9i5Q4vs" alt="" style="cursor:pointer" id="qLjavg1wIWTDp9i5Q4vs"> --}}
                                            <img referrerpolicy="origin" src="/icons/cert/enamad.png" alt="نماد اعتماد" style="cursor:pointer" id="qLjavg1wIWTDp9i5Q4vs" width="85">
                                        </a>
                                    </li>
                                    <li style="background-color: #d9d9d9; margin-left:24px;">
                                        {{--https://logo.samandehi.ir/Verify.aspx?id=196736&p=rfthpfvlgvkajyoexlaogvka--}}
                                        <a target="_blank" href="https://logo.saramad.ir/verify.aspx?CodeShamad=1-1-772323-65-0-1" class="block" title="ساماندهی">
                                            <img src="/icons/cert/resaneh.png" alt="samandehi" width="85"/>
                                        </a>
                                    </li>
                                </ul>
                                <div class="aria-clearfix"></div>
                                <div style="background-color: #fff; height:1.1px; width:243px; margin:0.5rem 0"></div>
                                <div class="aria-clearfix"></div>
                                <ul class="links-wcd bold">
                                    {{--                        @if (\App\Models\Setting::where('name', 'facebook')->first()?->value) <li><a class="block" href="{{\App\Models\Setting::where('name', 'facebook')->first()?->value}}" title="فیسبوک" itemprop="url"><i class="icn block white" style="background-image:url('/icons/facebook.svg');"></i></a></li> @endif--}}
                                    {{--                        @if (\App\Models\Setting::where('name', 'twitter')->first()?->value) <li><a class="block" href="{{\App\Models\Setting::where('name', 'twitter')->first()?->value}}" title="تویتتر" itemprop="url"><i class="icn block white" style="background-image:url('/icons/twitter.svg');"></i></a></li> @endif--}}
                                    <li><a class="block" href="//instagram.com/ittelecomco" title="اینستاگرام" itemprop="url"><i class="icn block white" style="background-size: contain; background-image:url('/icons/instagram.svg');"></i></a></li>
                                    {{--                        @if (\App\Models\Setting::where('name', 'linkedin')->first()?->value) <li><a class="block" href="{{\App\Models\Setting::where('name', 'linkedin')->first()?->value}}" title="لینکدین" itemprop="url"><i class="icn block white" style="background-image:url('/icons/linkedin.svg');"></i></a></li> @endif--}}
                                    <li><a class="block" href="//t.me/Parhammee" title="تلگرام" itemprop="url"><i class="icn block white" style="background-size: contain; background-image:url('/icons/telegram.svg');"></i></a></li>
                                    <li><a class="block" href="//www.aparat.com/ittelecom" title="آپارات" itemprop="url"><i class="icn block white" style="background-size: contain; background-image:url('/icons/aparat.svg');"></i></a></li>
                                    <li><a class="block" href="//www.pinterest.com/ittelecomco" title="پینترست" itemprop="url"><i class="icn block white" style="background-size: contain; background-image:url('/icons/pinterest.svg');"></i></a></li>
                                </ul>
                                <div class="aria-clearfix"></div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
     <div class="copyright">
        <div class="content">
            <div class="foot-copyright">کلیه حقوق این سایت متعلق به فروشگاه اینترنتی آی‌تی‌تلکام (آرمان تجارت هوشمند اهورا) می‌باشد.</div>
        </div>
    </div>
</div>
<div class="btn-top" title="بالا"><i class="icn block white" style="background-image:url('/icons/arrow-up.svg');"></i></div>
