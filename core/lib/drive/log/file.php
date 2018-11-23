<?php
/**
 * Created by PhpStorm.
 * User: yixue
 * Date: 2018-11-22
 * Time: 21:05
 */
namespace core\lib\drive\log;

use core\lib\conf;

class file
{
    public $path; //日志存储位置
    public function __construct()
    {
        $conf = conf::get('OPTION','log');
        $this->path = $conf['PATH'];
    }

    public function log($message, $file = 'log')
    {
        /**
         * 1.确定文件存储位置是否存在
         *    新建目录
         * 2.写入日志
         */
        $path = $this->path;
        $dir = $path . date('YmdH');
        $path = $path . date('YmdH') . '\\' . $file . '.php';
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        return file_put_contents($path, date('Y-m-d H:i:s ') . json_encode($message) . PHP_EOL, FILE_APPEND);
    }
}
/**文件系统
 * 每小时的日志存入 pan/log中
 */