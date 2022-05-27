<?php
$actived = ['','',' active', ''];
$title = 'Guardar Materia';
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

      $connection = connect($config);
      $query = "SELECT teachers.id, teachers.name, teachers.lastname FROM teachers";

      $response = mysqli_query($connection, $query);
      mysqli_close($connection);

      ?>
    </div>

    <section class="col-md-5">
      <div class="login">
        <h1 class="text-center">Registar Materia</h1>
        <form class="needs-validation" action="create.php" method="POST">
          <div class="form-group was-validated">
            <label class="form-label" for="name">Nombre</label>
            <input class="form-control" type="text" name="name" required>
          </div>
          <div class="form-group was-validated">
            <label class="form-label" for="hours">Horas cátedras</label>
            <input class="form-control" type="number" name="hours" required>
          </div>
          <div class="form-group was-validated">
            <label class="form-label" for="profession">Docente</label>
            <select class="form-control custom-select" name="teacher_id">
              <?php
              while ($item = mysqli_fetch_array($response)) {
                $teacher = $item['name'] . " " . $item['lastname'];
                echo "<option value='" . $item['id'] . "'>" . $teacher . "</option>";
              }
              ?>
            </select>
          </div>
          <input type="text" value="false" hidden name="teacher">
          <input class="btn btn-success w-100" type="submit" value="GUARDAR">
        </form>

      </div>
    </section>
  </div>
</div>
<?php
require_once(TEMPLATES_PATH . "/footer.php");
?>
