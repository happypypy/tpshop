<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    //登录界面
    public function index(){


       $this->display();

    }

    //注册界面
    public function regist(){
        //判断是否是post提交
        if(IS_POST) {
            //接受数据
            $phone = I('post.');
            //     dump($phone['phone']);
            //执行数据库添加
            $mem = M('member');
            $data['uname'] =$phone['uname'];
            $data['phone'] = $phone['phone'];
            $data['code'] = $phone['code'];
            $data['password'] =$phone['pass'];
            $mem->add($data);
            $this->display('index:index');
        }else{

          $this->display();
        }
    }
}