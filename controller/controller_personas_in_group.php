<?php

if ($_GET['group_id'])
{
    require_once('../model/Constants.php');
    require_once(__MODEL__.'DB.php');
    require_once(__MODEL__.'persona.php');

    /*$DB = DataBase::getInstance();
    $personasInGroup = $DB->getPersonasInGroup($_GET['group_id']);
    $DB->closeConnection();*/
    if ($_GET['group_id'] == 1)
    {
        $personasInGroup = [new Persona(1, 'Ramon'), new Persona(2, 'Juan', 'Juanito')];
    }
    else
    {
        $personasInGroup = [new Persona(3, 'Jordi'), new Persona(4, 'Raul')];
    }
    

    require_once(__VIEW__.'view_personas_in_group.php');
}

?>