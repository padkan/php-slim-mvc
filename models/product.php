<?php

class Product extends Model
{
    /**
     *
     * get list
     *
     * @return   mixed
     *
     */
    public function getList(){
        $sql = "select * from products";
        return $this->db->query($sql);
    }
    /**
     *
     * get list by Attr ID
     *
     * @return   mixed
     *
     */
    public function getListByAttrId($id){
        $sql = "select * from products inner join product_attributes
                on products.id = product_attributes.product_id
                where product_attributes.attribute_id = {$id} ";
        return $this->db->query($sql);
    }



    /**
     *
     * get product by id
     *
     * @param int
     *
     * @return   mixed
     *
     */
    public function getByID($id){
        $id = $this->db->escape($id);
        $sql = "select * from pages where id = '{$id}' limit 1";
        $result = $this->db->query($sql);
        return isset($result[0]) ? $result[0] : null;
    }


}