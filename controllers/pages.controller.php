<?php

class PagesController extends Controller
{
    public function __construct($data = array())
    {
        parent::__construct($data);
        $this->model = new Page();
    }
    /**
     *
     * get page list
     *
     * @return   mixed
     *
     */
    public function index()
    {
        $this->data['pages'] = $this->model->getList();
    }
    /**
     *
     * view order
     *
     * @return   mixed
     *
     */
    public function view()
    {
        $params = App::getRouter()->getParams();

        if ( isset($params[0]) ){
            $alias = strtolower($params[0]);

            $this->data['page'] = $this->model->getByAlias($alias);
        }
    }

    /*         ---------- Admin Area ------------       */

    /**
     *
     * get page list
     *
     * @return   mixed
     *
     */
    public function admin_index(){
        $this->data['pages'] = $this->model->getList();
    }
}