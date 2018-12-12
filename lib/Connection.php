<?php

class Connection extends PDO {

    const HOST = 'localhost';
    const USER = 'todolist';
    const PASS = 'to_do_list';
    const DB = 'todolist';

    public function __construct() {
        try {
            parent::__construct('mysql:host=' . self::HOST . ';dbname=' . self::DB . ';charset=utf8', self::USER, self::PASS);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
            $this->exec("set names utf8");
        } catch (PDOException $e) {
            var_dump($e->getTraceAsString());
        }
    }

}
