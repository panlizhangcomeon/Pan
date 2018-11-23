<?php
/**
 * Created by PhpStorm.
 * User: yixue
 * Date: 2018-11-22
 * Time: 15:33
 */
namespace core\lib;

class model extends \Medoo\Medoo
{
    public function __construct()
    {
        $option = \core\lib\conf::all('database');
        parent::__construct($option);
    }
}