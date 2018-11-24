<?php
/**
公共函数库
 */
namespace app\core\common\func;

class func
{
    public function get($str)
    {
        if (isset($_GET[$str])) {
            return $_GET[$str];
        } else {
            return false;
        }
    }

    public function post($str)
    {
        if (isset($_POST[$str])) {
            return $_POST[$str];
        } else {
            return false;
        }
    }
}
