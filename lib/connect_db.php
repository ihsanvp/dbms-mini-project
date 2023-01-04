<?php

function connect_db()
{
  $host = "localhost";
  $user = "root";
  $pass = "";
  $db = "ihsan";

  $conn = mysqli_connect($host, $user, $pass, $db);

  if (!$conn) {
    die("database connection error");
  }

  return $conn;
}
