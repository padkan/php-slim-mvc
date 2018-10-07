<?php


class user extends Model
{
    /**
     *
     * get login
     *
     * @param    string
     * @return   mixed
     *
     */
    public function getByLogin($login){
        $login = $this->db->escape($login);
        $sql = "select * from users where login = '{$login}' limit 1";
        $result = $this->db->query($sql);
        if(isset($result[0])){
            return $result[0];
        }
        return false;
    }
    /**
     *
     * save user
     *
     *
     * @return   mixed
     *
     */
    public function save($data)
    {

        $login = $this->db->escape($data['login']);
        $email = $this->db->escape($data['email']);
        $hash = md5(Config::get('salt').$data['password']);
            $sql = "insert into users set login = '{$login}', 
                    email = '{$email}',
                    role = 'user',
                    password = '{$hash}',
                    is_active = 1";
        return $this->db->query($sql);
    }

}