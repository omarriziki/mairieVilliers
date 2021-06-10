<nav class="top-nav">
    <ul>
        <li>
        <?php if(isset($_SESSION['id_admin'])): ?>
            <a href="<?php echo URLROOT; ?>/admins/profile">Admin</a>
            <?php else : ?>
                <a href="<?php echo URLROOT; ?>/index">Accueil</a>
            <?php endif; ?>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/about">About</a>
        </li>
        <li>
        <?php if(isset($_SESSION['id_u'])) : ?>
            <a href="<?php echo URLROOT; ?>/evenements">Participer à un évenement</a>
            <?php else : ?>
                <a href="<?php echo URLROOT; ?>/evenements/evenements">evenement</a>
                <?php endif; ?>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/ecoles/index">Ecoles</a>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/contact">Contact</a>
        </li>

        <li >
        <?php if(isset($_SESSION['id_u'])) : ?>
                <a href="<?php echo URLROOT; ?>/utilisateurs/profile">Profile</a>

            <?php endif; ?>
        </li>

        <li class="btn-login">
        <?php if(isset($_SESSION['id_u'])) : ?>
                <a href="<?php echo URLROOT; ?>/v/deconexion">Deconexion</a>
            <?php else : ?>
                <?php if (!isset($_SESSION['user_id'])) : ?>
                <a href="<?php echo URLROOT; ?>/v/conexion">Conexion</a>
            <?php endif; ?>
            <?php if(isset($_SESSION['user_id'])): ?>
                <a href="<?php echo URLROOT; ?>/admins/deconexion">Deconexion</a>
                <?php endif; ?>
                <?php endif; ?>

        </li>
    </ul>