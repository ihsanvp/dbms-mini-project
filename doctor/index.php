<?php include "../lib/connect_db.php" ?>
<?php
$db = connect_db();
$doctors = $db->query("select * from doctors");

if (!$doctors) {
  die("cannot fetch doctors");
}

$db->close();
?>

<!DOCTYPE html>
<html lang="en">
<?php include "../components/head.php"; ?>

<body>
  <div class="container mx-auto">
    <div class="text-center text-6xl py-32 font-medium">Select Doctor</div>
    <div class="grid grid-cols-4 gap-10">
      <?php
      foreach ($GLOBALS["doctors"] as $doctor) {
        echo '
        <a href="/doctor/appointments.php?d=' . $doctor["id"] . '" class="border p-10 flex flex-col gap-5 rounded-xl hover:bg-purple-600 hover:text-white">
          <div class="text-2xl font-medium">' . $doctor["name"] . '</div>
          <div>' . $doctor["department"] . '</div>
        </a>
        ';
      }
      ?>
    </div>
  </div>
</body>

</html>