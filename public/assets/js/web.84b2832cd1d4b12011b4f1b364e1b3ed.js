"use strict";
var CSRF_TOKEN = $('.data_href').attr('csrf-token');
var data_home = $('.data_href').attr('data-home');
var curr_page = $('.data_href').attr('curr-page');
var data_href = $('.data_href').attr('data-href');
var timeLoad = 0;

var url_location = location.href;

if ( data_home + '/' != url_location ) {
    if(url_location.substr(-1) === '/') {
    var url_redirect = url_location.replace(/\/+$/, "") ;
    window.history.pushState("", "", url_redirect  );
    }
}

function scriptLoader(path, callback)
{
    var script = document.createElement('script');
    script.type = "text/javascript";
    script.async = true;
    script.src = path;
    script.onload = function(){
        if(typeof(callback) == "function")
        {
            callback();
        }
    }
    try
    {
        var scriptOne = document.getElementsByTagName('script')[0];
        scriptOne.parentNode.insertBefore(script, scriptOne);
    }
    catch(e)
    {
        document.getElementsByTagName("head")[0].appendChild(script);
    }
}

!function(e){var t=function(u,D,f){"use strict";var k,H;if(function(){var e;var t={lazyClass:"lazyload",loadedClass:"lazyloaded",loadingClass:"lazyloading",preloadClass:"lazypreload",errorClass:"lazyerror",autosizesClass:"lazyautosizes",fastLoadedClass:"ls-is-cached",iframeLoadMode:0,srcAttr:"data-src",srcsetAttr:"data-srcset",sizesAttr:"data-sizes",minSize:40,customMedia:{},init:true,expFactor:1.5,hFac:.8,loadMode:2,loadHidden:true,ricTimeout:0,throttleDelay:125};H=u.lazy_SizerConfig||u.lazy_sizerConfig||{};for(e in t){if(!(e in H)){H[e]=t[e]}}}(),!D||!D.getElementsByClassName){return{init:function(){},cfg:H,noSupport:true}}var O=D.documentElement,i=u.HTMLPictureElement,P="addEventListener",$="getAttribute",q=u[P].bind(u),I=u.setTimeout,U=u.requestAnimationFrame||I,o=u.requestIdleCallback,j=/^picture$/i,r=["load","error","lazyincluded","_lazyloaded"],a={},G=Array.prototype.forEach,J=function(e,t){if(!a[t]){a[t]=new RegExp("(\\s|^)"+t+"(\\s|$)")}return a[t].test(e[$]("class")||"")&&a[t]},K=function(e,t){if(!J(e,t)){e.setAttribute("class",(e[$]("class")||"").trim()+" "+t)}},Q=function(e,t){var a;if(a=J(e,t)){e.setAttribute("class",(e[$]("class")||"").replace(a," "))}},V=function(t,a,e){var i=e?P:"removeEventListener";if(e){V(t,a)}r.forEach(function(e){t[i](e,a)})},X=function(e,t,a,i,r){var n=D.createEvent("Event");if(!a){a={}}a.instance=k;n.initEvent(t,!i,!r);n.detail=a;e.dispatchEvent(n);return n},Y=function(e,t){var a;if(!i&&(a=u.picturefill||H.pf)){if(t&&t.src&&!e[$]("srcset")){e.setAttribute("srcset",t.src)}a({reevaluate:true,elements:[e]})}else if(t&&t.src){e.src=t.src}},Z=function(e,t){return(getComputedStyle(e,null)||{})[t]},s=function(e,t,a){a=a||e.offsetWidth;while(a<H.minSize&&t&&!e._lazy_sizerWidth){a=t.offsetWidth;t=t.parentNode}return a},ee=function(){var a,i;var t=[];var r=[];var n=t;var s=function(){var e=n;n=t.length?r:t;a=true;i=false;while(e.length){e.shift()()}a=false};var e=function(e,t){if(a&&!t){e.apply(this,arguments)}else{n.push(e);if(!i){i=true;(D.hidden?I:U)(s)}}};e._lsFlush=s;return e}(),te=function(a,e){return e?function(){ee(a)}:function(){var e=this;var t=arguments;ee(function(){a.apply(e,t)})}},ae=function(e){var a;var i=0;var r=H.throttleDelay;var n=H.ricTimeout;var t=function(){a=false;i=f.now();e()};var s=o&&n>49?function(){o(t,{timeout:n});if(n!==H.ricTimeout){n=H.ricTimeout}}:te(function(){I(t)},true);return function(e){var t;if(e=e===true){n=33}if(a){return}a=true;t=r-(f.now()-i);if(t<0){t=0}if(e||t<9){s()}else{I(s,t)}}},ie=function(e){var t,a;var i=99;var r=function(){t=null;e()};var n=function(){var e=f.now()-a;if(e<i){I(n,i-e)}else{(o||r)(r)}};return function(){a=f.now();if(!t){t=I(n,i)}}},e=function(){var v,m,c,h,e;var y,z,g,p,C,b,A;var n=/^img$/i;var d=/^iframe$/i;var E="onscroll"in u&&!/(gle|ing)bot/.test(navigator.userAgent);var _=0;var w=0;var M=0;var N=-1;var L=function(e){M--;if(!e||M<0||!e.target){M=0}};var x=function(e){if(A==null){A=Z(D.body,"visibility")=="hidden"}return A||!(Z(e.parentNode,"visibility")=="hidden"&&Z(e,"visibility")=="hidden")};var W=function(e,t){var a;var i=e;var r=x(e);g-=t;b+=t;p-=t;C+=t;while(r&&(i=i.offsetParent)&&i!=D.body&&i!=O){r=(Z(i,"opacity")||1)>0;if(r&&Z(i,"overflow")!="visible"){a=i.getBoundingClientRect();r=C>a.left&&p<a.right&&b>a.top-1&&g<a.bottom+1}}return r};var t=function(){var e,t,a,i,r,n,s,o,l,u,f,c;var d=k.elements;if((h=H.loadMode)&&M<8&&(e=d.length)){t=0;N++;for(;t<e;t++){if(!d[t]||d[t]._lazyRace){continue}if(!E||k.prematureUnveil&&k.prematureUnveil(d[t])){R(d[t]);continue}if(!(o=d[t][$]("data-expand"))||!(n=o*1)){n=w}if(!u){u=!H.expand||H.expand<1?O.clientHeight>500&&O.clientWidth>500?500:370:H.expand;k._defEx=u;f=u*H.expFactor;c=H.hFac;A=null;if(w<f&&M<1&&N>2&&h>2&&!D.hidden){w=f;N=0}else if(h>1&&N>1&&M<6){w=u}else{w=_}}if(l!==n){y=innerWidth+n*c;z=innerHeight+n;s=n*-1;l=n}a=d[t].getBoundingClientRect();if((b=a.bottom)>=s&&(g=a.top)<=z&&(C=a.right)>=s*c&&(p=a.left)<=y&&(b||C||p||g)&&(H.loadHidden||x(d[t]))&&(m&&M<3&&!o&&(h<3||N<4)||W(d[t],n))){R(d[t]);r=true;if(M>9){break}}else if(!r&&m&&!i&&M<4&&N<4&&h>2&&(v[0]||H.preloadAfterLoad)&&(v[0]||!o&&(b||C||p||g||d[t][$](H.sizesAttr)!="auto"))){i=v[0]||d[t]}}if(i&&!r){R(i)}}};var a=ae(t);var S=function(e){var t=e.target;if(t._lazyCache){delete t._lazyCache;return}L(e);K(t,H.loadedClass);Q(t,H.loadingClass);V(t,B);X(t,"lazyloaded")};var i=te(S);var B=function(e){i({target:e.target})};var T=function(e,t){var a=e.getAttribute("data-load-mode")||H.iframeLoadMode;if(a==0){e.contentWindow.location.replace(t)}else if(a==1){e.src=t}};var F=function(e){var t;var a=e[$](H.srcsetAttr);if(t=H.customMedia[e[$]("data-media")||e[$]("media")]){e.setAttribute("media",t)}if(a){e.setAttribute("srcset",a)}};var s=te(function(t,e,a,i,r){var n,s,o,l,u,f;if(!(u=X(t,"lazybeforeunveil",e)).defaultPrevented){if(i){if(a){K(t,H.autosizesClass)}else{t.setAttribute("sizes",i)}}s=t[$](H.srcsetAttr);n=t[$](H.srcAttr);if(r){o=t.parentNode;l=o&&j.test(o.nodeName||"")}f=e.firesLoad||"src"in t&&(s||n||l);u={target:t};K(t,H.loadingClass);if(f){clearTimeout(c);c=I(L,2500);V(t,B,true)}if(l){G.call(o.getElementsByTagName("source"),F)}if(s){t.setAttribute("srcset",s)}else if(n&&!l){if(d.test(t.nodeName)){T(t,n)}else{t.src=n}}if(r&&(s||l)){Y(t,{src:n})}}if(t._lazyRace){delete t._lazyRace}Q(t,H.lazyClass);ee(function(){var e=t.complete&&t.naturalWidth>1;if(!f||e){if(e){K(t,H.fastLoadedClass)}S(u);t._lazyCache=true;I(function(){if("_lazyCache"in t){delete t._lazyCache}},9)}if(t.loading=="lazy"){M--}},true)});var R=function(e){if(e._lazyRace){return}var t;var a=n.test(e.nodeName);var i=a&&(e[$](H.sizesAttr)||e[$]("sizes"));var r=i=="auto";if((r||!m)&&a&&(e[$]("src")||e.srcset)&&!e.complete&&!J(e,H.errorClass)&&J(e,H.lazyClass)){return}t=X(e,"lazyunveilread").detail;if(r){re.updateElem(e,true,e.offsetWidth)}e._lazyRace=true;M++;s(e,t,r,i,a)};var r=ie(function(){H.loadMode=3;a()});var o=function(){if(H.loadMode==3){H.loadMode=2}r()};var l=function(){if(m){return}if(f.now()-e<999){I(l,999);return}m=true;H.loadMode=3;a();q("scroll",o,true)};return{_:function(){e=f.now();k.elements=D.getElementsByClassName(H.lazyClass);v=D.getElementsByClassName(H.lazyClass+" "+H.preloadClass);q("scroll",a,true);q("resize",a,true);q("pageshow",function(e){if(e.persisted){var t=D.querySelectorAll("."+H.loadingClass);if(t.length&&t.forEach){U(function(){t.forEach(function(e){if(e.complete){R(e)}})})}}});if(u.MutationObserver){new MutationObserver(a).observe(O,{childList:true,subtree:true,attributes:true})}else{O[P]("DOMNodeInserted",a,true);O[P]("DOMAttrModified",a,true);setInterval(a,999)}q("hashchange",a,true);["focus","mouseover","click","load","transitionend","animationend"].forEach(function(e){D[P](e,a,true)});if(/d$|^c/.test(D.readyState)){l()}else{q("load",l);D[P]("DOMContentLoaded",a);I(l,2e4)}if(k.elements.length){t();ee._lsFlush()}else{a()}},checkElems:a,unveil:R,_aLSL:o}}(),re=function(){var a;var n=te(function(e,t,a,i){var r,n,s;e._lazy_sizerWidth=i;i+="px";e.setAttribute("sizes",i);if(j.test(t.nodeName||"")){r=t.getElementsByTagName("source");for(n=0,s=r.length;n<s;n++){r[n].setAttribute("sizes",i)}}if(!a.detail.dataAttr){Y(e,a.detail)}});var i=function(e,t,a){var i;var r=e.parentNode;if(r){a=s(e,r,a);i=X(e,"lazybeforesizes",{width:a,dataAttr:!!t});if(!i.defaultPrevented){a=i.detail.width;if(a&&a!==e._lazy_sizerWidth){n(e,r,i,a)}}}};var e=function(){var e;var t=a.length;if(t){e=0;for(;e<t;e++){i(a[e])}}};var t=ie(e);return{_:function(){a=D.getElementsByClassName(H.autosizesClass);q("resize",t)},checkElems:t,updateElem:i}}(),t=function(){if(!t.i&&D.getElementsByClassName){t.i=true;re._();e._()}};return I(function(){H.init&&t()}),k={cfg:H,autoSizer:re,loader:e,init:t,uP:Y,aC:K,rC:Q,hC:J,fire:X,gW:s,rAF:ee}}(e,e.document,Date);e.lazy_Sizer=t,"object"==typeof module&&module.exports&&(module.exports=t)}("undefined"!=typeof window?window:{});

