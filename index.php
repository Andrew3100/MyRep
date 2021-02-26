<?php
require_once 'lib.php';
/*База*/
require_once 'database.php';

/*отладка*/
debug();

/*Меню*/
$report = $_GET['report'];
$data = $_GET['data'];
$import = $_GET['import'];

?>
<!doctype html>
<html lang="ru">
<head>
    <!-- Обязательные метатеги -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css" type="text/css">

    <title>Hello, world!</title>
</head>
<body>

<!--Шапка системы-->
<div class="container-fluid">
    <div class="row">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
<!--
                логотип
                <a class="navbar-brand" href="#"><img class="logotype" src="img/fon.jpg"></a>
-->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Главная</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </div>
</div>
<br>
<!--Крошки-->
<div class="container-fluid">
    <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Library</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data</li>
            </ol>
        </nav>
    </div>
</div>
<br>

<div class="container-fluid">
    <div class="row">
        <!--Левый блок-->
        <div class="col-2">
            <ul class="list-group text-center">
                <li class="list-group-item"><a href="index.php?data=1">Работа с данными</a></li>
                <li class="list-group-item"><a href="index.php?report=1">Отчёты</a></li>
                <li class="list-group-item"><a href="index.php?import=1">Импорт данных</a></li>
            </ul>
        </div>
        <!--Центр-->
        <div class="col-10">
        <?php
        /*Если активирован гет для одной из 13 таблиц*/
        if (get_param() AND (!$_GET['red'] AND !$_GET['del'])) {
            if (!$_GET['add']) {
                include 'tables.php';
                echo '<div class="row">
                <div class="col text-left">
                    <a type="button" href="index.php?add=1&och=1" class="but-link btn btn-warning" style="color: black">Добавить запись</a>
                </div>
                </div>';
            }




        }
        /*Если не вызваны параметры для таблиц, выводим страницы пунктов левого меню*/
        if ($data AND !get_param()) {
            include 'menu/data.php';
        }
        /*Если не вызваны параметры для таблиц, выводим страницы пунктов левого меню*/
        if ($report AND !get_param()) {
            include 'menu/reports.php';
        }
        /*Если не вызваны параметры для таблиц, выводим страницы пунктов левого меню*/
        if ($import AND !get_param()) {
            include 'menu/import.php';
        }
        if (($_GET['red'] OR $_GET['del'] OR $_GET['add']) AND get_param()) {
            /*Создаём блок чтобы вместить таблицу и форму ввода*/
            echo '<div class="container-fluid">
                    <div class="row">';
            echo '    <div class="col-md-8 col-lg-9">';
                include 'tables.php';
            echo '    </div>';
            echo '    <div class="col-md-4 col-lg-3">';
                include 'actions.php';
            echo '    </div>';

            echo '</div>
              </div>';


        }

                ?>
        </div>
    </div>
    <div class="row">
        <div class="col-2 text-center">




    </div>
</div>

<!-- Optional JavaScript -->
<!-- Popper.js first, then Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
</html>