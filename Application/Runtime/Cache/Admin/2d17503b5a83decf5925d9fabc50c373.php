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

<title>添加论文信息 - H-ui.admin v3.1</title>
</head>
<body>
<article class="page-container">
	<form action="" method="post" class="form form-horizontal" id="form-member-add" enctype="multipart/form-data">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>教师姓名：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<?php if($_SESSION['u_name']== 'admin'): ?><input type="text" class="input-text" value="<?php echo ($info["name"]); ?>" placeholder="课程教师" id="name" name="name">
				<?php else: ?>
				<input type="text" class="input-text" value="<?php echo (session('u_name')); ?>" disabled/>
				<input type="hidden" name="name" value="<?php echo (session('u_name')); ?>"><?php endif; ?>					
			</div>
		</div>
		<input type="hidden" value="<?php echo ($info["id"]); ?>" name="id">

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>论文名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" placeholder="论文名称" value="<?php echo ($info["title"]); ?>" name="title" id="title">
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>论文作者：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" placeholder="论文作者" value="<?php echo ($info["author"]); ?>" name="author" id="author">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">论文类型：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select name="type" class="select" size="1">
					<option value="0">请选择论文类型</option>
					<option <?php if($info['type'] == bz): ?>selected='1'<?php endif; ?> value="bz">报刊论文</option>
					<option <?php if($info['type'] == zz): ?>selected='1'<?php endif; ?> value="zz">杂志论文</option>
					<option <?php if($info['type'] == hy): ?>selected='1'<?php endif; ?> value="hy">会议论文</option>
				</select>
				</span> </div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>关键字：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" placeholder="论文关键字" value="<?php echo ($info["keyword"]); ?>" name="keyword" id="keyword">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>发布时间版次：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text"  value="<?php echo ($info["time"]); ?>" name="time" id="time" placeholder="例如 ：2017(4)">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>电子版资料：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<span class="btn-upload form-group">
  				<input class="input-text upload-url radius" type="text" name="uploadfile" id="uploadfile" readonly>
					<a href="javascript:void();" class="btn btn-primary radius">
						<i class="iconfont">&#xf0020;</i>
						浏览文件
					</a>
  				<input type="file" multiple name="file" value="$info.file" class="input-file">
			</span>
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
			name:{
				required:true
			},
            title:{
                required:true
            },
            author:{
                required:true
            },
            type:{
                required:true
            },
            keyword:{
                required:true
            },
            num:{
                required:true
            },
            publish:{
                required:true
            },
            time:{
                required:true
            }
		},
        messages: {
            name:{
                required:'请输入相关内容信息'
            },
            title:{
                required:'请输入相关内容信息'
            },
            author:{
                required:'请输入相关内容信息'
            },
            type:{
                required:'请输入相关内容信息'
            },
            keyword:{
                required:'请输入相关内容信息'
            },
            num:{
                required:'请输入相关内容信息'
            },
            publish:{
                required:'请输入相关内容信息'
            },
            time:{
                required:'请输入相关内容信息'
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
    // laydate.render({
    //     elem: '#time'
    // });

});
</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>