<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JenisModel extends CI_Model
{
    private $tabel = 'jenis_beasiswa';

    public function get_jenis()
    {
        return $this->db->get($this->tabel)->result();
        // return $this->db->query('SELECT * FROM jenis_beasiswa')->result();
    }

    public function insert_jenis()
    {
        $data = [
                'nama_jenis' => $this->input->post('nama_jenis'),
                'keterangan' => $this->input->post('keterangan')
            ];
        //nama_jenis sebalah kiri, sesuaikan dengan nama kolom di tabel  
        //nama_jenis sebelah kanan, sesuaikan dengan name di form yaitu (jenis_create.php baris 29)  
        $this->db->insert($this->tabel, $data);
        if ($this->db->affected_rows() > 0) { //cek proses perubahan data pada tabel, apabila lebih  
            $this->session->set_flashdata('pesan', "Data jenis berhasil ditambahkan!");
            $this->session->set_flashdata('status', true);
        } else {
            $this->session->set_flashdata('pesan', "Data jenis gagal ditambahkan!");
            $this->session->set_flashdata('status', false);
        }
    }

    //function dengan 1 parameter. $id nilainya dikirimkan oleh controller  
    public function get_jenis_byid($id)
    {
        return $this->db->get_where($this->tabel, ['id' => $id])->row();
        /* get_where hampir sama seperti get, bedanya ada tambahan klause where  
        untuk menampilkan data berdasarkan kriteria tertentu. 'id'=>$id artinya.  
        data yang diambil adalah data jenis_beasiswa dengan nilai id $id.  
        row() digunakan untuk mengambil satu baris data, beda dengan result() yang mengambil semua data */
    }
    public function update_jenis()
    {
        $data = [
                'nama_jenis' => $this->input->post('nama_jenis'),
                'keterangan' => $this->input->post('keterangan')
            ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update($this->tabel, $data);
        if ($this->db->affected_rows() > 0) { //cek proses perubahan data pada tabel, apabila lebih  
            $this->session->set_flashdata('pesan', "Data jenis berhasil update!");
            $this->session->set_flashdata('status', true);
        } else {
            $this->session->set_flashdata('pesan', "Data jenis gagal update!");
            $this->session->set_flashdata('status', false);
        }
    }

    public function delete_jenis($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->tabel);
        if ($this->db->affected_rows() > 0) { //cek proses perubahan data pada tabel, apabila lebih  
            $this->session->set_flashdata('pesan', "Data jenis berhasil dihapus!");
            $this->session->set_flashdata('status', true);
        } else {
            $this->session->set_flashdata('pesan', "Data jenis gagal dihapus!");
            $this->session->set_flashdata('status', false);
        }
    }

}
