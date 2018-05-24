<?php

/**
 * Project: wext-server-thinkphp3.2
 * Author: 诺墨 <normal@normalcoder.com>:
 * Github: https://github.com/wext-cc/wext-server-thinkphp3.2.git
 * Time: 2018/04/01 下午4:03
 * Discript: 用户模型
 */

namespace Common\Model;

use Think\Model;

class UserModel extends Model
{
    /**
     * @var string
     */
    protected $tableName = 'users';

    /**
     * 检查指定OpenID用户是否存在
     * @param $openid
     * @return mixed
     */
    function checkUserByOpenID($openid)
    {
        $map['openid'] = $openid;
        return $this->where($map)->find();
    }

    /**
     * 新增用户
     * @param $data
     * @return mixed
     */
    function addWxUser($data)
    {
        $time = time();
        $dt = array(
            'openid'          => $data['openid'],
            'unionid'         => $data['unionid'],
            'create_time'     => date('Y-m-d H:i:s', $time), //创建时间
            'last_login_time' => date('Y-m-d H:i:s', $time), //最后一次登陆时间
            'token'           => md5($data['openid'] . $time), //登陆校验盐
        );
        return $this->add($dt);
    }

    /**
     * 更新用户登陆时间
     * @param $openid
     * @return bool|mixed
     */
    function updateLoginInfo($openid)
    {
        $time = time();
        $map['openid'] = $openid;
        $dt = array(
            'last_login_time' => date('Y-m-d H:i:s', $time), //最后一次登陆时间
        );
        $res = $this->where($map)->save($dt);
        if ($res || $res == 0) {
            return $dt['token'];
        } else {
            return false;
        }
    }

    /**
     * 更新微信用户信息
     * @param $openid
     * @param $data
     * @return bool
     */
    function updateUsersWeChatInfo($openid, $data)
    {
        $map['openid'] = $openid;
        $dt = array(
            'nickname'    => $data['nickname'],
            'gender'      => $data['gender'],
            'language'    => $data['language'],
            'city'        => $data['city'],
            'ptovince'    => $data['province'],
            'country'     => $data['country'],
            'avatar'      => $data['avatarurl'],
            'update_time' => date('Y-m-d H:i:s', time()), //资料更新时间
        );
        return $this->where($map)->save($dt);
    }
}