<?php
namespace Home\Controller;
use Think\Controller;

class ShoppingController extends Controller{
    //商品详情页遍历
     function shopping(){
         //获取用户id
         $uid=session('uid');
         #如果uid等于空的话则跳回登录界面
         if(empty($uid)){

             $this->display("Login/login");
         }
        //多表联查
              $cart=M('cart_list')
             ->join('member ON cart_list.uid=member.uid')
             ->join('tp_goodsinfo ON cart_list.goodsid=tp_goodsinfo.id')
             ->field('tp_goodsinfo.id,tp_goodsinfo.pic,tp_goodsinfo.sale,tp_goodsinfo.goodsname,cart_list.gid,cart_list.num')
             ->where("cart_list.uid=$uid")
             ->select();
         $count=count($cart);

         //给视图传变量
         $this->assign('cart',$cart);
         $this->assign('count',$count);
         $this->display();
     }

    //加入购物车操作
    function addcart(){
        $num=I("get.num");
        $cart=M('cart_list');
        $data['goodsid']=$goodsid=I('get.tid');
         $data['uid']=$uid=session('uid');
        //查询数据库里有没有
        $if=$cart->where($data)->select();
        if($if){
            $cart->where($data)->setInc("num",$num);
        }else{
            $data['num']=$num;
        $cart->add($data);
    }
        //$this->redirect("Shopping/shopping");
    }

      //删除购物车操作
    function delcart(){
       $gid=I('get.gid');
        $cart=M('cart_list');
        $row=$cart->where("gid=$gid")->delete();

           if($row){
               echo 1;
           }else{
               echo 2;
           }
    }

    //减号
    function minus()
    {
        //获取表的信息
        $cart = M('cart_list');
        $gid =I('get.gid');
        //执行setDec减少操作
        $num=$cart->field('num')->where("gid=$gid")->select();
         $num=$num['0']['num'];
        if($num>1){

        $res=$cart->where("gid=$gid")->setDec("num",1);
        //返回值
         if($res){
             echo 1;
         }else{
             echo 2;
         }
    }else{

        }

    }


    //加号
    function plus(){
        $cart=M('cart_list');
        $gid=I('get.gid');
        //执行setInc增加操作
        $res=$cart->where("gid=$gid")->setInc("num",1);
         //返回值
        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }

    //下单
    function goodsid(){
       $gid=I('get.gid');
        dump($gid);

    }



}