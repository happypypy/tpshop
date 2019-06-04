<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>手机注册</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<meta name="description" content="Write an awesome description for your new site here. You can edit this line in _config.yml. It will appear in your document head meta (for Google search results) and in your feed.xml site description.
">
<link rel="stylesheet" href="/Public/Login/lib/weui.min.css">
<link rel="stylesheet" href="/Public/Login/css/jquery-weui.css">
<link rel="stylesheet" href="/Public/Login/css/style.css">
</head>
<body ontouchstart>
<form action="<?php echo U('Home/Login/regist');?>" method="post">
<!--主体-->
<header class="wy-header">
  <div class="wy-header-icon-back"><span></span></div>
  <div class="wy-header-title">手机注册</div>
</header>
<div class="weui-content">
  <div class="weui-cells weui-cells_form wy-address-edit">
      <div class="weui-cell weui-cell_vcode">
          <div class="weui-cell__hd"><label class="weui-label wy-lab">用户名</label></div>
          <div class="weui-cell__bd"><input class="weui-input" name="uname" type="text" placeholder="请输入用户名"></div>
          <div class="weui-cell__ft weui-vcode-img"></div>
      </div>

    <div class="weui-cell weui-cell_vcode">
      <div class="weui-cell__hd"><label class="weui-label wy-lab">手机号</label></div>
      <div class="weui-cell__bd"><input class="weui-input" type="text" name="phone" placeholder="请输入手机号"></div>
      <div class="weui-cell__ft"><button class="weui-vcode-btn">获取验证码</button></div>
    </div>

    <div class="weui-cell weui-cell_vcode">
      <div class="weui-cell__hd"><label class="weui-label wy-lab">验证码</label></div>
      <div class="weui-cell__bd"><input class="weui-input" name="code" type="verify" placeholder="请输入验证码"></div>
      <div class="weui-cell__ft weui-vcode-img"></div>
    </div>

    <div class="weui-cell">
      <div class="weui-cell__hd"><label class="weui-label wy-lab">设置密码</label></div>
      <div class="weui-cell__bd " onclick="xx"><input class="weui-input" name="password" type="password"  placeholder="请输入新密码"></div>
    </div>

    <div class="weui-cell">
      <div class="weui-cell__hd"><label class="weui-label wy-lab">确认密码</label></div>
      <div class="weui-cell__bd"><input class="weui-input" type="password" name="password1"  placeholder="请再次输入新密码"></div>
    </div>
  </div>
  <label for="weuiAgree" class="weui-agree">
    <input id="weuiAgree" type="checkbox" class="weui-agree__checkbox" checked="checked">
    <span class="weui-agree__text">阅读并同意<a href="javascript:void(0);">《注册协议》</a></span>
  </label>
 <a href=""><input class="weui-btn_warn weui-btn-area weui-btn" type="submit" value="注册并登录">
  <div class="weui-cells__tips t-c font-12"><h3>登陆账号为您输入的手机号码</h3></div></a>
  <div class="weui-cells__tips t-c pd-10"><a href="xieyi.html" class="weui-cell_link font-12">查看注册协议</a></div>
  
</div>

<script src="/Public/Login/lib/jquery-2.1.4.js"></script> 
<script src="/Public/Login/lib/fastclick.js"></script> 
<script type="text/javascript" src="/Public/Login/js/jquery.Spinner.js"></script>
<script>
  $(function() {
    FastClick.attach(document.body);
  });
</script>

<script src="/Public/Login/js/jquery-weui.js">
</script>

</form>
</body>
</html>