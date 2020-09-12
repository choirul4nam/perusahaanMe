<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Awal extends CI_Controller
{
    public function index()
    {
        $data['title'] = "DASHBOARD";
        $this->load->view('templates/header.php', $data);
        $this->load->view('awal/index.php', $data);
        $this->load->view('templates/footer.php');
    }
}
