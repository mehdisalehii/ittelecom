<nav class="main-bar close-search-ani" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
    <div class="wrapped">
        <div class="search-logo">
            <div class="logo">
                <a class="block text-center" href="{{route('home')}}" title="فروشگاه اینترنتی آی‌تی‌ تلکام" itemprop="url">
                    <h1 class="text-center"><img alt="فروشگاه اینترنتی آی‌تی‌ تلکام" src="/assets/logo/logo.svg" width="150px"></h1>
                </a>
            </div>
            <div class="aria-clearfix"></div>


            <div class="search">
                <div class="box-search">
                    @if(\Illuminate\Support\Facades\URL::current() !== route('forum.index'))
                        <input class="search-input" placeholder='جستجو در ITTelecom' maxlength="2048" name="keyword" type="text" aria-autocomplete="both" aria-haspopup="false" autocapitalize="off" autocomplete="off" spellcheck="false" title="جستجو" value="{{ Request()->keyword }}" aria-label="Search">
                        <div class="search-input mobile">جستجو در ITTelecom</div>

    {{--                    <div class="clear-search-input" title="بستن">--}}
    {{--                        <i class="icn block fill close" style="background-image:url('/icons/x.svg');"></i>--}}
    {{--                    </div>--}}

                        <div class="resultDiv">
                            <div class="pop-search">
                                <div class="limit-p">برای جستجو حداقل ۲ کاراکتر وارد نمایید!</div>
                                {{--<div class="title hidden">بیشترین سرچ شده:</div>
                                <ul class="keywordlist hidden">
                                    <li data-value="media"><a href="search/media">media</a></li>
                                    <li data-value="media converter"><a href="search/gfh">media converter</a></li>
                                </ul>--}}
                            </div>
                            <div class="res-pop">
                                <ul class="result-p resultaj"></ul>
                            </div>
                        </div>
                    @endif
                    <a id="submit-search-query-anchor-id" href="/search/{{ Request()->keyword }}" class="navbarsearchbtn" data-slug="{{ Request()->keyword }}" title="بیاب">
                        <i class="icn block fill" style="background-image:url('/icons/search.svg');"></i>
                    </a>
                    <div class="aria-clearfix"></div>
                </div>
                <div class="aria-clearfix"></div>
            </div>
            <div class="aria-clearfix"></div>
        </div>

        <div class="blank-space"></div>

        {{-- <div id="theme-toggle" class="themetoggle icon-{{ $theme == 'dark-theme' ? 'sun' : 'moon' }}" title="روشنایی/تاریک">
            <i class="icn block moon" style="background-image:url('/icons/moon.svg');"></i>
            <i class="icn block sun" style="background-image:url('/icons/sun.svg');"></i>
        </div> --}}
        <div class="menu-back btn-login" itemscope="itemscope" itemtype="https://schema.org/WPHeader">
        @auth('web')
            <div class="user">
                <div class="user-pop">
                    <button class="user-click avatar">

                    @php
                        $user = Auth::user();
                        $username = $user->username;
                        $mobile = $user->mobile;
                        $email = $user->email;
                        $photo = $user->photo;
                        $letter = strtoupper($username);
                    @endphp

                    @if (strpos($photo, '#') !== false)
                        <div class="thumb"><div class="string-back" style="background:{{$photo}};">{{mb_substr($letter, 0, 1)}}</div></div>
                    @else
                        <img src="{{ '/images/uploads/picture/profile' .'/'. Auth::guard('web')->user()->photo }}" width="43" height="43" >
                    @endif

                    </button>
                    <div class="box-pop">
                    <div class="profile">
                        @if (strpos($photo, '#') !== false)
                            <div class="thumb"><div class="string-back" style="background:{{$photo}}">{{mb_substr($letter, 0, 1)}}</div></div>
                        @else
                            <img src="{{ '/images/uploads/picture/profile' .'/'. Auth::guard('web')->user()->photo }}" width="100" height="100" >
                        @endif
                        <span class="bold block">{{ e(Auth::guard('web')->user()->name) }}</span>
                        {{-- <span class="normal block">نام کاربری: {{ e(Auth::guard('web')->user()->username) }}</span> --}}
                        {{-- <span class="thin block">{{ e(Auth::guard('web')->user()->email) ? 'ایمیل کاربری: '. e(Auth::guard('web')->user()->email) : 'شماره موبایل: '. e(Auth::guard('web')->user()->mobile)  }}</span> --}}
                    </div>

                    <div class="links admin">
                        <a href="{{ route('admin.dashboard') }}" itemprop="url">
                            <img src="/icons/codesandbox.svg" width="20" height="20">
                            داشبورد
                        </a>
                    </div>

                    <div class="btn-bottom">
                        <a class="btn-border default auto default logout dropdown-item" href="{{ route('logout') }}">
                            <i class="icn block fill" style="background-image:url('/icons/log-out.svg');"></i>
                            خروج کاربری
                        </a>
                    </div>
                    </div>

                </div>
            </div>
        @endauth

        @guest('web')
            <a href="{{ URL::current() == route('home') ? '/login' :  url('login?redirect_to=' . urlencode(request()->url())) }}" class="btn-border user-login-reg  @if(URL::current()==route('home').'/login') active @endif" title="ورود / ثبت‌نام" itemprop="url">
                <div class="txt">ورود / ثبت‌نام</div>
                <i class="icn block fill" style="background-image:url('/icons/user.svg');"></i>
            </a>
        @endguest
        </div>

    </div>
</nav>
