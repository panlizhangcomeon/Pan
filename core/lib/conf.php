<?php
/**
 * Created by PhpStorm.
 * User: yixue
 * Date: 2018-11-22
 * Time: 19:59
 */
namespace core\lib;

class conf
{
    public static $conf = array(); //储存配置类，是否已存在

    //加载配置文件的单个配置
    public static function get($name, $file) //$file是不加后缀的文件名
    {
    /**
     * 1.判断配置文件是否存在
     * 2.判断配置是否存在
     * 3.加载配置
     */
        $file = PAN . '\core\config\\' . $file . '.php';
        if (is_file($file)) {
            if (isset(self::$conf[$file])) {
                return self::$conf[$file][$name];
            } else {
                $conf = include $file;
                if (isset($conf[$name])) {
                    self::$conf[$file] = $conf;
                    return $conf[$name];
                } else {
                    throw new \Exception('找不到配置项' . $name);
                }
            }
        } else {
            throw new \Exception('找不到配置文件' . $file);
        }
    }

    //加载配置文件的全部配置
    public static function all($file) //$file是不加后缀的文件名
    {
        /**
         * 1.判断配置文件是否存在
         * 2.判断配置是否存在
         * 3.加载配置
         */
        $file = PAN . '\core\config\\' . $file . '.php';
        if (is_file($file)) {
            if (isset(self::$conf[$file])) {
                return self::$conf[$file];
            } else {
                $conf = include $file;
                if (isset($conf)) {
                    self::$conf[$file] = $conf;
                    return $conf;
                } else {
                    throw new \Exception('找不到配置项' . $file);
                }
            }
        } else {
            throw new \Exception('找不到配置文件' . $file);
        }
    }
}