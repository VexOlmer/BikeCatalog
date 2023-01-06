<?php

$table_tech = array();

// При переходе фильтров на подробную информацию о велосипеде
if($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['bike'])){

    $main_info_column = array("season", "level", "type", "destination");
    $tech_info_column = array(  "frame_material", "frame", "wheel_mount", "fork_design", "fork", "front_hub", "rear_hub", "rims",
                            "steering_wheel", "number_speeds", "rear_derailleur", "front_derailleur", "cassette", 
                            "carriage", "system", "shifters", "tires", "brake_type", "front_brake", "rear_brake", 
                            "pedals", "seatpost", "saddle", "wheel_size");

    $main_info_column_ru = array("СЕЗОН", "УРОВЕНЬ ОБОРУДОВАНИЯ", "ТИП", "НАЗНАЧЕНИЕ");
    $tech_info_column_ru = array(  "МАТЕРИАЛ РАМЫ", "РАМА", "КРЕПЛЕНИЕ КОЛЕСА", "КОНСТРУКЦИЯ ВИЛКИ", "ВИЛКА", "ПЕРЕДНЯЯ ВТУЛКА", "ЗАДЯНЯЯ ВТУЛКА", "ОБОДА",
                                "РУЛЬ", "КОЛИЧЕСТВО СКОРОСТЕЙ", "ЗАДАНИЙ ПЕРЕКЛЮЧАТЕЛЬ", "ПЕРЕДНИЙ ПЕРЕКЛЮЧАТЕЛЬ", "КАССЕТА", 
                                "КАРЕТКА", "СИСТЕМА", "МАНЕТКИ", "ПОКРЫШКИ", "ТИП ТОРМОЗОВ", "ПЕРЕДНИЙ ТОРМОЗ", "ЗАДНИЙ ТОРМОЗ", 
                                "ПЕДАЛИ", "ПОДСЕДЕЛЬНЫЙ ШТЫРЬ", "СЕДЛО", "РАЗМЕР КОЛЕС В ДМ");

    $id_bike = $_GET['bike'];
    $bike_main = selectOne('bikeinfo', array('BIKE_ID' => $id_bike));
    $bike_tech = selectOne('tech_spec', array('BIKE_ID' => $id_bike));

    array_push($table_tech, array('БРЕНД' => selectOne('brands', ['BRANDS_ID' => $bike_main['BID']])['name_company']));

    // for ($i = 0; $i < count($main_info_column); $i++) {
    //     if($bike_main[$main_info_column[$i]] != '-'){
    //         $table_tech[$main_info_column_ru[$i]] = $bike_main[$main_info_column[$i]];
    //     }
    // }

    // for ($i = 0; $i < count($tech_info_column); $i++) {
    //     if($bike_tech[$tech_info_column[$i]] != '-'){
    //         $table_tech[$tech_info_column_ru[$i]] = $bike_tech[$tech_info_column[$i]];
    //     }
    // }

    for ($i = 0; $i < count($main_info_column); $i++) {
        if($bike_main[$main_info_column[$i]] != '-'){
            array_push($table_tech, array($main_info_column_ru[$i] => $bike_main[$main_info_column[$i]]));
        }
    }

    for ($i = 0; $i < count($tech_info_column); $i++) {
        if($bike_tech[$tech_info_column[$i]] != '-'){
            array_push($table_tech, array($tech_info_column_ru[$i] => $bike_tech[$tech_info_column[$i]]));
        }
    }
}
?>