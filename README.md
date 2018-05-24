* [项目介绍](#%E9%A1%B9%E7%9B%AE%E4%BB%8B%E7%BB%8D)
* [安装使用](#%E5%AE%89%E8%A3%85%E4%BD%BF%E7%94%A8)
	* [环境要求](#%E7%8E%AF%E5%A2%83%E8%A6%81%E6%B1%82)
	* [安装](#%E5%AE%89%E8%A3%85)
	* [接口说明](#%E6%8E%A5%E5%8F%A3%E8%AF%B4%E6%98%8E)
		* [用户登陆接口 /User/login](#%E7%94%A8%E6%88%B7%E7%99%BB%E9%99%86%E6%8E%A5%E5%8F%A3+%2FUser%2Flogin)
		* [用户资料更新接口 /User/UserUpdateInfo](#%E7%94%A8%E6%88%B7%E8%B5%84%E6%96%99%E6%9B%B4%E6%96%B0%E6%8E%A5%E5%8F%A3+%2FUser%2FUserUpdateInfo)
* [二次开发 & 扩展](#%E4%BA%8C%E6%AC%A1%E5%BC%80%E5%8F%91+%26+%E6%89%A9%E5%B1%95)
	* [二次开发示例](#%E4%BA%8C%E6%AC%A1%E5%BC%80%E5%8F%91%E7%A4%BA%E4%BE%8B)
	* [常用函数说明（位于API/BaseController）](#%E5%B8%B8%E7%94%A8%E5%87%BD%E6%95%B0%E8%AF%B4%E6%98%8E%EF%BC%88%E4%BD%8D%E4%BA%8EAPI%2FBaseController%EF%BC%89)
* [其他](#%E5%85%B6%E4%BB%96)



<a name="%E9%A1%B9%E7%9B%AE%E4%BB%8B%E7%BB%8D"></a>

# 项目介绍
微信小程序组件 wext 服务端接入示例代码（ThinkPHP3.2版本）

本项目提供小程序会话SESSION方案

---

<a name="%E5%AE%89%E8%A3%85%E4%BD%BF%E7%94%A8"></a>

# 安装使用
<a name="%E7%8E%AF%E5%A2%83%E8%A6%81%E6%B1%82"></a>

### 环境要求

> PHP >= 5.4，MySQL >= 5.6
> 
> 支持Composer [如何安装Composer - composer中文文档](http://www.kancloud.cn/thinkphp/composer)

<a name="%E5%AE%89%E8%A3%85"></a>

### 安装
> * 将代码 git clone 到web服务器根目录
> * 在代码根目录执行 `composer install`，安装依赖性的Composer组件
> * 导入 `database/wext.sql` 到数据库
> * 修改数据库配置文件 `application/Common/Conf/db.php`，修改对应的数据库地址（DB_HOST）、数据库名（DB_NAME）、数据库用户（DB_USER）和密码（DB_PWD）
> * 登陆微信小程序后台 [https://mp.weixin.qq.com/](https://mp.weixin.qq.com/)，获取对应小程序的 AppID 和  AppSecret，修改小程序配置文件 `application/Common/Conf/miniapp.php` 中对应配置
> * 根据自身服务器环境配置小程序后台的request合法域名。

<a name="%E6%8E%A5%E5%8F%A3%E8%AF%B4%E6%98%8E"></a>

### 接口说明

<a name="%E7%94%A8%E6%88%B7%E7%99%BB%E9%99%86%E6%8E%A5%E5%8F%A3+%2FUser%2Flogin"></a>

#### 用户登陆接口 /User/login

> 通过提交小程序用户登陆获得的code，换取并自动在DB中记录用户OPENID

<a name="%E7%94%A8%E6%88%B7%E8%B5%84%E6%96%99%E6%9B%B4%E6%96%B0%E6%8E%A5%E5%8F%A3+%2FUser%2FUserUpdateInfo"></a>

#### 用户资料更新接口 /User/UserUpdateInfo

> 用于更新微信用户信息

---

<a name="%E4%BA%8C%E6%AC%A1%E5%BC%80%E5%8F%91+%26+%E6%89%A9%E5%B1%95"></a>

# 二次开发 & 扩展
<a name="%E4%BA%8C%E6%AC%A1%E5%BC%80%E5%8F%91%E7%A4%BA%E4%BE%8B"></a>

### 二次开发示例
在 `application/API/Controller` 下新建一个控制器，命名为`DemoController.class.php`，内容如下

```php
<?php
namespace API\Controller;

/**
 * 一个扩展示例
 * Class UserController
 * @package API\Controller
 */
class DemoController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function test()
    {
        $this->SuccessResponse();
    }
}
```

访问项目地址 `/Demo/test`，将获得返回信息如下：
```json
{"ret":1,"data":""}
```

<a name="%E5%B8%B8%E7%94%A8%E5%87%BD%E6%95%B0%E8%AF%B4%E6%98%8E%EF%BC%88%E4%BD%8D%E4%BA%8EAPI%2FBaseController%EF%BC%89"></a>

### 常用函数说明（位于API/BaseController）

> checkOnline - 检查会话是否正常，是否已经做了OPENID登陆
> 
> checkParams - 对提交参数的信息/提交方式/是否必须/非空进行检测，并作出反馈
> 
> SuccessResponse - 请求成功，符合期望时接口相应函数
> 
> ErrorResponse - 请求成功，不符合期望时接口相应函数

<a name="%E5%85%B6%E4%BB%96"></a>

# 其他

本项目微信接口基于 [EasyWechat](https://github.com/overtrue/wechat) 开发。

