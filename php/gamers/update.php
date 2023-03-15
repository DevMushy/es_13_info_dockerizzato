<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object files
include_once '../config/db.php';
include_once '../object/gamer.php';

$database = new Db();
$db = $database->getConnection();

// initialize object
$gamer = new gamers($db);

// get posted data
$data = json_decode(file_get_contents("php://input", true));

// set ID property of department to be updated
$gamer->id = $data->id;
// set department property value
$gamer->nickname = $data->nickname;

// update the department
if ($gamer->update()) {
    echo '{';
    echo '"message": "gamer was updated."';
    echo '}';
}

// if unable to update the department, tell the user
else {
    echo '{';
    echo '"message": "Unable to update gamer."';
    echo '}';
}
