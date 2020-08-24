<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

  public function listSurat($limit, $offset)
  {
    $query = $this->db->select('*')
      ->from('tbl_surat')
      ->order_by('date_created', 'DESC')
      ->limit($limit)
      ->offset($offset)
      ->get();
    return $query->result();
  }

  function listPeserta()
  {
    $this->db->select('tbl_peserta.*, tbl_instansi.nama_instansi')
      ->from('tbl_peserta')
      ->join('tbl_instansi', 'tbl_instansi.id_instansi = tbl_peserta.id_instansi', 'left');
    return $this->db->get()->result();
  }

  function detailPeserta($id_peserta)
  {
    $this->db->select('tbl_peserta.*, tbl_pekerjaan.nama_pekerjaan, tbl_pembimbing.nama_pembimbing')
      ->from('tbl_peserta')
      ->join('tbl_pekerjaan', 'tbl_pekerjaan.id_pekerjaan = tbl_peserta.id_pekerjaan', 'left')
      ->join('tbl_pembimbing', 'tbl_pembimbing.id_pembimbing = tbl_peserta.id_pembimbing', 'left')
      ->where('tbl_peserta.id_peserta', $id_peserta);
    return $this->db->get()->row();
  }


  public function cariSurat($where)
  {
    $query = $this->db->select('*')
      ->from('tbl_surat')
      ->like('instansi_asal', $where)
      ->limit(10)
      ->get();
    return $query->result();
  }
}

/* End of file ModelName.php */
