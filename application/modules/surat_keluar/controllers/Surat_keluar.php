<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Surat_keluar extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_suratkeluar');
        if ($this->session->userdata('ses_daily_username') == null) {
            $this->session->set_flashdata('error ', 'Mohon Login Untuk Melanjutkan');
            redirect('login', 'refresh');
        }
    }
    public function index()
    {
        $data = [
            'active'                => 'surat_keluar',
            'sub_menu'              => 'Surat keluar',
            'main_page'             => 'main_pagesurat',
            'data_suratkeluar'       => $this->M_suratkeluar->get_data()
        ];
        $this->template->load('tema/index', 'index', $data); 
    }
    public function riwayat()
    {
        $data = [
            'active'                => 'surat_keluar',
            'sub_menu'              => 'Riwayat Surat keluar',
            'main_page'             => 'halaman_riwayat',
            'data_suratkeluar'       => $this->M_suratkeluar->get_datariwayat()
        ];
        $this->template->load('tema/index', 'index', $data); 
    }

    public function tambah_suratkeluar()
    {
        $data = [
            'active'     => 'surat_keluar',
            'main_menu'  => 'Surat keluar',
            'sub_menu'   => 'Input Surat keluar',
        ];
        $this->template->load('tema/index', 'tambah', $data); 
    }
    
    public function detail_surat($no_agenda)
    {
        $data = [
            'active'     => 'surat_keluar',
            'main_menu'  => 'Surat Keluar',
            'sub_menu'   => 'Detail Surat Keluar',
            'detail'     => $this->M_suratkeluar->detail_surat($no_agenda)
        ];
        $this->template->load('tema/index', 'detail', $data); 
    }

    public function edit_suratkeluar($no_agenda)
    {
        $data = [
            'active'     => 'surat_keluar',
            'main_menu'  => 'Surat Keluar',
            'sub_menu'   => 'Edit Surat Keluar',
            'detail'     => $this->M_suratkeluar->detail_surat($no_agenda)
        ];
        $this->template->load('tema/index', 'edit', $data); 
    }
    public function generate_number_agenda()
    {
        $data = $this->M_suratkeluar->generate_number_agenda();
		echo json_encode($data);
    }
    public function generate_jeniskategori($kategori)
    {
        $data = $this->M_suratkeluar->generate_jeniskategori($kategori);
		echo json_encode($data);
    }
    public function simpan_suratkeluar()
    {
        $cek = $this->M_suratkeluar->simpan_suratkeluar();
		$this->session->set_flashdata($cek['kode'], $cek['msg']);
        redirect('surat_keluar');
    }
    public function simpanedit_suratkeluar($no_agenda) 
    {
        $cek = $this->M_suratkeluar->simpanedit_suratkeluar($no_agenda);
		$this->session->set_flashdata($cek['kode'], $cek['msg']);
        redirect('surat_keluar');
    }
    public function delete_surat()
    {
        $cek = $this->M_suratkeluar->delete_suratkeluar();
		echo json_encode($cek);
    }
    public function recovery()
    {
        $cek = $this->M_suratkeluar->recovery();
		echo json_encode($cek);
    }
}