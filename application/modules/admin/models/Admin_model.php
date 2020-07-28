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
