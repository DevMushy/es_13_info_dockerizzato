<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


// include database and object files
include_once '../config/db.php';
include_once '../object/gamer.php';

$database = new Db();
$db = $database->getConnection();

// initialize object
$gamer = new gamers($db);

// set ID property of department to be deleted
$gamer->id = filter_input(INPUT_GET, 'id');

// delete the department
if ($gamer->delete()) {
    echo '{';
    echo '"message": "gamer was deleted."';
    echo '}';
}

// if unable to delete the department
else {
    echo '{';
    echo '"message": "Unable to delete gamer."';
    echo '}';
}
