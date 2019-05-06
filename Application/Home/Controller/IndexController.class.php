<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->goods=M('goods_ad')
            ->where('ad_place=7')
            ->select();

        //$this->assign('goods',$goods);
        $this->goods_info=M('goods_info')
            ->field('goodsname,price,pic')
            ->limit(7)
            ->select();

        $this->goodsy=M('goods_info')
            ->field('goodsname,price,pic')
            ->where('id=148')
            ->select();
        $this->goodsyf=M('goods_info')
            ->field('goodsname,price,pic')
            ->where('id=147')
            ->select();
        $this->display();

    }
}