window.requestAnimFrame = (function(){
    return window.requestAnimationFrame ||
    window.webkitRequestAnimationFrame ||
    window.mozRequestAnimationFrame ||
    window.oRequestAnimationFrame ||
    window.msRequestAnimationFrame ||
    function(callback){
      window.setTimeout(callback, 20);
    };
  })();

  function detect_old_ie() {
    if (/MSIE (\d+\.\d+);/.test(navigator.userAgent)) {
     var ieversion=new Number(RegExp.$1);
     if (ieversion>=9)
      return false
     else if (ieversion>=8)
      return true
     else if (ieversion>=7)
      return true
     else if (ieversion>=6)
      return true
     else if (ieversion>=5)
      return true
    } else return false;
  }

  (function ($) {
    $.fn.xon = $.fn.on || $.fn.bind;
    $.fn.xoff = $.fn.off || $.fn.bind;

    function xobject(mObj, opts) {
      //Properties
      this.xzoom = true;
      var current = this;
      var parent;
      var xzoomID = {};

      var sw, sh, mw, mh, moffset, stop, sleft, mtop, mleft, ctop, cleft, mx, my;
      var source, tint, preview, loading, trans, transImg, sobjects = new Array();
      var imageGallery = new Array(), index = 0, cindex = 0;
      var img, imgObj, lens, lensImg;
      var lw, lh, ll, lt, llc, ltc, ocofx, ocofy, cofx, cofy, c1, c2, iwh, scale = 0;
      var imgObjwidth, imgObjheight;
      var flag, u = 0, v = 0, su = 0, sv = 0, lsu = 0, lsv = 0, lu = 0, lv = 0, llu = 0, llv = 0;
      var ie = detect_old_ie(), aie = /MSIE (\d+\.\d+);/.test(navigator.userAgent), iex, iey;
      var active, title = '', caption, caption_container;

      var wsw, wsh, osw, osh, tsw, tsh, oposition, reverse;

      this.adaptive = function() {
        if (osw == 0 || osh == 0) {
          mObj.css('width', '');
          mObj.css('height', '');
          osw = mObj.width();
          osh = mObj.height();
        }

        xremove();
        wsw = $(window).width();
        wsh = $(window).height();

        tsw = mObj.width();
        tsh = mObj.height();

        var update = false;
        if (osw>wsw || osh>wsh) update = true;

        if (tsw > osw) tsw = osw;
        if (tsh > osh) tsh = osh;
        if (update) {
          mObj.width('100%');
        } else {
          if (osw != 0) mObj.width(osw);
        }
        if (oposition != 'fullscreen') if (adaptive_position_fit()) current.options.position = oposition; else current.options.position = current.options.mposition;
        if (!current.options.lensReverse) reverse = current.options.adaptiveReverse && current.options.position == current.options.mposition;
      }

      function spos() {
        var doc = document.documentElement;
        var left = (window.pageXOffset || doc.scrollLeft) - (doc.clientLeft || 0);
        var top = (window.pageYOffset || doc.scrollTop)  - (doc.clientTop || 0);

        return {left: left, top: top};
      }

      function adaptive_position_fit() {
        var moffset = mObj.offset();

        if (current.options.zoomWidth == 'auto') mw = tsw; else mw = current.options.zoomWidth;
        if (current.options.zoomHeight == 'auto') mh = tsh; else mh = current.options.zoomHeight;

        if (current.options.position.substr(0,1) == '#') xzoomID = $(current.options.position); else xzoomID.length = 0;
        if (xzoomID.length != 0) return true;

        switch(oposition) {
          case 'lens':
          case 'inside':
          return true;
          break;
          case 'top':
            stop = moffset.top;
            sleft = moffset.left;
            mtop = stop - mh;
            mleft = sleft;
          break;
          case 'left':
            stop = moffset.top;
            sleft = moffset.left;
            mtop = stop;
            mleft = sleft - mw;
          break;
          case 'bottom':
            stop = moffset.top;
            sleft = moffset.left;
            mtop = stop + tsh;
            mleft = sleft;
          break;
          case 'right':
          default:
            stop = moffset.top;
            sleft = moffset.left;
            mtop = stop;
            mleft = sleft + tsw;
        }
        if (mleft+mw>wsw || mleft<0) return false;
        return true;
      }

      this.xscroll = function(event) {
        mx = event.pageX || event.originalEvent.pageX;
        my = event.pageY || event.originalEvent.pageY;

        event.preventDefault();

        if (event.xscale) {
          scale = event.xscale;
          xscale(mx, my);
        } else {
          var delta = -event.originalEvent.detail || event.originalEvent.wheelDelta || event.xdelta;
          var x = mx;
          var y = my;
          if (ie) {
            x = iex;
            y = iey;
          }

          if (delta > 0) delta = -0.05; else delta = 0.05;

          scale += delta;

          xscale(x, y);
        }
      }

      function lensShape() {
        if (current.options.lensShape == 'circle' && current.options.position == 'lens') {
          lw = lh = Math.max(lw, lh);
          var radius = (lw + Math.max(ltc,llc) * 2) / 2;
          lens.css({'-moz-border-radius': radius, '-webkit-border-radius': radius, 'border-radius': radius});
        }
      }

      function lensOutput(x, y, sx, sy) {
        if (current.options.position == 'lens') {
          imgObj.css({top: -(y-stop) * cofy + (lh / 2), left: -(x-sleft) * cofx + (lw / 2)});
          if (current.options.bg) {
            lens.css({'background-image': 'url('+imgObj.attr('src')+')', 'background-repeat': 'no-repeat', 'background-position': (-(x-sleft) * cofx + (lw / 2))+'px '+(-(y-stop) * cofy + (lh / 2))+'px'});
            if (sx && sy) lens.css({'background-size': sx+'px '+sy+'px'});
          }
        } else {
          imgObj.css({top: -lt * cofy, left: -ll * cofx});
        }
      }

      function xscale(x, y) {
        if (scale < -1) scale = -1;
        if (scale > 1) scale = 1;

        var cc, iw, ih;

        if (c1 < c2) {
          cc = c1 - (c1 - 1) * scale;
          iw = mw * cc;
          ih = iw / iwh;
        } else {
          cc = c2 - (c2 - 1) * scale;
          ih = mh * cc;
          iw = ih * iwh;
        }

        if (flag) {
          u = x;
          v = y;
          su = iw;
          sv = ih;
        } else {
          if (!flag) {
            lsu = su = iw;
            lsv = sv = ih;
          }
          cofx = iw / sw;
          cofy = ih / sh;
          lw = mw / cofx;
          lh = mh / cofy;
          lensShape();
          set_lens(x, y);

          imgObj.width(iw);
          imgObj.height(ih);
          lens.width(lw);
          lens.height(lh);

          lens.css({top: lt - ltc, left: ll - llc});
          lensImg.css({top: -lt, left: -ll});
          lensOutput(x, y, iw, ih);
        }
      }

      function loopZoom() {
        var x = lu;
        var y = lv;
        var x2 = llu;
        var y2 = llv;
        var sx = lsu;
        var sy = lsv;
        x += (u - x) / current.options.smoothLensMove;
        y += (v - y) / current.options.smoothLensMove;

        x2 += (u - x2) / current.options.smoothZoomMove;
        y2 += (v - y2) / current.options.smoothZoomMove;

        sx += (su - sx) / current.options.smoothScale;
        sy += (sv - sy) / current.options.smoothScale;

        cofx = sx / sw;
        cofy = sy / sh;

        lw = mw / cofx;
        lh = mh / cofy;
        lensShape();
        set_lens(x, y);

        imgObj.width(sx);
        imgObj.height(sy);

        lens.width(lw);
        lens.height(lh);

        lens.css({top: lt - ltc, left: ll - llc});
        lensImg.css({top: -lt, left: -ll});

        set_lens(x2, y2);
        lensOutput(x, y, sx, sy);

        lu = x;
        lv = y;
        llu = x2;
        llv = y2;
        lsu = sx;
        lsv = sy;

        if (flag) requestAnimFrame(loopZoom);
      }

      function set_lens(x, y) {
        x -= sleft;
        y -= stop;
        ll = x - (lw / 2);
        lt = y - (lh / 2);

        if (current.options.position != 'lens' && current.options.lensCollision) {
          if (ll < 0) ll = 0;
          if (sw >= lw && ll > sw - lw) ll = sw - lw;
          if (sw < lw) ll = sw / 2 - lw / 2;
          if (lt < 0) lt = 0;
          if (sh >= lh && lt > sh - lh) lt = sh - lh;
          if (sh < lh) lt = sh / 2 - lh / 2;
        }
      }

      function xremove() {
        if (typeof source != "undefined") source.remove();
        if (typeof preview != "undefined") preview.remove();
        if (typeof caption_container != "undefined") caption_container.remove();
      }

      function prepare_zoom(x, y) {
        if (current.options.position == 'fullscreen') {
          sw = $(window).width();
          sh = $(window).height();
        } else {
          sw = mObj.width();
          sh = mObj.height();
        }

        loading.css({top: sh / 2 - loading.height() / 2, left: sw / 2 - loading.width() / 2});

        if (current.options.rootOutput || current.options.position == 'fullscreen') {
          moffset = mObj.offset();
        } else {
          moffset = mObj.position();
        }

        moffset.top = Math.round(moffset.top);
        moffset.left = Math.round(moffset.left);

        switch(current.options.position) {
          case 'fullscreen':
            stop = spos().top;
            sleft = spos().left;
            mtop = 0;
            mleft = 0;
          break;
          case 'inside':
            stop = moffset.top;
            sleft = moffset.left;
            mtop = 0;
            mleft = 0;
          break;
          case 'top':
            stop = moffset.top;
            sleft = moffset.left;
            mtop = stop - mh;
            mleft = sleft;
          break;
          case 'left':
            stop = moffset.top;
            sleft = moffset.left;
            mtop = stop;
            mleft = sleft - mw;
          break;
          case 'bottom':
            stop = moffset.top;
            sleft = moffset.left;
            mtop = stop + sh;
            mleft = sleft;
          break;
          case 'right':
          default:
            stop = moffset.top;
            sleft = moffset.left;
            mtop = stop;
            mleft = sleft + sw;
        }

        stop -= source.outerHeight() / 2;
        sleft -= source.outerWidth() / 2;

        if (current.options.position.substr(0,1) == '#') xzoomID = $(current.options.position); else xzoomID.length = 0;
        if (xzoomID.length == 0 && current.options.position != 'inside' && current.options.position!= 'fullscreen') {

          if (!current.options.adaptive || !osw || !osh) {osw = sw; osh = sh;}
          if (current.options.zoomWidth == 'auto') mw = sw; else mw = current.options.zoomWidth;
          if (current.options.zoomHeight == 'auto') mh = sh; else mh = current.options.zoomHeight;

          mtop += current.options.Yoffset;
          mleft += current.options.Xoffset;

          preview.css({width: mw + 'px', height: mh + 'px', top: mtop, left: mleft});
          if (current.options.position != 'lens') parent.append(preview);
        } else if (current.options.position == 'inside' || current.options.position == 'fullscreen') {
          mw = sw;
          mh = sh;

          preview.css({width: mw + 'px', height: mh + 'px'});
          source.append(preview);
        } else {
          mw = xzoomID.width();
          mh = xzoomID.height();

          if (current.options.rootOutput) {
            mtop = xzoomID.offset().top;
            mleft = xzoomID.offset().left;

            parent.append(preview);
          } else {
            mtop = xzoomID.position().top;
            mleft = xzoomID.position().left;

            xzoomID.parent().append(preview);
          }

          mtop += (xzoomID.outerHeight() - mh - preview.outerHeight()) / 2;
          mleft += (xzoomID.outerWidth() - mw - preview.outerWidth()) / 2;
          preview.css({width: mw + 'px', height: mh + 'px', top: mtop, left: mleft});
        }

        if (current.options.title && title != '') {
          if (current.options.position == 'inside' || current.options.position == 'lens' || current.options.position == 'fullscreen') {
            ctop = mtop;
            cleft = mleft;
            source.append(caption_container);
          } else {
            ctop = mtop + (preview.outerHeight()-mh)/2;
            cleft = mleft + (preview.outerWidth()-mw)/2;
            parent.append(caption_container);
          }
          caption_container.css({width: mw + 'px', height: mh + 'px', top: ctop, left: cleft});
        }

        source.css({width: sw + 'px', height: sh + 'px', top: stop, left: sleft});
        tint.css({width: sw + 'px', height: sh + 'px'});
        if (current.options.tint && (current.options.position != 'inside' && current.options.position != 'fullscreen'))
          tint.css('background-color', current.options.tint)
        else if (ie) {
          tint.css({'background-image': 'url('+mObj.attr('src')+')', 'background-color': '#fff'});
        }

        img = new Image();

        var timestamp = '';
        if (aie) timestamp = '?r='+(new Date()).getTime();
        img.src = mObj.attr('xoriginal')+timestamp;

        imgObj = $(img);
        imgObj.css('position', 'absolute');

        img = new Image();
        img.src = mObj.attr('src');

        lensImg = $(img);
        lensImg.css('position', 'absolute');
        lensImg.width(sw);

        switch (current.options.position) {
          case 'fullscreen':
          case 'inside':
            preview.append(imgObj);
          break;
          case 'lens':
            lens.append(imgObj);
            if (current.options.bg) imgObj.css({display: 'none'});
          break;
          default:
            preview.append(imgObj);
            lens.append(lensImg);
        }
      }

      this.openzoom = function (event) {
          mx = event.pageX; my = event.pageY;

          if (current.options.adaptive) current.adaptive();
          scale = current.options.defaultScale; flag = false;

          source = $('<div></div>');
          if (current.options.sourceClass != '') source.addClass(current.options.sourceClass);
          source.css('position', 'absolute');

          loading = $('<div></div>');
          if (current.options.loadingClass != '') loading.addClass(current.options.loadingClass);
          loading.css('position', 'absolute');

          tint = $('<div style="position: absolute; top: 0; left: 0;"></div>');

          source.append(loading);

          preview = $('<div></div>');
          if (current.options.zoomClass != '' && current.options.position != 'fullscreen') preview.addClass(current.options.zoomClass);
          preview.css({position: 'absolute', overflow: 'hidden', opacity: 1});

          if (current.options.title && title != '') {
            caption_container = $('<div></div>');
            caption = $('<div></div>');
            caption_container.css({position: 'absolute', opacity: 1});
            if (current.options.titleClass) caption.addClass(current.options.titleClass);
            caption.html('<span>'+title+'</span>');
            caption_container.append(caption);
            if (current.options.fadeIn) caption_container.css({opacity:0});
          }

          lens = $('<div></div>');
          if (current.options.lensClass != '') lens.addClass(current.options.lensClass);
          lens.css({position: 'absolute', overflow: 'hidden'});

          if (current.options.lens) {
            lenstint = $('<div></div>');
            lenstint.css({position: 'absolute', background: current.options.lens, opacity: current.options.lensOpacity, width: '100%', height: '100%', top: 0, left: 0, 'z-index': 9999});
            lens.append(lenstint);
          }

          prepare_zoom(mx, my);

          if (current.options.position != 'inside' && current.options.position != 'fullscreen') {
            if (current.options.tint || ie) source.append(tint);

            if (current.options.fadeIn) {
              tint.css({opacity:0});
              lens.css({opacity:0});
              preview.css({opacity:0});
            }
            parent.append(source);
          } else {
            if (current.options.fadeIn) preview.css({opacity:0});
            parent.append(source);
          }

          current.eventmove(source);

          current.eventleave(source);

          switch(current.options.position) {
            case 'inside':
              mtop -= (preview.outerHeight() - preview.height()) / 2;
              mleft -= (preview.outerWidth() - preview.width()) / 2;
            break;
            case 'top':
              mtop -= preview.outerHeight() - preview.height();
              mleft -= (preview.outerWidth() - preview.width()) / 2;
            break;
            case 'left':
              mtop -= (preview.outerHeight()  - preview.height()) / 2;
              mleft -= preview.outerWidth() - preview.width();
            break;
            case 'bottom':
              mleft -= (preview.outerWidth() - preview.width()) / 2;
            break;
            case 'right':
              mtop -= (preview.outerHeight() - preview.height()) / 2;
          }

          preview.css({top: mtop, left: mleft});

          imgObj.xon('load', function(e) {
            loading.remove();

            if (!current.options.openOnSmall && (imgObj.width() < mw || imgObj.height() < mh)) {
              current.closezoom();
              e.preventDefault();
              return false;
            }

            if (current.options.scroll) current.eventscroll(source);

            if (current.options.position != 'inside' && current.options.position != 'fullscreen') {
              source.append(lens);
              if (current.options.fadeIn) {
                tint.fadeTo(300, current.options.tintOpacity);
                lens.fadeTo(300, 1);
                preview.fadeTo(300,1);
              } else {
                tint.css({opacity: current.options.tintOpacity});
                lens.css({opacity: 1});
                preview.css({opacity: 1});
              }
            } else {
              if (current.options.fadeIn) {
                preview.fadeTo(300,1);
              } else {
                preview.css({opacity: 1});
              }
            }

            if (current.options.title && title != '') {
              if (current.options.fadeIn) caption_container.fadeTo(300,1); else caption_container.css({opacity: 1});
            }

            imgObjwidth = imgObj.width();
            imgObjheight = imgObj.height();

            if (current.options.adaptive) {
              if (sw<osw || sh<osh) {
                lensImg.width(sw);
                lensImg.height(sh);

                imgObjwidth = sw/osw * imgObjwidth;
                imgObjheight = sh/osh * imgObjheight;

                imgObj.width(imgObjwidth);
                imgObj.height(imgObjheight);
              }
            }

            lsu = su = imgObjwidth;
            lsv = sv = imgObjheight;
            iwh = imgObjwidth / imgObjheight;
            c1 = imgObjwidth / mw;
            c2 = imgObjheight / mh;

            var t, o = ['padding-','border-'];
            ltc = llc = 0;
            for(var i = 0; i<o.length;i++) {
              t = parseFloat(lens.css(o[i]+'top-width'));
              ltc += t !== t ? 0 : t;
              t = parseFloat(lens.css(o[i]+'bottom-width'));
              ltc += t !== t ? 0 : t;
              t = parseFloat(lens.css(o[i]+'left-width'));
              llc += t !== t ? 0 : t;
              t = parseFloat(lens.css(o[i]+'right-width'));
              llc += t !== t ? 0 : t;
            }
            ltc /= 2;
            llc /= 2;
            llu = lu = u = mx;
            llv = lv = v = my;
            xscale(mx, my);

            if (current.options.smooth) {flag = true; requestAnimFrame(loopZoom);}

            current.eventclick(source);
          });
      }


      this.movezoom = function(event) {
        mx = event.pageX;
        my = event.pageY;
        if (ie) {
          iex = mx;
          iey = my;
        }

        var x = mx - sleft;
        var y = my - stop;

        if (reverse) {
          event.pageX -= (x - sw / 2) * 2;
          event.pageY -= (y - sh / 2) * 2;
        }

        if (x < 0 || x > sw || y < 0 || y > sh) source.trigger('mouseleave');
        if (current.options.smooth) {
          u = event.pageX;
          v = event.pageY;
        } else {
          lensShape();
          set_lens(event.pageX, event.pageY);
          lens.css({top: lt - ltc, left: ll - llc});
          lensImg.css({top: -lt, left: -ll});
          lensOutput(event.pageX,event.pageY, 0, 0);
        }
      }

      this.eventdefault = function() {
        current.eventopen = function(element) {
          element.xon('mouseenter', current.openzoom);
        }

        current.eventleave = function(element) {
          element.xon('mouseleave', current.closezoom);
        }

        current.eventmove = function(element) {
          element.xon('mousemove', current.movezoom);
        }

        current.eventscroll = function(element) {
          element.xon('mousewheel DOMMouseScroll', current.xscroll);
        }

        current.eventclick = function(element) {
          element.xon('click', function(event) {
            mObj.trigger('click');
          });
        }
      }

      this.eventunbind = function() {
        mObj.xoff('mouseenter');
        current.eventopen = function(element) {}
        current.eventleave = function(element) {}
        current.eventmove = function(element) {}
        current.eventscroll = function(element) {}
        current.eventclick = function(element) {}
      }

      this.init = function (options) {
        current.options = $.extend({},$.fn.xzoom.defaults, options);

        if (current.options.rootOutput) {
          parent = $("body");
        } else {
          parent = mObj.parent();
        }

        oposition = current.options.position;

        reverse = current.options.lensReverse && current.options.position == 'inside';

        if (current.options.smoothZoomMove < 1) current.options.smoothZoomMove = 1;
        if (current.options.smoothLensMove < 1) current.options.smoothLensMove = 1;
        if (current.options.smoothScale < 1) current.options.smoothScale = 1;

        if (current.options.adaptive) {
          $(window).xon('load',function(){
            osw = mObj.width();
            osh = mObj.height();

            current.adaptive();
            $(window).resize(current.adaptive);
          });
        }
        current.eventdefault();
        current.eventopen(mObj);
      }

      this.destroy = function() {
        current.eventunbind();
      }

      this.closezoom = function() {
        flag = false;
        if (current.options.fadeOut) {
          if (current.options.title && title != '') caption_container.fadeOut(299);
          if (current.options.position != 'inside' || current.options.position != 'fullscreen') {
            preview.fadeOut(299);
            source.fadeOut(300, function(){xremove()});
          } else {
            source.fadeOut(300, function(){xremove()});
          }
        } else {
          xremove();
        }
      }

      this.gallery = function() {
        var g = new Array();
        var i,j = 0;
        for (i = cindex; i<imageGallery.length; i++) {
          g[j] = imageGallery[i];j++;
        }
        for (i = 0; i<cindex; i++) {
          g[j] = imageGallery[i];j++;
        }

        return {index: cindex, ogallery: imageGallery, cgallery: g};
      }

      function get_title(element) {
        var otitle = element.attr('title');
        var xotitle = element.attr('xtitle');
        if (xotitle) {
          return xotitle;
        } else if (otitle) {
          return otitle
        } else {
          return '';
        }
      }

      this.xappend = function(Obj) {
        var link = Obj.parent();
        imageGallery[index] = link.attr('href');
        link.data('xindex', index);
        if (index == 0 && current.options.activeClass) {active = Obj; active.addClass(current.options.activeClass)}
        if (index == 0 && current.options.title) title = get_title(Obj);
        index++;

        function thumbchange(event) {
          xremove();
          event.preventDefault();
          if (current.options.activeClass) {
            active.removeClass(current.options.activeClass);
            active = Obj;
            active.addClass(current.options.activeClass);
          }
          cindex = $(this).data('xindex');
          if (current.options.fadeTrans) {
            transImg = new Image();
            transImg.src = mObj.attr('src');
            trans = $(transImg);
            trans.css({position: 'absolute', top: mObj.offset().top, left: mObj.offset().left, width: mObj.width(), height: mObj.height()});
            $(document.body).append(trans);
            trans.fadeOut(200, function() {trans.remove()});
          }
          var _xorig = link.attr('href');
          var _prev = Obj.attr('xpreview') || Obj.attr('src');

          title = get_title(Obj);
          if (Obj.attr('title')) mObj.attr('title',Obj.attr('title'));

          mObj.attr('xoriginal',_xorig);
          mObj.removeAttr('style');
          mObj.attr('src', _prev);
          if (current.options.adaptive) {
            osw = mObj.width();
            osh = mObj.height();
          }
        }

        if (current.options.hover) {
          link.xon('mouseenter', link, thumbchange);
        }
        link.xon('click', link, thumbchange);
      }

      this.init(opts);
    }

      $.fn.xzoom = function(options) {
        var mainObj;
        var secObj;

        if (this.selector) {
          var el = this.selector.split(",");
          for (var i in el) el[i] = $.trim(el[i]);
          this.each(function(index) {
            if (el.length == 1) {
              if (index == 0) {
                mainObj = $(this);
              if (typeof(mainObj.data('xzoom')) !== 'undefined') return mainObj.data('xzoom');
                mainObj.x = new xobject(mainObj, options);
              } else if(typeof(mainObj.x) !== 'undefined') {
                secObj = $(this);
                mainObj.x.xappend(secObj);
              }
            } else {
              if ($(this).is(el[0]) && index == 0) {
                mainObj = $(this);
              if (typeof(mainObj.data('xzoom')) !== 'undefined') return mainObj.data('xzoom');
                mainObj.x = new xobject(mainObj, options);
              } else if(typeof(mainObj.x) !== 'undefined' && !$(this).is(el[0])) {
                secObj = $(this);
                mainObj.x.xappend(secObj);
              }
            }
          });
        } else this.each(function(index) {
          if (index == 0) {
            mainObj = $(this);
            if (typeof(mainObj.data('xzoom')) !== 'undefined') return mainObj.data('xzoom');
            mainObj.x = new xobject(mainObj, options);
          } else if(typeof(mainObj.x) !== 'undefined') {
            secObj = $(this);
            mainObj.x.xappend(secObj);
          }
        });
        if (typeof(mainObj) === 'undefined') return false;
        mainObj.data('xzoom', mainObj.x);

        $(mainObj).trigger('xzoom_ready');
        return mainObj.x;
      }

    $.fn.xzoom.defaults = {
      position: 'left',
      mposition: 'inside',
      rootOutput: true,
      Xoffset: 0,
      Yoffset: 0,
      fadeIn: true,
      fadeTrans: true,
      fadeOut: false,
      smooth: true,
      smoothZoomMove: 3,
      smoothLensMove: 1,
      smoothScale: 6,
      defaultScale: 0,
      scroll: true,
      tint: false,
      tintOpacity: 0.5,
      lens: false,
      lensOpacity: 0.5,
      lensShape: 'box',
      lensCollision: true,
      lensReverse: false,
      openOnSmall: true,
      zoomWidth: 'auto',
      zoomHeight: 'auto',
      sourceClass: 'xzoom-source',
      loadingClass: 'xzoom-loading',
      lensClass: 'xzoom-lens',
      zoomClass: 'xzoom-preview',
      activeClass: 'xactive',
      hover: false,
      adaptive: true,
      adaptiveReverse: false,
      title: false,
      titleClass: 'xzoom-caption',
      bg: false
    };
})(jQuery);


