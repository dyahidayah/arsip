<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

ini_set('memory_limit', '1024M');
class M_suratkeluar extends CI_Model
{
    function get_data() {
        $this->db->where('status_surat', '1');
        $this->db->order_by('no_agenda', 'ASC');
        $data = $this->db->get('surat_keluar')->result();
        return $data;
    }
    function get_datariwayat() {
        $this->db->where('status_surat', '0');
        $this->db->order_by('no_agenda', 'ASC');
        $data = $this->db->get('surat_keluar')->result();
        return $data;
    }
    function delete_suratkeluar() {
        $no_agenda = $this->input->post('no_agenda');
		$data		= [
            'status_surat' => "0",
		];

        $this->db->where('no_agenda', $no_agenda);
        $cek = $this->db->update('surat_keluar', $data);

		// echo json_encode()
		if ($cek) {
			$res = [
				'icon'		=> 'success',
				'message'	=> 'Data Berhasil Dihapus',
				'title'		=> 'Sukses'
            ];
		} else {
			$res = [
				'icon'		=> 'error',
				'message'	=> 'Gagal Hapus Data',
				'title'		=> 'Gagal'
            ];
		}
        return $res;
    }

    function recovery() {
        $no_agenda = $this->input->post('no_agenda');
		$data		= [
            'status_surat' => "1",
		];

        $this->db->where('no_agenda', $no_agenda);
        $cek = $this->db->update('surat_keluar', $data);

		// echo json_encode()
		if ($cek) {
			$res = [
				'icon'		=> 'success',
				'message'	=> 'Data Berhasil recovery',
				'title'		=> 'Sukses'
            ];
		} else {
			$res = [
				'icon'		=> 'error',
				'message'	=> 'Gagal recovery Data',
				'title'		=> 'Gagal'
            ];
		}
        return $res;
    }

    function detail_surat($no_agenda)
    {
        $this->db->where('no_agenda', $no_agenda);
        $data = $this->db->get('surat_keluar')->row();
        return $data;
    }

    function generate_number_agenda()
    {
        $urutan = '';
        $this->db->select_max('no_agenda');
        $res1 = $this->db->get('surat_keluar')->row();
        
        if ($res1)
        {
            $urutan = $res1->no_agenda;
            $urutan++;
        } else {
            $urutan = 01;
        }
        return $urutan;
    }

    function generate_jeniskategori($kategori)
    {
        $this->db->select('jenis_kategori');
        $this->db->where('nama_kategori', $kategori);
        $data = $this->db->get('kategori_surat_keluar')->result();

        return $data;
    }
    public function simpan_suratkeluar()
    {
        $data		= [
			'no_agenda' 	=> $this->input->post('no_agenda'),
            'no_surat'      => $this->input->post('no_surat'),
            'kategori'      => $this->input->post('kategori'),
            'jns_surat'     => $this->input->post('jns_surat'),
            'asal_surat'    => $this->input->post('asal_surat'),
            'tgl_surat'     => $this->input->post('tgl_surat'),
            'tujuan_surat'  => $this->input->post('tujuan_surat'),
            'perihal'       => $this->input->post('perihal'),
            'disposisi'     => $this->input->post('disposisi'),
            // 'file'          => $this->input->post('file'),
            'status_surat'  => '1',
		];
        $no_surat  = $data['no_surat'];
        $where = [
            'no_surat' => $no_surat,
        ];
        $cek_exist = $this->db->get_where('surat_keluar', $where)->row();

        if (!$cek_exist) {
            //upload PDF
            $data['file'] = $this->upload();
			$cek = $this->db->insert('surat_keluar', $data);
           
			if ($cek) {
				$res = [
					'kode'		=> 'success',
					'msg'		=> 'Surat keluar Berhasil Disimpan',
				];
			} else {
				$res = [
					'kode'		=> 'error',
					'msg'		=> 'Maaf Terjadi Kesalahan!!'
				];
			}
		} else {
            $res = [
                'kode'		=> 'error',
                'msg'		=> 'Nomer Surat ditambahkan sebelumnya!!'
            ];
		}
		return $res;
    }

    public function simpanedit_suratkeluar($no_agenda)
    {
        $data		= [
            'no_surat'      => $this->input->post('no_surat'),
            'kategori'      => $this->input->post('kategori'),
            'jns_surat'     => $this->input->post('jns_surat'),
            'asal_surat'    => $this->input->post('asal_surat'),
            'tgl_surat'     => $this->input->post('tgl_surat'),
            'tujuan_surat'  => $this->input->post('tujuan_surat'),
            'perihal'       => $this->input->post('perihal'),
            'disposisi'     => $this->input->post('disposisi'),
            'status_surat'  => '1',
		];

        $this->db->where('no_agenda', $no_agenda);
        $cek = $this->db->update('surat_keluar', $data);
        $data['file'] = $this->upload();
        if ($cek) {
            //upload PDF
			if ($cek) {
				$res = [
					'kode'		=> 'success',
					'msg'		=> 'Surat keluar Berhasil Diperbaiki',
				];
			} else {
				$res = [
					'kode'		=> 'error',
					'msg'		=> 'Maaf Terjadi Kesalahan!!'
				];
			}
		} else {
            $res = [
                'kode'		=> 'error',
                'msg'		=> 'Surat keluar Gagal Diperbaiki'
            ];
		}
		return $res;
    }

    function upload() 
    {
        $nama = uniqid(12) . '.pdf';
        $config['upload_path']   = './upload/';
        $config['allowed_types'] = 'pdf';
        $config['file_name']     = $nama;
        $config['max_size']      = 2000;
        $this->load->library('upload', $config);
  
        if (!$this->upload->do_upload('file')) 
        {
            $response = $this->upload->display_errors();
            return  [
                'kode'      => 'error',
                'msg'       => $response
            ];
        } 
        else
        {
            $data = array('application/pdf', 'application/x-download');
            return  $nama;
        }
    }
}