<?php
function showNotify()
{
  if (isset($_COOKIE['message'])) {
    echo "<div class='alert " . $_COOKIE['alert'] . " alert-dismissible fade show' role='alert'>";
    echo $_COOKIE['message'];
    echo "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
    echo "</div>";
  }
}

function setNotify($message, $alert)
{
  setcookie("message", $message, time() + 2);
  setcookie("alert", $alert, time() + 2);
}
