<?php
/**
 * Project: wext-server-thinkphp3.2
 * Author: 诺墨 <normal@normalcoder.com>:
 * Github: https://github.com/wext-cc/wext-server-thinkphp3.2.git
 * Time: 2018/04/01 下午4:03
 * Discript: 全局函数库
 */

/**
 * 随机ID函数
 * @return string
 */
function getID($length = 5, $onlyID = false)
{
    $random_number = rand(1, 100000);
    $base_number = 100000;
    $new_num = $random_number + $base_number;
    $real_num = substr($new_num, 1, $length); //截取掉最前面的“1”,留下5位字符
    if ($onlyID) {
        return $real_num;
    } else {
        return time() . $real_num;
    }
}