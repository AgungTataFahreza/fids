<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_fids extends CI_Model
{
	public function select_sort($tabel, $order, $by)
	{
		$this->db->order_by($order, $by);
		return $this->db->get($tabel);
	}
	public function select_condition($tabel, $kondisi)
	{
		return $this->db->get_where($tabel, $kondisi);
	}
	public function select_data($tabel)
	{
		return $this->db->get($tabel);
	}
	public function simpan_data($tabel, $data)
	{
		return $this->db->insert($tabel, $data);
	}
	public function hapus($table, $where)
	{
		$this->db->where($where);
		return $this->db->delete($table);
	}
	public function update($tabel, $where, $data)
	{
		$this->db->set($data);
		$this->db->where($where);
		return $this->db->update($tabel);
	}
	public function query($query)
	{
		return $this->db->query($query);
	}
}
