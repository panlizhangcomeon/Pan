<?php
/**
 * Created by PhpStorm.
 * User: yixue
 * Date: 2018-11-22
 * Time: 15:33
 */
namespace core\lib;

class model extends \PDO
{
    public function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=test';
        $username = 'root';
        $passwd = '123456';
        try{
            parent::__construct($dsn, $username, $passwd);
        } catch (\PDOException $e) {
            echo '数据库连接错误：'. $e->getMessage();
        }
    }
}
