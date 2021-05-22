<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KasirController extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->Library('session');
	}

	public function kasir_beli_buku(){
		if($this->session->userdata('akses') == "1"){
			$unset_active = array(
					'active_transaksi'
				);
			$this->session->unset_userdata($unset_active);
			$this->session->set_userdata('active_beli_buku',"active");
			$data = $this->ModelUjikomnas->get("buku", "where stok > 0 order by judul")->result_array();
			$jumlah_beli = count($this->cart->contents());
			$data = array(
					'data_buku' => $data,
					'jumlah_beli' => $jumlah_beli
				);
			$this->load->view('link');
			$this->load->view('kasir_header');
			$this->load->view('kasir_beli_buku', $data);

		}
		else{
			redirect('LoginController/index');
		}
	}

	public function search_beli_buku($nama){
		if($this->session->userdata('akses') == "1"){
			if($nama != "kosong"){
				$data = $this->ModelUjikomnas->get("buku", "where stok > 0 and judul like '%$nama%'")->result_array();
			}
			else{
				$data = $this->ModelUjikomnas->get("buku", "where stok > 0 order by judul")->result_array();
			}
			$data = array(
					'data_buku' => $data
				);
			$this->load->view('link');
			$this->load->view('cari_beli_buku', $data);
		}
		else{
			redirect('LoginController/index');
		}
	}
}
