
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
    echo '<pre>';
    var_dump($_POST['name0']);
    var_dump($_POST['name1']);
    var_dump($_POST['name2']);
    var_dump($_POST['name3']);
    var_dump($_POST['name4']);
    var_dump($_POST['name5']);
    echo '</pre>';
    exit();
    $post_array = array();
    for ($i=0; $i<=$_POST['hidden'];$i++) {
/*        $post_array = $_POST['name'.$i];*/
        echo '<pre>';
        print_r($_POST['name1']);
        echo '</pre>';
    }
    echo '<pre>';
    var_dump($post_array);
    echo '</pre>';

}