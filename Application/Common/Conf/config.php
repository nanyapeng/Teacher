<?php
return array(
	//'配置项'=>'配置值'
    /* 数据库设置 */
    'DB_TYPE'               =>  'Mysql',     // 数据库类型
    'DB_HOST'               =>  '127.0.0.1', // 服务器地址
    'DB_NAME'               =>  'Teacher',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'root',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'te_',    // 数据库表前缀

    //模板常量替换
    'TMPL_PARSE_STRING'=>array(
        '__ADMIN__'    =>  __ROOT__.'/Public/Admin',// 站点后台公共目录
        '__HOME__'    =>  __ROOT__.'/Public/Home',// 站点后台公共目录
    ),
    //
    'SHOW_PAGE_TRACE'   =>  true,
    'DEFAULT_MODULE'    =>  'Admin',
);