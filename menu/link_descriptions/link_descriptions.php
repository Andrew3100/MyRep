<?php
include 'bootstrap\template.php';

/*В этом файле хранится описание подсказок для ссылок в карточках BootStrap*/
/*Описание
e - образование
с - культура
m -молодёжная политика
ec - экономическая политика
*/

$e1 = 'Очная форма обучения';
$e2 = 'Зачная и очно-заочная форма обучения';
$e3 = 'Статистическая информация о количестве 
иностранных граждан слушателей подготовительного отделения (факультета) 
в образовательных организациях высшего образования Белгородской области';
$e4 = 'Информация о проведении (участии) ООВО области международных научных мероприятий';
$e5 = 'Информация о заключенных международных соглашения (договорах и пр.)';
$e6 = 'Информация о существующих программах мобильности';
$e7 = 'Обучение и практика за рубежом (обмен студентами)';
$e8 = 'Информация о полученных международных грантах';

$c1 = 'Информация о проведении (участии) учреждений культуры области международных мероприятиях';
$c2 = 'Информация о заключенных международных (приграничных) соглашения (договорах)';

$m1 = 'Информация о проведении (участии) учреждений (команд, молодежных правительств) молодежной политики области в международных мероприятиях';

$ec1 = 'Информация о проведении (участии) в международных (межрегиональных, приграничных) международных мероприятиях';
$ec2 = 'Информация о заключенных международных (приграничных) соглашения (договорах';

$educ = '               <li class="list-group-item"><a class="linked" href="?och=1" data-tooltip="'.$e1.'">Очная форма обучения</a></li>
                        <li class="list-group-item"><a class="linked" href="?zaoch=1" data-tooltip="'.$e2.'">Зачная форма обучения</a></li>
                        <li class="list-group-item"><a class="linked" href="?aus=1" data-tooltip="'.$e3.'">Иностранные слушатели</a></li>
                        <li class="list-group-item"><a class="linked" href="?international=1" data-tooltip="'.$e4.'">Междунар. мероприятия</a></li>
                        <li class="list-group-item"><a class="linked" href="?international_document=1" data-tooltip="'.$e5.'">Международные соглашения</a></li>
                        <li class="list-group-item"><a class="linked" href="?mobile=1" data-tooltip="'.$e6.'">Программы мобильности</a></li>
                        <li class="list-group-item"><a class="linked" href="?change=1" data-tooltip="'.$e7.'">Обмен студентами</a></li>
                        <li class="list-group-item"><a class="linked" href="?grants=1" data-tooltip="'.$e8.'">Гранты</a></li>
                        ';

$cult = '<li class="list-group-item"><a class="linked" href="?cult_event=1" data-tooltip="'.$c1.'">Мероприятия по культуре</a></li>
                        <li class="list-group-item"><a class="linked" href="?cult_doc=1" data-tooltip="'.$c2.'">Договора по культуре</a></li>
                        
                        ';

$young = '<li class="list-group-item"><a class="linked" href="?young=1" data-tooltip="'.$m1.'">Междунар. мероприятия</a></li>';



$ec = '<li class="list-group-item"><a class="linked" href="?ec_events=1" data-tooltip="'.$ec1.'">Мероприятия</a></li>
                        <li class="list-group-item"><a class="linked" href="?ec_document=1" data-tooltip="'.$ec2.'">Договора</a></li>
';



echo '
<style type="text/css">
    .linked {
    text-decoration: none;
    color: black;
    }
</style>
';