<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimal-ui"/>
	<meta name="apple-mobile-web-app-capable" content="yes"/>
	<meta name="apple-mobile-web-app-status-bar-style" content="black"/>
	<meta name="format-detection" content="telephone=no, email=no"/>
	<meta charset="UTF-8">
	<title>设置</title>
	<link rel="stylesheet" href="/Public/Home/css/core.css">
	<link rel="stylesheet" href="/Public/Home/css/icon.css">
	<link rel="stylesheet" href="/Public/Home/css/home.css">
	<link rel="icon" type="image/x-icon" href="favicon.ico">
	<link href="iTunesArtwork@2x.png" sizes="114x114" rel="apple-touch-icon-precomposed">

</head>
<body style="background:#f0f0f0">

	<header class="aui-header-default aui-header-fixed aui-header-bg">
		<a href="javascript:history.back(-1)" class="aui-header-item">
			<i class="aui-icon aui-icon-back-white"></i>
		</a>
		<div class="aui-header-center aui-header-center-clear">
			<div class="aui-header-center-logo">
				<div class="aui-car-white-Typeface">设置</div>
			</div>
		</div>
		<a href="#" class="aui-header-item-icon"   style="min-width:0">
			<i class="aui-icon aui-icon-share-pd"></i>
		</a>
	</header>

	<section class="aui-myOrder-content">
		<div class="aui-product-set">

			<a href="#" class="aui-address-cell aui-fl-arrow aui-fl-arrow-clear" data-ydui-actionsheet="{target:'#actionSheet',closeElement:'#cancel'}">
				<div class="aui-address-cell-bd">个人信息</div>
				<div class="aui-address-cell-ft"></div>
			</a>
			<a href="my-address.html" class="aui-address-cell aui-fl-arrow aui-fl-arrow-clear" data-ydui-actionsheet="{target:'#actionSheet',closeElement:'#cancel'}">
				<div class="aui-address-cell-bd">我的实名认证</div>
				<div class="aui-address-cell-ft"></div>
			</a>
			<a href="my-address.html" class="aui-address-cell aui-fl-arrow aui-fl-arrow-clear" data-ydui-actionsheet="{target:'#actionSheet',closeElement:'#cancel'}">
				<div class="aui-address-cell-bd">我的收货地址</div>
				<div class="aui-address-cell-ft"></div>
			</a>
			<a href="#" class="aui-address-cell aui-fl-arrow aui-fl-arrow-clear" data-ydui-actionsheet="{target:'#actionSheet',closeElement:'#cancel'}">
				<div class="aui-address-cell-bd">消息推送设置</div>
				<div class="aui-address-cell-ft"></div>
			</a>
			<a href="#" class="aui-address-cell aui-fl-arrow aui-fl-arrow-clear" data-ydui-actionsheet="{target:'#actionSheet',closeElement:'#cancel'}">
				<div class="aui-address-cell-bd">清除缓存</div>
				<div class="aui-address-cell-ft"></div>
			</a>
			<a href="#" class="aui-address-cell aui-fl-arrow aui-fl-arrow-clear" data-ydui-actionsheet="{target:'#actionSheet',closeElement:'#cancel'}">
				<div class="aui-address-cell-bd">弹幕设置</div>
				<div class="aui-address-cell-ft"></div>
			</a>
			<div class="aui-dri"></div>
			<a href="#" class="aui-address-cell aui-fl-arrow aui-fl-arrow-clear" data-ydui-actionsheet="{target:'#actionSheet',closeElement:'#cancel'}">
				<div class="aui-address-cell-bd">关于我们</div>
				<div class="aui-address-cell-ft">v5.0</div>
			</a>
		</div>
		<div class="aui-out">
			<a href="<?php echo U('Login/set');?>">退出当前账号</a>
		</div>
	</section>


	<script type="text/javascript" src="/Public/Home/js/jquery.min.js"></script>
	<script type="text/javascript" src="/Public/Home/js/aui.js"></script>


</body>
</html>