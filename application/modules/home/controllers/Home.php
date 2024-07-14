<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_home');
    }
    public function index()
    {
        $data = [
            'active'     => 'dashboard',
            'count_masuk'=> $this->M_home->count_suratmasuk(),
            'count_keluar'=> $this->M_home->count_suratkeluar(),
        ];
        $this->template->load('tema/index', 'index', $data); 
    }
}