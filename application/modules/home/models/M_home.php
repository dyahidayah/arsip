<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

ini_set('memory_limit', '1024M');
class M_home extends CI_Model
{
    function count_suratmasuk()
    {
        $this->db->where('status_surat', '1');
        $query = $this->db->get('surat_masuk')->num_rows();

        return $query;
    }
    function count_suratkeluar()
    {
        $this->db->where('status_surat', '1');
        $query = $this->db->get('surat_keluar')->num_rows();


        return $query;
    }

}