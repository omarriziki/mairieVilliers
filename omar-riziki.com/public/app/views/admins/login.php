<?php
   require APPROOT . '/views/includes/head.php';
?>

<div class="navbar">
    <?php
       require APPROOT . '/views/includes/navigation.php';
    ?>
</div>


<div class="container-login">
    <div class="wrapper-login">
        <h2>Espace Administrateur</h2>
<?php var_dump($_SESSION)?>
        <form action="<?php echo URLROOT; ?>/admins/login" method ="POST">
            <input type="text" placeholder="Login *" name="username">
            <span class="invalidFeedback">
                <?php echo $data['usernameErreur']; ?>
            </span>

            <input type="password" placeholder="Mot de passe *" name="password">
            <span class="invalidFeedback">
                <?php echo $data['passwordErreur']; ?>
            </span>

            <button id="submit" type="submit" value="submit">Conexion</button>

            

        </form>
    </div>
</div>
