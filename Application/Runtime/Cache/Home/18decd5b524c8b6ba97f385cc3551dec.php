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
	<style>
		.n-tabs {
			position: fixed;
			top:44px;
			left: 0;
			width: 100%;
			height: 41px;
			overflow: hidden;
			z-index: 1000;
			background-color: #fff;
			box-shadow: 0 0 10PX 0PX rgba(155,143,143,0.6);
			-webkit-box-shadow: 0 0 10PX 0PX rgba(155,143,143,0.6);
			-moz-box-shadow: 0 0 10PX 0PX rgba(155,143,143,0.6);
		}
		.n-tabs .edge {
			position: fixed;
			top: 0;
			height: 41px;
			width: 100%;
			border-bottom: 1px solid #e5e5e5;
		}
		.n-tabs .n-tabContainer {
			-webkit-overflow-scrolling: touch;
			position: relative;
			top: 0;
			left: 0;
			overflow-x: auto;
			overflow-y: hidden;
			padding-left: 16px;
			height: 51px;
			font-size: 14px;
			color: #333;
			white-space: nowrap;
		}
		.n-tabs .n-tabContainer .navtab {
			display: -webkit-box;
			display: -webkit-flex;
			display: flex;
		}

		.n-tabs .n-tabContainer .n-tabItem {
			-webkit-box-flex: 1;
			-webkit-flex-grow: 1;
			flex-grow: 1;
			-webkit-flex-shrink: 0;
			flex-shrink: 0;
			display: inline-block;
			height: 41px;
			line-height: 41px;
			text-align: center;
			margin-left: 20px;
		}
		.n-tabs .n-tabContainer .n-tabItem:first-child {
			margin-left: 0;
		}
		.n-tabs .n-tabContainer .n-tabItem .current {
			display: inline-block;
			height: 41px;
			border-bottom: 2px solid #e31436;
			color: #e31436;
		}
	</style>
</head>
<body style="background:#eee">
	<header class="aui-header-default aui-header-fixed aui-header-bg">
		<a href="javascript:history.back(-1)" class="aui-header-item">
			<i class="aui-icon aui-icon-back-white"></i>
		</a>
		<div class="aui-header-center aui-header-center-clear">
			<div class="aui-header-center-logo">
				<div class="aui-car-white-Typeface">商品分类</div>
			</div>
		</div>
		<a href="#" class="aui-header-item-icon"   style="min-width:0">
			<i class="aui-icon aui-icon-search"></i>
		</a>
	</header>
	<section class="n-tabs">
		<ul class="n-tabContainer" id="auto-id-1509603311057">
			<li class="n-tabItem type" data-id="homepage" >
				<a href="javascript:;" id="<?php echo ($type[0]['id']); ?>" class="current"><?php echo ($type[0]['tname']); ?></a>
			</li>
			<?php if(is_array($types)): foreach($types as $key=>$t): ?><li class="n-tabItem type" data-id="44114" >
					<a href="javascript:;" id="<?php echo ($t["id"]); ?>" class=""><?php echo ($t["tname"]); ?></a>
				</li><?php endforeach; endif; ?>
		</ul>
	</section>
	<section class="aui-Purchase-content">
		<div class="aui-list-product-box aui-list-product-box-clear" id="con">
			<?php if(is_array($data)): foreach($data as $key=>$d): ?><a href="javascript:;" class="aui-list-product-item">
					<div class="aui-list-product-item-img">
						<img src="/Public/Home/img/pd/sf-8.jpg" alt="">
					</div>
					<div class="aui-list-product-item-text">
						<h3><?php echo ($d["goodsname"]); ?></h3>
						<div class="aui-list-product-mes-box">
							<div>
								<span class="aui-list-product-item-price">
									<em>¥</em>
									<?php echo ($d["sale"]); ?>
								</span>
								<span class="aui-list-product-item-del-price">
									¥<?php echo ($d["price"]); ?>
								</span>
							</div>
							<div class="aui-comment">已销售<?php echo ($d["soldnum"]); ?>件</div>
						</div>
					</div>
				</a><?php endforeach; endif; ?>
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

			/*
			 $tab.find('.tab-nav-item').on('open.ydui.tab', function (e) {
			 console.log('索引：%s - [%s]正在打开', e.index, $(this).text());
			 });
			 */

            $tab.find('.tab-nav-item').on('opened.ydui.tab', function (e) {
                console.log('索引：%s - [%s]已经打开了', e.index, $(this).text());
            });
        }(jQuery);

        //上边分类的改变
        //点击
        $(document).ready(function(){
            $(".type a").click(function() {
                $(".type a").removeClass("current");
                $(this).addClass("current");
                id=$(this).attr('id');
                $.get("<?php echo U('typeinfo');?>",{'id':id},function(res){
                    var dataObj = res, //返回的result为json格式的数据
						 con = "";
                    $.each(dataObj, function(index, item){
                        con += '<a href="javascript:;" class="aui-list-product-item">';
                        con += '<div class="aui-list-product-item-img">';
                        con += '<img src="/Public/Home/img/pd/sf-8.jpg" alt="">';
                        con += '</div>';
                        con += '<div class="aui-list-product-item-text">';
                        con += '<h3>'+item.goodsname+'</h3>';
                        con += '<div class="aui-list-product-mes-box">';
                        con += '<div>';
                        con += '<span class="aui-list-product-item-price">';
                        con += '<em>¥</em>';
                        con += item.sale;
                        con += '</span>';
                        con += ' <span class="aui-list-product-item-del-price">¥';
                        con += item.price;
                        con += '</span>';
                        con += '</div>';
                        con += '<div class="aui-comment">已销售'+item.soldnum+'件</div>';
                        con += '</div>';
                        con += '</div>';
                        con += '</a>';
					});
                    //console.log(con);  //可以在控制台打印一下看看，这是拼起来的标签和数据
                    $("#con").html(con); //把内容入到这个div中即完成
            	})
            })
        });

	</script>

</body>
</html>