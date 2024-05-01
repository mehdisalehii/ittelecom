<nav class="tab-bar">

    <div class="wrapped">

        <div class="tabs-mobile grid grid-1 gap-0">

            <a class="tab block  @if(URL::current()==route('products_cat')) active @endif" href="{{route('products_cat')}}" title="خانه" itemprop="url"><i class="icn fill" style="background-image: url(/icons/layout-dashboard.svg);"></i><div class="txt bold">دسته‌بندی‌ها</div></a>

            <a class="tab block search-href-input  @if(URL::current()==route('home').'/search') active @endif" href="/search" title="جستجو" itemprop="url"><i class="icn fill" style="background-image: url(/icons/search.svg);"></i><div class="txt bold">جستجو</div></a>

            <a class="tab block  @if(URL::current()==route('home').'/contactus') active @endif" href="/contactus" title="ارتباط با ما" itemprop="url"><i class="icn fill" style="background-image: url(/icons/message-circle.svg);"></i><div class="txt bold">تماس</div></a>

            @auth('web')
                <a class="tab block  @if(URL::current()==route('admin.dashboard') ) active @endif" href="{{route('admin.dashboard')}}" title="داشبورد" itemprop="url"><i class="icn fill" style="background-image: url(/icons/user.svg);"></i><div class="txt bold">داشبورد</div></a>
            @endauth

            @guest('web')
                <a class="tab block  @if(URL::current()==route('home').'/login' ) active @endif" href="{{'/login'}}" title="ورود / ثبت‌نام" itemprop="url"><i class="icn fill" style="background-image: url(/icons/user.svg);"></i><div class="txt bold">ورود / ثبت‌نام</div></a>
            @endguest 

                {{--<<a class="block @if(URL::current()==route('home').'/browse') active @endif" href="/browse" title="دسته‌ها" itemprop="url"><i class="icn fill" style="background-image: url(/icons/layout-dashboard.svg);"></i><div class="txt bold">دسته‌ها</div></a>--}}
        
        </div>

    </div>

</nav>