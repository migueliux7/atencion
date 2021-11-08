<?php 
    $title = 'Ver Registro';

    require_once 'includes/header.php';
    require_once 'db/conn.php';
    if(!isset($_GET['id'])){
        echo "<h1 class='text-danger'>Por favor revisa los detalles e intentalo de nuevo</h1>";
        
    } else {
        $id = $_GET['id'];
        $results = $crud->getAttendeeDetails($id);
    
    
?>
  <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php  echo $results['firstname']. ' ' . $results['lastname'] ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo $results['name']?></h6>
    <p class="card-text">Fecha de nacimiento: <?php echo $results['birthday']?></p>
    <p class="card-text">Numero de contacto: <?php echo $results['phone_number']?></p>
    <p class="card-text">correo electronico: <?php echo $results['email_address']?></p>
    <a href="viewrecords.php" class="card-link">Regresar a la lista</a>
    <a href="update.php?id=<?php echo $results['attendee_id']?>" class="card-link">Editar</a>
  </div>
</div>
<?php }?>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>