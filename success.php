<?php
$title = 'Exito';
require_once 'includes/header.php';
require_once 'db/conn.php'; 
if(isset($_POST['submit'])){
  $fname = $_POST['firstname'];
  $lname = $_POST['lastname'];
  $dob = $_POST['nacimiento'];
  $specialty = $_POST['expertise'];
  $contact = $_POST['contacto'];
  $email = $_POST['email'];
  $isSuccess = $crud->insert($fname, $lname, $dob, $email, $contact, $specialty);
  if($isSuccess){
    include 'includes/successmessage.php';
  } else {
    include 'includes/errormessage.php';
  }
} else {
  echo 'no hubo boton submit en el request';
}
?>
  
<br>
<br>
<?php require_once 'includes/footer.php'; ?>