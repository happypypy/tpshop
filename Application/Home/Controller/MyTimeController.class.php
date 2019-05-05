<?php
namespace Home\Controller;
use Think\Controller;
class MyTimeController extends Controller {
    public function index(){
        //抢购产品
        $this->goods=M('goodsInfo')
            ->field('id,goodsname,price,buynum,buytime,buyprice,pic')
            ->where('is_buy=1')
            ->select();
        $this->display();
    }
}