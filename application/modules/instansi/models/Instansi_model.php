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

  function listPeserta($id_instansi)
  {
    $this->db->select('tbl_peserta.*, tbl_pekerjaan.nama_pekerjaan')
      ->from('tbl_peserta')
      ->join('tbl_pekerjaan', 'tbl_pekerjaan.id_pekerjaan = tbl_peserta.id_pekerjaan', 'left')
      ->where('tbl_peserta.id_instansi', $id_instansi);
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

  function rerata()
  {
    return $this->db->query('SELECT ROUND(AVG (nilai)) as rerata FROM (tbl_penilaian)')->row();
    //return $this->db->get()->row();
  }

  function cekAspek($id_peserta, $id_aspek)
  {
    $this->db->select('*')
      ->from('tbl_penilaian')
      ->where('id_peserta', $id_peserta)
      ->where('id_aspek', $id_aspek);
    return $this->db->get()->result();
  }

  public function listSurat($id_instansi, $limit, $offset)
  {
    $query = $this->db->select('tbl_surat.*, tbl_peserta.namalengkap, tbl_peserta.asal_instansi')
      ->from('tbl_surat')
      ->join('tbl_peserta', 'tbl_peserta.id_peserta = tbl_surat.id_peserta', 'left')
      ->where('tbl_surat.id_instansi', $id_instansi)
      ->order_by('tbl_surat.date_created', 'DESC')
      ->limit($limit)
      ->offset($offset)
      ->get();
    return $query->result();
  }

  public function getDetailSurat($id_surat)
  {
    $query = $this->db->select('tbl_surat.*, tbl_peserta.*')
      ->from('tbl_surat')
      ->join('tbl_peserta', 'tbl_peserta.id_peserta = tbl_surat.id_peserta', 'left')
      ->where('tbl_surat.id_surat', $id_surat)
      ->get();
    return $query->row();
  }

  public function cariSurat($id_instansi, $where)
  {
    $query = $this->db->select('*')
      ->from('tbl_surat')
      ->where('id_instansi', $id_instansi)
      ->like('instansi_asal', $where)
      ->limit(10)
      ->get();
    return $query->result();
  }

  function cekSurat($id_instansi)
  {
    $query = $this->db->select('*')
      ->from('tbl_surat')
      ->where('id_instansi', $id_instansi)
      ->where('is_read', '0')
      ->get();
    return $query->result();
  }
}
