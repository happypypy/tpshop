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
            $id=$find['0']['uid'];
            session('uid',$id);
            if($find){
              //dump($id=session('uid'));
                $this->display('index:index');
            }else{
                echo "账户或密码错误";
            }
            //登陆跳转
        }else{
            //不是post提交则display
            $this->display();
        }
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
            $data['password'] =$phone['password'];
            $mem->add($data);
            $this->display('index:index');
        }else{

          $this->display();
        }
    }
}