<?php
namespace Home\Controller;
use Think\Controller;
class CreateorderController extends Controller
{
    //携带商品信息显示提交订单页面
    function index(){
        //1.购物车传来的商品
//        $cart_id="111,112,113";
//        $where['id']=array('in',$cart_id);
//        $car_list=M("cart_list")->where($where)->select();
//     //dump($car_list);
//        //从购物车里查询商品信息
//        $totall=0;
//        foreach ($car_list as $v){
//          $gid=$v['goodsid'];
//            $ress=M("tp_goodsinfo")->where("id=$gid")->find();
//            $ress["car_num"]=$v['num'];
//           // dump($ress);
//          $goodsinfo[]=$ress;
//        }
//       // dump($goodsinfo);
//        //计算总价
//        foreach ($goodsinfo as $v){
//            //dump($v['sale']);
//            $totall+=$v['sale']*$v['car_num'];
//        }
//        $totall=number_format($totall, 2);
//        //dump($totall);
//        //将商品信息放入session
//        session('goodsinfo',$goodsinfo);
//        session('total',$totall);
//
//        $this->assign([ 'goodsinfo'=>$goodsinfo,'total'=>$totall]);

        //2.立即付款

        $gid=I("get.gid");
        $num=I("get.num");

       $res[0]= M("tp_goodsinfo")->where("id=$gid")->find();
        //dump($res);
        //接受团购id，开团
        if(I("get.tuan")){
            $tuan=I("get.tuan");
            $res[0]['sale']=I("get.sale");
        }
        //接受参团flag
        if(I("get.flag")){
            $flag=I("get.flag");
        }
        $total=number_format($res[0]['sale']*$num,2);
        $res[0]['car_num']=$num;
        //将商品信息放入session
        session('goodsinfo',$res);
        session('total',$total);
       // dump($res);
      $this->assign([ 'goodsinfo'=>$res,'total'=>$total,'tuan'=>$tuan,'flag'=>$flag]);
        $this->display();

    }
    //生成订单并跳转到支付页面
    function createorder(){
        //向order_connect插入数据库
        //dump(session('goodsinfo'));
        //如果是团购
            //dump(I("get.flag"));//string(0)''
            //die;
        if(I("get.tuan")!=""){
            if(I("get.flag")!=""){
                //cantuan
                $flag=I("get.flag");
            }else{
                //kaituan
                $flag=0;
            }

            $tuan=A("Tuangou");
            //dump($flag);
            //die;
            $tuan->addtuan($flag);
        }
        $goodsinfo=session('goodsinfo');
        $ordersn= date('YmdHis').rand(0,9999);
        session('ordersn',$ordersn);
        $totalscore=0;
        foreach ($goodsinfo as $v){
            $data['ordersn']=$ordersn;
            $data['gid']=$v['id'];
            $data['price']=$v['sale'];
            $data['num']=$v['car_num'];
            $data['addscore']=$v['is_give'];
            $data['decscore']=0;
            $totalscore+=$v['is_give']*$v['car_num'];
            $ress=M('tp_orderconnect')->add($data);
        }
        //向订单表里插入数据
        $data["ordersn"]=$ordersn;
        $data["userid"]=333;
        $data["state"]=5;
        $data["created_at"]=time();
        $data["total"]=session('total');
        $data["address"]="北京市海淀区西三环北路22号中航大厦C座209";
        $data["aid"]=7;
        $data["eid"]="圆通快递";
        $data['score']=$totalscore;
        $res=M('tp_orders')->add($data);
        if($res and $ress){
            $this->redirect('Createorder/payorder');
        }

    }
    //支付页面
    function payorder(){
        $total=number_format(session('total'), 2);
        $this->assign('total',$total);
        $this->display('payorder');
    }
    //执行支付
    function successorder(){
        //改状态
        $ordersn=session('ordersn');
        $res=M('tp_orders')->where("ordersn='{$ordersn}'")->data(['state' => 3])->save();
        if($res){
            $this->redirect('Createorder/endorder');
        }else{
            $this->redirect('Createorder/failorder');
        }
    }
    //支付成功页面
    function endorder(){
        //清除session
        session('goodsinfo',null);
        session('ordersn',null);
        session('total',null);
        $this->display('successorder');
    }

    //支付失败
    function failorder(){
        $this->display();
    }

}