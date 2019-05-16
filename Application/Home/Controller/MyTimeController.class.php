<?php
namespace Home\Controller;
use Think\Controller;

/**
 * 限时抢购
 * Class MyTimeController
 * @package Home\Controller
 */
class MyTimeController extends Controller {
    /**
     * 抢购首页
     */
    public function index(){
        //抢购产品
        $this->goods=M('tpGoodsinfo')
            ->field('id,goodsname,price,buynum,buytime,buyprice,pic')
            ->where('is_buy=1')
            ->select();
        $this->display();
    }

    /**
     * 抢购商品的信息
     */
    public function goodinfo(){
        $id=I("get.id");
        $this->goods=M('tpGoodsinfo')
            ->field('id,goodsname,goodsinfo,price,buynum,buytime,buyprice,pic')
            ->where("id=$id")
            ->select();
        $this->images=M("tpGoodsimages")
            ->where("goodsid=$id")
            ->select();
        $this->display();
    }

    //抢购商品下单
    public function qgorder(){
        $id=I("get.id");
        $this->setredis($id);
        $this->goods=M('tpGoodsinfo')
            ->field('id,goodsname,goodsinfo,price,buynum,buytime,buyprice,pic')
            ->where("id=$id")
            ->select();
        $this->display();
    }

    //提交订单
    public function submitOrder(){

    }

    //redis中缓存商品的信息
    public function setredis($gid=10){
        $id=2;//用户ID
        $gnum=1;//商品数量
        $num=M('tpGoodsinfo')->where("id=$gid")->getfield('buynum');//库存
        dump($num);
        $redis = new \Redis();
        $redis->connect('127.0.0.1', 6379);
        $len=$redis->llen('id'); //返回列表的长度
        $count = $num-$len; //实际库存-被抢购的库存 = 剩余可用库存
        //剩余可用库存大于0，可以将数据存入list中
        if($count>0){
            $redis->lpush('id',$id);//从列表头部插入用户ID
            $redis->lpush('gid',$gid);//从列表头部插入商品ID
            $redis->lpush('num',$gnum);//从列表头部插入商品数量
            /* 下面处理抢购成功流程 */
            M('tpGoodsinfo')->where("id=$gid")->setDec('buynum', 1);//减少num库存字段
        }
        if(!$count) {
            return '已经抢光了哦';
        }
    }

    //获取购买用户的信息
    public function getredis(){
        $redis = new \Redis();
        $redis->connect('127.0.0.1', 6379);
        $len=$redis->llen('id'); //返回列表的长度
        //取出list中的数据
        for($i=0;$i<$len;$i++){
            $data[$i]['id']=$redis->lpop('id');
            $data[$i]['gid']=$redis->lpop('gid');
            $data[$i]['num']=$redis->lpop('num');
        }
        echo '<pre>';
        var_dump($data);
    }
}