<?php

class Attribute extends Model
{
    /**
     *
     * get list
     *
     * @return   mixed
     *
     */
    public function getList($parrent_id)
    {
        $sql = "select * from attributes where parent_id = $parrent_id";
        return $this->db->query($sql);
    }
}