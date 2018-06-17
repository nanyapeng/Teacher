<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/Public/Admin/lib/html5shiv.js"></script>
    <script type="text/javascript" src="/Public/Admin/lib/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="/Public/Admin/static/h-ui/css/H-ui.min.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Admin/static/h-ui.admin/css/H-ui.admin.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Admin/lib/Hui-iconfont/1.0.8/iconfont.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Admin/static/h-ui.admin/skin/default/skin.css" id="skin"/>
    <link rel="stylesheet" type="text/css" href="/Public/Admin/static/h-ui.admin/css/style.css"/>
    <!--[if IE 6]>
    <script type="text/javascript" src="/Public/Admin/lib/DD_belatedPNG_0.0.8a-min.js"></script>
    <script>DD_belatedPNG.fix('*');</script>

    <![endif]-->
    <title>用户管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 教师管理 <span
        class="c-gray en">&gt;</span> 教师列表 <a class="btn btn-success radius r btn-refresh" style="line-height:1.6em;margin-top:3px"
                                              href="javascript:location.replace(location.href);" title="刷新"><i
        class="Hui-iconfont">&#xe68f;</i></a></nav>
<?php if($_SESSION['u_id']== 1): ?><div class="page-container" style="text-align: center;">
    <form action="<?php echo U('search');?>" method="post">
        <input type="text" class="input-text" style="width:250px" placeholder="输入教师姓名" id="t_name" name="t_name">
        <button type="submit" class="btn btn-success radius" id="search" name=""><i class="Hui-iconfont">&#xe665;</i> 搜教师</button>
    </form>
</div><?php endif; ?>

<div class="cl pd-5 bg-1 bk-gray mt-20">
    <span class="l">
        <?php if($_SESSION['u_id']== 1): ?><a href="javascript:;" onclick="member_add('添加教师','<?php echo U("Teacher/add");?>','','510')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加教师</a><?php endif; ?>
    </span> </div>
<div class="mt-20">
    <table class="table table-border table-bordered table-hover table-bg table-sort">
        <thead>
        <tr class="text-c">
            <th><input type="checkbox" name="" value=""></th>
            <th>ID</th>
            <th>用户名</th>
            <th>性别</th>
            <th>生日</th>
            <th>学历</th>
            <th>职称</th>
            <th>手机</th>
            <th>邮箱</th>
            <th>地址</th>
            <th>加入时间</th>
            <!--<th width="70">状态</th>-->
            <th width="100">操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><tr class="text-c">
                <td><input type="checkbox" value="1" name=""></td>
                <td><?php echo ($row["id"]); ?></td>
                <td>
                   <?php echo ($row["name"]); ?>
                </td>
                <td><?php if($row["gender"] == 1): ?>男<?php elseif($row["gender"] == 2): ?>女<?php else: ?>未知<?php endif; ?></td>
                <td><?php echo ($row["birthday"]); ?></td>
                <td><?php if($row["study"] == 1): ?>本科<?php elseif($row["study"] == 2): ?>研究生<?php elseif($row["study"] == 3): ?>博士<?php else: ?>未知<?php endif; ?></td>
                <td><?php if($row["deep"] == 1): ?>讲师<?php elseif($row["deep"] == 2): ?>副教授<?php elseif($row["deep"] == 3): ?>教授<?php else: ?>未知<?php endif; ?></td>
                <td><?php echo ($row["phone"]); ?></td>
                <td><?php echo ($row["email"]); ?></td>
                <td class="text-l"><?php echo ($row["address"]); ?></td>
                <td><?php echo ($row["jointime"]); ?></td>
                <!--<td class="td-status">-->
                    <!--<?php if($row["status"] == 1): ?><span class="label label-success radius">已启用</span><?php else: ?><span class="label label-warning radius">已停用</span><?php endif; ?>-->
                <!--</td>-->
                <td class="td-manage">
                    <!--<a style="text-decoration:none" onClick="member_stop(this,'10001')" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>-->
                    <a title="编辑" href="javascript:;" onclick="member_edit('修改信息','<?php echo U("Teacher/edit",array("id"=>$row["id"]));?>','4','','510')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
                    <a style="text-decoration:none" class="ml-5" onClick="change_password('修改密码','<?php echo U("Teacher/changepassword",array("id"=>$row["id"]));?>','10001','600','270')" href="javascript:;" title="修改密码"><i class="Hui-iconfont">&#xe63f;</i></a>
                    <a title="删除" href="javascript:;" onclick="member_del(this,'1')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
                    <?php if($row["email"] != '' && $_SESSION['u_name']== 'admin'): ?><a style="text-decoration:none" class="ml-5" onClick="change_password('发送邮件','<?php echo U("Teacher/email",array("id"=>$row["id"]));?>','10001','800','400')" href="javascript:;" title="发送邮件"><i class="Hui-iconfont">&#xe603;</i></a><?php endif; ?>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/Public/Admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/Public/Admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/Public/Admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/Public/Admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/Public/Admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/Public/Admin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
    $(function () {
        $('.table-sort').dataTable({
            "aaSorting": [[1, "desc"]],//默认第几个排序
            "bStateSave": true,//状态保存
            "aoColumnDefs": [
                //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
                {"orderable": false, "aTargets": [0, 8, 9]}// 制定列不参与排序
            ]
        });


    });


    /*用户-添加*/
    function member_add(title, url, w, h) {
        layer_show(title, url, w, h);
    }

    /*用户-查看*/
    function member_show(title, url, id, w, h) {
        layer_show(title, url, w, h);
    }

    /*用户-停用*/
    function member_stop(obj, id) {
        layer.confirm('确认要停用吗？', function (index) {
            $.ajax({
                type: 'POST',
                url: '',
                dataType: 'json',
                success: function (data) {
                    $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_start(this,id)" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a>');
                    $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
                    $(obj).remove();
                    layer.msg('已停用!', {icon: 5, time: 1000});
                },
                error: function (data) {
                    console.log(data.msg);
                },
            });
        });
    }

    /*用户-启用*/
    function member_start(obj, id) {
        layer.confirm('确认要启用吗？', function (index) {
            $.ajax({
                type: 'POST',
                url: '',
                dataType: 'json',
                success: function (data) {
                    $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_stop(this,id)" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>');
                    $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
                    $(obj).remove();
                    layer.msg('已启用!', {icon: 6, time: 1000});
                },
                error: function (data) {
                    console.log(data.msg);
                },
            });
        });
    }

    /*用户-编辑*/
    function member_edit(title, url, id, w, h) {
        layer_show(title, url, w, h);
    }

    /*密码-修改*/
    function change_password(title, url, id, w, h) {
        layer_show(title, url, w, h);
    }

    /*用户-删除*/
    function member_del(obj, id) {
        layer.confirm('确认要删除吗？', function (index) {
            $.ajax({
                type: 'POST',
                url: '',
                dataType: 'json',
                success: function (data) {
                    $(obj).parents("tr").remove();
                    layer.msg('已删除!', {icon: 1, time: 1000});
                },
                error: function (data) {
                    console.log(data.msg);
                },
            });
        });
    }
</script>
</body>
</html>