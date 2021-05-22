<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->Library('session');
	}

	public function index(){
		if($this->session->userdata('akses') == "0"){
			redirect('AdminController/admin_buku');
		}
		else if($this->session->userdata('akses') == "1"){
			redirect('KasirController/kasir_beli_buku');
		}
		else{
			$this->load->view('login');
		}
	}

	public function do_login(){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$cek = $this->ModelUjikomnas->get("user","where username='$username' and password='$password'")->num_rows();
		if($cek > 0){
			$akses = $this->ModelUjikomnas->get("user", "where username='$username' and password='$password'")->result_array();
			foreach($akses as $row){
				$akses = $row['akses'];
			}
			$status = $this->ModelUjikomnas->get("user, kasir", "where user.username=kasir.id_kasir and user.username='$username' and user.password='$password'")->result_array();
			foreach($status as $row){
				$status = $row['status'];
			}
			if($akses == 0){
				$data = $this->ModelUjikomnas->get("user", "where username='$username' and password='$password'")->result_array();
				foreach($data as $row){
					$akses = $row['akses'];
				}
				$sesi = array(
						'akses' => $akses
					);
				$this->session->set_userdata($sesi);
				redirect('AdminController/admin_buku');
				// print_r($sesi);
				// echo "<br>";
				// echo $this->session->userdata('akses');
			}
			else if($akses == 1 && $status == "Pegawai Aktif"){
				$data = $this->ModelUjikomnas->get("user, kasir", "where user.username=kasir.id_kasir and user.username='$username' and user.password='$password'")->result_array();
				foreach($data as $row){
					$akses = $row['akses'];
					$nama_kasir = $row['nama'];
					$id_kasir = $row['id_kasir'];
					$status = $row['status'];
				}
				$sesi = array(
						'akses' => $akses,
						'id_kasir' => $id_kasir,
						'nama_kasir' => $nama_kasir,
						'status' => $status
					);
				$this->session->set_userdata($sesi);
				redirect('KasirController/kasir_beli_buku');
			}
			else{
				$this->session->set_flashdata('pesan_login', '<small class="text-danger pesan">*Anda sudah bukan pekerja lagi!</small>');
				redirect('Logincontroller/index');
			}
		}
		else{
			$this->session->set_flashdata('pesan_login', '<small class="text-danger pesan">*Username dan/atau Password salah!</small>');
				redirect('Logincontroller/index');
		}
	}

	public function do_logout(){
		$unset = array(
				'username',
				'password',
				'nama_kasir',
				'akses'
			);
		$this->session->unset_userdata($unset);
		redirect('Logincontroller/index');
	}
}
