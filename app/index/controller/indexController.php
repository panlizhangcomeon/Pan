<?php
/**
 * Created by PhpStorm.
 * User: yixue
 * Date: 2018-11-22
 * Time: 14:58
 */
namespace app\index\controller;

class indexController extends \core\pan
{
    public function index()
    {
        echo "its is index" . "<br>";
        $model = new \core\lib\model();
        $sql = 'select * from stu where id = 1';
        $res = $model->query($sql);
        echo '<pre>';
        var_dump($res->fetchAll());
    }
    public function test()
    {
        $title = '视图文件';
        $data = 'hello world';
        $this->assign('title', $title);
        $this->assign('data', $data);
        $this->display('index.html');
    }
}