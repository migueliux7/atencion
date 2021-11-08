<?php
$title = 'Actualizar';
require_once 'includes/header.php';
require_once 'db/conn.php';
if(isset($_POST['update'])){
    $id = $_POST['id'];
  $fname = $_POST['firstname'];
  $lname = $_POST['lastname'];
  $dob = $_POST['nacimiento'];
  $specialty = $_POST['expertise'];
  $contact = $_POST['contacto'];
  $email = $_POST['email'];
  $isSuccess = $crud->editAttendee($id, $fname, $lname, $dob, $email, $contact, $specialty);
  if($isSuccess){
    header('Location: viewrecords.php');
  } else {
    echo '<h1 class="text-center text-danger">Tu NO has sido actualizado</h1>';
  }
} else {
  echo '<h1>Validar los datos a actualizar</h1>';
}
?>
  
<br>
<br>
<?php require_once 'includes/footer.php'; ?>