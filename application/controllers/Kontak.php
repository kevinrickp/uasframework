<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Kontak_model');
        $this->load->helper('url');
        $this->load->library(['form_validation', 'session']);
        
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    public function index() {
        $data['kontaks'] = $this->Kontak_model->get_all_kontak();
        
        $data['content'] = 'kontak/list';
        $this->load->view('template', $data);
    }

    public function tambah() {
        $this->form_validation->set_rules('no_ktp', 'Nomor KTP', 'required|numeric|is_unique[kontak.no_ktp]');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required|numeric');
    
        if ($this->form_validation->run() === FALSE) {
            $data['content'] = 'kontak/tambah';
            $this->load->view('template', $data); 
        } else {
            $data = [
                'no_ktp' => $this->input->post('no_ktp'),
                'nama' => $this->input->post('nama'),
                'no_hp' => $this->input->post('no_hp')
            ];
    
            $this->Kontak_model->tambah_kontak($data);
            $this->session->set_flashdata('success', 'Kontak berhasil ditambahkan');
            redirect('kontak');
        }
    }

    public function ubah($id) {
        $this->form_validation->set_rules('no_ktp', 'Nomor KTP', 'required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required|numeric');
    
        if ($this->form_validation->run() === FALSE) {
            $data['kontak'] = $this->Kontak_model->get_kontak_by_id($id);
            $data['content'] = 'kontak/ubah';
            $this->load->view('template', $data);
        } else {
            $data = [
                'no_ktp' => $this->input->post('no_ktp'),
                'nama' => $this->input->post('nama'),
                'no_hp' => $this->input->post('no_hp')
            ];
    
            $this->Kontak_model->ubah_kontak($id, $data);
            $this->session->set_flashdata('success', 'Kontak berhasil diubah');
            redirect('kontak');
        }
    }

public function hapus($id) {
    if ($this->input->is_ajax_request()) {
        $deleted = $this->Kontak_model->hapus_kontak($id);
        $response = ['success' => $deleted];
        echo json_encode($response);
    } else {
        $this->Kontak_model->hapus_kontak($id);
        $this->session->set_flashdata('success', 'Kontak berhasil dihapus');
        redirect('kontak');
    }
}
}
