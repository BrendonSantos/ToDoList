<?php

class Project {
    
    var $codProject;
    var $projectName;
    var $codUser;
    
    function __construct($codProject, $projectName, $codUser) {
        $this->codProject = $codProject;
        $this->projectName = $projectName;
        $this->codUser = $codUser;
    }
    
    function getCodProject() {
        return $this->codProject;
    }

    function getProjectName() {
        return $this->projectName;
    }
    
    function getCodUser() {
        return $this->codUser;
    }

    function setCodProject($codProject) {
        $this->codProject = $codProject;
    }

    function setProjectName($projectName) {
        $this->projectName = $projectName;
    }
    
    function setCodUser($codUser) {
        $this->codUser = $codUser;
    }

}