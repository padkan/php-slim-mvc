<?php

class Orderdetails extends Model
{
    /**
     *
     * get list
     *
     * @return   mixed
     *
     */
    public function getList($order_id){
        $sql = "select * from order_details where order_id = {$order_id}";
        return $this->db->query($sql);
    }
    /**
     *
     * save details
     *
     *
     * @return   mixed
     *
     */
    public function save($data)
    {

        $sql = "insert into order_details set  order_id = {$data['order_id']},product_id = {$data['product_id']}, price = {$data['price']}, qty = {$data['qty']}";
        return $this->db->query($sql);
    }
}