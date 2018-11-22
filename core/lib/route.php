<?php
/**
 * Created by PhpStorm.
 * User: yixue
 * Date: 2018-11-21
 * Time: 21:09
 */
namespace core\lib;

class route
{
    public $module; //模块
    public $controller; //控制器
    public $action; //方法
    public function __construct()
    {
        //xx(项目名)/index(模块)/index(控制器)/index(方法)
        /**1.隐藏index.php
         * 2.获取URL参数
         * 3.返回对应模块、控制器和方法
        **/
        if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/') {
            //   pan/index/index/index
            $path = $_SERVER['REQUEST_URI'];
            $patharr = explode('/',trim($path,'/'));
            if (isset($patharr[1])) {
                $this->module = $patharr[1];
                unset($patharr[1]); //销毁数组模块对应值
            } else {
                $this->module = 'index';
            }
            if (isset($patharr[2])) {
                $this->controller = $patharr[2];
                unset($patharr[2]); //销毁数组控制器对应值
            } else {
                $this->controller = 'index';
            }
            if (isset($patharr[3])) {
                $this->action = $patharr[3];
                unset($patharr[3]); //销毁数组方法对应值
            } else {
                $this->action = 'index';
            }
            //   url多余部分转换成GET
            //   index/index/index/id/1
            $count = count($patharr) - 2;
            $i = 0;
            while ($i < $count) {
                    if (isset($patharr[$i + 5])) {
                        $_GET[$patharr[$i + 4]] = $patharr[$i + 5];
                    }
                $i = $i +2;
            }
        } else {
            $this->module = 'index';
            $this->controller = 'index';
            $this->action = 'index';
        }

    }
}