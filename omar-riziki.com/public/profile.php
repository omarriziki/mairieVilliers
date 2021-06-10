<?php
   require APPROOT . '/views/includes/head.php';
?>

<div class="navbar dark">
    <?php

       require APPROOT . '/views/includes/navigation.php';
    ?>
</div>

<div class="container center">
<?php var_dump($_SESSION);?>


<div class="container center">


<?php
foreach($data['utilisateurs']as $utilisateur )
if (isset($_SESSION['id_u']) && $_SESSION['id_u']==$utilisateur->idU ):?>
<a class="btn green" href="<?php echo URLROOT;?>/utilisateurs/modifier">Modifier votre profile</a>
<h1>Information</h1>

<table>
    <thead>
        <th>prenom</th>
        <th>Nom</th>
        <th>adresse</th>
        <th>date de naissance</th>
        <th>Email</th>

        <th>Telephone</th>
        <th>date de creation</th>



    </thead>
    <tbody>
<tr>
                <td><?= $_SESSION['prenom'] ?></td>
                <td><?= $_SESSION['nom'] ?></td>
                <td><?= $_SESSION['adresse']  ?></td>
                <td><?= $_SESSION['dateNaissance']  ?></td>
                <td><?= $_SESSION['email']  ?></td>

                <td><?= $_SESSION['numtel']  ?></td>
                <td><?= $utilisateur->dateCreation ?></td>






<?php endif; ?>



            </tr>
            <?php

        ?>
    </tbody>
</table><br>
<a class="btn green" href="<?php echo URLROOT;?>/utilisateurs/afficher">Vos activités</a>













