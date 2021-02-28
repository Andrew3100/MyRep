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

/*Выводим эти заголовки в таблицу BootStrap*/
echo '<table class="table table-dark table-bordered text-center"><thead><tr>';
while ($table_headers = mysqli_fetch_assoc($table_structure)) {
    echo '<th>'.$table_headers['descriptor_n'].'</th>';
}
echo '<th>Действия</th>';
echo '</tr></thead>';

/*Получаем имена полей в таблице, которую выводим (те, которые в БД, а не заголовки как было выше)*/
$table_columns = get_table_columns($table_name);

/*Удаляем идентификатор записи из нашей таблицы*/
unset($table_columns[0]);
unset($table_columns[count($table_columns)-1]);

/*Получаем данные из таблицы*/
$table_data = get_records_sql($table_name,$condition2);
echo '<tbody><tr>';

/*Цикл по всем записям*/
while ($table_data1 = mysqli_fetch_assoc($table_data))
{
    /*Цикл по строке*/
    foreach ($table_columns as $table_columns_arr) {
        /*Вывод содержимого в текущем поле*/
        echo '<td>'.$table_data1[$table_columns_arr].'</td>';
    }
    /*Вывод иконок*/
    $red_id = $table_data1['id'];
    $del_id = $table_data1['id'];
    echo "<td>
            <div class='container'>
                <div class='row'>
                    <div class='col'>
                    <!--Иконка--><a class='actions_link' href='actions.php?$get=1&red=$red_id'><i class='bi bi-pencil-fill'></i></a>
                    </div>
                    <div class='col'>
                    <!--Иконка--><a class='actions_link1' href='actions.php?$get=1&del=$del_id'><i class='bi bi-trash-fill'></i></a>
                    </div>
                </div>
           </div>
          </td>";
    /*Закрываем строку таблицы*/
    echo '</tr>';
}
        /*Закрываем таблицу*/
        echo '</tbody></table>';

    if ($_GET['add'] OR $_GET['red'] != NULL) {
                get_form($table_name,$get,$del_id);
    }




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

