<?php
// Headers
header("Access-Control-Allow-Origin: http://localhost/");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../config/NVRDatabase.php';
include_once '../../models/cardiovascular_exam.php';


// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

$authHeader = $_SERVER['HTTP_AUTHORIZATION'];
$arr = explode(" ", $authHeader);

$cardio_exam = new cardiovascular_exam($db);

$cardio_exam->RSB_2IS = "" . $_GET['RSB_2IS'];
$cardio_exam->LSB_2IS = "" . $_GET['LSB_2IS'];
$cardio_exam->LSB_3IS = "" . $_GET['LSB_3IS'];
$cardio_exam->LSB_4IS = "" . $_GET['LSB_4IS'];
$cardio_exam->LSB_5IS = "" . $_GET['LSB_5IS'];
$cardio_exam->carotid_L = "" . $_GET['carotid_L'];
$cardio_exam->carotid_R = "" . $_GET['carotid_R'];
$cardio_exam->radial_L = "" . $_GET['radial_L'];
$cardio_exam->radial_R = "" . $_GET['radial_R'];
$cardio_exam->leftUnmeasured = "" . $_GET['leftUnmeasured'];


if ($cardio_exam->create()) {
    echo json_encode(

        array('message' => 'Cardiovascular exam answers saved.')
    );
} else {
    echo json_encode(
        array('message' => 'Cardiovascular exam answers not saved.')
    );
}
