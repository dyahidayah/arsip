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

    public function generate_jeniskategori($kategori, $data_surat)
    {
        $data = $this->M_pelaporan->generate_jeniskategori($kategori, $data_surat);
		echo json_encode($data);
    }

    public function filter($tgl_awal, $tgl_akhir, $data_surat, $kategori, $jns_surat)
    {
        $cek = $this->M_pelaporan->filter($tgl_awal, $tgl_akhir, $data_surat, $kategori, $jns_surat);
		echo json_encode($cek);
    }
    public function printPDF($tgl_awal, $tgl_akhir, $data_surat, $kategori, $jns_surat)
    {
        $mpdf = new \Mpdf\Mpdf();
        
		$data = [
            'data_surat' => $data_surat,
            'tanggal_awal' => date('d-M-Y', strtotime($tgl_awal)),
            'tanggal_akhir' => date('d-M-Y', strtotime($tgl_akhir)),
			'detail_surat' => $this->M_pelaporan->filter($tgl_awal, $tgl_akhir, $data_surat, $kategori, $jns_surat),
		];

		$view = $this->load->view('export/laporan_pdf', $data, true);
		$mpdf->WriteHTML($view);
		$mpdf->Output('listsurat.pdf', 'I');
    }
}