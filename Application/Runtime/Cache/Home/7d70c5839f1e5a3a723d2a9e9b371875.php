<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimal-ui"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
    <meta name="format-detection" content="telephone=no, email=no"/>
    <meta charset="UTF-8">
    <title>收银台</title>
    <link rel="stylesheet" href="/Public/Home/css/core.css">
    <link rel="stylesheet" href="/Public/Home/css/icon.css">
    <link rel="stylesheet" href="/Public/Home/css/home.css">
    <link rel="icon" type="image/x-icon" href="/Public/Home/favicon.ico">
    <link href="/Public/Home/iTunesArtwork@2x.png" sizes="114x114" rel="apple-touch-icon-precomposed">
</head>
<body>

<header class="aui-header-default aui-header-fixed aui-header-bg">
    <a href="javascript:history.back(-1)" class="aui-header-item">
        <i class="aui-icon aui-icon-back-white"></i>
    </a>
    <div class="aui-header-center aui-header-center-clear">
        <div class="aui-header-center-logo">
            <div class="aui-car-white-Typeface">收银台</div>
        </div>
    </div>
    <a href="#" class="aui-header-item-icon"   style="min-width:0">
        <i class="aui-icon aui-icon-member"></i>
    </a>
</header>

<section class="aui-settle-content">
    <div class="aui-settle-title">
        <input type="hidden" name="ordersn" value="<?php echo ($ordersn); ?>">
        <p>需要支付:    <span><?php echo ($total); ?>元</span></p>
    </div>
    <div class="aui-settle-pay">
        <img src="/Public/Home/img/icon/pay.png" alt="" style="width:90px;height: 36px">
    </div>
    <div class="aui-dri"></div>
    <div class="aui-settle-choice">
        <a href="#" class="aui-address-cell  aui-fl-arrow-clear">
            <div class="aui-address-cell-hd">
                <img src="/Public/Home/img/icon/apy-1.png" alt="">
            </div>
            <div class="aui-address-cell-bd">
                工商银行
                <p>储蓄卡（8890）</p>
            </div>
            <div class="aui-address-cell-ft"><span>每单最高减111</span>&nbsp;&nbsp;<input type="checkbox" name="gs" class="check check-pay goods-check goodsCheck" checked="checked"></div>
        </a>
        <a href="#" class="aui-address-cell  aui-fl-arrow-clear">
            <div class="aui-address-cell-hd">
                <img src="/Public/Home/img/icon/apy-2.png" alt="">
            </div>
            <div class="aui-address-cell-bd">
                农业银行
                <p>储蓄卡（5678）</p>
            </div>
            <div class="aui-address-cell-ft"><input type="checkbox" name="ny" class="check check-pay goods-check goodsCheck" ></div>
        </a>
        <a href="#" class="aui-address-cell  aui-fl-arrow-clear">
            <div class="aui-address-cell-hd">
                <img src="/Public/Home/img/icon/apy-3.png" alt="">
            </div>
            <div class="aui-address-cell-bd">
                招商银行
                <p>储蓄卡（8890）</p>
            </div>
            <div class="aui-address-cell-ft"><input type="checkbox" name="gs" class="check check-pay goods-check goodsCheck"></div>
        </a>
    </div>
    <div class="aui-settle-ways">
        其它支付方式
    </div>
    <div class="aui-settle-choice">
        <a href="#" class="aui-address-cell  aui-fl-arrow-clear">
            <div class="aui-address-cell-hd">
                <img src="/Public/Home/img/icon/apy-4.png" alt="">
            </div>
            <div class="aui-address-cell-bd">
                支付宝支付
                <p>支付宝安全支付</p>
            </div>
            <div class="aui-address-cell-ft"><span>花呗分期</span>&nbsp;&nbsp;<input type="checkbox" class="check check-pay goods-check goodsCheck"></div>
        </a>
        <a href="#" class="aui-address-cell  aui-fl-arrow-clear">
            <div class="aui-address-cell-hd">
                <img src="/Public/Home/img/icon/apy-5.png" alt="">
            </div>
            <div class="aui-address-cell-bd">
                微信支付
                <p>微信安全支付</p>
            </div>
            <div class="aui-address-cell-ft"><input type="checkbox" class="check check-pay goods-check goodsCheck" ></div>
        </a>
        <a href="#" class="aui-address-cell  aui-fl-arrow-clear">
            <div class="aui-address-cell-hd">
                <img src="/Public/Home/img/icon/apy-6.png" alt="">
            </div>
            <div class="aui-address-cell-bd">
                Apple Pay
                <p>Apple Pay专属安全支付</p>
            </div>
            <div class="aui-address-cell-ft"><input type="checkbox" class="check check-pay goods-check goodsCheck"></div>
        </a>
    </div>
</section>
<div class="aui-settle-payment">
    <a href="<?php echo U('successorder','ordersn=');?>">银行卡支付 <?php echo ($total); ?> 元</a>
</div>

</body>
</html>