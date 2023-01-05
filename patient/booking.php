<!DOCTYPE html>
<html lang="en">

<?php include "../components/head.php" ?>

<body>
  <div class="w-screen h-screen flex items-center justify-center flex-col gap-20">
    <div class="text-8xl">Booking Successful</div>
    <div>
      <a href="/" class="px-20 py-5 bg-purple-600 text-white">Home</a>
    </div>
  </div>
</body>

</html>

<?php
include_once "../lib/connect_db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = trim($_POST["name"]);
  $age = trim($_POST["age"]);
  $mobile = trim($_POST["mobile"]);
  $date = trim($_POST["date"]);
  $doctor = trim($_POST["doctor"]);
  $token = strval(rand(0, 100));

  $db = connect_db();

  $user = $db->query("select * from patients where name = '$name' and mobile = '$mobile'")->fetch_assoc();

  if ($user) {
    $db->query("insert into appointments (doctor_id, patient_id, date, token_no) values ($doctor, {$user["id"]}, $date, $token)");
    return;
  } else if ($user == null) {
    $db->query("insert into patients (name, age, mobile) values ('$name', $age, '$mobile')");
    $patient = $db->query("select * from patients where name = '$name' and mobile = '$mobile'")->fetch_assoc();
    $db->query("insert into appointments (doctor_id, patient_id, date, token_no) values ($doctor, {$patient["id"]}, $date, $token)");
    return;
    echo "user not found";
  } else {
    echo "error";
  }
}
?>