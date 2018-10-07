<?php

class ProductsController extends Controller
{
    public $subVariantColor;

    public function __construct($data = array())
    {
        parent::__construct($data);
        //prepare data for Variant
        $this->model = new Attribute();
        $this->subVariantColor = $this->model->getList(Config::get('variant')['color']);

        //prepare data model for Product
        $this->model = new Product();
    }
    /**
     *
     * get product list
     *
     * @return   mixed
     *
     */
    public function index()
    {
        $params = App::getRouter()->getParams();

        if ( isset($params[0]) && $params[0] != ''  ) {
            $id = strtolower($params[0]);
            $this->data['products'] = $this->model->getListByAttrId($id);
            echo json_encode($this->data['products']);
            //TODO create router API for better performance
            exit;
        }else{
            $this->data['products'] = $this->model->getList();
            $this->data['variant']['color'] = $this->subVariantColor;
        }

    }

    /**
     *
     * view product
     *
     * @return   mixed
     *
     */
    public function view()
    {
        $params = App::getRouter()->getParams();

        if ( isset($params[0]) ){
            $id = strtolower($params[0]);

            $this->data['product'] = $this->model->getByID($id);
        }
    }
}