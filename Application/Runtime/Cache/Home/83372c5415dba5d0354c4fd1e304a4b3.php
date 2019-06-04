<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimal-ui"/>
	<meta name="apple-mobile-web-app-capable" content="yes"/>
	<meta name="apple-mobile-web-app-status-bar-style" content="black"/>
	<meta name="format-detection" content="telephone=no, email=no"/>
	<meta charset="UTF-8">
	<title>购物车</title>
	<link rel="stylesheet" href="/Public/Home/css/core.css">
	<link rel="stylesheet" href="/Public/Home/css/icon.css">
	<link rel="stylesheet" href="/Public/Home/css/home.css">
	<link rel="icon" type="image/x-icon" href="favicon.ico">
	<link href="iTunesArtwork@2x.png" sizes="114x114" rel="apple-touch-icon-precomposed">
    <script src="/Public/Home/js/jquery.min.1.8.2.js" type="text/javascript"></script>
</head>
<body>

	<header class="aui-header-default aui-header-fixed aui-header-bg">
		<a href="javascript:history.back(-1)" class="aui-header-item">
			<i class="aui-icon aui-icon-back-white"></i>
		</a>
		<div class="aui-header-center aui-header-center-clear">
			<div class="aui-header-center-logo">
				<div class="aui-car-white-Typeface">购物车(<?php echo ($count); ?>)</div>
			</div>
		</div>
		<a href="#" class="aui-header-item-icon"   style="min-width:0">
			<i class="aui-icon aui-icon-member"></i>
		</a>
	</header>
	<section class="aui-car-content">
		<div class="aui-car-box">
			<div class="aui-car-box-name">

				<h3>
					<a href="#">优购优品网</a>
				</h3>
				<div class="aui-car-coupons">
					<a href="#">领券</a>

				</div>
			</div>
			<div class="aui-car-box-list">
                <?php if(is_array($cart)): foreach($cart as $key=>$v): ?><ul>
					<li>
						<div class="aui-car-box-list-item">
							<input type="checkbox" class="check  goods-check goodsCheck"  value="<?php echo ($v["gid"]); ?>" id="check<?php echo ($v["gid"]); ?>" gid="<?php echo ($v["gid"]); ?>" onclick="OK()">
							<div class="aui-car-box-list-img">
								<a href="<?php echo U('Index/goodsdata');?>?id=<?php echo ($v["id"]); ?>">
									<img src="/Public/Upload/goods/<?php echo ($v["pic"]); ?>" alt="">
								</a>
							</div>

							<div class="aui-car-box-list-text">
								<h4>
									<a href="ui-product.html"><?php echo ($v["goodsname"]); ?></a>
								</h4>

								<div class="aui-car-box-list-text-price">
									<div class="aui-car-box-list-text-pri">
										￥<b class="sale" id="sale<?php echo ($v["gid"]); ?>"><?php echo ($v[sale]*$v[num]); ?></b>
									</div>
									<div class="aui-car-box-list-text-arithmetic">
										<a href="javascript:;" class="minus"  onclick="minus(<?php echo ($v["gid"]); ?>,<?php echo ($v["sale"]); ?>)" >-</a>
										<span class="num" id="num<?php echo ($v["gid"]); ?>" ><?php echo ($v['num']); ?></span>
										<a href="javascript:;" class="plus" onclick="plus(<?php echo ($v["gid"]); ?>,<?php echo ($v["sale"]); ?>)" >+</a>
                                        <div><br/>
                                        <div><a href="javascript:;" class="del" gid="<?php echo ($v["gid"]); ?>" style="color:red">删除</a>
									</div>
								</div>
							</div>
						</div>

                        </div>

                        </div>
					</li>

				</ul><?php endforeach; endif; ?>
			</div>
            <div class="cart_price">商品总价：￥<b class="total">0</b></div>
		</div>
	</section>

	<div class="aui-payment-bar">
		<div class="all-checkbox"><input type="checkbox"  class="check checkall"  onclick="fun()" gid="0" >全选</div>
<!--
        <div class="all-checkbox"><input type="checkbox" class="check goods-check" id="AllCheck">全选</div>
-->
		<div class="shop-total">
            <div class="newtotal">商品总价：￥<b id="total" class="total">0</b></div>
		</div>
		<a href="" class="settlement">结算</a>
	</div>
	<script src="/Public/Home/js/aui-car.js"></script>

</body>
</html>

<script type="text/javascript">
    total=0;


    //商品删除
$(".del").click(function(){
    obj=$(this);
    //发出请求
    gid=obj.attr('gid');
    $.get("<?php echo U('Shopping/delcart');?>",{"gid":gid},function(res){
        if(res==1){
            //执行删除操作
            console.log("删除成功");
            obj.parent().parent().parent().parent().parent().parent().parent().remove();
        }else if(res==2){
            console.log("删除失败");
        }
    },"text");
});


   // 减少商品
    function minus(gid,sale){
       obj=$(this);
   //获取id=num的值转换为数字
        num=parseInt($("#num"+gid).text());
        //声明一个地址变量
       url="<?php echo U('Shopping/minus');?>";
        //开始传值
        $.get(url,{gid:gid},function(res){
            if(res==1){
                //每点击执行一次该数值--
                num--;
                //小计
                $('#sale'+gid).text(num*sale);

            }
        },"text");
    }







    //增加
    function plus(gid,sale){
        obj=$(this);
        //获取id=num的值转换为数字
        num=parseInt($("#num"+gid).text());
        url="<?php echo U('Shopping/plus');?>";
        //开始传值
        $.get(url,{gid:gid},function(res){
            if(res==1){
               //每点击执行一次该数值++
                num++;
               //小计
                $('#sale'+gid).text(num*sale);

            }
        },'text');

    }


    //全选全不选
    function fun(){
        /*console.log('select all....')*/
        total=0;
        if($('.checkall').prop('checked')){
            $('.check').prop('checked',true);
            var checkBoxArr = [];
            $('.check:checked').each(function() {
                checkBoxArr.push($(this).attr('gid'));
            });

            for(j = 0,len=checkBoxArr.length; j < len-1; j++) {
                gid=checkBoxArr[j];
                money=$("#sale"+gid).text();
                total=parseInt(total)+parseInt(money);

            }


            $("#total").html(total);

        }else{
            $('.check').prop('checked',false);
            total = 0;
            $("#total").html(0);
        }
    }

   //商品总价

  $('.check.goods-check.goodsCheck').change(function(){
     /* console.log('change.....')*/
        obj=$(this);

        if(obj.prop('checked')){
            gid=obj.attr('gid');
            money=$("#sale"+gid).text();
            total=parseInt(total)+parseInt(money);

        }else{
            gid=obj.attr('gid');
            money=$("#sale"+gid).text();
            total=parseInt(total)-parseInt(money);
        }
        $("#total").html(total);
    });




    //下单准备
    function OK() {
        if ($('.check').prop('checked')) {
            var checkBoxArr = [];
            $('.check:checked').each(function () {
                checkBoxArr.push($(this).attr('gid'));
            });
            a=checkBoxArr;
            cart_id= a.join(",");
            console.log(cart_id);

//
            $(".settlement").attr('href',"<?php echo U('Createorder/index');?>?cart_id="+cart_id)
    }

    }



</script>