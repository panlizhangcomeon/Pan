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
        $id = $func->get('name');
        echo $id;
        $this->assign('data', 'index');
        $this->display('index.html');
    }

    //添加留言
    public function search()
    {
        $model = new stuModel();
        $arr = $model->show();
        dump($arr);
        $this->assign('data', 'dock');
        $this->display('index.html');
    }

    //保存留言
    public function blog()
    {
        $this->assign('data', 'blog');
        $this->display('index.html');
    }
}