<?php
$title = 'Guardar Docente';
require_once("../resources/config.php");
require_once(TEMPLATES_PATH . "/panel.php");
require_once(TEMPLATES_PATH . "/navbar.php");
?>
<div class="container position-relative pt-5">
  <div class="row">
    <div class="col-md-5 mt-3">
      <?php
      include NOTIFY_PATH;
      shownotify();
      ?>
    </div>

    <section class="col-md-5">
      <div class="login">
        <h1 class="text-center">Registar Docente</h1>
        <form class="needs-validation" action="guardarTeacher.php" method="POST">
          <div class="form-group was-validated">
            <label class="form-label" for="document">Cédula</label>
            <input class="form-control" type="number" name="document" required>
          </div>
          <div class="form-group was-validated">
            <label class="form-label" for="name">Nombre</label>
            <input class="form-control" type="text" name="name" required>
          </div>
          <div class="form-group was-validated">
            <label class="form-label" for="lastname">Apellido</label>
            <input class="form-control" type="text" name="lastname" required>
          </div>
          <div class="form-group was-validated">
            <label class="form-label" for="birthdate">Fecha de nacimiento</label>
            <input class="form-control" type="date" name="birthdate" required>
          </div>
          <div class="form-group was-validated">
            <label class="form-label" for="profession">Profesion</label>
            <input class="form-control" type="text" name="profession" required>
          </div>
          <input class="btn btn-success w-100" type="submit" value="GUARDAR">
        </form>

      </div>
    </section>
  </div>
</div>

<?php
require_once(TEMPLATES_PATH . "/footer.php");
?>
