<?php

class Validator{
    protected $isValid 		= true;			// used to test the validity of data
    protected $errorMessages= array();		// used to collect error messages
    protected $data			= array();		// used to locally store data
    public function __construct(array $params = array()){
        if(empty($params) || !is_array($params)){
            throw new Exception("Invalid data!");
        }
        $this->data = $params;
    }
    /*
        - checks data
        - returns: nothing
        - sets the isValid property according to the validation
        - collect error messages into the errorMessages property according to the validation
    */
    public function validate(){
        // email validation
        if(empty($this->data['email'])){
            $this->errorMessages['email'] = 'Please insert your email address!';
        }else{
            $email = filter_var($this->data['email'], FILTER_SANITIZE_EMAIL);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $this->errorMessages['email'] = 'Please insert a valid email address!';
            }
        }
        // username validation
        if(empty($this->data['login'])){
            $this->errorMessages['login'] = 'Please insert your username!';
        }else{
            if(strlen($this->data['login']) < 5){
                $this->errorMessages['login'] = 'Your username must have at least 5 characters!';
            }
        }
        // password validation
        if(empty($this->data['password'])){
            $this->errorMessages['password'] = 'Please insert your password!';
        }else{
            if($this->data['password'] != $this->data['confirm_password']){
                $this->errorMessages['password'] = 'Your passwords must match!';
            }
        }
        if(!empty($this->errorMessages)){
            $this->isValid = false;
        }
    }
    // getter methods
    public function getIsValid(){
        return $this->isValid;
    }
    public function getErrors(){
        $errorString = '';
        if(count($this->errorMessages) > 0) {
            $errorString .= '<ul>';
            foreach ($this->errorMessages as $error) {
                $errorString .= "<li>$error</li>";
            }
            $errorString .= '</ul>';
        }
        return $errorString;
    }
}