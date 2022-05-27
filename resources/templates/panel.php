<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
	<link rel="stylesheet" href="css/index.css">
	<link rel="icon" type="image/png" href="images/logo.png" sizes="16x16">

	<title>
		<?php echo $title; ?>
	</title>
</head>

<body>
	<div class="page">
		<div class="sidebar">
			<div class="sidebar-header">
				<div class="sidebar-logo-container">
					<div class="logo-container">
						<img class="logo-sidebar" src="images/logo.png" />
					</div>
					<div class="brand-name-container">
						<p class="brand-name">
							App<br />
							<span class="brand-subname">
								Name
							</span>
						</p>
					</div>
				</div>
			</div>
			<div class="sidebar-body">
				<div class="teams-title-container">
					<p class="teams-title">
						DOCENTES
					</p>
				</div>
				<ul class="navigation-list">
					<li class="navigation-list-item <?php echo $actived[0] ?>">
						<a class="navigation-link" href="<?php echo BASE_URL . "/" ?>">
							<div class="row">
								<div class="col-2">
									<i class="fas fa-save"></i>
								</div>
								<div class="col-9">
									Guardar
								</div>
							</div>
						</a>
					</li>
					<li class="navigation-list-item <?php echo $actived[1] ?>">
						<a class="navigation-link" href="<?php echo BASE_URL . "/teachers-list.php" ?>"">
							<div class=" row">
								<div class="col-2">
									<i class="fas fa-clipboard-list"></i>
								</div>
								<div class="col-9">
									Listar
								</div>
							</div>
						</a>
					</li>
				</ul>
				<div class="teams-title-container">
					<p class="teams-title">
						MATERIAS
					</p>
				</div>
				<ul class="navigation-list">
					<li class="navigation-list-item <?php echo $actived[2] ?>">
						<a class="navigation-link" href="<?php echo BASE_URL . "/subjects.php" ?>"">
							<div class=" row">
								<div class="col-2">
									<i class="fas fa-save"></i>
								</div>
								<div class="col-9">
									Guardar
								</div>
							</div>
						</a>
					</li>
					<li class="navigation-list-item <?php echo $actived[3] ?>">
						<a class="navigation-link" href="<?php echo BASE_URL . "/subjects-list.php" ?>"">
							<div class=" row">
								<div class="col-2">
									<i class="fas fa-clipboard-list"></i>
								</div>
								<div class="col-9">
									Listar
								</div>
							</div>
						</a>
					</li>
				</ul>
				<div class="teams-title-container">
					<p class="teams-title">
						EXPORTAR PDF
					</p>
				</div>
				<ul class="navigation-list">
					<li class="navigation-list-item">
						<a class="navigation-link" href="<?php echo BASE_URL . "/pdf/teachers.php" ?>" target="_blank"">
							<div class=" row">
								<div class="col-2">
									<i class="fas fa-chalkboard-teacher"></i>
								</div>
								<div class="col-9">
									Docentes
								</div>
							</div>
						</a>
					</li>
					<li class="navigation-list-item">
						<a class="navigation-link" href="<?php echo BASE_URL . "/pdf/subjects.php" ?>" target="_blank"">
							<div class=" row">
								<div class="col-2">
									<i class="fas fa-file-signature"></i>
								</div>
								<div class="col-9">
									Materias
								</div>
							</div>
						</a>
					</li>
				</ul>
			</div>
		</div>
