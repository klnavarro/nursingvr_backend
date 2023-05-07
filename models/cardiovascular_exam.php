<?php
class cardiovascular_exam
{
  // DB stuff
  private $conn;

  public $id;
  public $RSB_2IS;
  public $LSB_2IS;
  public $LSB_3IS;
  public $LSB_4IS;
  public $LSB_5IS;
  public $carotid_L;
  public $carotid_R;
  public $radial_L;
  public $radial_R;
  public $submitTime;
  public $leftUnmeasured;

  public function __construct($db)
  {
    $this->conn = $db;
  }

  public function create()
  {
    $query = 'INSERT INTO NursingVR.cardiovascular_exam_results SET RSB_2IS = ?, LSB_2IS = ?,LSB_3IS = ?,LSB_4IS = ?,LSB_5IS = ?,carotid_L = ?, carotid_R = ?,radial_L = ?,radial_R = ?, leftUnmeasured = ?;';

    $stmt = $this->conn->prepare($query);

    $this->RSB_2IS = htmlspecialchars(strip_tags($this->RSB_2IS));
    $this->LSB_2IS = htmlspecialchars(strip_tags($this->LSB_2IS));
    $this->LSB_3IS = htmlspecialchars(strip_tags($this->LSB_3IS));
    $this->LSB_4IS = htmlspecialchars(strip_tags($this->LSB_4IS));
    $this->LSB_5IS = htmlspecialchars(strip_tags($this->LSB_5IS));

    $this->carotid_L = htmlspecialchars(strip_tags($this->carotid_L));
    $this->carotid_R = htmlspecialchars(strip_tags($this->carotid_R));
    $this->radial_L = htmlspecialchars(strip_tags($this->radial_L));
    $this->radial_R = htmlspecialchars(strip_tags($this->radial_R));

    $this->leftUnmeasured = htmlspecialchars(strip_tags($this->leftUnmeasured));
    // Bind data

    $stmt->bindParam(1, $this->RSB_2IS);
    $stmt->bindParam(2, $this->LSB_2IS);
    $stmt->bindParam(3, $this->LSB_2IS);
    $stmt->bindParam(4, $this->LSB_2IS);
    $stmt->bindParam(5, $this->LSB_2IS);
    $stmt->bindParam(6, $this->carotid_L);
    $stmt->bindParam(7, $this->carotid_R);
    $stmt->bindParam(8, $this->radial_L);
    $stmt->bindParam(9, $this->radial_R);
    $stmt->bindParam(10, $this->leftUnmeasured);

    // Execute query
    if ($stmt->execute()) {
      return true;
    }

    return false;
  }
}
