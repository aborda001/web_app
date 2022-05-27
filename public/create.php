<?php

include '../resources/config.php';
include LIBRARY_PATH . '/db.php';
include NOTIFY_PATH;
$location = "Location: " . BASE_URL;

if ($_POST['teacher'] == 'true') {
  $document = $_POST['document'];
  $name = $_POST['name'];
  $lastname = $_POST['lastname'];
  $birthdate = $_POST['birthdate'];
  $profession = $_POST['profession'];

  $connection = connect($config);

  $query = "INSERT INTO teachers (document, name, lastname, birthdate, profession) VALUES ('$document', '$name', '$lastname', '$birthdate', '$profession')";


  $response = mysqli_query($connection, $query);
  mysqli_close($connection);


  if ($response) {
    $message = "Docente agregado correctamente";
    $alert = "alert-success";
  } else {
    $message = "Error al agregar al docente. Intente nuevamente";
    $alert = "alert-danger";
  }
} else {
  $hours = $_POST['hours'];
  $name = $_POST['name'];
  $teacherId = $_POST['teacher_id'];

  $connection = connect($config);

  $query = "INSERT INTO subjects (name, hours, teacher_id) VALUES ('$name', '$hours', '$teacherId')";

  $response = mysqli_query($connection, $query);
  mysqli_close($connection);

  $location = "Location: " . BASE_URL."/subjects.php";

  if ($response) {
    $message = "Materia agregada correctamente";
    $alert = "alert-success";
  } else {
    $message = "Error al agregar la materia. Intente nuevamente";
    $alert = "alert-danger";
  }
}

setNotify($message, $alert);
header($location);
exit();
