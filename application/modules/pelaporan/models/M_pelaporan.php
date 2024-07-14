<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

ini_set('memory_limit', '1024M');
class M_pelaporan extends CI_Model
{
    function filter($tgl_awal, $tgl_akhir, $data_surat, $kategori, $jenis_surat)
    {
        
    }
}