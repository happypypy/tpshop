<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    //登录界面
    public function login(){

        //判断是否是post提交
        if(IS_POST){
            //接受数据
            $phone=I('post.');
            //和数据库对比
            $mem=M('member');
            $data['uname']=$phone['uname'];
            $data['password']=$phone['password'];
            $find=$mem->where($data)->select();
            //获取id值存入session
            $uid=$find['0']['uid'];
            session('uid',$uid);
            //判断对比数据库结果
            if($find){
              //$id=session('uid');
             // $this->display('index:index');
                $this->redirect("Index/index");

            }else{
                $this->error('账号或密码错误',U("Login/login"),2);
            }
            //登陆跳转
        }else{
            //不是post提交则display
            $this->display();
        }
    }




    //注册界面
    public function regist(){
//        echo "11111111";
        //判断是否是post提交
        if(IS_POST) {
            //表单验证
            $model= D("member");//获取模型传来的值
            $res['uname'] = I('post.uname');
            $res['phone'] = I('post.phone');
            $res['password'] = I('post.password');
            $res['password1'] = I('post.password1');
            $data1 = $model->create();

            if($data1){

              $phone = I('post.');
                //获取数据
                $mem = M('member');
                $data['uname'] =$phone['uname'];
                $data['phone'] = $phone['phone'];
                $data['code'] = $phone['code'];
                $data['password'] =$phone['password'];
                $data['password']=$phone['password1'];
                //执行添加
                $data=$mem->add($data1);
                $this->display("login/login");
                $find=$mem->where($data)->select();
                //获取id值存入session
                $uid=$find['0']['uid'];
                session('uid',$uid);
                $this->redirect('Index/index');
            }else{
                $error = $model->getError();
                $this->assign("error", $error);
                $this->display('login/regist');

        }
        }else{
            $this->display();
        }

    }


    //设置页面
    function res(){


        $this->display();
}

  //退出
    function sets(){
         //获取session
        $uid=session('uid');
        //清空session
        session('uid',null);
        $this->redirect("Login/login");

    }

    //生成验证码
    function codeImg(){
        $c=[
            'length'=>4, //验证码位数
            'useNoise'=>true,//开启验证码杂点
            'imageW'=>0,
            'imageH'=>50,
            'codeSet'=>'0123456789',
        ];
        $Verify=new \Think\Verify($c);
        $Verify->entry();

    }
}