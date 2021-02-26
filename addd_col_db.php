<?php
include 'database.php';

$table_list = array(
    'education_auslanders','education_science_events','education_inter_agr',
    'education_mobile_program','education_students_change','education_get_grants',
    'culture_events','culture_agr','youth_inter_events','econom_inter_events','econom_inter_agr'
);
echo count($table_list);

for ($i=0;$i<11;$i++) {
    $add = $mysqli->query("ALTER TABLE $table_list[$i] ADD COLUMN status INT NULL DEFAULT 1");
    if ($add) {
        echo 'Успешно';
    }
}

