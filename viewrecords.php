<?php 
    $title = 'Ver registros';

    require_once 'includes/header.php';
    require_once 'db/conn.php';
    $results = $crud->getAttendees();
?>

<table class="table">
    <tr>
        <td>ID</td>
        <td>Nombre</td>
        <td>Apellido</td>
        <td>Fecha de nacimiento</td>
        <td>telefono</td>
        <td>email</td>
        <td>Especializacion</td>
        <td>Acciones</td>
    </tr>
    <?php 
    while ($r = $results->fetch(PDO::FETCH_ASSOC)) {
        
    ?>
    <tr>
        <td><?php echo $r['attendee_id']; ?></td>
        <td><?php echo $r['firstname']; ?></td>
        <td><?php echo $r['lastname']; ?></td>
        <td><?php echo $r['birthday']; ?></td>
        <td><?php echo $r['phone_number']; ?></td>
        <td><?php echo $r['email_address']; ?></td>
        <td><?php echo $r['name']; ?></td>
        <td>
            <a href="view.php?id=<?php echo $r['attendee_id']; ?>" class="btn btn-primary">Ver</a>
            <a href="update.php?id=<?php echo $r['attendee_id']; ?>" class="btn btn-warning">Actualizar</a>
            <a href="delete.php?id=<?php echo $r['attendee_id']; ?>" class="btn btn-danger">Borrar</a></td>
        </tr>

    <?php }?>
    
</table>

<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>