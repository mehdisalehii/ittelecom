<!DOCTYPE html>
<html ⚡>
<head>
<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
@include('amp.inc.script')
<title>@yield('title'){{ @$title }}</title>
<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
<link rel="shortcut icon" type="image/svg+xml" href="{{ url('/favicon.svg') }}"/>
<meta name="theme-color" content="#041727"/>
<meta name="referrer" content="no-referrer-when-downgrade" >
<link rel="canonical" href="{{str_replace("/amp", "", URL::current())}}"/>
{{-- @include('web.inc.head.structure')  --}}

{{--  @if ( 'UA-145001862-1' )--}}
{{--    <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>--}}
{{--  @endif--}}

@include('amp.layouts.style')
@yield('schema_org')
</head>
<body class="amp {{ URL::current() != route('home').'/amp' ? 'page' : '' }}">
<amp-animation id="showAnim" layout="nodisplay"><script type="application/json">{"duration": "200ms","fill": "both","iterations": "1","direction": "alternate","animations": [{"selector": "#scrollToTopButton","keyframes": [{ "opacity": "1", "visibility": "visible" }]}]}</script></amp-animation>
<amp-animation id="hideAnim" layout="nodisplay"><script type="application/json">{"duration": "200ms","fill": "both","iterations": "1","direction": "alternate","animations": [{"selector": "#scrollToTopButton","keyframes": [{ "opacity": "0", "visibility": "hidden" }]}]}</script></amp-animation>
<header>
    <div class="wrapped">
        <div class="navbar">
{{--            <div class="logo"><a href="/{{ str_replace(last(request()->segments()), '', implode('/', request()->segments())) }}" title="آی‌تی‌تلکام"  style="background-image:url('/assets/logo/logo.svg')" itemprop="url"><b>آی‌تی‌تلکام</b></a></div>--}}
            <div class="logo"><a href="/" title="آی‌تی‌تلکام"  style="background-image:url('/assets/logo/logo.svg')" itemprop="url"><b>آی‌تی‌تلکام</b></a></div>
        </div>
    </div>
</header>

<main>
    <div class="container">
    @yield('content')
    </div>
  </main>
  {{-- @include('amp.inc.footer') --}}
  {{-- @include('amp.inc.script_footer') --}}

  <footer>
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
  </footer>

</body>
</html>
