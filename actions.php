
<?php
include 'js.js';
require_once "lib.php";
$update = $_GET['red'];
$delete = $_GET['del'];
$adding = $_GET['add'];


$table_name = get_table_name();

if (isset($update) OR isset($adding)) {

    /*Получили имя гета*/
    $url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

    $get = strpos($url,'&');
    $url = substr($url,$get+1);
    $get = substr($url,0,-2);

    /*
     Функция получения формы выводит рисует форму и
     возвращает количество сгенерированных форм
     (для цикла считывания данных из постов)
    */
    get_form_upd($table_name,$get,$update);

}

if ($_GET['del']) {
    echo "<script>confirm('Удалить запись?')</script>";
    delete_upd_status();

}

/*Получаем имя таблицы*/

/*Получаем имена полей этой таблицы*/
$columns_table = get_table_columns($table_name);
$columns_table_count = count($columns_table)-1;




