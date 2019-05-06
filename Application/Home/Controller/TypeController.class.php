<?php
namespace Home\Controller;
use Think\Controller;
class TypeController extends Controller {
    public function index(){
        //热门推荐类型
        $this->hot=M('tpGoodstype')->where("hot=1")->limit(9)->select();
        //左边商品类型
        $this->type=M('tpGoodstype')->where('pid=0')->select();
        //右边商品数据
        $this->data=M('tpGoodstype')->where("pid>0")->select();
        $this->display();
    }

    //分类商品的信息
    public function typegoods(){
        $id=I("get.id");
        $data=M('tpGoodsinfo')->where("tid=$id")
            ->field('goodsname,goodsinfo,price,buynum,buytime,buyprice,pic')
            ->select();
        $this->display();
    }

}