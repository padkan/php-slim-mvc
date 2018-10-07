<?php

class PaymentsController extends Controller
{
    protected $paymentType;

    public function __construct($data = array())
    {
        parent::__construct($data);
        $this->model = new Payment();
        $this->paymentType = Config::get('payment_type');

    }
    /**
     *
     * Master  Method
     *
     *
     */
    protected function masterPay()
    {
        $_POST['pay_type'] = "Master";
        $this->_preparePaymentData();
        $this->_save($_POST);
    }
    /**
     *
     * Visa  Method
     *
     *
     */
    protected function visaPay()
    {
        $_POST['pay_type'] = "Visa";
        $this->_preparePaymentData();
        $this->_save($_POST);
    }
    /**
     *
     * view and confirm payment
     *
     */
    public function view(){
        $params = App::getRouter()->getParams();
        if ( isset($params[0]) ){
            $this->data['pay_type'] = $params[0];
        }

    }
    /**
     *
     * pay
     *
     */
    public function pay()
    {
        $params = App::getRouter()->getParams();
        if ( isset($params[0]) &&
            Session::get('user_id') &&
            in_array($params[0], $this->paymentType)){
            $payment_fun = $params[0]."Pay";
            $this->{$payment_fun}();
        }else{
            Session::setFlash('No valid payment function.');
        }
    }
    /**
     *
     * prepare PaymentData
     *
     */
    private function _preparePaymentData(){
        $_POST['user_id'] = Session::get('user_id');
        $_POST['ref_id'] = Session::get('refId');
        $_POST['price'] = Session::get('invoiceTotal');
    }
    /**
     *
     * save transaction info for payment
     *
     */
    private function _save($data){
        if($this->model->save($data)){
            Session::setFlash('Your payment is successful.');
        }else{
            Session::setFlash('No valid payment function.');
        }
    }
}