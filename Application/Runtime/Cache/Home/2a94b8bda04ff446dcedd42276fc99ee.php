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
<title>优购优品网</title>
</head>
<body>

	<header class="aui-header-default aui-header-fixed aui-header-bg">
		<a href="#" class="aui-header-item">
			<i class="aui-icon aui-icon-code"></i>
		</a>
		<div class="aui-header-center aui-header-center-clear">
			<div class="aui-header-search-box">
				<!--<i class="aui-icon aui-icon-small-search"></i>-->
                <form method="post" action="<?php echo U('Index/index');?>">
				<input id="" type="text"  placeholder="iphonex 手机钢化膜" class="aui-header-search" name="goodsname">
                <input type="submit" name="" style="color:transparent; border: 0px solid #000" class="aui-icon aui-icon-small-search">
                </form>
			</div>
		</div>
		<a href="#" class="aui-header-item-icon">
			<i class="aui-icon aui-icon-packet"></i>
			<i class="aui-icon aui-icon-member"></i>
		</a>
	</header>
	<div class="aui-content-box">
		<div class="aui-banner-content aui-fixed-top" data-aui-slider>
			<div class="aui-banner-wrapper">
                <?php if(is_array($goods)): foreach($goods as $key=>$v): ?><div class="aui-banner-wrapper-item">
						<img src="/Public/Home/img/banner/<?php echo ($v["ad_pic"]); ?>">
				</div><?php endforeach; endif; ?>
			</div>
			<div class="aui-banner-pagination"></div>
		</div>
		<section class="aui-grid-content">
			<div class="aui-grid-row">
				<a href="my-sign.html" class="aui-grid-row-item">
					<i class="aui-icon-large aui-icon-sign"></i>
					<p class="aui-grid-row-label">每日签到</p>
				</a>
				<a href="<?php echo U('Home/MyTime/index');?>" class="aui-grid-row-item">
					<i class="aui-icon-large aui-icon-time"></i>
					<p class="aui-grid-row-label">限时抢购</p>
				</a>
				<a href="my-membership.html" class="aui-grid-row-item">
					<i class="aui-icon-large aui-icon-vip"></i>
					<p class="aui-grid-row-label">会员专享</p>
				</a>
				<a href="my-purchase.html" class="aui-grid-row-item">
					<i class="aui-icon-large aui-icon-group"></i>
					<p class="aui-grid-row-label">好货拼团</p>
				</a>
				<a href="my-invitation.html" class="aui-grid-row-item">
					<i class="aui-icon-large aui-icon-share"></i>
					<p class="aui-grid-row-label">分享领券</p>
				</a>
			</div>
		</section>
		<div class="aui-avd-content clearfix">
			<a href="#">
				<img src="/Public/Home/img/pd/cf-1.jpg" alt="">
			</a>
			<a href="#">
				<img src="/Public/Home/img/pd/cf-3.jpg" alt="">
			</a>
		</div>
		<div class="aui-slide-box aui-slide-box-clear">
			<div class="aui-slide-list">
				<ul class="aui-slide-item-list">
					<li class="aui-slide-item-item">
                        <!--食品-->
						<a href="<?php echo U('Type/index');?>?tid=5" class="v-link">
							<img class="v-img" src="/Public/Home/img/ad/tou-1.jpg">
						</a>

					</li>
					<li class="aui-slide-item-item">
                        <!--家电-->
						<a href="<?php echo U('Type/index');?>?tid=7" class="v-link">
							<img class="v-img" src="/Public/Home/img/ad/tou-2.jpg">
						</a>
					</li>
					<li class="aui-slide-item-item">
                        <!--母婴-->
						<a href="<?php echo U('Type/index');?>?tid=2" class="v-link">
							<img class="v-img" src="/Public/Home/img/ad/tou-3.jpg">
						</a>
					</li>
					<li class="aui-slide-item-item">
                        <!--数码-->
						<a href="<?php echo U('Type/index');?>?tid=7" class="v-link">
							<img class="v-img" src="/Public/Home/img/ad/tou-4.jpg">
						</a>
					</li>
					<li class="aui-slide-item-item">
                        <!--好书-->
						<a href="<?php echo U('Type/index');?>?tid=59" class="v-link">
							<img class="v-img" src="/Public/Home/img/ad/tou-5.jpg">
						</a>
					</li>
					<li class="aui-slide-item-item">
                        <!--户外-->
						<a href="<?php echo U('Type/index');?>?tid=8" class="v-link">
							<img class="v-img" src="/Public/Home/img/ad/tou-6.jpg">
						</a>
					</li>
				</ul>
			</div>

		</div>
		<div class="aui-dri"></div>
		<div class="aui-list-content">
			<div class="aui-list-item">
                <?php if(is_array($goodsa)): foreach($goodsa as $key=>$v): ?><div class="aui-list-item-img">
					<img src="/Public/Upload/goods/<?php echo ($v["ad_pic"]); ?>" alt="">
				</div><?php endforeach; endif; ?>
                <div class="aui-slide-box">
                    <div class="aui-slide-list">
                        <ul class="aui-slide-item-list">

                            <!--一层-->
                            <?php if(is_array($goods_info)): foreach($goods_info as $key=>$v): ?><li class="aui-slide-item-item">
                                <a href="<?php echo U('Index/goodsdata');?>?id=<?php echo ($v["id"]); ?>" class="v-link">
                                    <img class="v-img" src="/Public/Upload/goods/<?php echo ($v["pic"]); ?>">
                                    <p class="aui-slide-item-title aui-slide-item-f-els"><?php echo ($v["goodsname"]); ?></p>
                                    <p class="aui-slide-item-info">
                                        <span class="aui-slide-item-price">¥<?php echo ($v["sale"]); ?></span>&nbsp;&nbsp;<span class="aui-slide-item-mrk">¥<?php echo ($v["price"]); ?></span>
                                    </p>
                                </a>
                            </li><?php endforeach; endif; ?>
                        </ul>
                    </div>

                </div>
            </div>
			<div class="aui-list-item">
                <?php if(is_array($goodsad)): foreach($goodsad as $key=>$v): ?><div class="aui-list-item-img">
					<img src="/Public/Upload/goods/<?php echo ($v["ad_pic"]); ?>" alt="">
				</div><?php endforeach; endif; ?>
				<div class="aui-slide-box">
					<div class="aui-slide-list">
						<ul class="aui-slide-item-list">
                            <!--二层-->
                            <?php if(is_array($goodsy)): foreach($goodsy as $key=>$v): ?><li class="aui-slide-item-item">
								<a href="<?php echo U('Index/goodsdata');?>?id=<?php echo ($v["id"]); ?>" class="v-link">
									<img class="v-img" src="/Public/Upload/goods/<?php echo ($v["pic"]); ?>">
									<p class="aui-slide-item-title aui-slide-item-f-els"><?php echo ($v["goodsname"]); ?></p>
									<p class="aui-slide-item-info">
										<span class="aui-slide-item-price">¥<?php echo ($v["sale"]); ?></span>&nbsp;&nbsp;<span class="aui-slide-item-mrk">¥<?php echo ($v["price"]); ?></span>
									</p>
								</a>
							</li><?php endforeach; endif; ?>
						</ul>
					</div>

				</div>
			</div>
			<div class="aui-list-item">
                <?php if(is_array($goodsadd)): foreach($goodsadd as $key=>$v): ?><div class="aui-list-item-img">
					<img src="/Public/Upload/goods/<?php echo ($v["ad_pic"]); ?>" alt="">
				</div><?php endforeach; endif; ?>
				<div class="aui-slide-box">
					<div class="aui-slide-list">
						<ul class="aui-slide-item-list">
                            <!--三层-->
                            <?php if(is_array($goodsyf)): foreach($goodsyf as $key=>$v): ?><li class="aui-slide-item-item">
								<a href="<?php echo U('Index/goodsdata');?>?id=<?php echo ($v["id"]); ?>" class="v-link">
									<img class="v-img" src="/Public/Upload/goods/<?php echo ($v["pic"]); ?>">
									<p class="aui-slide-item-title aui-slide-item-f-els"><?php echo ($v["goodsname"]); ?></p>
									<p class="aui-slide-item-info">
										<span class="aui-slide-item-price">¥<?php echo ($v["sale"]); ?></span>&nbsp;&nbsp;<span class="aui-slide-item-mrk">¥<?php echo ($v["price"]); ?></span>
									</p>
								</a>
							</li><?php endforeach; endif; ?>
						</ul>
					</div>

				</div>
			</div>
			<div class="aui-list-item">
                <?php if(is_array($goodsaddd)): foreach($goodsaddd as $key=>$v): ?><div class="aui-list-item-img">
					<img src="/Public/Upload/goods/<?php echo ($v["ad_pic"]); ?>" alt="">
				</div><?php endforeach; endif; ?>
				<div class="aui-slide-box">
					<div class="aui-slide-list">
						<ul class="aui-slide-item-list">
                            <!--四层-->
                            <?php if(is_array($goodssf)): foreach($goodssf as $key=>$v): ?><li class="aui-slide-item-item">
								<a href="<?php echo U('Index/goodsdata');?>?id=<?php echo ($v["id"]); ?>" class="v-link">
									<img class="v-img" src="/Public/Upload/goods/<?php echo ($v["pic"]); ?>">
									<p class="aui-slide-item-title aui-slide-item-f-els"><?php echo ($v["goodsname"]); ?></p>
									<p class="aui-slide-item-info">
										<span class="aui-slide-item-price">¥<?php echo ($v["sale"]); ?></span>&nbsp;&nbsp;<span class="aui-slide-item-mrk">¥<?php echo ($v["price"]); ?></span>
									</p>
								</a>
							</li><?php endforeach; endif; ?>
						</ul>
					</div>

				</div>
			</div>
		</div>
		<div class="aui-recommend">
			<img src="/Public/Home/img/bg/icon-tj1.jpg" alt="">
			<!--<h2>为你推荐</h2>-->
		</div>
		<section class="aui-list-product">
			<div class="aui-list-product-box">
                <!--五层-->
                <?php if(is_array($goodsList)): foreach($goodsList as $key=>$v): ?><a href="<?php echo U('Index/goodsdata');?>?id=<?php echo ($v["id"]); ?>" class="aui-list-product-item">
					<div class="aui-list-product-item-img">
						<img src="/Public/Upload/goods/<?php echo ($v["pic"]); ?>" alt="">
					</div>
					<div class="aui-list-product-item-text">
						<h3><?php echo ($v["goodsname"]); ?></h3>
						<div class="aui-list-product-mes-box">
							<div>
							<span class="aui-list-product-item-price">
								<em>¥</em>
								<?php echo ($v["sale"]); ?>
							</span>
								<span class="aui-list-product-item-del-price">
								¥<?php echo ($v["price"]); ?>
							</span>
							</div>
							<div class="aui-comment">986评论</div>
						</div>
					</div>
				</a><?php endforeach; endif; ?>
			</div>
		</section>
	</div>

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
    <a href="<?php echo U('Shopping/shopping');?>" class="aui-footer-item">
        <span class="aui-footer-item-icon aui-icon aui-footer-icon-car"></span>
        <span class="aui-footer-item-text">购物车</span>
    </a>
    <a href="<?php echo U('Personal/index');?>" class="aui-footer-item">
        <span class="aui-footer-item-icon aui-icon aui-footer-icon-me"></span>
        <span class="aui-footer-item-text">我的</span>
    </a>
