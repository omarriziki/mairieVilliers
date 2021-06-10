<?php
require APPROOT . '/views/includes/head.php';
?>

<div class="navbar">
   <?php
   require APPROOT . '/views/includes/navigation.php';
   ?>
</div>

<h2 class="ev-h2">Les evenements a venir</h2>
<table>
   <tr>
      <th>#</th>
      <th> Nom</th>
      <th>Adresse</th>
      <th>Date et heure</th>
      <th>prix</th>
      <th>places</th>

      <th>type</th>
      <th>statut</th>





   </tr>

   <?php
   $i = 0;
   foreach ($data['evenements'] as $evenement) : $i += 1 ?>

      <tr>
         <td> <?= $i ?> </td>
         <td><?= $evenement->libelle ?> </td>
         <td><?= $evenement->adresse ?> </td>
         <td><?= $evenement->date ?> </td>
         <td><?= $evenement->prix ?> </td>
         <td><?= $evenement->place ?> </td>

         <td><?= $evenement->type ?> </td>
         <td><?= $evenement->statut ?> </td>






         <td class="btn orange"><a href="<?php echo URLROOT . "/evenements/details/" . $evenement->idev ?>">voir</a></td>
         <?php if (isset($_SESSION['user_id'])) : ?>
         <td class="btn blue"><a href="<?php echo URLROOT . "/evenements/update/" . $evenement->idev ?>">Mettre à Jour</a></td>

      <?php endif; ?>


      </tr>
   <?php endforeach; ?>

</table>

        <?php if(isset($_SESSION['user_id'])) : ?>
         <a href="<?php echo URLROOT . "/evenements/creerEvenement/" ?>"class="btn red">Ajouter</a></td>

         <?php endif;?>
         <?php if(!isset($_SESSION)) : ?>
<p class="options">Pour participer à un evenement il faut vous <a href="<?php echo URLROOT; ?>/utilisateurs/conexion">Connecter!</a></p>
<?php endif;?>
