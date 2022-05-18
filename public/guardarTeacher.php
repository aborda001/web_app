<?php

include '../resources/config.php';
include LIBRARY_PATH . '/db.php';
include NOTIFY_PATH;

$document = $_POST['document'];
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$birthdate = $_POST['birthdate'];
$profession = $_POST['profession'];

$connection = connect($config);

$query = "INSERT INTO teachers (document, name, lastname, birthdate, profession) VALUES
('$document', '$name', '$lastname', '$birthdate', '$profession')";


$response = mysqli_query($connection, $query);
mysqli_close($connection);

$location = "Location: " . BASE_URL;

if ($response) {
  $message = "Docente agregado correctamente";
  $alert = "alert-success";
} else {
  $message = "Error al agregar al docente. Intente nuevamente";
  $alert = "alert-danger";
}

setNotify($message, $alert);
header($location);
exit();
