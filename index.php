<?php
/**
 * 入口文件
 * 1.定义常量
 * 2.加载函数库
 * 3.启动框架
 */

date_default_timezone_set('Asia/Shanghai');
define('PAN', realpath('./')); //框架所在目录 D:\phpStudy\PHPTutorial\WWW\pan
define('CORE', PAN . '\core'); //框架核心文件所在目录 D:\phpStudy\PHPTutorial\WWW\pan\core
define('APP', PAN . '\app'); //项目目录 D:\phpStudy\PHPTutorial\WWW\pan\app
define('APPLICATION', 'app'); //应用目录
define('APP_DEBUG', true); //开启调试模式

include "vendor/autoload.php"; //引入错误展示类

if (APP_DEBUG) {
    $whoops = new \Whoops\Run;
    $errorTitle = '框架出错了';
    $option = new \Whoops\Handler\PrettyPageHandler();
    $option->setPageTitle($errorTitle);
    $whoops->pushHandler($option);
    $whoops->register();
    ini_set('display_errors', 'On'); //打开错误显示开关
} else {
    ini_set('display_errors', 'Off');
}

include PAN . '\core\common\function.php';

include CORE . '\pan.php';

$classMap = array();//临时变量，储存已经加载好的类

spl_autoload_register(function ($class) {
    if (isset($classMap[$class])) {
        return true;
    }else{
        //$class = str_replace('\\', '/', $class);
        if (PAN . $class . '.php') {
            include PAN . '\\' . $class . '.php';  // include 相关类文件，所以可以用 new \core\lib\route 来实例化
            $classMap[$class] = $class;
        } else {
            return false;
        }
    }
}); //new一个类的时候类不存在就会触发方法 ， 匿名函数中引入类的文件路径

\core\pan::run();


