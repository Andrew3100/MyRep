<?
/*Библиотека вызвана в связанном файле - тут вызывать нельзя, могут возникнуть ошибки*/
require_once 'bootstrap/template.php';
require_once "lib.php";

$table_name = get_table_name();

/*Получили имя гета*/
$url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

$get = strpos($url,'?');
$url = substr($url,$get+1);
$get = substr($url,0,-2);



debug();

 $table_name = get_table_name();
/*Получили имя гета*/
$url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

$get = strpos($url,'?');
$url = substr($url,$get+1);
$get = substr($url,0,-2);

$table_n = 'bsu_form_data';
$condition = "get_name = '$get'";
$condition2 = "status = 1";

/*Получаем имена заголовков*/
$table_structure = get_records_sql($table_n,$condition);

/*Получаем имена полей в таблице, которую выводим*/
$table_columns = get_table_columns($table_name);


$table_data = get_records_sql($table_name,$condition2);



/*echo '<pre>';
var_dump($table_data);
echo '</pre>';



echo $table = '<table class="table table-dark table-bordered text-center text-center"><thead><tr>';

while ($data = mysqli_fetch_assoc($table_structure)) {
    $data1 = $data['descriptor_n'];
    echo "
      <th>$data1</th>";
}
echo '</tr>
    </thead>
    <tbody>';

$k=0;
while ($table_content = mysqli_fetch_assoc($table_data)) {
    var_dump($table_content);
    $table_content1 = $table_content[$table_columns[$k]];
    echo '<tr>';
    for ($i=1;$i<=count($table_columns);$i++) {
        echo "<td>$table_content1</td>";
    }
    echo '</tr>';
    echo $k++;
}*/


$i=0;
if ($_GET['och']==1) {

    echo $table = '
    <table class="table table-dark table-bordered text-center text-center">
    <thead>
    <tr>
      <th>Страна прибытия</th>
      <th>Высшее образование</th>
      <th>СПО</th>
      <th>Аспирантура</th>
      <th>1 курс</th>
      <th>Отчислено</th>
      <th>Действия</th>
    </tr>
    </thead>
    <tbody>';
    $data = data_for_table();

    while ($row = mysqli_fetch_assoc($data)) {
        $i++;
        $id = $row['id'];

        $country = $row['country'];
        $high = $row['full_educ'];
        $spo = $row['spo'];
        $aspir = $row['aspir'];
        $one_c = $row['first_course'];
        $expelled = $row['expelled'];

          echo "
            <tr>
              <td>$country</td>
              <td>$high</td>
              <td>$spo</td>
              <td>$aspir</td>
              <td>$one_c</td>
              <td>$expelled</td>
              <td>
              <div class='container'>
              <div class='row'>
              <a class='col-6 actions_link' href='index.php?red=$id&och=1'>
              $icon_arr[0]
              </a>
              <a class='col-6 actions_link1' href='index.php?del=$id&och=1'>
              $icon_arr[1]
                </a>
                </div>
                </div>
              </td>
            </tr>";
    }
    echo '</tbody>                                          
            </table>';
    }

if ($_GET['zaoch']==1) {
    echo $table = '
    <table class="table table-dark table-bordered text-center">
    <thead>
    <tr>
      <th scope="col">Страна прибытия</th>
      <th scope="col">Высшее образование</th>
      <th scope="col">СПО</th>
      <th scope="col">Аспирантура</th>
      <th scope="col">1 курс</th>
      <th scope="col">Отчислено</th>
      <th scope="col">Действия</th>
    </tr>
  </thead>
  <tbody>
    ';
    $data = data_for_table();

    while ($row = mysqli_fetch_assoc($data)) {
        $i++;
        $id = $row['id'];

        $country = $country = $row['country'];
        $high = $row['full_educ'];
        $spo = $row['spo'];
        $aspir = $row['aspir'];
        $one_c = $row['first_course'];
        $expelled = $row['expelled'];

        echo "
            <tr>
              <td>$country</td>
              <td>$high</td>
              <td>$spo</td>
              <td>$aspir</td>
              <td>$one_c</td>
              <td>$expelled</td>
              <td>
              <div class='container'>
              <div class='row'>
              <a class='col-6 actions_link' href='index.php?red=$id&zaoch=1'>
              $icon_arr[0]
              </a>
              <a class='col-6 actions_link1' href='index.php?del=$id&zaoch=1'>
              $icon_arr[1]
                </a>
                </div>
                </div>
              </td>
            </tr>";
    }
    echo '</tbody>                                          
            </table>';



}

