<?php
/**
 * Project: wext-server-thinkphp3.2
 * Author: 诺墨 <normal@normalcoder.com>:
 * Github: https://github.com/wext-cc/wext-server-thinkphp3.2.git
 * Time: 2018/04/01 下午4:03
 * Discript: 空控制器
 */

namespace API\Controller;

use Think\Controller;

/**
 * 空控制器，负责处理无效的请求
 * Class EmptyController
 * @package API\Controller
 */
class EmptyController extends Controller
{
    /**
     * EmptyController constructor.
     */
    public function __construct()
    {

    }

    /**
     * 空方法
     */
    public function _empty()
    {
        $logid = getID();
        $extraData = I('param.');
        A('Common/MonologPlus')->log('warning', $logid,'0', 'no services', $extraData);
        echo "no services";
    }
}