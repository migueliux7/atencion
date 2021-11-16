<?php 
    $title = 'Login de usuario';

    require_once 'includes/header.php';
    require_once 'db/conn.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username=strtolower(trim($_POST['username']));
        
        // foreach($_POST as $key => $value){
        //     echo $key.' '. $value.'<br>';
        // }
        $password = $_POST['password'];
        $new_password = md5($password.$username);
        $result = $user->getUser($username, $new_password);
        if(!$result){
            echo '<div class="alert alert-danger">Username o Passowrd son incorrectos! Por favor intentalo de nuevo</div>';

        } else {
            $_SESSION['user'] = $result['username'];
            $_SESSION['user_id'] = $result['id'];
            header("Location: viewrecords.php");
        }
    }
?>

<H1 class="text-center"><?php echo $title; ?> </H1>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
<table class="table table-sm">
    <tr>
        <td>
            <label for="username">Usuario: *</label> 
        </td>
        <td>
            <input type="text" name="username" class="form-control" id="username" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username'];?>">
            <!-- <?php if(empty($username) && isset($username_error)) echo "<p class='text-danger'>$username_error</p>"; ?> -->

        </td>
    </tr>
    <tr>
        <td>
            <label for="password">Password: *</label>
        </td>
        <td>
            <input type="password" name="password" class="form-control" id="password">
        </td>
    </tr>
</table>
<br><br>
<div class="d-grid gap-2">
<input type="submit" value="Login" class="btn btn-primary"><br>
</div>
<a href="#">Olvidaste el password?</a>
</form><br><br>
<?php 
    include_once 'includes/footer.php';
?>