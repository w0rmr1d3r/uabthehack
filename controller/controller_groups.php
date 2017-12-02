<?php

require_once('../model/Constants.php');
require_once(__MODEL__.'DB.php');
require_once(__MODEL__.'group.php');

$DB = DataBase::getInstance();
$groups = $DB->getGroups();
$DB->closeConnection();

require_once(__VIEW__.'view_groups.php');

?>