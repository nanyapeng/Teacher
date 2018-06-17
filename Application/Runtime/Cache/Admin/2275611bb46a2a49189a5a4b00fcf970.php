<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/Public/Admin/lib/html5shiv.js"></script>
<script type="text/javascript" src="/Public/Admin/lib/respond.min.js"></script>
<![endif]-->
<link href="/Public/Admin/static/h-ui/css/H-ui.min.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/static/h-ui.admin/css/H-ui.login.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/static/h-ui.admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/lib/Hui-iconfont/1.0.8/iconfont.css" rel="stylesheet" type="text/css" />
<!--[if IE 6]>
<script type="text/javascript" src="/Public/Admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>后台登录</title>
</head>
<body>

<div class="loginWraper">
  <div id="loginform" class="loginBox">
    <form class="form form-horizontal" action="" method="post" id="login">
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
        <div class="formControls col-xs-8">
          <input id="" name="name" type="text" placeholder="账户" class="input-text size-L">
        </div>
      </div>
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
        <div class="formControls col-xs-8">
          <input id="" name="password" type="password" placeholder="密码" class="input-text size-L">
        </div>
      </div>
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <input class="input-text size-L" type="text" placeholder="验证码" name="captcha" onblur="if(this.value==''){this.value='验证码:'}" onclick="if(this.value=='验证码:'){this.value='';}" style="width:150px;">
          <img src="/index.php/Admin/Admin/verify" id="img">
        </div>
      </div>
  <!--    <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <label for="online">
            <input type="checkbox" name="online" id="online" value="">
            使我保持登录状态</label>
        </div>
      </div>-->
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <input name="" type="submit" class="btn btn-success radius size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
          <input name="" type="reset" class="btn btn-default radius size-L" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
        </div>
      </div>
    </form>
  </div>
</div>
<div class="footer">Copyright 物联1401 贺阳飞</div>
<script type="text/javascript" src="/Public/Admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script src="/Public/Admin/jquery.form.min.js"></script>
<script type="text/javascript" src="/Public/Admin/layer/layer.js"></script>
<script>
  $(function () {
      $('#img').click(function(){
          var src='/index.php/Admin/Admin/verify?_='+new Date().getTime();
        $(this).attr('src',src);
      });
      var options = {
          success: function (res) {
              console.log(res);
              if(res.status==0){
                  layer.msg(res.msg);
                  //刷新验证码
                  var src='/index.php/Admin/Admin/verify?_='+new Date().getTime();
                  $('#img').attr('src',src);
              }else {
                  layer.msg('登录成功');
                  location.href="/index.php/admin/index";
              }
          }
      };
      $("#login").ajaxForm(options);
  });
</script>
</body>
</html>