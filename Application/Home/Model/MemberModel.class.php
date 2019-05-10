<?php
namespace Home\Model;
use Think\Model;

Class MemberModel extends Model
{
     function checkName(){
         $data=$_POST['uname'];
         $M=M('menber');
         $info=$M->where($data)->select();
         if($info){
         return true;
         }else{
             return false;
         }
     }

    protected $_validate = array(
        array('code','require','验证码必须！'),  // 都有时间都验证
        array('uname','require','账户名不能为空'),
        array('uname','checkName','帐号错误！',1,'function',4),  // 只在登录时候验证
        array('password','require','密码不能为空!'),
        array('password','checkPwd','密码错误！',1,'function',4), // 只在登录时候验证
    );


}