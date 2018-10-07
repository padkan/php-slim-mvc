<?php

class OrdersController extends Controller
{
    //invoice total
    protected $total;
    //reference ID
    protected $refID;

    public function __construct($data = array())
    {
        parent::__construct($data);
        $this->model = new Order();
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
        if(!empty($_POST)) {
            $_POST['user_id'] = Session::get('user_id');
            //save  order
            $this->model->save($_POST);
            $_POST['order_id'] = $this->model->getLastId();
            $this->refID = $_POST['order_id'];
            $products = $this->_filterOrder($_POST);
            $this->model = new Orderdetails();
            //save all order_detail
            foreach($products as $product){
                $this->model->save($product);
            }
            Session::set('refId', $this->refID);
            Session::set('invoiceTotal', $this->total);
            Router::redirect('/payments/view/'.$_POST['pay_type']);
        }
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
        $this->data['orders'] = $this->model->getList(Session::get('user_id'));
    }
    /**
     *
     * view detail's order
     *
     * @return   mixed
     *
     */
    public function detail()
    {
        $params = App::getRouter()->getParams();
        if ( isset($params[0]) ){
            $order_id = strtolower($params[0]);
            $this->model = new Orderdetails();
            $this->data['details'] = $this->model->getList($order_id);
        }


    }
    /**
     *
     * filter and prepare data for detail 's order
     *
     */
    private function _filterOrder($data){
        $this->total = 0;
        if(!empty($data) && count($data['product_id'])>0){
            $products = array();
            for($i=0; $i < count($data['product_id']); $i++){
                $products[$i]['product_id'] = $data['product_id'][$i];
                $products[$i]['qty'] = $data['quantity'][$i];
                $products[$i]['price'] = $data['price'][$i];
                $products[$i]['order_id'] = $data['order_id'];
                $this->total += $products[$i]['qty'] * $products[$i]['price'];
            }
            return $products;
        }
    }
}