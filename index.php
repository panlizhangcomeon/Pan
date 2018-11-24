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

spl_autoload_register('\core\pan::load'); //new一个类的时候类不存在就会触发方法

\core\pan::run();
