<?php

class Payment extends Model
{
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
        $sql = "insert into payments set  user_id = {$data['user_id']}, ref_id = {$data['ref_id']},price = {$data['price']} ,type = '{$pay_type}' ,date = now()";
        return $this->db->query($sql);
    }
}