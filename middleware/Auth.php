<?php

class Auth {

    public function userLogged() {

        if ( isset($_SESSION['userLogged']) ) {
            if ($_SESSION['userLogged'] == true) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
            $_SESSION['userLogged'] = true;
        }

    }

    public function adminLogged() {

        if ( isset($_SESSION['adminLogged']) ) {
            if ($_SESSION['adminLogged'] == true) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
            $_SESSION['adminLogged'] = true;
        }

    }

}