<?php
namespace Home\Controller;
use Think\Controller;
class TypeController extends Controller {
    public function index(){
        //热门推荐类型
        $this->hot=M('goodsType')->where("hot=1")->limit(9)->select();
        //左边商品类型
        $this->type=M('goodsType')->where('pid=0')->select();
        //右边商品数据
        $this->data=M('goodsType')->where("pid>0")->select();
        $this->display();
    }
}