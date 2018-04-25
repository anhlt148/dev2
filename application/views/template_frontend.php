<!DOCTYPE html>
<html lang="vi" prefix="og: http://ogp.me/ns#" xml:lang="vi">
  <head>
    <script type="text/javascript">window.NREUM||(NREUM={});NREUM.info={"beacon":"bam.nr-data.net","errorBeacon":"bam.nr-data.net","licenseKey":"80004c0dc1","applicationID":"73311460","transactionName":"dV1ZEkJWXVtVExtcXVtXGA9eXVRP","queueTime":0,"applicationTime":88,"agent":""}</script>
    <script type="text/javascript">window.NREUM||(NREUM={}),__nr_require=function(e,n,t){function r(t){if(!n[t]){var o=n[t]={exports:{}};e[t][0].call(o.exports,function(n){var o=e[t][1][n];return r(o||n)},o,o.exports)}return n[t].exports}if("function"==typeof __nr_require)return __nr_require;for(var o=0;o<t.length;o++)r(t[o]);return r}({1:[function(e,n,t){function r(){}function o(e,n,t){return function(){return i(e,[c.now()].concat(u(arguments)),n?null:this,t),n?void 0:this}}var i=e("handle"),a=e(2),u=e(3),f=e("ee").get("tracer"),c=e("loader"),s=NREUM;"undefined"==typeof window.newrelic&&(newrelic=s);var p=["setPageViewName","setCustomAttribute","setErrorHandler","finished","addToTrace","inlineHit","addRelease"],d="api-",l=d+"ixn-";a(p,function(e,n){s[n]=o(d+n,!0,"api")}),s.addPageAction=o(d+"addPageAction",!0),s.setCurrentRouteName=o(d+"routeName",!0),n.exports=newrelic,s.interaction=function(){return(new r).get()};var m=r.prototype={createTracer:function(e,n){var t={},r=this,o="function"==typeof n;return i(l+"tracer",[c.now(),e,t],r),function(){if(f.emit((o?"":"no-")+"fn-start",[c.now(),r,o],t),o)try{return n.apply(this,arguments)}finally{f.emit("fn-end",[c.now()],t)}}}};a("setName,setAttribute,save,ignore,onEnd,getContext,end,get".split(","),function(e,n){m[n]=o(l+n)}),newrelic.noticeError=function(e){"string"==typeof e&&(e=new Error(e)),i("err",[e,c.now()])}},{}],2:[function(e,n,t){function r(e,n){var t=[],r="",i=0;for(r in e)o.call(e,r)&&(t[i]=n(r,e[r]),i+=1);return t}var o=Object.prototype.hasOwnProperty;n.exports=r},{}],3:[function(e,n,t){function r(e,n,t){n||(n=0),"undefined"==typeof t&&(t=e?e.length:0);for(var r=-1,o=t-n||0,i=Array(o<0?0:o);++r<o;)i[r]=e[n+r];return i}n.exports=r},{}],4:[function(e,n,t){n.exports={exists:"undefined"!=typeof window.performance&&window.performance.timing&&"undefined"!=typeof window.performance.timing.navigationStart}},{}],ee:[function(e,n,t){function r(){}function o(e){function n(e){return e&&e instanceof r?e:e?f(e,u,i):i()}function t(t,r,o,i){if(!d.aborted||i){e&&e(t,r,o);for(var a=n(o),u=m(t),f=u.length,c=0;c<f;c++)u[c].apply(a,r);var p=s[y[t]];return p&&p.push([b,t,r,a]),a}}function l(e,n){v[e]=m(e).concat(n)}function m(e){return v[e]||[]}function w(e){return p[e]=p[e]||o(t)}function g(e,n){c(e,function(e,t){n=n||"feature",y[t]=n,n in s||(s[n]=[])})}var v={},y={},b={on:l,emit:t,get:w,listeners:m,context:n,buffer:g,abort:a,aborted:!1};return b}function i(){return new r}function a(){(s.api||s.feature)&&(d.aborted=!0,s=d.backlog={})}var u="nr@context",f=e("gos"),c=e(2),s={},p={},d=n.exports=o();d.backlog=s},{}],gos:[function(e,n,t){function r(e,n,t){if(o.call(e,n))return e[n];var r=t();if(Object.defineProperty&&Object.keys)try{return Object.defineProperty(e,n,{value:r,writable:!0,enumerable:!1}),r}catch(i){}return e[n]=r,r}var o=Object.prototype.hasOwnProperty;n.exports=r},{}],handle:[function(e,n,t){function r(e,n,t,r){o.buffer([e],r),o.emit(e,n,t)}var o=e("ee").get("handle");n.exports=r,r.ee=o},{}],id:[function(e,n,t){function r(e){var n=typeof e;return!e||"object"!==n&&"function"!==n?-1:e===window?0:a(e,i,function(){return o++})}var o=1,i="nr@id",a=e("gos");n.exports=r},{}],loader:[function(e,n,t){function r(){if(!x++){var e=h.info=NREUM.info,n=d.getElementsByTagName("script")[0];if(setTimeout(s.abort,3e4),!(e&&e.licenseKey&&e.applicationID&&n))return s.abort();c(y,function(n,t){e[n]||(e[n]=t)}),f("mark",["onload",a()+h.offset],null,"api");var t=d.createElement("script");t.src="https://"+e.agent,n.parentNode.insertBefore(t,n)}}function o(){"complete"===d.readyState&&i()}function i(){f("mark",["domContent",a()+h.offset],null,"api")}function a(){return E.exists&&performance.now?Math.round(performance.now()):(u=Math.max((new Date).getTime(),u))-h.offset}var u=(new Date).getTime(),f=e("handle"),c=e(2),s=e("ee"),p=window,d=p.document,l="addEventListener",m="attachEvent",w=p.XMLHttpRequest,g=w&&w.prototype;NREUM.o={ST:setTimeout,SI:p.setImmediate,CT:clearTimeout,XHR:w,REQ:p.Request,EV:p.Event,PR:p.Promise,MO:p.MutationObserver};var v=""+location,y={beacon:"bam.nr-data.net",errorBeacon:"bam.nr-data.net",agent:"js-agent.newrelic.com/nr-1059.min.js"},b=w&&g&&g[l]&&!/CriOS/.test(navigator.userAgent),h=n.exports={offset:u,now:a,origin:v,features:{},xhrWrappable:b};e(1),d[l]?(d[l]("DOMContentLoaded",i,!1),p[l]("load",r,!1)):(d[m]("onreadystatechange",o),p[m]("onload",r)),f("mark",["firstbyte",u],null,"api");var x=0,E=e(4)},{}]},{},["loader"]);</script>
    <title>Doctor Đồng</title>
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="width=device-width,initial-scale=1.0,minimum-scale=1.0,user-scalable=1" name="viewport">
    <meta property="og:title" content="DoctorDong">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://doctordong.vn/">
    <meta property="og:image" content="https://doctordong.vn/assets/logo-og-a754d74af71808c4c4a0d240d6999815721e308d16a4b6a6b9113b1fa970b43c.jpg">
    <meta property="og:image:type" content="image/jpg">
    <meta property="og:image:width" content="400">
    <meta property="og:image:height" content="400">
    <meta property="og:description" content="Phát sinh khoản chi tiêu ngoài dự tính? Cần thanh toán hóa đơn gấp? Mệt mỏi với quy trình rườm rà của các hình thức cho vay trên thị trường? Doctor Đồng - Vay tiền trực tuyến chính là giải pháp dành cho bạn.">
    <meta property="og:site_name" content="DoctorDong">
    <meta name="title" content="Doctor Đồng">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link href="/assets/favicons/favicon-247b9c72b8159ef4da2f59cf081f9e33662e75a2eb3b4b1f8ae9579e309bec4a.ico" rel="icon" type="image/x-icon">
    <link href="/assets/favicons/48-9b83b7b9168ed11cfb9409751ce83915cfe48c24e15521a5f922c28eb29f0e5a.png" rel="icon" sizes="48x48" type="image/png">
    <script>
      //<![CDATA[
      window.gon={};gon.locale="vi";gon.translations={"js.slider.needAmount":"VNĐ","resendCode":"Gửi lại","js.pleaseSelect":"Vui lòng chọn","js.slider.tip":"Dành cho khách hàng đã vay","errors.messages.phoneShouldByValid":"Vui long nhập số điện thoại hợp lệ"};gon.calculator={"amount":[1000000,1500000,2000000,2500000,3000000,4000000,6000000,8000000,10000000],"term":[10,20,30],"denominator":1000000,"amountLimitation":2500000,"commissions":{"1000000":{"10":200000,"20":300000,"30":390000},"1500000":{"10":300000,"20":450000,"30":580000},"3000000":{"10":600000,"20":890000,"30":1180000},"4000000":{"10":790000,"20":1180000,"30":1570000},"6000000":{"10":1190000,"20":1770000,"30":2350000},"8000000":{"10":1580000,"20":2360000,"30":3130000},"10000000":{"10":1970000,"20":2940000,"30":3920000},"2000000":{"10":400000,"20":590000,"30":780000},"2500000":{"10":500000,"20":740000,"30":980000}}};
      //]]>
    </script>


    <link rel="stylesheet" media="screen" href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600&amp;amp;subset=vietnamese">
    <link rel="stylesheet" media="screen" href="<?php echo base_url()?>css/application-4db113e305331c95af1a79026bfabb527564cd03e8d95c30f6896088f533af86.css">
    <link rel="stylesheet" media="screen" href="<?php echo base_url()?>css/application-35beafe7ac9b3213f6e71dbdad14f7b20abfc9e4dcdb95df0313bd6ec696b699.css">
    <script src="<?php echo base_url()?>js/application-6a80565304889f327626126cf7f12be86836e90b6a296613cc168d0c398d5f8d.js"></script>
    <script src="<?php echo base_url()?>js/application-6a475ba0dd1f12fcd81abb6df83ba06843117bb5f82a466e97230fe81230d977.js"></script>
    <script src="<?php echo base_url()?>js/dyn_wdp.js"></script>
    <script src="<?php echo base_url()?>js/snare.js"></script>
    <!-- Start Visual Website Optimizer Asynchronous Code-->
    <script type="text/javascript">
      var _vwo_code=(function(){
      var account_id=227657,
      settings_tolerance=2000,
      library_tolerance=2500,
      use_existing_jquery=false,
      // DO NOT EDIT BELOW THIS LINE
      f=false,d=document;return{use_existing_jquery:function(){return use_existing_jquery;},library_tolerance:function(){return library_tolerance;},finish:function(){if(!f){f=true;var a=d.getElementById('_vis_opt_path_hides');if(a)a.parentNode.removeChild(a);}},finished:function(){return f;},load:function(a){var b=d.createElement('script');b.src=a;b.type='text/javascript';b.innerText;b.onerror=function(){_vwo_code.finish();};d.getElementsByTagName('head')[0].appendChild(b);},init:function(){settings_timer=setTimeout('_vwo_code.finish()',settings_tolerance);var a=d.createElement('style'),b='body{opacity:0 !important;filter:alpha(opacity=0) !important;background:none !important;}',h=d.getElementsByTagName('head')[0];a.setAttribute('id','_vis_opt_path_hides');a.setAttribute('type','text/css');if(a.styleSheet)a.styleSheet.cssText=b;else a.appendChild(d.createTextNode(b));h.appendChild(a);this.load('//dev.visualwebsiteoptimizer.com/j.php?a='+account_id+'&u='+encodeURIComponent(d.URL)+'&r='+Math.random());return settings_timer;}};}());_vwo_settings_timer=_vwo_code.init();
    </script>
    <!-- End Visual Website Optimizer Asynchronous Code-->
    <meta name="csrf-param" content="authenticity_token">
    <meta name="csrf-token" content="+1YrHMxFmGXge3H+IXjZd1A5P6be9nUYqZGiqeBa7g4XLRGnUQnLb9IdSwczVL2kLLk5qwQ7smxNccv5iLUxNw==">
    <meta content="A1DNrkQPSNfUO07aAK-VjBqrSoFDU2JgDzmvKlN3XqA" name="google-site-verification">
  </head>
  <body class="body">
    <script>var dataLayer = [];</script>
    <!-- Google Tag Manager-->
    <noscript>
      <iframe src="//www.googletagmanager.com/ns.html?id=GTM-WWVX9V" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <script>
      (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-WWVX9V');
    </script>
    <!-- End Google Tag Manager-->
    
    <!-- container -->
    <div role="container" class="container">
      <!-- load menu -->
      <?php $this->load->view($menu);?>
      <!-- load body -->
      <?php $this->load->view($content);?>
    </div>
    <!-- end container -->

    <!-- footer -->
    <div class="footer">
      <?php $this->load->view('form_footer');?>
    </div>
    <!-- end footer -->

    <div role="modal" class="modal">
      <div class="modal-dialog">
        <div role="modalContent" class="modal-content"></div>
      </div>
    </div>
    <script>
      $(document).ready(function() {
      new Views.Home.Index($('@container'))
      });
    </script>
    <!-- Yandex.Metrika counter-->
    <script type="text/javascript">
      (function (d, w, c) {
      (w[c] = w[c] || []).push(function() {
      try {
      w.yaCounter31757701 = new Ya.Metrika({
      id:31757701,
      clickmap:true,
      trackLinks:true,
      accurateTrackBounce:true,
      webvisor:true
      });
      } catch(e) { }
      });
      var n = d.getElementsByTagName("script")[0],
      s = d.createElement("script"),
      f = function () { n.parentNode.insertBefore(s, n); };
      s.type = "text/javascript";
      s.async = true;
      s.src = "https://mc.yandex.ru/metrika/watch.js";
      if (w.opera == "[object Opera]") {
      d.addEventListener("DOMContentLoaded", f, false);
      } else { f(); }
      })(document, window, "yandex_metrika_callbacks");
    </script>
    <noscript>
      <div><img src="https://mc.yandex.ru/watch/31757701" style="position:absolute; left:-9999px;" alt=""></div>
    </noscript>
    <!-- /Yandex.Metrika counter-->
    <!-- Yandex.Metrika counter-->
    <script type="text/javascript">
      (function (d, w, c) {
      (w[c] = w[c] ||[]).push(function() {
      try {
      w.yaCounter39859555 = new Ya.Metrika({
      id:39859555,
      clickmap:true,
      trackLinks:true,
      accurateTrackBounce:true,
      webvisor:true
      });
      } catch(e) { }
      });
      var n =d.getElementsByTagName("script")[0],
      s = d.createElement("script"),
      f = function () { n.parentNode.insertBefore(s, n); };
      s.type ="text/javascript";
      s.async = true;
      s.src = "https://mc.yandex.ru/metrika/watch.js";
      if (w.opera =="[object Opera]") {
      d.addEventListener("DOMContentLoaded", f, false);
      } else { f(); }
      })(document, window,"yandex_metrika_callbacks");
    </script>
    <noscript>
      <div><img src="https://mc.yandex.ru/watch/39859555" style="position:absolute; left:-9999px;" alt=""></div>
    </noscript>
    <!-- /Yandex.Metrika counter-->
  </body>
</html>