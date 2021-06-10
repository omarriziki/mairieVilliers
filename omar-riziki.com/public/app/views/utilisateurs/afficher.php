<?php
   require APPROOT . '/views/includes/head.php';
?>

<div class="navbar dark">
    <?php
       require APPROOT . '/views/includes/navigation.php';
    ?>
</div>
<p>Vos evenements</p>
<form action="<?php  echo URLROOT. "/participer" ?>" method="post">
<?php
foreach ($data['d']as $d):?>

    <table>
    <thead>
        <th>nom de l'evenement</th>
        <th>statut</th>
        <th>adresse</th>






    </thead>
    <tbody>
<tr>
                <td><?= $d->lib ?></td>
                <td><?= $d->status ?></td>
                <td><?= $d->adresse ?></td>


            </tr>
            <?php

        ?>
    </tbody>
</table>

<?php endforeach;?>
</form>