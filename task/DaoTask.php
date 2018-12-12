<?php

class DaoTask {

    function __construct() {
        
    }

    public function insert(Task $task) {
        
    }

    public function alter(Task $task) {
        
    }

    public function getTaskById($id) {
        
    }

    public function getTaskByProject($codProject) {
        
    }

    public function getTasksByUser($codUser) {
        $list = array();
        array_push($list, new Task(2, "asjfçasjf asdjfosidf sadf", "2018-10-25", "Alta", 5, 2, false));
        array_push($list, new Task(6, "nada nada nada nadaaa", "2018-10-20", "Alta", 5, 2, false));
        array_push($list, new Task(8, "tem que fazer hoje", "2018-10-25", "Baixa", 3, 2, false));
        array_push($list, new Task(3, "nada demais pra fazer", "2018-10-28", "Alta", 5, 2, false));
        array_push($list, new Task(1, "sadfj jasjsdkfj sdoifjsdjfoisdjfi os", "2018-10-23", "Média", 3, 2, false));
        return $list;
    }
    
    public function delete($codTask) {
        
    }

}
