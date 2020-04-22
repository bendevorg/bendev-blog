<!DOCTYPE html>
<html <?php language_attributes() ?>>
  <head>

    <meta name="viewport" content="initial-scale=1.0">

    <?php // Google Optimize Anti-flicker snippet ?>
    <style>.async-hide { opacity: 0 !important} </style>
    <script>(function(a,s,y,n,c,h,i,d,e){s.className+=' '+y;h.start=1*new Date;
    h.end=i=function(){s.className=s.className.replace(RegExp(' ?'+y),'')};
    (a[n]=a[n]||[]).hide=h;setTimeout(function(){i();h.end=null},c);h.timeout=c;
    })(window,document.documentElement,'async-hide','dataLayer',4000,
    {'GTM-K2TTKPB':true});</script>

    <?php
      wp_register_script('bendev-bundle', asset_bust('index', 'js'), [], null);
      wp_enqueue_script('bendev-bundle');

      wp_register_style('bendev-style', asset_bust('index', 'css'), [], null);
      wp_enqueue_style('bendev-style');
    ?>
    <?php wp_head() ?>
    <script>analytics.page();</script>
  </head>