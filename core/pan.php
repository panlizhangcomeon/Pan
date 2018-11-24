<?php
/**
 * 项目基类
 */

namespace core;

use core\lib\log;

class pan
{
    public $assign = array(); //临时变量，保存视图
    public static function run()
    {
        log::init(); //日志类初始化
        $route = new \core\lib\route;
        $module = $route->module;
        $controller = $route->controller;
        $action = $route->action;
        $controllerFile = APP . '\\' . $module . '\controller\\' . $controller . 'Controller.php';
        $controllerClass = '\\' . APPLICATION . '\index\controller\\' . $controller . 'Controller';
        if (is_file($controllerFile)) {
            $controllerPath = PAN . $controllerClass . '.php';
            include $controllerPath;
            $controller = new $controllerClass;
            $n = strpos($action,'?');
            if ($n != false) {
                $action = substr($action, 0, $n);
            } else {
                $action = $route->action;
            }
            $controller->$action();
            log::log('controller:' . $route->controller . '   ' . 'action:' . $action);
        } else {
            throw new\Exception('找不到控制器' . $controllerClass);
        }
    }

    /**
     *  视图方法
     */
    public function assign($name, $value)
    {
        $this->assign[$name] = $value;
    }

    public function display($file)
    {
        $route = new \core\lib\route();
        $module = $route->module;
        $file = APP . '\\' . $module . '\views\\' . $file;
        if (is_file($file)) {
            //extract($this->assign);
            //include_once '../vendor/autoload.php';
            $loader = new \Twig_Loader_Filesystem(APP . '\\' . $module . '\views');
            $twig = new \Twig_Environment($loader, array(
                'cache' => PAN . '\log\twig',
                'debug' => APP_DEBUG
            ));
            $template = $twig->load('index.html');
            $template->display($this->assign? $this->assign : array());
        }
    }
}
