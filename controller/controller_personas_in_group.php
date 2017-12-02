<?php

if ($_GET['group_id'])
{
    require_once('../model/Constants.php');
    require_once(__MODEL__.'DB.php');
    require_once(__MODEL__.'persona.php');

    $DB = DataBase::getInstance();
    $personasInGroup = $DB->getPersonasInGroup($_GET['group_id']);
    $DB->closeConnection();

    require_once(__VIEW__.'view_personas_in_group.php');
}

?>