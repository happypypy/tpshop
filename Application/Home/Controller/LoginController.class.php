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
//               $this->display('index:index');
                $this->redirect("Index/index");

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
            //获取数据
            $mem = M('member');
            $data['uname'] =$phone['uname'];
            $data['phone'] = $phone['phone'];
            $data['code'] = $phone['code'];
            $data['password'] =$phone['password'];
            //执行添加
            $mem->add($data);
            $this->redirect('Index/index');
        }else{

          $this->display();
        }
    }
}