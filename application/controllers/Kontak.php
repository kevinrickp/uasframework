<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Kontak_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session'); // Memuat library session
    }

    public function index() {
        $data['kontaks'] = $this->Kontak_model->get_all_kontak();
        
        // Mengirimkan data ke template
        $data['content'] = 'kontak/list'; // Menentukan view yang akan dimuat di template
        $this->load->view('template', $data); // Memuat template dengan data
    }

    public function tambah() {
        $this->form_validation->set_rules('no_ktp', 'Nomor KTP', 'required|numeric|is_unique[kontak.no_ktp]');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
    
        if ($this->form_validation->run() === FALSE) {
            $data['content'] = 'kontak/tambah'; // Menentukan view yang akan dimuat di template
            $this->load->view('template', $data); // Memuat template dengan data
        } else {
            $data = [
                'no_ktp' => $this->input->post('no_ktp'),
                'nama' => $this->input->post('nama')
            ];
    
            $this->Kontak_model->tambah_kontak($data);
            $this->session->set_flashdata('success', 'Kontak berhasil ditambahkan');
            redirect('kontak');
        }
    }

    public function ubah($id) {
        $this->form_validation->set_rules('no_ktp', 'Nomor KTP', 'required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
    
        if ($this->form_validation->run() === FALSE) {
            $data['kontak'] = $this->Kontak_model->get_kontak_by_id($id);
            $data['content'] = 'kontak/ubah'; // Menentukan view yang akan dimuat di template
            $this->load->view('template', $data); // Memuat template dengan data
        } else {
            $data = [
                'no_ktp' => $this->input->post('no_ktp'),
                'nama' => $this->input->post('nama')
            ];
    
            $this->Kontak_model->ubah_kontak($id, $data);
            $this->session->set_flashdata('success', 'Kontak berhasil diubah');
            redirect('kontak');
        }
    }

    public function hapus($id) {
        $this->Kontak_model->hapus_kontak($id);
        $this->session->set_flashdata('success', 'Kontak berhasil dihapus');
        redirect('kontak');
    }
}