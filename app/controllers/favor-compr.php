<?php

require_once("app/database/db.php");

// Добавление в избранное
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['favor'])){

    $info_user_table = selectOne('favor_comp', array('ID' => $_SESSION['id']));  // Если уже есть данные в таблице про этого user

    if(empty($info_user_table)){
        
        $data_table = array(
            'ID' => $_SESSION['id'],
            'favorites ' => $_POST['favor'],
            'comparsion ' => '-',
        );

        insert('favor_comp', $data_table);
    }
    elseif($info_user_table['favorites'] == '-'){
        update('favor_comp', $_SESSION['id'], array('favorites' => $_POST['favor']));
    }
    else{
        update('favor_comp', $_SESSION['id'], array('favorites' => $info_user_table['favorites'] . ',' . $_POST['favor']));
    }

}

// Добавление к сравнению
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comp'])){

    $info_user_table = selectOne('favor_comp', array('ID' => $_SESSION['id']));  // Если уже есть данные в таблице про этого user

    if(empty($info_user_table)){
        
        $data_table = array(
            'ID' => $_SESSION['id'],
            'favorites ' => '-',
            'comparsion ' => $_POST['comp'],
        );

        insert('favor_comp', $data_table);
    }
    elseif($info_user_table['comparsion'] == '-'){

        update('favor_comp', $_SESSION['id'], array('comparsion' => $_POST['comp']));
    }
    else{
        update('favor_comp', $_SESSION['id'], array('comparsion' => $info_user_table['comparsion'] . ',' . $_POST['comp']));
    }

}

?>