<?php
   require APPROOT . '/views/includes/head.php';
?>

<div class="navbar">
    <?php
       require APPROOT . '/views/includes/navigation.php';
    ?>
</div>
<div class="container">
<div class="container-item">

<h2 class="ev-h2">Les écoles de la ville</h2>
<table class="table">
   <tr>
      <th>#</th>
      <th> Nom</th>
      <th>Adresse</th>
      <th>Numéro de telephone</th>


   </tr>

   <?php
   $i=0;
   foreach ($data['ecoles'] as $ecole ):$i+=1?>

   <tr>
        <td><?=$i ?>  </td>
      <td> <?= $ecole->nom ?> </td>
      <td><?= $ecole->adresse  ?>  </td>
      <td><?= $ecole->numtel ?>  </td>






      <td class="btn orange"><a href="<?php echo URLROOT . "/ecoles/informations/" . $ecole->idec ?>">voir</a></td>
      <?php if (isset($_SESSION['user_id'])) : ?>
         <td class="btn blue"><a href="<?php echo URLROOT . "/ecoles/maj/" . $ecole->idec ?>">Mettre à Jour</a></td>

      <?php endif; ?>




   </tr>


  <?php endforeach;?>



</table>
<p class="options">Pour participer à un evenement il faut vous <a href="<?php echo URLROOT; ?>/utilisateurs/conexion">Connecter!</a></p>