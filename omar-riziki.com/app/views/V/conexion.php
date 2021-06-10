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
        <h2>Sign in</h2>

        <form action="<?php echo URLROOT; ?>/V/conexion" method ="POST">
            <input type="email" placeholder="email *" name="email">
            <span class="invalidFeedback">
                <?php echo $data['emailErreur']; ?>
            </span>

            <input type="password" placeholder="Mot de passe *" name="mdp">
            <span class="invalidFeedback">
                <?php echo $data['mdpErreur']; ?>
            </span>

            <button id="submit" type="submit" value="submit">Conexion</button>

            <p class="options">Not registered yet? <a href="<?php echo URLROOT; ?>/v/inscription">Create an account!</a></p>
            <p class="options"><a href="<?php echo URLROOT; ?>/admins/login">Espace Admin</a></p>


        </form>
    </div>
</div>
