<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimal-ui"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
    <meta name="format-detection" content="telephone=no, email=no"/>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/Public/Home/css/core.css">
    <link rel="stylesheet" href="/Public/Home/css/icon.css">
    <link rel="stylesheet" href="/Public/Home/css/home.css">
    <link rel="icon" type="image/x-icon" href="/Public/Home/favicon.ico">
    <link href="/Public/Home/iTunesArtwork@2x.png" sizes="114x114" rel="apple-touch-icon-precomposed">
    <title>商品推手</title>
</head>
<body style="background:#ec443c">

<header class="aui-header-default aui-header-fixed aui-header-bg">
    <a href="javascript:history.back(-1)" class="aui-header-item">
        <i class="aui-icon aui-icon-back-white"></i>
    </a>
    <div class="aui-header-center aui-header-center-clear">
        <div class="aui-header-center-logo">
            <div class="aui-car-white-Typeface">商品推手</div>
        </div>
    </div>
    <a href="#" class="aui-header-item-icon"   style="min-width:0">
        <i class="aui-icon aui-icon-search"></i>
    </a>
</header>

<section class="aui-myOrder-content">
    <div style="position:relative;margin-top:12px;">
        <img src="/Public/Home/img/bg/icon-jp.png" width="100%" alt="" style="position:absolute; z-index:1;">
        <img src="/Public/code/<?php echo ($img); ?>" alt=""  style="position:absolute; top:408px; left:124px; z-index:2">
    </div>
</section>

<script type="text/javascript" src="/Public/Home/js/jquery.min.js"></script>
<script type="text/javascript" src="/Public/Home/js/aui.js"></script>
<script type="text/javascript" >
    /**
     * Javascript API调用Tab
     */
    !function ($) {
        var $tab = $('#J_Tab');

        $tab.tab({
            nav: '.tab-nav-item',
            panel: '.tab-panel-item',
            activeClass: 'tab-active'
        });
        $tab.find('.tab-nav-item').on('opened.ydui.tab', function (e) {
            console.log('索引：%s - [%s]已经打开了', e.index, $(this).text());
        });
    }(jQuery);
</script>

</body>
</html>