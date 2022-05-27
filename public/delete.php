<?php

include '../resources/config.php';
include LIBRARY_PATH . '/db.php';
include NOTIFY_PATH;
$location = "Location: " . BASE_URL . "/teachers-list.php";

if ($_GET['table'] == 'teachers') {
  $connection = connect($config);
  $query = "DELETE FROM teachers WHERE id = '$_GET[id]'";
  $response = mysqli_query($connection, $query);
  mysqli_close($connection);

  if ($response) {
    $message = "Docente eliminado correctamente";
    $alert = "alert-success";
  } else {
    $message = "Error al eliminar al docente. Intente nuevamente";
    $alert = "alert-danger";
  }
} else {
  $connection = connect($config);
  $query = "DELETE FROM subjects WHERE id = '$_GET[id]'";
  $response = mysqli_query($connection, $query);
  $location = "Location: " . BASE_URL . "/subjects-list.php";
  mysqli_close($connection);

  if ($response) {
    $message = "Materia eliminada correctamente";
    $alert = "alert-success";
  } else {
    $message = "Error al eliminar la materia. Intente nuevamente";
    $alert = "alert-danger";
  }
}

setNotify($message, $alert);
header($location);
exit();