</footer>

	<footer class="aui-footer-default aui-footer-fixed">
		<a href="index.html" class="aui-footer-item aui-footer-active">
			<span class="aui-footer-item-icon aui-icon aui-footer-icon-home"></span>
			<span class="aui-footer-item-text">首页</span>
		</a>
		<a href="<?php echo U('Type/index');?>" class="aui-footer-item">
			<span class="aui-footer-item-icon aui-icon aui-footer-icon-class"></span>
			<span class="aui-footer-item-text">分类</span>
		</a>
		<a href="{<?php echo U('Find/index');?>}" class="aui-footer-item">
			<span class="aui-footer-item-icon aui-icon aui-footer-icon-find"></span>
			<span class="aui-footer-item-text">发现</span>
		</a>
		<a href="<?php echo U('Home/shopping/shopping');?>" class="aui-footer-item">
			<span class="aui-footer-item-icon aui-icon aui-footer-icon-car"></span>
			<span class="aui-footer-item-text">购物车</span>
		</a>
		<a href="<?php echo U('Personal/index');?>" class="aui-footer-item">
			<span class="aui-footer-item-icon aui-icon aui-footer-icon-me"></span>
			<span class="aui-footer-item-text">我的</span>
		</a>
	</footer>

	<script type="text/javascript" src="/Public/Home/js/jquery.min.js"></script>
	<script type="text/javascript" src="/Public/Home/js/aui.js"></script>
</body>
</html>