<?php
    session_start();

    function estConnecte() {
        if (isset($_SESSION['id_u'])) {
            return true;
        } else {
            return false;
        }
    }

    ?>

    <?php


    function estConnecteAdmin() {
        if (isset($_SESSION['user_id'])) {
            return true;
        } else {
            return false;
        }
    }




