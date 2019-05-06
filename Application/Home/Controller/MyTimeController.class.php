<?php
namespace Home\Controller;
use Think\Controller;
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
            ->field('goodsname,goodsinfo,price,buynum,buytime,buyprice,pic')
            ->where("id=$id")
            ->select();
        $this->images=M("tpGoodsimages")
            ->where("goodsid=$id")
            ->select();
        $this->display();
    }
}