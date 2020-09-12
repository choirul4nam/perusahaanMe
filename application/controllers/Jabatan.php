<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Jabatan extends CI_Controller
{
    public function index()
    {
        $data['title'] = "JABATAN";
        $data['dataJabatan'] = $this->db->get('jabatan')->result_array();
        $this->load->view('templates/header.php', $data);
        $this->load->view('jabatan/index.php', $data);
        $this->load->view('templates/footer.php');
    }
    public function tambahData()
    {
        $data['title'] = "KARYAWAN";
        $data['judul'] = "TAMBAH DATA";
        $data['dataJabatan'] = $this->db->get('jabatan')->result_array();

        $this->load->view('templates/header.php', $data);
        $this->load->view('jabatan/tambahJabatan.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function tambah()
    {

        $jabatan = $this->db->get_where('jabatan', ['nama_jabatan' => $this->input->post('namaJabatan')])->num_rows();
        if ($jabatan >= 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">MAAF DATA DENGAN TERSEBUT SUDAH ADA</div>');
            redirect('jabatan');
        } else {

            $data = [

                'nama_jabatan' => $this->input->post('namaJabatan'),

            ];

            $this->db->insert('jabatan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">DATA JABATAN BERHASIL DITAMBAHKAN</div>');
            redirect('jabatan');
        }
    }

    public function updateData($id_jabatan)
    {
        $data['title'] = "KARYAWAN";
        $data['judul'] = "UBAH DATA";
        $data['dataJabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $this->load->view('templates/header.php', $data);
        $this->load->view('jabatan/ubahJabatan.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function ubah()
    {
        $jabatan = $this->db->get_where('jabatan', ['nama_jabatan' => $this->input->post('namaJabatan')])->num_rows();
        if ($jabatan >= 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">MAAF DATA DENGAN TERSEBUT SUDAH ADA</div>');
            redirect('jabatan');
        } else {

            $data = [

                'nama_jabatan' => $this->input->post('namaJabatan'),

            ];

            $this->db->where('jabatan', $this->input->post('namaJabatan2'));
            $this->db->update('karyawan', ['jabatan' => $this->input->post('namaJabatan')]);
            $this->db->where('id_jabatan', $this->input->post('id_jabatan'));
            $this->db->update('jabatan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">DATA BERHASIL DIUBAH</div>');
            redirect('jabatan');
        }
    }
    public function hapus($id_jabatan)
    {
        $jabatan = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();
        $namaJabatan = $jabatan['nama_jabatan'];
        $this->db->where('jabatan', $namaJabatan);
        $this->db->update('karyawan', ['jabatan' => "TIDAK ADA JABATAN SEMENTARA"]);
        $this->db->where('id_jabatan', $id_jabatan);
        $this->db->delete('jabatan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">DATA JABATAN BERHASIL DIHAPUS</div>');
        redirect('jabatan');
    }
}
