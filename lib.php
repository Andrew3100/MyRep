<?php

/*<База*/
require_once 'database.php';

/*ИП-адрес*/
function ip_address() {
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = @$_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP)) $ip = $client;
    elseif(filter_var($forward, FILTER_VALIDATE_IP)) $ip = $forward;
    else $ip = $remote;

    return $ip;
}

/*Проверка сеанса*/
function isauth() {
    if ($_COOKIE['user']=='') {
        exit('<h3 style="text-align: center;margin-top: 120px;"><b>Вы не авторизованы. <a href="/emou/auth.php">Перейти на страницу авторизации</a></b></h3>');
    }
}

/*Функция выбора последнего идентификатора, используется при вставке новой записи*/
function get_last_record_id($table_name) {
    include 'database.php';
    $sql = $mysqli->query("SELECT MAX(id) FROM $table_name");
    var_dump($sql);
    return $sql;
}

/*Функция выборки,в переменных надо передать имя таблицы и условие (строка, без слова WHERE)*/
function get_records_sql(&$table,&$condition){
    include 'database.php';
    if ($condition!='') {
        $sql = "SELECT * FROM $table WHERE $condition";
        if ($sql) {


        }

        $result = $mysqli->query($sql);
    }
    else {
        $sql = "SELECT * FROM $table";
        if ($sql) {


        }
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
    /*сделать CASE каждый записать в переменную и вернуть переменную*/
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

function get_form ($table_name,$get){
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

    $country_list = get_records_sql($tab,$condition);
    $k=0;
    echo '<form method="POST" action="actions.php?add=1&'.$get.'=1">';

    while ($query_res = mysqli_fetch_assoc($query)) {

        /*Если не листбокс*/
        if ($query_res['type_name']!='list') {
            /*Выводим форму*/
            echo '<div class="mb-3">';
                       echo '<label for="exampleFormControlInput'.$k.'" class="form-label">'.$query_res['descriptor_n'].'</label>
                        <input value="" name="name'.$name.'" type="'.$query_res['type_name'].'" class="form-control" id="exampleFormControlInput'.$k.'">
                      ';
            echo '</div>';

        }

        else {
            /*Если листбокс - тянем БД*/
            echo '<div class="mb-3">';


            echo '<label for="exampleFormControlInput1" class="form-label">'.$query_res['descriptor_n'].'</label>
                  <select name="name'.$name.'" class="form-select" aria-label="Default select example" id="exampleFormControlInput1">
                    <option name="name'.$name.'">Выберите страну</option>';
            while ($query_country = mysqli_fetch_assoc($country_list)) {
                echo '<option name="name'.$name.'">'.$query_country['name'].'</option>';

            }
            echo '</select>';

            echo '</div>';


        }

        $name++;
        $k++;
    }

    echo "<input name='hidden' value='$k' type='hidden'>";
    if ($_GET['add']) {

        echo '<button type="submit" class="btn btn-success">Сохранить</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        echo '<button class="btn btn-danger">Отмена</button>';
    }

    echo '</form>';


    return $k;
}


function get_form_upd (&$table_name,$get,$id){
    include 'bootstrap/template.php';
    include 'database.php';
    /*Получение формы осуществляется из базы данных
    в базе данных хранится имя гет-параметра таблицы и тип формы (дата, листбокс, текст)
    */

    /*Получаем поля таблицы - для создания цикла вывода форм*/
    $table_columns_array = get_table_columns($table_name);

    /*Условие для выбора форм*/
    $cond = "get_name = '$get'";
    $form_data = 'bsu_form_data';
    /*Выбираем формы*/
    $query = get_records_sql($form_data,$cond);


    $tab ='ref_country';
    $condition = '';
    $condition2 = "id = $id";
    $country_list = get_records_sql($tab,$condition);
    $data_list = get_records_sql($table_name,$condition2);
    $data_list = mysqli_fetch_assoc($data_list);
    $name = 0;


    /*Если не создан гет параметр для редактирования - удаляем массив данных из записи*/
    if (!$_GET['red']) {
        unset($table_columns_array);
        unset($data_list);
    }

    $k=1;

        while ($query_res = mysqli_fetch_assoc($query)) {

            echo "<form method='POST' action='actions.php?upd=1&$get=1'>";
            echo '<div class="mb-3">';

            /*Если не листбокс*/
            if ($query_res['type_name']!='list') {

                /*Выводим форму*/





                echo '<label for="exampleFormControlInput'.$k.'" class="form-label">'.$query_res['descriptor_n'].'</label>
                        <input value="'.$data_list[$table_columns_array[$k]].'" 
                        name="name'.$name.'" type="'.$query_res['type_name'].'" class="form-control" id="exampleFormControlInput'.$k.'">
                      </div>';

            }

            else {
                /*Если листбокс - тянем БД*/
                echo '<div class="mb-3">';


                echo '<label class="form-label">'.$query_res['descriptor_n'].'</label>
                  <select  name="name'.$name.'" class="form-select" aria-label="Default select example">
                    <option>'.$data_list[$table_columns_array[$k]].'</option>';
                while ($query_country = mysqli_fetch_assoc($country_list)) {
                    echo '<option>'.$query_country['name'].'</option>';
                }
                echo '</select>';
                echo '</div>';


            }

            $name++;
        $k++;
        }

        echo "<input name='hidden' value='$k' type='hidden'>";
        echo '<button type="submit" class="btn btn-success">Редактировать</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        echo '<button class="btn btn-danger">Отмена</button>';


        echo '</form>';

    return $k;
}

/*Имитация удаления - обновляем статус записи, после чего стандартный пользователь не увидит эту запись. Можно восстановить в WorkBench*/
function update_status_record(&$table_name,&$id) {
    include 'database.php';
    $delete = $mysqli->query("UPDATE $table_name SET status = 0 WHERE id = $id");
}