;(function (factory) {
  if (typeof define === 'function' && define.amd) {
   define(['jquery'], factory);
   } else if (typeof exports === 'object') {

   factory(require('jquery'));
   } else {
   factory(window.jQuery || window.Zepto);
   }
   }(function($) {

  var CLOSE_EVENT = 'Close',
    BEFORE_CLOSE_EVENT = 'BeforeClose',
    AFTER_CLOSE_EVENT = 'AfterClose',
    BEFORE_APPEND_EVENT = 'BeforeAppend',
    MARKUP_PARSE_EVENT = 'MarkupParse',
    OPEN_EVENT = 'Open',
    CHANGE_EVENT = 'Change',
    NS = 'mfp',
    EVENT_NS = '.' + NS,
    READY_CLASS = 'mfp-ready',
    REMOVING_CLASS = 'mfp-removing',
    PREVENT_CLOSE_CLASS = 'mfp-prevent-close';



  var mfp,
    MagnificPopup = function(){},
    _isJQ = !!(window.jQuery),
    _prevStatus,
    _window = $(window),
    _document,
    _prevContentType,
    _wrapClasses,
    _currPopupType;


  var _mfpOn = function(name, f) {
      mfp.ev.on(NS + name + EVENT_NS, f);
    },
    _getEl = function(className, appendTo, html, raw) {
      var el = document.createElement('div');
      el.className = 'mfp-'+className;
      if(html) {
        el.innerHTML = html;
      }
      if(!raw) {
        el = $(el);
        if(appendTo) {
          el.appendTo(appendTo);
        }
      } else if(appendTo) {
        appendTo.appendChild(el);
      }
      return el;
    },
    _mfpTrigger = function(e, data) {
      mfp.ev.triggerHandler(NS + e, data);

      if(mfp.st.callbacks) {
        e = e.charAt(0).toLowerCase() + e.slice(1);
        if(mfp.st.callbacks[e]) {
          mfp.st.callbacks[e].apply(mfp, $.isArray(data) ? data : [data]);
        }
      }
    },
    _getCloseBtn = function(type) {
      if(type !== _currPopupType || !mfp.currTemplate.closeBtn) {
        mfp.currTemplate.closeBtn = $( mfp.st.closeMarkup.replace('%title%', mfp.st.tClose ) );
        _currPopupType = type;
      }
      return mfp.currTemplate.closeBtn;
    },
    _checkInstance = function() {
      if(!$.magnificPopup.instance) {
        /*jshint -W020 */
        mfp = new MagnificPopup();
        mfp.init();
        $.magnificPopup.instance = mfp;
      }
    },

    supportsTransitions = function() {
      var s = document.createElement('p').style,
        v = ['ms','O','Moz','Webkit'];

      if( s['transition'] !== undefined ) {
        return true;
      }

      while( v.length ) {
        if( v.pop() + 'Transition' in s ) {
          return true;
        }
      }

      return false;
    };


  MagnificPopup.prototype = {

    constructor: MagnificPopup,

    init: function() {
      var appVersion = navigator.appVersion;
      mfp.isLowIE = mfp.isIE8 = document.all && !document.addEventListener;
      mfp.isAndroid = (/android/gi).test(appVersion);
      mfp.isIOS = (/iphone|ipad|ipod/gi).test(appVersion);
      mfp.supportsTransition = supportsTransitions();

      mfp.probablyMobile = (mfp.isAndroid || mfp.isIOS || /(Opera Mini)|Kindle|webOS|BlackBerry|(Opera Mobi)|(Windows Phone)|IEMobile/i.test(navigator.userAgent) );
      _document = $(document);

      mfp.popupsCache = {};
    },

    open: function(data) {

      var i;

      if(data.isObj === false) {
        mfp.items = data.items.toArray();

        mfp.index = 0;
        var items = data.items,
          item;
        for(i = 0; i < items.length; i++) {
          item = items[i];
          if(item.parsed) {
            item = item.el[0];
          }
          if(item === data.el[0]) {
            mfp.index = i;
            break;
          }
        }
      } else {
        mfp.items = $.isArray(data.items) ? data.items : [data.items];
        mfp.index = data.index || 0;
      }

      if(mfp.isOpen) {
        mfp.updateItemHTML();
        return;
      }

      mfp.types = [];
      _wrapClasses = '';
      if(data.mainEl && data.mainEl.length) {
        mfp.ev = data.mainEl.eq(0);
      } else {
        mfp.ev = _document;
      }

      if(data.key) {
        if(!mfp.popupsCache[data.key]) {
          mfp.popupsCache[data.key] = {};
        }
        mfp.currTemplate = mfp.popupsCache[data.key];
      } else {
        mfp.currTemplate = {};
      }



      mfp.st = $.extend(true, {}, $.magnificPopup.defaults, data );
      mfp.fixedContentPos = mfp.st.fixedContentPos === 'auto' ? !mfp.probablyMobile : mfp.st.fixedContentPos;

      if(mfp.st.modal) {
        mfp.st.closeOnContentClick = false;
        mfp.st.closeOnBgClick = false;
        mfp.st.showCloseBtn = false;
        mfp.st.enableEscapeKey = false;
      }

      if(!mfp.bgOverlay) {

        mfp.bgOverlay = _getEl('bg').on('click'+EVENT_NS, function() {
          mfp.close();
        });

        mfp.wrap = _getEl('wrap').attr('tabindex', -1).on('click'+EVENT_NS, function(e) {
          if(mfp._checkIfClose(e.target)) {
            mfp.close();
          }
        });

        mfp.container = _getEl('container', mfp.wrap);
      }

      mfp.contentContainer = _getEl('content');
      if(mfp.st.preloader) {
        mfp.preloader = _getEl('preloader', mfp.container, mfp.st.tLoading);
      }

      var modules = $.magnificPopup.modules;
      for(i = 0; i < modules.length; i++) {
        var n = modules[i];
        n = n.charAt(0).toUpperCase() + n.slice(1);
        mfp['init'+n].call(mfp);
      }
      _mfpTrigger('BeforeOpen');


      if(mfp.st.showCloseBtn) {
        if(!mfp.st.closeBtnInside) {
          mfp.wrap.append( _getCloseBtn() );
        } else {
          _mfpOn(MARKUP_PARSE_EVENT, function(e, template, values, item) {
            values.close_replaceWith = _getCloseBtn(item.type);
          });
          _wrapClasses += ' mfp-close-btn-in';
        }
      }

      if(mfp.st.alignTop) {
        _wrapClasses += ' mfp-align-top';
      }



      if(mfp.fixedContentPos) {
        mfp.wrap.css({
          overflow: mfp.st.overflowY,
          overflowX: 'hidden',
          overflowY: mfp.st.overflowY
        });
      } else {
        mfp.wrap.css({
          top: _window.scrollTop(),
          position: 'absolute'
        });
      }
      if( mfp.st.fixedBgPos === false || (mfp.st.fixedBgPos === 'auto' && !mfp.fixedContentPos) ) {
        mfp.bgOverlay.css({
          height: _document.height(),
          position: 'absolute'
        });
      }



      if(mfp.st.enableEscapeKey) {
        _document.on('keyup' + EVENT_NS, function(e) {
          if(e.keyCode === 27) {
            mfp.close();
          }
        });
      }

      _window.on('resize' + EVENT_NS, function() {
        mfp.updateSize();
      });


      if(!mfp.st.closeOnContentClick) {
        _wrapClasses += ' mfp-auto-cursor';
      }

      if(_wrapClasses)
        mfp.wrap.addClass(_wrapClasses);

      var windowHeight = mfp.wH = _window.height();


      var windowStyles = {};

      if( mfp.fixedContentPos ) {
              if(mfp._hasScrollBar(windowHeight)){
                  var s = mfp._getScrollbarSize();
                  if(s) {
                      windowStyles.marginRight = s;
                  }
              }
          }

      if(mfp.fixedContentPos) {
        if(!mfp.isIE7) {
          windowStyles.overflow = 'hidden';
        } else {
          $('body, html').css('overflow', 'hidden');
        }
      }



      var classesToadd = mfp.st.mainClass;
      if(mfp.isIE7) {
        classesToadd += ' mfp-ie7';
      }
      if(classesToadd) {
        mfp._addClassToMFP( classesToadd );
      }

      mfp.updateItemHTML();

      _mfpTrigger('BuildControls');

      $('html').css(windowStyles);
      mfp.bgOverlay.add(mfp.wrap).prependTo( mfp.st.prependTo || $(document.body) );
      mfp._lastFocusedEl = document.activeElement;
      setTimeout(function() {

        if(mfp.content) {
          mfp._addClassToMFP(READY_CLASS);
          mfp._setFocus();
        } else {
          mfp.bgOverlay.addClass(READY_CLASS);
        }
        _document.on('focusin' + EVENT_NS, mfp._onFocusIn);

      }, 16);

      mfp.isOpen = true;
      mfp.updateSize(windowHeight);
      _mfpTrigger(OPEN_EVENT);

      return data;
    },

    close: function() {
      if(!mfp.isOpen) return;
      _mfpTrigger(BEFORE_CLOSE_EVENT);

      mfp.isOpen = false;
      if(mfp.st.removalDelay && !mfp.isLowIE && mfp.supportsTransition )  {
        mfp._addClassToMFP(REMOVING_CLASS);
        setTimeout(function() {
          mfp._close();
        }, mfp.st.removalDelay);
      } else {
        mfp._close();
      }
    },

    _close: function() {
      _mfpTrigger(CLOSE_EVENT);

      var classesToRemove = REMOVING_CLASS + ' ' + READY_CLASS + ' ';

      mfp.bgOverlay.detach();
      mfp.wrap.detach();
      mfp.container.empty();

      if(mfp.st.mainClass) {
        classesToRemove += mfp.st.mainClass + ' ';
      }

      mfp._removeClassFromMFP(classesToRemove);

      if(mfp.fixedContentPos) {
        var windowStyles = {marginRight: ''};
        if(mfp.isIE7) {
          $('body, html').css('overflow', '');
        } else {
          windowStyles.overflow = '';
        }
        $('html').css(windowStyles);
      }

      _document.off('keyup' + EVENT_NS + ' focusin' + EVENT_NS);
      mfp.ev.off(EVENT_NS);

      mfp.wrap.attr('class', 'mfp-wrap').removeAttr('style');
      mfp.bgOverlay.attr('class', 'mfp-bg');
      mfp.container.attr('class', 'mfp-container');

      if(mfp.st.showCloseBtn &&
      (!mfp.st.closeBtnInside || mfp.currTemplate[mfp.currItem.type] === true)) {
        if(mfp.currTemplate.closeBtn)
          mfp.currTemplate.closeBtn.detach();
      }


      if(mfp.st.autoFocusLast && mfp._lastFocusedEl) {
        $(mfp._lastFocusedEl).focus();
      }
      mfp.currItem = null;
      mfp.content = null;
      mfp.currTemplate = null;
      mfp.prevHeight = 0;

      _mfpTrigger(AFTER_CLOSE_EVENT);
    },

    updateSize: function(winHeight) {

      if(mfp.isIOS) {
        var zoomLevel = document.documentElement.clientWidth / window.innerWidth;
        var height = window.innerHeight * zoomLevel;
        mfp.wrap.css('height', height);
        mfp.wH = height;
      } else {
        mfp.wH = winHeight || _window.height();
      }
      if(!mfp.fixedContentPos) {
        mfp.wrap.css('height', mfp.wH);
      }

      _mfpTrigger('Resize');

    },

    updateItemHTML: function() {
      var item = mfp.items[mfp.index];
      mfp.contentContainer.detach();

      if(mfp.content)
        mfp.content.detach();

      if(!item.parsed) {
        item = mfp.parseEl( mfp.index );
      }

      var type = item.type;

      _mfpTrigger('BeforeChange', [mfp.currItem ? mfp.currItem.type : '', type]);

      mfp.currItem = item;

      if(!mfp.currTemplate[type]) {
        var markup = mfp.st[type] ? mfp.st[type].markup : false;

        _mfpTrigger('FirstMarkupParse', markup);

        if(markup) {
          mfp.currTemplate[type] = $(markup);
        } else {
          mfp.currTemplate[type] = true;
        }
      }

      if(_prevContentType && _prevContentType !== item.type) {
        mfp.container.removeClass('mfp-'+_prevContentType+'-holder');
      }

      var newContent = mfp['get' + type.charAt(0).toUpperCase() + type.slice(1)](item, mfp.currTemplate[type]);
      mfp.appendContent(newContent, type);

      item.preloaded = true;

      _mfpTrigger(CHANGE_EVENT, item);
      _prevContentType = item.type;
      mfp.container.prepend(mfp.contentContainer);

      _mfpTrigger('AfterChange');
    },

    appendContent: function(newContent, type) {
      mfp.content = newContent;

      if(newContent) {
        if(mfp.st.showCloseBtn && mfp.st.closeBtnInside &&
          mfp.currTemplate[type] === true) {
          if(!mfp.content.find('.mfp-close').length) {
            mfp.content.append(_getCloseBtn());
          }
        } else {
          mfp.content = newContent;
        }
      } else {
        mfp.content = '';
      }

      _mfpTrigger(BEFORE_APPEND_EVENT);
      mfp.container.addClass('mfp-'+type+'-holder');

      mfp.contentContainer.append(mfp.content);
    },

    parseEl: function(index) {
      var item = mfp.items[index],
        type;

      if(item.tagName) {
        item = { el: $(item) };
      } else {
        type = item.type;
        item = { data: item, src: item.src };
      }

      if(item.el) {
        var types = mfp.types;
        for(var i = 0; i < types.length; i++) {
          if( item.el.hasClass('mfp-'+types[i]) ) {
            type = types[i];
            break;
          }
        }

        item.src = item.el.attr('data-mfp-src');
        if(!item.src) {
          item.src = item.el.attr('href');
        }
      }

      item.type = type || mfp.st.type || 'inline';
      item.index = index;
      item.parsed = true;
      mfp.items[index] = item;
      _mfpTrigger('ElementParse', item);

      return mfp.items[index];
    },

    addGroup: function(el, options) {
      var eHandler = function(e) {
        e.mfpEl = this;
        mfp._openClick(e, el, options);
      };

      if(!options) {
        options = {};
      }

      var eName = 'click.magnificPopup';
      options.mainEl = el;

      if(options.items) {
        options.isObj = true;
        el.off(eName).on(eName, eHandler);
      } else {
        options.isObj = false;
        if(options.delegate) {
          el.off(eName).on(eName, options.delegate , eHandler);
        } else {
          options.items = el;
          el.off(eName).on(eName, eHandler);
        }
      }
    },
    _openClick: function(e, el, options) {
      var midClick = options.midClick !== undefined ? options.midClick : $.magnificPopup.defaults.midClick;


      if(!midClick && ( e.which === 2 || e.ctrlKey || e.metaKey || e.altKey || e.shiftKey ) ) {
        return;
      }

      var disableOn = options.disableOn !== undefined ? options.disableOn : $.magnificPopup.defaults.disableOn;

      if(disableOn) {
        if($.isFunction(disableOn)) {
          if( !disableOn.call(mfp) ) {
            return true;
          }
        } else {
          if( _window.width() < disableOn ) {
            return true;
          }
        }
      }

      if(e.type) {
        e.preventDefault();

        if(mfp.isOpen) {
          e.stopPropagation();
        }
      }

      options.el = $(e.mfpEl);
      if(options.delegate) {
        options.items = el.find(options.delegate);
      }
      mfp.open(options);
    },

    updateStatus: function(status, text) {

      if(mfp.preloader) {
        if(_prevStatus !== status) {
          mfp.container.removeClass('mfp-s-'+_prevStatus);
        }

        if(!text && status === 'loading') {
          text = mfp.st.tLoading;
        }

        var data = {
          status: status,
          text: text
        };
        _mfpTrigger('UpdateStatus', data);

        status = data.status;
        text = data.text;

        mfp.preloader.html(text);

        mfp.preloader.find('a').on('click', function(e) {
          e.stopImmediatePropagation();
        });

        mfp.container.addClass('mfp-s-'+status);
        _prevStatus = status;
      }
    },

    _checkIfClose: function(target) {

      if($(target).hasClass(PREVENT_CLOSE_CLASS)) {
        return;
      }

      var closeOnContent = mfp.st.closeOnContentClick;
      var closeOnBg = mfp.st.closeOnBgClick;

      if(closeOnContent && closeOnBg) {
        return true;
      } else {

        if(!mfp.content || $(target).hasClass('mfp-close') || (mfp.preloader && target === mfp.preloader[0]) ) {
          return true;
        }

        if(  (target !== mfp.content[0] && !$.contains(mfp.content[0], target))  ) {
          if(closeOnBg) {
            if( $.contains(document, target) ) {
              return true;
            }
          }
        } else if(closeOnContent) {
          return true;
        }

      }
      return false;
    },
    _addClassToMFP: function(cName) {
      mfp.bgOverlay.addClass(cName);
      mfp.wrap.addClass(cName);
    },
    _removeClassFromMFP: function(cName) {
      this.bgOverlay.removeClass(cName);
      mfp.wrap.removeClass(cName);
    },
    _hasScrollBar: function(winHeight) {
      return (  (mfp.isIE7 ? _document.height() : document.body.scrollHeight) > (winHeight || _window.height()) );
    },
    _setFocus: function() {
      (mfp.st.focus ? mfp.content.find(mfp.st.focus).eq(0) : mfp.wrap).focus();
    },
    _onFocusIn: function(e) {
      if( e.target !== mfp.wrap[0] && !$.contains(mfp.wrap[0], e.target) ) {
        mfp._setFocus();
        return false;
      }
    },
    _parseMarkup: function(template, values, item) {
      var arr;
      if(item.data) {
        values = $.extend(item.data, values);
      }
      _mfpTrigger(MARKUP_PARSE_EVENT, [template, values, item] );

      $.each(values, function(key, value) {
        if(value === undefined || value === false) {
          return true;
        }
        arr = key.split('_');
        if(arr.length > 1) {
          var el = template.find(EVENT_NS + '-'+arr[0]);

          if(el.length > 0) {
            var attr = arr[1];
            if(attr === 'replaceWith') {
              if(el[0] !== value[0]) {
                el.replaceWith(value);
              }
            } else if(attr === 'img') {
              if(el.is('img')) {
                el.attr('src', value);
              } else {
                el.replaceWith( $('<img>').attr('src', value).attr('class', el.attr('class')) );
              }
            } else {
              el.attr(arr[1], value);
            }
          }

        } else {
          template.find(EVENT_NS + '-'+key).html(value);
        }
      });
    },

    _getScrollbarSize: function() {
      if(mfp.scrollbarSize === undefined) {
        var scrollDiv = document.createElement("div");
        scrollDiv.style.cssText = 'width: 99px; height: 99px; overflow: scroll; position: absolute; top: -9999px;';
        document.body.appendChild(scrollDiv);
        mfp.scrollbarSize = scrollDiv.offsetWidth - scrollDiv.clientWidth;
        document.body.removeChild(scrollDiv);
      }
      return mfp.scrollbarSize;
    }

  };
  $.magnificPopup = {
    instance: null,
    proto: MagnificPopup.prototype,
    modules: [],

    open: function(options, index) {
      _checkInstance();

      if(!options) {
        options = {};
      } else {
        options = $.extend(true, {}, options);
      }

      options.isObj = true;
      options.index = index || 0;
      return this.instance.open(options);
    },

    close: function() {
      return $.magnificPopup.instance && $.magnificPopup.instance.close();
    },

    registerModule: function(name, module) {
      if(module.options) {
        $.magnificPopup.defaults[name] = module.options;
      }
      $.extend(this.proto, module.proto);
      this.modules.push(name);
    },

    defaults: {

      disableOn: 0,

      key: null,

      midClick: false,

      mainClass: '',

      preloader: true,

      focus: '',

      closeOnContentClick: false,

      closeOnBgClick: true,

      closeBtnInside: true,

      showCloseBtn: true,

      enableEscapeKey: true,

      modal: false,

      alignTop: false,

      removalDelay: 0,

      prependTo: null,

      fixedContentPos: 'auto',

      fixedBgPos: 'auto',

      overflowY: 'auto',

      closeMarkup: '<button title="%title%" type="button" class="mfp-close">&#215;</button>',

      tClose: 'بستن',

      tLoading: 'در حال بارگزاری...',

      autoFocusLast: true

    }
  };



  $.fn.magnificPopup = function(options) {
    _checkInstance();

    var jqEl = $(this);
    if (typeof options === "string" ) {

      if(options === 'open') {
        var items,
          itemOpts = _isJQ ? jqEl.data('magnificPopup') : jqEl[0].magnificPopup,
          index = parseInt(arguments[1], 10) || 0;

        if(itemOpts.items) {
          items = itemOpts.items[index];
        } else {
          items = jqEl;
          if(itemOpts.delegate) {
            items = items.find(itemOpts.delegate);
          }
          items = items.eq( index );
        }
        mfp._openClick({mfpEl:items}, jqEl, itemOpts);
      } else {
        if(mfp.isOpen)
          mfp[options].apply(mfp, Array.prototype.slice.call(arguments, 1));
      }

    } else {
      options = $.extend(true, {}, options);

      if(_isJQ) {
        jqEl.data('magnificPopup', options);
      } else {
        jqEl[0].magnificPopup = options;
      }

      mfp.addGroup(jqEl, options);

    }
    return jqEl;
  };

  var INLINE_NS = 'inline',
    _hiddenClass,
    _inlinePlaceholder,
    _lastInlineElement,
    _putInlineElementsBack = function() {
      if(_lastInlineElement) {
        _inlinePlaceholder.after( _lastInlineElement.addClass(_hiddenClass) ).detach();
        _lastInlineElement = null;
      }
    };

  $.magnificPopup.registerModule(INLINE_NS, {
    options: {
      hiddenClass: 'hide',
      markup: '',
      tNotFound: 'Content not found'
    },
    proto: {

      initInline: function() {
        mfp.types.push(INLINE_NS);

        _mfpOn(CLOSE_EVENT+'.'+INLINE_NS, function() {
          _putInlineElementsBack();
        });
      },

      getInline: function(item, template) {

        _putInlineElementsBack();

        if(item.src) {
          var inlineSt = mfp.st.inline,
            el = $(item.src);

          if(el.length) {

            var parent = el[0].parentNode;
            if(parent && parent.tagName) {
              if(!_inlinePlaceholder) {
                _hiddenClass = inlineSt.hiddenClass;
                _inlinePlaceholder = _getEl(_hiddenClass);
                _hiddenClass = 'mfp-'+_hiddenClass;
              }
              _lastInlineElement = el.after(_inlinePlaceholder).detach().removeClass(_hiddenClass);
            }

            mfp.updateStatus('ready');
          } else {
            mfp.updateStatus('error', inlineSt.tNotFound);
            el = $('<div>');
          }

          item.inlineElement = el;
          return el;
        }

        mfp.updateStatus('ready');
        mfp._parseMarkup(template, {}, item);
        return template;
      }
    }
  });

  var AJAX_NS = 'ajax',
    _ajaxCur,
    _removeAjaxCursor = function() {
      if(_ajaxCur) {
        $(document.body).removeClass(_ajaxCur);
      }
    },
    _destroyAjaxRequest = function() {
      _removeAjaxCursor();
      if(mfp.req) {
        mfp.req.abort();
      }
    };

  $.magnificPopup.registerModule(AJAX_NS, {

    options: {
      settings: null,
      cursor: 'mfp-ajax-cur',
      tError: '<a href="%url%">The content</a> could not be loaded.'
    },

    proto: {
      initAjax: function() {
        mfp.types.push(AJAX_NS);
        _ajaxCur = mfp.st.ajax.cursor;

        _mfpOn(CLOSE_EVENT+'.'+AJAX_NS, _destroyAjaxRequest);
        _mfpOn('BeforeChange.' + AJAX_NS, _destroyAjaxRequest);
      },
      getAjax: function(item) {

        if(_ajaxCur) {
          $(document.body).addClass(_ajaxCur);
        }

        mfp.updateStatus('loading');

        var opts = $.extend({
          url: item.src,
          success: function(data, textStatus, jqXHR) {
            var temp = {
              data:data,
              xhr:jqXHR
            };

            _mfpTrigger('ParseAjax', temp);

            mfp.appendContent( $(temp.data), AJAX_NS );

            item.finished = true;

            _removeAjaxCursor();

            mfp._setFocus();

            setTimeout(function() {
              mfp.wrap.addClass(READY_CLASS);
            }, 16);

            mfp.updateStatus('ready');

            _mfpTrigger('AjaxContentAdded');
          },
          error: function() {
            _removeAjaxCursor();
            item.finished = item.loadError = true;
            mfp.updateStatus('error', mfp.st.ajax.tError.replace('%url%', item.src));
          }
        }, mfp.st.ajax.settings);

        mfp.req = $.ajax(opts);

        return '';
      }
    }
  });

  var _imgInterval,
    _getTitle = function(item) {
      if(item.data && item.data.title !== undefined)
        return item.data.title;

      var src = mfp.st.image.titleSrc;

      if(src) {
        if($.isFunction(src)) {
          return src.call(mfp, item);
        } else if(item.el) {
          return item.el.attr(src) || '';
        }
      }
      return '';
    };

  $.magnificPopup.registerModule('image', {

    options: {
      markup: '<div class="mfp-figure">'+
            '<div class="mfp-close"></div>'+
            '<div class="mfp-title"></div>'+
            '<figure>'+
              '<div class="mfp-img"></div>'+
              '<figcaption>'+
                '<div class="mfp-bottom-bar">'+
                  '<div class="mfp-counter" title="شماره اسلاید"></div>'+
                '</div>'+
              '</figcaption>'+
            '</figure>'+
          '</div>',
      cursor: 'mfp-zoom-out-cur',
      titleSrc: 'title',
      verticalFit: true,
      tError: '<a href="%url%">The image</a> could not be loaded.'
    },

    proto: {
      initImage: function() {
        var imgSt = mfp.st.image,
          ns = '.image';

        mfp.types.push('image');

        _mfpOn(OPEN_EVENT+ns, function() {
          if(mfp.currItem.type === 'image' && imgSt.cursor) {
            $(document.body).addClass(imgSt.cursor);
          }
        });

        _mfpOn(CLOSE_EVENT+ns, function() {
          if(imgSt.cursor) {
            $(document.body).removeClass(imgSt.cursor);
          }
          _window.off('resize' + EVENT_NS);
        });

        _mfpOn('Resize'+ns, mfp.resizeImage);
        if(mfp.isLowIE) {
          _mfpOn('AfterChange', mfp.resizeImage);
        }
      },
      resizeImage: function() {
        var item = mfp.currItem;
        if(!item || !item.img) return;

        if(mfp.st.image.verticalFit) {
          var decr = 0;
          if(mfp.isLowIE) {
            decr = parseInt(item.img.css('padding-top'), 10) + parseInt(item.img.css('padding-bottom'),10);
          }
          item.img.css('max-height', mfp.wH-decr);
        }
      },
      _onImageHasSize: function(item) {
        if(item.img) {

          item.hasSize = true;

          if(_imgInterval) {
            clearInterval(_imgInterval);
          }

          item.isCheckingImgSize = false;

          _mfpTrigger('ImageHasSize', item);

          if(item.imgHidden) {
            if(mfp.content)
              mfp.content.removeClass('mfp-loading');

            item.imgHidden = false;
          }

        }
      },

      findImageSize: function(item) {

        var counter = 0,
          img = item.img[0],
          mfpSetInterval = function(delay) {

            if(_imgInterval) {
              clearInterval(_imgInterval);
            }
            _imgInterval = setInterval(function() {
              if(img.naturalWidth > 0) {
                mfp._onImageHasSize(item);
                return;
              }

              if(counter > 200) {
                clearInterval(_imgInterval);
              }

              counter++;
              if(counter === 3) {
                mfpSetInterval(10);
              } else if(counter === 40) {
                mfpSetInterval(50);
              } else if(counter === 100) {
                mfpSetInterval(500);
              }
            }, delay);
          };

        mfpSetInterval(1);
      },

      getImage: function(item, template) {

        var guard = 0,
          onLoadComplete = function() {
            if(item) {
              if (item.img[0].complete) {
                item.img.off('.mfploader');

                if(item === mfp.currItem){
                  mfp._onImageHasSize(item);

                  mfp.updateStatus('ready');
                }

                item.hasSize = true;
                item.loaded = true;

                _mfpTrigger('ImageLoadComplete');

              }
              else {
                guard++;
                if(guard < 200) {
                  setTimeout(onLoadComplete,100);
                } else {
                  onLoadError();
                }
              }
            }
          },

          onLoadError = function() {
            if(item) {
              item.img.off('.mfploader');
              if(item === mfp.currItem){
                mfp._onImageHasSize(item);
                mfp.updateStatus('error', imgSt.tError.replace('%url%', item.src) );
              }

              item.hasSize = true;
              item.loaded = true;
              item.loadError = true;
            }
          },
          imgSt = mfp.st.image;


        var el = template.find('.mfp-img');
        if(el.length) {
          var img = document.createElement('img');
          img.className = 'mfp-img';
          if(item.el && item.el.find('img').length) {
            img.alt = item.el.find('img').attr('alt');
          }
          item.img = $(img).on('load.mfploader', onLoadComplete).on('error.mfploader', onLoadError);
          img.src = item.src;

          if(el.is('img')) {
            item.img = item.img.clone();
          }

          img = item.img[0];
          if(img.naturalWidth > 0) {
            item.hasSize = true;
          } else if(!img.width) {
            item.hasSize = false;
          }
        }

        mfp._parseMarkup(template, {
          title: _getTitle(item),
          img_replaceWith: item.img
        }, item);

        mfp.resizeImage();

        if(item.hasSize) {
          if(_imgInterval) clearInterval(_imgInterval);

          if(item.loadError) {
            template.addClass('mfp-loading');
            mfp.updateStatus('error', imgSt.tError.replace('%url%', item.src) );
          } else {
            template.removeClass('mfp-loading');
            mfp.updateStatus('ready');
          }
          return template;
        }

        mfp.updateStatus('loading');
        item.loading = true;

        if(!item.hasSize) {
          item.imgHidden = true;
          template.addClass('mfp-loading');
          mfp.findImageSize(item);
        }

        return template;
      }
    }
  });

  var hasMozTransform,
    getHasMozTransform = function() {
      if(hasMozTransform === undefined) {
        hasMozTransform = document.createElement('p').style.MozTransform !== undefined;
      }
      return hasMozTransform;
    };

  $.magnificPopup.registerModule('zoom', {

    options: {
      enabled: false,
      easing: 'ease-in-out',
      duration: 300,
      opener: function(element) {
        return element.is('img') ? element : element.find('img');
      }
    },

    proto: {

      initZoom: function() {
        var zoomSt = mfp.st.zoom,
          ns = '.zoom',
          image;

        if(!zoomSt.enabled || !mfp.supportsTransition) {
          return;
        }

        var duration = zoomSt.duration,
          getElToAnimate = function(image) {
            var newImg = image.clone().removeAttr('style').removeAttr('class').addClass('mfp-animated-image'),
              transition = 'all '+(zoomSt.duration/1000)+'s ' + zoomSt.easing,
              cssObj = {
                position: 'fixed',
                zIndex: 9999,
                left: 0,
                top: 0,
                '-webkit-backface-visibility': 'hidden'
              },
              t = 'transition';

            cssObj['-webkit-'+t] = cssObj['-moz-'+t] = cssObj['-o-'+t] = cssObj[t] = transition;

            newImg.css(cssObj);
            return newImg;
          },
          showMainContent = function() {
            mfp.content.css('visibility', 'visible');
          },
          openTimeout,
          animatedImg;

        _mfpOn('BuildControls'+ns, function() {
          if(mfp._allowZoom()) {

            clearTimeout(openTimeout);
            mfp.content.css('visibility', 'hidden');

            image = mfp._getItemToZoom();

            if(!image) {
              showMainContent();
              return;
            }

            animatedImg = getElToAnimate(image);

            animatedImg.css( mfp._getOffset() );

            mfp.wrap.append(animatedImg);

            openTimeout = setTimeout(function() {
              animatedImg.css( mfp._getOffset( true ) );
              openTimeout = setTimeout(function() {

                showMainContent();

                setTimeout(function() {
                  animatedImg.remove();
                  image = animatedImg = null;
                  _mfpTrigger('ZoomAnimationEnded');
                }, 16);

              }, duration);

            }, 16);

          }
        });
        _mfpOn(BEFORE_CLOSE_EVENT+ns, function() {
          if(mfp._allowZoom()) {

            clearTimeout(openTimeout);

            mfp.st.removalDelay = duration;

            if(!image) {
              image = mfp._getItemToZoom();
              if(!image) {
                return;
              }
              animatedImg = getElToAnimate(image);
            }

            animatedImg.css( mfp._getOffset(true) );
            mfp.wrap.append(animatedImg);
            mfp.content.css('visibility', 'hidden');

            setTimeout(function() {
              animatedImg.css( mfp._getOffset() );
            }, 16);
          }

        });

        _mfpOn(CLOSE_EVENT+ns, function() {
          if(mfp._allowZoom()) {
            showMainContent();
            if(animatedImg) {
              animatedImg.remove();
            }
            image = null;
          }
        });
      },

      _allowZoom: function() {
        return mfp.currItem.type === 'image';
      },

      _getItemToZoom: function() {
        if(mfp.currItem.hasSize) {
          return mfp.currItem.img;
        } else {
          return false;
        }
      },

      _getOffset: function(isLarge) {
        var el;
        if(isLarge) {
          el = mfp.currItem.img;
        } else {
          el = mfp.st.zoom.opener(mfp.currItem.el || mfp.currItem);
        }

        var offset = el.offset();
        var paddingTop = parseInt(el.css('padding-top'),10);
        var paddingBottom = parseInt(el.css('padding-bottom'),10);
        offset.top -= ( $(window).scrollTop() - paddingTop );

        var obj = {
          width: el.width(),
          height: (_isJQ ? el.innerHeight() : el[0].offsetHeight) - paddingBottom - paddingTop
        };

        if( getHasMozTransform() ) {
          obj['-moz-transform'] = obj['transform'] = 'translate(' + offset.left + 'px,' + offset.top + 'px)';
        } else {
          obj.left = offset.left;
          obj.top = offset.top;
        }
        return obj;
      }

    }
  });

  var IFRAME_NS = 'iframe',
    _emptyPage = '//about:blank',

    _fixIframeBugs = function(isShowing) {
      if(mfp.currTemplate[IFRAME_NS]) {
        var el = mfp.currTemplate[IFRAME_NS].find('iframe');
        if(el.length) {

          if(!isShowing) {
            el[0].src = _emptyPage;
          }
          if(mfp.isIE8) {
            el.css('display', isShowing ? 'block' : 'none');
          }
        }
      }
    };

  $.magnificPopup.registerModule(IFRAME_NS, {

    options: {
      markup: '<div class="mfp-iframe-scaler">'+
            '<div class="mfp-close"></div>'+
            '<iframe class="mfp-iframe" src="//about:blank" frameborder="0" allowfullscreen></iframe>'+
          '</div>',

      srcAction: 'iframe_src',

      patterns: {
        youtube: {
          index: 'youtube.com',
          id: 'v=',
          src: '//www.youtube.com/embed/%id%?autoplay=1'
        },
        vimeo: {
          index: 'vimeo.com/',
          id: '/',
          src: '//player.vimeo.com/video/%id%?autoplay=1'
        },
        gmaps: {
          index: '//maps.google.',
          src: '%id%&output=embed'
        }
      }
    },

    proto: {
      initIframe: function() {
        mfp.types.push(IFRAME_NS);

        _mfpOn('BeforeChange', function(e, prevType, newType) {
          if(prevType !== newType) {
            if(prevType === IFRAME_NS) {
              _fixIframeBugs();
            } else if(newType === IFRAME_NS) {
              _fixIframeBugs(true);
            }
          }
        });

        _mfpOn(CLOSE_EVENT + '.' + IFRAME_NS, function() {
          _fixIframeBugs();
        });
      },

      getIframe: function(item, template) {
        var embedSrc = item.src;
        var iframeSt = mfp.st.iframe;

        $.each(iframeSt.patterns, function() {
          if(embedSrc.indexOf( this.index ) > -1) {
            if(this.id) {
              if(typeof this.id === 'string') {
                embedSrc = embedSrc.substr(embedSrc.lastIndexOf(this.id)+this.id.length, embedSrc.length);
              } else {
                embedSrc = this.id.call( this, embedSrc );
              }
            }
            embedSrc = this.src.replace('%id%', embedSrc );
            return false;
          }
        });

        var dataObj = {};
        if(iframeSt.srcAction) {
          dataObj[iframeSt.srcAction] = embedSrc;
        }
        mfp._parseMarkup(template, dataObj, item);

        mfp.updateStatus('ready');

        return template;
      }
    }
  });

  var _getLoopedId = function(index) {
      var numSlides = mfp.items.length;
      if(index > numSlides - 1) {
        return index - numSlides;
      } else  if(index < 0) {
        return numSlides + index;
      }
      return index;
    },
    _replaceCurrTotal = function(text, curr, total) {
      return text.replace(/%curr%/gi, curr + 1).replace(/%total%/gi, total);
    };

  $.magnificPopup.registerModule('gallery', {

    options: {
      enabled: false,
      arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>',
      preload: [0,2],
      navigateByImgClick: true,
      arrows: true,

      tPrev: 'اسلاید قبلی',
      tNext: 'اسلاید بعدی',
      tCounter: '%curr% از %total%'
    },

    proto: {
      initGallery: function() {

        var gSt = mfp.st.gallery,
          ns = '.mfp-gallery';

        mfp.direction = true;

        if(!gSt || !gSt.enabled ) return false;

        _wrapClasses += ' mfp-gallery';

        _mfpOn(OPEN_EVENT+ns, function() {

          if(gSt.navigateByImgClick) {
            mfp.wrap.on('click'+ns, '.mfp-img', function() {
              if(mfp.items.length > 1) {
                mfp.next();
                return false;
              }
            });
          }

          _document.on('keydown'+ns, function(e) {
            if (e.keyCode === 37) {
              mfp.prev();
            } else if (e.keyCode === 39) {
              mfp.next();
            }
          });
        });

        _mfpOn('UpdateStatus'+ns, function(e, data) {
          if(data.text) {
            data.text = _replaceCurrTotal(data.text, mfp.currItem.index, mfp.items.length);
          }
        });

        _mfpOn(MARKUP_PARSE_EVENT+ns, function(e, element, values, item) {
          var l = mfp.items.length;
          values.counter = l > 1 ? _replaceCurrTotal(gSt.tCounter, item.index, l) : '1 از 1';
        });

        _mfpOn('BuildControls' + ns, function() {
          if(mfp.items.length > 1 && gSt.arrows && !mfp.arrowLeft) {
            var markup = gSt.arrowMarkup,
              arrowLeft = mfp.arrowLeft = $( markup.replace(/%title%/gi, gSt.tPrev).replace(/%dir%/gi, 'left') ).addClass(PREVENT_CLOSE_CLASS),
              arrowRight = mfp.arrowRight = $( markup.replace(/%title%/gi, gSt.tNext).replace(/%dir%/gi, 'right') ).addClass(PREVENT_CLOSE_CLASS);

            arrowLeft.click(function() {
              mfp.prev();
            });
            arrowRight.click(function() {
              mfp.next();
            });

            mfp.container.append(arrowLeft.add(arrowRight));
          }
        });

        _mfpOn(CHANGE_EVENT+ns, function() {
          if(mfp._preloadTimeout) clearTimeout(mfp._preloadTimeout);

          mfp._preloadTimeout = setTimeout(function() {
            mfp.preloadNearbyImages();
            mfp._preloadTimeout = null;
          }, 16);
        });


        _mfpOn(CLOSE_EVENT+ns, function() {
          _document.off(ns);
          mfp.wrap.off('click'+ns);
          mfp.arrowRight = mfp.arrowLeft = null;
        });

      },
      next: function() {
        mfp.direction = true;
        mfp.index = _getLoopedId(mfp.index + 1);
        mfp.updateItemHTML();
      },
      prev: function() {
        mfp.direction = false;
        mfp.index = _getLoopedId(mfp.index - 1);
        mfp.updateItemHTML();
      },
      goTo: function(newIndex) {
        mfp.direction = (newIndex >= mfp.index);
        mfp.index = newIndex;
        mfp.updateItemHTML();
      },
      preloadNearbyImages: function() {
        var p = mfp.st.gallery.preload,
          preloadBefore = Math.min(p[0], mfp.items.length),
          preloadAfter = Math.min(p[1], mfp.items.length),
          i;

        for(i = 1; i <= (mfp.direction ? preloadAfter : preloadBefore); i++) {
          mfp._preloadItem(mfp.index+i);
        }
        for(i = 1; i <= (mfp.direction ? preloadBefore : preloadAfter); i++) {
          mfp._preloadItem(mfp.index-i);
        }
      },
      _preloadItem: function(index) {
        index = _getLoopedId(index);

        if(mfp.items[index].preloaded) {
          return;
        }

        var item = mfp.items[index];
        if(!item.parsed) {
          item = mfp.parseEl( index );
        }

        _mfpTrigger('LazyLoad', item);

        if(item.type === 'image') {
          item.img = $('<img class="mfp-img" />').on('load.mfploader', function() {
            item.hasSize = true;
          }).on('error.mfploader', function() {
            item.hasSize = true;
            item.loadError = true;
            _mfpTrigger('LazyLoadError', item);
          }).attr('src', item.src);
        }


        item.preloaded = true;
      }
    }
  });

  var RETINA_NS = 'retina';

  $.magnificPopup.registerModule(RETINA_NS, {
    options: {
      replaceSrc: function(item) {
        return item.src.replace(/\.\w+$/, function(m) { return '@2x' + m; });
      },
      ratio: 1
    },
    proto: {
      initRetina: function() {
        if(window.devicePixelRatio > 1) {

          var st = mfp.st.retina,
            ratio = st.ratio;

          ratio = !isNaN(ratio) ? ratio : ratio();

          if(ratio > 1) {
            _mfpOn('ImageHasSize' + '.' + RETINA_NS, function(e, item) {
              item.img.css({
                'max-width': item.img[0].naturalWidth / ratio,
                'width': '100%'
              });
            });
            _mfpOn('ElementParse' + '.' + RETINA_NS, function(e, item) {
              item.src = st.replaceSrc(item, ratio);
            });
          }
        }

      }
    }
  });


_checkInstance(); }));

