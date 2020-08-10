<?php


defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

  public function listLogBook($id_peserta, $limit = null, $offset = null)
  {
    $query = $this->db->select('*')
      ->from('tbl_logbook')
      ->where('id_peserta', $id_peserta)
      ->limit($limit)
      ->offset($offset)
      ->order_by('tanggal', 'DESC')
      ->get();
    return $query->result();
  }

  function dataPeserta($id_peserta)
  {
    $this->db->select('tbl_peserta.*, tbl_pembimbing.nama_pembimbing')
      ->from('tbl_peserta')
      ->join('tbl_pembimbing', 'tbl_pembimbing.id_pembimbing = tbl_peserta.id_pembimbing', 'left')
      ->where('tbl_peserta.id_peserta', $id_peserta);
    return $this->db->get()->row();
  }
}

/* End of file User_model.php */
