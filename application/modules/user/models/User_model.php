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
}

/* End of file User_model.php */
