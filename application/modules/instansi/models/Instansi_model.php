<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Instansi_model extends CI_Model
{

  public function loginEmail($email, $password)
  {
    $this->db->select('*')
      ->from('tbl_instansi')
      ->where(array(
        'email'      => $email,
        'password'   => sha1($password)
      ));
    $query = $this->db->get();
    return $query->row();
  }
  public function loginUsername($username, $password)
  {
    $this->db->select('*')
      ->from('tbl_instansi')
      ->where(array(
        'username_instansi'       => $username,
        'password'                => sha1($password)
      ));
    $query = $this->db->get();
    return $query->row();
  }

  function nilaiAspek($id_instansi, $id_peserta)
  {
    $this->db->select('tbl_penilaian.*, tbl_aspek.nama_aspek')
      ->from('tbl_penilaian')
      ->join('tbl_aspek', 'tbl_aspek.id_aspek = tbl_penilaian.id_aspek', 'left')
      ->where('id_instansi', $id_instansi)
      ->where('id_peserta', $id_peserta);
    return $this->db->get()->result();
  }

  public function updateNilai($id_peserta, $id_aspek, $data)
  {
    $this->db->where('id_peserta', $id_peserta)->where('id_aspek', $id_aspek);
    $this->db->update('tbl_penilaian', $data);
  }
}
