<?php

class Router{

    protected $uri;
    protected $controller;
    protected $action;
    protected $params;
    protected $route;
    protected $method_prefix;
    protected $language;

    public function __construct($uri)
    {
        $this->uri = urldecode(trim($uri,'/'));

        //Get default
        $routes = config::get('routes');
        $this->route = Config::get('default_route');
        $this->method_prefix = isset($routes[$this->route]) ? $routes[$this->route] : '';
        $this->language = Config::get('default_language');
        $this->controller = Config::get('default_controller');
        $this->action = Config::get('default_action');

        $uri_parts = explode('?', $this->uri);

        $path = $uri_parts[0];

        $path_parts = explode('/', $path);

        // Get prefix or language at first element
        if(in_array(strtolower(current($path_parts)),  array_keys($routes))){
            $this->route = strtolower(current($path_parts));
            $this->method_prefix = isset($routes[$this->route]) ? $routes[$this->route] : '';
            array_shift($path_parts);
        }elseif (in_array(strtolower(current($path_parts)),  config::get('languages'))){
            $this->language = strtolower(current($path_parts));
            array_shift($path_parts);
        }

        // Get Controller
        if(current($path_parts)){
            $this->controller = strtolower(current($path_parts));
            array_shift($path_parts);
        }

        // Get action
        if(current($path_parts)){
            $this->action = strtolower(current($path_parts));
            array_shift($path_parts);
        }
        // Get params
        $this->params = $path_parts;

    }

    /**
     *
     * getUri
     *
     * @return   string
     *
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     *
     * getController
     *
     * @return   string
     *
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     *
     * getAction
     *
     * @return   string
     *
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     *
     * getParams
     *
     * @return   array
     *
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     *
     * getRoute
     *
     * @return   object
     *
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     *
     * getMethodPrefix
     *
     * @return   string
     *
     */
    public function getMethodPrefix()
    {
        return $this->method_prefix;
    }

    /**
     *
     * getLanguage
     *
     * @return   string
     *
     */
    public function getLanguage()
    {
        return $this->language;
    }
    /**
     *
     * redirect
     *
     * @param string
     *
     * @return   null
     *
     */
    public static function redirect($location){
        header("location: $location" );
    }
}