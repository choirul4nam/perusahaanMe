<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Karywan extends CI_Controller
{
    public function index()
    {

        $data['title'] = "KARYAWAN";
        $data['dataKaryawan'] = $this->db->get('karyawan')->result_array();
        $this->load->view('templates/header.php', $data);
        $this->load->view('karyawan/index.php', $data);
        $this->load->view('templates/footer.php');
    }


    public function tambahData()
    {
        $data['title'] = "KARYAWAN";
        $data['judul'] = "TAMBAH DATA";
        $data['dataJabatan'] = $this->db->get('jabatan')->result_array();

        $this->load->view('templates/header.php', $data);
        $this->load->view('karyawan/tambahData.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function tambah()
    {

        $karywan = $this->db->get_where('karyawan', ['nik' => $this->input->post('nik')])->num_rows();
        if ($karywan >= 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">MAAF DATA KARYWAN DENGAN NIK TERSEBUT SUDAH ADA</div>');
            redirect('karywan');
        } else {
            $data = [

                'nik' => $this->input->post('nik'),
                'nama' => $this->input->post('namaKaryawan'),
                'alamat' => $this->input->post('alamat'),
                'jabatan' => $this->input->post('jabatan'),

            ];

            $this->db->insert('karyawan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">DATA KARYWAN BERHASIL DITAMBAHKAN</div>');
            redirect('karywan');
        }
    }

    public function updateData($nik)
    {
        $data['title'] = "KARYAWAN";
        $data['judul'] = "UBAH DATA";
        $data['dataJabatan'] = $this->db->get('jabatan')->result_array();
        $data['dataKarywan'] = $this->db->get_where('karyawan', ['nik' => $nik])->row_array();

        $this->load->view('templates/header.php', $data);
        $this->load->view('karyawan/ubahData.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function ubah()
    {

        $data = [

            'nik' => $this->input->post('nik'),
            'nama' => $this->input->post('namaKaryawan'),
            'alamat' => $this->input->post('alamat'),
            'jabatan' => $this->input->post('jabatan'),

        ];
        $this->db->where('nik', $this->input->post('nik'));
        $this->db->update('karyawan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">DATA BERHASIL DIUBAH</div>');
        redirect('karywan');
    }
    public function hapus($nik)
    {
        $this->db->where('nik', $nik);
        $this->db->delete('karyawan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">DATA KARYWAN BERHASIL DIHAPUS</div>');
        redirect('karywan');
    }
}
