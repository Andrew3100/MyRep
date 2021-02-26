<?php

/*Этим скриптом вносили данные о формах таблиц. Первое поле -
имя гет параметра - позволяет привзять форму к определённой таблицен
2 поле - имя типа поля для <form></form>, чтобы сгенерировать форму
*/




require_once 'Classes/PHPExcel.php';
include 'database.php';


if(empty($_FILES) )
{
    var_dump($_FILES);

}

else
{
    //Выгрузка файла на страницу браузера, этот файл лежит в каталоге
    $excel = PHPExcel_IOFactory::load($_FILES['excel']['tmp_name']);
    echo '1';

    //Указываем в качестве активной ячейки первую
    $excel->setActiveSheetIndex(0);


    $i = 1;

    //Цикл до конца таблицы. Конец определяется первой пустой строкой
    while($excel->getActiveSheet()->getCell('B'.$i)->getValue()!="")
        //Получаем значение ячеек
    {
        echo '1';

        $get_name      =  $excel->getActiveSheet()->getCell('B'.$i)->getValue();
        $type          =  $excel->getActiveSheet()->getCell('C'.$i)->getValue();
        $descriptor    =  $excel->getActiveSheet()->getCell('D'.$i)->getValue();


        $paste = $mysqli->query("INSERT INTO bsu_form_data (get_name,type_name,descriptor_n,isused) VALUES ('$get_name','$type','$descriptor','1')");


        //Увеличиваем указатель строки
        $i++;

        if ($paste) {
            echo '1<br>';
        }


    }


}



?>