$(document).ready(function() {
    $('.xzoom5, .xzoom-gallery5').xzoom({tint: 'rgb(0,0,0,80)', Xoffset: 0});
    var isTouchSupported = 'ontouchstart' in window;

    if (isTouchSupported) {
        $('.xzoom, .xzoom2, .xzoom3, .xzoom4, .xzoom5').each(function(){
            var xzoom = $(this).data('xzoom');
            xzoom.eventunbind();
        });

        $('.xzoom5').each(function() {
        var xzoom = $(this).data('xzoom');
        $(this).hammer().on("tap", function(event) {
            event.pageX = event.gesture.center.pageX;
            event.pageY = event.gesture.center.pageY;
            var s = 1, ls;

            xzoom.eventmove = function(element) {
                element.hammer().on('drag', function(event) {
                    event.pageX = event.gesture.center.pageX;
                    event.pageY = event.gesture.center.pageY;
                    xzoom.movezoom(event);
                    event.gesture.preventDefault();
                });
            }

            var counter = 0;
            xzoom.eventclick = function(element) {
                element.hammer().on('tap', function() {
                    counter++;
                    if (counter == 1) setTimeout(openmagnific,300);
                    event.gesture.preventDefault();
                });
            }

            function openmagnific() {
                if (counter == 2) {
                    xzoom.closezoom();
                    var gallery = xzoom.gallery().cgallery;
                    var i, images = new Array();
                    for (i in gallery) {
                        images[i] = {src: gallery[i]};
                    }
                    $.magnificPopup.open({
                      items: images,
                      type:'image',
                      gallery: {
                        enabled: true
                      }
                    });
                } else {
                    xzoom.closezoom();
                }
                counter = 0;
            }
            xzoom.openzoom(event);
        });
        });

    } else {

        $('#xzoom-magnific').bind('click', function(event) {
            var xzoom = $(this).data('xzoom');
            xzoom.closezoom();
            var gallery = xzoom.gallery().cgallery;
            var i, images = new Array();
            for (i in gallery) {
                images[i] = {src: gallery[i]};
            }
            $.magnificPopup.open({
              items: images,
              type:'image',
              gallery: {
                enabled: true
              },
              image: {
                titleSrc: function(item) {
                  return $('.caption-sli').text();

                }
              }
            });
            event.preventDefault();
        });
    }
});

