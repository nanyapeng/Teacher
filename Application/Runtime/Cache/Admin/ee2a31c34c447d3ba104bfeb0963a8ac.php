<?php if (!defined('THINK_PATH')) exit();?><!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/favicon.ico" >
<link rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/Public/Admin/lib//html5shiv.js"></script>
<script type="text/javascript" src="/Public/Admin/lib//respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/Public/Admin/static//h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/static//h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/lib//Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/static//h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/static//h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="/Public/Admin/lib//DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<!--/meta 作为公共模版分离出去-->

<title>添加课设信息 - H-ui.admin v3.1</title>
</head>
<body>
<article class="page-container">
	<form action="" method="post" class="form form-horizontal" id="form-member-add">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>指导教师:</label>
			<div class="formControls col-xs-8 col-sm-9">
				<?php if($_SESSION['u_name']== 'admin'): ?><input type="text" class="input-text" value="<?php echo ($info["name"]); ?>" placeholder="课程教师" id="name" name="name">
				<?php else: ?>
				<input type="text" class="input-text" value="<?php echo (session('u_name')); ?>" disabled/>
				<input type="hidden" name="name" value="<?php echo (session('u_name')); ?>"><?php endif; ?>				
			</div>
		</div>
		<input type="hidden" value="<?php echo ($info["id"]); ?>" name="id">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>课设题目：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" placeholder="课设题目" value="<?php echo ($info["title"]); ?>" name="title" id="title">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>学号：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" placeholder="学生学号" value="<?php echo ($info["num_id"]); ?>" name="num_id" id="num_id">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>班级：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" placeholder="学生班级" value="<?php echo ($info["class"]); ?>" name="class" id="class">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>手机：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" placeholder="联系方式" value="<?php echo ($info["phone"]); ?>" name="phone" id="phone">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>作品名称</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" placeholder="课设题目" value="<?php echo ($info["sign_name"]); ?>" name="sign_name" id="sign_name">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>学生姓名</label>
			<div class="formControls col-xs-8 col-sm-9">

					<input type="text" class="input-text" placeholder="指导老师姓名" value="<?php echo ($info["stu_name"]); ?>" name="stu_name" id="stu_name">

			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>分数：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" placeholder="获得分数" value="<?php echo ($info["score"]); ?>" name="score" id="score">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>开始时间：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text"  value="<?php echo ($info["start"]); ?>" name="start" id="start">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>结束时间：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text"  value="<?php echo ($info["end"]); ?>" name="end" id="end">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">备注：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea name="remark" cols="" rows="" class="textarea"  placeholder="还有什么要说的" onKeyUp="$.Huitextarealength(this,100)">
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
<script type="text/javascript" src="/Public/Admin/lib//jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/Admin/lib//layer/2.4/layer.js"></script>
<script type="text/javascript" src="/Public/Admin/laydate/laydate.js"></script>
<script type="text/javascript" src="/Public/Admin/static//h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/static//h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本--> 
<script type="text/javascript" src="/Public/Admin/lib//My97DatePicker/4.8/WdatePicker.js"></script>
<!--<script type="text/javascript" src="/Public/Admin/jquery.form.min.js"></script>-->
<script type="text/javascript" src="/Public/Admin/lib//jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/Public/Admin/lib//jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/Public/Admin/lib//jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$("#form-member-add").validate({
		rules:{
			stu_name:{
				required:true
			},
            num_id:{
                required:true
            },
            class:{
                required:true
            },
            phone:{
                required:true
            },
            title:{
                required:true
            },
            name:{
                required:true
            },
            start:{
                required:true
            },
            end:{
                required:true
            }
		},
        messages: {
            stu_name: {
                required: "请输入学生姓名"
            },
            num_id: {
                required: "请输入学生学号"
            },
            class: {
                required: "请输入学生班级"
            },
            phone: {
                required: "请输入学生联系方式"
            },
            title: {
                required: "请输入课设题目"
            },
            name: {
                required: "请输入指导教师姓名"
            },

            start: {
                required: "请选择开始时间"
            },
            end: {
                required: "请选择结束时间"
            }
        },
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
            var options = {
                success: function (res) {
                    if(res.status==0){
                        layer.alert(res.msg);
                    }else {
                        window.parent.location.reload();
                    }
                }
            };
			$(form).ajaxSubmit(options);

		}
	});
    laydate.render({
        elem: '#start'
    });
    laydate.render({
        elem: '#end'
    });

});
</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>