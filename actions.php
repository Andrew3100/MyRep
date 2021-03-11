
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


if ($adding) {
    $post_array = array();
    for ($i=0; $i<$_POST['hidden'];$i++) {
        echo '<pre>';
        $post_array[] = ($_POST['name'.$i]);
        echo '</pre>';
    }

    $table_name = get_table_name();
    echo '<pre>';
    $max_id = (mysqli_fetch_assoc(get_last_record_id($table_name)));
    $max_id = $max_id["MAX(id)"];
    echo '</pre>';
    $max_id++;
    $condition = " id = $max_id";
    $records = mysqli_fetch_assoc(get_records_sql($table_name,$condition));

    $columns = get_table_columns($table_name);
    unset($columns[0]);
    unset($columns[count($columns)]);
    var_dump($columns);
    $g = 0;
    $i=1;
    /*Обновляем все поля в текущем идентификаторе*/
    /*Обновляем все поля в текущем идентификаторе*/
    /*Обновляем все поля в текущем идентификаторе*/
    /*Обновляем все поля в текущем идентификаторе*/
    /*Обновляем все поля в текущем идентификаторе*/
    echo '<pre>';
    $insert = $mysqli->query("INSERT INTO $table_name (`$columns[$i]`) VALUES ('$post_array[$g]')");
    print_r("INSERT INTO $table_name (`$columns[$i]`) VALUES ('$post_array[$g]')");
    echo '</pre>';
    if (!$insert) {
        echo 'Потрачено';
    }
    $g = 1;
    echo '<pre>';
    var_dump($post_array);
    echo '</pre>';
    for ($i=2;$i<=$_POST['hidden'];$i++) {
        echo '<pre>';
        $insert = $mysqli->query("UPDATE $table_name SET `$columns[$i]` = ('$post_array[$g]') WHERE id = $max_id");
        print_r("UPDATE $table_name SET `$columns[$i]` = ('$post_array[$g]') WHERE id = $max_id");
        echo '</pre>';
        $g++;
    }

}