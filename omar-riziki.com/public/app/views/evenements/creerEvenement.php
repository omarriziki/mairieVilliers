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
        Ajouter un évenement
    </h1>
    <form action="<?php echo URLROOT; ?>/evenements/creerEvenement" method="post">
    <!-- -->
        <div class="form-item">
            <input type="text" name="libelle" placeholder="Nom de l'evenement">
            <span class="invalidFeedback">
                <?php echo $data['libErreur']; ?>
            </span>
        </div>
<!-- -->
        <div class="form-item">
            <input type="datetime-local" name="date" placeholder="*">
            <span class="invalidFeedback">
                <?php echo $data['dateErreur']; ?>
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
            <input type="text" name="prix" placeholder="prix">
            <span class="invalidFeedback">
                <?php echo $data['prixErreur']; ?>
            </span>
        </div>
        <!-- -->
        <div class="form-item">
            <input type="number" name="place" placeholder="place">
            <span class="invalidFeedback">
                <?php echo $data['placeErreur']; ?>
            </span>
        </div>
        <!-- -->
        <div class="form-item">
            <textarea name="details" placeholder="Detail"></textarea>
            <span class="invalidFeedback">
                <?php echo $data['detailsErreur']; ?>
            </span>
        </div>
        <!-- -->
        <div class="form-item">
            <input name="type" placeholder="Type d'evenements">

            <span class="invalidFeedback">
                <?php echo $data['typeErreur']; ?>
            </span>
        </div>
         <!-- -->
         <div class="form-item">
            <input type="text" name="statut" placeholder="Statut">
            <span class="invalidFeedback">
                <?php echo $data['statutErreur']; ?>
            </span>
        </div>
        <button class="btn green" name="submit" type="submit">Créer</button>
    </form>

</div>

