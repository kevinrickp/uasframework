<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak_model extends CI_Model {
    private $table = 'kontak';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    
        // Debugging: Cek koneksi database
        if (!$this->db->conn_id) {
            die("Koneksi database gagal.");
        }
    }

    public function get_all_kontak() {
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function get_kontak_by_id($id) {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    public function tambah_kontak($data) {
        return $this->db->insert($this->table, $data);
    }

    public function ubah_kontak($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function hapus_kontak($id) {
        return $this->db->delete($this->table, ['id' => $id]);
    }
}