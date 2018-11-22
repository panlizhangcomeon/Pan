<?php
/**
 * 项目基类
 */

namespace core;

class pan
{
    public static $classMap = array(); //临时变量，储存已经加载好的类
    public $assign = array(); //临时变量，保存视图
    public static function run()
    {
        $route = new \core\lib\route;
        $module = $route->module;
        $controller = $route->controller;
        $action = $route->action;
        $controllerFile = APP . '/' . $module . '/controller/' . $controller . 'Controller.php';
        $controllerClass = '\\' . APPLICATION . '\index\controller\\' . $controller . 'Controller';
        if (is_file($controllerFile)) {
            $controllerPath = ROOT . $controllerClass . '.php';
            include $controllerPath;
            $controller = new $controllerClass;
            $controller->$action();
        } else {
            throw new\Exception('找不到控制器' . $controllerClass);
        }
    }

    public static function load($class) //参数为new的类名，类名和文件名一致
    {
        //自动加载类
        //$class = '\core\lib\route.php'  =>  PAN.'/core/lib/route.php
        if (isset($classMap[$class])) {
            return true;
        }else{
            $class = str_replace('\\', '/', $class);
            if (PAN . $class . '.php') {
                include PAN . $class . '.php';  // include 相关类文件，所以可以用 new \core\lib\route 来实例化
                self::$classMap[$class] = $class;
            } else {
                return false;
            }
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
        $file = APP . '/' . $module . '/views/' . $file;
        if (is_file($file)) {
            extract($this->assign);
            include $file;
        }
    }
}