if ($_GET['aus']==1) {

    echo $table = '
    <table class="table table-dark table-bordered text-center">
    <thead>
    <tr>
      <th scope="col">Страна прибытия</th>
      <th scope="col">Количество обучающихся</th>
      <th scope="col">Действия</th>
    </tr>
  </thead>';
    $data = data_for_table();

    while ($row = mysqli_fetch_assoc($data)) {

        $id = $row['id'];
        $country = $country = $row['country'];
        $qua = $row['qua'];

        echo "
            <tr>
              <td>$country</td>
              <td>$qua</td>
              <td>
              <div class='container'>
              <div class='row'>
              <a class='col-6 actions_link' href='index.php?red=$id&aus=1'>
              $icon_arr[0]
              </a>
              <a class='col-6 actions_link1' href='index.php?del=$id&aus=1'>
              $icon_arr[1]
                </a>
                </div>
                </div>
              </td>
            </tr>";
    }
    echo '</tbody>                                          
            </table>';
}

if ($_GET['international']==1) {
    echo $table = '
    <table class="table table-dark table-bordered text-center">
    <thead>
    <tr>
      <th scope="col">Наименование мероприятия</th>
      <th scope="col">Начало</th>
      <th scope="col">Конец</th>
      <th scope="col">Место проведения</th>
      <th scope="col">Количество участников</th>
      <th scope="col">Кратко итоги</th>
      <th scope="col">Действия</th>
    </tr>
  </thead>
  <tbody>';
    $data = data_for_table();

    while ($row = mysqli_fetch_assoc($data)) {
        $i++;
        $id = $row['id'];
        $event_name = $row['event_name'];
        $event_start = $row['event_start'];
        $event_stop = $row['event_stop'];
        $event_location = $row['event_location'];
        $event_qua = $row['event_qua'];
        $event_result = $row['event_result`'];

        echo "
            <tr>
              <td>$event_name</td>
              <td>$event_start</td>
              <td>$event_stop</td>
              <td>$event_location</td>
              <td>$event_qua</td>
              <td>$event_result</td>
              <td>
              <div class='container'>
              <div class='row'>
              <a class='col-6 actions_link' href='index.php?red=$id&international=1'>
              $icon_arr[0]
              </a>
              <a class='col-6 actions_link1' href='index.php?del=$id&international=1'>
              $icon_arr[1]
                </a>
                </div>
                </div>
              </td>
            </tr>";
    }
    echo '</tbody>                                          
            </table>';
}

if ($_GET['international_document']==1) {
    echo $table = '
    <table class="table table-dark table-bordered text-center">
    <thead>
    <tr>
      <th scope="col">Страна</th>
      <th scope="col">Учебное заведение</th>
      <th scope="col">Дата заключения соглашения (договора). Срок действия</th>
      <th scope="col">Предмет соглашения (договора)</th>
      <th scope="col">Действия</th>
      
    </tr>
  </thead>
  <tbody>';
    $data = data_for_table();

    while ($row = mysqli_fetch_assoc($data)) {
        $id = $row['id'];
        $country = $country = $row['country'];
        $name_univ = $row['company'];
        $start = $row['date_start'];
        $subject = $row['subject'];

        echo "
            <tr>
              <td>$country</td>
              <td>$name_univ</td>
              <td>$start</td>
              <td>$subject</td>
              <td>
              <div class='container'>
              <div class='row'>
              <a class='col-6 actions_link' href='index.php?red=$id&international_document=1'>
              $icon_arr[0]
              </a>
              <a class='col-6 actions_link1' href='index.php?del=$id&international_document=1'>
              $icon_arr[1]
                </a>
                </div>
                </div>
              </td>
            </tr>";
    }
    echo '</tbody>                                          
            </table>';
}

if ($_GET['mobile']==1) {
    echo $table = '
    <table class="table table-dark table-bordered text-center">
    <thead>
    <tr>
      <th scope="col">Страна</th>
      <th scope="col">Наименование программы мобильности</th>
      <th scope="col">Действия</th>
    </tr>
  </thead>';
    $data = data_for_table();

    while ($row = mysqli_fetch_assoc($data)) {
        $i++;
        $id = $row['id'];

        $country = $country = $row['country'];
        $mp = $row['mobile_program'];



        echo "
            <tr>
              <td>$country</td>
              <td>$mp</td>
              <td>
              <div class='container'>
              <div class='row'>
              <a class='col-6 actions_link' href='index.php?red=$id&mobile=1'>
              $icon_arr[0]
              </a>
              <a class='col-6 actions_link1' href='index.php?del=$id&mobile=1'>
              $icon_arr[1]
                </a>
                </div>
                </div>
              </td>
            </tr>";
    }
    echo '</tbody>                                          
            </table>';
}

