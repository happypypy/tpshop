<?php
namespace Home\Controller;
use Think\Controller;
class OrderController extends Controller{
//我的订单页面
    public function order(){
        //$uid=session('id');//获取会员id
         //查询订单的详细信息
        $order=M('order_connect')
           ->alias('c')
           ->join("left join orders as o on o.ordersn=c.ordersn")
           ->where('o.userid=2')
           ->join("left join goods_info as g on g.id=c.gid")
           ->field("o.ordersn,state,created_at,total,c.num,gid,g.price,sale,pic,goodsname")
           ->select();
        $data=[];
        foreach($order as &$v){
           //dump($v);
            $data[$v['ordersn']]['gid']=$v['gid'];
            $data[$v['ordersn']]['ordersn']=$v['ordersn'];
            $data[$v['ordersn']]["created_at"]=$v['created_at'];
            $data[$v['ordersn']]["total"]=$v['total'];
            $data[$v['ordersn']]["state"]=$v['state'];
            $data[$v['ordersn']]["goods"][$v['gid']]["goodsname"]=$v['goodsname'];
            $data[$v['ordersn']]["goods"][$v['gid']]["pic"]=$v['pic'];
            $data[$v['ordersn']]['goods'][$v['gid']]["num"]=$v['num'];
            $data[$v['ordersn']]['goods'][$v['gid']]["sale"]=$v['sale'];
            $data[$v['ordersn']]['goods'][$v['gid']]["price"]=$v['price'];
        }
        //dump($data);
        $this->assign([
            'dateinfo'=>$dateinfo,
            'order'=>$order,
            'data'=>$data
        ]);
        //dump($order);
        $this->display();
    }
//评价页面
    public function comment(){
        //$uid=session('id');//获取会员id
        $ordersn=$_GET['sn'];
        //dump($ordersn);
        $goodsinfo=M('order_connect')
            ->alias('c')
            ->join("left join orders as o on o.ordersn=c.ordersn")
            ->where("o.userid=2 and o.state=2 and o.ordersn={$ordersn}")
            ->join("left join goods_info as g on g.id=c.gid")
            ->field("o.ordersn,userid,c.gid,g.pic,goodsname")
            ->select();
        //dump($goodsinfo);
        $this->assign([
            'ordersn'=>$ordersn,
            'goodsinfo'=>$goodsinfo
        ]);
        //die;
        $this->display("comment");
    }
//评价成功页面，添加评论
    public function commentok(){
        //$uid=session('id');//获取会员id
        $res['orderid']=I("post.ordersn");
        //dump($_POST["ordersn"]);
        $res['goods_id']=I("post.goods_id");
        $res['user_id'] = 2;
        $res['comment'] = I('post.comtext');
        //dump($_POST["pic"]);
        $res['score'] = I('post.score');
        $row=M("tp_usercomment")->add($res);
        //dump($res);
        $this->assign([
            'row'=>$row
        ]);
        $this->display("comment-ok");
    }
//取消订单
    public function delorder(){
        $ordersn=I('get.ordersn');
        dump($ordersn);
        $res=M("orders")->where("ordersn='$ordersn'")->delete();//返回的是受影响行数,错误返回false
        //dump($res);
    }
//订单详情
    public function orderdetail(){
        //下单地址信息
        //$uid=session('id');//获取会员id

        $this->display();
    }
}