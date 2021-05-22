<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CrudController extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->Library('session');
	}

	public function admin_simpan_buku(){
		$judul = $_POST['judul'];
		$noisbn = $_POST['noisbn'];
		$penulis = $_POST['penulis'];
		$penerbit = $_POST['penerbit'];
		$tahun = $_POST['tahun'];
		$harga_pokok = $_POST['harga_pokok'];
		$harga_jual = $_POST['harga_jual'];
		$ppn = $_POST['ppn'];
		$diskon = $_POST['diskon'];
		$id_distributor = $_POST['id_distributor'];
		$jumlah = $_POST['jumlah'];
		$tanggal = date("Y-m-d");
		$data_buku = array(
				'id_buku' => null,
				'judul' => $judul,
				'noisbn' => $noisbn,
				'penulis' => $penulis,
				'penerbit' => $penerbit,
				'tahun' => $tahun,
				'stok' => $jumlah,
				'harga_pokok' => $harga_pokok,
				'harga_jual' => $harga_jual,
				'ppn' => $ppn,
				'diskon' => $diskon
			);
		$id_buku = $this->ModelUjikomnas->transaksi("buku", $data_buku);
		$data_pasok = array(
				'id_pasok' => null,
				'id_distributor' => $id_distributor,
				'id_buku' => $id_buku,
				'jumlah' => $jumlah,
				'tanggal' => $tanggal
			);
		$this->ModelUjikomnas->insert("pasok", $data_pasok);
		redirect('AdminController/admin_buku');
	}

	public function admin_update_buku(){
		$id_buku = $_POST['id_buku'];
		$judul = $_POST['judul'];
		$noisbn = $_POST['noisbn'];
		$penulis = $_POST['penulis'];
		$penerbit = $_POST['penerbit'];
		$tahun = $_POST['tahun'];
		$harga_pokok = $_POST['harga_pokok'];
		$harga_jual = $_POST['harga_jual'];
		$ppn = $_POST['ppn'];
		$diskon = $_POST['diskon'];
		$data_buku = array(
				'judul' => $judul,
				'noisbn' => $noisbn,
				'penulis' => $penulis,
				'penerbit' => $penerbit,
				'tahun' => $tahun,
				'harga_pokok' => $harga_pokok,
				'harga_jual' => $harga_jual,
				'ppn' => $ppn,
				'diskon' => $diskon
			);
		$where_buku = array(
				'id_buku' => $id_buku
			);
		$this->ModelUjikomnas->update("buku", $data_buku, $where_buku);
		redirect('AdminController/admin_lihat_buku/'.$id_buku);
	}

	public function admin_delete_buku($id_buku){
		$where = array('id_buku' => $id_buku);
		$this->ModelUjikomnas->delete("buku", $where);
		$this->ModelUjikomnas->delete("pasok", $where);
		redirect('AdminController/admin_buku');
	}

	public function admin_simpan_stok_buku(){
		$id_buku = $_POST['id_buku'];
		$id_distributor = $_POST['id_distributor'];
		$jumlah = $_POST['jumlah'];
		$tanggal = date("Y-m-d");
		$data_pasok = array(
				'id_pasok' => null,
				'id_distributor' => $id_distributor,
				'id_buku' => $id_buku,
				'jumlah' => $jumlah,
				'tanggal' => $tanggal
			);
		$this->ModelUjikomnas->insert("pasok", $data_pasok);
		$data_stok = $this->ModelUjikomnas->get("buku", "where id_buku='$id_buku'")->result_array();
		foreach($data_stok as $row){
			$stok = $row['stok'];
		}
		$stok_update = $stok+$jumlah;
		$data_buku = array('stok' => $stok_update);
		$where = array('id_buku' => $id_buku);
		$this->ModelUjikomnas->update("buku", $data_buku, $where);
		redirect('AdminController/admin_buku');
	}

	public function admin_simpan_kasir(){
		$id_kasir = $_POST['id_kasir'];
		$nama_kasir = $_POST['nama_kasir'];
		$alamat = $_POST['alamat'];
		$no_telepon = $_POST['no_telepon'];
		$status = "Pegawai Aktif";
		$password = $_POST['password'];
		$akses = "1";
		$data_kasir = array(
				'id_kasir' => $id_kasir,
				'nama' => $nama_kasir,
				'alamat' => $alamat,
				'telepon' => $no_telepon,
				'status' => $status
			);
		$data_user = array(
				'id_user' => null,
				'username' => $id_kasir,
				'password' => $password,
				'akses' => $akses
			);
		$this->ModelUjikomnas->insert("kasir", $data_kasir);
		$this->ModelUjikomnas->insert("user", $data_user);
		redirect('AdminController/admin_kasir');
	}

	public function admin_update_kasir(){
		$id_kasir = $_POST['id_kasir'];
		$id_user = $_POST['id_user'];
		$nama_kasir = $_POST['nama_kasir'];
		$alamat = $_POST['alamat'];
		$no_telepon = $_POST['no_telepon'];
		$password = $_POST['password'];
		$data_kasir = array(
				'nama' => $nama_kasir,
				'alamat' => $alamat,
				'telepon' => $no_telepon
			);
		$data_user = array(
				'password' => $password
			);
		$where_kasir = array('id_kasir' => $id_kasir);
		$where_user = array('id_user' => $id_user);
		$this->ModelUjikomnas->update("kasir", $data_kasir, $where_kasir);
		$this->ModelUjikomnas->update("user", $data_user, $where_user);
		redirect('AdminController/admin_kasir');
	}

	public function admin_tidak_aktif_kasir($id_kasir){
		$status = "Pegawai Tidak Aktif";
		$data_kasir = array('status' => $status);
		$where = array('id_kasir' => $id_kasir);
		$this->ModelUjikomnas->update("kasir", $data_kasir, $where);
		redirect('AdminController/admin_kasir');
	}

	public function admin_aktif_kasir($id_kasir){
		$status = "Pegawai Aktif";
		$data_kasir = array('status' => $status);
		$where = array('id_kasir' => $id_kasir);
		$this->ModelUjikomnas->update("kasir", $data_kasir, $where);
		redirect('AdminController/admin_kasir');
	}

	public function admin_delete_kasir($id_kasir){
		$where_kasir = array('id_kasir' => $id_kasir);
		$where_user = array('username' => $id_kasir);
		$this->ModelUjikomnas->delete("kasir", $where_kasir);
		$this->ModelUjikomnas->delete("user", $where_user);
		redirect('AdminController/admin_kasir');
	}

	public function admin_simpan_distributor(){
		$nama_distributor = $_POST['nama_distributor'];
		$alamat = $_POST['alamat'];
		$no_telepon = $_POST['no_telepon'];
		$data_distributor = array(
				'id_distributor' => null,
				'nama_distributor' => $nama_distributor,
				'alamat' => $alamat,
				'telepon' => $no_telepon
			);
		$this->ModelUjikomnas->insert("distributor", $data_distributor);
		redirect('AdminController/admin_distributor');
	}

	public function admin_update_distributor(){
		$id_distributor = $_POST['id_distributor'];
		$nama_distributor = $_POST['nama_distributor'];
		$alamat = $_POST['alamat'];
		$no_telepon = $_POST['no_telepon'];
		$data_distributor = array(
				'nama_distributor' => $nama_distributor,
				'alamat' => $alamat,
				'telepon' => $no_telepon
			);
		$where = array('id_distributor' => $id_distributor);
		$this->ModelUjikomnas->update("distributor", $data_distributor, $where);
		redirect('AdminController/admin_distributor');
	}

	public function admin_delete_distributor($id_distributor){
		$where = array('id_distributor' => $id_distributor);
		$this->ModelUjikomnas->delete("distributor", $where);
		redirect('AdminController/admin_distributor');
	}

	public function kasir_simpan_cart(){
		$id_buku = $_POST['id_buku'];
		$harga_jual = $_POST['harga_jual'];
		$judul = $_POST['judul'];
		$penerbit = $_POST['penerbit'];
		$data = array(
			'id' => $id_buku,
			'qty' => 1,
			'penerbit' => $penerbit,
			'price' => $harga_jual,
			'name' => $judul
        );
		$this->cart->insert($data);
		$update_stok = $this->ModelUjikomnas->get("buku", "where id_buku='$id_buku'")->result_array();
		foreach($update_stok as $row){
			$stok = $row['stok'];
		}
		$hasil_stok = $stok-1;
		$stok_update = array('stok' => $hasil_stok);
		$where = array('id_buku' => $id_buku);
		$this->ModelUjikomnas->update("buku", $stok_update, $where);
		// Insert the product to cart
		redirect('KasirController/kasir_beli_buku');
	}

	public function update_cart(){
		if ($this->input->post('update_cart')){
			unset($_POST['update_cart']);
			$contents = $this->input->post();
            foreach ($contents as $content){
				$info = array(
					'rowid' => $content['rowid'],
					'qty'   => $content['qty']
				);
				$this->cart->update($info);
			}
		}
		//print_r($info);
		redirect('KasirController/kasir_beli_buku');
	}

	public function kasir_aksi_cart_simpan(){
		unset($_POST['simpan_cart']);
		$tanggal = date('Y-m-d');
		$pembayaran = $_POST['pembayaran'];
		if($pembayaran == ""){
			$this->session->set_flashdata('alert_pembayaran_kosong', '<div class="alert alert-danger"><strong>Perhatian!</strong> uang pembayaran tidak ada...</div>');
			redirect('KasirController/kasir_beli_buku');
		}
		else if($pembayaran < $this->cart->total()){
			$this->session->set_flashdata('alert_pembayaran_kurang', '<div class="alert alert-danger"><strong>Perhatian!</strong> uang pembayaran kurang...</div>');
			redirect('KasirController/kasir_beli_buku');
		}
		else{
			$contents = $this->cart->contents();
			$data_transaksi = array(
					'id_transaksi' => null,
					'id_kasir' => $this->session->userdata('id_kasir'),
					'tanggal' => $tanggal,
					'total_transaksi' => $this->cart->total(),
					'pembayaran' => $pembayaran
				);
			$id_transaksi = $this->ModelUjikomnas->transaksi("transaksi", $data_transaksi);
			foreach ($contents as $content){
				$data_penjualan = array(
						'id_penjualan' => null,
						'id_buku' => $content['id'],
						'id_transaksi' => $id_transaksi,
						'jumlah' => $content['qty'],
						'total' => $content['subtotal']
					);
				$this->ModelUjikomnas->insert("penjualan", $data_penjualan);
			}
			$data_bon = array(
					'data_bon' => $contents,
					'pembayaran' => $pembayaran
				);
			$this->load->view('link');
			$this->load->view('kasir_bayar', $data_bon);

			// foreach($contents as $row){
			// 	$data = array(
			// 			'jumlah' => $row['qty'],
			// 			'id_buku' => $row['id'],
			// 			'judul' => $row['name'],
			// 			'penerbit' => $row['penerbit'],
			// 			'harga_satuan' => $row['price'],
			// 			'subtotal' => $row['subtotal'],
			// 			'total' => $this->cart->total()
			// 		);
			// 	print_r($data);
			// }
			

			foreach($contents as $row){
				$clear = array(
					'rowid' => $row['rowid'],
					'qty' => 0
					);
				$this->cart->update($clear);
			}
		}
	}

	public function kasir_aksi_cart_cancel(){
		
		$contents = $this->cart->contents();
		foreach ($contents as $content){
			$id_buku = $content['id'];
			$jumlah = $content['qty'];
			$stok = $this->ModelUjikomnas->get("buku", "where id_buku='$id_buku'")->result_array();
			foreach($stok as $row){
				$stok = $row['stok'];
			}
			$stok_akhir = $stok+$jumlah;
			$stok_update = array('stok' => $stok_akhir);
			$where = array('id_buku' => $id_buku);
			$this->ModelUjikomnas->update("buku", $stok_update, $where);
			$clear = array(
				'rowid' => $content['rowid'],
				'qty' => 0
				);
			$this->cart->update($clear);
		}
		redirect('KasirController/kasir_beli_buku');
	}
}