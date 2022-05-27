<?php
$actived = [' active', '', '', ''];
$title = 'Guardar Docente';
require_once("../resources/config.php");
require_once(TEMPLATES_PATH . "/panel.php");
require_once(TEMPLATES_PATH . "/navbar.php");

include LIBRARY_PATH . '/db.php';
?>
<div class="container position-relative pt-5">
  <div class="row">
    <div class="col-md-5 mt-3">
      <?php
      include NOTIFY_PATH;
      shownotify();
      $id = $_GET['id'];
      $connection = connect($config);

      $query = "SELECT * FROM teachers WHERE id = '$id'";
      $teachers =  mysqli_fetch_array(mysqli_query($connection, $query));
      mysqli_close($connection);
      ?>
    </div>

    <section class="col-md-5">
      <div class="login">
        <h1 class="text-center">Registar Docente</h1>
        <form class="needs-validation" action="update.php" method="POST">
          <div class="form-group was-validated">
            <label class="form-label" for="document">Cédula</label>
            <input class="form-control" type="number" name="document" required value="<?php echo $teachers[1] ?>">
          </div>
          <div class="form-group was-validated">
            <label class="form-label" for="name">Nombre</label>
            <input class="form-control" type="text" name="name" required value="<?php echo $teachers[2] ?>">
          </div>
          <div class="form-group was-validated">
            <label class="form-label" for="lastname">Apellido</label>
            <input class="form-control" type="text" name="lastname" required value="<?php echo $teachers[3] ?>">
          </div>
          <div class="form-group was-validated">
            <label class="form-label" for="birthdate">Fecha de nacimiento</label>
            <input class="form-control" type="date" name="birthdate" required value="<?php echo $teachers[4] ?>">
          </div>
          <div class="form-group was-validated">
            <label class="form-label" for="profession">Profesion</label>
            <input class="form-control" type="text" name="profession" required value="<?php echo $teachers[5] ?>">
          </div>
          <input type="text" value="true" hidden name="teacher">
          <input type="text" value="<?php echo $id ?>" hidden name="id">
          <input class="btn btn-success w-100" type="submit" value="GUARDAR">
        </form>
      </div>
    </section>
  </div>
</div>

<?php
require_once(TEMPLATES_PATH . "/footer.php");
?>
