<?php
$actived = ['', '', '', ' active'];
$title = 'Editar Materia';
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
      $query = "SELECT teachers.id, teachers.name, teachers.lastname FROM teachers";

      $response = mysqli_query($connection, $query);

      $query = "SELECT name, hours, teacher_id FROM subjects WHERE id = '$id'";
      $subjects =  mysqli_fetch_array(mysqli_query($connection, $query));
      mysqli_close($connection);

      ?>
    </div>

    <section class="col-md-5">
      <div class="login">
        <h1 class="text-center">Editar Materia</h1>
        <form class="needs-validation" action="update.php" method="POST">
          <div class="form-group was-validated">
            <label class="form-label" for="name">Nombre</label>
            <input class="form-control" type="text" name="name" required value="<?php echo $subjects[0] ?>">
          </div>
          <div class="form-group was-validated">
            <label class="form-label" for="hours">Horas cátedras</label>
            <input class="form-control" type="number" name="hours" required value="<?php echo $subjects[1] ?>">
          </div>
          <div class="form-group was-validated">
            <label class="form-label" for="profession">Docente</label>
            <select class="form-control custom-select" name="teacher_id">
              <?php
              while ($item = mysqli_fetch_array($response)) {
                $teacher = $item['name'] . " " . $item['lastname'];
                if ($item['id'] == $subjects[2]) {
                  echo "<option value='" . $item['id'] . "' selected>" . $teacher . "</option>";
                } else {
                  echo "<option value='" . $item['id'] . "'>" . $teacher . "</option>";
                }
              }
              ?>
            </select>
          </div>
          <input type="text" value="false" hidden name="teacher">
          <input type="text" value="<?php echo $id?>" hidden name="id">
          <input class="btn btn-success w-100" type="submit" value="GUARDAR">
        </form>

      </div>
    </section>
  </div>
</div>
<?php
require_once(TEMPLATES_PATH . "/footer.php");
?>
