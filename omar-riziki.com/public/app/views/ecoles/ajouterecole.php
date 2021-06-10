<?php
require APPROOT . '/views/includes/head.php';
?>

<div class="navbar">
    <?php
    require APPROOT . '/views/includes/navigation.php';
    ?>
</div>

<div class="container center">
    <h1>
        Ajouter une école
    </h1>
    <form action="<?php echo URLROOT; ?>/ecoles/ajouterecole" method="post">
    <!-- -->
        <div class="form-item">
            <input type="text" name="nom" placeholder="Nom de l'école">
            <span class="invalidFeedback">
                <?php echo $data['nomErreur']; ?>
            </span>
        </div>
<!-- -->
        
        <div class="form-item">
            <input type="text" name="adresse" placeholder="Adresse">
            <span class="invalidFeedback">
                <?php echo $data['adresseErreur']; ?>
            </span>
        </div>
        <!-- -->
        <div class="form-item">
            <input type="text" name="numtel" placeholder="Numéro de téléphone">
            <span class="invalidFeedback">
                <?php echo $data['numtelErreur']; ?>
            </span>
        </div>
        <!-- -->
        <div class="form-item">
            <input type="number" name="nombreEl" placeholder="Nombre d'éléves">
            <span class="invalidFeedback">
                <?php echo $data['nombreErreur']; ?>
            </span>
        </div>
        <!-- -->
        
        <div class="form-item">
            <input type="text" name="email" placeholder="Email">
            <span class="invalidFeedback">
                <?php echo $data['emailErreur']; ?>
            </span>
        </div>
         <!-- -->
         <div class="form-item">
            <input type="text" name="nomDir" placeholder="nom du directeur">
            <span class="invalidFeedback">
                <?php echo $data['nomdirErreur']; ?>
            </span>
        </div>
        <button class="btn green" name="submit" type="submit">Créer</button>
    </form>

</div>

