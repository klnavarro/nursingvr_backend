<?php
include_once '../../config/headers.php';
include_once '../../config/NVRDatabase.php';
//need to get by userid in the future
$database = new Database();
$db = $database->connect();

$stmt = $db->prepare("SELECT RSB_2IS, LSB_2IS, LSB_3IS, LSB_4IS, LSB_5IS, BPM, carotid_R, radial_L, radial_R FROM NursingVR.instructor_cardiovascular_exam_results ORDER BY id DESC LIMIT 1");

$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);

foreach($row as $value){
  print(strval($value)." | ");
}
  
return $row;