<?php

if ($_POST['email_login'] && $_POST['password_login'])
{
    require_once('../model/Constants.php');
    require_once(__MODEL__.'DB.php');

    $message = 'ERROR';

    $DB = DataBase::getInstance();
    if ($DB->checkLogin($_POST['email_login'], $_POST['password_login']))
    {
        session_start();
        $_SESSION['email'] = $_POST['email_login'];
        $message = 'SUCCESS';
    }
    $DB->closeConnection();
    echo $message;
}

?>