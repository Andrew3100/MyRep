<?php
/*<База*/
require_once 'database.php';

/*Проверка сеанса*/
function isauth() {
    if ($_COOKIE['user']=='') {
        exit('<h3 style="text-align: center;margin-top: 120px;"><b>Вы не авторизованы. <a href="/emou/auth.php">Перейти на страницу авторизации</a></b></h3>');
    }
}

/*Функция выборки,в переменных надо передать имя таблицы и условие (строка, без слова WHERE)*/
function get_records_sql(&$table,$condition){
    include 'database.php';
    if ($condition!='') {
        $sql = "SELECT * FROM $table WHERE $condition";
        $result = $mysqli->query($sql);
    }
    else {
        $sql = "SELECT * FROM $table";
        $result = $mysqli->query($sql);
    }


    return $result;
}

/*Получение имён полей таблицы*/
function show_columns_name(&$table)
{
    $sql = "SHOW COLUMNS FROM $table";
    $columns = $mysqli->query($sql);
    return $columns;
}

/*Проверяем создан ли гет параметр для одной из 13 таблиц*/
function get_param() {
    if ($_GET['och']
        OR$_GET['zaoch']
        OR$_GET['aus']
        OR$_GET['international']
        OR$_GET['international_document']
        OR$_GET['mobile']
        OR$_GET['change']
        OR$_GET['grants']
        OR$_GET['cult_event']
        OR$_GET['cult_doc']
        OR$_GET['young']
        OR$_GET['ec_events']
        OR$_GET['ec_document']){
        $flag = true;
    };
    return $flag;
}

/*Выключает режим отладки*/
function debug() {
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(E_ALL);
}

/*Выводим данные для таблиц*/
function data_for_table() {

    //закрыто
    if ($_GET['och']) {
        $table_name = 'education_full_lesson';

    }

    //закрыто
    if ($_GET['zaoch']) {
        $table_name = 'education_nofull_lesson';

    }
    //закрыто
    if ($_GET['aus']) {
        $table_name = 'education_auslanders';

    }

    if ($_GET['international']) {
        $table_name = 'education_science_events';

    }

    if ($_GET['international_document']) {
        $table_name = 'education_inter_agr';

    }

    if ($_GET['mobile']) {
        $table_name = 'education_mobile_program';

    }

    if ($_GET['change']) {
        $table_name = 'education_students_change';

    }

    if ($_GET['grants']) {
        $table_name = 'education_get_grants';

    }

    if ($_GET['cult_event']) {
        $table_name = 'culture_events';

    }

    if ($_GET['cult_doc']) {
        $table_name = 'culture_agr';

    }

    if ($_GET['young']) {
        $table_name = 'youth_inter_events';

    }

    if ($_GET['ec_events']) {
        $table_name = 'econom_inter_events';

    }

    if ($_GET['ec_document']) {
        $table_name = 'econom_inter_agr';
    }
    $condition = '';
    $table_data = get_records_sql($table_name,$condition);


    return $table_data;
}

/*Массив иконок для "колонки действия" - тянется по CDN*/
$icon_arr = array('<i class="bi bi-pencil-fill"></i>','<i class="bi bi-trash-fill"></i>');

/*Функция определения имени таблицы по гет-параметру*/
function get_table_name() {
    //закрыто
    if ($_GET['och']) {
        $table_name = 'education_full_lesson';

    }

    //закрыто
    if ($_GET['zaoch']) {
        $table_name = 'education_nofull_lesson';

    }
    //закрыто
    if ($_GET['aus']) {
        $table_name = 'education_auslanders';

    }

    if ($_GET['international']) {
        $table_name = 'education_science_events';

    }

    if ($_GET['international_document']) {
        $table_name = 'education_inter_agr';

    }

    if ($_GET['mobile']) {
        $table_name = 'education_mobile_program';

    }

    if ($_GET['change']) {
        $table_name = 'education_students_change';

    }

    if ($_GET['grants']) {
        $table_name = 'education_get_grants';

    }

    if ($_GET['cult_event']) {
        $table_name = 'culture_events';

    }

    if ($_GET['cult_doc']) {
        $table_name = 'culture_agr';

    }

    if ($_GET['young']) {
        $table_name = 'youth_inter_events';

    }

    if ($_GET['ec_events']) {
        $table_name = 'econom_inter_events';

    }

    if ($_GET['ec_document']) {
        $table_name = 'econom_inter_agr';
    }
    return $table_name;
}

