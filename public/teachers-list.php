<?php
$actived = [' ', ' active', '', ''];
$title = 'Listado docentes';
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
      $query = "SELECT *, date_format(birthdate, \"%d-%m-%Y\") as date FROM teachers;";

      $response = mysqli_query($connection, $query);
      mysqli_close($connection);

      ?>
    </div>

    <div class="position-relative">
      <h1 class="text-center  mt-5">Listado de docentes</h1>
      <br>
      <div class="table-responsive">

        <table class="table table-striped align-middle">
          <thead>
            <tr>
              <th scope="col">N</th>
              <th scope="col">Cédula</th>
              <th scope="col">Docente</th>
              <th scope="col">Profesión</th>
              <th scope="col">Fecha de nacimiento</th>
              <th scope="col">Opciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $index = 1;
            while ($row = mysqli_fetch_assoc($response)) {
              $teacher = $row['name'] . " " . $row['lastname'];
              echo "
                <tr>
                  <th scope='row'>" . $index++ . "</th>
                  <td>" . $row['document'] . "</td>
                  <td>" . $teacher . "</td>
                  <td>" . $row['profession'] . "</td>
                  <td>" . $row['date'] . "</td>
                  <td>
                    <a href='". BASE_URL."/update-teachers.php?id=" . $row['id'] . "' class='btn btn-success mx-1 my-1'> <i class='fas fa-pen'></i> </a>
                    <a href='". BASE_URL."/delete.php?id=" . $row['id'] . "&table=teachers' class='btn btn-danger mx-1 my-1'> <i class='fas fa-trash'></i> </a>
                  </td>
                </tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', () => {
    const btnDelete = document.querySelectorAll('.btn-danger');
    if (btnDelete) {
      const btnArray = Array.from(btnDelete);
      btnArray.forEach((btn) => {
        btn.addEventListener('click', (e) => {
          if (!confirm('Estás seguro de eliminarlo?')) {
            e.preventDefault();
          }
        });
      })
    }
  });
</script>

<?php
require_once(TEMPLATES_PATH . "/footer.php");
?>
