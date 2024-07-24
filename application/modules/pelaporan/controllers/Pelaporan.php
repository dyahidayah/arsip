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
            'sub_menu'   => 'Laporan Surat',
        ];
        $this->template->load('tema/index', 'index', $data); 
    }

    public function generate_kategori($data_surat)
    {
        $data = $this->M_pelaporan->generate_kategori($data_surat);
		echo json_encode($data);
    }

    public function generate_jeniskategori($kategori)
    {
        $data = $this->M_pelaporan->generate_jeniskategori($kategori);
		echo json_encode($data);
    }

    public function filter($tgl_awal, $tgl_akhir, $data_surat, $kategori, $jns_surat)
    {
        $cek = $this->M_pelaporan->filter($tgl_awal, $tgl_akhir, $data_surat, $kategori, $jns_surat);
		echo json_encode($cek);
    }
    public function printPDF()
    {
        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');
        $this->data['title_pdf'] = 'Laporan Surat Masuk Dan Keluar';
        $file_pdf = uniqid();
        $paper = 'A4';
        $orientation = "portrait";
		$html = $this->load->view('welcome_message',$this->data, true);	  
        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}