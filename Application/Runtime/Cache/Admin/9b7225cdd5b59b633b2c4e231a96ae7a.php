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
    <title>出版教材</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 业绩管理 <span
        class="c-gray en">&gt;</span> 出版教材 <a class="btn btn-success radius r btn-refresh" style="line-height:1.6em;margin-top:3px"
                                              href="javascript:location.replace(location.href);" title="刷新"><i
        class="Hui-iconfont">&#xe68f;</i></a></nav>
<?php if($_SESSION['u_id']== 1): ?><div class="page-container" style="text-align: center;">
        <form action="<?php echo U('search');?>" method="post">
            <input type="text" class="input-text" style="width:250px" placeholder="输入教师姓名" id="t_name" name="t_name">
            <button type="submit" class="btn btn-success radius" id="search" name=""><i class="Hui-iconfont">&#xe665;</i> 搜教师</button>
        </form>
    </div><?php endif; ?>
<div class="cl pd-5 bg-1 bk-gray mt-20"><span class="l"> <a
        href="javascript:;" onclick="member_add('添加教材信息','<?php echo U("Book/add");?>','','510')" class="btn btn-primary radius"><i
        class="Hui-iconfont">&#xe600;</i> 添加教材信息</a></span></div>
<div class="mt-20">
    <table class="table table-border table-bordered table-hover table-bg table-sort">
        <thead>
        <tr class="text-c">
            <th width="25"><input type="checkbox" name="" value=""></th>
            <th>ID</th>
            <th>教师</th>
            <th>书名</th>
            <th>作者</th>
            <th>isbn编号</th>
            <th>分类</th>
            <th>版次</th>
            <th>页数</th>
            <th>字数</th>
            <th>出版社</th>
            <th>时间</th>
            <th>文件资料</th>
            <th>备注</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><tr class="text-c">
                <td><input type="checkbox" value="" name="id"></td>
                <td><?php echo ($row["id"]); ?></td>
                <td><?php echo ($row["name"]); ?></td>
                <td><?php echo ($row["title"]); ?></td>
                <td><?php echo ($row["author"]); ?></td>
                <td><?php echo ($row["isbn"]); ?></td>
                <td><?php echo ($row["cate"]); ?></td>
                <td><?php echo ($row["version"]); ?></td>
                <td><?php echo ($row["page"]); ?></td>
                <td><?php echo ($row["num"]); ?></td>
                <td><?php echo ($row["publish"]); ?></td>
                <td><?php echo ($row["time"]); ?></td>
                <td><?php if($row["file"] == '' ): ?>未上传 <?php else: ?> <a href="<?php echo U('Book/downfile',array('id'=>$row['id']));?>">下载</a><?php endif; ?></td>
                <td><?php echo ($row["remark"]); ?></td>
                <!--<td class="td-status"><span class="label label-success radius">已发布</span></td>-->
                <td class="f-14 td-manage">
                    <a title="编辑" href="javascript:;" onclick="member_edit('课设信息修改','<?php echo U("Book/edit",array("id"=>$row["id"]));?>','4','','510')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
                    <a title="删除" href="javascript:;" onclick="member_del(this,<?php echo ($row['id']); ?>)" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
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
    /*用户-编辑*/
    function member_edit(title, url, id, w, h) {
        layer_show(title, url, w, h);
    }

    /*用户-删除*/
    function member_del(obj, id) {
        layer.confirm('确认要删除吗？', function (id) {
            $.ajax({
                type: 'post',
                url: "<?php echo U('Book/del');?>",
                dataType: 'json',
                data:{id:id},
                success: function (data) {
                    if(data.status == 0){
                        layer.msg('删除失败!', {time: 1000});
                    }else{
                        $(obj).parents("tr").remove();
                        layer.msg('已删除!', {icon: 1, time: 1000});
                    }
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