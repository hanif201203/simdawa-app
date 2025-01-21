<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PersyaratanModel extends CI_Model
{
    private $tabel = "persyaratan";

    public function get_persyaratan()
    {
        return $this->db->get($this->tabel)->result();
    }

    public function insert_persyaratan()
    {
        $data = [
            'nama_persyaratan' => $this->input->post('nama_persyaratan'),
            'keterangan' => $this->input->post('keterangan')
        ];
        $this->db->insert($this->tabel, $data);
        if ($this->db->affected_rows() > 0) { //cek proses perubahan data pada tabel, apabila lebih  
            $this->session->set_flashdata('pesan', "Data persyaratan berhasil ditambahkan!");
            $this->session->set_flashdata('status', true);
        } else {
            $this->session->set_flashdata('pesan', "Data persyaratan gagal ditambahkan!");
            $this->session->set_flashdata('status', false);
        }
    }

    public function get_persyaratan_byid($id)
    {
        return $this->db->get_where($this->tabel, ['id' => $id])->row();
    }

    public function update_persyaratan()
    {
        $data = [
            'nama_persyaratan' => $this->input->post('nama_persyaratan'),
            'keterangan' => $this->input->post('keterangan')
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update($this->tabel, $data);
    }

    public function delete_persyaratan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->tabel);
    }
}
