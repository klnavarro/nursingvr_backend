<?php
include_once '../../config/headers.php';
include_once '../../config/NVRDatabase.php';
//need to get by userid in the future
$database = new Database();
$db = $database->connect();

$stmt = $db->prepare("SELECT Ant_RUL, Ant_RML, Ant_RLL, Ant_LUL, Ant_LLL, POST_RUL, POST_RLL, POST_LUL, POST_LLL, Lat_RUL, Lat_RML, Lat_RLL, Lat_LUL, Lat_LLL FROM NursingVR.S1Session ORDER BY idS1Session DESC LIMIT 1");

$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);

foreach($row as $value){
  print(strval($value)." | ");
}

return $row;