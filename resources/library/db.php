<?php
function connect($config)
{
  $host = $config['db']['host'];
  $username = $config['db']['username'];
  $password = $config['db']['password'];
  $dbname = $config['db']['dbname'];

  $conexion = mysqli_connect($host, $username, $password, $dbname);

  return $conexion;
}
