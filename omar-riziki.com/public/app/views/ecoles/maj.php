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
        Mettre à Jour l'ecole.
    </h1>
    <form
    action="<?php echo URLROOT; ?>/ecoles/maj/<?php echo $data['ecole']->idec ?>" method="POST">
    <!-- -->
        <div class="form-item">
            <input type="text" name="nom" value="<?php echo $data['ecole']->nom ?>">
            <span class="invalidFeedback">
                <?php echo $data['nomErreur']; ?>
            </span>
        </div>
<!-- -->
        
        <div class="form-item">
            <input type="text" name="adresse" value="<?php echo $data['ecole']->adresse ?>">
            <span class="invalidFeedback">
                <?php echo $data['adresseErreur']; ?>
            </span>
        </div>
        <!-- -->
        <div class="form-item">
            <input type="text" name="numtel" value="<?php echo $data['ecole']->numtel ?>">
            <span class="invalidFeedback">
                <?php echo $data['numtelErreur']; ?>
            </span>
        </div>
        <!-- -->
        <div class="form-item">
            <input type="number" name="nombreEl" value="<?php echo $data['ecole']->nombreEleve ?>">
            <span class="invalidFeedback">
                <?php echo $data['nombreErreur']; ?>
            </span>
        </div>
       
        <!-- -->
        <div class="form-item">
            <input type="text" name="email" value="<?php echo $data['ecole']->email ?>">
            <span class="invalidFeedback">
                <?php echo $data['emailErreur']; ?>
            </span>
        </div>
         <!-- -->
         <div class="form-item">
            <input type="text" name="nomDir" value="<?php echo $data['ecole']->nomDirecteur ?>">
            <span class="invalidFeedback">
                <?php echo $data['nomdirErreur']; ?>
            </span>
        </div>
        <button class="btn green" name="submit" type="submit">mettre a jour</button>
    </form>

</div>

