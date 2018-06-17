<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
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
<link rel="stylesheet" type="text/css" href="/Public/Admin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="/Public/Admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>添加管理员 - 管理员管理 - H-ui.admin v3.1</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="page-container">
	<form class="form form-horizontal" id="form-admin-add" action="" method="post">
		<input type="hidden" name="id" value="<?php echo ($info["id"]); ?>">
	<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>教师：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<?php if($_SESSION['u_name']== 'admin'): ?><input type="text" class="input-text" value="<?php echo ($info["name"]); ?>" placeholder="课程教师" id="name" name="name">
				<?php else: ?>
				<input type="text" class="input-text" value="<?php echo (session('u_name')); ?>" disabled/>
				<input type="hidden" name="name" value="<?php echo (session('u_name')); ?>"><?php endif; ?>		
			</div>
		</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>课程名称：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="<?php echo ($info["title"]); ?>" placeholder="课程名称" id="title" name="title">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>课程编号：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" autocomplete="off" value="<?php echo ($info["code"]); ?>" placeholder="课程编号" id="code" name="code">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>课时数：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" autocomplete="off" value="<?php echo ($info["score"]); ?>"  placeholder="课程课时" id="score" name="score">
		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">考察方式：</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
		<select class="select" name="exam" size="1">
			<option value="">请选择考察方式</option>
			<option value="1" <?php if($info["exam"] == 2): ?>selected='1'<?php endif; ?> >考试课</option>
			<option value="2" <?php if($info["exam"] == 1): ?>selected='1'<?php endif; ?> >考查课</option>
			<!--<option value="3">栏目编辑</option>-->
		</select>
		</span> </div>
	</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>班级：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" placeholder="" value="<?php echo ($info["class"]); ?>" name="class" id="class">
			</div>
		</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>教室：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" placeholder="请使用英文逗号分隔教室" value="<?php echo ($info["classroom"]); ?>" name="classroom" id="classroom">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>上课时间：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" placeholder="请输入上课时间（如。周一,周二）" value="<?php echo ($info["time"]); ?>" name="time" id="time">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>起止时间：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" placeholder="请输入课程开始时间（如 第2周）" value="<?php echo ($info["start"]); ?>" name="start" id="start">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>结束时间：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" placeholder="请输入课程结束时间（如 第14周）" value="<?php echo ($info["end"]); ?>" name="end" id="end">
		</div>
	</div>
		
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">备注：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<textarea name="remark" cols="" rows="" class="textarea"  placeholder="备注信息" dragonfly="true" onKeyUp="$.Huitextarealength(this,100)">
				<?php echo ($info["remark"]); ?>
			</textarea>
			<p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
		</div>
	</div>
	<div class="row cl">
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
			<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
		</div>
	</div>
	</form>
</article>

<!--_footer 作为公共模版分离出去--> 
<script type="text/javascript" src="/Public/Admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/Admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/Public/Admin/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/Public/Admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/Public/Admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/Public/Admin/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/Public/Admin/lib/jquery.validation/1.14.0/messages_zh.js"></script> 
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$("#form-admin-add").validate({
		rules:{
            name:{
                required:true,
            },
            title:{
                required:true,
            },
            code:{
                required:true,
            },
            score:{
                required:true,
            },
            exam:{
                required:true,
            },
            classroom:{
                required:true,
            },
            time:{
                required:true,
            },
            start:{
                required:true,
            },
            end:{
                required:true,
            }
		},
        messages: {
            name:{
                required:'请输入内容'
            },
            title:{
                required:'请输入内容'
            },
            code:{
                required:'请输入内容'
            },
            score:{
                required:'请输入内容'
            },
            exam:{
                required:'请输入内容'
            },
            classroom:{
                required:'请输入内容'
            },
            time:{
                required:'请输入内容'
            },
            start:{
                required:'请输入内容'
            },
            end:{
                required:'请输入内容'
            }
        },
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			$(form).ajaxSubmit({
				success: function(res){
				    if(res.status == 0){
                        layer.msg(res.msg,
							{time:1000}
							);
					}else{
                        layer.msg('添加成功!',
                            {time:1000}
                        );
                        window.parent.location.reload();

					}
				}
			});

		}
	});
});
</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>