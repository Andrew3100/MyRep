<?
/*Библиотека вызвана в связанном файле - тут вызывать нельзя, могут возникнуть ошибки*/
require_once 'bootstrap/template.php';
require_once "lib.php";
/*Нафиг отладку*/
debug();
/*Имя таблицы*/
$table_name = get_table_name();

/*Получили имя гета*/
$url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$get = strpos($url,'?');
$url = substr($url,$get+1);
$get = substr($url,0,-2);

$table_n = 'bsu_form_data';
$condition = "get_name = '$get'";
$condition2 = "status = 1";

/*Получаем имена заголовков таблицы (пользовательской, не БД)*/
$table_structure = get_records_sql($table_n,$condition);
while ($table_headers = mysqli_fetch_assoc($table_structure)) {
    /*echo '<pre>';
    echo $table_headers['descriptor_n'];
    echo '</pre>';*/
}


/*Получаем имена полей в таблице, которую выводим (те, которые в БД, а не заголовки как было выше)*/
$table_columns = get_table_columns($table_name);

/*Удаляем идентификатор записи из нашей таблицы*/
/*unset($table_columns[0]);*/

$field_incriment = 0;
echo '<pre>';
$table_data = get_records_sql($table_name,$condition2);
while ($table_data1 = mysqli_fetch_assoc($table_data))

{
    var_dump($table_data1);
    $field_incriment++;
}

echo '</pre>';
exit();






echo '
<style type="text/css">
    .actions_link {
    color: #89b93b;
    }
    .actions_link1 {
    color: red;
    }
</style>
';

