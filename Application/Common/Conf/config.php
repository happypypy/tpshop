<?php
return array(
	//'配置项'=>'配置值'
    'DEFAULT_MODULE'     => 'Index', //默认模块
    'URL_MODEL'          => '2', //URL模式

    'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST' => '39.107.92.255', // 服务器地址
    'DB_NAME'   => 'shop', // 数据库名
    'DB_USER'   => 'root', // 用户
    'DB_PWD'    => '123456', // 密码
    'DB_PREFIX' => '', // 数据库表前缀

    'DATA_CACHE_PREFIX' => 'tp',//缓存前缀
    'DATA_CACHE_TYPE'=>'Redis',//缓存类型
    'REDIS_RW_SEPARATE' => false, //是否开启Redis读写分离
    'REDIS_HOST'=>'127.0.0.1',
    'REDIS_PORT'=>'6379',//端口号
    'REDIS_TIMEOUT'=>'300',//超时时间
    'REDIS_PERSISTENT'=>false,//是否长连接
    'REDIS_AUTH'=>'test',//AUTH认证密码
    'DATA_CACHE_TIME'=> 10800, // 数据缓存有效期 0表示永久缓存

    'SHOW_PAGE_TRACE' =>true,
);