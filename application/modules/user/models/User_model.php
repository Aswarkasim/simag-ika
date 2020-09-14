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

  public function listPenerimaan($id_instansi, $limit = null, $offset = null)
  {
    $query = $this->db->select('tbl_peserta.*, tbl_instansi.nama_instansi')
      ->from('tbl_peserta')
      ->join('tbl_instansi', 'tbl_instansi.id_instansi = tbl_peserta.id_instansi', 'left')
      ->where('tbl_peserta.id_instansi', $id_instansi)
      ->where('tbl_peserta.is_accept', 'diterima')
      ->limit($limit)
      ->offset($offset)
      ->get();
    return $query->result();
  }

  public function getPesertaInstansiDetail($id_peserta)
  {
    $query = $this->db->select('tbl_peserta.*, tbl_instansi.nama_instansi')
      ->from('tbl_peserta')
      ->join('tbl_instansi', 'tbl_instansi.id_instansi = tbl_peserta.id_instansi', 'left')
      ->where('tbl_peserta.id_peserta', $id_peserta)
      ->get();
    return $query->row();
  }

  function dataPeserta($id_peserta)
  {
    $this->db->select('tbl_peserta.*, tbl_pembimbing.nama_pembimbing, tbl_pekerjaan.nama_pekerjaan')
      ->from('tbl_peserta')
      ->join('tbl_pembimbing', 'tbl_pembimbing.id_pembimbing = tbl_peserta.id_pembimbing', 'left')
      ->join('tbl_pekerjaan', 'tbl_pekerjaan.id_pekerjaan = tbl_peserta.id_pekerjaan', 'left')
      ->where('tbl_peserta.id_peserta', $id_peserta);
    return $this->db->get()->row();
  }

  function dataNilai($id_peserta)
  {
    $this->db->select('tbl_penilaian.*, tbl_aspek.nama_aspek')
      ->from('tbl_penilaian')
      ->join('tbl_aspek', 'tbl_aspek.id_aspek = tbl_penilaian.id_aspek', 'left')
      ->where('tbl_penilaian.id_peserta', $id_peserta);
    return $this->db->get()->result();
  }


  function rerata()
  {
    return $this->db->query('SELECT ROUND(AVG (nilai)) as rerata FROM (tbl_penilaian)')->row();
    //return $this->db->get()->row();
  }
}

/* End of file User_model.php */
