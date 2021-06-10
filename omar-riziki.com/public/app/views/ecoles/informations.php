<?php
require APPROOT . '/views/includes/head.php';
?>

<div class="navbar">
   <?php
   require APPROOT . '/views/includes/navigation.php';
   ?>
</div>


<?php

$data = $data['ecoles'];


?>


   <table classe="content-table">
      <thead>
         <tr>
            <th>Nom  </th>
            <th>Adresse </th>
            <th>Numéro  </th>
            <th>Email  </th>
            <th>Nom du directeur</th>

         </tr>
      </thead>
      <tbody>
      <td> <?= $data->nom ?></td>
      <td> <?= $data->adresse ?></td>
      <td> <?= $data->numtel ?></td>
      <td> <?= $data->email ?></td>
      <td> <?= $data->nomDirecteur?></td>
      <td> <?= $data->nom ?></td>


      </tbody>

   </table>






   <?php if(isset($_SESSION['id_u'])) : ?>
<form action="<?php echo URLROOT . "/inscrire/" . $data->idec ?>" method="post">
         <input type="submit" name="inscrire" value= "Inscrire" class="btn red">
         </form>

         <?php endif;?>

         <?php if(isset($_SESSION['user_id'])) : ?>
<form action="<?php echo URLROOT . "/ecoles/supprimer/" . $data->idec ?>" method="post">
         <input type="submit" name="delete" value= "Supprimer" class="btn red">
         </form>

         <?php endif;?>










   <a href="<?php echo URLROOT . "/ecoles"  ?>">retour</a>



