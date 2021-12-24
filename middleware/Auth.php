<?php

class Auth {

    public function index() {

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