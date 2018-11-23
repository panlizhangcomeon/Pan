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
        $model = new \app\index\model\cModel();
        $data = [
            'name' => 'papapas'
        ];
        $data = $model->remove($data);
        dump($data);
    }
    public function test()
    {
        $title = '视图文件';
        $data = 'hello world!!!';
        $this->assign('title', $title);
        $this->assign('data', $data);
        $this->display('index.html');
    }
    public function hello()
    {
        $data = 'hello world!!!2333';
        $this->assign('data', $data);
        $this->display('hello.html');
    }
}