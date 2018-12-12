<?php
require_once dirname(__FILE__) . '/Task.php';
require_once dirname(__FILE__) . '/../project/Project.php';
require_once dirname(__FILE__) . '/TaskController.php';

/**
 * var TaskController $this;
 */
?>

<html lang="pt-br">
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />

        <title>ToDoList - Lista</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
        <h1>ToDoList</h1>
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <table id='usuarios' class="table table-hover table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Tarefa</th>
                                <th>Data</th>
                                <th>Projeto</th>
                                <th>Prioridade</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($this->listTask as $task) { ?>
                                <tr>
                            <form action="#" method="post">
                                <input name="cod_task" type="hidden" value="<?php echo $task->getCodTask(); ?>">
                                <td>
                                    <input class="form-control" name="task_description" type="text" value="<?php echo $task->getTaskDescription(); ?>">
                                </td>
                                <td></td>
                                <td>
                                    <input class="form-control" name="date" type="date" value="<?php echo $task->getDate(); ?>">
                                </td>
                                <td>
                                    <select name="priority" class="form-control" required="true">
                                        <?php
                                        foreach ($this->listProject as $proj) {
                                            $selected = '';
                                            if ($proj->getCodProject() == $task->getCodProject()) {
                                                $selected = ' selected';
                                            }
                                            echo '<option value=' . $proj->getCodProject() . $selected . '>' . $proj->getProjectName() . "</option>\n";
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="priority" class="form-control" required="true">
                                        <?php
                                        $priorities = array("Baixa", "Média", "Alta");
                                        foreach ($priorities as $priority) {
                                            $selected = '';
                                            if ($task->getPriority() == $priority) {
                                                $selected = ' selected';
                                            }
                                            echo '<option value=' . $priority . $selected . '>' . $priority . "</option>\n";
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-sm btn-primary" name="submit">Salvar</button>
                                </td>
                            </form>
                            </tr>
                        <?php } ?>  
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php dirname(__FILE__) . "/../resources/js/jquery-3.3.1.min.js" ?>"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</html>