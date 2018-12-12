<?php

class Task {
    
    public $codTask;
    public $taskDescription;
    public $date;
    public $priority;
    public $codProject;
    public $codUser;
    /**
     * if completed = 1, else = 0
     * @var int
     */
    public $isCompleted;
    
    function __construct($codTask, $taskDescription, $date, $priority, $codProject, $codUser, $isCompleted) {
        $this->codTask = $codTask;
        $this->taskDescription = $taskDescription;
        $this->date = $date;
        $this->priority = $priority;
        $this->codProject = $codProject;
        $this->codUser = $codUser;
        $this->isCompleted = $isCompleted;
    }
    
    function getCodTask() {
        return $this->codTask;
    }

    function getTaskDescription() {
        return $this->taskDescription;
    }

    function getDate() {
        return $this->date;
    }

    function getPriority() {
        return $this->priority;
    }

    function getCodProject() {
        return $this->codProject;
    }

    function getCodUser() {
        return $this->codUser;
    }

    function getIsCompleted() {
        return $this->isCompleted;
    }

    function setCodTask($codTask) {
        $this->codTask = $codTask;
    }

    function setTaskDescription($taskDescription) {
        $this->taskDescription = $taskDescription;
    }

    function setDate($date) {
        $this->date = $date;
    }

    function setPriority($priority) {
        $this->priority = $priority;
    }

    function setCodProject($codProject) {
        $this->codProject = $codProject;
    }

    function setCodUser($codUser) {
        $this->codUser = $codUser;
    }

    function setIsCompleted($isCompleted) {
        $this->isCompleted = $isCompleted;
    }

}

