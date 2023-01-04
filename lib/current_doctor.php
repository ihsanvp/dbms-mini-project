<?php

include "../lib/connect_db.php";

function current_doctor()
{
  if (array_key_exists("QUERY_STRING", $_SERVER)) {
    $q = array();
    parse_str($_SERVER["QUERY_STRING"], $q);

    if (array_key_exists("d", $q)) {

      $db = connect_db();
      $sql = "select * from doctors where id = {$q["d"]}";
      $doctor = $db->query($sql)->fetch_assoc();
      $db->close();

      if ($doctor) {
        return $doctor;
      }
    }
  }

  die("error fetching doctor");
}
