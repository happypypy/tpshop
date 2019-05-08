<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    //首页遍历

    public function index(){
        $this->goods=M('goods_ad')
            ->where('ad_place=7')
            ->select();

        //$this->assign('goods',$goods);
        //一层
        $this->goods_info=M('tp_goodsinfo')
            ->field('goodsname,price,pic,sale,id')
            ->where('tid=13 or tid=11')
            ->limit(7)
            ->select();
        //二层
        $this->goodsy=M('tp_goodsinfo')
            ->field('goodsname,price,pic,sale,id')
            ->where('tid=34')
            ->limit(7)
            ->select();
        //三层
        $this->goodsyf=M('tp_goodsinfo')
            ->field('goodsname,price,pic,sale,id')
            ->limit(7)
            ->select();

        //四层
        $this->goodssf=M('tp_goodsinfo')
            ->field('goodsname,price,pic,sale,id')
            ->where('tid=58')
            ->limit(7)
            ->select();
        //五层
        $goodsname=I('post.goodsname');
        $data['goodsname']=array('like',"%$goodsname%");
        if($goodsname){
            $this->goodsList=M('tp_goodsinfo')
                ->field('goodsname,price,pic,sale,id')
                ->where($data)
                ->limit(20)
                ->select();
        }else{
            $this->goodsList=M('tp_goodsinfo')
                ->field('goodsname,price,pic,sale,id')
                ->limit(20)
                ->select();
        }
        //广告图片
        $this->goodsa=M('tp_goodsad')
            ->where('id=1')
            ->select();
        $this->goodsad=M('tp_goodsad')
            ->where('id=2')
            ->select();
        $this->goodsadd=M('tp_goodsad')
            ->where('id=3')
            ->select();
        $this->goodsaddd=M('tp_goodsad')
            ->where('id=4')
            ->select();




        $this->display();
    }


    public function goodsdata(){
         $id=I('get.id');
        $goodimg=M('tp_goodsimages')
            ->field('pics')
            ->where("goodsid=$id")
            ->select();
           // dump($goodimg);
        $goods=M('tp_goodsinfo')
            ->field('goodsname,price,sale')
            ->where("id=$id")
            ->select();
        $this->goodsyf=M('tp_goodsinfo')
            ->field('goodsname,price,pic,sale,id')
            ->limit(7)
            ->select();
        //为你推荐
        $this->goodsList=M('tp_goodsinfo')
            ->field('goodsname,price,pic,sale,id')
            ->limit(20)
            ->select();
        $this->assign('goods',$goods);
        $this->assign('goodimg',$goodimg);
        $this->display("index/ui-product");

    }
}