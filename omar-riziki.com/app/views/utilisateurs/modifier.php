<?php
   require APPROOT . '/views/includes/head.php';
?>

<div class="navbar dark">
    <?php
       require APPROOT . '/views/includes/navigation.php';
    ?>
</div>

<div class="container-login">
    <div class="wrapper-login">
        <h2>Modifier les informations de votre compte</h2>

            <form
                id="register-form"
                method="POST"
                action="<?php echo URLROOT; ?>/utilisateurs/modifier"
                >
                <!--Input prenom -->
            <input type="text" placeholder="Prenom *" name="prenom">
            <span class="invalidFeedback">
                <?php echo $data['prenomErreur']; ?>
            </span>

            <!--Input nom -->
            <input type="text" placeholder="nom *" name="nom">
            <span class="invalidFeedback">
                <?php echo $data['nomErreur']; ?>
            </span>
            <!--Input adresse -->
            <input type="text" placeholder="adresse *" name="adresse">
            <span class="invalidFeedback">
                <?php echo $data['adresseErreur']; ?>
            </span>
            <!--Input date naissance -->
            <input type="date" placeholder=" *" name="daten">
            <span class="invalidFeedback">
                <?php echo $data['datenErreur' ]; ?>
            </span>
             <!--Input numtel -->
             <input type="text" placeholder="Télephone *" name="numtel">
            <span class="invalidFeedback">
                <?php echo $data['numtelErreur']; ?>
            </span>
            <!--Input email-->
            <input type="text" placeholder="email *" name="email">
            <span class="invalidFeedback">
                <?php echo $data['emailErreur']; ?>
            </span>
            <!--Input mdp -->
            <input type="password" placeholder="Mot de passe *" name="mdp">
            <span class="invalidFeedback">
                <?php echo $data['mdpErreur']; ?>
            </span>
            <!--Input mdprepet -->
            <input type="password" placeholder="Confirmez mot de passe *" name="mdprepet">
            <span class="invalidFeedback">
                <?php echo $data['mdprepetErreur']; ?>
            </span>

            <button id="submit" type="submit" value="submit">Modifier</button>


</form>
</div>
</div>



