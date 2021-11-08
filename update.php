<?php 
    $title = 'Editar Registro';

    require_once 'includes/header.php';
    require_once 'db/conn.php';
    $results = $crud->getSpecialties();
    
    if(!isset($_GET['id'])){
        //echo "<h1 class='text-danger'>Error</h1>";
        include 'includes/errormessage.php';
        header("Location: vieewrecords.php");
    } else {
        $id = $_GET['id'];
        $attendee = $crud->getAttendeeDetails($id);    
?>

<h1>Editar registro</h1>
<form method="post" action="edit.php">
    <input type="hidden" name="id" value="<?php echo $attendee['attendee_id'] ?>">
  <div class="mb-3">
    <label for="firstname" class="form-label">Primer Nombre</label>
    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Ingresa tu nombre"
    value="<?php echo $attendee['firstname'] ?>">
    
  </div>
  <div class="mb-3">
    <label for="lastname" class="form-label">Apellido</label>
    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Ingresa tu apellido"
    value="<?php echo $attendee['lastname'] ?>">
    
  </div>
  <div class="mb-3">
    <label for="nacimiento" class="form-label">fecha de nacimiento</label>
    <input type="date" class="form-control" id="nacimiento" name="nacimiento" placeholder="Ingresa tufecha de nacimiento"
    value="<?php echo $attendee['birthday'] ?>">
    
  </div>
  <div class="mb-3">
    <label for="expertise" class="form-label">Area de Expertise</label>
    <select class="form-select" aria-label="Default select example" id="expertise" name="expertise">
        <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){?>
          <option value="<?php echo $r['specialty_id'] ?>" 
          <?php if($r['specialty_id'] == $attendee['specialty_id']) echo 'selected'?> ><?php echo $r['name'];?> </option>
          <?php }?>
    </select>
  </div>
  <div class="mb-3">
    <label for="contacto" class="form-label">Numero de contacto</label>
    <input type="text" class="form-control" id="contacto" name="contacto" placeholder="Ingresa tu numero de contacto"
    value="<?php echo $attendee['phone_number'] ?>">
    
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
    value="<?php echo $attendee['email_address'] ?>">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
 
  <button type="submit" name="update" class="btn btn-primary">Guardar cambios</button>
</form>
<?php } ?>
<br>
<br>
<?php require_once 'includes/footer.php';?>