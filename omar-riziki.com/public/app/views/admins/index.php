<?php
require APPROOT . '/views/includes/head.php';
?>

<div class="navbar">
   <?php
   require APPROOT . '/views/includes/navigation.php';
   ?>
</div>

<?php 
$d=$data['utilisateurs'];$e=$data['ecoles'];$f=$data['evenements']?>


<table classe="content-table">
      <thead>
         <tr>


            <th><a href="<?php echo URLROOT; ?>/ecoles/index">Nombre d'utilisateurs </a> </th>
            <th><a href="<?php echo URLROOT; ?>/ecoles/index">Nombre d'écoles </a> </th>
            <th><a href="<?php echo URLROOT; ?>/evenements/evenements">Nombre d'évenements </a> </th>


         </tr>
      </thead>
      <tbody>
      <td> <?= $d ?></td>
      <td> <?= $e ?></td>
      <td> <?= $f ?></td>



      </tbody>

   </table>

