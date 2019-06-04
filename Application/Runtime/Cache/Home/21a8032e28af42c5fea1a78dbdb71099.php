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
<script src="/Public/Home/js/jquery-1.8.3.min.js"></script>
<script src="/Public/Home/js/layer/layer.js"></script>
    <title>我的订单</title>
</head>
<body>

<header class="aui-header-default aui-header-fixed aui-header-bg">
    <a href="javascript:history.back(-1)" class="aui-header-item">
        <i class="aui-icon aui-icon-back-white"></i>
    </a>
    <div class="aui-header-center aui-header-center-clear">
        <div class="aui-header-center-logo">
            <div class="aui-car-white-Typeface">我的订单</div>
        </div>
    </div>
    <!--<a href="#" class="aui-header-item-icon"   style="min-width:0">
        <i class="aui-icon aui-icon-search"></i>
    </a>-->
</header>
<section class="aui-myOrder-content">
    <div class="m-tab demo-small-pitch" data-ydui-tab>
        <div class="aui-myOrder-fix">
            <ul class="tab-nav">
                <?php if($_GET['state'] == 0): ?><li class="tab-nav-item tab-active"><a href="javascript:;">全部</a></li>
                    <?php else: ?>
                <li class="tab-nav-item"><a href="javascript:;">全部</a></li><?php endif; ?>
                <?php if($_GET['state'] == 5): ?><li class="tab-nav-item tab-active"><a href="javascript:;">待付款</a></li>
                    <?php else: ?>
                <li class="tab-nav-item "><a href="javascript:;">待付款</a></li><?php endif; ?>
                <?php if($_GET['state'] == 3): ?><li class="tab-nav-item tab-active"><a href="javascript:;">待发货</a></li>
                    <?php else: ?>
                <li class="tab-nav-item"><a href="javascript:;">待发货</a></li><?php endif; ?>
                <?php if($_GET['state'] == 1): ?><li class="tab-nav-item tab-active"><a href="javascript:;">待收货</a></li>
                    <?php else: ?>
                <li class="tab-nav-item"><a href="javascript:;">待收货</a></li><?php endif; ?>
                <?php if($_GET['state'] == 2): ?><li class="tab-nav-item tab-active"><a href="javascript:;">评价</a></li>
                    <?php else: ?>
                <li class="tab-nav-item"><a href="javascript:;">评价</a></li><?php endif; ?>
            </ul>
        </div>
        <div class="aui-prompt"><i class="aui-icon aui-prompt-sm"></i>双十一期间发货及物流时效公告</div>
        <div class="tab-panel">
        <!--全部订单包括所有状态 -->
            <div class="tab-panel-item tab-active">
                <ul>
                    <?php if(is_array($data)): foreach($data as $key=>$v): ?><li>
                        <div class="aui-list-title-info">
                            <a href="#" class="aui-well ">
                                <div class="aui-well-bd"><?php echo (date("Y-m-d",$v["created_at"])); ?></div>
                              <!-- <?php echo ($v["ordersn"]); ?>-->
                                <?php if($v["state"] == 2): ?><div class="aui-well-ft">已收货</div>
                                <?php elseif($v["state"] == 1): ?>
                                <div class="aui-well-ft">待收货</div>
                                <?php elseif($v["state"] == 3): ?>
                                <div class="aui-well-ft">待发货</div>
                                <?php elseif($v["state"] == 4): ?>
                                <div class="aui-well-ft">交易失败</div>
                                <?php elseif($v["state"] == 5): ?>
                                <div class="aui-well-ft">待付款</div><?php endif; ?>
                            </a>
                            <?php if(is_array($v['goods'])): foreach($v['goods'] as $key=>$vv): ?><a href="<?php echo U('Home/Order/orderdetail');?>?sn=<?php echo ($v["ordersn"]); ?>&state=<?php echo ($v["state"]); ?>" class="aui-list-product-fl-item">
                               <div class="aui-list-product-fl-img">
                                   <img src="/Public/Upload/goods/<?php echo ($vv["pic"]); ?>" alt="">
                               </div>
                               <div class="aui-list-product-fl-text">
                                   <h3 class="aui-list-product-fl-title"><?php echo ($vv["goodsname"]); ?></h3>
                                   <div class="aui-list-product-fl-mes">
                                       <div>
									<span class="aui-list-product-item-price">
										<em>¥</em>
										<?php echo ($vv["sale"]); ?>
									</span>
									<span class="aui-list-product-item-del-price">
										¥<?php echo ($vv["price"]); ?>
									</span>
                                        </div>
                                        <div class="aui-btn-purchase">
                                            x<?php echo ($vv["num"]); ?>
                                        </div>
                                   </div>
                               </div>
                            </a><?php endforeach; endif; ?>
                        </div>
                        <?php if($v["state"] == 2): ?><div class="aui-list-title-btn">
                                <a href="<?php echo U('Home/Order/orderdetail');?>?sn=<?php echo ($v["ordersn"]); ?>&state=<?php echo ($v["state"]); ?>">查看订单</a>
                                <a href="<?php echo U('Home/Order/comment');?>?sn=<?php echo ($v["ordersn"]); ?>" class="red-color">评价</a>
                            </div>
                            <div class="aui-dri"></div>
                            <?php elseif($v["state"] == 1): ?>
                            <div class="aui-list-title-btn">
                                <a href="#">查看物流</a>
                                <a href="<?php echo U('Home/Order/confirm');?>?sn=<?php echo ($v["ordersn"]); ?>" class="red-color">确认收货</a>
                            </div>
                            <div class="aui-dri"></div>
                            <?php elseif($v["state"] == 3): ?>
                            <div class="aui-list-title-btn">
                                <a href="javasctipt:;" class="del" ordersn="<?php echo ($v["ordersn"]); ?>">取消订单</a>
                                <a href="javasctipt:;" class="red-color tell">催物流</a>
                            </div>
                            <div class="aui-dri"></div>
                            <?php elseif($v["state"] == 4): ?>
                            <div class="aui-list-title-btn">
                                <a href="javasctipt:;" class="del" ordersn="<?php echo ($v["ordersn"]); ?>">删除订单</a>
                            </div>
                            <?php elseif($v["state"] == 5): ?>
                            <div class="aui-list-title-btn">
                                <a href="javasctipt:;" class="del" ordersn="<?php echo ($v["ordersn"]); ?>">取消订单</a>
                                <a href="#" class="red-color">立即付款</a>
                            </div><?php endif; ?>
                    </li><?php endforeach; endif; ?>
                </ul>
            </div>
        <!--状态为待付款  state=5 -->
            <div class="tab-panel-item">
                <ul>
                    <?php if(is_array($data)): foreach($data as $key=>$v): if($v["state"] == 5): ?><li>
                        <div class="aui-list-title-info">
                            <a href="#" class="aui-well ">
                                <div class="aui-well-bd"><?php echo (date("Y-m-d",$v["created_at"])); ?></div>
                                <!--<?php echo ($v["ordersn"]); ?>-->
                                <div class="aui-well-ft">待付款</div>
                            </a>
                            <?php if(is_array($v['goods'])): foreach($v['goods'] as $key=>$vv): ?><a href="<?php echo U('Home/Order/orderdetail');?>?sn=<?php echo ($v["ordersn"]); ?>&state=<?php echo ($v["state"]); ?>" class="aui-list-product-fl-item">
                                <div class="aui-list-product-fl-img">
                                    <img src="/Public/Upload/goods/<?php echo ($vv["pic"]); ?>" alt="">
                                </div>
                                <div class="aui-list-product-fl-text">
                                    <h3 class="aui-list-product-fl-title"><?php echo ($vv["goodsname"]); ?></h3>
                                    <div class="aui-list-product-fl-mes">
                                        <div>
									<span class="aui-list-product-item-price">
										<em>¥</em>
										<?php echo ($vv["sale"]); ?>
									</span>
                                    <span class="aui-list-product-item-del-price">
										¥<?php echo ($vv["price"]); ?>
									</span>
                                        </div>
                                        <div class="aui-btn-purchase">
                                            x<?php echo ($vv["num"]); ?>
                                        </div>
                                    </div>
                                </div>
                            </a><?php endforeach; endif; ?>
                        </div>
                        <div class="aui-list-title-btn">
                            <a href="javasctipt:;" class="del" ordersn="<?php echo ($v["ordersn"]); ?>">取消订单</a>
                            <a href="#" class="red-color">立即付款</a>
                        </div>
                        <div class="aui-dri"></div>
                    </li><?php endif; endforeach; endif; ?>
                </ul>
            </div>
        <!--状态为待发货  state=3 -->
            <div class="tab-panel-item">
                <ul>
                    <?php if(is_array($data)): foreach($data as $key=>$v): if($v["state"] == 3): ?><li>
                        <div class="aui-list-title-info">
                            <a href="#" class="aui-well ">
                                <div class="aui-well-bd"><?php echo (date("Y-m-d",$v["created_at"])); ?></div>
                                <div class="aui-well-ft">待发货</div>
                            </a>
                            <?php if(is_array($v['goods'])): foreach($v['goods'] as $key=>$vv): ?><a href="<?php echo U('Home/Order/orderdetail');?>?sn=<?php echo ($v["ordersn"]); ?>&state=<?php echo ($v["state"]); ?>" class="aui-list-product-fl-item">
                                <div class="aui-list-product-fl-img">
                                    <img src="/Public/Upload/goods/<?php echo ($vv["pic"]); ?>" alt="">
                                </div>
                                <div class="aui-list-product-fl-text">
                                    <h3 class="aui-list-product-fl-title"><?php echo ($vv["goodsname"]); ?></h3>
                                    <div class="aui-list-product-fl-mes">
                                        <div>
									<span class="aui-list-product-item-price">
										<em>¥</em>
										<?php echo ($vv["sale"]); ?>
									</span>
									<span class="aui-list-product-item-del-price">
										¥<?php echo ($vv["price"]); ?>
									</span>
                                        </div>
                                        <div class="aui-btn-purchase">
                                            x<?php echo ($vv["num"]); ?>
                                        </div>
                                    </div>
                                </div>
                            </a><?php endforeach; endif; ?>
                        </div>
                        <div class="aui-list-title-btn">
                            <a href="javasctipt:;" class="del" ordersn="<?php echo ($v["ordersn"]); ?>">取消订单</a>
                            <a href="javasctipt:;" class="red-color tell">催物流</a>
                        </div>
                        <div class="aui-dri"></div>
                    </li><?php endif; endforeach; endif; ?>
                </ul>
            </div>
        <!--状态为待收货  state=1 -->
            <div class="tab-panel-item">
                <ul>
                    <?php if(is_array($data)): foreach($data as $key=>$v): if($v["state"] == 1): ?><li>
                        <div class="aui-list-title-info">
                            <a href="#" class="aui-well ">
                                <div class="aui-well-bd"><?php echo (date("Y-m-d",$v["created_at"])); ?></div>
                                <div class="aui-well-ft">待收货</div>
                            </a>
                            <?php if(is_array($v['goods'])): foreach($v['goods'] as $key=>$vv): ?><a href="<?php echo U('Home/Order/orderdetail');?>?sn=<?php echo ($v["ordersn"]); ?>&state=<?php echo ($v["state"]); ?>" class="aui-list-product-fl-item">
                                <div class="aui-list-product-fl-img">
                                    <img src="/Public/Upload/goods/<?php echo ($vv["pic"]); ?>" alt="">
                                </div>
                                <div class="aui-list-product-fl-text">
                                    <h3 class="aui-list-product-fl-title"><?php echo ($vv["goodsname"]); ?></h3>
                                    <div class="aui-list-product-fl-mes">
                                        <div>
									<span class="aui-list-product-item-price">
										<em>¥</em>
										<?php echo ($vv["sale"]); ?>
									</span>
									<span class="aui-list-product-item-del-price">
										¥<?php echo ($vv["price"]); ?>
									</span>
                                        </div>
                                        <div class="aui-btn-purchase">
                                            x<?php echo ($vv["num"]); ?>
                                        </div>
                                    </div>
                                </div>
                            </a><?php endforeach; endif; ?>
                        </div>
                        <div class="aui-list-title-btn">
                            <a href="#">查看物流</a>
                            <a href="<?php echo U('Home/Order/confirm');?>?sn=<?php echo ($v["ordersn"]); ?>" class="red-color">确认收货</a>
                        </div>
                        <div class="aui-dri"></div>
                    </li><?php endif; endforeach; endif; ?>
                </ul>
            </div>
        <!--状态为已收货  state=2 -->
            <div class="tab-panel-item">
                <ul>
                    <?php if(is_array($data)): foreach($data as $key=>$v): if($v["state"] == 2): ?><li>
                        <div class="aui-list-title-info">
                            <a href="#" class="aui-well ">
                                <div class="aui-well-bd"><?php echo (date("Y-m-d",$v["created_at"])); ?></div>
                                <div class="aui-well-ft">已收货</div>
                            </a>
                            <?php if(is_array($v['goods'])): foreach($v['goods'] as $key=>$vv): ?><a href="<?php echo U('Home/Order/orderdetail');?>?sn=<?php echo ($v["ordersn"]); ?>&state=<?php echo ($v["state"]); ?>" class="aui-list-product-fl-item">
                                <div class="aui-list-product-fl-img">
                                    <img src="/Public/Upload/goods/<?php echo ($vv["pic"]); ?>" alt="">
                                </div>
                                <div class="aui-list-product-fl-text">
                                    <h3 class="aui-list-product-fl-title"><?php echo ($vv["goodsname"]); ?></h3>
                                    <div class="aui-list-product-fl-mes">
                                        <div>
									<span class="aui-list-product-item-price">
										<em>¥</em>
										<?php echo ($vv["sale"]); ?>
									</span>
									<span class="aui-list-product-item-del-price">
										¥<?php echo ($vv["price"]); ?>
									</span>
                                        </div>
                                        <div class="aui-btn-purchase">
                                            x<?php echo ($vv["num"]); ?>
                                        </div>
                                    </div>
                                </div>
                            </a><?php endforeach; endif; ?>
                        </div>
                        <div class="aui-list-title-btn">
                            <a href="<?php echo U('Home/Order/orderdetail');?>?sn=<?php echo ($v["ordersn"]); ?>&state=<?php echo ($v["state"]); ?>">查看订单</a>
                            <a href="<?php echo U('Home/Order/comment');?>?sn=<?php echo ($v["ordersn"]); ?>" class="red-color">评价</a>
                        </div>
                        <div class="aui-dri"></div>
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
        /*
         $tab.find('.tab-nav-item').on('open.ydui.tab', function (e) {
         console.log('索引：%s - [%s]正在打开', e.index, $(this).text());
         });
         */
        $tab.find('.tab-nav-item').on('opened.ydui.tab', function (e) {
            console.log('索引：%s - [%s]已经打开了', e.index, $(this).text());
        });
    }(jQuery);

//删除
    $(".del").click(function() {
        obj = $(this);
        //发出ajax请求
        ordersn = obj.attr("ordersn")
        //console.log(ordersn)
        $.get("<?php echo U('Home/Order/delorder');?>",{'ordersn': ordersn},function (res){
            console.log(res);
            obj.parent().parent().remove();
        }, "text");
    })
//催物流
    var count=0;
    $(document).ready(function(){
        $(".tell").click(function(){
            obj=$(this);
            layer.msg("已提示卖家尽快发货");
            count+=1;
            if(count>5){
                layer.msg("今日提醒已达上限");
            }
        })
    })

</script>
</body>
</html>