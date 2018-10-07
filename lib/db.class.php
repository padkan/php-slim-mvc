<?php

class db
{
    protected $connection;
    public  static $last_id;
    /**
     *
     * create new connection
     *
     */
    public function __construct($host,$user,$password,$db_name)
    {
        $this->connection = new mysqli($host,$user,$password,$db_name);
        if( mysqli_connect_error()){
            throw new Exception('could not connect to database !');
        }
    }
    /**
     *
     * query
     *  prepare query and run it
     * @param    string
     * @return   mixed
     *
     */
    public function query($sql)
    {
        if(!$this->connection){
            return false;
        }
        $result = $this->connection->query($sql);
        $pos = strpos($sql, "insert");
        if($pos === false){
            self::$last_id = null;
        }else{
            self::$last_id = mysqli_insert_id($this->connection);
        }

        if(mysqli_error($this->connection)){
            throw new Exception(mysqli_error($this->connection));
        }

        if(is_bool($result)){
            return $result;
        }

        $data = array();
        while( $row = mysqli_fetch_assoc($result)){
            $data[] = $row;
        }
        return $data;
    }
    /**
     *
     * escape
     *  escape query string
     * @param    string
     * @return   string
     *
     */
    public function escape($str)
    {
       return mysqli_escape_string($this->connection, $str);
    }
    public function getLastId(){
        return $this->last_id;
    }
}