/*Функция обновления записи*/
function update_record(&$table_name,&$columns,&$new_value,&$condition) {
    include 'database.php';
    $update_record = $mysqli->query("UPDATE $table_name SET $columns = $new_value WHERE $condition");
    echo '<pre>';
    print_r("UPDATE $table_name SET $columns = 1 WHERE $condition");
    echo '</pre>';
    if (!$update_record) {
        echo 'Ошибка обновления данных';
    }
    else {
        echo 'Обновлено';
    }
}

/*Список полей заданной таблицы*/
function get_table_columns(&$table_name) {
    include 'database.php';
    $array_field_table = array();
    $get_col = $mysqli->query("SHOW COLUMNS FROM $table_name FROM bsu");
    $i=0;
    while ($get_col1 = mysqli_fetch_array($get_col)){
        $array_field_table[] = ($get_col1['Field']);
    }

    return $array_field_table;
}

/*Получение записи по условию и без (условие передать строкой)*/
function get_record_sql(&$table_name,&$condition) {
    include 'database.php';
    if ($condition='') {
        $get_record = $mysqli->query("SELECT * FROM $table_name WHERE $condition");
    }
    else {
        $get_record = $mysqli->query("SELECT * FROM $table_name");
    }
    return $get_record;
}


function get_form (&$table_name,$get,$id){
    include 'bootstrap/template.php';
    include 'database.php';
    /*Получение формы осуществляется из базы данных
    в базе данных хранится имя гет-параметра таблицы и тип формы (дата, листбокс, текст)
    */

    /*Получаем поля таблицы - для создания цикла вывода форм*/
    $table_columns_array = get_table_columns($table_name);

    $query = $mysqli->query("SELECT * FROM bsu_form_data WHERE get_name = '$get'");
    $name=0;
    $tab ='ref_country';
    $condition = '';
    $condition2 = "id = $id";
    $country_list = get_records_sql($tab,$condition);
    $k=0;
    while ($query_res = mysqli_fetch_assoc($query)) {

        /*Если не листбокс*/
        if ($query_res['type_name']!='list') {
            /*Выводим форму*/

            echo '<form method="POST" action="actions.php"><div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">'.$query_res['descriptor_n'].'</label>
                        <input value="" name="name'.$name.'" type="'.$query_res['type_name'].'" class="form-control" id="exampleFormControlInput1">
                      </div>';

        }

        else {
            /*Если листбокс - тянем БД*/
            echo '<div class="mb-3">';


            echo '<label for="exampleFormControlInput1" class="form-label">'.$query_res['descriptor_n'].'</label>
                  <select  name="name'.$name.'" class="form-select" aria-label="Default select example">
                    <option value="" selected>Выберите страну</option>';
            while ($query_country = mysqli_fetch_assoc($country_list)) {
                echo '<option value="1">'.$query_country['name'].'</option>';

            }
            echo '</select>';

            echo '</div>';


        }

        $name++;
        $k++;
    }
    if ($_GET['red']) {
        echo '<button class="btn btn-success">Сохранить</button>';
        echo '<button class="btn btn-danger">Отмена</button>';
    }
    else {
        echo '<button class="btn btn-success">Обновить</button>';
        echo '<button class="btn btn-danger">Отмена</button>';
    }
    echo '</form>';


    return $k;
}