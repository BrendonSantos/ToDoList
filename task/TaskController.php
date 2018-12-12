<?php

require_once dirname(__FILE__) . '/DaoTask.php';
require_once dirname(__FILE__) . '/Task.php';
require_once dirname(__FILE__) . '/../project/DaoProject.php';
require_once dirname(__FILE__) . '/../project/Project.php';

class TaskController {

    var $listTask;
    var $listProject;
    var $task;
    var $codUser;
    var $user;

    function __construct() {
        
    }

    public function actionIndex($codUser) {
        $this->codUser = $codUser;
        $daoTask = new DaoTask();
        $this->listTask = $daoTask->getTasksByUser($codUser);
        $daoProject = new DaoProject();
        $this->listProject = $daoProject->getProjectByUser($this->codUser);
        
        include (__DIR__ . '/PageList.php');
    }

    public function actionEdit($codUser) {
        $this->codUser = $codUser;
        $codTask = filter_input(INPUT_POST, "cod_task", FILTER_VALIDATE_INT);
        if ($codTask == '0') {
            $this->actionDoCreate($codTask);
            include (__DIR__ . '/PageList.php');
        } else {
            throw new Exception();
        }
    }

    private function actionDoCreate($codTask) {
        $this->validateFieldsTask();
        $daoTask = new DaoTask();

        if (!$daoTask->insert($this->task)) {
            throw new Exception();
        }
    }

    public function actionDelete($codUser) {
        $codTask = filter_input(INPUT_POST, "cod_task", FILTER_VALIDATE_INT);
        $daoTask = new DaoTask();

        if (!$daoTask->delete($codTask)) {
            throw new Exception();
        }
        include (__DIR__ . '/PageList.php');
    }

    public function actionDoUpdateField() {
        $safeId = filter_input(INPUT_POST, 'pk', FILTER_SANITIZE_NUMBER_INT);
        $safeName = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $safeValue = filter_input(INPUT_POST, 'value', FILTER_SANITIZE_STRING);
        $this->doUpdateField($safeId, $safeName, $safeValue);
    }

    private function doUpdateField($id, $name, $value) {
        $daoTask = new DaoTask();
        $task = $daoTask->getTaskById($id);

        if (!empty($task)) {
            switch ($name) {
                case 'taskDescription':
                    $task->setTaskDescription($value);
                    break;
                case 'date':
                    $task->setDate($value);
                    break;
                case 'cod_project':
                    $task->setCodProject($value);
                    break;
                case 'priority':
                    $task->setPriority($value);
                    break;
            }
            if (!$daoTask->alter($task)) {
                throw new Exception();
            }
        } else {
            throw new Exception();
        }
    }

    private function validateFieldsTask() {
        $codTask = filter_input(INPUT_POST, "cod_task", FILTER_VALIDATE_INT);
        $taskDescription = filter_input(INPUT_POST, "task_description", FILTER_SANITIZE_STRING);
        $date = filter_input(INPUT_POST, "date", FILTER_SANITIZE_STRING);
        $priority = filter_input(INPUT_POST, "priority", FILTER_SANITIZE_STRING);
        $codProject = filter_input(INPUT_POST, "codProject", FILTER_VALIDATE_INT);
        $codUser = filter_input(INPUT_POST, "codUser", FILTER_VALIDATE_INT);
        $isCompleted = filter_input(INPUT_POST, "is_completed", FILTER_VALIDATE_INT);

        $this->task = new Task($codTask, $taskDescription, $date, $priority, $codProject, $codUser, $isCompleted);
    }

}
