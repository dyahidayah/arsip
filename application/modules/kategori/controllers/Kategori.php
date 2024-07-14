<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kategori extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kategori');
        if ($this->session->userdata('ses_daily_username') == null) {
            $this->session->set_flashdata('error ', 'Mohon Login Untuk Melanjutkan');
            redirect('login', 'refresh');
        }
    }
    public function index()
    {
        $data = [
            'active'     => 'dashboard',
            
        ];
        $this->template->load('tema/index', 'index', $data); 
    }
    public function kategori_surat_masuk()
    {
        $data = [
            'active'     => 'kategori_surat_masuk',
            'sub_menu'   => 'Kategori Surat Masuk',
            'data_kategori' => $this->M_kategori->get_data('kategori_surat_masuk')
        ];
        $this->template->load('tema/index', 'index', $data); 
    }

    public function kategori_surat_keluar()
    {
        $data = [
            'active'     => 'kategori_surat_keluar',
            'sub_menu'   => 'Kategori Surat Keluar',
            'data_kategori' => $this->M_kategori->get_data('kategori_surat_keluar')
        ];
        $this->template->load('tema/index', 'index', $data); 
    }

    public function tambah_kategori_surat_masuk()
    {
        $data = [
            'active'     => 'kategori_surat_masuk',
            'main_menu'  => 'Kategori Masuk',
            'sub_menu'   => 'Input Kategori Surat Masuk',
        ];
        $this->template->load('tema/index', 'tambah', $data); 
    }

    public function tambah_kategori_surat_keluar()
    {
        $data = [
            'active'     => 'kategori_surat_keluar',
            'main_menu'  => 'Kategori Keluar',
            'sub_menu'   => 'Input Kategori Surat Keluar',
        ];
        $this->template->load('tema/index', 'tambah', $data); 
    }

    public function edit_kategori_surat_masuk($id_kategori)
    {
        $data = [
            'active'     => 'kategori_surat_masuk',
            'main_menu'  => 'Kategori Masuk',
            'sub_menu'   => 'Edit Kategori Surat Masuk',
            'data'       => $this->M_kategori->detail_kategori('kategori_surat_masuk', $id_kategori)
        ];
        $this->template->load('tema/index', 'edit', $data); 
    }
    
    public function edit_kategori_surat_keluar($id_kategori)
    {
        $data = [
            'active'     => 'kategori_surat_keluar',
            'main_menu'  => 'Kategori Keluar',
            'sub_menu'   => 'Edit Kategori Surat Keluar',
            'data'       => $this->M_kategori->detail_kategori('kategori_surat_keluar', $id_kategori)
        ];
        $this->template->load('tema/index', 'edit', $data); 
    }

    public function generate_number($activepage, $kategori_surat) 
    {
        $data = $this->M_kategori->generate_number($activepage, $kategori_surat);
		echo json_encode($data);
    }

    public function simpan_kategori_surat_masuk()
    {
        $cek = $this->M_kategori->simpan_kategori_masuk();
		$this->session->set_flashdata($cek['kode'], $cek['msg']);
        redirect('kategori/kategori_surat_masuk');
    }
    public function simpan_kategori_surat_keluar()
    {
        $cek = $this->M_kategori->simpan_kategori_keluar();
		$this->session->set_flashdata($cek['kode'], $cek['msg']);
        redirect('kategori/kategori_surat_keluar');
    }
    public function simpanedit_kategori_surat_masuk($id_kategori)
    {
        $cek = $this->M_kategori->simpanedit_kategori_masuk($id_kategori);
		$this->session->set_flashdata($cek['kode'], $cek['msg']);
        redirect('kategori/kategori_surat_masuk');
    }
    public function simpanedit_kategori_surat_keluar($id_kategori)
    {
        $cek = $this->M_kategori->simpanedit_kategori_keluar($id_kategori);
		$this->session->set_flashdata($cek['kode'], $cek['msg']);
        redirect('kategori/kategori_surat_keluar');
    }
    function delete_kategori($section)
    {
        $cek = $this->M_kategori->delete_kategori($section);
		echo json_encode($cek);
    }
}