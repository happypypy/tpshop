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

    //分类页面到商品分类的信息页面
    public function typegoods(){
        $id=I("get.id");
        $gid=I("get.gid");
        //点击跳转的商品类型信息
        $this->type=M('tpGoodstype')->where("id=$id")->field('id,tname')->select();
        //其他商品类型的信息
        $this->types=M('tpGoodstype')
            ->where("pid>0 and id!=$id")
            ->field('id,tname')
            ->limit(7)->select();
        //数据信息
        $this->data=M('tpGoodsinfo')->where("tid=$id")
            ->field('id,goodsname,goodsinfo,price,soldnum,sale,pic')
            ->select();
        $this->display();
    }

    //商品分类信息的查询
   public function typeinfo(){
        $id=I("get.id");
        $data=M('tpGoodsinfo')->where("tid=$id")
            ->field('id,goodsname,goodsinfo,price,soldnum,sale,pic')
            ->select();
        return $this->ajaxReturn($data);
    }

}