if ($_GET['change']==1) {
    echo $table = '
    <table class="table table-dark table-bordered text-center">
    <thead>
    <tr>
      <th scope="col">Страна обучения/практики</th>
      <th scope="col">Университет (организация) партнер</th>
      <th scope="col">Начало</th>
      <th scope="col">Конец</th>
      <th scope="col">Действия</th>
    </tr>
  </thead>
  <tbody>';
    $data = data_for_table();

    while ($row = mysqli_fetch_assoc($data)) {
        $i++;
        $id = $row['id'];

        $country = $country = $row['country'];
        $partner = $row['company'];
        $start = $row['start'];
        $stop = $row['stop'];

        echo "
            <tr>
              <td>$country</td>
              <td>$partner</td>
              <td>$start</td>
              <td>$stop</td>
              <td>
              <div class='container'>
              <div class='row'>
              <a class='col-6 actions_link' href='index.php?red=$id&change=1'>
              $icon_arr[0]
              </a>
              <a class='col-6 actions_link1' href='index.php?del=$id&change=1'>
              $icon_arr[1]
                </a>
                </div>
                </div>
              </td>
            </tr>";
    }
    echo '</tbody>                                          
            </table>';
}

if ($_GET['grants']==1) {
    echo $table = '
    <table class="table table-dark table-bordered text-center">
    <thead>
    <tr>
      <th scope="col">Наименование фонда (организации)</th>
      <th scope="col">Наименование гранта</th>
      <th scope="col">Страна</th>
      <th scope="col">Начало</th>
      <th scope="col">Конец</th>
      <th scope="col">Действия</th>
      
    </tr>
  </thead>';
    $data = data_for_table();

    while ($row = mysqli_fetch_assoc($data)) {
        $i++;
        $id = $row['id'];

        $org = $country = $row['grant_organization'];
        $partner = $row['grant_name'];
        $country = $row['country'];
        $start = $row['start_grant_proj'];
        $stop = $row['stop_grant_proj'];

        echo "
            <tr>
              <td>$org</td>
              <td>$partner</td>
              <td>$country</td>
              <td>$start</td>
              <td>$stop</td>
              <td>
              <div class='container'>
              <div class='row'>
              <a class='col-6 actions_link' href='index.php?red=$id&grants=1'>
              $icon_arr[0]
              </a>
              <a class='col-6 actions_link1' href='index.php?del=$id&grants=1'>
              $icon_arr[1]
                </a>
                </div>
                </div>
              </td>
            </tr>";
    }
    echo '</tbody>                                          
            </table>';
}

if ($_GET['cult_event']==1) {
    echo $table = '
    <table class="table table-dark table-bordered text-center">
    <thead>
    <tr>
      <th scope="col">Наименование мероприятия</th>
      <th scope="col">Цель</th>
      <th scope="col">Дата проведения</th>
      <th scope="col">Количество участников</th>
      <th scope="col">Кратко итоги</th>
      <th scope="col">Статус</th>
      <th scope="col">Действия</th>
    </tr>
  </thead>';
    $data = data_for_table();

    while ($row = mysqli_fetch_assoc($data)) {
        $i++;
        $id = $row['id'];

        $name = $country = $row['event_name'];
        $target = $row['event_target'];
        $qua = $row['event_qua'];
        $loc = $row['event_location'];
        $status = $row['event_status'];
        $results = $row['event_results'];

        echo "
            <tr>
              <td>$name</td>
              <td>$target</td>
              <td>$qua</td>
              <td>$loc</td>
              <td>$status</td>
              <td>$results</td>
              <td>
              <div class='container'>
              <div class='row'>
              <a class='col-6 actions_link' href='index.php?red=$id&cult_event=1'>
              $icon_arr[0]
              </a>
              <a class='col-6 actions_link1' href='index.php?del=$id&cult_event=1'>
              $icon_arr[1]
                </a>
                </div>
                </div>
              </td>
            </tr>";
    }
    echo '</tbody>                                          
            </table>';

}

if ($_GET['cult_doc']==1) {
    echo $table = '
    <table class="table table-dark table-bordered text-center">
    <thead>
    <tr>
      <th scope="col">Страна</th>
      <th scope="col">Учреждение (организация)</th>
      <th scope="col">Дата заключения соглашения (договора).</th>
      <th scope="col">Срок действия</th>
      <th scope="col">Предмет соглашения (договора)</th>
      <th scope="col">Статус</th>
      <th scope="col">Действия</th>
    </tr>
  </thead>';
    $data = data_for_table();

    while ($row = mysqli_fetch_assoc($data)) {
        $i++;
        $id = $row['id'];

        $country = $country = $row['country'];
        $company = $row['company'];
        $agr_date = $row['agr_date'];
        $actuality = $row['actuality'];
        $agr_result = $row['agr_result'];
        $agr_status = $row['agr_status'];

        echo "
            <tr>
              <td>$country</td>
              <td>$company</td>
              <td>$agr_date</td>
              <td>$actuality</td>
              <td>$agr_result</td>
              <td>$agr_status</td>
              <td>
              <div class='container'>
              <div class='row'>
              <a class='col-6 actions_link' href='index.php?red=$id&cult_event=1'>
              $icon_arr[0]
              </a>
              <a class='col-6 actions_link1' href='index.php?del=$id&cult_event=1'>
              $icon_arr[1]
                </a>
                </div>
                </div>
              </td>
            </tr>";
    }
    echo '</tbody>                                          
            </table>';
}

