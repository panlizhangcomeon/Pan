<?php
/**
 * Created by PhpStorm.
 * User: yixue
 * Date: 2018-11-23
 * Time: 16:41
 */
namespace app\index\model;

use core\lib\model;

class cModel extends model
{
    public $table = 'stu';

    //查询所有字段
    public function show()
    {
        $res = $this->select($this->table,'*');
        return $res;
    }

    //根据id查询某个字段
    public function getOne($id)
    {
        $res = $this->select($this->table,'*',[ 'id' => $id ]);
        return $res;
    }

    //添加字段
    public function add($data)
    {
        $res = $this->insert($this->table, $data);
        return $res;
    }

    //更新字段
    public function save($id, $data)
    {
        $res = $this->update($this->table, $data, [ 'id' => $id ]);
        return $res;
    }

    //删除字段
    public function remove($data)
    {
        $res = $this->delete($this->table, $data);
        return $res;
    }
}
