<?php
/**
 * Created by PhpStorm.
 * User: yixue
 * Date: 2018-11-22
 * Time: 14:58
 */
namespace app\index\controller;

use app\core\common\func;
use app\index\model\stuModel;
use core\lib\conf;

class indexController extends \core\pan
{
    //所有留言
    public function index()
    {
        $func = new func\func();
        $name = $func->get('name');
        $this->assign('data', "$name" . ' 欢迎使用pan框架！');
        $this->display('index.html');
    }

    //数据库查询示例
    public function search()
    {
        $model = new stuModel();
        $arr = $model->show();
        dump($arr);
        $this->assign('data', '数据库查询示例如上');
        $this->display('addMsg.html');
    }

    //测试模板
    public function blog()
    {
        $this->assign('data', '测试');
        $this->display('index.html');
    }
}
