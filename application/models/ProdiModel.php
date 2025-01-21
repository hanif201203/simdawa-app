<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProdiModel extends CI_Model
{
    private $tabel = "prodi";

    public function get_prodi()
    {
        return $this->db->get($this->tabel)->result();
    }

    public function insert_prodi()
    {
        $data = [
            'nama_prodi' => $this->input->post('nama_prodi')
        ];
        $this->db->insert($this->tabel, $data);
        if ($this->db->affected_rows() > 0) { //cek proses perubahan data pada tabel, apabila lebih  
            $this->session->set_flashdata('pesan', "Data prodi berhasil ditambahkan!");
            $this->session->set_flashdata('status', true);
        } else {
            $this->session->set_flashdata('pesan', "Data prodi gagal ditambahkan!");
            $this->session->set_flashdata('status', false);
        }
    }

    public function get_prodi_byid($id)
    {
        return $this->db->get_where($this->tabel, ['id' => $id])->row();
    }

    public function update_prodi()
    {
        $data = [
            'nama_prodi' => $this->input->post('nama_prodi')
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update($this->tabel, $data);
        if ($this->db->affected_rows() > 0) { //cek proses perubahan data pada tabel, apabila lebih  
            $this->session->set_flashdata('pesan', "Data prodi berhasil diupdate!");
            $this->session->set_flashdata('status', true);
        } else {
            $this->session->set_flashdata('pesan', "Data prodi gagal diupdate!");
            $this->session->set_flashdata('status', false);
        }
    }

    public function delete_prodi($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->tabel);
        if ($this->db->affected_rows() > 0) { //cek proses perubahan data pada tabel, apabila lebih  
            $this->session->set_flashdata('pesan', "Data prodi berhasil diupdate!");
            $this->session->set_flashdata('status', true);
        } else {
            $this->session->set_flashdata('pesan', "Data prodi gagal diupdate!");
            $this->session->set_flashdata('status', false);
        }
    }
}
