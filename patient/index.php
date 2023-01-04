<?php
include "../lib/render_sidebar.php";
include "../lib/connect_db.php";

$db = connect_db();
$doctors = $db->query("select * from doctors");
$db->close();

if (!$doctors) {
  die("cannot fetch doctors");
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include "../components/head.php" ?>

<body>
  <nav class="text-xl font-medium p-5 border-b text-center">
    Book Appointment
  </nav>
  <main>
    <form class="container mx-auto py-10" id="appointment-form">
      <div class="text-2xl font-medium text-gray-500">Patient Details</div>
      <div class="p-5 grid grid-cols-12 items-center justify-center gap-y-5">
        <!-- Name -->
        <div class="col-span-2 h-full ">
          <label for="name" class="w-full h-full cursor-pointer flex items-center">Name</label>
        </div>
        <div class="col-span-10">
          <input type="text" id="name" name="name" class="w-full px-5 py-3 border rounded" required>
        </div>

        <!-- Age -->
        <div class="col-span-2 h-full">
          <label for="age" class="w-full h-full cursor-pointer flex items-center">Age</label>
        </div>
        <div class="col-span-10">
          <input type="number" id="age" name="age" class="w-full px-5 py-3 border rounded" required>
        </div>

        <!-- Mobile -->
        <div class="col-span-2 h-full">
          <label for="mobile" class="w-full h-full cursor-pointer flex items-center">Mobile</label>
        </div>
        <div class="col-span-10">
          <input type="text" id="mobile" name="mobile" class="w-full px-5 py-3 border rounded" required>
        </div>
      </div>

      <div class="text-2xl font-medium text-gray-500 mt-20">Booking Details</div>
      <div class="p-5 grid grid-cols-12 items-center justify-center gap-y-5">
        <!-- Date -->
        <div class="col-span-2 h-full">
          <label for="date" class="w-full h-full cursor-pointer flex items-center">Date</label>
        </div>
        <div class="col-span-10">
          <input type="date" id="date" name="date" class="w-full px-5 py-3 border rounded" required>
        </div>

        <!-- Doctor -->
        <div class="col-span-2 flex items-start h-full">
          <div>Doctor</div>
        </div>
        <ul class="col-span-10 grid w-full gap-6 md:grid-cols-4">

          <?php
          foreach ($doctors as $i => $doctor) {
            $required = $i == 0 ? 'required="required`"' : " ";

            echo '
            <li>
              <input type="radio" id="doctor-' . $doctor["id"] . '" name="doctor" value="' . $doctor["id"] . '" class="hidden peer" ' . $required . '>
              <label for="doctor-' . $doctor["id"] . '" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100">
                <div class="block">
                  <div class="w-full text-lg font-semibold">' . $doctor["name"] . '</div>
                  <div class="w-full">' . $doctor["department"] . '</div>
                </div>
              </label>
            </li>
            ';
          }
          ?>
        </ul>

      </div>
      <div class="col-span-12 flex items-center justify-center">
        <input class="px-20 py-3 bg-purple-600 text-white cursor-pointer hover:bg-purple-500" type="submit" value="Submit">
      </div>
    </form>
  </main>
</body>

<script>
  const form = document.querySelector("#appointment-form")

  form.addEventListener("submit", (e) => {
    e.preventDefault()
    const data = new FormData(form)
    fetch({
      url: "/api/book-appointment.php",
      method: "POST",
      body: data
    }).then(res => {
      if (res.ok) {
        console.log("ok")
        res.json().then(data => console.log(data))
      } else {
        console.log("not")
      }
    })
  })
</script>

</html>