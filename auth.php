<?php
include 'bootstrap/template.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col">
            <!-- Button trigger modal -->
            <button style="margin-top: 120px; margin-left: 43%" type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                Авторизоваться
            </button>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Вход в систему</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3 row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Логин</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputPassword">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Пароль</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputPassword">
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                            <button type="button" class="btn btn-primary">Авторизоваться</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

</body>
</html>
