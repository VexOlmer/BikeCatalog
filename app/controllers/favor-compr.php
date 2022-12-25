<?php

require_once("app/database/db.php");

// Добавление
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn-add-favor'])){

    $info_user_table = selectOne('favor_comp', array('ID' => $_SESSION['id']));  // Если уже есть данные в таблице про этого user

    if(empty($info_user_table)){
        echo 'Empty user table';
        
        $data_table = array(
            'ID' => $_SESSION['id'],
            'favorites ' => $_POST['btn-add-favor'],
            'comparsion ' => '-',
        );

        insert('favor_comp', $data_table);
    }
    else{
        echo 'Not empty';
    }

}

?>