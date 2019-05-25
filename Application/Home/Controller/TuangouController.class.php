<?php
namespace Home\Controller;
use Think\Controller;
class TuangouController extends Controller {
    function index(){
        $res=M()->table('tp_goodsinfo as g')
            ->join('tp_tuan  as t on t.gid=g.id')
            ->select();
        //dump($res);
        $this->assign('tuan',$res);
        $this->display();
    }
//显示团购商品详情页面
    public function goodsdetails(){
        $id=I("get.id");
        $this->tuanid=I("get.tuan");

        $this->goods=M('tpGoodsinfo')
            ->where("id=$id")
            ->select();
        $this->images=M("tpGoodsimages")
            ->where("goodsid=$id")
            ->select();
        $this->tuan=M('tp_tuan')->where("gid=$id")->select();
        //查询出没有完成拼团的,没有就不assign
        $res=M()->table('tp_tuanuser as u')->join('tp_tuanstate as s on u.flag=s.id')->where("s.state=0")->where("u.tid=$this->tuanid and s.state=0")->select();
        //dump($res);
       // $res=M('tp_tuanuser')->where("tid=$this->tuanid")->select();
        //dump($res);
        //开团人信息
        if(!empty($res)){
            $user=$res[0]['uid'];
            $this->uname=M('member')->where("uid=$user")->getField('uname');
            $flag=$res[0]['flag'];
            $num=M('tp_tuanuser')->where("flag=$flag")->count();
            // echo $num;die;
            $size=M("tp_tuan")->where("id=$this->tuanid")->getField("size");
            $this->num=$size-$num;
            if($res){

                $this->tuan=1;//表示有拼团任务，在页面上显示出来
                $this->flag=$res[0]['flag'];

            }
            if($res){
                $this->assign('user',$res);
            }
        }


        $this->display();
    }

    //开团页面
    public function kaituan(){
        $id=I("get.tuan");
        $res=M("tp_tuan")->where("id=$id")->find();
        //dump($res);
        $gid=$res['gid'];
        $sale=$res['t_sale'];
        $this->redirect('Createorder/index',array("gid"=>$gid,"num"=>1,"sale"=>$sale,'tuan'=>$id));
    }

    //添加数据库
    public function addtuan($flag,$ordersn){
        $tuan=I("get.tuan");
        $uid=session('uid');
        //查询此人是否已经参加过拼团
        $bool=M("tp_tuanuser")->where("tid=$tuan and uid=$uid")->find();
        //如果没有参加过，就允许参加
        if(!$bool){
            //开团
            if($flag==0){
                $flag=(int)(date("mdHis"));
               // dump($flag);die;
                M("tp_tuanstate")->add(['id'=>$flag,'state'=>0]);
            }
            //echo $flag;
            $res=M("tp_tuanuser")->add(['tid'=>$tuan,'uid'=>$uid,'flag'=>$flag,'ordersn'=>$ordersn]);
            if($res){
                $this->tuanstate($flag,$tuan);
            }else{
                echo "拼团失败";
                die();
            }
        }else{
           //已参加过此活动
            $this->redirect('Tuangou/failll');
           // echo "您已参加过此次活动，将关注其他活动";
            die();
        }
    }

    //修改团购订单状态
    function tuanstate($flag,$tuan){
        //查询开团人数是否达到，达到则修改状态
       // echo $flag;
        $num=M('tp_tuanuser')->where("flag=$flag")->count();
       // echo $num;die;
        $size=M("tp_tuan")->where("id=$tuan")->getField("size");
        //echo $tuan."<br/>",$size;die;
        //人数够了
        if($num==$size){
            M("tp_tuanstate")->where("id=$flag")->data(['state'=>1])->save();
        }else{
            //不够不修改

        }

    }

    //有人参团
    function cantuan(){
        //接受flag，查询商品信息
        $flag=I("get.flag");
        $res=M()->table("tp_tuan as t")->join("tp_tuanuser as u on t.id=u.tid")->where("u.flag=$flag")->find();
        //dump($res);
        $gid=$res['gid'];
        $tuanid=$res['tid'];
        $this->goodsinfo=M("tp_goodsinfo")->where("id=$gid")->find();
       // dump($this->goodsinfo);
        //还差几人开团
        $num=M('tp_tuanuser')->where("flag=$flag")->count('flag');
        //echo $num;
        $size=M("tp_tuan")->where("id=$tuanid")->getField("size");
        $this->num=$size-$num;
        $this->assign('tuan',$res);
        $this->display();
    }

//到提交订单页面
    function cantuanorder(){
        $flag=I("get.flag");
        $res=M()->table("tp_tuan as t")->join("tp_tuanuser as u on t.id=u.tid")->where("u.flag=$flag")->find();
        //dump($res);
        $gid=$res['gid'];
        $tuanid=$res['tid'];
        $sale=$res['t_sale'];
        $this->redirect('Createorder/index',array("gid"=>$gid,"num"=>1,"sale"=>$sale,'tuan'=>$tuanid,'flag'=>$flag));

    }
     function failll(){
       $this->display();

     }


}