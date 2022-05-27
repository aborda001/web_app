<?php

include '../resources/config.php';
include LIBRARY_PATH . '/db.php';
include NOTIFY_PATH;
$location = "Location: " . BASE_URL . "/teachers-list.php";

if ($_POST['teacher'] == 'true') {
  $document = $_POST['document'];
  $name = $_POST['name'];
  $lastname = $_POST['lastname'];
  $birthdate = $_POST['birthdate'];
  $profession = $_POST['profession'];
  $id = $_POST['id'];

  $connection = connect($config);

  $query = "
    UPDATE teachers
    SET document = '$document',
        name = '$name',
        lastname = '$lastname',
        birthdate = '$birthdate',
        profession = '$profession'
    WHERE id = '$id'
    ";


  $response = mysqli_query($connection, $query);
  mysqli_close($connection);


  if ($response) {
    $message = "Docente actualizado correctamente";
    $alert = "alert-success";
  } else {
    $message = "Error al actualizar al docente. Intente nuevamente";
    $alert = "alert-danger";
  }
} else {
  $hours = $_POST['hours'];
  $name = $_POST['name'];
  $teacherId = $_POST['teacher_id'];
  $id = $_POST['id'];

  $connection = connect($config);

  $query = "
    UPDATE subjects
    SET name = '$name',
      hours = '$hours',
      teacher_id = '$teacherId'
    WHERE id = '$id';
  ";

  $response = mysqli_query($connection, $query);
  mysqli_close($connection);

  $location = "Location: " . BASE_URL . "/subjects-list.php";

  if ($response) {
    $message = "Materia actualizada correctamente";
    $alert = "alert-success";
  } else {
    $message = "Error al actualizar la materia. Intente nuevamente";
    $alert = "alert-danger";
  }
}

setNotify($message, $alert);
header($location);
exit();
