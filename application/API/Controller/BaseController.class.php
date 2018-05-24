<?php
/**
 * Project: wext-server-thinkphp3.2
 * Author: 诺墨 <normal@normalcoder.com>:
 * Github: https://github.com/wext-cc/wext-server-thinkphp3.2.git
 * Time: 2018/04/01 下午4:03
 * Discript: 基础控制器
 */

namespace API\Controller;

use Think\Controller\RestController;
use normalcoder\Think\Logger;

/**
 * API接口基础控制器
 * Class BaseController
 * @package API\Controller
 */
class BaseController extends RestController
{
    /**
     * @var logid 日志编码
     */
    private $logid;

    /**
     * @var logindex 日志索引
     */
    private $logindex;


    /**
     * @param string $level
     * @param null   $tip
     * @param null   $extraData
     * @param null   $SessionInfo
     * @return bool
     */
    protected function log($level = 'info', $tip = null, $extraData = null, $SessionInfo = null)
    {
        $this->logindex = $this->logindex >= 0 ? $this->logindex + 1 : $this->logindex;
        A('Common/MonologPlus')->log($level, $this->logid, $this->logindex, $tip, $extraData, $SessionInfo);
        return true;
    }

    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->logid = getID();
        $extraData = I('param.');
        $this->log('info', '', $extraData);
    }

    /**
     * 在线检测
     * @return bool
     */
    public function checkOnline()
    {
        if (empty($_SESSION['openid'])) {
            $this->ErrorResponse('01');
        } else {
            return true;
        }
    }

    /**
     * 参数检查
     * @param $type
     * @param $ParamsName
     * @param $notice
     */
    public function checkParams($type, $ParamsName, $notice, $isRequired = true, $allowNull=false)
    {
        if ($isRequired) { //必填参数
            if (!I($type . '.' . $ParamsName) && I($type . '.' . $ParamsName) != 0) { //参数错误，请求缺少参数
                $this->ErrorResponse('', $notice);
            }
        }
        if (empty(trim(I($type . '.' . $ParamsName)))) {
            if ($allowNull){
                return trim(I($type . '.' . $ParamsName));//返回响应的数据
            }else{
                $this->ErrorResponse('', $notice);
            }
        } else {
            return trim(I($type . '.' . $ParamsName));//返回响应的数据
        }
    }



    /**
     * =============================== 接口响应单元 ===============================
     */

    /**
     * 成功返回消息函数
     * @param $data
     * @param $DataFormat
     */
    public function SuccessResponse($data = '')
    {
        $result['ret'] = 1;
        $result['data'] = $data;
        $this->response($result, "json");
        exit();
    }

    /**
     * 失败返回消息函数
     * @param $errorInfo
     * @param $DataFormat
     */
    public function ErrorResponse($code = '', $errorInfo = '')
    {
        $result['ret'] = 0;
        $result['code'] = $code;
        switch ($code) {
            case "01": //未登录
                $result['error'] = "账号未登录，请授权登陆后使用";
                break;
            case "02": //系统接口异常
                $result['error'] = "系统异常:" . $errorInfo;
                break;
            case "03": //日志异常
                $result['error'] = "系统异常:" . $errorInfo;
                break;
            case "04": //参数解析异常
                $result['error'] = "参数异常:" . $errorInfo;
                break;
            case "05": //参数解析异常
                $result['error'] = "参数错误:" . $errorInfo;
                break;
            case "06": //业务类错误
                $result['error'] = $errorInfo;
                break;
            default:
                $result['error'] = $errorInfo;
                break;
        }
        $this->response($result, 'json');
        exit();
    }

}