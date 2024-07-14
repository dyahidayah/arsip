<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Surat_masuk extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_suratmasuk');
        if ($this->session->userdata('ses_daily_username') == null) {
            $this->session->set_flashdata('error ', 'Mohon Login Untuk Melanjutkan');
            redirect('login', 'refresh');
        }
    }
    public function index()
    {
        $data = [
            'active'                => 'surat_masuk',
            'sub_menu'              => 'Surat Masuk',
            'main_page'             => 'main_pagesurat',
            'data_suratmasuk'       => $this->M_suratmasuk->get_data()
        ];
        $this->template->load('tema/index', 'index', $data); 
    }
    public function riwayat()
    {
        $data = [
            'active'                => 'surat_masuk',
            'sub_menu'              => 'Riwayat Surat Masuk',
            'main_page'             => 'halaman_riwayat',
            'data_suratmasuk'       => $this->M_suratmasuk->get_datariwayat()
        ];
        $this->template->load('tema/index', 'index', $data); 
    }

    public function tambah_suratmasuk()
    {
        $data = [
            'active'     => 'surat_masuk',
            'main_menu'  => 'Surat Masuk',
            'sub_menu'   => 'Input Surat Masuk',
        ];
        $this->template->load('tema/index', 'tambah', $data); 
    }
    
    public function detail_surat($no_agenda)
    {
        $data = [
            'active'     => 'surat_masuk',
            'main_menu'  => 'Surat Masuk',
            'sub_menu'   => 'Detail Surat Masuk',
            'detail'     => $this->M_suratmasuk->detail_surat($no_agenda)
        ];
        $this->template->load('tema/index', 'detail', $data); 
    }

    public function edit_suratmasuk($no_agenda)
    {
        $data = [
            'active'     => 'surat_masuk',
            'main_menu'  => 'Surat Masuk',
            'sub_menu'   => 'Edit Surat Masuk',
            'detail'     => $this->M_suratmasuk->detail_surat($no_agenda)
        ];
        $this->template->load('tema/index', 'edit', $data); 
    }
    public function generate_number_agenda()
    {
        $data = $this->M_suratmasuk->generate_number_agenda();
		echo json_encode($data);
    }
    public function generate_jeniskategori($kategori)
    {
        $data = $this->M_suratmasuk->generate_jeniskategori($kategori);
		echo json_encode($data);
    }
    public function simpan_suratmasuk()
    {
        $cek = $this->M_suratmasuk->simpan_suratmasuk();
		$this->session->set_flashdata($cek['kode'], $cek['msg']);
        redirect('surat_masuk');
    }
    public function simpanedit_suratmasuk($no_agenda) 
    {
        $cek = $this->M_suratmasuk->simpanedit_suratmasuk($no_agenda);
		$this->session->set_flashdata($cek['kode'], $cek['msg']);
        redirect('surat_masuk');
    }
    public function delete_surat()
    {
        $cek = $this->M_suratmasuk->delete_suratmasuk();
		echo json_encode($cek);
    }
    public function recovery()
    {
        $cek = $this->M_suratmasuk->recovery();
		echo json_encode($cek);
    }
}