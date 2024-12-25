<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library(['form_validation', 'session']);
        $this->load->helper(['url', 'form']);
    }

    public function login() {
        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules('username', 'Username', 'required|trim');
            $this->form_validation->set_rules('password', 'Password', 'required|trim');
    
            if ($this->form_validation->run() === FALSE) {
                echo json_encode([
                    'success' => false,
                    'message' => validation_errors()
                ]);
                return;
            }
    
            $username = $this->input->post('username');
            $password = $this->input->post('password');
    
            $user = $this->User_model->check_login($username, $password);
    
            if ($user) {
                $this->session->set_userdata([
                    'user_id' => $user->id,
                    'username' => $user->username,
                    'logged_in' => TRUE
                ]);
    
                echo json_encode([
                    'success' => true,
                    'username' => $user->username
                ]);
            } else {
                echo json_encode([
                    'success' => false,
                    'message' => 'Username atau password salah.'
                ]);
            }
        } else {
            $this->load->view('auth/login');
        }
    }
    

    public function register() {
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('auth/register');
        } else {
            $data = [
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            ];

            if ($this->User_model->register($data)) {
                $this->session->set_flashdata('success', 'Registrasi berhasil, silakan login');
                redirect('auth/login');
            } else {
                $this->session->set_flashdata('error', 'Terjadi kesalahan saat registrasi');
                redirect('auth/register');
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}