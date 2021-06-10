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
        Mettre à Jour l'evenement.
    </h1>
    <form
    action="<?php echo URLROOT; ?>/evenements/update/<?php echo $data['evenement']->idev ?>" method="POST">
    <!-- -->
        <div class="form-item">
            <input type="text" name="libelle" value="<?php echo $data['evenement']->libelle ?>">
            <span class="invalidFeedback">
                <?php echo $data['libErreur']; ?>
            </span>
        </div>
<!-- -->
        <div class="form-item">
            <input type="datetime-local" name="date" value="<?php echo $data['evenement']->date ?>">
            <span class="invalidFeedback">
                <?php echo $data['dateErreur']; ?>
            </span>
        </div>
        <!-- -->
        <div class="form-item">
            <input type="text" name="adresse" value="<?php echo $data['evenement']->adresse ?>">
            <span class="invalidFeedback">
                <?php echo $data['adresseErreur']; ?>
            </span>
        </div>
        <!-- -->
        <div class="form-item">
            <input type="text" name="prix" value="<?php echo $data['evenement']->prix ?>">
            <span class="invalidFeedback">
                <?php echo $data['prixErreur']; ?>
            </span>
        </div>
        <!-- -->
        <div class="form-item">
            <input type="number" name="place" value="<?php echo $data['evenement']->place ?>">
            <span class="invalidFeedback">
                <?php echo $data['placeErreur']; ?>
            </span>
        </div>
        <!-- -->
        <div class="form-item">
            <textarea name="details" placeholder="Detail"><?php echo $data['evenement']->details ?></textarea>
            <span class="invalidFeedback">
                <?php echo $data['detailsErreur']; ?>
            </span>
        </div>
        <!-- -->
        <div class="form-item">
            <input type="text" name="type" value="<?php echo $data['evenement']->type ?>">
            <span class="invalidFeedback">
                <?php echo $data['typeErreur']; ?>
            </span>
        </div>
         <!-- -->
         <div class="form-item">
            <input type="text" name="statut" value="<?php echo $data['evenement']->statut ?>">
            <span class="invalidFeedback">
                <?php echo $data['statutErreur']; ?>
            </span>
        </div>
        <button class="btn green" name="submit" type="submit">mettre a jour</button>
    </form>

</div>

