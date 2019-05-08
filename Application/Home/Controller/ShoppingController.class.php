<?php
namespace Home\Controller;
use Think\Controller;

class ShoppingController extends Controller{
    //商品详情页遍历
     function shopping(){
         //获取用户id
         $uid=session('uid');
        //多表联查
              $cart=M('cart_list')
             ->join('member ON cart_list.uid=member.uid')
             ->join('tp_goodsinfo ON cart_list.goodsid=tp_goodsinfo.id')
             ->where("cart_list.uid=$uid")
             ->select();

         $count=count($cart);


         $this->assign('cart',$cart);
         $this->assign('count',$count);
         $this->display();
     }

    //加入购物车操作
    function addcart(){
        $cart=M('cart_list');
        $data['goodsid']=$goodsid=I('get.id');
         $data['uid']=$uid=session('uid');
        $cart->add($data);

        $this->redirect("Shopping/shopping");
    }

}