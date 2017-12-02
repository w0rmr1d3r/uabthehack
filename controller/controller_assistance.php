<?php

if ($_POST['assistance'])
{
    require_once('../model/Constants.php');
    require_once(__MODEL__.'DB.php');

    $todayDate = date('d-m-Y h:i:s');
    
    $DB = DataBase::getInstance();
    $DB->insertAssistance($todayDate, $_POST['assistance']);
    $DB->closeConnection();

    header("Location: ../index.php");
}

?>