<?php

require_once dirname(__FILE__) . '/../user/DaoUser.php';
require_once dirname(__FILE__) . '/../task/TaskController.php';
require_once dirname(__FILE__) . '/../user/User.php';
require_once dirname(__FILE__) . '/../lib/Connection.php';

class LoginController {

    var $email;
    var $pass;
    var $user;
    var $name;
    var $connection;

    public function __construct() {
//        $this->connection = new Connection();
    }

    private function loginValidate($email, $pass) {
//        $daoUser = new DaoUser();
//        $user = $daoUser->getUserByEmail($email);
//        
//        return $user->getPass() == $pass;
//        
        return true;
    }

    public function actionAccess() {
        $safeName = filter_input(INPUT_POST, "login", FILTER_SANITIZE_STRING);
        if (isset($safeName)) {
            $this->actionDoAccess();
        } else {
            include(__DIR__ . '\PageAccess.php');
        }
    }

    private function actionDoAccess() {
        $this->email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
        $this->pass = filter_input(INPUT_POST, "pass", FILTER_SANITIZE_STRING);

        if ($this->loginValidate($this->email, $this->pass)) {
//            $daoUser = new DaoUser();
//            $this->user = $daoUser->getUserByEmail($this->email);
//            $codUser = $this->user->getCodUser();
            $codUser = 2;

            $taskController = new TaskController();
            $taskController->actionIndex($codUser);
        } else {
            //email ou senha erradas...
        }
    }

    public function actionRegister() {
        $safeName = filter_input(INPUT_POST, "login", FILTER_SANITIZE_STRING);
        if (isset($safeName)) {
            $this->actionDoRegister();
        } else {
            include(__DIR__ . '/PageRegister.php');
        }
    }

    private function actionDoRegister() {
        $this->name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_EMAIL);
        $this->email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
        $this->pass = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

        $daoUser = new DaoUser($this->connection);
        $user = $daoUser->getUserByEmail($this->email);

        if (empty($user)) {
            $user = new User($this->name, $this->email, $this->pass);
            if (!$daoUser->insert($user)) {
                throw new Exception(Message::INSERT_FAIL);
            }
        } else {
            //usuário já existente...
        }
    }

    public function run() {
        $this->actionAccess();
    }

}

if (isset($_POST['email']) && isset($_POST['pass'])) {
    $login = new LoginController();
    if (isset($_POST['name'])) {
        $login->actionRegister();
    } else {
        $login->actionAccess();
    }
}