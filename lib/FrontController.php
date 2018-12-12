<?php

class FrontController  {

    const DEFAULT_CONTROLLER = "Task";
    const DEFAULT_ACTION = "access";

    protected $controller = self::DEFAULT_CONTROLLER;
    protected $action = self::DEFAULT_ACTION;
    protected $params = array();
    protected $basePath = "todolist/";

    public function __construct(array $options = array()) {
        if (empty($options)) {
            $this->parseUri();
        } else {
            if (isset($options["controller"])) {
                $this->setController($options["controller"]);
            }
            if (isset($options["action"])) {
                $this->setAction($options["action"]);
            }
            if (isset($options["params"])) {
                $this->setParams($options["params"]);
            }
        }
    }

    protected function parseUri() {
        $serverUrl = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_URL);
        $path = trim(parse_url($serverUrl, PHP_URL_PATH), "/");
        $pt = preg_replace('/[^a-zA-Z0-9-\/\.]/', "", $path);
        $actions = explode("/", $pt, 4);
        $controller = "";
        $action = "";
        $params = "";
        
//        var_dump($serverUrl);
//        var_dump($path);
//        var_dump($pt);
//        var_dump($actions);
//        var_dump($controller);
//        var_dump($action);
//        var_dump($params);
//        die();
        
        // Atencao, o break nao esta sendo usado de proposito nos cases abaixo
        // Isso para que caso os 3 parametros estejam informados, todos os 
        // cases serao preenchidos
        switch (count($actions)) {
            case 4:
                $params = $actions[3];
            case 3:
                $action = $actions[2];
            case 2:
                $controller = $actions[1];
            case 1:
                $this->basePath = $actions[0] . "/";
        }
        if (strlen($controller) > 0) {
            $this->setController($controller);
        } else {
            $this->setController(self::DEFAULT_CONTROLLER);
        }
        if (strlen($action) > 0) {
            $this->setAction($action);
        } else {
            $this->setAction(self::DEFAULT_ACTION);
        }
        if (strlen($params) > 0) {
            $this->setParams(explode("/", $params));
        }
    }

    public function setController($controller) {
        $controller = "login";
        $controller = ucfirst(strtolower($controller)) . "Controller";
//        if (!class_exists($controller)) {
//            throw new InvalidArgumentException(
//            "The action controller '$controller' has not been defined.");
//        }
        $this->controller = $controller;
        return $this;
    }

    public function setAction($action) {
        $action = 'action' . ucfirst(strtolower($action));
//        $reflector = new ReflectionClass($this->controller);
//        if (!$reflector->hasMethod($action)) {
//            throw new InvalidArgumentException(
//            "The controller action '$action' has been not defined.");
//        }
        $this->action = $action;
        return $this;
    }

    public function setParams(array $params) {
        $this->params = $params;
        return $this;
    }

    public function run() {
        
//        var_dump($this->controller);
//        var_dump($this->action);
//        var_dump($this->params);
//        die();
        
        call_user_func_array(array(new $this->controller(), $this->action), $this->params);
    }

}
