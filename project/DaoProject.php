<?php

class DaoProject {

    function __construct() {
        
    }

    public function insert(Project $project) {
        
    }

    public function delete($codProject) {
        
    }
    
    public function getProjectById($codProject) {
        
    }
    
    public function getProjectByUser($codUser){
        $projects = array();
        array_push($projects, new Project(2, "Férias", 2));
        array_push($projects, new Project(8, "Marcar", 2));
        array_push($projects, new Project(5, "Estudos", 2));
        array_push($projects, new Project(3, "Trabalho", 2));
        array_push($projects, new Project(7, "Outro", 2));
        array_push($projects, new Project(9, "Nadinha", 2));
        return $projects;
    }

}
