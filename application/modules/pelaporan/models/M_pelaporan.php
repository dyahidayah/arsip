<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

ini_set('memory_limit', '1024M');
class M_pelaporan extends CI_Model
{
    function generate_kategori($data_surat)
    {
        $this->db->select('nama_kategori');
        $this->db->group_by('nama_kategori');
        if($data_surat == 'surat_masuk')
        {
            $data = $this->db->get('kategori_surat_masuk')->result();
        } elseif($data_surat == 'surat_keluar')
        {
            $data = $this->db->get('kategori_surat_keluar')->result();
        } 
        return $data;
    }

    function generate_jeniskategori($kategori)
    {
        $this->db->select('jenis_kategori');
        $this->db->where('nama_kategori', $kategori);
        $data = $this->db->get('kategori_surat_keluar')->result();

        return $data;
    }

    function filter($tgl_awal, $tgl_akhir, $data_surat, $kategori, $jns_surat)
    {
        $where = [
            'tgl_surat >=' => $tgl_awal,
            'tgl_surat <=' => $tgl_akhir,
        ];
        
        if($kategori != 'semua') {
            $where['kategori'] = $kategori;
        }
        if($jns_surat != 'semua') {
            $where['jns_surat'] = $jns_surat;
        }
        if($data_surat != 'semua') {
            return $this->db->get_where($data_surat, $where)->result();
        } else {
            $data = [
                'masuk' => $this->db->get_where('surat_masuk', $where)->result(),
                'keluar' => $this->db->get_where('surat_keluar', $where)->result(),
            ];
            return $data;
        }
    }
    
}