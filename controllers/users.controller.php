<?php


class UsersController extends Controller
{
    public function __construct($data = array())
    {
        parent::__construct($data);
        $this->model = new User();
    }
    /**
     *
     * user login
     *
     * @return   null
     *
     */
    public function login()
    {
        if( $_POST && isset($_POST['login']) && isset($_POST['password'])){
            $user = $this->model->getByLogin($_POST['login']);
            $hash = md5(Config::get('salt').$_POST['password']);
            if($user && $user['is_active'] && $hash == $user['password']){
                Session::set('login', $user['login']);
                Session::set('user_id', $user['id']);
                Session::set('role', $user['role']);
            }
            Router::redirect('/products/index');
        }
    }

    /**
     *
     * user logout
     *
     * @return   null
     *
     */
    public function logout()
    {
        Session::destroy();
        Router::redirect('/users/login');
    }

    /**
     *
     * user register
     *
     *
     */
    public function register()
    {
        if(!empty($_POST)) {
            $validatorObj = new Validator($_POST);
            $validatorObj->validate();
            if(!$validatorObj->getIsValid()){
                Session::setFlash($validatorObj->getErrors());
            }else{
                if($this->model->save($_POST)){
                    Session::setFlash('thank you! your registration.');
                    Router::redirect('/products/index');
                }
            }

        }

    }
/*         ---------- Admin Area ------------       */

    /**
     *
     * user admin logout
     *
     * @return   null
     *
     */
    public function admin_login()
    {
        if( $_POST && isset($_POST['login']) && isset($_POST['password'])){
            $user = $this->model->getByLogin($_POST['login']);
            $hash = md5(Config::get('salt').$_POST['password']);
            if($user && $user['is_active'] && $hash == $user['password']){
                Session::set('login', $user['login']);
                Session::set('user_id', $user['id']);
                Session::set('role', $user['role']);
            }
            Router::redirect('/admin/pages/index');
        }
    }
    /**
     *
     * user register
     *
     *
     */
    public function admin_logout()
    {
        Session::destroy();
        Router::redirect('/admin/users/login');
    }
}