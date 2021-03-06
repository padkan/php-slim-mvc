<?php


class Page extends Model
{
    /**
     *
     * get list page
     *
     * @return   mixed
     *
     */
    public function getList($only_published = false){
        $sql = "select * from pages where 1";
        if ( $only_published ){
            $sql .= " and is_published = 1";
        }
        return $this->db->query($sql);
    }
    /**
     *
     * get page by alias
     *
     * @param string
     *
     * @return   mixed
     *
     */
    public function getByAlias($alias){
        $alias = $this->db->escape($alias);
        $sql = "select * from pages where alias = '{$alias}' limit 1";
        $result = $this->db->query($sql);
        return isset($result[0]) ? $result[0] : null;
    }

}