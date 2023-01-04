<?php
include "../lib/render_sidebar.php";
include "../lib/render_navbar.php";
include "../lib/current_doctor.php";

$doctor = current_doctor();
?>


<!DOCTYPE html>
<html lang="en">

<?php include "../components/head.php" ?>

<body>
  <?php render_sidebar("/doctor/patients.php", [
    [
      "label" => "Appointments",
      "href" => "/doctor/appointments.php"
    ],
    [
      "label" => "Patients",
      "href" => "/doctor/patients.php"
    ],
  ], $doctor["name"]); ?>

  <main class="pl-80">
    <?php render_navbar("Patients"); ?>
  </main>
</body>

</html>