
<?php
    $title  = 'Indice';
    require_once 'includes/header.php';
    require_once 'db/conn.php';
    $results = $crud->getSpecialties();
?>
    
        <h1 class="text-center">Registro para conferencia de IT</h1>
        <!--
            primer nombre
            last name
            fecha de naci miento
            especalidad
            direccion de enaul
            numero de contacto
        -->
<form method="post" action="success.php" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="firstname" class="form-label">Primer Nombre</label>
    <input required type="text" class="form-control" id="firstname" name="firstname" placeholder="Ingresa tu nombre">
    
  </div>
  <div class="mb-3">
    <label for="lastname" class="form-label">Apellido</label>
    <input required type="text" class="form-control" id="lastname" name="lastname" placeholder="Ingresa tu apellido">
    
  </div>
  <div class="mb-3">
    <label for="nacimiento" class="form-label">fecha de nacimiento</label>
    <input required type="date" class="form-control" id="nacimiento" name="nacimiento" placeholder="Ingresa tufecha de nacimiento">
    
  </div>
  <div class="mb-3">
    <label for="expertise" class="form-label">Area de Expertise</label>
    <select required class="form-select" aria-label="Default select example" id="expertise" name="expertise">
        <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){?>
          <option value="<?php echo $r['specialty_id'] ?>"><?php echo $r['name'];?></option>
          <?php }?>
    </select>
  </div>
  <div class="mb-3">
    <label for="contacto" class="form-label">Numero de contacto</label>
    <input required type="text" class="form-control" id="contacto" name="contacto" placeholder="Ingresa tu numero de contacto">
    <div id="phoneHelp" class="form-text">We'll never share your contacto with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="custom-file">
    
    <input type="file" accept="image/*"  class="custom-file-input" id="avatar" name="avatar">
    <label class="custom-file-label" for="avatar">Subir imagen (Opcional)</label>
    <small id="avatar" class="form-text text-danger">La imagen es opcional</label>
    
  </div>
 
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</br>
<?php require_once 'includes/footer.php'; ?>
   