<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimal-ui"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
    <meta name="format-detection" content="telephone=no, email=no"/>
    <meta charset="UTF-8">
    <title>提交订单</title>
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
            <div class="aui-car-white-Typeface">填写订单</div>
        </div>
    </div>
    <a href="#" class="aui-header-item-icon"   style="min-width:0">
        <i class="aui-icon aui-icon-member"></i>
    </a>
</header>
<section class="aui-address-content">
    <div class="aui-address-box">
        <div class="aui-address-box-list">
            <a href="my-addres.html" class="aui-address-box-default">
                <ul>
                    <li>
                        <strong>李嘉华 185****6698</strong>
                        <span class="aui-tag" id="aui-home">家里</span>
                        <span class="aui-tag aui-tag-default" id="aui-default">默认</span>
                    </li>
                    <li>
                        <i class="aui-icon aui-icon-address"></i>
                        北京海淀区三环到四环之间学院路东里33号楼1门202
                    </li>
                </ul>
            </a>
        </div>
    </div>
    <div class="aui-dri"></div>
    <div class="aui-list-product-float-item">
        <?php if(is_array($goodsinfo)): foreach($goodsinfo as $key=>$v): ?><a href="javascript:;" class="aui-list-product-fl-item">
            <div class="aui-list-product-fl-img">
                <img src="/Public/Upload/goods/<?php echo ($v['pic']); ?>" alt="" style="width:80px;height:80px">
            </div>
            <div class="aui-list-product-fl-text">
                <h3 class="aui-list-product-fl-title"><?php echo ($v["goodsname"]); echo ($v['goodsinfo']); ?></h3>
                <div class="aui-list-product-fl-mes">
                    <div>
							<span class="aui-list-product-item-price">
								<em>¥</em>
								<?php echo ($v["sale"]); ?>
							</span>
                        <span class="aui-list-product-item-del-price">
								¥<?php echo ($v["price"]); ?>
							</span>
                    </div>
                    <div class="aui-btn-purchase">
                        <span>数量： <?php echo ($v["car_num"]); ?></span>
                    </div>
                </div>
                <div class="aui-list-product-fl-bag">
                    <span><img src="/Public/Home/img/icon/bag1.png" alt=""></span>
                    <span><img src="/Public/Home/img/icon/bag2.png" alt=""></span>
                </div>
            </div>
        </a><?php endforeach; endif; ?>
    </div>
    <div class="aui-address-well">
        <a href="#" class="aui-address-cell aui-fl-arrow">
            <div class="aui-address-cell-bd">支持配送</div>
            <div class="aui-address-cell-ft">
                <p>在线支付</p>
                <p>顺丰快递</p>
                <p class="aui-address-text"><i class="aui-icon aui-prompt-sm"></i>11月12日[周五]09:00-15:00</p>
            </div>
        </a>
        <div class="aui-prompt"><i class="aui-icon aui-prompt-sm"></i>您的收货时间为工作日，请您做好收货准备。</div>
        <a href="#" class="aui-address-cell aui-fl-arrow aui-fl-arrow-clear">
            <div class="aui-address-cell-bd">发票</div>
            <div class="aui-address-cell-ft">个人</div>
        </a>
        <div class="aui-dri"></div>
        <a href="#" class="aui-address-cell aui-fl-arrow aui-fl-arrow-clear">
            <div class="aui-address-cell-bd">
                运费险
                <p style="color:#888">7天内退货，15天内可换货</p>
            </div>
            <div class="aui-address-cell-ft">￥0.50&nbsp;&nbsp;<input class="aui-switch" type="checkbox" checked="checked"></div>
        </a>
        <div class="aui-dri"></div>
        <a href="#" class="aui-address-cell aui-fl-arrow aui-fl-arrow-clear">
            <div class="aui-address-cell-bd">优惠券</div>
            <div class="aui-address-cell-ft">不可用</div>
        </a>
        <div class="aui-dri"></div>
        <a href="#" class="aui-address-cell aui-fl-arrow aui-fl-arrow-clear">
            <div class="aui-address-cell-bd">礼品卡</div>
            <div class="aui-address-cell-ft">不可用</div>
        </a>
        <div class="aui-dri"></div>
        <a href="#" class="aui-address-cell aui-fl-arrow aui-fl-arrow-clear">
            <div class="aui-address-cell-bd">积分</div>
            <div class="aui-address-cell-ft"><?php echo ($v["is_give"]); ?></div>
        </a>
        <div class="aui-dri"></div>
        <a href="#" class="aui-address-cell aui-fl-arrow aui-fl-arrow-clear">
            <div class="aui-address-cell-bd">
                <h3>商品金额</h3>
                <p>运费(总重:1.978kg)</p>
            </div>
            <div class="aui-address-cell-ft">
                <span class="aui-red">￥<?php echo ($total); ?></span><br>
                <span class="aui-red">+￥0.00</span>
            </div>
        </a>
    </div>
    <div class="aui-payment-bar">
        <div class="shop-total">
            <span class="aui-red aui-size">实付款: <em>￥<?php echo ($total); ?></em></span>
        </div>
        <a href="<?php echo U('createorder');?>?tuan=<?php echo ($tuan); ?>&flag=<?php echo ($flag); ?>" class="settlement">提交订单</a>
    </div>
</section>

</body>
</html>