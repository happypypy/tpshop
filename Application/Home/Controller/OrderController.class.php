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
            ->order("created_at desc")
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
        dump($res);
        $res['score'] = I('post.score');
        //$row=M("tp_usercomment")->add($res);
        //dump($res);
        /*$this->assign([
            'row'=>$row
        ]);*/
        $this->display("comment-ok");
    }
//我的评价
    public function mycomment(){

         $this->display("mycomment");
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
        $ordersn=$_GET['sn'];
        $addressinfo=M('orders')
            ->alias('o')
            ->join("left join order_address as a on a.uid=o.userid and a.id=o.aid")
            ->where("o.userid=2 and o.ordersn={$ordersn}")
            ->field("o.address,a.name,phone")
            ->select();
        //dump($addressinfo);
        //查询订单的详细信息
        $order=M('order_connect')
            ->alias('c')
            ->join("left join orders as o on o.ordersn=c.ordersn")
            ->where("o.userid=2 and o.ordersn={$ordersn}")
            ->join("left join goods_info as g on g.id=c.gid")
            ->field("o.created_at,total,c.num,gid,g.price,pic,goodsname")
            ->select();
        //dump($order);
        //读取字段值其实就是获取数据表中的某个列的多个或者单个数据，最常用的方法是 getField方法
        $eid=M('orders')->where("userid=2 and ordersn={$ordersn}")->getField('eid');
        $total=M('orders')->where("userid=2 and ordersn={$ordersn}")->getField('total');
        $createdtime=M('orders')->where("userid=2 and ordersn={$ordersn}")->getField('created_at');
        $this->assign([
            'addressinfo'=>$addressinfo,
            'order'=>$order,
            'eid'=>$eid,
            'total'=>$total,
            'createdtime'=>$createdtime
        ]);
        $this->display();
    }
//确认收货
    public function confirm(){
        $ordersn=$_GET['sn'];
        //dump($ordersn);
        $data['state']="2";
        $res=M('orders')->where("ordersn='$ordersn'")->save($data);//根据条件更新记录
        //dump($res);

        $this->display();
    }
}