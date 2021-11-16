<?php 
  include_once 'includes/session.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="css/site.css"/>
    <title>Attendance - <?php echo $title ?></title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">IT Conference</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" 
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse container" id="navbarNavAltMarkup">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home <span class="sr-only">current</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="viewrecords.php">Ver asistentes</a>
              </li>
            </ul>
            <ul class="nav justify-content-end">
              <li class="nav-item">
                <span class="navbar-text">
                 <?php if(!isset($_SESSION['user_id'])){ ?>
                  <a class="nav-link" href="login.php">Login</a>
                 <?php } else {?>
                   <a class="nav-link" href="#"> Hola <?php echo $_SESSION['user']; ?>!</a>
                </span>
              </li>
              
              <li class="nav-item">
                <span class="navbar-text">
                  <a class="nav-link" href="logout.php">Salir</a>
                <?php } ?>
               </span>
              </li>
           </ul>
          </div>
        </div>
      </nav>
    <div class="container">
     