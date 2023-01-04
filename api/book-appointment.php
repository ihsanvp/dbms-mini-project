<?php
include "../lib/connect_db.php";

header("Content-Type: application/json");

if ($_REQUEST["method"] == "POST") {
  $name = $age = $mobile = $date = $doctor = "";

  if (isset($_POST["name"]) && isset($_POST["age"]) && isset($_POST["mobile"]) && isset($_POST["date"]) && isset($_POST["doctor"])) {
    $name = trim($_POST["name"]);
    $age = trim($_POST["age"]);
    $mobile = trim($_POST["mobile"]);
    $date = trim($_POST["date"]);
    $doctor = trim($_POST["doctor"]);

    if ($name && $age && $mobile && $date && $doctor) {
      $db = connect_db();

      $user = $db->query("select * from patients where name = '$name' and mobile = '$mobile'")->fetch_assoc();

      if ($user) {
        $db->query("insert into appointments (doctor_id, patient_id, date, token) values ($doctor, {$user["id"]}, $date, 23)");
        echo json_encode([]);
        return;
      } else if ($user != false) {
        $db->query("insert into patients (name, age, mobile) values ('$name', $age, '$mobile')");
        $patient = $db->query("select * from patients where name = '$name' and mobile = '$mobile'")->fetch_assoc();
        $db->query("insert into appointments (doctor_id, patient_id, date, token) values ($doctor, {$patient["id"]}, $date, 23)");
        echo json_encode([]);
        return;
      }
    }
  }
}
http_response_code(400);
