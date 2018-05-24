<?php
/**
 * Project: wext-server-thinkphp3.2
 * Author: 诺墨 <normal@normalcoder.com>:
 * Github: https://github.com/wext-cc/wext-server-thinkphp3.2.git
 * Time: 2018/04/01 下午4:03
 * Discript: 配置文件
 */
return array(
    //'配置项'=>'配置值'
    'LOAD_EXT_CONFIG'      => 'db,miniapp',
    'URL_MODEL'            => '2',//URL Rewrite Model
    'LOG_TYPE'             => 'monolog', // 日志记录类型 默认为文件方式
    'SHOW_PAGE_TRACE'      => false,
    'URL_CASE_INSENSITIVE' => false,   // 默认false 表示URL区分大小写 true则表示不区分大小写
);