<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pelaporan extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pelaporan');
        if ($this->session->userdata('ses_daily_username') == null) {
            $this->session->set_flashdata('error ', 'Mohon Login Untuk Melanjutkan');
            redirect('login', 'refresh');
        }
    }
    public function index()
    {
        $data = [
            'active'     => 'pelaporan',
            
        ];
        $this->template->load('tema/index', 'index', $data); 
    }
}