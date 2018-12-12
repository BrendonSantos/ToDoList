<?php

require_once dirname(__FILE__) . '/../lib/Connection.php';

class DaoUser {
    
    var $connection;
    
    function __construct(Connection $connection) {
        $this->connection = $connection;
    }

    
    public function insert (User $user) {
        
        var_dump("entrou dao");
        
        $sql = 'insert into user (name, emil, pass) ' .
                'values (:name, :email :pass)';
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':name', $user->getName(), PDO::PARAM_STR);
        $stmt->bindValue(':email', $user->getEmail());
        $stmt->bindValue(':pass', $user->getPass(), PDO::PARAM_STR);
        return $stmt->execute();
    }
    
    public function getUserById ($id) {
        return null;
    }
    
    public function getUserByEmail ($email) {
        return null;
    }
}