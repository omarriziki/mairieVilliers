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
        <h2>Register</h2>

            <form
                id="register-form"
                method="POST"
                action="<?php echo URLROOT; ?>/admins/register"
                >
                <!--Input prenom -->
            <input type="text" placeholder="Login *" name="username">
            <span class="invalidFeedback">
                <?php echo $data['usernameErreur']; ?>
            </span>

           
            <!--Input email-->
            <input type="email" placeholder="email *" name="email">
            <span class="invalidFeedback">
                <?php echo $data['emailErreur']; ?>
            </span>
            <!--Input mdp -->
            <input type="password" placeholder="Mot de passe *" name="password">
            <span class="invalidFeedback">
                <?php echo $data['passwordErreur']; ?>
            </span>
            <!--Input mdprepet -->
            <input type="password" placeholder="Confirmez mot de passe *" name="confirmPassword">
            <span class="invalidFeedback">
                <?php echo $data['confirmPasswordErreur']; ?>
            </span>

            <button id="submit" type="submit" value="submit">Submit</button>

<p class="options">Vous avez déja un compte <a href="<?php echo URLROOT; ?>/v/conexion">Connectez vous</a></p>
</form>
</div>
</div>
