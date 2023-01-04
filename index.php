<!DOCTYPE html>
<html lang="en">

<?php include "./components/head.php" ?>

<body>
  <div class="w-screen h-screen flex flex-col items-center justify-center gap-20">
    <div>
      <div class="text-6xl text-center font-medium">Select User</div>
    </div>
    <div class="flex items-center justify-center gap-20">
      <a href="/patient" class="px-20 py-10 flex flex-col gap-5 rounded bg-purple-600 text-white hover:bg-purple-500">
        <div class="text-4xl font-bold">Patient</div>
        <div class="text-purple-50">Login as Patient</div>
      </a>
      <a href="/doctor" class="px-20 py-10 flex flex-col gap-5 rounded bg-teal-600 text-white hover:bg-teal-500">
        <div class="text-4xl font-bold">Doctor</div>
        <div class="text-purple-50">Login as Doctor</div>
      </a>
    </div>
  </div>
</body>

</html>