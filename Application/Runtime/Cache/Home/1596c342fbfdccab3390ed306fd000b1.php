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
	<title>限时抢购</title>
</head>
<body>

	<header class="aui-header-default aui-header-fixed aui-header-bg">
		<a href="javascript:history.back(-1)" class="aui-header-item">
			<i class="aui-icon aui-icon-back-white"></i>
		</a>
		<div class="aui-header-center aui-header-center-clear">
			<div class="aui-header-center-logo">
				<div class="aui-car-white-Typeface">限时抢购</div>
			</div>
		</div>
		<a href="#" class="aui-header-item-icon"   style="min-width:0">
			<i class="aui-icon aui-icon-search"></i>
		</a>
	</header>

	<section class="aui-myOrder-content">
		<div class="m-tab demo-small-pitch aui-Time-list" data-ydui-tab>
			<div class="aui-myOrder-fix">
				<ul class="tab-nav">
					<li class="tab-nav-item tab-active">
						<a href="javascript:;">
							<span>00:00</span>
							<em>已开抢</em>
						</a>
					</li>
					<li class="tab-nav-item">
						<a href="javascript:;">
							<span>07:00</span>
							<em>已开抢</em>
						</a>
					</li>
					<li class="tab-nav-item">
						<a href="javascript:;">
							<span>09:00</span>
							<em>已开抢</em>
						</a>
					</li>
					<li class="tab-nav-item">
						<a href="javascript:;">
							<span>13:00</span>
							<em>抢购中</em>
						</a>
					</li>
					<li class="tab-nav-item">
						<a href="javascript:;">
							<span>17:00</span>
							<em>即将开抢</em>
						</a>
					</li>
				</ul>
			</div>
			<div class="aui-prompt"><i class="aui-icon aui-prompt-sm"></i>还有商品的哦！可以继续抢购的哦！</div>
			<div class="tab-panel">
				<!--0点开抢-->
				<div class="tab-panel-item tab-active">
					<ul>
						<?php if(is_array($goods)): foreach($goods as $key=>$g): if($g['buytime'] == 0): ?><li>
									<div class="aui-list-title-info">
										<a href="javascript:;" class="aui-list-product-fl-item">
											<div class="aui-list-product-fl-img">
												<img src="/Public/Upload/goods/<?php echo ($g["pic"]); ?>" alt="">
											</div>
											<div class="aui-list-product-fl-text">
												<h3 class="aui-list-product-fl-title"><?php echo ($g["goodsname"]); ?></h3>
												<div class="aui-list-product-fl-mes">
													<div>
											<span class="aui-list-product-item-price">
												<em>¥</em>
												<?php echo ($g["buyprice"]); ?>
											</span>
														<span class="aui-list-product-item-del-price">
												¥<?php echo ($g["price"]); ?>
											</span>
													</div>
													<div class="aui-btn-purchase">
														仅剩<?php echo ($g["buynum"]); ?>件
													</div>
												</div>
											</div>
										</a>
									</div>
									<div class="aui-list-title-btn">
										<a href="<?php echo U('goodinfo');?>?id=<?php echo ($g["id"]); ?>" class="red-color">马上抢购</a>
									</div>
								</li><?php endif; endforeach; endif; ?>
					</ul>
				</div>
				<!--7点开抢-->
				<div class="tab-panel-item ">
					<ul>
						<?php if(is_array($goods)): foreach($goods as $key=>$g): if($g['buytime'] == 7): ?><li>
									<div class="aui-list-title-info">
										<a href="javascript:;" class="aui-list-product-fl-item">
											<div class="aui-list-product-fl-img">
												<img src="/Public/Upload/goods/<?php echo ($g["pic"]); ?>" alt="">
											</div>
											<div class="aui-list-product-fl-text">
												<h3 class="aui-list-product-fl-title"><?php echo ($g["goodsname"]); ?></h3>
												<div class="aui-list-product-fl-mes">
													<div>
											<span class="aui-list-product-item-price">
												<em>¥</em>
												<?php echo ($g["buyprice"]); ?>
											</span>
														<span class="aui-list-product-item-del-price">
												¥<?php echo ($g["price"]); ?>
											</span>
													</div>
													<div class="aui-btn-purchase">
														仅剩<?php echo ($g["buynum"]); ?>件
													</div>
												</div>
											</div>
										</a>
									</div>
									<div class="aui-list-title-btn">
										<a href="<?php echo U('goodinfo');?>?id=<?php echo ($g["id"]); ?>" class="red-color">马上抢购</a>
									</div>
								</li><?php endif; endforeach; endif; ?>
					</ul>
				</div>
				<!--9点开抢-->
				<div class="tab-panel-item ">
					<ul>
						<?php if(is_array($goods)): foreach($goods as $key=>$g): if($g['buytime'] == 9): ?><li>
									<div class="aui-list-title-info">
										<a href="javascript:;" class="aui-list-product-fl-item">
											<div class="aui-list-product-fl-img">
												<img src="/Public/Upload/goods/<?php echo ($g["pic"]); ?>" alt="">
											</div>
											<div class="aui-list-product-fl-text">
												<h3 class="aui-list-product-fl-title"><?php echo ($g["goodsname"]); ?></h3>
												<div class="aui-list-product-fl-mes">
													<div>
											<span class="aui-list-product-item-price">
												<em>¥</em>
												<?php echo ($g["buyprice"]); ?>
											</span>
														<span class="aui-list-product-item-del-price">
												¥<?php echo ($g["price"]); ?>
											</span>
													</div>
													<div class="aui-btn-purchase">
														仅剩<?php echo ($g["buynum"]); ?>件
													</div>
												</div>
											</div>
										</a>
									</div>
									<div class="aui-list-title-btn">
										<a href="<?php echo U('goodinfo');?>?id=<?php echo ($g["id"]); ?>" class="red-color">马上抢购</a>
									</div>
								</li><?php endif; endforeach; endif; ?>
					</ul>
				</div>
				<!--13点开抢-->
				<div class="tab-panel-item ">
					<ul>
						<?php if(is_array($goods)): foreach($goods as $key=>$g): if($g['buytime'] == 13): ?><li>
									<div class="aui-list-title-info">
										<a href="javascript:;" class="aui-list-product-fl-item">
											<div class="aui-list-product-fl-img">
												<img src="/Public/Upload/goods/<?php echo ($g["pic"]); ?>" alt="">
											</div>
											<div class="aui-list-product-fl-text">
												<h3 class="aui-list-product-fl-title"><?php echo ($g["goodsname"]); ?></h3>
												<div class="aui-list-product-fl-mes">
													<div>
											<span class="aui-list-product-item-price">
												<em>¥</em>
												<?php echo ($g["buyprice"]); ?>
											</span>
														<span class="aui-list-product-item-del-price">
												¥<?php echo ($g["price"]); ?>
											</span>
													</div>
													<div class="aui-btn-purchase">
														仅剩<?php echo ($g["buynum"]); ?>件
													</div>
												</div>
											</div>
										</a>
									</div>
									<div class="aui-list-title-btn">
										<a href="<?php echo U('goodinfo');?>?id=<?php echo ($g["id"]); ?>" class="red-color">马上抢购</a>
									</div>
								</li><?php endif; endforeach; endif; ?>
					</ul>
				</div>
				<!--17点开抢-->
				<div class="tab-panel-item ">
					<ul>
						<?php if(is_array($goods)): foreach($goods as $key=>$g): if($g['buytime'] == 17): ?><li>
									<div class="aui-list-title-info">
										<a href="javascript:;" class="aui-list-product-fl-item">
											<div class="aui-list-product-fl-img">
												<img src="/Public/Upload/goods/<?php echo ($g["pic"]); ?>" alt="">
											</div>
											<div class="aui-list-product-fl-text">
												<h3 class="aui-list-product-fl-title"><?php echo ($g["goodsname"]); ?></h3>
												<div class="aui-list-product-fl-mes">
													<div>
											<span class="aui-list-product-item-price">
												<em>¥</em>
												<?php echo ($g["buyprice"]); ?>
											</span>
														<span class="aui-list-product-item-del-price">
												¥<?php echo ($g["price"]); ?>
											</span>
													</div>
													<div class="aui-btn-purchase">
														仅剩<?php echo ($g["buynum"]); ?>件
													</div>
												</div>
											</div>
										</a>
									</div>
									<div class="aui-list-title-btn">
										<a href="<?php echo U('goodinfo');?>?id=<?php echo ($g["id"]); ?>" class="red-color">马上抢购</a>
									</div>
								</li><?php endif; endforeach; endif; ?>
					</ul>
				</div>
			</div>
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