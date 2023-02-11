<?php

require_once("app/database/db.php");

$all_company = getColumn('brands', 'name_company');
$all_company_desc = getColumn('brands', 'description_company');

$company_info = array();

for($i=0; $i<count($all_company); $i++){
    array_push($company_info, array('name' => $all_company[$i]['name_company'], 'desc' => $all_company_desc[$i]['description_company']));
}

?>