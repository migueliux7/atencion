<?php
$title = 'Exito';
require_once 'includes/header.php';
require_once 'db/conn.php';
require_once 'sendemail.php';

if(isset($_POST['submit'])){
  $fname = $_POST['firstname'];
  $lname = $_POST['lastname'];
  $dob = $_POST['nacimiento'];
  $specialty = $_POST['expertise'];
  $contact = $_POST['contacto'];
  $email = $_POST['email'];

  $target_dir = 'uploads/';
  $orig_file =  $_FILES["avatar"]["tmp_name"];
  $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
  $destination = "$target_dir$contact.$ext";
  move_uploaded_file($orig_file, $destination);

  $isSuccess = $crud->insert($fname, $lname, $dob, $email, $contact, $specialty, $destination);
  $specialtyName = $crud->getSpecialtyById($specialty);
  if($isSuccess){
    SendEmail::enviaEmail($email, 'Bienvenido a la confenrecia 2021', "Tu has sido exitosamente registrado para la conferencia IT de este año");
    include 'includes/successmessage.php';

  } else {
    include 'includes/errormessage.php';
  }
} else {
  echo 'no hubo boton submit en el request';
}
?>
<img src="<?php echo $destination; ?>" class="rounded-circle" style="width:30%; height=30%" alt="">
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php  echo $_POST['firstname']. ' ' . $_POST['lastname'] ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo $specialtyName['name']?></h6>
    <p class="card-text">Fecha de nacimiento: <?php echo $_POST['nacimiento']?></p>
    <p class="card-text">Numero de contacto: <?php echo $_POST['contacto']?></p>
    <p class="card-text">correo electronico: <?php echo $_POST['email']?></p>
    
  </div>
</div>
  
<br>
<br>
<?php require_once 'includes/footer.php'; ?>