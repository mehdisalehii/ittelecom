<style amp-custom>
    @font-face{font-family:"taho";font-style:normal;font-weight:400;src:url("{{ url('/assets/fonts/regular.ttf') }}")}
    @font-face{font-family:"taho";font-style:bold;font-weight:700;src:url("{{ url('/assets/fonts/bold.ttf') }}")}
    *{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}
    :after,:before{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}
    html{-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;-webkit-tap-highlight-color:rgba(0,0,0,0);direction:rtl}
    body{font-family:taho,Tahoma,Arial,Helvetica,serif,sans-serif;line-height:1.5;color:#333;background:#e5e7eb}

    article,aside,details,figcaption,figure,footer,header,hgroup,main,menu,nav,section,summary{display:block}
    audio,canvas,progress,video{display:inline-block;vertical-align:baseline}
    audio:not([controls]){display:none;height:0}
    [hidden],template{display:none}
    a{background-color:transparent}
    a:active,a:focus,a:hover{color:#036ab2;text-decoration:none;outline:0}
    abbr[title]{border-bottom:1px dotted}
    b,strong{font-weight:bold}
    dfn{font-style:italic}
    h1{margin:0.67em}
    mark{background:#ff0;color:#000}
    sub,sup{line-height:0;position:relative;vertical-align:baseline}
    sup{top:-0.5em}
    sub{bottom:-0.25em}
    img{border:0}
    svg:not(:root){overflow:hidden}
    figure{margin:1em 40px}
    hr{box-sizing:content-box;height:0}
    pre{overflow:auto}
    button,input,optgroup,select,textarea{color:inherit;font:inherit;margin:0}
    button{overflow:visible}
    button,select{text-transform:none}
    button,html input[type=button],input[type=reset],input[type=submit]{-webkit-appearance:button;cursor:pointer}
    button[disabled],html input[disabled]{cursor:default}
    button::-moz-focus-inner,input::-moz-focus-inner{border:0;padding:0}
    input{line-height:normal}
    input[type=checkbox],input[type=radio]{box-sizing:border-box;padding:0}
    input[type=number]::-webkit-inner-spin-button,input[type=number]::-webkit-outer-spin-button{height:auto}
    input[type=search]{-webkit-appearance:textfield;box-sizing:content-box}
    input[type=search]::-webkit-search-cancel-button,input[type=search]::-webkit-search-decoration{-webkit-appearance:none}
    fieldset{border:1px solid #c0c0c0;margin:0 2px;padding:0.35em 0.625em 0.75em}
    legend{border:0;padding:0}
    textarea{overflow:auto}
    optgroup{font-weight:bold}
    table{border-collapse:collapse;border-spacing:0}
    td,th{padding:0}
    button,input,select,textarea{font-family:inherit;line-height:inherit}
    a{color:#1809A6;text-decoration:none}
    a:focus,a:hover{color:#E11924;text-decoration:none}
    figure{margin:0}
    img{vertical-align:middle}
    .img-responsive{display:block;max-width:100%;height:auto}
    .img-rounded{border-radius:6px}
    .img-thumbnail{padding:4px;line-height:1.5;background-color:#cccccc;border:1px solid #ddd;border-radius:4px;-webkit-transition:all 0.2s ease-in-out;-o-transition:all 0.2s ease-in-out;transition:all 0.2s ease-in-out;display:inline-block;max-width:100%;height:auto}
    .img-circle{border-radius:50%}
    hr{margin-top:21px;margin-bottom:21px;border:0;border-top:1px solid #f4f3f3}
    .sr-only{position:absolute;width:1px;height:1px;margin:-1px;padding:0;overflow:hidden;clip:rect(0,0,0,0);border:0}
    .sr-only-focusable:active,.sr-only-focusable:focus{position:static;width:auto;height:auto;margin:0;overflow:visible;clip:auto}
    [role=button]{cursor:pointer}
    .products-carousel{margin: 35px 15px;border-radius: 0.7rem;}
    .border-radius{border-radius: 0.7rem;}
    .hidden{display:none}
    .block{display:block}
    .col-12{width:100%}
    .col-11{width:91.66666667%}
    .col-10{width:83.33333333%}
    .col-9{width:75%}
    .col-8{width:66.66666667%}
    .col-7{width:58.33333333%}
    .col-6{width:50%}
    .col-5{width:41.66666667%}
    .col-4{width:33.33333333%}
    .col-3{width:25%}
    .col-2{width:16.66666667%}
    .col-1{width:8.33333333%}
    .bold,.extra{font-weight: 700;}
    [class*="item-"].row [class*="col-"]{float:left;text-align:left}
    .btn{display:inline-block;margin-bottom:0;font-weight:normal;text-align:center;vertical-align:middle;touch-action:manipulation;cursor:pointer;background-image:none;border:1px solid transparent;white-space:nowrap;padding:6px 12px;line-height:1.5;border-radius:4px;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}
    .btn.active.focus,.btn.active:focus,.btn.focus,.btn:active.focus,.btn:active:focus,.btn:focus{outline:thin dotted;outline:5px auto -webkit-focus-ring-color;outline-offset:-2px}
    .btn.focus,.btn:focus,.btn:hover{color:#333;text-decoration:none}
    .btn.active,.btn:active{outline:0;background-image:none;-webkit-box-shadow:inset 0 3px 5px rgba(0,0,0,0.125);box-shadow:inset 0 3px 5px rgba(0,0,0,0.125)}
    .btn.disabled,.btn[disabled],fieldset[disabled] .btn{cursor:not-allowed;opacity:0.65;filter:alpha(opacity=65);-webkit-box-shadow:none;box-shadow:none}
    a.btn.disabled,fieldset[disabled] a.btn{pointer-events:none}
    input[type=button].btn-block,input[type=reset].btn-block,input[type=submit].btn-block{width:100%}
    .ltr{direction:ltr}

    .wrapped{padding:0 15px}
    header{background: #fff;box-shadow: 0 35px 60px -15px rgba(0,0,0,0.3);}
    header a{color:#808080;text-decoration:none;transition:0.2s all ease;background-position:center;background-repeat:no-repeat;width:100%;height:100px;display:block}
    header a b{opacity:0}
    header a:hover{color:#f4f3f3;outline-width:2px;outline-style: solid;outline-style: dashed;outline-color: #0ea5e9;border-radius: 0.375rem;}
    header .search{width:200px;float:left;position:relative;margin-top:24px}
    header .search form{width:100%}
    header .search .input-group{width:100%;position:relative}
    header .search input{width:100%;line-height:1.5;color:#333;border-radius:0;height:24px;background:#fff;border:0 none;padding:0 4px;border:1px solid #777}
    header .search button{position:absolute;top:0;left:0;color:#4d4d4d;line-height:28px;border:0 none;background:transparent;padding:0;margin:0}
    header .date{display:block;position:relative;margin-top:85px;text-align:center;color:#fff}
    header .date:before{content:"\e824";font-family:"Glyphicons Halflings";font-style:normal;font-weight:normal;speak:none;display:inline-block;text-decoration:inherit;margin-left:6px}
    header .logo h1{margin:0px;width:100%;height:120px;color:#000}
    header .logo h1 a{background:transparent;overflow:hidden;text-align:center;background-size:contain;width:168px;background-position-y:center;display:block;line-height:0;outline:0;background-repeat:no-repeat;height:38px;margin:10px auto}
    header .logo h1 b{visibility:hidden}
    header .tabs-header-mobile {display: flex;}
    #menu{height:100%;position:relative;z-index:99;padding-top:50px;width:280px}
    #menu ul{margin:0;padding:0;direction:rtl;list-style:none}
    #menu ul li{text-align:center;transition:0.2s all ease;float:right;position:static}
    #menu ul li .submenu-toggler{display:none}
    #menu ul li a{color:rgb(57,57,57);display:block;line-height:30px;position:relative;padding:10px 30px;font-weight:bold}
    #menu ul li a:hover{background:rgb(215,215,215)}
    #menu ul.menu li .menubrs .menubrbox .h3-title a{padding-left:30px}
    #menu ul li.active,#menu ul li:hover{}
    #menu ul li.active a,#menu ul li:hover a{}
    #menu ul li.active .submenu,#menu ul li:hover .submenu{display:block}
    #menu ul li .submenu{position:absolute;right:0;z-index:102;display:none;background:#135390;width:100%;margin-right:0;top:30px;transition:0.2s all ease}
    #menu ul li .submenu:before{display:block;content:"";position:absolute;top:0;height:30px;width:1000px;left:50%;background:#135390;z-index:0}
    #menu ul li .submenu:after{display:block;content:"";position:absolute;top:0;height:30px;width:1000px;right:50%;background:#135390;z-index:0}
    #menu ul li .submenu li{text-align:right;height:30px;overflow:hidden}
    #menu ul li .submenu li a{color:#efefef}
    #menu ul li .submenu li a:before{display:none}
    #menu ul li .submenu li:hover a{color:#fff}
    #menu ul li .submenu .blink a{position:relative;display:inline-block}
    #menu ul li .submenu .blink a:before{display:inline-block;width:7px;height:7px;border-radius:100%;background:#eb1f1f;content:"";margin-left:8px;animation:blink 1s;animation-iteration-count:infinite}
    #menu ul li.bg-red a{background:#E11924}
    aside{background:#fff;margin-bottom:15px;}
    .gray{background: #eaeaea;}
    .red{background: #ee7171;}
    .red-2{background: linear-gradient(180deg, #b02222, #1b1b64);}
    .padd-5{padding:5px}
    .padd-10{padding:10px}
    .padd-15{padding:15px}
    .padd-20{padding:20px}
    .marg-5{margin:5px}
    .marg-10{margin:10px}
    .marg-15{margin:15px}
    .marg-20{margin:20px}
    .box.list-clean ul,.box ul{list-style:none;margin: 0;padding: 0;}
    ul.lists-s{padding: 0 0 10px 0;}
    ul.lists-s li.list{padding: 0 12px;}
    ul.lists-s li.list:hover{background: #f4f4f4;}
    ul.lists-s li.list a{padding: 12px;border-top: 1px solid #dfdede;color: #323232;display: flex;}
    ul.lists-s li.list a .icn{width:30px;height:30px;margin:0}
    ul.lists-s li.list a .txt{padding:5px 10px 0 10px;}
    .page ul.lists-s li.list {padding: 10px 12px;}
    .page ul.lists-s li.list:hover{background: transparent;}
    .page ul.lists-s li.list a{padding: 12px;border: 1px solid rgb(224, 227, 231);color: #323232;border-radius: 0.7rem;transition: box-shadow 300ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;}
    .page ul.lists-s li.list a:hover{box-shadow: rgba(170, 180, 190, 0.3) 0px 4px 20px;}
    .head .h1{padding: 12px;}
    .head .h1 .txt{font-size: 1.2rem;display: flex;}
    .head .h1 .link{border:1px solid #d2d2d2;border-radius: 0.7rem;font-size: 1.0rem;}
    .head .h1 .link a{color: #323232;padding: 10px 15px;}
    .head .h1 .link a .icn{width:20px;height:20px;margin:0 10px 0 0px}
    .head .h1 .link:hover{background: #f4f4f4;}
    article img{border-radius:0.7rem;}
    #footer{color:#f4f3f3;width:100%;margin-top:8px;padding:8px 0}
    #footer:after{display:none}
    #footer a{color:rgb(132,132,132);text-align:center;display:block}
    #footer a:hover{color:#000;text-decoration:none;transition:0.2s all ease}
    #footer .footer-top{padding-top:4px}
    #footer .footer-top .footer-inline-menu ul{}
    #footer .footer-top .footer-inline-menu ul li{font-weight:bold;padding:0 4px}
    #footer .footer-top .footer-social ul{float:left}
    #footer .footer-top .footer-social ul li{padding:0 2px}
    #footer .responsive-tools{margin-bottom:0;padding-bottom:10px}
    #footer .responsive-tools .toggle-versions{text-align:center;float:none}
    #footer .responsive-tools .toggle-versions a{float:none;display:inline-block;color:rgb(255,255,255)}
    @media(max-width:767px){#footer .responsive-tools .toggle-versions a.visible-xs{display:inline-block}}
    .copyright p{color:rgb(132,132,132);text-align:center}
    .box{padding:0;position:relative;z-index:1}
    #menu ul li{float:none;text-align:right;position:relative}
    #menu ul li ul.submenu{display:none;position:static;background:transparent;width:100%}
    #menu ul li ul.submenu:after,#menu ul li ul.submenu:before{display:none}
    #menu ul li ul.submenu li{background:#135390}
    .modal .modal-dialog{max-width:100%}
    #item .item-body .gallary figure{display:block}
    [class*="col-"]{margin:auto;float:none}
    .{float:right}
    .{float:left}
    body.subTopic #menu ul li.active .submenu,body.topic #menu ul li.active .submenu{visibility:visible;opacity:1}
    body .row:after,body .row:before{content:" ";display:table}
    body .row:after{clear:both}
    amp-sidebar{background:#fff}
    .list-inline li{display:inline-block}
    a{color:#1809A6;transition:0.2s all ease;outline:0}
    a:hover{color:#E11924;text-decoration:none}
    p{color:#333;line-height:1.4em}
    .logo {
        width: 280px;
        margin: auto;
        padding: 0;
    }
    .hamburger,.search-btn,.close-btn{border:1px solid transparent;background-color:transparent;background-image:none;border-radius:4px;float:right;margin:-41px 10px 5px 15px;padding:5px 10px;position:relative;cursor:pointer;right:0;top:0px;z-index:3}
    .hamburger:hover,.search-btn:hover,.close-btn:hover{background:#e8e8e8}
    .btn-log{background: #1a73e8;}
    .search-btn,.close-btn{float:left}
    .search-btn .icon-cir{display:block;width:18px;height:18px;background:0 0;border:2px solid #000;border-radius:50px}
    .search-btn .icon-han{display:block;margin:-5px 2px 0px 16px;width:5px;height:10px;border-radius:0 0 5px 5px;transform:rotate(-45deg);border:2px solid #000;background:0 0}
    .close-btn .icon-lin-o,.close-btn .icon-lin-t{background:rgb(0,0,0) none repeat scroll 0 0;display:block;height:2px;width:22px;margin:10px 1px 10px 0px;transform:rotate(-45deg)}
    .close-btn .icon-lin-t{margin:-12px 0px 11px 0px;transform:rotate(45deg)}
    .search-box{text-align:center;margin-bottom:35px;}
    .search-bar {
        border: 0;
        border-radius: 0.4rem;
        height: 50px;
        width: 100%;
        padding: 0 20px;
        background: #eaebef;
        direction: rtl;
        margin-bottom:10px;
    }
    .search-bar:hover{box-shadow: 0 1px 6px rgba(32,33,36,.28);}
    .icon-bar{background:rgb(0,0,0) none repeat scroll 0 0;display:block;height:2px;width:22px;margin:4px 0}
    .carousel-preview{text-align:center;padding:0;display:none}
    .carousel-preview[role="listbox"]{display:block}
    .car-slide{padding:5px}
    .car-slide img{border-radius:0.7rem}
    amp-selector amp-img{margin:3px 3px -6px 3px}
    amp-selector[role=tablist].tabs-with-flex{display:flex;flex-wrap:wrap;overflow:hidden}
    amp-selector[role=tablist].tabs-with-flex [role=tab]{flex-grow:1;text-align:center;padding:10px;margin:10px 30px 0px 30px}
    amp-selector[role=tablist].tabs-with-flex [role=tab][selected]{outline:none;font-weight:bold;background:#fff;z-index:1;border-radius:0.7rem 0.7rem 0 0;box-shadow:0 -3px 4px rgba(0,0,0,.08)}
    amp-selector[role=tablist].tabs-with-flex [role=tabpanel]{display:none;width:100%;order:1;padding:0 10px;border-radius:0.7rem;background:#fff;box-shadow:0 0 20px rgba(0,0,0,.08);margin:0 20px 20px}
    amp-selector[role=tablist].tabs-with-flex [role=tab][selected] + [role=tabpanel]{display:block}
    amp-selector[role=tablist].tabs-with-selector{display:flex}
    amp-selector[role=tablist].tabs-with-selector [role=tab][selected]{outline:none;border-bottom:2px solid #1a89cc;font-weight:bold}
    amp-selector[role=tablist].tabs-with-selector{display:flex}
    amp-selector[role=tablist].tabs-with-selector [role=tab]{width:100%;text-align:center;padding:15px}
    amp-selector.tabpanels [role=tabpanel]{display:none;padding:15px}
    amp-selector.tabpanels [role=tabpanel][selected]{outline:none;display:block}
    .desc .ads-txt,.desc .ads-txt{background:#f7f7f7;border-radius:0;padding:15px 10px 15px 10px;width:100%;display:block;margin:35px 0px 35px 0px;background:linear-gradient(90deg,rgba(255,255,255,0) 0,rgba(234,109,103,0) 0,#f7f7f7 65%)}
    .ads-txt p.head.txt{margin:0;padding:0;text-indent:30px;font-weight:bold}
    .ads-txt a.txt{padding:0;margin-right:25px}
    .desc ul li::before,.desc ol li::before{content:"";display:inline-flex;width:15px;height:15px;border-radius:40%;background:transparent;margin:1px 10px 1px 10px;border:3px solid #bb059f}
    .desc .box-ads{background:transparent;position:relative;padding:5px 0;margin-bottom:-10px}
    .ads-contact{background-color:#f2f2f2;width:100%;border-radius:0.7rem;padding:30px;text-align:left;position:relative;margin:30px auto 25px;float:right;border-radius:0.7rem}
    .ads-contact .title-txt{padding:0 0px 10px 0;font-weight:bold;text-align:right}
    .ads-contact i.para{width:100%;line-height:30px;margin-bottom:25px;text-align:justify;font-style:normal;float:right}
    .desc a{position:relative;color:#174fd5;text-decoration:none}
    .ads-contact a.btn-link{background:#0e7ac6;padding:13px 15px;color:#fff;border-radius:.7rem;text-decoration:none;margin:5px;transition:.4s ease;float:right}
    .navbar{padding:0 5px;}
    .categories-menu header{padding:15px 30px;text-align:right;background:#fff;color:#000;font-weight:bold}
    .categories-menu header:hover{background:#eee}
    .categories-menu header[aria-expanded="true"]{background:#eee}
    .categories-menu ul.lists{border-bottom:1px solid #dfdfdf}
    blockquote{background:#f7f7f7;border-radius:0.7rem;border:2px dashed #cecece;font-style:italic;padding:10px 30px}
    .{text-align:center}
    .text-right{text-align:right}
    .text-left{text-align:left}
    .products-carousel .product-name{font-size:85%;width:164px;direction:rtl;height:42px;overflow:hidden;text-overflow:ellipsis;white-space:initial}
    .carousel-item-box{box-shadow:0 1px 1px 0 rgba(60,64,67,.08),0 1px 3px 1px rgba(60,64,67,.16);background:#ffffff;margin-top:15px;margin-bottom:2px;padding:0;border-radius: 0.3rem;overflow: hidden;}
    .carousel-item-box:first-child{margin-left:10px}
    .carousel-item-box:last-child{margin-right:10px}
    .products-carousel .box-title{font-weight:bold;padding:15px}
    .products-carousel .box-pal{position:relative;z-index:1;padding:0 0 10px 0}
    .gallary{direction:ltr}
    .table tr{display:block;background:#f9f9f9;margin-bottom:10px;border-radius:0.7rem;border:1px solid #f2f2f2}
    .table td,.table th{display:block;padding:15px;width:100%;border:0}
    .table td ul,.table th ul{padding:0;margin:0}
    .table table{position:relative;background:rgb(255,255,255);border:0 solid #ddd;border-collapse:separate;border-radius:10px;border-spacing:5px;margin:15px auto 20px;text-align:justify}
    .box-img-select{box-shadow:0 0 20px rgba(0,0,0,.08);margin:3px;float:right;border:1px solid #d9d9d9}
    .nav-bottom{position:fixed;z-index:5;display:flex;flex-wrap:nowrap;font-weight:bold;box-shadow:0 0 20px rgba(0,0,0,.12);background-color:#fff;bottom:0;left:0;right:0;border-radius:3.5rem 3.5rem 0 0;overflow:hidden}
    .nav-bottom a{flex:1 0 30%;text-align:center;position:relative;cursor:pointer;padding:15px}
    .nav-bottom a:hover{background:#282826;color:#fff}
    .scroll-anchor{float:right;width:100%;display:block;position:absolute;top:-60px}
    .title-header{text-indent:50px}
    .btn-top{font-size:1.4em;box-shadow:0 0 20px rgba(0,0,0,.12);width:50px;height:50px;border-radius:1.3rem;border:none;outline:none;background:rgba(37,37,37,0.61);z-index:9999;bottom:4rem;right:1rem;position:fixed;opacity:0;visibility:hidden;transition:.2s ease-in}
    .btn-top:hover{background:rgba(37,37,37,1)}
    .btn-top .icon{position:absolute;top:10px;left:10px}
    .btn-top .icon::after,.btn-top .icon::before{content:"";width:15px;height:4px;background:#fff;display:block;transition:.4s all;border-radius:5px;transform:rotate(-45deg);position:relative;top:13px;left:4px}
    .btn-top .icon::after{transform:rotate(45deg);left:12px;top:9px}
    .target{position:relative}
    .target-anchor{position:absolute;top:-75px;left:0}
    ul.products.category{float:right;padding:0;margin:0;width:100%}
    ul.products.category li{float:right;width:100%;border-bottom:1px solid #e6e6e6;padding:10px}
    ul.products.category li:hover{background:#f9f9f9}
    ul.products.category li:last-child{border:0;margin-bottom:10px}
    ul.products.category li a .thumb{float:right;width:80px}
    ul.products.category li a .name-txt{margin-right:100px}
    .page header{position: fixed;width: 100%;background: rgba(255,255,255,0.72);z-index: 2;box-shadow: 0 3px 3px 0 rgba(0,0,0,0.05);left: 0;top: 0;}
    .page .logo{width: 280px;margin: auto;padding:10px 0;}
    .page header a{height: 50px;}
    .page main{margin-top:90px;position: relative;}

    .breadcrumb{display:flex}
    .breadcrumb ul{flex:0 0 auto;display:flex;align-items:center;overflow:auto;margin:0px;padding:0;flex-wrap:nowrap;white-space:nowrap}
    .breadcrumb ul li{list-style:none;padding:0px 0px 0px 5px}
    .breadcrumb ul li:last-child{margin-left:20px}
    .breadcrumb ul li a{position:relative;color:#5b5b5b}
    .breadcrumb ul li::after,.breadcrumb ul li i.sep::after{content:"";width:16px;height:1px;background:#5b5b5b;display:inline-block;border-radius:5px;transform:rotate(-65deg);position:relative;margin:3px 5px 3px 2px}
    .breadcrumb ul li i.sep::after{transform:rotate(90deg);background:#aeaeae}
    .breadcrumb ul li i.sep:last-child,.breadcrumb ul li:last-child::after{display:none}
    .motto{margin:30px 0}
    .motto a{background-color:#f5f6f7; border: 1px solid #f5f6f7; border-radius: 4px; color: #3c4043;font-size: 14px; margin: 10px 5px; padding: 10px;min-width: 54px; text-align: center; cursor: pointer; user-select: none}
    .motto a:hover{box-shadow: 0 1px 1px rgba(0,0,0,.1);background-color: #f5f6f7;border: 1px solid #dadce0;color: #202124;}
    .motto a:focus {border: 1px solid #4285f4;}
    .products-carousel .h1{padding:20px 15px 3px 15px;font-size: 1.2rem;}
    .products-carousel .h1 .icn{width: 25px;height: 25px;margin: 0 5px;}
    .products-carousel a .txt{width: 150px;padding: 10px;background: #f7f7f7;}
    i.icn {background-color: transparent;background-image: none;display: block;background-size: contain;background-position-y: center;line-height: 0;outline: 0;background-repeat: no-repeat; }

    i.icn.fill {filter: invert(10%) sepia(10%) saturate(100%) hue-rotate(0deg) brightness(10%) contrast(45%);}
    i.icn.white{filter: brightness(0) invert(1);}

    .search-form{margin: auto;position: relative;}
    .search-form i.icn{width: 30px;height: 30px;position: absolute;top: 10px;left: 10px;}

    .pad-left{padding-left:3px}
    .pad-right{padding-right:3px}

    .lists-pd{background: #fff;border-top: 1px solid #dfdede;border-bottom: 1px solid #dfdede;margin: 5px 0;border-radius:0.7rem;}


    .sidebar ul.social li a.red {background-image: linear-gradient(to bottom right, #fdba74, #f87171, #ef4444);}
    .sidebar ul.social li a.blue {background-image: linear-gradient(to bottom right, #0891b2, #2563eb, #1e40af);}

    .sidebar ul{
        list-style-type: none;padding:0;margin:0;margin-bottom: 10px;
    }

    .sidebar ul.social li a {
        margin-top: 0.75rem;
        border-radius: 1rem;
        padding-top: 1.25rem;
        padding-bottom: 1.25rem;
        padding-left: 0.75rem;
        padding-right: 0.75rem;
        font-size: 1.25rem;
        line-height: 1.75rem;
        font-weight: 700;
        color: rgb(255 255 255 /1);
        display:flex
    }

    .sidebar ul.social li a .icn {
        height: 24px;
        width: 30px;
        margin-left:10px;
        filter: invert(1);
    }


    .user-login-reg {
        position: absolute;
        top: 0.75rem;
        left: 0.75rem;
        display: block;
        float: right;
        width: auto;
        height: auto;
        border: 1px solid #d1d5db;
        text-align: center;
        border-radius: .4rem;
        padding: 0.5rem;
    }

    .footer {
        z-index: 10;
        float: right;
        width: 100%;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
        overflow: hidden;
        background-color: rgb(36 36 36 / 1);
        padding: 0;
        color: rgb(255 255 255 / 1);
        margin-top: 20px;
    }

    .footer .foot-ar .head {
        float: right;
        margin-bottom: 0.75rem;
        width: 100%;
        padding: 0.5rem;
        padding-bottom: 0;
        font-size: 1.125rem;
        line-height: 1.75rem;
        margin-top: 2.75rem;
    }

    .footer .foot-ar .foot-links .part a {
        color: rgb(255 255 255 / 1);
    }

    .footer .foot-ar .foot-links .part a:hover {
        color: rgb(96 165 250 / 1);
    }

    .footer .foot-ar .foot-links .part li::before {
        content: "";
        float: right;
        margin: 0.5rem;
        display: block;
        height: 0.25rem;
        width: 0.75rem;
        border-radius: .4rem;
        background-color: rgb(255 255 255 / 1);
    }

    .footer .foot-ar .foot-links .part.contactus li::before,.footer .foot-ar .foot-links .part.foot-social li::before {
        display:none
    }


    .footer .foot-ar .foot-links .part.contactus li .icn{
        height:30px;
        width:30px;
        margin-left: 10px;
    }

    .footer .foot-ar .foot-links .part.contactus li .content{
        float: right;
        width: 100%;
    }




    .footer .copyright {
        width: 100%;
        background-color: rgb(45 45 45 / 1);
        padding: 1.25rem;
        text-align: center;
    }

    .user-login-reg:hover,.user-login-reg:active,.user-login-reg:focus{outline: 0;border: 1px solid #60a5fa;background: #dbeafe;}
    .user-login-reg .icn{width: 25px;height: 25px;}
    .user-login-reg .txt{display:none}

    .user .profile {position: relative;z-index: 1;}
    .user .profile .thumb .string-back{width: 50px;height: 50px;border-radius: 100%;font-size: 1.4rem;padding: 8px 17px;font-weight: 800;color: #000;border: 1px dashed #c5c5c5;}
    .user .links{margin: 10px 0px 0 -25px;position: relative;z-index: 0;}
    .user .links a {padding: 13px 20px 0 35px;height: 50px;background: #e6e6e6;border-radius: 0 100px 100px 0;color: #000;}

    .user.ereew{
        position: absolute;
        top: 0.75rem;
        left: 0.75rem;
        display: block;
    }

    .user a{
        width:auto; height:auto;border-radius: 100%;
    }

    .user a:hover{
        border-radius: 100%;
    }



    .box-pop{
        position: relative;
    }

    .ados-v{padding: 15px 0; text-align:center;border-radius: 1rem;}

    .menu-nav .menu-content{display:none}

    .topoif{
        border-radius: 1rem;
    }


    ul.lists {
        background: #fff;
        box-shadow: 0 0 0 0 #000;
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 0;
        border-radius: 1rem;
        margin-bottom:10px;
        overflow: hidden;
    }
    ul.lists, ul.lists li {
        list-style: none;
        padding: 0;
        text-align: center;
    }

    ul.lists li:hover{
        background: #ebebeb;
    }

    ul.lists i.icn{
        margin: auto;
        height: 3rem;
        width: 3rem;
    }

    ul.lists .arrow{
        display:none
    }

    ul.lists li a .txt{padding:10px 0}

    li.first-list{display:none}

    .breadcrumb{padding:10px 20px;}

    footer.eter{padding: 10px;margin-bottom: 20px;}
    footer ul{display: inline-block;margin: 0;padding: 0;list-style: none;}
    footer ul li{padding:10px;display: flex;}

    .item-summary{margin:30px 0}
    .info,.info-le,.content-desc{padding:0 10px}
    .info .box.blue{background: #f0f5ff}
    .box-pa .box.yellow {background: #f9f2d7;}
    .box-pa .box.orange {background: #f9e5d7;}
    .box-pa .box.green {background: #e2f9d7;}
    .box-pa .box.red-2 {background: #fbefef;}
    .info .box{border-radius:0.7rem;}

    .box .box-pa {margin-bottom: 10px;}
    .box .icn {width: 30px;height: 30px;}
    .info .pa-ic .icn {margin: 10px;}
    .pa-ic .txt {padding:15px 0 0 20px;}
    .info .cio .txt {padding: 0 15px;}
    .info .cio .txt h2 {text-indent: 0;font-size:1.2rem;padding: 0;margin: 0;}
    .info .cio .que {user-select: none;margin-left: 5px;}
    .info .standard .icn {margin: 5px 10px;width: 40px;height: 40px;}
    .info .cio .txt .comma {padding: 0 5px;}
    .info .cio .txt li.comma:last-child {display: none;}

    .box-pa .box.default {background: transparent;margin: -15px 0;}
    .box.border .que.big {padding: 22px;font-size: 1.15rem;}
    .box.border .icn {margin: 20px 15px 20px 10px;}
    .box-pa .box.border {background: transparent;border: 1px solid #e6e6e6;border-radius:0.7rem}
    .box.border .que {padding: 15px;}
    .box-pa .box.border .ans {color: #930404;}
    .box-pa .box.border .ans .icn {margin: -5px 0 0px 5px;filter: invert(10%) sepia(63%) saturate(4858%) hue-rotate(353deg) brightness(100%) contrast(108%)}
    .box.border .ans .txt {padding: 20px 15px;margin-bottom: 10px;border-radius:0.7rem}
    .box.border .ans {padding: 0 10px;}

    .desc{text-align: justify;padding: 15px;border: 1px solid #e6e6e6;border-radius: 0.7rem;margin-bottom: 10px;}
    .desc ul li::before, .desc ol li::before {content:"";display: inline-flex;width: 15px;height: 15px;border-radius: 40%;background: #fff;margin: 1px 10px 1px 10px;border: 3px solid #bb059f;}

    .sku-number-txt{text-transform: uppercase;letter-spacing: 2px;text-shadow: 1px 1px 0 rgb(255, 255, 255);}

    .info .big-icn .icn {margin: 5px 10px;width: 40px;height: 40px;}

    @media(max-width:480px){

        .col-m-12{width:100%}
        .col-m-11{width:91.66666667%}
        .col-m-10{width:83.33333333%}
        .col-m-9{width:75%}
        .col-m-8{width:66.66666667%}
        .col-m-7{width:58.33333333%}
        .col-m-6{width:50%}
        .col-m-5{width:41.66666667%}
        .col-m-4{width:33.33333333%}
        .col-m-3{width:25%}
        .col-m-2{width:16.66666667%}
        .col-m-1{width:8.33333333%}

        .pad-left{padding-left:0}
        .pad-right{padding-right:0}

        .search-form{width:100%}
        .logo{width:250px}
        .user .links a{padding: 13px 5px 0 28px;}
        .page .user{display:none}
        .user-login-reg{display:none}
    }
    @media(min-width:480px){
        .wrapper{width:480px;margin:auto}
        .search-form{width:100%}

    }
    @media(min-width:768px){
        .search-form{width:100%}
    }
    @media(min-width:768px){

        .col-u-12{width:100%}
        .col-u-11{width:91.66666667%}
        .col-u-10{width:83.33333333%}
        .col-u-9{width:75%}
        .col-u-8{width:66.66666667%}
        .col-u-7{width:58.33333333%}
        .col-u-6{width:50%}
        .col-u-5{width:41.66666667%}
        .col-u-4{width:33.33333333%}
        .col-u-3{width:25%}
        .col-u-2{width:16.66666667%}
        .col-u-1{width:8.33333333%}

        .wrapped {
            width: 91.666667%;margin:auto;max-width:480px;
        }
    }
    img {max-width:100%; height:auto;}
</style>

<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style>
<noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
