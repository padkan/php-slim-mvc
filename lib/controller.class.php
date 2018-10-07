<?php

class Controller
{
    protected $data;
    protected $model;
    protected $params;

    public function __construct($data = array())
    {
        $this->data = $data;
        $this->params = App::getRouter()->getParams();
    }

    /**
     *
     * getData
     *
     * @return   array
     *
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     *
     * getModel
     *
     * @return   object
     *
     */
    public function getModel()
    {
        return $this->model;
    }

}