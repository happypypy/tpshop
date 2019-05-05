<?php
namespace Home\Controller;
use Think\Controller;
class MyTimeController extends Controller {
    public function index(){
        $this->goods=M('goodsInfo')
            ->field('id,goodsname,price,buynum,buytime,buyprice')
            ->where('is_buy=1')
            ->select();
        $this->display();
    }
}