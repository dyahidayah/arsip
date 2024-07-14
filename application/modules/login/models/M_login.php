<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

ini_set('memory_limit', '1024M');
class M_login extends CI_Model
{
    function admin_verifikasi() 
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $cek =  $this->db->get_where('user', ['username'=> $username, 'password'=> $password])->row();
        if ($cek) {
            $where = [
                'username'      => $username,
                'password'      => $password
            ];
            $cek = $this->db->get_where('user ', $where)->row();
            if ($cek) {
                $array = array(
                    'ses_daily_username'        => $cek->username,
                    'ses_daily_level'           => $cek->permission,
                    'ses_daily_display'         => 'operator',
                    'ses_daily_id'              => $cek->id_user,
                    'ses_daily_akses'           => 'masuk',
                );
                $this->session->set_userdata($array);

                return [
                    'kode'      => 'success',
                    'msg'       => 'Welcome to '.$cek->permission.' page ' . $cek->nama
                ];
            }

            return [
                'kode'      => 'error',
                'msg'       => 'Wrong Password!!'
            ];
        }

        return [
            'kode'      => 'error',
            'msg'       => 'Sorry, Account not registered!!'
        ];
    }
}