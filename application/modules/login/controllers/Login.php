<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');
    }
    public function index()
    {
        $data = [
            'active'    => '',
        ];
        $this->template->load('tema/index_login', 'index', $data);
    }
    function admin_verifikasi()
    {
        $cek = $this->M_login->admin_verifikasi();
        $this->session->set_flashdata($cek['kode'], $cek['msg']);

        if($cek['kode'] == 'success') {
            redirect('home', 'refresh');
        } else {
            redirect('login', 'refresh');
        }
    }

    function logout()
    {
        $array_items = array('ses_daily_username', 'ses_daily_level', 'ses_daily_display', 'ses_daily_id', 'ses_daily_akses');
        $this->session->unset_userdata($array_items);
        $this->session->set_flashdata('success', 'Terimakasih Sampai Jumpa Lagi');
        redirect('home', 'refresh');
    }
}