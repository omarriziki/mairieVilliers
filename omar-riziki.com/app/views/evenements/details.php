<?php
   require APPROOT . '/views/includes/head.php';
?>

<div class="navbar">
    <?php
       require APPROOT . '/views/includes/navigation.php';
    ?>
</div>


<?php

$data=$data['evenements'];


?>
<form action="<?php  echo URLROOT. "/participer" ?>" method="post">
    <h1>Détails de l'evenement <?= $data->libelle ?></h1>
    <p>ID : <?= $data->idev ?></p>

    <p>Prix : <?= $data->prix?></p>
    <p>Details : <?=$data->details ?></p>
    <p>Description  :<?=$data->details ?> </p>
    <p>l'evenement aura lieu le : <strong><?=$data->date ?></strong> à <strong><?= $data->adresse?></strong></p>





   <?php if(isset($_SESSION['id_u'])) : ?>
   <input type='submit' name='register' class='form-control bg-theme' value='Register<?=$data->idev?>'>
   <?php else : ?>
   <a href="<?php  echo URLROOT. "/evenements"  ?>">retour</a>
   <?php endif;?>

</form>
<?php if(isset($_SESSION['user_id'])) : ?>
<form action="<?php echo URLROOT . "/evenements/supprimer/" . $data->idev ?>" method="post">
         <input type="submit" name="delete" value= "Supprimer" class="btn red">
         </form>

         <?php endif;?>


