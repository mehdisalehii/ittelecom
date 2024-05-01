<nav class="nav-bar" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
    <ul class="wrapped menu">
        <li class="menu-main list main-list menu-back  @if(strpos(URL::current(), 'shop') !== false || strpos(URL::current(), 'product') !== false ) active @endif">
            {{-- <a href="/shop" title="دسته‌بندی محصولات" class="extra product-cat-menu-link show-m  @if(strpos(URL::current(), 'shop') !== false || strpos(URL::current(), 'products/cat') !== false ) active @endif" itemprop="url"> --}}
            <a href="/products/cat" title="دسته‌بندی محصولات" class="extra product-cat-menu-link show-m  @if(strpos(URL::current(), 'shop') !== false || strpos(URL::current(), 'products/cat') !== false ) active @endif" itemprop="url">
                <i class="icn block white" style="background-image:url('/icons/menu.svg');"></i>
                <h2>دسته‌بندی  محصولات</h2><i class="icn block white arrow" style="background-image:url('/icons/chevron-down.svg');"></i>
            </a>
            @if( URL::current() == route('home') )
                <div class="list-general data-cpy data"></div>
            @else
                <div class="list-general">
                    @include('components.app.navlist')
                </div>
            @endif
        </li>
        <li class="menu-link menu-back">
            <ul>
                <li class="main-list line shop-link"><a href="/shop" title="فروشگاه" class="extra shop  @if(URL::current()==route('home').'/shop' || strpos(URL::current(), 'shop') !== false ) active @endif" itemprop="url"><i class="icn block fill" style="background-image:url('/icons/package.svg');"></i>فروشگاه</a></li>
                <li class="main-list line"><a href="/blog" title="بلاگ" class="extra blog  @if(URL::current()==route('home').'/blog' || strpos(URL::current(), 'category/article') !== false ) active @endif" itemprop="url"><i class="icn block fill" style="background-image:url('/icons/book-open.svg');"></i>بلاگ</a></li>
                <li class="main-list line last">
                <a href="/forum" title="انجمن" class="extra lin-acs  @if(URL::current()==route('home').'/forum') active @endif" itemprop="url">
                <i class="icn block fill" style="background-image:url('/icons/users.svg');"></i>
                انجمن
                </a>
                </li>

                <li class="information line line-left">
                <span class="txt contact-two0">
                    <a class="ltr" style="margin:0; padding:0;" href="tel:+982144446012">
                        <i class="icn block fill" style="background-image:url('/icons/phone-call.svg');"></i>
                        ۰۲۱-۴۴۴۴۶۰۱۲
                    </a>
                </span>
                </li>
                <li class="information line line-left last">
                    <span class="txt">
                        <a class="ltr" style="margin:0; padding:0;" href="mailto:sale@ittelecom.ir">
                            <i class="icn block fill" style="background-image:url('/icons/mail.svg');"></i>
                            sale@ittelecom.ir
                        </a>
                    </span>
                </li>
                <li class="nav-toolbar-edit"></li>
                {{--<li class="information last link hidden"><span class="txt btn-border"><div class="border block" data-href="{{'/login'}}" title="درخواست پشتیبانی"><i class="icn fill" style="background-image: url(/icons/help-circle.svg);"></i>درخواست پشتیبانی</div></span></li>--}}
            </ul>
        </li>
    </ul>
</nav>
