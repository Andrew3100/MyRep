
<?php
$url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$get = strpos($url,'?');
$url = substr($url,$get+7);
$get = substr($url,0,-2);
$get = substr($url,0,-2);
require_once 'js.js';
require_once "lib.php";
$table_name = get_table_name();


$update = $_GET['red'];
$delete = $_GET['del'];
$adding = $_GET['add'];

if ($delete) {
update_status_record($table_name,$delete);
echo "<script>window.location.replace('index.php?$get=1')</script>";
exit();
}

if (isset($update) OR isset($adding)) {

    /*Получили имя гета*/



}


/*Получаем имя таблицы*/

/*Получаем имена полей этой таблицы*/
$columns_table = get_table_columns($table_name);
$columns_table_count = count($columns_table)-1;




