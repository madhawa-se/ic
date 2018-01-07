<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

    function index() {
        $this->config();
    }

    function config() {
        header('Content-Type: application/javascript');
        echo "var base_url='" . base_url() . "'";
    }

}
