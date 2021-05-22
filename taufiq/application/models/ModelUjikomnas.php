<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelUjikomnas extends CI_Model{
	public function get($namatabel, $where){
		$data = $this->db->query("select * from $namatabel ".$where);
		return $data;
	}

	public function insert($namatabel, $data){
		$data = $this->db->insert($namatabel, $data);
		return $data;
	}

	public function update($namatabel, $data, $where){
		$data = $this->db->update($namatabel, $data, $where);
		return $data;
	}

	public function delete($namatabel, $where){
		$data = $this->db->delete($namatabel, $where);
		return $data;
	}

	public function add_post($namatabel, $post_data){
		$this->db->insert($namatabel, $post_data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	public function transaksi($namatabel, $data){
		$data = $this->db->insert($namatabel, $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
}
