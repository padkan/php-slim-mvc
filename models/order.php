<?php

class Order extends Model
{
    /**
     *
     * get list
     *
     * @return   mixed
     *
     */
    public function getList($user_id){
        $sql = "select * from orders where user_id = {$user_id}";
        return $this->db->query($sql);
    }
    /**
     *
     * save
     *
     * @param string
     *
     * @return   mixed
     *
     */
    public function save($data)
    {
        $pay_type = $this->db->escape($data['pay_type']);
        $sql = "insert into orders set  user_id = {$data['user_id']}, pay_type = '{$pay_type}', date = now()";
        return $this->db->query($sql);
    }
    /**
     *
     * get last ID
     *
     *
     * @return   int
     *
     */
    public function getLastId(){
        return db::$last_id;
    }

}