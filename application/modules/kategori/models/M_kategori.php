<?php
defined('BASEPATH') or exit('No direct script access allowed');

// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

ini_set('memory_limit', '1024M');
class M_kategori extends CI_Model
{
    function get_data($section) {
        $this->db->order_by('id_kategori', 'ASC');
        $data = $this->db->get($section)->result();
        return $data;
    }
    function generate_number($activepage, $kategori_surat)
    {
        $urutan = '';
        $this->db->select_max('id_kategori');
        $this->db->where('nama_kategori', $kategori_surat);
        $res1 = $this->db->get($activepage)->row();
        
        if ($res1)
        {
            $urutan = substr($res1->id_kategori, 0, 2);
            $urutan++;
        } else {
            $urutan = 01;
        }
       
        $huruf="";
        if($activepage == "kategori_surat_masuk") {
            if($kategori_surat == 'Telegram') {
                $huruf = "KSM_T";
            } elseif($kategori_surat == 'Biasa') {
                $huruf = "KSM_B";
            } elseif($kategori_surat == 'Rahasia') {
                $huruf = "KSM_R";
            } else {
                $huruf = "KSM_SP";
            }
        } else {
            if($kategori_surat == 'Telegram') {
                $huruf = "KSK_T";
            } elseif($kategori_surat == 'Biasa') {
                $huruf = "KSK_B";
            } elseif($kategori_surat == 'Rahasia') {
                $huruf = "KSK_R";
            } else {
                $huruf = "KSK_SP";
            }
        }
        $kodesurat = sprintf("%02s", $urutan).$huruf;
        return $kodesurat;
    }
    // SIMPAN KATEGORI
    function simpan_kategori_masuk()
    {
        $data		= [
			'id_kategori' 	=> $this->input->post('id_kategori'),
            'nama_kategori' => $this->input->post('nama_kategori'),
            'jenis_kategori' => $this->input->post('jenis_kategori'),
		];

		$nama_kategori  = $data['nama_kategori'];
		$jenis_kategori = $data['jenis_kategori'];
        $where = [
            'nama_kategori' => $nama_kategori,
            'jenis_kategori' => $jenis_kategori,
        ];
        $cek_exist = $this->db->get_where('kategori_surat_masuk', $where)->row();

		if (!$cek_exist) {
			$cek = $this->db->insert('kategori_surat_masuk', $data);
			if ($cek) {
				$res = [
					'kode'		=> 'success',
					'msg'		=> 'Kategori Berhasil Disimpan',
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
                'msg'		=> 'Kategori sudah ditambahkan sebelumnya!!'
            ];
		}
		return $res;
    }
    function simpan_kategori_keluar()
    {
        $data		= [
			'id_kategori' 	=> $this->input->post('id_kategori'),
            'nama_kategori' => $this->input->post('nama_kategori'),
            'jenis_kategori' => $this->input->post('jenis_kategori'),
		];


		$nama_kategori  = $data['nama_kategori'];
		$jenis_kategori = $data['jenis_kategori'];
        $where= [
            'nama_kategori' => $nama_kategori,
            'jenis_kategori' => $jenis_kategori,
        ];
        $cek_exist = $this->db->get_where('kategori_surat_keluar', $where)->row();

		if ($cek_exist == false) {
			$cek = $this->db->insert('kategori_surat_keluar', $data);
			if ($cek) {
				$res = [
					'kode'		=> 'success',
					'msg'		=> 'Kategori Berhasil Disimpan',
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
                'msg'		=> 'Kategori sudah ditambahkan sebelumnya!!'
            ];
		}
		return $res;
    }
    // EDIT KATEGORI
    function detail_kategori($activepage, $id_kategori)
    {
        $where = [
            'id_kategori'      => $id_kategori,
        ];
        $data = $this->db->get_where($activepage, $where)->row();
        return $data;
    }
    function simpanedit_kategori_masuk($id_kategori)
    {
        $data		= [
			// 'id_kategori' 	=> $this->input->post('id_kategori'),
            'nama_kategori' => $this->input->post('nama_kategori'),
            'jenis_kategori' => $this->input->post('jenis_kategori'),
		];

        $this->db->where('id_kategori', $id_kategori);
        $cek = $this->db->update('kategori_surat_masuk', $data);

        if ($cek) {
            $res = [
                'kode'		=> 'success',
                'msg'		=> 'Data Kategori Berhasil Diperbaiki!',
            ];
        } else {
            $res = [
                'kode'		=> 'error',
                'msg'		=> 'Maaf, Data Kategori gagal diperbaiki. Anda bisa mencobanya kembali!'
            ];
        }
		return $res;
    }
    function simpanedit_kategori_keluar($id_kategori)
    {
        $data		= [
			// 'id_kategori' 	=> $this->input->post('id_kategori'),
            'nama_kategori' => $this->input->post('nama_kategori'),
            'jenis_kategori' => $this->input->post('jenis_kategori'),
		];
        $this->db->where('id_kategori', $id_kategori);
        $cek = $this->db->update('kategori_surat_keluar', $data);

        if ($cek) {
            $res = [
                'kode'		=> 'success',
                'msg'		=> 'Data Kategori Berhasil Diperbaiki!',
            ];
        } else {
            $res = [
                'kode'		=> 'error',
                'msg'		=> 'Maaf, Data Kategori gagal diperbaiki. Anda bisa mencobanya kembali!'
            ];
        }
		return $res;
    }
    // HAPUS KATEGORI
    function delete_kategori($section)
	{
        $id_kategori = $this->input->post('id_kategori');
		$where = ['id_kategori' => $id_kategori];
		$this->db->where($where);
		$cek = $this->db->delete($section);

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
}