!function(){var e=null;window.PR_SHOULD_USE_CONTINUATION=!0,function(){function t(e){function t(e){var t=e.charCodeAt(0);if(92!==t)return t;var i=e.charAt(1);return(t=u[i])?t:i>="0"&&"7">=i?parseInt(e.substring(1),8):"u"===i||"x"===i?parseInt(e.substring(2),16):e.charCodeAt(1)}function i(e){return 32>e?(16>e?"\\x0":"\\x")+e.toString(16):(e=String.fromCharCode(e),"\\"===e||"-"===e||"]"===e||"^"===e?"\\"+e:e)}function n(e){var n=e.substring(1,e.length-1).match(/\\u[\dA-Fa-f]{4}|\\x[\dA-Fa-f]{2}|\\[0-3][0-7]{0,2}|\\[0-7]{1,2}|\\[\S\s]|[^\\]/g),e=[],r="^"===n[0],s=["["];r&&s.push("^");for(var r=r?1:0,o=n.length;o>r;++r){var a=n[r];if(/\\[bdsw]/i.test(a))s.push(a);else{var l,a=t(a);o>r+2&&"-"===n[r+1]?(l=t(n[r+2]),r+=2):l=a,e.push([a,l]),65>l||a>122||(65>l||a>90||e.push([32|Math.max(65,a),32|Math.min(l,90)]),97>l||a>122||e.push([-33&Math.max(97,a),-33&Math.min(l,122)]))}}for(e.sort(function(e,t){return e[0]-t[0]||t[1]-e[1]}),n=[],o=[],r=0;e.length>r;++r)a=e[r],a[0]<=o[1]+1?o[1]=Math.max(o[1],a[1]):n.push(o=a);for(r=0;n.length>r;++r)a=n[r],s.push(i(a[0])),a[1]>a[0]&&(a[1]+1>a[0]&&s.push("-"),s.push(i(a[1])));return s.push("]"),s.join("")}function r(e){for(var t=e.source.match(/\[(?:[^\\\]]|\\[\S\s])*]|\\u[\dA-Fa-f]{4}|\\x[\dA-Fa-f]{2}|\\\d+|\\[^\dux]|\(\?[!:=]|[()^]|[^()[\\^]+/g),r=t.length,a=[],l=0,h=0;r>l;++l){var c=t[l];"("===c?++h:"\\"===c.charAt(0)&&(c=+c.substring(1))&&(h>=c?a[c]=-1:t[l]=i(c))}for(l=1;a.length>l;++l)-1===a[l]&&(a[l]=++s);for(h=l=0;r>l;++l)c=t[l],"("===c?(++h,a[h]||(t[l]="(?:")):"\\"===c.charAt(0)&&(c=+c.substring(1))&&h>=c&&(t[l]="\\"+a[c]);for(l=0;r>l;++l)"^"===t[l]&&"^"!==t[l+1]&&(t[l]="");if(e.ignoreCase&&o)for(l=0;r>l;++l)c=t[l],e=c.charAt(0),c.length>=2&&"["===e?t[l]=n(c):"\\"!==e&&(t[l]=c.replace(/[A-Za-z]/g,function(e){return e=e.charCodeAt(0),"["+String.fromCharCode(-33&e,32|e)+"]"}));return t.join("")}for(var s=0,o=!1,a=!1,l=0,h=e.length;h>l;++l){var c=e[l];if(c.ignoreCase)a=!0;else if(/[a-z]/i.test(c.source.replace(/\\u[\da-f]{4}|\\x[\da-f]{2}|\\[^UXux]/gi,""))){o=!0,a=!1;break}}for(var u={b:8,t:9,n:10,v:11,f:12,r:13},d=[],l=0,h=e.length;h>l;++l){if(c=e[l],c.global||c.multiline)throw Error(""+c);d.push("(?:"+r(c)+")")}return RegExp(d.join("|"),a?"gi":"g")}function i(e,t){function i(e){var l=e.nodeType;if(1==l){if(!n.test(e.className)){for(l=e.firstChild;l;l=l.nextSibling)i(l);l=e.nodeName.toLowerCase(),("br"===l||"li"===l)&&(r[a]="\n",o[a<<1]=s++,o[1|a++<<1]=e)}}else(3==l||4==l)&&(l=e.nodeValue,l.length&&(l=t?l.replace(/\r\n?/g,"\n"):l.replace(/[\t\n\r ]+/g," "),r[a]=l,o[a<<1]=s,s+=l.length,o[1|a++<<1]=e))}var n=/(?:^|\s)nocode(?:\s|$)/,r=[],s=0,o=[],a=0;return i(e),{a:r.join("").replace(/\n$/,""),d:o}}function n(e,t,i,n){t&&(e={a:t,e:e},i(e),n.push.apply(n,e.g))}function r(e){for(var t=void 0,i=e.firstChild;i;i=i.nextSibling)var n=i.nodeType,t=1===n?t?e:i:3===n?x.test(i.nodeValue)?e:t:t;return t===e?void 0:t}function s(i,r){function s(e){for(var t=e.e,i=[t,"pln"],c=0,u=e.a.match(o)||[],d={},p=0,f=u.length;f>p;++p){var m,g=u[p],y=d[g],v=void 0;if("string"==typeof y)m=!1;else{var b=a[g.charAt(0)];if(b)v=g.match(b[1]),y=b[0];else{for(m=0;l>m;++m)if(b=r[m],v=g.match(b[1])){y=b[0];break}v||(y="pln")}!(m=y.length>=5&&"lang-"===y.substring(0,5))||v&&"string"==typeof v[1]||(m=!1,y="src"),m||(d[g]=y)}if(b=c,c+=g.length,m){m=v[1];var L=g.indexOf(m),x=L+m.length;v[2]&&(x=g.length-v[2].length,L=x-m.length),y=y.substring(5),n(t+b,g.substring(0,L),s,i),n(t+b+L,m,h(y,m),i),n(t+b+x,g.substring(x),s,i)}else i.push(t+b,y)}e.g=i}var o,a={};(function(){for(var n=i.concat(r),s=[],l={},h=0,c=n.length;c>h;++h){var u=n[h],d=u[3];if(d)for(var p=d.length;--p>=0;)a[d.charAt(p)]=u;u=u[1],d=""+u,l.hasOwnProperty(d)||(s.push(u),l[d]=e)}s.push(/[\S\s]/),o=t(s)})();var l=r.length;return s}function o(t){var i=[],n=[];t.tripleQuotedStrings?i.push(["str",/^(?:'''(?:[^'\\]|\\[\S\s]|''?(?=[^']))*(?:'''|$)|"""(?:[^"\\]|\\[\S\s]|""?(?=[^"]))*(?:"""|$)|'(?:[^'\\]|\\[\S\s])*(?:'|$)|"(?:[^"\\]|\\[\S\s])*(?:"|$))/,e,"'\""]):t.multiLineStrings?i.push(["str",/^(?:'(?:[^'\\]|\\[\S\s])*(?:'|$)|"(?:[^"\\]|\\[\S\s])*(?:"|$)|`(?:[^\\`]|\\[\S\s])*(?:`|$))/,e,"'\"`"]):i.push(["str",/^(?:'(?:[^\n\r'\\]|\\.)*(?:'|$)|"(?:[^\n\r"\\]|\\.)*(?:"|$))/,e,"\"'"]),t.verbatimStrings&&n.push(["str",/^@"(?:[^"]|"")*(?:"|$)/,e]);var r=t.hashComments;if(r&&(t.cStyleComments?(r>1?i.push(["com",/^#(?:##(?:[^#]|#(?!##))*(?:###|$)|.*)/,e,"#"]):i.push(["com",/^#(?:(?:define|e(?:l|nd)if|else|error|ifn?def|include|line|pragma|undef|warning)\b|[^\n\r]*)/,e,"#"]),n.push(["str",/^<(?:(?:(?:\.\.\/)*|\/?)(?:[\w-]+(?:\/[\w-]+)+)?[\w-]+\.h(?:h|pp|\+\+)?|[a-z]\w*)>/,e])):i.push(["com",/^#[^\n\r]*/,e,"#"])),t.cStyleComments&&(n.push(["com",/^\/\/[^\n\r]*/,e]),n.push(["com",/^\/\*[\S\s]*?(?:\*\/|$)/,e])),r=t.regexLiterals){var o=(r=r>1?"":"\n\r")?".":"[\\S\\s]";n.push(["lang-regex",RegExp("^(?:^^\\.?|[+-]|[!=]=?=?|\\#|%=?|&&?=?|\\(|\\*=?|[+\\-]=|->|\\/=?|::?|<<?=?|>>?>?=?|,|;|\\?|@|\\[|~|{|\\^\\^?=?|\\|\\|?=?|break|case|continue|delete|do|else|finally|instanceof|return|throw|try|typeof)\\s*("+("/(?=[^/*"+r+"])(?:[^/\\x5B\\x5C"+r+"]|\\x5C"+o+"|\\x5B(?:[^\\x5C\\x5D"+r+"]|\\x5C"+o+")*(?:\\x5D|$))+/")+")")])}return(r=t.types)&&n.push(["typ",r]),r=(""+t.keywords).replace(/^ | $/g,""),r.length&&n.push(["kwd",RegExp("^(?:"+r.replace(/[\s,]+/g,"|")+")\\b"),e]),i.push(["pln",/^\s+/,e," \r\n	 "]),r="^.[^\\s\\w.$@'\"`/\\\\]*",t.regexLiterals&&(r+="(?!s*/)"),n.push(["lit",/^@[$_a-z][\w$@]*/i,e],["typ",/^(?:[@_]?[A-Z]+[a-z][\w$@]*|\w+_t\b)/,e],["pln",/^[$_a-z][\w$@]*/i,e],["lit",/^(?:0x[\da-f]+|(?:\d(?:_\d+)*\d*(?:\.\d*)?|\.\d\+)(?:e[+-]?\d+)?)[a-z]*/i,e,"0123456789"],["pln",/^\\[\S\s]?/,e],["pun",RegExp(r),e]),s(i,n)}function a(e,t,i){function n(e){var t=e.nodeType;if(1!=t||s.test(e.className)){if((3==t||4==t)&&i){var l=e.nodeValue,h=l.match(o);h&&(t=l.substring(0,h.index),e.nodeValue=t,(l=l.substring(h.index+h[0].length))&&e.parentNode.insertBefore(a.createTextNode(l),e.nextSibling),r(e),t||e.parentNode.removeChild(e))}}else if("br"===e.nodeName)r(e),e.parentNode&&e.parentNode.removeChild(e);else for(e=e.firstChild;e;e=e.nextSibling)n(e)}function r(e){function t(e,i){var n=i?e.cloneNode(!1):e,r=e.parentNode;if(r){var r=t(r,1),s=e.nextSibling;r.appendChild(n);for(var o=s;o;o=s)s=o.nextSibling,r.appendChild(o)}return n}for(;!e.nextSibling;)if(e=e.parentNode,!e)return;for(var i,e=t(e.nextSibling,0);(i=e.parentNode)&&1===i.nodeType;)e=i;h.push(e)}for(var s=/(?:^|\s)nocode(?:\s|$)/,o=/\r\n?|\n/,a=e.ownerDocument,l=a.createElement("li");e.firstChild;)l.appendChild(e.firstChild);for(var h=[l],c=0;h.length>c;++c)n(h[c]);t===(0|t)&&h[0].setAttribute("value",t);var u=a.createElement("ol");u.className="linenums";for(var t=Math.max(0,0|t-1)||0,c=0,d=h.length;d>c;++c)l=h[c],l.className="L"+(c+t)%10,l.firstChild||l.appendChild(a.createTextNode(" ")),u.appendChild(l);e.appendChild(u)}function l(e,t){for(var i=t.length;--i>=0;){var n=t[i];w.hasOwnProperty(n)?u.console&&console.warn("cannot override language handler %s",n):w[n]=e}}function h(e,t){return e&&w.hasOwnProperty(e)||(e=/^\s*</.test(t)?"default-markup":"default-code"),w[e]}function c(e){var t=e.h;try{var n=i(e.c,e.i),r=n.a;e.a=r,e.d=n.d,e.e=0,h(t,r)(e);var s=/\bMSIE\s(\d+)/.exec(navigator.userAgent),s=s&&8>=+s[1],t=/\n/g,o=e.a,a=o.length,n=0,l=e.d,c=l.length,r=0,d=e.g,p=d.length,f=0;d[p]=a;var m,g;for(g=m=0;p>g;)d[g]!==d[g+2]?(d[m++]=d[g++],d[m++]=d[g++]):g+=2;for(p=m,g=m=0;p>g;){for(var y=d[g],v=d[g+1],b=g+2;p>=b+2&&d[b+1]===v;)b+=2;d[m++]=y,d[m++]=v,g=b}d.length=m;var L,x=e.c;x&&(L=x.style.display,x.style.display="none");try{for(;c>r;){var C,w=l[r+2]||a,S=d[f+2]||a,b=Math.min(w,S),O=l[r+1];if(1!==O.nodeType&&(C=o.substring(n,b))){s&&(C=C.replace(t,"\r")),O.nodeValue=C;var _=O.ownerDocument,E=_.createElement("span");E.className=d[f+1];var k=O.parentNode;k.replaceChild(E,O),E.appendChild(O),w>n&&(l[r+1]=O=_.createTextNode(o.substring(b,w)),k.insertBefore(O,E.nextSibling))}n=b,n>=w&&(r+=2),n>=S&&(f+=2)}}finally{x&&(x.style.display=L)}}catch(T){u.console&&console.log(T&&T.stack||T)}}var u=window,d=["break,continue,do,else,for,if,return,while"],p=[[d,"auto,case,char,const,default,double,enum,extern,float,goto,inline,int,long,register,short,signed,sizeof,static,struct,switch,typedef,union,unsigned,void,volatile"],"catch,class,delete,false,import,new,operator,private,protected,public,this,throw,true,try,typeof"],f=[p,"alignof,align_union,asm,axiom,bool,concept,concept_map,const_cast,constexpr,decltype,delegate,dynamic_cast,explicit,export,friend,generic,late_check,mutable,namespace,nullptr,property,reinterpret_cast,static_assert,static_cast,template,typeid,typename,using,virtual,where"],m=[p,"abstract,assert,boolean,byte,extends,final,finally,implements,import,instanceof,interface,null,native,package,strictfp,super,synchronized,throws,transient"],g=[m,"as,base,by,checked,decimal,delegate,descending,dynamic,event,fixed,foreach,from,group,implicit,in,internal,into,is,let,lock,object,out,override,orderby,params,partial,readonly,ref,sbyte,sealed,stackalloc,string,select,uint,ulong,unchecked,unsafe,ushort,var,virtual,where"],p=[p,"debugger,eval,export,function,get,null,set,undefined,var,with,Infinity,NaN"],y=[d,"and,as,assert,class,def,del,elif,except,exec,finally,from,global,import,in,is,lambda,nonlocal,not,or,pass,print,raise,try,with,yield,False,True,None"],v=[d,"alias,and,begin,case,class,def,defined,elsif,end,ensure,false,in,module,next,nil,not,or,redo,rescue,retry,self,super,then,true,undef,unless,until,when,yield,BEGIN,END"],b=[d,"as,assert,const,copy,drop,enum,extern,fail,false,fn,impl,let,log,loop,match,mod,move,mut,priv,pub,pure,ref,self,static,struct,true,trait,type,unsafe,use"],d=[d,"case,done,elif,esac,eval,fi,function,in,local,set,then,until"],L=/^(DIR|FILE|vector|(de|priority_)?queue|list|stack|(const_)?iterator|(multi)?(set|map)|bitset|u?(int|float)\d*)\b/,x=/\S/,C=o({keywords:[f,g,p,"caller,delete,die,do,dump,elsif,eval,exit,foreach,for,goto,if,import,last,local,my,next,no,our,print,package,redo,require,sub,undef,unless,until,use,wantarray,while,BEGIN,END",y,v,d],hashComments:!0,cStyleComments:!0,multiLineStrings:!0,regexLiterals:!0}),w={};l(C,["default-code"]),l(s([],[["pln",/^[^<?]+/],["dec",/^<!\w[^>]*(?:>|$)/],["com",/^<\!--[\S\s]*?(?:--\>|$)/],["lang-",/^<\?([\S\s]+?)(?:\?>|$)/],["lang-",/^<%([\S\s]+?)(?:%>|$)/],["pun",/^(?:<[%?]|[%?]>)/],["lang-",/^<xmp\b[^>]*>([\S\s]+?)<\/xmp\b[^>]*>/i],["lang-js",/^<script\b[^>]*>([\S\s]*?)(<\/script\b[^>]*>)/i],["lang-css",/^<style\b[^>]*>([\S\s]*?)(<\/style\b[^>]*>)/i],["lang-in.tag",/^(<\/?[a-z][^<>]*>)/i]]),["default-markup","htm","html","mxml","xhtml","xml","xsl"]),l(s([["pln",/^\s+/,e," 	\r\n"],["atv",/^(?:"[^"]*"?|'[^']*'?)/,e,"\"'"]],[["tag",/^^<\/?[a-z](?:[\w-.:]*\w)?|\/?>$/i],["atn",/^(?!style[\s=]|on)[a-z](?:[\w:-]*\w)?/i],["lang-uq.val",/^=\s*([^\s"'>]*(?:[^\s"'/>]|\/(?=\s)))/],["pun",/^[/<->]+/],["lang-js",/^on\w+\s*=\s*"([^"]+)"/i],["lang-js",/^on\w+\s*=\s*'([^']+)'/i],["lang-js",/^on\w+\s*=\s*([^\s"'>]+)/i],["lang-css",/^style\s*=\s*"([^"]+)"/i],["lang-css",/^style\s*=\s*'([^']+)'/i],["lang-css",/^style\s*=\s*([^\s"'>]+)/i]]),["in.tag"]),l(s([],[["atv",/^[\S\s]+/]]),["uq.val"]),l(o({keywords:f,hashComments:!0,cStyleComments:!0,types:L}),["c","cc","cpp","cxx","cyc","m"]),l(o({keywords:"null,true,false"}),["json"]),l(o({keywords:g,hashComments:!0,cStyleComments:!0,verbatimStrings:!0,types:L}),["cs"]),l(o({keywords:m,cStyleComments:!0}),["java"]),l(o({keywords:d,hashComments:!0,multiLineStrings:!0}),["bash","bsh","csh","sh"]),l(o({keywords:y,hashComments:!0,multiLineStrings:!0,tripleQuotedStrings:!0}),["cv","py","python"]),l(o({keywords:"caller,delete,die,do,dump,elsif,eval,exit,foreach,for,goto,if,import,last,local,my,next,no,our,print,package,redo,require,sub,undef,unless,until,use,wantarray,while,BEGIN,END",hashComments:!0,multiLineStrings:!0,regexLiterals:2}),["perl","pl","pm"]),l(o({keywords:v,hashComments:!0,multiLineStrings:!0,regexLiterals:!0}),["rb","ruby"]),l(o({keywords:p,cStyleComments:!0,regexLiterals:!0}),["javascript","js"]),l(o({keywords:"all,and,by,catch,class,else,extends,false,finally,for,if,in,is,isnt,loop,new,no,not,null,of,off,on,or,return,super,then,throw,true,try,unless,until,when,while,yes",hashComments:3,cStyleComments:!0,multilineStrings:!0,tripleQuotedStrings:!0,regexLiterals:!0}),["coffee"]),l(o({keywords:b,cStyleComments:!0,multilineStrings:!0}),["rc","rs","rust"]),l(s([],[["str",/^[\S\s]+/]]),["regex"]);var S=u.PR={createSimpleLexer:s,registerLangHandler:l,sourceDecorator:o,PR_ATTRIB_NAME:"atn",PR_ATTRIB_VALUE:"atv",PR_COMMENT:"com",PR_DECLARATION:"dec",PR_KEYWORD:"kwd",PR_LITERAL:"lit",PR_NOCODE:"nocode",PR_PLAIN:"pln",PR_PUNCTUATION:"pun",PR_SOURCE:"src",PR_STRING:"str",PR_TAG:"tag",PR_TYPE:"typ",prettyPrintOne:u.prettyPrintOne=function(e,t,i){var n=document.createElement("div");return n.innerHTML="<pre>"+e+"</pre>",n=n.firstChild,i&&a(n,i,!0),c({h:t,j:i,c:n,i:1}),n.innerHTML},prettyPrint:u.prettyPrint=function(t,i){function n(){for(var i=u.PR_SHOULD_USE_CONTINUATION?f.now()+250:1/0;l.length>g&&i>f.now();g++){for(var s=l[g],h=w,d=s;d=d.previousSibling;){var p=d.nodeType,S=(7===p||8===p)&&d.nodeValue;if(S?!/^\??prettify\b/.test(S):3!==p||/\S/.test(d.nodeValue))break;if(S){h={},S.replace(/\b(\w+)=([\w%+\-.:]+)/g,function(e,t,i){h[t]=i});break}}if(d=s.className,(h!==w||v.test(d))&&!b.test(d)){for(p=!1,S=s.parentNode;S;S=S.parentNode)if(C.test(S.tagName)&&S.className&&v.test(S.className)){p=!0;break}if(!p){if(s.className+=" prettyprinted",p=h.lang,!p){var O,p=d.match(y);!p&&(O=r(s))&&x.test(O.tagName)&&(p=O.className.match(y)),p&&(p=p[1])}if(L.test(s.tagName))S=1;else var S=s.currentStyle,_=o.defaultView,S=(S=S?S.whiteSpace:_&&_.getComputedStyle?_.getComputedStyle(s,e).getPropertyValue("white-space"):0)&&"pre"===S.substring(0,3);_=h.linenums,(_="true"===_||+_)||(_=(_=d.match(/\blinenums\b(?::(\d+))?/))?_[1]&&_[1].length?+_[1]:!0:!1),_&&a(s,_,S),m={h:p,c:s,j:_,i:S},c(m)}}}l.length>g?setTimeout(n,250):"function"==typeof t&&t()}for(var s=i||document.body,o=s.ownerDocument||document,s=[s.getElementsByTagName("pre"),s.getElementsByTagName("code"),s.getElementsByTagName("xmp")],l=[],h=0;s.length>h;++h)for(var d=0,p=s[h].length;p>d;++d)l.push(s[h][d]);var s=e,f=Date;f.now||(f={now:function(){return+new Date}});var m,g=0,y=/\blang(?:uage)?-([\w.]+)(?!\S)/,v=/\bprettyprint\b/,b=/\bprettyprinted\b/,L=/pre|xmp/i,x=/^code$/i,C=/^(?:pre|code|xmp)$/i,w={};n()}};"function"==typeof define&&define.amd&&define("google-code-prettify",[],function(){return S})}()}();
// (function (window, document) {
//     "use strict";
//     (function () {
//       var lastTime = 0;
//       var vendors = ["ms", "moz", "webkit", "o"];
//       for (var x = 0; x < vendors.length && !window.requestAnimationFrame; ++x) {
//         window.requestAnimationFrame =
//           window[vendors[x] + "RequestAnimationFrame"];
//         window.cancelAnimationFrame =
//           window[vendors[x] + "CancelAnimationFrame"] ||
//           window[vendors[x] + "CancelRequestAnimationFrame"];
//       }
//       if (!window.requestAnimationFrame)
//         window.requestAnimationFrame = function (callback, element) {
//           var currTime = new Date().getTime();
//           var timeToCall = Math.max(0, 16 - (currTime - lastTime));
//           var id = window.setTimeout(function () {
//             callback(currTime + timeToCall);
//           }, timeToCall);
//           lastTime = currTime + timeToCall;
//           return id;
//         };
//       if (!window.cancelAnimationFrame)
//         window.cancelAnimationFrame = function (id) {
//           clearTimeout(id);
//         };
//     })();
//     var canvas,
//       progressTimerId,
//       fadeTimerId,
//       currentProgress,
//       showing,
//       addEvent = function (elem, type, handler) {
//         if (elem.addEventListener) elem.addEventListener(type, handler, false);
//         else if (elem.attachEvent) elem.attachEvent("on" + type, handler);
//         else elem["on" + type] = handler;
//       },
//       options = {
//         autoRun: true,
//         barThickness: 3,
//         barColors: {
//           0: "rgba(26,188,156,.9)",
//           ".25": "rgba(52,152,219,.9)",
//           ".50": "rgba(241,196,15,.9)",
//           ".75": "rgba(230,126, 34,.9)",
//           "1.0": "rgba(211,84,0,.9)",
//         },
//         shadowBlur: 10,
//         shadowColor: "rgba(0,0,0,.6)",
//         className: null,
//       },
//       repaint = function () {
//         canvas.width = window.innerWidth;
//         canvas.height = options.barThickness * 5;
//         var ctx = canvas.getContext("2d");
//         ctx.shadowBlur = options.shadowBlur;
//         ctx.shadowColor = options.shadowColor;
//         var lineGradient = ctx.createLinearGradient(0, 0, canvas.width, 0);
//         for (var stop in options.barColors)
//           lineGradient.addColorStop(stop, options.barColors[stop]);
//         ctx.lineWidth = options.barThickness;
//         ctx.beginPath();
//         ctx.moveTo(0, options.barThickness / 2);
//         ctx.lineTo(
//           Math.ceil(currentProgress * canvas.width),
//           options.barThickness / 2
//         );
//         ctx.strokeStyle = lineGradient;
//         ctx.stroke();
//       },
//       createCanvas = function () {
//         $('.topbar').remove()
//         canvas = document.createElement("canvas");
//         canvas.className = "topbar";
//         var style = canvas.style;
//         style.position = "fixed";
//         style.top = style.left = style.right = style.margin = style.padding = 0;
//         style.zIndex = 100001;
//         style.display = "none";
//         if (options.className) canvas.classList.add(options.className);
//         document.body.appendChild(canvas);
//         addEvent(window, "resize", repaint);
//       },
//       topbar = {
//         config: function (opts) {
//           for (var key in opts)
//             if (options.hasOwnProperty(key)) options[key] = opts[key];
//         },
//         show: function () {
//           if (showing) return;
//           showing = true;
//           if (fadeTimerId !== null) window.cancelAnimationFrame(fadeTimerId);
//           if (!canvas) createCanvas();
//           canvas.style.opacity = 1;
//           canvas.style.display = "block";
//           topbar.progress(0);
//           if (options.autoRun) {
//             (function loop() {
//               progressTimerId = window.requestAnimationFrame(loop);
//               topbar.progress(
//                 "+" + 0.05 * Math.pow(1 - Math.sqrt(currentProgress), 2)
//               );
//             })();
//           }
//         },
//         progress: function (to) {
//           if (typeof to === "undefined") return currentProgress;
//           if (typeof to === "string") {
//             to =
//               (to.indexOf("+") >= 0 || to.indexOf("-") >= 0
//                 ? currentProgress
//                 : 0) + parseFloat(to);
//           }
//           currentProgress = to > 1 ? 1 : to;
//           repaint();
//           return currentProgress;
//         },
//         hide: function () {
//           if (!showing) return;
//           showing = false;
//           if (progressTimerId != null) {
//             window.cancelAnimationFrame(progressTimerId);
//             progressTimerId = null;
//           }
//           (function loop() {
//             if (topbar.progress("+.1") >= 1) {
//               canvas.style.opacity -= 0.05;
//               if (canvas.style.opacity <= 0.05) {
//                 canvas.style.display = "none";
//                 fadeTimerId = null;
//                 return;
//               }
//             }
//             fadeTimerId = window.requestAnimationFrame(loop);
//           })();
//         },
//       };
//     if (typeof module === "object" && typeof module.exports === "object") {
//       module.exports = topbar;
//     } else if (typeof define === "function" && define.amd) {
//       define(function () {
//         return topbar;
//       });
//     } else {
//       this.topbar = topbar;
//     }
//   }.call(this, window, document));
$(function() {
    prettyPrint()
    function resetToDefaults() {
      // topbar.config({
      //   autoRun      : true,
      //   barThickness : 5,
      //   barColors    : {
      //     '0'      : 'rgba(26,188,156,.9)'
      //   },
      //   shadowBlur   : 0,
      //   className    : 'topbar'
      // })
    }
    resetToDefaults()
    // setTimeout(function() {
      // topbar.hide();

    // }, 0)

})

// function loader(){
//     $('.loader').remove()
//     $('.spinner').remove()
//     $('main').prepend('<div class="loader"></div>')
//     $('main .loader').prepend('<svg viewBox="25 25 50 50" class="spinner"><circle cx="50" cy="50" r="20" fill="none" class="path"></circle></svg>')
//     topbar.hide();
// }
// loader()
var btn = $('.btn-top');
$(window).scroll(function () {

    if ($(window).scrollTop() > 300) {
        btn.addClass('show');
    } else {
        btn.removeClass('show');
    }
    var scrollbar_top = $(window).scrollTop();
    // if(scrollbar_top  > 0) {
    //     $('body').addClass('sticky')
    // } else {
    //     $('body').removeClass('sticky')
    // }

});
btn.on('click', function (e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: 0 }, '300');
});

// $(document).ready(function() {
//     var count_string = 100;
//     // document.querySelectorAll('button.more').forEach(bttn=>{
//     //     bttn.dataset.state=0;
//     //     bttn.addEventListener('click',function(e){
//     //         let span=this.previousElementSibling;
//     //             span.dataset.tmp=span.textContent;
//     //             span.textContent=span.dataset.content;
//     //             span.dataset.content=span.dataset.tmp;
//     //
//     //             this.innerHTML=this.dataset.state==1 ? '(ادامه‌ی متن)' : '(بستن)';
//     //             this.dataset.state=1-this.dataset.state;
//     //
//     //     })
//     // });
//     // if ( $('span.paraghraph').text().length > count_string ){
//     //     document.querySelectorAll('span.paraghraph').forEach(span=>{
//     //         span.dataset.content=span.textContent;
//     //         span.textContent=span.textContent.substr(0,count_string) + ' ... ';
//     //     })
//     // }
//     // if ( $('span.paraghraph').text().length < count_string ){
//     //     $('button.more').remove()
//     // }
// });

$(document).ready(function() {

    $('.btn-close-popup').click(function() {
        $('.popup').addClass('hide')
        $('.pageblack').remove()
        $('body').removeClass('lock-scrollbar')
    });

    $('.message-pop .close-btn-f').click(function() {
        $('.message-pop.login').remove();
    });

    setTimeout(function(){     // alert("Hello");
        $('.message-pop.login').fadeOut(1000);
    }, 3500);

});
$(function() {

    $(document).on('click','.tab.btn-t',function(){
    var data_id = $(this).attr("data-id");
    var data_id_pro = $(this).attr("data-id-pro");
    var data_x_pro = $(this).attr("data-x-pro");
    if ( ! $(".data-"+ data_id).length > 0 ){
        // $('.data').append('<div class="loading"></div>').fadeIn(325);
        $('.data').append('<div class="content-i data-'+data_id+'"></div>');
        $.ajax({
            // url: 'a.php',
            url: 'shop/func/tab-aj',
            data: {data_id:data_id,data_id_pro:data_id_pro,data_x_pro:data_x_pro},
            type: "POST",
            success: function(data) {
                setTimeout(function(){
                $('.data .loading').remove();
                $('.content-i.data-'+ data_id).html(data);
                }, 500);
            }
        });
    }
    $('.data .content-i').removeClass('show');
    $('.data .content-i.data-'+ data_id).addClass('show');

    $('.tab.btn-t').removeClass('active');
    $('.tab.btn-t[data-id='+ data_id+']').addClass('active');
    });

});

$(document).ready(function() {

        $("form").bind("keypress", function(e) {
            if (e.keyCode == 13) {
                return false;

            }
        });
    // }
});

var isIE = navigator.appName == 'Microsoft Internet Explorer' ||  !!(navigator.userAgent.match(/Trident/) || navigator.userAgent.match(/rv:11/)) || (typeof $.browser !== "undefined" && $.browser.msie == 1) || !!navigator.userAgent.match(/Trident/g) || !!navigator.userAgent.match(/MSIE/g);

if(isIE){
  $('body').addClass('ie');
}

function NewTab(){

    var links = $('.desc a');
    var len = links.length;
    for(var i=0; i<len; i++)
    {
      links[i].target = "_blank";
    }

    if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
      $('a.whatsapp').attr('href', $('a.whatsapp').attr('data-href') );
      $('a.telegram').attr('href', $('a.telegram').attr('data-href') );
    }

}
function AjaxRun(a_href){

    $('main .content').html('');

    $('body').removeClass('show-block');

    $('.content .fetch-wrapper').remove();

    $.ajax({
      cache: false,
      url:  a_href,
      type:'GET',
      data:{
        CSRF_TOKEN
      },
      success:function(data){
          $('body').addClass('show-block');
          var temp = $(data);
          $('main .content').empty().append(temp);

          $('main header').remove();
          $('main footer').remove();
          $('main meta').remove();
          $('main link').remove();
          $('main base').remove();
          $('main script').remove();
          $('body main .wrapper').removeClass('wrapper').addClass('fetch-wrapper');

          $('main .content main').each(function() {
            $(this).replaceWith($('<div class="fetch-main">' + this.innerHTML + '</div>'));
          });
          $('main .content .fetch-main .content').removeClass('content').removeClass('wrapped').removeClass('full').addClass('fetch-content').addClass('fetch-wrapped');
          $('.fetch-main .loader').remove();

          if ( $('main .content').find('title').length ) {
            document.title = $('main .content').find('title').html();
          } else {
            document.title = ' | Error 404 !!!';
          }

          setTimeout(function(){
            $('main .content title').remove();
          });

          NewTab();

      },
      error:function(){

        document.title = 'خطای ۴۰۰ | خطا در اتصال دریافت اطلاعات سرور!';

        $('.toolbar-head .tool-btn').html('<div class="toolbar"><div class="title"><i class="icn fill float-right" style="background-image: url(assets/icons/frown.svg);"></i><h1 class="float-right text-right">خطای ۴۰۰ | خطا در اتصال دریافت اطلاعات سرور!</h1></div></div>');

        $('main .content').html('<section class="card error-content e-green error-fetch"><div class="txt-title">۴۰۰</div><p>خطا در اتصال دریافت اطلاعات سرور</p><hr><p class="mt-2">به نظر میاد دسترسی به سرور امکان‌پذیر نمی‌باشد.<br>اشکالی نداره، دوباره رفرش (CTLR+F5) بزنید.</p><a href="'+data_home+'" class="ml-3">بازگشت به صفحه اصلی</a><a href="'+data_home+'/shop">فروشگاه</a></section>');
        $('body').removeClass('home').addClass('page').addClass('show-block');
      }
    });
}

function FetchScroll(){

    // $(window).scroll(function () {
    //     var str = location.href;
    //
    //     var data_fetch = $('main .lists').attr('data-fetch');
    //     if ( data_fetch == 'scroll' ) {
    //
    //     var currentFetch = str.replace(data_home,'');
    //
    //     if( $(window).scrollTop() + $(window).height() > $(document).height() - 300 ) {
    //
    //         var elm = $('main ul.lists'),  data_start = elm.attr('data-str'), data_limit = elm.attr('data-limit'), data_id = elm.attr('data-id'), data_slug = elm.attr('data-slug');
    //
    //         if ( str.indexOf('admin') !== -1 ){
    //         var url_slug = str+'/fetch';
    //         } else {
    //         if ( str.indexOf('products/cat') !== -1 ){
    //             var url_fetch = 'products/cat';
    //             var url_slug = data_home + '/products/cat/' + data_slug;
    //         } else if ( str.indexOf('category/article') !== -1 ){
    //             var url_fetch = 'category/article';
    //             var url_slug = data_home + '/category/article/' + data_slug;
    //         } else if ( str.indexOf('forum/cats') !== -1 ){
    //             var url_fetch = 'forum/cats';
    //             var url_slug = data_home + '/forum/cats/' + data_slug;
    //         } else if ( str.indexOf('forum/products') !== -1 ){
    //             var url_fetch = 'forum/products';
    //             var url_slug = data_home + '/forum/products/' + data_slug;
    //         } else {
    //             var url_slug = data_home +  currentFetch  ;
    //         }
    //         }
    //
    //
    //         $('ul.lists .loading').remove();
    //         elm.append("<li class='loading'>Loading...</li>");
    //         data_start = parseInt(data_start) + parseInt(data_limit);
    //         elm.attr( 'data-str' , data_start );
    //
    //         var xhr =  $.ajax({
    //         cache: false,
    //
    //         url:  url_slug + '?CSRF_TOKEN=' + CSRF_TOKEN + '&_=' + Math.random() ,
    //         type:'POST',
    //
    //         data: {"_token": CSRF_TOKEN, data_start:data_start, url_fetch:url_fetch, data_id:data_id, data_slug:data_slug, data_limit:data_limit },
    //         success:function(data){
    //
    //             setTimeout(function(){
    //                 $('ul.lists .loading').remove();
    //                 if(data != '') {
    //                     elm.append(data);
    //                 } else if(data == '') {
    //                     elm.removeClass('lists').addClass('lists-ed');
    //                     $('html, body').stop();
    //                 }
    //             }, 5);
    //
    //         },
    //         error:function(){
    //         }
    //         });
    //
    //         $('main ul.lists-ed').each(function() {
    //
    //         xhr.abort();
    //         });
    //
    //     }
    //     }
    // });
}

function AdminUrl(){
    if ( AdminStyle == "1" ){

    scriptLoader( Admin ,function(){
      Admin_Script();
      TinyEditor();
      Chartjs();
      DatePicker()
      PopUp();
    });

    }
}

function progressBar() {
    var elem = document.getElementById("progress-bar");
    var width = 1;
    if(typeof elem !== 'undefined' && elem !== null){
        elem.style.width = width;
        var id = setInterval(frame, 0.5);
        function frame() {
            if (width >= 100) {
                clearInterval(id);
            } else {
                width++;
                elem.style.width = width +"%";
            }
        }
    }
}

function out_menu_content(){
    $(window).on('scroll', function () {
        var top = $(window).scrollTop(),
            divBottom = $('.line-menu-content-box').offset().top + $('.line-menu-content-box').outerHeight();
        if (divBottom > top) {
        $('body').removeClass('out-menu-content');
        } else {
        $('body').addClass('out-menu-content');
        }
    });
}

    $(document).ready ( function () {

        $('li.nav-toolbar-edit').html('')
        $('.toolbar-editor').clone().appendTo('li.nav-toolbar-edit');
        $('main .toolbar-editor').html('')

    })

$(document).ready(function () {

    setTimeout(function(){
        $('.alert.hide').css({'visibility':'hidden','opacity':'0','top':'-500px'  });
        setTimeout(function(){
            $('.alert.hide').remove();
        } ,500);
    } ,2300);

});

function AlertConfirm(title,content,ok){

    var html_code = '';
    html_code += '<div class="popup alert-confirm" style="width:450px;height:50px">';
    html_code += '<div class="header bold">';
    html_code += 'پیغام ' + title;
    html_code += '<div title="بستن" class="btn btn-danger btn-close-popup btn-close-abs">بستن</div>';
    html_code += '</div>';
    html_code += '<div class="body">'+content+'</div>';
    html_code += '<div class="footer">';
    html_code += '<div class="btn btn-danger btn-yes-done">'+ok+'</div>';
    html_code += '</div>';
    html_code += '</div>';

    $('.popup.alert-confirm').remove()
    $('.pageblack').remove()
    $('main').append('<div class="pageblack back-intro"></div>').append(html_code)
    $('body').addClass('lock-scrollbar')

    $(document).ready(function () {
        $('.btn-close-popup').on('click', function () {
            $('.popup.alert-confirm').remove()
            $('.pageblack').remove()
            $('body').removeClass('lock-scrollbar')
        });

        $('.btn-yes-done').on('click', function () {

            $('.btn-yes-done').html('<i class="icn fill white loading"></i>').addClass('load');
            setTimeout(function(){
                return false;
            },200)

            setTimeout(function(){
                $('.popup.alert-confirm').remove()
                $('.pageblack').remove()
                $('body').removeClass('lock-scrollbar')
            },200)

        });

        $('.pageblack').on('click', function () {
            $('.popup.alert-confirm').remove()
            $('.pageblack').remove()
            $('body').removeClass('lock-scrollbar')
        });
    });
}


$(document).ready(function() {
    $('.accordion .section-title').on('click', function (e) {
        e.preventDefault();
        var currentAttrvalue = $(this).attr('data-id');
        if($(e.target).is('.active')){
            $(this).removeClass('active');
            $('.accordion .section-content:visible').slideUp(300);
        } else {
            $('.accordion .section-title').removeClass('active').filter(this).addClass('active');
            $('.accordion .section-content').slideUp(300).filter(currentAttrvalue).slideDown(300);
        }
    });
});

$(document).ready(function() {

    $(document).on('keyup', '.search-input', function () {
        var keyword = $(this).val();

        $(".resultDiv").css({'visibility':'visible','opacity':'1'});
        $('header .search .pop-search').show();
        $(".resultDiv .resultaj").hide();
        $('header .search input').addClass('popcres');
        $('header .search').addClass('search-show');
        $('header .main-bar').addClass('search-show-pop');
        $('.resultDiv.input-typed .box-panel-sr').hide();
        $('body .main-bar .search-pageblack').remove();
        // $('body .main-bar').prepend('<div class="search-pageblack"></div>');

        if ( window.screen.width <= 768 ) {
            $('body').addClass('click-search-input');
        }

        $('header .search input').removeClass('active');

        $('.navbarsearchbtn').attr('href','/search/'+ encodeURI(keyword) ).attr('data-slug', keyword );

        if( keyword.length > 0) {
            $(".resultDiv").show().fadeIn(150);
            $(".resultDiv").css('visibility','visible');
            $(".search-input").addClass('input-typed');
            $(".clear-search-input").addClass('input-typed');
            $('.resultDiv').addClass('input-typed');
            $(".main-header .main-bar .search-bar").addClass('input-typed');
            $('.resultDiv.input-typed .box-panel-sr').show();
            $('header .search .pop-search').hide();
            $('header .search .resultDiv').addClass('typing');

            $('.res-pop').show();

            $('.resultDiv .resultaj').show();
            $('.resultDiv .resultaj .loading').show();
            var url_fetch = '/search/';
            var xhr =  $.ajax({
            cache: false,
            url:  data_home + url_fetch + keyword +'?CSRF_TOKEN=' + CSRF_TOKEN + '&_=' + Math.random() ,
            type:'POST',
            data: {"_token": CSRF_TOKEN, keyword:keyword,url_fetch:url_fetch },
            success:function(data){
                setTimeout(function(){
                $('.resultDiv .resultaj .loading').hide();
                $(".resultDiv .resultaj").html(data);
                }, 1000);
            }
            });
        } else {
            $('header .search .pop-search').show();
            $('.resultDiv .resultaj .loading').show();
            // $(".resultDiv .resultaj").html('<div class="loading"><div class="load"></div></div>').hide();
            $(".clear-search-input").removeClass('input-typed');
            $(".search-input").removeClass('input-typed').removeClass('input-click');
            $(".main-header .main-bar .search-bar").removeClass('input-typed');$(".main-header .main-bar .search-bar").removeClass('input-click');
            $('.resultDiv').removeClass('input-typed');
            $('header .search input').addClass('active');
        }
    });

    if ( data_href.indexOf('/search') !== -1 ){
        setTimeout(function() {
        },100);
    }

    $(document).on('click','.search-input',function(){

        $('nav').removeClass('close-search-ani');

        $('.btn-top').hide()

        setTimeout(function() {
            $('input.search-input').focus();
        },100);

        $(".resultDiv").css({'visibility':'visible','opacity':'1'});
        $('header .search .pop-search').show();
        $(".resultDiv .resultaj").hide();
        $('header .search input').addClass('popcres');
        $('header .search input').addClass('active');
        $('header .search').addClass('search-show');
        $('header .main-bar').addClass('search-show-pop');
        $('.resultDiv.input-typed .box-panel-sr').hide();
        $('body .main-bar .search-pageblack').remove();
        // $('body .main-bar').prepend('<div class="search-pageblack "></div>');
        $('.user-pop .box-pop').removeClass('show');
        $('.popup-chat-box').removeClass('show');
        $('.contactus-btn .btn-icon').removeClass('active');
        $('.contactus-btn .btn-txt').removeClass('show');

        if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
            $('.clear-search-input').show();
            $('body.mobile main').hide();
            $('body.mobile header .nav').hide();
            $("body.mobile header .search .search-logo").show();
            $('body.mobile header .search button.btn').hide();
            $('.back-search-box').css('visibility','visible');
        }

    });

    $(document).on('click','.search-input.mobile',function(){
        $('body').addClass('lock-scrollbar');
    });

    $(document).on('click','.search-input-page',function(){
        if ( window.screen.width <= 768 ) {
            $('body').addClass('click-search-input');
        }
    });

    $(document).on('click','.search-pageblack',function(){

        if ( window.screen.width >= 768 ) {
            $(".resultDiv").css({'visibility':'hidden','opacity':'0' });
            $(".resultDiv .resultaj").hide();
            $('.search input').removeClass('popcres');
            $('.search').removeClass('search-show');
            $('.main-bar').removeClass('search-show-pop');
            $('.resultDiv.input-typed .box-panel-sr').hide();
            $('nav').removeClass('search-show-pop').addClass('close-search-ani');
            $('body .main-bar .search-pageblack').remove();
            $('.search-input').removeClass('active');
            $('body').removeClass('lock-scrollbar');
            $('.btn-top').removeAttr('style')
        }

    });

    $(document).on('click','.res-pop a',function(){

        $(".resultDiv").css({'visibility':'hidden','opacity':'0' });

        $(".resultDiv .resultaj").hide();
        $('header .search input').removeClass('popcres');
        $('header .search').removeClass('search-show');
        $('header .main-bar').removeClass('search-show-pop');
        $('.resultDiv.input-typed .box-panel-sr').hide();

        $('body .main-bar .search-pageblack').remove();

    });

    $(document).on('click','.clear-search-input',function(){

        $('.search-pageblack').remove()
        $('.search-input').val("").focus();
        $('body').removeClass('lock-scrollbar');
        $('nav').removeClass('search-show-pop').addClass('close-search-ani');
        $('.search').removeClass('search-show');
        $('.search-input').removeClass('active');
        $(".resultDiv").css({'visibility':'hidden','opacity':'0' });
        $(".resultDiv .resultaj").hide();

        $('.btn-top').removeAttr('style')
        $('.navbarsearchbtn').attr('href','/search' ).attr('data-slug', '');
    });

});

if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
    $('.search-input').on("keypress", function(e){
        if(e.key ==  'Enter') {
          $(".navbarsearchbtn").trigger("click");
        }
    });
}
$('.navbarsearchbtn').on('click', function () {
    var srcValue = $(this).attr('href');
    window.open(data_home+srcValue,"_parent");
    $(".resultDiv").css({'visibility':'hidden','opacity':'0' });
    $(".resultDiv .resultaj").hide();
    $('header .search input').removeClass('popcres');
    $('header .search').removeClass('search-show');
    $('header .main-bar').removeClass('search-show-pop');
    $('.resultDiv.input-typed .box-panel-sr').hide();
    $('.search-pageblack').remove();
});

$(document).ready(function() {
    $(document).on('keyup', '.input-mobile-gracy', function() {
        var type = $(this).val();
        if (type.length == 11) {
            $('.btn-mobile-gracy').show();
            $(document).on('click', '.btn-mobile-gracy', function() {
                $('.box-mobile-gracy').show();
                $('.btn-mobile-gracy.cruy').hide();
            });
        } else {
            $('.btn-mobile-gracy').hide();
            $('.box-mobile-gracy').hide();
        }
    });
});
$('input.input-mobile-gracy').on('input', function () {
    var value = $(this).val();
    if ((value !== '') && (value.indexOf('.') === -1)) {
        $(this).val(Math.max(Math.min(value, 9999999999), -9999999999));
    }
});

$(function() {
$(document).on("mouseover", '.menu-nav', function () {
    $(".menu-nav").removeClass('active');
    $(this).addClass("active");
    $('.list-general img.wewa').each(function(){
    $(this).removeClass('lazyload')
    $(this).addClass('lazyload')
    });
    var selected_tab = $(this).find("a").attr("data-link");
    $(selected_tab).stop().fadeIn(0);
    return false;
});
});

$(function() {
$(document).on("mouseleave", '.ul.lists li.menu-nav', function () {
    $("li.menu-nav").removeClass('active');
    return false;
});
});

function list_general(){
$(document).ready(function () {
    $('.menu ul li.main').hover(function() {
    $('ul.menu li div.dropdown-menu').addClass('show-open');
    $('.product-cat-menu-link').addClass('show');
    $('.list-general').addClass('show');
    }, function() {
        $('ul.menu li div.dropdown-menu').removeClass('show-open');
        $('.product-cat-menu-link').removeClass('show');
        $('.list-general').removeClass('show');
        $('#pageMenu').remove();
    });
});
}
list_general();

$(document).on("mouseleave", '.menu ul li.main', function () {
$(".list-general li.menu-nav").removeClass('active');
});


$(document).on("mouseover", document, function () {
$('.home ul.menu .list-general ul.lists').clone().appendTo('.home .list-general.data');
$('.home .list-general.data-cpy').removeClass('data');
});

$(document).ready(function () {
    $('a.product-cat-menu-link').hover(function() {
        }, function() {
        $('#pageMenu').remove();
    });
});

// $(window).on('load', function() {
//     var position = $(window).scrollTop();
//     $(window).scroll(function() {
//         var scroll = $(window).scrollTop();
//         if(scroll > position) {
//             if ($(window).scrollTop() > 30) {
//             $( 'body header .nav' ).addClass( "nav-isvisible" );
//             $( 'body' ).addClass( "nav-isvisible" );
//             $( 'body header .dropdown-menu.dropdown-content' ).hide();
//             if(curr_page == 'product' || curr_page == 'product-preview' ){
//                 $( '.tabs-product-content' ).addClass( "tab-isvisible" );
//             }
//             }
//         } else {
//             $( 'body header .nav' ).removeClass( "nav-isvisible" );
//             $( 'body' ).removeClass( "nav-isvisible" );
//             $('body header .dropdown-menu.dropdown-content').removeAttr('style');
//             if(curr_page == 'product' || curr_page == 'product-preview' ){
//                 $( '.tabs-product-content' ).removeClass( "tab-isvisible" );
//             }
//         }
//         position = scroll;
//     });
// });

$(document).ready(function () {
$('.snowcat li a').hover(function() {
    $('body main').append('<div id="pageblack-blog" class="pageblack-blog"></div>').fadeIn(325);
    }, function() {
    $('#pageblack-blog').fadeOut(150).remove();
});
});

if(curr_page == 'home'){
    out_menu_content();
}

$(document).on("mouseover", '.product-cat-menu-link.show-m', function () {
    $(this).removeClass('show-m');
    $('.home ul.menu .list-general.data-cpy .line-menu-content-box').remove();
    return false;
});

$(document).on("mouseover", '.product-cat-menu-link', function () {
    $('.pageblack').remove();
    $('body main').append('<div id="pageMenu" class="pageblack menu-r"></div>').fadeIn();
    $("ul.menu li.menu-main.list").addClass('show hover');
    $(".home main .content").addClass('show-menu');
    $('.home .homepage-opr .list-general.data-cpy').remove();
    return false;
});
$(document).on("mouseout", '.product-cat-menu-link', function () {
    $('#pageMenu').remove();
    $("ul.menu li.menu-main.list").removeClass('show');
    return false;
});

$(document).on("mouseover", '.menu .list-general ul.lists li', function () {
    $('.pageblack').remove();
    $('body main').append('<div id="pageMenu" class="pageblack sub-menu"></div>').fadeIn();
    $("ul.menu li.menu-main.list").addClass('show');
    return false;
});
$(document).on("mouseout", '.menu .list-general ul.lists li', function () {
    $('#pageMenu').remove();
    $("ul.menu li.menu-main.list").removeClass('show');
    return false;
});
$(document).on("mouseover", '.product-cat-menu-link', function () {
    $(".menu-level-com").addClass('show-open');
    return false;
});
$(document).on("mouseout", '.product-cat-menu-link', function () {
    $(".menu-level-com").removeClass('show-open');
    return false;
});
$(document).on("mouseover", '.home main .menu aside.list-general', function () {
    $(".menu-level-com").addClass('show-open');
    return false;
});
$(document).on("mouseout", '.home main .menu aside.list-general', function () {
    $(".menu-level-com").removeClass('show-open');
    return false;
});

$(document).ready ( function () {
  $("body .user-click").click(function() {
    $('.user-pop .box-pop').addClass('show');
    $('.pageblack').fadeOut(150).remove();
    $('body .main-bar').append('<div id="pageblack" class="pageblack" style="z-index:39"></div>').fadeIn(325);
  });

  $(".user-pop .box-pop").click(function() {
    $('.pageblack').remove();
    $('body .main-bar').append('<div id="pageblack" class="pageblack" style="z-index:39"></div>').fadeIn(325);
  });

  $(document).on("click",".user-pop .box-pop a", function () {
    $('.user-pop .box-pop').removeClass('show');
    $('.pageblack').remove();
  });

  $(document).on ("click", ".pageblack," + "body footer," + "header .logo," + "header .menu" , function () {
      $('.user-pop .box-pop').removeClass('show');
      $('.user-pop').removeClass('show');
      $('#pageblack').fadeOut(150).remove();
  });

  $(document).on("click",".user-pop a.logout", function () {
    $('main div div').remove();
  });
});
$(document).on('keyup', 'input.number-comma', function (event) {
    if (event.which >= 37 && event.which <= 40) return;
    $(this).val(function (index, value) {
        return value.
        replace(/\D/g, "").
        replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    });
});

$(document).on('keyup', 'input.number-required', function (event) {
    if (event.which >= 37 && event.which <= 40) return;
    $(this).val(function (index, value) {
        return value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');
    });
});

function Number_Comma_Text(int) {
    return int.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
$(document).ready(function() {
  $('.password-showhide').on('click', function () {
      var action = $(this).attr('data-action')
      if ( action === "password") {
        $(this).attr('data-action','text')
        $(this).next().attr('type','text')
      } else {
        $(this).attr('data-action','password')
        $(this).next().attr('type','password')
      }
  });
});

$(function() {

  $(document).on('click','.btn-captcha',function(){
    $.ajax({
      cache: false,
      url:  data_home + '/admin/captcha' + '?CSRF_TOKEN=' + CSRF_TOKEN + '&_=' + Math.random() ,
      type:'POST',
      data: {"_token": CSRF_TOKEN },
      success:function(data){
        $('img.captcha').attr('src',data);
      }
    });
  });

});
$(function() {

  $(document).on('click','.pageblack',function(){
    $('body').removeAttr("style").removeClass('modal-actived');
      $('.modal').removeClass('show');
      $('body main .content').removeClass('front-position')
      $('main .popup').addClass('hide')
      $('main .content').removeClass('front-position')
      setTimeout(function(){
        $('.modal').remove();
        $('.popup-show').remove();
        $('.popup').removeClass('show').addClass('hide');
        $('body').removeClass('lock-scrollbar')
        $('.pageblack').remove();
      }, 100);
    $('.modal-log').removeAttr("style");
  });

});
$(function() {
    $(document).on('click','.close',function(){
        $('body').removeAttr("style").removeClass('modal-actived');
        $('.modal').removeClass('show');
        setTimeout(function(){
            $('.modal').remove();
            $('.pageblack').remove();
        }, 100);
        $('.modal-log').removeAttr("style");
    });

});
$(function(){
    $('.desc a > img[style]').each(function(){
        var $el = $(this);
        var style = $el.attr('style');
        $el.attr('style','');
        $el.parent().attr('style',style);
    });
    $(".desc img").each(function(){
        var title = this.alt;
        $(this).after('<div class="caption">'+ title +'</div>');
            setTimeout(function(){
            $(".desc img").show();
            }, 3500);

    });
    $('.desc img').each(function(i, el) {
        $(el).addClass('thumb lazyload').attr({
            'data-src': $(el).attr('src'),
            'src': 'dists/logo/lazy.jpg'
        });
    });

});
$(document).on("click","button.btn.send", function () {
    $(this).html('<i class="icn fill white loading"></i>').addClass('load');
});
$(document).on("click","button.login-submit-btn", function () {
    $(this).html('<i class="icn fill white loading"></i>').addClass('load');
});

$('select').each(function() {
    var $this = $(this);
    $this.wrap('<div class="selectoption-warp content"></div>');
    $this.wrap('<div class="form-group select position-relative"></div>');
    $this.before('<span class="selectoption arrow block"></span>');
    var $styledSelect = $this.next('div.styledSelect');
    $styledSelect.text('');
});

setTimeout(function(){
    $('body').addClass('show-block');
    $('.loader').remove()
    $('.spinner').remove()
}, timeLoad);

// topbar.show()

$('.toolbars').hide();

$(window).on("load",function(){
      if (curr_page == 'post' || curr_page == 'post-preview'){
        $("main .content-wrap").progressBar();
      }
    $('body main .content .content-wrap').removeClass('hidden');
    $('main .tabs-product-content').removeClass('hidden');
});

AdminUrl()
NewTab()
// FetchScroll()
progressBar()
// $(function() {
    // $(document).on('click','body a',function(event){
    //
    //     var href_curr= window.location.href , scrollPos = $(window).scrollTop();
    //
    //     var a_href = $(this).attr("href");
    //     var target_href = $(this).attr('target');
    //     $('.data_href').attr('data-backpage', window.location.href )
    //
    //     $('.toolbars .toolbar').hide();
    //     $('.toolbars').hide();
    //
    //     $('.spinner').remove()
    //
    //     $('li.nav-toolbar-edit').html('')
    //     $('.toolbar-editor').clone().appendTo('li.nav-toolbar-edit');
    //     $('main .toolbar-editor').html('')
    //     $('body').removeClass('click-search-input');
    //     $('.search-pageblack').remove()
    //     $('body').removeClass('lock-scrollbar');
    //     $('nav').removeClass('search-show-pop').addClass('close-search-ani');
    //     $('.search').removeClass('search-show');
    //     $('.search-input').removeClass('active');
    //     $(".resultDiv").css({'visibility':'hidden','opacity':'0' });
    //     $(".resultDiv .resultaj").hide();
    //     $('.btn-top').removeAttr('style')
    //     $('.navbarsearchbtn').attr('href','/search' ).attr('data-slug', '');
    //     var slug_da = $('a.navbarsearchbtn').attr('data-slug')
    //
    //     if (  a_href.indexOf( 'search' ) == -1  )  {
    //         $('.navbarsearchbtn').attr('href','/search' ).attr('data-slug', '' );
    //     } else {
    //         $('.search-input').val( slug_da );
    //         $('.navbarsearchbtn').attr('href','/search/' + slug_da ).attr('data-slug', slug_da );
    //     }
    //     if ( a_href.indexOf( '/login' ) !== -1 ) {
    //         $('.user-login-reg').attr('href','/login' )
    //     } else {
    //         $('.user-login-reg').attr('href','/login?redirect_to=' + encodeURIComponent(  a_href ) )
    //     }
    //     if ( (a_href.indexOf('http') !== -1 && a_href.indexOf( data_home ) == -1) || (a_href.indexOf('skype') !== -1 && a_href.indexOf( data_home ) == -1 ) || (a_href.indexOf('skype') !== -1 && a_href.indexOf( data_home ) == -1 ) ) {
    //     } else {
    //     if(! target_href) {
    //         event.preventDefault();
    //         if(a_href.substr(-1) === '/') {
    //             var url_redirect = a_href.slice(0, -1) ;
    //             window.history.pushState("", "", url_redirect  );
    //         } else {
    //             window.history.pushState("", "", a_href  );
    //         }
    //         list_general()
    //         // loader()
    //
    //         $('body a').each(function(){
    //             $(this).removeClass('active');
    //         });
    //
    //         $(this).addClass('active');
    //
    //         if ( a_href == data_home ){
    //             $('header nav ul.menu li .list-general').addClass('data-cpy');
    //             $(".tab a[href='"+ data_home +"']").addClass('active');
    //             $('.footer-about .head').html( $('.footer-about .head').attr('data-header' ) ).removeAttr('data-header');
    //             $('.footer-about .para').html( $('.footer-about .para').attr('data-content' ) ).removeAttr('data-content');
    //         }
    //
    //         if ( a_href == data_home +'/' ) {
    //             $(".tab a[href='"+ data_home +"']").addClass('active');
    //         }
    //
    //         $('nav .menu .list-general').removeClass('show');
    //         $('nav .menu .list').removeClass('show');
    //         $('.menu .menu-main').removeClass('active');
    //         $('main .pageblack').remove();
    //
    //         $('.bell-btn').removeClass('active');
    //         $('.bell-pop').removeClass('active');
    //         $("html,body").animate({scrollTop:$("main").offset().top},10);
    //
    //         var data_href = $('.data_href').attr('data-href');
    //         $('.data_href').attr('data-href', a_href ).addClass('line-menu-content-box');
    //
    //         if ( a_href.indexOf('products/cat') !== -1 || a_href.indexOf('shop') !== -1 ){
    //             $('.menu .menu-main').addClass('active');
    //             $('a.product-cat-menu-link').addClass('active');
    //         }
    //
    //         if ( a_href.indexOf('category/article') !== -1 ){
    //             $('.menu .main-list .blog').addClass('active');
    //         }
    //
    //         $('body').removeClass('home').removeClass('admin').removeClass('login').removeClass('page').removeClass('forum');
    //         $('.content').removeClass('form-content').removeClass('edit').removeClass('create').removeClass('no-form')
    //         if ( a_href.indexOf('admin') !== -1  ){
    //             $('body').addClass('admin');
    //         } else if ( a_href.indexOf('login') !== -1  ){
    //             $('body').addClass('admin login');
    //         } else if ( a_href.indexOf('forum') !== -1  ){
    //             $('body').addClass('forum page');
    //         } else if ( a_href == data_home ){
    //             $('body').addClass('home');
    //         } else {
    //             $('body').addClass('page');
    //         }
    //         if ( a_href != '#' ) {
    //             if ( a_href != data_href ) {
    //                 AjaxRun(a_href);
    //             }
    //         } else {
    //             $('body').addClass('home');
    //         }
    //         $('.data_href .pos').remove();
    //         $('.data_href').append('<div class="pos" data-url="'+href_curr+'" data-pos="'+scrollPos+'"></div>');
    //         }
    //     }
    // });

// });

$(document).ready(function () {

    $('.back-page').on('click', function (e) {
      e.preventDefault();
      var data_back = $('.data_href').attr('data-backpage');
      if ( data_back ){
        $('.data_href').attr('data-backpage', window.location.href )
        window.history.pushState("", "", data_back  );
        $('.data_href').attr('data-href', data_back )
        $('.toolbars .toolbar').hide();
        AjaxRun(data_back);
        if ( data_back.indexOf('admin') !== -1  ){
          $('body').addClass('admin');
        } else if ( data_back.indexOf('forum') !== -1  ){
          $('body').addClass('forum page');
        } else if ( data_back == data_home + '/' || data_back  == data_home  ){
          $('body').addClass('home');
        } else {
          $('body').addClass('page');
        }
        // loader()
      } else {
        $('.data_href').attr('data-backpage', window.location.href )
        window.history.pushState("", "", data_home  );
        $('.data_href').attr('data-href', data_home )
        $('.toolbars .toolbar').hide();
        AjaxRun(data_home);
        if ( data_home.indexOf('admin') !== -1  ){
          $('body').addClass('admin');
        } else if ( data_home.indexOf('forum') !== -1  ){
          $('body').addClass('forum page');
        } else if ( data_home == data_home + '/' || data_home  == data_home  ){
          $('body').addClass('home');
        } else {
          $('body').addClass('page');
        }
        // loader()
      }
    });
    window.onpopstate = function () {
      let url_back = location.href;
      $('body').removeClass('home').removeClass('admin').removeClass('login').removeClass('page').removeClass('forum');
      $('.content').removeClass('form-content').removeClass('edit').removeClass('create').removeClass('no-form')
      var slug_da = window.location.href.replace( data_home+'/search/','')
      // topbar.show()
      if( slug_da.indexOf( data_home ) == -1   ) {
        $('.search-input').val( slug_da );
        $('.navbarsearchbtn').attr('href','/search/' + slug_da ).attr('data-slug', slug_da );
      } else {
        $('.search-input').val( '' );
        $('.navbarsearchbtn').attr('href','/search'  ).attr('data-slug', '' );
      }
      $('.toolbars .toolbar').hide();
      AjaxRun(url_back);
      if ( url_back.indexOf('admin') !== -1  ){
        $('body').addClass('admin');
      } else if ( url_back.indexOf('forum') !== -1  ){
        $('body').addClass('forum page');
      } else if ( url_back == data_home + '/' || url_back  == data_home  ){
        $('body').addClass('home');
      } else {
        $('body').addClass('page');
      }
      // loader()
      var PosVal = $('.data_href .pos[data-url="'+url_back+'"]').attr('data-pos');
      $('html, body').animate({ scrollTop: PosVal }, 300 );
      $('.data_href').attr('data-href', window.location.href.replace( data_home,'') );
      $("a.active").each(function(){
        $(this).removeClass('active');
      });

      $(".menu-back a[href='"+ url_back.replace(data_home, "") +"']").addClass('active');
      $(".tab a[href='"+ url_back.replace(data_home, "") +"']").addClass('active');
      $('.toolbar-head .tool-btn').html('');
      $('.toolbars .toolbar').clone().appendTo('.toolbar-head .tool-btn').show();
      $('.toolbars').remove();
      if ( url_back == data_home +'/' ) {   $(".tab a[href='"+ data_home +"']").addClass('active'); }
      $('.box-pop').removeClass('show');
      $('.main-bar').removeClass('search-show-pop');
      $('.search.bar').removeClass('search-show');
      $('.pageblack').remove();
      $('.search-pageblack').remove();
      $(".resultDiv").css({'visibility':'hidden','opacity':'0' });
      $(".resultDiv .resultaj").hide();
      $('header .search input').removeClass('popcres');
      $('header .search').removeClass('search-show');
      $('header .main-bar').removeClass('search-show-pop');
      $('.resultDiv.input-typed .box-panel-sr').hide();

    };

});
