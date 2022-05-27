<?php
include '../../resources/config.php';
include LIBRARY_PATH . '/db.php';
require LIBRARY_PATH . "/fpdf/fpdf.php";

$connection = connect($config);

$connection = connect($config);
$query = "SELECT subjects.id, subjects.name AS subject_name, subjects.hours, subjects.teacher_id, teachers.name, teachers.lastname FROM subjects JOIN teachers ON subjects.teacher_id = teachers.id OR subjects.teacher_id IS NULL;";

$response = mysqli_query($connection, $query);
mysqli_close($connection);

class PDF extends FPDF
{
  // Cabecera de página
  function Header()
  {
    $this->Ln(10);
    // Logo
    $this->Image("../images/logo.png", 50, 10, 13);
    // Arial bold 15
    $this->SetFont("Arial", "B", 15);
    // Título
    $this->Cell(25);
    $this->Cell(150, 10, utf8_decode("Reporte de todas las materias:"), 0, 0, "C");
    $this->Ln(10);
    //Fecha
    $this->SetFont("Arial", "", 10);
    $this->Cell(25, 10, "Fecha: " . date("d/m/Y"), 0, 1, "C");
  }

  // Pie de página
  function Footer()
  {
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial', 'I', 8);
    // Número de página
    $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
  }
}

$pdf = new PDF("P", "mm", "legal");
$pdf->SetTitle("Reporte de materias");
$pdf->AliasNbPages();
$pdf->SetMargins(7, 5, 5);
$pdf->AddPage();
$pageWidht = $pdf->GetPageWidth();
$pdf->SetMargins($pageWidht / 6, 5, 5);
$pdf->Ln(10);
$pdf->SetFont("Arial", "B", 12);

$pdf->Cell(10, 10, utf8_decode("#"), 1, 0, "C");
$pdf->Cell(40, 10, utf8_decode("Materia"), 1, 0, "C");
$pdf->Cell(40, 10, utf8_decode("Horas cátedras"), 1, 0, "C");
$pdf->Cell(50, 10, utf8_decode("Docente"), 1, 0, "C");

$pdf->SetFont("Arial", "", 12);
$index = 1;
$subjects_listed = [];

while ($row = $response->fetch_assoc()) {
  if (!in_array($row['id'], $subjects_listed)) {
    $teacher = $row['teacher_id'] == null ? 'Sin asignar' : $row['name'] . ' ' . $row['lastname'];
    $hours = $row['hours'] . ($row['hours'] > 1 ? " horas" : " hora");
    $pdf->Ln(10);
    $pdf->Cell(10, 10, $index++, 1, 0, "C");
    $pdf->Cell(40, 10, utf8_decode($row['subject_name']), 1, 0, "C");
    $pdf->Cell(40, 10, utf8_decode($hours), 1, 0, "C");
    $pdf->Cell(50, 10, utf8_decode($teacher), 1, 0, "C");
    array_push($subjects_listed, $row['id']);
  }
}

$pdf->Output();
