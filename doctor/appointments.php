<?php
include "../lib/render_sidebar.php";
include "../lib/render_navbar.php";
include "../lib/current_doctor.php";

$doctor = current_doctor();
$doctor_id = $doctor["id"];

$db = connect_db();

$appointments = $db->query("select * from appointments inner join patients on appointments.patient_id = patients.id where doctor_id = $doctor_id");
?>

<!DOCTYPE html>
<html lang="en">

<?php include "../components/head.php" ?>

<body>
  <?php render_sidebar('/doctor/appointments.php', [
    [
      "label" => "Appointments",
      "href" => "/doctor/appointments.php"
    ],
  ], $doctor["name"]); ?>

  <main class="pl-80">
    <?php render_navbar("Appointments") ?>
    <div class="grid grid-cols-12 p-5 gap-5">
      <?php
      foreach ($appointments as $appointment) {
        echo '
          <div class="border rounded-xl p-5 flex flex-col col-span-4 gap-3">
            <div class="flex items-center justify-between">
              <div class="text-2xl">Patient Name</div>
              <div>' . $appointment["name"] . '</div>
            </div>
            <div class="flex items-center justify-between">
              <div class="text-2xl">Age</div>
              <div>' . $appointment["age"] . '</div>
            </div>
            <div class="flex items-center justify-between">
              <div class="text-2xl">Date</div>
              <div>' . $appointment["date"] . '</div>
            </div>
            <div class="flex items-center justify-between">
              <div class="text-2xl">Token No</div>
              <div>' . $appointment["token_no"] . '</div>
            </div>
          </div>
          ';
      }
      ?>
    </div>
  </main>
</body>

</html>