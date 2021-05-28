<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_frontend extends CI_controller
{
    public function __construct()
    {
        parent::__construct();

    }

    public function index(){
        $this->load->view('frontend/index');
    }
}
?>