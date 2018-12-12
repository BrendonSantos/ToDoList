<?php
/**
 * var LoginController $this;
 */
?>


<html lang="pt-br">
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />

        <title>ToDoList - Login</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-10 col-md-4 offset-md-4">
                    <div class="text-center mt-3"><h1 class="h2">ToDoList</h1></div>
                    <div class="card mb-3">
                        <div class="card-header alert-success">Cadastrar</div>
                        <form action="LoginController.php" method="POST" role="form" class="form-signin">
                            <div class="form-group">
                                <input name="name" type="text" class="form-control" placeholder="Nome" required="required">
                                <input name="email" type="text" class="form-control" placeholder="Email" required="required" autofocus="autofocus">
                                <input name="pass" type="password" class="form-control" maxlength="25" placeholder="Senha" required="required">
                                <input name="login" class="d-none">
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block" name="login">Cadastrar</button>
                        </form>
                    </div>
                    Já tem uma conta? <a href='PageAccess.php' class="btn btn-secondary">Entrar</a>
                </div>
            </div>
        </div>
    </body>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</html>