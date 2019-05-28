<?php if (!defined('THINK_PATH')) exit();?>	<!DOCTYPE html>
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
	<title>优购优品网</title>
</head>
<body>

	<header class="aui-header-default aui-header-fixed aui-header-bg">
		<a href="#" class="aui-header-item">
			<i class="aui-icon aui-icon-code"></i>
		</a>
		<div class="aui-header-center aui-header-center-clear">
			<div class="aui-header-search-box">
				<i class="aui-icon aui-icon-small-search"></i>
				<input id="" type="text"  placeholder="iphone8 手机钢化膜" class="aui-header-search">
			</div>
		</div>
		<a href="#" class="aui-header-item-icon">
			<i class="aui-icon aui-icon-packet"></i>
			<i class="aui-icon aui-icon-member"></i>
		</a>
	</header>
	<section class="aui-scroll-contents">
		<div class="aui-scroll-box" data-ydui-scrolltab>
			<!--左边导航栏-->
			<div class="aui-scroll-nav">
				<?php if($typeid): ?><a href="#" class="aui-scroll-item aui-crt">
						<div class="aui-scroll-item-icon"></div>
						<div class="aui-scroll-item-text"><?php echo ($indextype); ?></div>
					</a><?php endif; ?>
				<a href="#" class="aui-scroll-item aui-crt">
					<div class="aui-scroll-item-icon"></div>
					<div class="aui-scroll-item-text">热门推荐</div>
				</a>
				<?php if(is_array($type)): foreach($type as $key=>$v): ?><a href="#" class="aui-scroll-item aui-crt">
						<div class="aui-scroll-item-icon"></div>
						<div class="aui-scroll-item-text"><?php echo ($v["tname"]); ?></div>
					</a><?php endforeach; endif; ?>
			</div>
			<!--左边导航栏-->
			<!--右边导航栏-->
			<div class="aui-scroll-content">
				<?php if($typeid): ?><div class="aui-scroll-content-item">
						<div class="aui-class-img">
							<img src="/Public/Home/img/pd/cf-8.jpg" alt="">
						</div>
						<h2 class="aui-scroll-content-title"><?php echo ($indextype); ?></h2>
						<section class="aui-grid-content">
							<div class="aui-grid-row aui-grid-row-clear">
								<!--商品数据-->
								<?php if(is_array($indexdata)): foreach($indexdata as $key=>$d): ?><a href="<?php echo U('typegoods');?>?id=<?php echo ($d["id"]); ?>" class="aui-grid-row-item">
											<i class="aui-icon-large aui-icon-sign"><img src="/Public/Upload/type/<?php echo ($d["pic"]); ?>" alt=""></i>
											<p class="aui-grid-row-label"><?php echo ($d["tname"]); ?></p>
										</a><?php endforeach; endif; ?>
							</div>
						</section>
					</div><?php endif; ?>
				<div class="aui-scroll-content-item">
					<div class="aui-class-img">
						<img src="/Public/Home/img/pd/cf-4.jpg" alt="">
					</div>
					<h2 class="aui-scroll-content-title">热门推荐</h2>
					<section class="aui-grid-content">
						<div class="aui-grid-row aui-grid-row-clear">
							<!--商品数据-->
							<?php if(is_array($hot)): foreach($hot as $key=>$h): ?><a href="<?php echo U('typegoods');?>?id=<?php echo ($h["id"]); ?>" class="aui-grid-row-item">
									<i class="aui-icon-large aui-icon-sign"><img src="/Public/Upload/type/<?php echo ($h["pic"]); ?>" alt=""></i>
									<p class="aui-grid-row-label"><?php echo ($h["tname"]); ?></p>
								</a><?php endforeach; endif; ?>
						</div>
					</section>
				</div>
				<?php if(is_array($type)): foreach($type as $key=>$v): ?><div class="aui-scroll-content-item">
					<div class="aui-class-img">
						<img src="/Public/Home/img/pd/cf-8.jpg" alt="">
					</div>
					<h2 class="aui-scroll-content-title"><?php echo ($v["tname"]); ?></h2>
					<section class="aui-grid-content">
						<div class="aui-grid-row aui-grid-row-clear">
							<!--商品数据-->
							<?php if(is_array($data)): foreach($data as $key=>$d): if(($d['pid'] == $v['id']) and ($d['type'] == 1)): ?><a href="<?php echo U('typegoods');?>?id=<?php echo ($d["id"]); ?>" class="aui-grid-row-item">
										<i class="aui-icon-large aui-icon-sign"><img src="/Public/Upload/type/<?php echo ($d["pic"]); ?>" alt=""></i>
										<p class="aui-grid-row-label"><?php echo ($d["tname"]); ?></p>
									</a><?php endif; endforeach; endif; ?>
						</div>
					</section>
				</div><?php endforeach; endif; ?>
			</div>
			<!--右边导航栏-->
		</div>
	</section>

	<footer class="aui-footer-default aui-footer-fixed">
    <a href="<?php echo U('Index/index');?>" class="aui-footer-item aui-footer-active">
        <span class="aui-footer-item-icon aui-icon aui-footer-icon-home"></span>
        <span class="aui-footer-item-text">首页</span>
    </a>
    <a href="<?php echo U('Type/index');?>" class="aui-footer-item">
        <span class="aui-footer-item-icon aui-icon aui-footer-icon-class"></span>
        <span class="aui-footer-item-text">分类</span>
    </a>
    <a href="<?php echo U('Find/index');?>" class="aui-footer-item">
        <span class="aui-footer-item-icon aui-icon aui-footer-icon-find"></span>
        <span class="aui-footer-item-text">发现</span>
    </a>
    <a href="<?php echo U('Cart/index');?>" class="aui-footer-item">
        <span class="aui-footer-item-icon aui-icon aui-footer-icon-car"></span>
        <span class="aui-footer-item-text">购物车</span>
    </a>
    <a href="<?php echo U('Personal/index');?>" class="aui-footer-item">
        <span class="aui-footer-item-icon aui-icon aui-footer-icon-me"></span>
        <span class="aui-footer-item-text">我的</span>
    </a>
</footer>
	<script src="/Public/Home/js/jquery.min.js"></script>
	<script src="/Public/Home/js/aui.js"></script>
</body>
</html>