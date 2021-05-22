<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->Library('session');
	}

	public function admin_buku(){
		if($this->session->userdata('akses') == "0"){
			$unset_active = array(
					'active_transaksi',
					'active_distributor',
					'active_kasir'
				);
			$this->session->unset_userdata($unset_active);
			$this->session->set_userdata('active_home',"active");
			$data = $this->ModelUjikomnas->get("buku", "")->result_array();
			$data = array(
					'data' => $data
				);
			$this->load->view('link');
			$this->load->view('admin_header');
			$this->load->view('admin_buku', $data);
		}
		else{
			redirect('LoginController/index');
		}
		// echo $this->session->userdata('akses');
		// echo "a";
	}

	public function search_buku($nama){
		if($this->session->userdata('akses') == "0"){
			if($nama != "kosong"){
				$data = $this->ModelUjikomnas->get("buku", "where judul like '%$nama%'")->result_array();
			}
			else{
				$data = $this->ModelUjikomnas->get("buku", "")->result_array();
			}
			$data = array(
					'data' => $data
				);
			$this->load->view('link');
			$this->load->view('cari_buku', $data);
		}
		else{
			redirect('LoginController/index');
		}
	}

	public function admin_tambah_buku(){
		if($this->session->userdata('akses') == "0"){
			$unset_active = array(
					'active_transaksi',
					'active_home',
					'active_distributor',
					'active_kasir'
				);
			$this->session->unset_userdata($unset_active);
			$data = $this->ModelUjikomnas->get("distributor", "")->result_array();
			$data = array(
					'data' => $data
				);
			$this->load->view('link');
			$this->load->view('admin_header');
			$this->load->view('admin_tambah_buku', $data);
		}
		else{
			redirect('LoginController/index');
		}
	}

	public function admin_lihat_buku($id_buku){
		if($this->session->userdata('akses') == "0"){
			$unset_active = array(
					'active_transaksi',
					'active_home',
					'active_distributor',
					'active_kasir'
				);
			$this->session->unset_userdata($unset_active);
			$data = $this->ModelUjikomnas->get("buku", "where id_buku='$id_buku'")->result_array();
			$data = array(
					'data' => $data
				);
			$this->load->view('link');
			$this->load->view('admin_header');
			$this->load->view('admin_lihat_buku', $data);
		}
		else{
			redirect('LoginController/index');
		}
	}

	public function admin_edit_buku($id_buku){
		if($this->session->userdata('akses') == "0"){
			$unset_active = array(
					'active_transaksi',
					'active_home',
					'active_distributor',
					'active_kasir'
				);
			$this->session->unset_userdata($unset_active);
			$data = $this->ModelUjikomnas->get("buku", "where id_buku='$id_buku'")->result_array();
			$data_select = $this->ModelUjikomnas->get("distributor", "")->result_array();
			$data = array(
					'data' => $data,
					'data_select' => $data_select
				);
			$this->load->view('link');
			$this->load->view('admin_header');
			$this->load->view('admin_edit_buku', $data);
		}
		else{
			redirect('LoginController/index');
		}
	}

	public function admin_tambah_stok_buku($id_buku){
		if($this->session->userdata('akses') == "0"){
			$unset_active = array(
					'active_transaksi',
					'active_home',
					'active_distributor',
					'active_kasir'
				);
			$this->session->unset_userdata($unset_active);
			$data_select = $this->ModelUjikomnas->get("distributor", "")->result_array();
			$data = array(
						'data' => $id_buku,
						'data_select' => $data_select
					);
			$this->load->view('link');
			$this->load->view('admin_header');
			$this->load->view('admin_tambah_stok_buku', $data);
		}
		else{
			redirect('LoginController/index');
		}
	}

	public function admin_lihat_pemasok(){
		if($this->session->userdata('akses') == "0"){
			$unset_active = array(
					'active_transaksi',
					'active_home',
					'active_distributor',
					'active_kasir'
				);
			$this->session->unset_userdata($unset_active);
			$data_pemasok = $this->ModelUjikomnas->get("buku, pasok, distributor", "where buku.id_buku=pasok.id_buku and distributor.id_distributor=pasok.id_distributor")->result_array();
			$data = array(
						'data' => $data_pemasok,
					);
			$this->load->view('link');
			$this->load->view('admin_header');
			$this->load->view('admin_lihat_pemasok', $data);
		}
		else{
			redirect('LoginController/index');
		}
	}

	public function search_pemasok($nama){
		if($this->session->userdata('akses') == "0"){
			if($nama != "kosong"){
				$data = $this->ModelUjikomnas->get("buku, pasok, distributor", "where buku.id_buku=pasok.id_buku and distributor.id_distributor=pasok.id_distributor and distributor.nama_distributor like '%$nama%'")->result_array();
			}
			else{
				$data = $this->ModelUjikomnas->get("buku, pasok, distributor", "where buku.id_buku=pasok.id_buku and distributor.id_distributor=pasok.id_distributor")->result_array();
			}
			$data = array(
					'data' => $data
				);
			$this->load->view('link');
			$this->load->view('cari_pemasok', $data);
		}
		else{
			redirect('LoginController/index');
		}
	}

	public function admin_kasir(){
		if($this->session->userdata('akses') == "0"){
			$unset_active = array(
					'active_transaksi',
					'active_home',
					'active_distributor'
				);
			$this->session->unset_userdata($unset_active);
			$this->session->set_userdata('active_kasir',"active"	);
			$data = $this->ModelUjikomnas->get("kasir, user", "where user.username=kasir.id_kasir order by status")->result_array();
			$data = array(
					'data' => $data
				);
			$this->load->view('link');
			$this->load->view('admin_header');
			$this->load->view('admin_kasir', $data);
		}
		else{
			redirect('LoginController/index');
		}
	}

	public function search_kasir($nama){
		if($this->session->userdata('akses') == "0"){
			if($nama != "kosong"){
				$data = $this->ModelUjikomnas->get("kasir, user", "where user.username=kasir.id_kasir and kasir.nama like '%$nama%'")->result_array();
			}
			else{
				$data = $this->ModelUjikomnas->get("kasir, user", "where user.username=kasir.id_kasir order by status")->result_array();
			}
			$data = array(
					'data' => $data
				);
			$this->load->view('link');
			$this->load->view('cari_kasir', $data);
		}
		else{
			redirect('LoginController/index');
		}
	}

	public function admin_tambah_kasir(){
		if($this->session->userdata('akses') == "0"){
			$unset_active = array(
					'active_transaksi',
					'active_home',
					'active_distributor',
					'active_kasir'
				);
			$this->session->unset_userdata($unset_active);
			$this->load->view('link');
			$this->load->view('admin_header');
			$this->load->view('admin_tambah_kasir');
		}
		else{
			redirect('LoginController/index');
		}
	}

	public function admin_edit_kasir($id_kasir){
		if($this->session->userdata('akses') == "0"){
			$unset_active = array(
					'active_transaksi',
					'active_home',
					'active_distributor',
					'active_kasir'
				);
			$this->session->unset_userdata($unset_active);
			$data = $this->ModelUjikomnas->get("kasir, user", "where kasir.id_kasir=user.username and kasir.id_kasir='$id_kasir'")->result_array();
			$data = array(
					'data' => $data
				);
			$this->load->view('link');
			$this->load->view('admin_header');
			$this->load->view('admin_edit_kasir', $data);
		}
		else{
			redirect('LoginController/index');
		}
	}

	public function admin_distributor(){
		if($this->session->userdata('akses') == "0"){
			$unset_active = array(
					'active_home',
					'active_transaksi',
					'active_kasir'
				);
			$this->session->unset_userdata($unset_active);
			$this->session->set_userdata('active_distributor',"active");
			$data = $this->ModelUjikomnas->get("distributor", "")->result_array();
			$data = array(
					'data' => $data
				);
			$this->load->view('link');
			$this->load->view('admin_header');
			$this->load->view('admin_distributor', $data);
		}
		else{
			redirect('LoginController/index');
		}
	}

	public function search_distributor($nama){
		if($this->session->userdata('akses') == "0"){
			if($nama != "kosong"){
				$data = $this->ModelUjikomnas->get("distributor", "where nama_distributor like '%$nama%'")->result_array();
			}
			else{
				$data = $this->ModelUjikomnas->get("distributor", "")->result_array();
			}
			$data = array(
					'data' => $data
				);
			$this->load->view('link');
			$this->load->view('cari_distributor', $data);
		}
		else{
			redirect('LoginController/index');
		}
	}

	public function admin_tambah_distributor(){
		if($this->session->userdata('akses') == "0"){
			$unset_active = array(
					'active_transaksi',
					'active_home',
					'active_distributor',
					'active_kasir'
				);
			$this->session->unset_userdata($unset_active);
			$this->load->view('link');
			$this->load->view('admin_header');
			$this->load->view('admin_tambah_distributor');
		}
		else{
			redirect('LoginController/index');
		}
	}

	public function admin_edit_distributor($id_distributor){
		if($this->session->userdata('akses') == "0"){
			$unset_active = array(
					'active_transaksi',
					'active_home',
					'active_distributor',
					'active_kasir'
				);
			$this->session->unset_userdata($unset_active);
			$data = $this->ModelUjikomnas->get("distributor", "where id_distributor='$id_distributor'")->result_array();
			$data = array(
					'data' => $data
				);
			$this->load->view('link');
			$this->load->view('admin_header');
			$this->load->view('admin_edit_distributor', $data);
		}
		else{
			redirect('LoginController/index');
		}
	}

	public function admin_data_transaksi(){
		if($this->session->userdata('akses') == "0"){
			$unset_active = array(
					'active_home',
					'active_distributor',
					'active_kasir'
				);
			$this->session->unset_userdata($unset_active);
			$this->session->set_userdata('active_transaksi',"active"	);
			$data_transaksi = $this->ModelUjikomnas->get("kasir, transaksi", "where kasir.id_kasir=transaksi.id_kasir order by id_transaksi desc")->result_array();
			$data_transaksi = array(
					'data_transaksi' => $data_transaksi
				);
			$this->load->view('link');
			$this->load->view('admin_header');
			$this->load->view('admin_data_transaksi', $data_transaksi);
		}
		else{
			redirect('LoginController/index');
		}
	}

	public function search_transaksi($nama){
		if($this->session->userdata('akses') == "0"){
			if($nama != "kosong"){
				$data_transaksi = $this->ModelUjikomnas->get("kasir, transaksi", "where kasir.id_kasir=transaksi.id_kasir and tanggal like '%$nama%'")->result_array();
			}
			else{
				$data_transaksi = $this->ModelUjikomnas->get("kasir, transaksi", "where kasir.id_kasir=transaksi.id_kasir order by id_transaksi desc")->result_array();
			}
			$data_transaksi = array(
					'data_transaksi' => $data_transaksi
				);
			$this->load->view('link');
			$this->load->view('cari_transaksi', $data_transaksi);
		}
		else{
			redirect('LoginController/index');
		}
	}

	public function admin_detail_transaksi($id_transaksi){
		if($this->session->userdata('akses') == "0"){
			$unset_active = array(
					'active_home',
					'active_distributor',
					'active_kasir',
					'active_transaksi'
				);
			$this->session->unset_userdata($unset_active);
			$data = $this->ModelUjikomnas->get("buku, transaksi, penjualan", "where buku.id_buku=penjualan.id_buku and penjualan.id_transaksi=transaksi.id_transaksi and transaksi.id_transaksi='$id_transaksi'")->result_array();
			foreach($data as $row){
				$total_bayar = $row['total_transaksi'];
				$pembayaran = $row['pembayaran'];
			}
			$data = array(
					'data' => $data,
					'total_bayar' => $total_bayar,
					'pembayaran' => $pembayaran
				);
			$this->load->view('link');
			$this->load->view('admin_header');
			$this->load->view('admin_detail_transaksi', $data);
		}
		else{
			redirect('LoginController/index');
		}
	}
}