if ($_GET['young']==1) {
    echo $table = '
    <table class="table table-dark table-bordered text-center">
    <thead>
    <tr>
      <th scope="col">Наименование мероприятия</th>
      <th scope="col">Цель</th>
      <th scope="col">Дата проведения</th>
      <th scope="col">Количество участников</th>
      <th scope="col">Место проведения</th>
      <th scope="col">Кратко итоги</th>
      <th scope="col">Статус</th></th>
      <th scope="col">Действия</th></th>
    </tr>
  </thead>';

    $data= data_for_table();
    while ($row = mysqli_fetch_assoc($data)) {
        $i++;
        $id = $row['id'];

        $event_name     = $row['event_name'];
        $event_target   = $row['event_target'];
        $event_date     = $row['event_date'];
        $qua            = $row['qua'];
        $event_location = $row['event_location'];
        $event_result   = $row['event_result'];
        $event_status   = $row['event_status'];

        echo "
            <tr>
              <td>$event_name</td>
              <td>$event_target</td>
              <td>$event_date</td>
              <td>$qua</td>
              <td>$event_location</td>
              <td>$event_result</td>
              <td>$event_status</td>
              <td>
              <div class='container'>
              <div class='row'>
              <a class='col-6 actions_link' href='index.php?red=$id&young=1'>
              $icon_arr[0]
              </a>
              <a class='col-6 actions_link1' href='index.php?del=$id&young=1'>
              $icon_arr[1]
                </a>
                </div>
                </div>
              </td>
            </tr>";
    }
    echo '</tbody>                                          
            </table>';
}

if ($_GET['ec_events']==1) {
    $i++;
    echo $table = '
    <table class="table table-dark table-bordered text-center">
    <thead>
    <tr>
      <th scope="col">Наименование мероприятия</th>
      <th scope="col">Цель</th>
      <th scope="col">Количество участников</th>
      <th scope="col">Кратко итоги</th>
      <th scope="col">Статус</th>
      <th scope="col">Действия</th>
    </tr>
  </thead>';

    while ($row = mysqli_fetch_assoc($data = data_for_table())) {
        $id = $row['id'];
        $name = $country = $row['event_name'];
        $target = $row['event_target'];
        $date = $row['event_date'];
        $qua = $row['event_qua'];
        $loc = $row['event_location'];
        $results = $row['event_result'];
        $status = $row['status'];

        echo "
            <tr>
              <td>$name</td>
              <td>$target</td>
              <td>$qua</td>
              <td>$loc</td>
              <td>$status</td>
              <td>$results</td>
              <td>
              <div class='container'>
              <div class='row'>
              <a class='col-6 actions_link' href='index.php?red=$id&ec_events=1'>
              $icon_arr[0]
              </a>
              <a class='col-6 actions_link1' href='index.php?del=$id&ec_events=1'>
              $icon_arr[1]
                </a>
                </div>
                </div>
              </td>
            </tr>";
    }

}

if ($_GET['ec_document']==1) {
    $i++;
    echo $table = '
    <table class="table table-dark table-bordered text-center">
    <thead>
    <tr>
      <th scope="col">Страна</th>
      <th scope="col">Организация</th>
      <th scope="col">Дата заключения соглашения</th>
      <th scope="col">Срок действия</th>
      <th scope="col">Кратко Предмет соглашения</th>
      <th scope="col">Статус</th>
      <th scope="col">Действия</th>
    </tr>
  </thead>';

    while ($row = mysqli_fetch_assoc($data = data_for_table())) {
        $id = $row['id'];
        $name = $country = $row['country'];
        $target = $row['company'];
        $date = $row['agr_date'];
        $qua = $row['actuality'];
        $loc = $row['subject'];
        $status = $row['status'];


        echo "
            <tr>
              <td>$name</td>
              <td>$target</td>
              <td>$date</td>
              <td>$qua</td>
              <td>$loc</td>
              <td>$status</td>
              <td>
              <div class='container'>
              <div class='row'>
              <a class='col-6 actions_link' href='index.php?red=$id'>
              $icon_arr[0]
              </a>
              <a class='col-6 actions_link1' href='index.php?del=$id'>
              $icon_arr[1]
                </a>
                </div>
                </div>
              </td>
            </tr>";
    }


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

