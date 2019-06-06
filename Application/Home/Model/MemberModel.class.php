<?php
namespace Home\Model;
use Think\Model;

Class MemberModel extends Model
{

    protected $patchValidate = true;
    protected $_validate = array(
        array('code','checkcode','验证码不正确!',0,"callback"),
        array('uname','require','账户名不能为空'),
        array('phone','require','手机号不能为空'),
        array('uname','',"账户名不能重复",1,'unique',1),
        array('password','require','密码不能为空!'),
        array('password1','require','确认密码不能为空!'),
        array('password1','password','两次密码不一致',0,'confirm')

    );
    //生成验证码
    function checkcode($code){
        $Verify=new \Think\Verify();
        return $Verify->check($code);
    }


}