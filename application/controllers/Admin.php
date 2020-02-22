<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_fids');
		if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
			redirect(base_url("Login"));
		}
	}
	public function index()
	{
		date_default_timezone_set("Asia/Jakarta");
		$date = date('w');
		$data['gambar'] = $this->Model_fids->query('SELECT * FROM gambar')->result();
		$data['kedatangan'] = $this->Model_fids->query("SELECT c.id, b.nama_penerbangan, b.image, c.flight_number, a.nama_kota, c.hari, c.waktu, c.est, c.remark, c.status, d.status_english FROM tabel_city AS a, tabel_flight AS b, tabel_kedatangan AS c, tabel_status as d WHERE a.id_kota = c.id_city AND b.id_penerbangan = c.id_flight AND c.hari=$date AND c.remark=d.id")->result();
		// $data['kedatangan'] = $this->Model_fids->query("SELECT c.id, b.nama_penerbangan, b.image, c.flight_number, a.nama_kota, c.hari, c.waktu, c.est, c.remark, c.status, d.status_english FROM tabel_city AS a, tabel_flight AS b, tabel_kedatangan AS c, tabel_status as d WHERE a.id_kota = c.id_city AND b.id_penerbangan = c.id_flight AND c.hari=$date AND c.remark=d.id AND c.waktu < DATE_ADD(CURTIME(), INTERVAL 3 HOUR) AND c.waktu > (CURTIME() - INTERVAL 3 HOUR)  ORDER BY c.waktu")->result();
		$data['keberangkatan'] = $this->Model_fids->query("SELECT c.id, b.nama_penerbangan, b.image, c.flight_number, a.nama_kota, c.hari, c.waktu, c.est, c.remark, c.status, d.status_english, c.gate, c.status_gate FROM tabel_city AS a, tabel_flight AS b, tabel_keberangkatan AS c, tabel_status as d WHERE a.id_kota = c.id_city AND b.id_penerbangan = c.id_flight AND c.hari=$date AND c.remark=d.id AND c.waktu < DATE_ADD(CURTIME(), INTERVAL 3 HOUR) AND c.waktu > (CURTIME() - INTERVAL 3 HOUR)  ORDER BY c.waktu")->result();
		// $data['keberangkatan'] = $this->Model_fids->query("SELECT c.id, b.nama_penerbangan, b.image, c.flight_number, a.nama_kota, c.hari, c.waktu, c.est, c.remark, c.status, d.status_english, c.gate, c.status_gate FROM tabel_city AS a, tabel_flight AS b, tabel_keberangkatan AS c, tabel_status as d WHERE a.id_kota = c.id_city AND b.id_penerbangan = c.id_flight AND c.hari=$date AND c.remark=d.id")->result();
		$this->load->view('admin/index', $data);
	}

	public function aksi_status()
	{
		$id		= $_GET['id'];
		$informasi_tabel	= $_GET['informasi_tabel'];
		$cekStatus	= $_GET['cekStatus'];

		if ($cekStatus == '2' || $cekStatus == '' || $cekStatus == null) {
			$ubah_status = '1';
		} else if ($cekStatus == '1') {
			$ubah_status = '2';
		}

		$hasil	= $this->Model_fids->update($informasi_tabel, array('id' => $id), array('status' => $ubah_status));
		$callback = array('hasil' => $hasil);
		echo json_encode($callback);
	}

	public function aksi_status_gate()
	{
		$id		= $_GET['id'];
		$cekStatus	= $_GET['cekStatus'];

		if ($cekStatus == '2' || $cekStatus == '' || $cekStatus == null) {
			$ubah_status = '1';
		} else if ($cekStatus == '1') {
			$ubah_status = '2';
		}

		$hasil	= $this->Model_fids->update("tabel_keberangkatan", array('id' => $id), array('status_gate' => $ubah_status));
		$callback = array('hasil' => $hasil);
		echo json_encode($callback);
    }

	public function updateProfil()
	{
		$password1 = $this->input->post("password1");
		$password2 = $this->input->post("password2");

		if ($password1 == $password2) {
			$password = password_hash($password1, PASSWORD_DEFAULT);
			$result = $this->Model_fids->update('tabel_user', ["id_login" => 1], ["password" => $password]);
			if ($result) {
				echo "<script>
					alert('Berhasil');
					window.location.href = '" . base_url() . "Admin';
					</script>";
			} else {
				echo "<script>
					alert('Gagal');
					window.location.href = '" . base_url() . "Admin';
					</script>";
			}
		} else {
			echo "<script>
					alert('Konfirmasi Password Salah');
					window.location.href = '" . base_url() . "Admin';
					</script>";
		}
	}

	public function background()
	{
		$data['gambar'] = $this->Model_fids->query('SELECT * FROM gambar')->result();
		$this->load->view('admin/background', $data);
	}
	public function tambahBackground()
	{
		$config['upload_path']          = './images';
		$config['allowed_types']        = 'jpg|jpeg|png|PNG|JPEG|JPG';
		$config['max_size']             = 20440700;
		$lokasi_file    				= $_FILES['foto']['tmp_name'];
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('foto')) {
			echo "<script>
					alert('Gagal Upload');
					window.location.href = '" . base_url() . "Admin/background';
					</script>";
		} else {
			$result = $this->upload->data();
			$gambar = array(
				'judul_gambar' 	=> $result['file_name'],
				'status'		=> 0
			);
			$cek = $this->Model_fids->select_condition('gambar', array('judul_gambar' => $result['file_name']))->num_rows();
			if ($cek > 0) {
				echo "<script>
					alert('Gambar Sudah Ada');
					window.location.href = '" . base_url() . "Admin/background';
					</script>";
			} else {
				$hasil = $this->Model_fids->simpan_data("gambar", $gambar);
				if ($hasil) {
					echo "<script>
					alert('Gambar Berhasil di Simpan');
					window.location.href = '" . base_url() . "Admin/background';
					</script>";
				} else {
					echo "<script>
					alert('Gambar Gagal di Simpan');
					window.location.href = '" . base_url() . "Admin/background';
					</script>";
				}
			}
		}
	}
	public function changeBackground($id = '')
	{
		$backg = $id;
		$hasil = $this->Model_fids->query("UPDATE gambar SET status=0");
		$hasil2 = $this->Model_fids->update("gambar", array('id_gambar' => $backg), array('status' => '1'));
		if ($hasil && $hasil2) {
			echo "<script>
					alert('Berhasil');
					window.location.href = '" . base_url() . "Admin/background';
					</script>";
		} else {
			echo "<script>
					alert('Gagal');
					window.location.href = '" . base_url() . "Admin/background';
					</script>";
		}
	}
	public function hapusBackground($id = '')
	{
		$hasil = $this->Model_fids->hapus("gambar", array('id_gambar' => $id));
		if ($hasil) {
			echo "<script>
					alert('Gambar Berhasil di Hapus');
					window.location.href = '" . base_url() . "Admin/background';
					</script>";
		} else {
			echo "<script>
					alert('Gambar Gagal di Hapus');
					window.location.href = '" . base_url() . "Admin/background';
					</script>";
		}
	}

	//CRUD Status Keterangan
	public function statusInfo()
	{
		$data["statusInfo"] = $this->Model_fids->query('SELECT * FROM tabel_status order by jenis')->result();
		$this->load->view('admin/statusInfo', $data);
	}

	public function tambahStatusInfo()
	{
		$jenis			= $this->input->post('jenis');
		$status_indo	= $this->input->post('status_indo');
		$status_english	= $this->input->post('status_english');

		$data	= array(
			'jenis' 			=> $jenis,
			'status_indo'		=> $status_indo,
			'status_english'	=> $status_english
		);
		$cek = $this->Model_fids->select_condition('tabel_status', $data)->num_rows();
		if ($cek > 0) {
			echo "<script>
					alert('Data Sudah Ada');
					window.location.href = '" . base_url() . "Admin/statusInfo';
					</script>";
		} else {
			$hasil = $this->Model_fids->simpan_data("tabel_status", $data);
			if ($hasil) {
				echo "<script>
					alert('Data Berhasil di Simpan');
					window.location.href = '" . base_url() . "Admin/statusInfo';
					</script>";
			} else {
				echo "<script>
					alert('Data Gagal di Simpan');
					window.location.href = '" . base_url() . "Admin/statusInfo';
					</script>";
			}
		}
	}

	public function editStatusInfo()
	{
		$id				= $this->input->post('id');
		$jenis			= $this->input->post('jenis');
		$status_indo	= $this->input->post('status_indo');
		$status_english	= $this->input->post('status_english');

		$data	= array(
			'jenis' 			=> $jenis,
			'status_indo'		=> $status_indo,
			'status_english'	=> $status_english
		);
		$cek = $this->Model_fids->select_condition('tabel_status', $data)->num_rows();
		if ($cek > 0) {
			echo "<script>
					alert('Data Sudah Ada');
					window.location.href = '" . base_url() . "Admin/statusInfo';
					</script>";
		} else {
			$hasil = $this->Model_fids->update("tabel_status", ['id' => $id], $data);
			if ($hasil) {
				echo "<script>
					alert('Data Berhasil di Edit');
					window.location.href = '" . base_url() . "Admin/statusInfo';
					</script>";
			} else {
				echo "<script>
					alert('Data Gagal di Edit');
					window.location.href = '" . base_url() . "Admin/statusInfo';
					</script>";
			}
		}
	}

	public function deleteStatusInfo($id = '')
	{
		$hasil = $this->Model_fids->hapus("tabel_status", array('id' => $id));
		if ($hasil) {
			echo "<script>
					alert('Data Berhasil di Hapus');
					window.location.href = '" . base_url() . "Admin/statusInfo';
					</script>";
		} else {
			echo "<script>
					alert('Data Gagal di Hapus');
					window.location.href = '" . base_url() . "Admin/statusInfo';
					</script>";
		}
	}
	//Running Text
	public function runningText()
	{
		$data["runningText"] = $this->Model_fids->select_data('running_text')->result();
		$this->load->view('admin/runningText', $data);
	}
	public function tambahRunningText()
	{
		$text = $this->input->post('text');
		$cek = $this->Model_fids->select_condition('running_text', array('text' => $text))->num_rows();
		if ($cek > 0) {
			echo "<script>
					alert('Text Sudah Ada');
					window.location.href = '" . base_url() . "Admin/runningText';
					</script>";
		} else {
			$hasil = $this->Model_fids->simpan_data("running_text", ['text' => $text, 'status' => 0]);
			if ($hasil) {
				echo "<script>
					alert('Data Berhasil di Simpan');
					window.location.href = '" . base_url() . "Admin/runningText';
					</script>";
			} else {
				echo "<script>
					alert('Data Gagal di Simpan');
					window.location.href = '" . base_url() . "Admin/runningText';
					</script>";
			}
		}
	}
	public function editRunningText()
	{
		$id		= $this->input->post("id");
		$text 	= $this->input->post("text");

		$cek = $this->Model_fids->select_condition('running_text', array('text' => $text))->num_rows();
		if ($cek > 0) {
			echo "<script>
					alert('Text Sudah Ada');
					window.location.href = '" . base_url() . "Admin/runningText';
					</script>";
		} else {
			$hasil = $this->Model_fids->update("running_text", array('id' => $id), array('text' => $text));
			if ($hasil) {
				echo "<script>
					alert('Data Berhasil di Edit');
					window.location.href = '" . base_url() . "Admin/runningText';
					</script>";
			} else {
				echo "<script>
					alert('Data Gagal di Edit');
					window.location.href = '" . base_url() . "Admin/runningText';
					</script>";
			}
		}
	}

	public function deleteRunningText($id = '')
	{
		$hasil = $this->Model_fids->hapus("running_text", array('id' => $id));
		if ($hasil) {
			echo "<script>
					alert('Data Berhasil di Hapus');
					window.location.href = '" . base_url() . "Admin/runningText';
					</script>";
		} else {
			echo "<script>
					alert('Data Gagal di Hapus');
					window.location.href = '" . base_url() . "Admin/runningText';
					</script>";
		}
	}

	public function toggleRunningText($id = '')
	{
		$hasil = $this->Model_fids->query("UPDATE running_text SET status=0");
		$hasil2 = $this->Model_fids->update("running_text", array('id' => $id), array('status' => '1'));
		//$this->runningText();
		// echo $hasil2;
		// echo $id;
		if ($hasil && $hasil2) {
			echo "<script>
					alert('Berhasil');
					window.location.href = '" . base_url() . "Admin/runningText';
					</script>";
		} else {
			echo "<script>
					alert('Gagal');
					window.location.href = '" . base_url() . "Admin/runningText';
					</script>";
		}
	}

	//PENERBANGAN
	//tampil data penerbangan
	public function penerbangan()
	{
		$data["penerbangan"] = $this->Model_fids->select_data('tabel_flight')->result();
		$this->load->view('admin/penerbangan', $data);
	}

	//simpan tambah data penerbangan 
	public function tambahPenerbangan()
	{
		$nama = $this->input->post("nama");

		$config['upload_path']          = './image';
		$config['allowed_types']        = 'jpg|jpeg|png|PNG|JPEG|JPG';
		$config['max_size']             = 20440700;
		$lokasi_file    				= $_FILES['foto']['tmp_name'];
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('foto')) {
			echo "<script>
					alert('Upload Gambar Gagal');
					window.location.href = '" . base_url() . "Admin/penerbangan';
					</script>";
		} else {
			$result = $this->upload->data();
			$flight = array(
				'nama_penerbangan'	=> $nama,
				'image' 		 	=> $result['file_name']
			);

			$cek = $this->Model_fids->select_condition('tabel_flight', array('nama_penerbangan' => $nama))->num_rows();
			if ($cek > 0) {
				echo "<script>
					alert('Penerbangan Sudah Ada');
					window.location.href = '" . base_url() . "Admin/penerbangan';
					</script>";
			} else {
				$hasil = $this->Model_fids->simpan_data("tabel_flight", $flight);
				if ($hasil) {
					echo "<script>
					alert('Data Berhasil di Simpan');
					window.location.href = '" . base_url() . "Admin/penerbangan';
					</script>";
				} else {
					echo "<script>
					alert('Data Gagal di Simpan');
					window.location.href = '" . base_url() . "Admin/penerbangan';
					</script>";
				}
			}
		}
	}

	//Tampil Form edit
	public function TampilEditPenerbangan($id = '')
	{
		$data['penerbangan'] = $this->Model_fids->select_condition('tabel_flight', array('id_penerbangan' => $id))->row();
		$this->load->view('admin/editPenerbangan', $data);
	}

	//Edit/Update Data PENERBANGAN
	public function EditPenerbangan()
	{
		$id   = $this->input->post("id");
		$nama = $this->input->post("nama");
		$nama2 = $this->input->post("nama2");

		$config['upload_path']          = './image';
		$config['allowed_types']        = 'jpg|jpeg|png|PNG|JPEG|JPG';
		$config['max_size']             = 20440700;
		$lokasi_file    				= $_FILES['foto']['tmp_name'];
		$this->load->library('upload', $config);

		if (empty($lokasi_file)) {
			$flight = array(
				'nama_penerbangan'	=> $nama
			);

			if($nama != $nama2)
			{
				$cek = $this->Model_fids->select_condition('tabel_flight', array('nama_penerbangan' => $nama))->num_rows();
			}
			else
			{
				$cek = $this->Model_fids->select_condition('tabel_flight', $flight)->num_rows();
			}

			// $cek = $this->Model_fids->select_condition('tabel_flight', array('nama_penerbangan' => $nama))->num_rows();

			if ($cek > 0) {
				echo "<script>
					alert('Penerbangan Sudah Ada');
					window.location.href = '" . base_url() . "Admin/penerbangan';
					</script>";
			} else {
				$hasil = $this->Model_fids->update("tabel_flight", array('id_penerbangan' => $id), $flight);
				if ($hasil) {
					echo "<script>
					alert('Data Berhasil di Edit');
					window.location.href = '" . base_url() . "Admin/penerbangan';
					</script>";
				} else {
					echo "<script>
					alert('Data Gagal di Edit');
					window.location.href = '" . base_url() . "Admin/penerbangan';
					</script>";
				}
			}
		} else {
			if (!$this->upload->do_upload('foto')) {
				echo "<script>
					alert('Gagal Upload');
					window.location.href = '" . base_url() . "Admin/penerbangan';
					</script>";
			} else {
				$result = $this->upload->data();
				$flight = array(
					'nama_penerbangan'	=> $nama,
					'image' 		 	=> $result['file_name']
				);

				// $cek = $this->Model_fids->select_condition('tabel_flight', array('nama_penerbangan' => $nama))->num_rows();

				if($nama != $nama2)
				{
					$cek = $this->Model_fids->select_condition('tabel_flight', array('nama_penerbangan' => $nama))->num_rows();
				}
				else
				{
					$cek = $this->Model_fids->select_condition('tabel_flight', $flight)->num_rows();
				}

				if ($cek > 0) {
					echo "<script>
					alert('Penerbangan Sudah Ada');
					window.location.href = '" . base_url() . "Admin/penerbangan';
					</script>";
				} else {
					$hasil = $this->Model_fids->update("tabel_flight", array('id_penerbangan' => $id), $flight);
					if ($hasil) {
						echo "<script>
					alert('Data Berhasil di Edit');
					window.location.href = '" . base_url() . "Admin/penerbangan';
					</script>";
					} else {
						echo "<script>
					alert('Data Gagal di Edit');
					window.location.href = '" . base_url() . "Admin/penerbangan';
					</script>";
					}
				}
			}
		}
	}

	//Hapus Penerbangan
	public function HapusPenerbangan($id = '')
	{
		$hasil = $this->Model_fids->hapus('tabel_flight', ['id_penerbangan' => $id]);
		if ($hasil)
		{
			echo "<script>
						alert('Berhasil');
						window.location.href = '" . base_url() . "Admin/penerbangan';
						</script>";
		} else {
			echo "<script>
						alert('Gagal');
						window.location.href = '" . base_url() . "Admin/penerbangan';
						</script>";
		}
	}

	//KOTA
	//tampil Kota
	public function kota()
	{
		$data["kota"] = $this->Model_fids->select_data('tabel_city')->result();
		$this->load->view('admin/kota', $data);
	}

	//tambah kota
	public function TambahKota()
	{
		$kota 	= $this->input->post("kota2");
		$negara	= $this->input->post("negara2");

		$config['upload_path']          = './image/gambar_kota';
		$config['allowed_types']        = 'jpg|jpeg|png|PNG|JPEG|JPG';
		$config['max_size']             = 20440700;
		$lokasi_file    				= $_FILES['foto']['tmp_name'];
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('foto')) {
			echo "<script>
					alert('Upload Gambar Gagal');
					window.location.href = '" . base_url() . "Admin/kota';
					</script>";
		} 
		else 
		{
			$result = $this->upload->data();
			$data_kota	= array(
				'nama_kota'	=> $kota,
				'negara'	=> $negara,
				'image' 	=> $result['file_name']
			);
			$cek = $this->Model_fids->select_condition('tabel_city', array('nama_kota' => $kota, 'negara' => $negara))->num_rows();
			if ($cek > 0) {
				echo "<script>
						alert('Kota Sudah Ada');
						window.location.href = '" . base_url() . "Admin/kota';
						</script>";
			} else {
				$hasil = $this->Model_fids->simpan_data("tabel_city", $data_kota);
				if ($hasil) {
					echo "<script>
						alert('Data Berhasil di Simpan');
						window.location.href = '" . base_url() . "Admin/kota';
						</script>";
				} else {
					echo "<script>
						alert('Data Gagal di Simpan');
						window.location.href = '" . base_url() . "Admin/kota';
						</script>";
				}
			}
		}
	}

	//edit kota
	public function EditKota()
	{
		$id		= $this->input->post("id");
		$kota1 	= $this->input->post("kota1");
		$kota2	= $this->input->post("kota2");
		$negara1	= $this->input->post("negara1");
		$negara2	= $this->input->post("negara2");

		$config['upload_path']          = './image/gambar_kota';
		$config['allowed_types']        = 'jpg|jpeg|png|PNG|JPEG|JPG';
		$config['max_size']             = 20440700;
		$lokasi_file    				= $_FILES['foto']['tmp_name'];
		$this->load->library('upload', $config);

		if (empty($lokasi_file)) {
			$data_kota	= array(
				'nama_kota'	=> $kota2,
				'negara'	=> $negara2
			);

			if($kota1 != $kota2 && $negara1!=$negara2)
			{
				$cek = $this->Model_fids->select_condition('tabel_city', array('nama_kota' => $kota, 'negara' => $negara))->num_rows();
			}
			else
			{
				$cek = $this->Model_fids->select_condition('tabel_city', $data_kota)->num_rows();
			}

			if ($cek > 0) {
				echo "<script>
						alert('Kota Sudah Ada');
						window.location.href = '" . base_url() . "Admin/kota';
						</script>";
			} else {
				$hasil = $this->Model_fids->update("tabel_city", array('id_kota' => $id), $data_kota);
				if ($hasil) {
					echo "<script>
						alert('Data Berhasil di Edit');
						window.location.href = '" . base_url() . "Admin/kota';
						</script>";
				} else {
					echo "<script>
						alert('Data Gagal di Edit');
						window.location.href = '" . base_url() . "Admin/kota';
						</script>";
				}
			}
		} else {
			if (!$this->upload->do_upload('foto')) {
				echo "<script>
					alert('Gagal Upload');
					window.location.href = '" . base_url() . "Admin/kota';
					</script>";
			} else 
			{
				$result = $this->upload->data();
				$data_kota	= array(
					'nama_kota'	=> $kota2,
					'negara'	=> $negara2,
					'image'		=> $result['file_name']
				);

				if($kota1 != $kota2 && $negara1!=$negara2)
				{
					$cek = $this->Model_fids->select_condition('tabel_city', array('nama_kota' => $kota, 'negara' => $negara))->num_rows();
				}
				else
				{
					$cek = $this->Model_fids->select_condition('tabel_city', $data_kota)->num_rows();
				}
				if ($cek > 0) {
					echo "<script>
							alert('Kota Sudah Ada');
							window.location.href = '" . base_url() . "Admin/kota';
							</script>";
				} else {
					$hasil = $this->Model_fids->update("tabel_city", array('id_kota' => $id), $data_kota);
					if ($hasil) {
						echo "<script>
							alert('Data Berhasil di Edit');
							window.location.href = '" . base_url() . "Admin/kota';
							</script>";
					} else {
						echo "<script>
							alert('Data Gagal di Edit');
							window.location.href = '" . base_url() . "Admin/kota';
							</script>";
					}
				}
			}
		}
		
	}

	public function HapusKota($id = '')
	{
		$hasil = $this->Model_fids->hapus('tabel_city', ['id_kota' => $id]);
		if ($hasil) {
			echo "<script>
						alert('Berhasil');
						window.location.href = '" . base_url() . "Admin/kota';
						</script>";
		} else {
			echo "<script>
						alert('Gagal');
						window.location.href = '" . base_url() . "Admin/kota';
						</script>";
		}
	}

	// Update status Informasi
	public function update_status($param = "")
	{
		date_default_timezone_set('Asia/Jakarta');
		$tanggal    = date("Y-m-d h:i:s");
		$id 	= $this->input->post('id');
		$nama_penerbangan	= $this->input->post('nama_penerbangan');
		$no_penerbangan		= $this->input->post('no_penerbangan');
		$kota	= $this->input->post('kota');
		$jadwal	= $this->input->post('jadwal');
		$delay	= $this->input->post('delay');
		$remark = $this->input->post('remark');
		$jenis	= $this->input->post('jenis');
		$gate	= $this->input->post('gate');

		//cek status
		$cek		= $this->Model_fids->select_condition('tabel_status', array('id' => $remark))->row();
		$status		= $cek->status_english;

		if ($status != 'DELAY') {
			$delay = null;
		}

		$data_log = array(
			'jenis'				=> $param,
			'tanggal'			=> $tanggal,
			'nama_penerbangan'	=> $nama_penerbangan,
			'no_penerbangan'	=> $no_penerbangan,
			'kota'				=> $kota,
			'jadwal'			=> $jadwal,
			'est'				=> $delay,
			'keterangan'		=> $remark
		);

		// var_dump($param);
		// Simpan ke Table Log
		$this->Model_fids->simpan_data("tabel_log", $data_log);

		if ($param == "keberangkatan") {
			$hasil = $this->Model_fids->update("tabel_keberangkatan", array('id' => $id), array('est' => $delay, 'remark' => $remark,'gate' => $gate));
			if ($hasil) {
				if ($jenis == 'dashboard') {
					echo "<script>
					alert('Data Berhasil di Edit');
					window.location.href = '" . base_url() . "Admin/index';
					</script>";
				} else {
					echo "<script>
					alert('Data Berhasil di Edit');
					window.location.href = '" . base_url() . "Admin/keberangkatan';
					</script>";
				}
			} else {
				if ($jenis == 'dashboard') {
					echo "<script>
					alert('Data Gagal di Edit');
					window.location.href = '" . base_url() . "Admin/index';
					</script>";
				} else {
					echo "<script>
						alert('Data Gagal di Edit');
						window.location.href = '" . base_url() . "Admin/keberangkatan';
						</script>";
				}
			}
		} else if ($param == "kedatangan") {
			$hasil = $this->Model_fids->update("tabel_kedatangan", array('id' => $id), array('est' => $delay, 'remark' => $remark));
			if ($hasil) {
				if ($jenis == 'dashboard') {
					echo "<script>
					alert('Data Berhasil di Edit');
					window.location.href = '" . base_url() . "Admin/index';
					</script>";
				} else {
					echo "<script>
						alert('Data Berhasil di Edit');
						window.location.href = '" . base_url() . "Admin/kedatangan';
						</script>";
				}
			} else {
				if ($jenis == 'dashboard') {
					echo "<script>
					alert('Data Gagal di Edit');
					window.location.href = '" . base_url() . "Admin/index';
					</script>";
				} else {
					echo "<script>
						alert('Data Gagal di Edit');
						window.location.href = '" . base_url() . "Admin/kedatangan';
						</script>";
				}
			}
		}
	}

	// JSON cek status
	public function cek_status()
	{
		$keterangan		= $_GET['keterangan'];
		$jenis			= $_GET['jenis'];
		$status			= $this->Model_fids->select_condition('tabel_status', array('jenis' => $jenis))->result();
		$cek			= $this->Model_fids->select_condition('tabel_status', array('id' => $keterangan))->row();

		$result = "
		<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
		<label for='gol'>Status</label>
			<div class='form-group'>
				<div class='form-line'>
					<select name='remark' id='keterangan' class='form-control' >";

		foreach ($status as $statuss) {
			if ($statuss->id == $keterangan) {
				$s = 'selected';
			} else {
				$s = '';
			}
			$result .= "<option value='" . $statuss->id . "' $s>" . $statuss->status_english . "</option>";
		}

		$result .= "</select></div></div></div>";
		$hasil = array('status' => $cek->status_english, 'result' => $result);
		echo json_encode($hasil);
	}

	public function change_status()
	{
		$keterangan		= $_GET['keterangan'];
		$cek			= $this->Model_fids->select_condition('tabel_status', array('id' => $keterangan))->row();
		$hasil 			= array('status' => $cek->status_english);
		echo json_encode($hasil);
	}
	//KEBERANGKATAN\
	public function keberangkatan()
	{
		$keberangkatan = [];
		$data['status'] = $this->Model_fids->select_condition('tabel_status', array('jenis' => 'Keberangkatan'))->result();
		$data['kota'] = $this->Model_fids->select_data('tabel_city')->result();
		$data['penerbangan'] = $this->Model_fids->select_data('tabel_flight')->result();
		$data['delay'] = $this->Model_fids->query("SELECT * FROM tabel_city AS a, tabel_flight AS b, tabel_keberangkatan AS c WHERE a.id_kota = c.id_city AND b.id_penerbangan = c.id_flight AND est!='' order by c.flight_number")->result();
		$result = $this->Model_fids->query("SELECT a.flight_number FROM tabel_keberangkatan as a, tabel_flight as b, tabel_city as c WHERE a.id_flight=b.id_penerbangan AND a.id_city=c.id_kota GROUP BY flight_number")->result();
		$data['result'] = $result;
		foreach ($result as $resultt) 
		{
			$keberangkatan["$resultt->flight_number"] = $this->Model_fids->query("SELECT * FROM tabel_city AS a, tabel_flight AS b, tabel_keberangkatan AS c WHERE a.id_kota = c.id_city AND b.id_penerbangan = c.id_flight AND c.flight_number='$resultt->flight_number'")->result();
		}
		$data['keberangkatan'] = $keberangkatan;
		$this->load->view('admin/keberangkatan', $data);
	}

	public function TampilTambahKeberangkatan()
	{
		$data['kota'] = $this->Model_fids->select_data('tabel_city')->result();
		$data['penerbangan'] = $this->Model_fids->select_data('tabel_flight')->result();
		$this->load->view('admin/TambahKeberangkatan', $data);
	}
	public function TambahKeberangkatan()
	{
		$temp_hasil = null;
		$id_penerbangan		= $this->input->post("id_penerbangan");
		$kode_penerbangan	= $this->input->post("kode_penerbangan");
		$id_kota			= $this->input->post("id_kota");
		$data_hari			= $this->input->post("hari");
		
		if ($data_hari == null) {
			echo "<script>
				alert('Pilih Hari');
				window.location.href = '" . base_url() . "Admin/keberangkatan';
				</script>";
		}
		$data_hari 			= explode(",", $data_hari);
		$jumlah_hari 		= count($data_hari);
		$temp_hasil = null;
		$hasil1 = null;
		$hasil2 = null;
		for ($i = 0; $i < $jumlah_hari; $i++) {
			$hari = $data_hari[$i];
			$data_waktu = "waktu_" . $data_hari[$i];
			$waktu = $this->input->post($data_waktu);
			if ($hari == "minggu") {
				$hari = 0;
			} else if ($hari == "senin") {
				$hari = 1;
			} else if ($hari == "selasa") {
				$hari = 2;
			} else if ($hari == "rabu") {
				$hari = 3;
			} else if ($hari == "kamis") {
				$hari = 4;
			} else if ($hari == "jumat") {
				$hari = 5;
			} else if ($hari == "sabtu") {
				$hari = 6;
			}
			$keberangkatan		= array(
				'id_flight'		=> $id_penerbangan,
				'flight_number' => $kode_penerbangan,
				'id_city'		=> $id_kota,
				'hari'			=> $hari,
				'waktu'			=> $waktu,
				'remark'		=> '2',
				'status'		=> '0',
				'est'			=> ''
			);
			if ($temp_hasil == null) {
				$hasil1 = true;
			} else {
				$hasil1 = $temp_hasil;
			}
			$hasil2 = $this->Model_fids->simpan_data('tabel_keberangkatan', $keberangkatan);
			$temp_hasil =  $hasil1 && $hasil2;
		}
		if ($temp_hasil == 1) {
			echo "<script>
				alert('Data Berhasil di Tambah');
				window.location.href = '" . base_url() . "Admin/keberangkatan';
				</script>";
		} else {
			echo "<script>
				alert('Data Gagal di Tambah');
				window.location.href = '" . base_url() . "Admin/keberangkatan';
				</script>";
		}
	}

	//Tampilan Edit Data KEBERANGKATAN
	// public function tampilEditKeberangkatan($id)
	// {
	// 	$data['kota'] = $this->Model_fids->select_data('tabel_city')->result();
	// 	$data['penerbangan'] = $this->Model_fids->select_data('tabel_flight')->result();
	// 	$data['keberangkatan'] = $this->Model_fids->select_condition('tabel_keberangkatan', array('id' => $id))->row();
	// 	$this->load->view('admin/editKeberangkatan', $data);
	// }

	//Edit/Update Data Keberangkatan
	public function EditKeberangkatan()
	{
		$temp_hasil 		= null;
		$id_penerbangan		= $this->input->post("id_penerbangan");
		$kode_penerbangan	= $this->input->post("kode_penerbangan");
		$kode				= $this->input->post("kode");
		$id_kota			= $this->input->post("id_kota");
		$data_hari			= $this->input->post("hari");
		$this->Model_fids->hapus('tabel_keberangkatan', ["flight_number" => $kode]);
		if ($data_hari == null) {
			echo "<script>
				alert('Pilih Hari');
				window.location.href = '" . base_url() . "Admin/keberangkatan';
				</script>";
		}
		$data_hari 			= explode(",", $data_hari);
		$jumlah_hari 		= count($data_hari);
		$temp_hasil 		= null;
		$hasil1 			= null;
		$hasil2 			= null;
		for ($i = 0; $i < $jumlah_hari; $i++) {
			$hari = $data_hari[$i];
			$data_waktu = "waktu_" . $data_hari[$i];
			$waktu = $this->input->post($data_waktu);
			if ($hari == "minggu") {
				$hari = 0;
			} else if ($hari == "senin") {
				$hari = 1;
			} else if ($hari == "selasa") {
				$hari = 2;
			} else if ($hari == "rabu") {
				$hari = 3;
			} else if ($hari == "kamis") {
				$hari = 4;
			} else if ($hari == "jumat") {
				$hari = 5;
			} else if ($hari == "sabtu") {
				$hari = 6;
			}
			$keberangkatan		= array(
				'id_flight'		=> $id_penerbangan,
				'flight_number' => $kode_penerbangan,
				'id_city'		=> $id_kota,
				'hari'			=> $hari,
				'waktu'			=> $waktu,
				'remark'		=> '2',
				'status'		=> '0',
				'est'			=> ''
			);
			if ($temp_hasil == null) {
				$hasil1 = true;
			} else {
				$hasil1 = $temp_hasil;
			}
			$hasil2 = $this->Model_fids->simpan_data('tabel_keberangkatan', $keberangkatan);
			$temp_hasil =  $hasil1 && $hasil2;
		}
		if ($temp_hasil == 1) {
			echo "<script>
				alert('Data Berhasil di Update');
				window.location.href = '" . base_url() . "Admin/keberangkatan';
				</script>";
		} else {
			echo "<script>
				alert('Data Gagal di Update');
				window.location.href = '" . base_url() . "Admin/keberangkatan';
				</script>";
		}
	}

	//DELETE KEBERANGKATAN
	public function DeleteKeberangkatan($id="")
	{
		$id = str_replace("%20", " ", $id);
		$hasil = $this->Model_fids->hapus("tabel_keberangkatan", array('flight_number' => $id));
		if ($hasil) {
			echo "<script>
					alert('Data Berhasil di Hapus');
					window.location.href = '" . base_url() . "Admin/keberangkatan';
					</script>";
		} else {
			echo "<script>
					alert('Data Gagal di Hapus');
					window.location.href = '" . base_url() . "Admin/keberangkatan';
					</script>";
		}
	}

	//KEDATANGAN
	public function kedatangan()
	{
		$kedatangan = [];
		//$data['status']	= array('SCHEDULE','DELAY','LANDING','CANCEL');
		$data['status'] = $this->Model_fids->select_condition('tabel_status', array('jenis' => 'Kedatangan'))->result();
		$data['kota'] = $this->Model_fids->select_data('tabel_city')->result();
		$data['penerbangan'] = $this->Model_fids->select_data('tabel_flight')->result();
		$data['delay'] = $this->Model_fids->query("SELECT * FROM tabel_city AS a, tabel_flight AS b, tabel_kedatangan AS c WHERE a.id_kota = c.id_city AND b.id_penerbangan = c.id_flight AND est!='' order by c.flight_number")->result();
		$result = $this->Model_fids->query("SELECT a.flight_number FROM tabel_kedatangan as a, tabel_flight as b, tabel_city as c WHERE a.id_flight=b.id_penerbangan AND a.id_city=c.id_kota GROUP BY flight_number")->result();
		$data['result'] = $result;
		foreach ($result as $resultt) {
			$kedatangan["$resultt->flight_number"] = $this->Model_fids->query("SELECT * FROM tabel_city AS a, tabel_flight AS b, tabel_kedatangan AS c WHERE a.id_kota = c.id_city AND b.id_penerbangan = c.id_flight AND c.flight_number='$resultt->flight_number'")->result();
		}
		$data['kedatangan'] = $kedatangan;
		$this->load->view('admin/kedatangan', $data);
	}

	public function TambahKedatangan()
	{
		$temp_hasil = null;
		$id_penerbangan		= $this->input->post("id_penerbangan");
		$kode_penerbangan	= $this->input->post("kode_penerbangan");
		$id_kota			= $this->input->post("id_kota");
		$data_hari			= $this->input->post("hari");
		if ($data_hari == null) {
			echo "<script>
				alert('Pilih Hari');
				window.location.href = '" . base_url() . "Admin/kedatangan';
				</script>";
		}
		$data_hari 			= explode(",", $data_hari);
		$jumlah_hari 		= count($data_hari);
		$temp_hasil = null;
		$hasil1 = null;
		$hasil2 = null;
		for ($i = 0; $i < $jumlah_hari; $i++) {
			$hari = $data_hari[$i];
			$data_waktu = "waktu_" . $data_hari[$i];
			$waktu = $this->input->post($data_waktu);
			if ($hari == "minggu") {
				$hari = 0;
			} else if ($hari == "senin") {
				$hari = 1;
			} else if ($hari == "selasa") {
				$hari = 2;
			} else if ($hari == "rabu") {
				$hari = 3;
			} else if ($hari == "kamis") {
				$hari = 4;
			} else if ($hari == "jumat") {
				$hari = 5;
			} else if ($hari == "sabtu") {
				$hari = 6;
			}
			$kedatangan	= array(
				'id_flight'		=> $id_penerbangan,
				'flight_number' => $kode_penerbangan,
				'id_city'		=> $id_kota,
				'hari'			=> $hari,
				'waktu'			=> $waktu,
				'remark'		=> '9',
				'status'		=> '0',
				'est'			=> ''
			);
			if ($temp_hasil == null) {
				$hasil1 = true;
			} else {
				$hasil1 = $temp_hasil;
			}
			$hasil2 = $this->Model_fids->simpan_data('tabel_kedatangan', $kedatangan);
			$temp_hasil =  $hasil1 && $hasil2;
		}
		if ($temp_hasil == 1) {
			echo "<script>
				alert('Data Berhasil di Tambah');
				window.location.href = '" . base_url() . "Admin/kedatangan';
				</script>";
		} else {
			echo "<script>
				alert('Data Gagal di Tambah');
				window.location.href = '" . base_url() . "Admin/kedatangan';
				</script>";
		}
	}

	// public function TampilEditKedatangan($id)
	// 
	// 	$data['kota'] = $this->Model_fids->select_data('tabel_city')->result();
	// 	$data['penerbangan'] = $this->Model_fids->select_data('tabel_flight')->result();
	// 	$data['kedatangan'] = $this->Model_fids->select_condition('tabel_kedatangan', array('id' => $id))->row();
	// 	$this->load->view('admin/editKedatangan', $data);
	// }

	//Edit/Update Kedatangan
	public function EditKedatangan()
	{
		$temp_hasil 		= null;
		$id_penerbangan		= $this->input->post("id_penerbangan");
		$kode_penerbangan	= $this->input->post("kode_penerbangan");
		$kode				= $this->input->post("kode");
		$id_kota			= $this->input->post("id_kota");
		$data_hari			= $this->input->post("hari");
		$this->Model_fids->hapus('tabel_kedatangan', ["flight_number" => $kode]);
		if ($data_hari == null) {
			echo "<script>
				alert('Pilih Hari');
				window.location.href = '" . base_url() . "Admin/kedatangan';
				</script>";
		}
		$data_hari 			= explode(",", $data_hari);
		$jumlah_hari 		= count($data_hari);
		$temp_hasil 		= null;
		$hasil1 			= null;
		$hasil2 			= null;
		for ($i = 0; $i < $jumlah_hari; $i++) {
			$hari = $data_hari[$i];
			$data_waktu = "waktu_" . $data_hari[$i];
			$waktu = $this->input->post($data_waktu);
			if ($hari == "minggu") {
				$hari = 0;
			} else if ($hari == "senin") {
				$hari = 1;
			} else if ($hari == "selasa") {
				$hari = 2;
			} else if ($hari == "rabu") {
				$hari = 3;
			} else if ($hari == "kamis") {
				$hari = 4;
			} else if ($hari == "jumat") {
				$hari = 5;
			} else if ($hari == "sabtu") {
				$hari = 6;
			}
			$kedatangan	= array(
				'id_flight'		=> $id_penerbangan,
				'flight_number' => $kode_penerbangan,
				'id_city'		=> $id_kota,
				'hari'			=> $hari,
				'waktu'			=> $waktu,
				'remark'		=> '9',
				'status'		=> '0',
				'est'			=> ''
			);
			if ($temp_hasil == null) {
				$hasil1 = true;
			} else {
				$hasil1 = $temp_hasil;
			}
			$hasil2 = $this->Model_fids->simpan_data('tabel_kedatangan', $kedatangan);
			$temp_hasil =  $hasil1 && $hasil2;
		}
		if ($temp_hasil == 1) {
			echo "<script>
				alert('Data Berhasil di Update');
				window.location.href = '" . base_url() . "Admin/kedatangan';
				</script>";
		} else {
			echo "<script>
				alert('Data Gagal di Update');
				window.location.href = '" . base_url() . "Admin/kedatangan';
				</script>";
		}
	}

	//DELETE KEDATANGAN
	public function DeleteKedatangan($id)
	{
		$id = str_replace("%20", " ", $id);
		$hasil = $this->Model_fids->hapus("tabel_kedatangan", array('flight_number' => $id));
		if ($hasil) {
			echo "<script>
					alert('Data Berhasil di Hapus');
					window.location.href = '" . base_url() . "Admin/kedatangan';
					</script>";
		} else {
			echo "<script>
					alert('Data Gagal di Hapus');
					window.location.href = '" . base_url() . "Admin/kedatangan';
					</script>";
		}
	}

	function loop_hari()
	{
		$hari 		 = $_GET['hari'];
		$hari 		 = explode(",", $hari);
		$jumlah_hari = count($hari);
		$html = "";
		for ($i = 0; $i < $jumlah_hari; $i++) {
			$html .= "
			<div>
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                    <label for='gol'>Waktu " . $hari[$i] . "</label>
                    <div class='form-group'>
						<div class='form-line'>
							<input type='time' name='waktu_" . $hari[$i] . "' id='waktu_" . $hari[$i] . "' class='form-control' placeholder='jadwal' required>
						</div>
					</div>
				</div>
            </div>
		  ";
		}

		$callback = array('hari' => $html);
		echo json_encode($callback);
	}

	function LoopHariEdit()
	{
		$hari 		 = $_GET['hari'];
		$waktu 		 = $_GET['waktu'];
		$hari 		 = explode(",", $hari);
		$waktu 		 = explode(",", $waktu);
		$jumlah_hari = count($hari);
		$html = "";
		for ($i = 0; $i < $jumlah_hari; $i++) {
			$html .= "
			<div>
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                    <label for='gol'>Waktu " . $hari[$i] . "</label>
                    <div class='form-group'>
						<div class='form-line'>
							<input type='time' name='waktu_" . $hari[$i] . "' id='waktu_" . $hari[$i] . "' value='" . $waktu[$i] . "' class='form-control' placeholder='jadwal' required>
						</div>
					</div>
				</div>
            </div>
		  ";
		}

		$callback = array('hari' => $html);
		echo json_encode($callback);
	}

	function loop_penerbangan()
	{
		$id_penerbangan = $_GET['id_penerbangan'];
		$cari = $this->Model_fids->select_data('tabel_flight')->result();
		$html = "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
					<label for='gol'>Penerbangan</label>
					<div class='form-group'>
					<div class='form-line'>
						<select name='id_penerbangan' id='id_penerbangan' class='form-control'>";
		foreach ($cari as $data) {
			if ($data->id_penerbangan == $id_penerbangan) {
				$s = 'selected';
			} else {
				$s = '';
			}
			$html .= "<option value='" . $data->id_penerbangan . "'" . $s . ">" . $data->nama_penerbangan . "</option>";
		}
		$html .= "</select></div></div></div>";

		$callback = array('penerbangan' => $html);
		echo json_encode($callback);
	}
	function loop_kota()
	{
		$id_kota = $_GET['id_kota'];
		$cari = $this->Model_fids->select_data('tabel_city')->result();
		$html = "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
					<label for='gol'>Kota Tujuan</label>
					<div class='form-group'>
					<div class='form-line'>
						<select name='id_kota' id='id_kota' class='form-control'>";
		foreach ($cari as $data) {
			if ($data->id_kota == $id_kota) {
				$s = 'selected';
			} else {
				$s = '';
			}
			$html .= "<option value='" . $data->id_kota . "'" . $s . ">" . $data->nama_kota . "</option>";
		}
		$html .= "</select></div></div></div>";

		$callback = array('kota' => $html);
		echo json_encode($callback);
	}

	public function HapusDelayKeberangkatan($id = '')
	{
		$hasil = $this->Model_fids->update("tabel_keberangkatan", ['id' => $id], ['est' => null]);
		if ($hasil) {
			echo "<script>
					window.location.href = '" . base_url() . "Admin/keberangkatan';
					</script>";
		} else {
			echo "<script>
					window.location.href = '" . base_url() . "Admin/keberangkatan';
					</script>";
		}
	}

	public function HapusDelayKedatangan($id = '')
	{
		$hasil = $this->Model_fids->update("tabel_kedatangan", ['id' => $id], ['est' => null]);
		if ($hasil) {
			echo "<script>
					window.location.href = '" . base_url() . "Admin/kedatangan';
					</script>";
		} else {
			echo "<script>
					window.location.href = '" . base_url() . "Admin/kedatangan';
					</script>";
		}
	}
	public function Iklan()
	{
		$data["iklan"] = $this->Model_fids->select_data("tabel_iklan")->result();
		$this->load->view("admin/iklan", $data);
	}
	public function SimpanIklan()
	{
		$config['upload_path']          = './images';
		$config['allowed_types']        = 'jpg|jpeg|png|PNG|JPEG|JPG';
		$config['max_size']             = 20440700;
		$lokasi_file    				= $_FILES['foto']['tmp_name'];
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('foto')) {
			//echo $this->upload->display_errors();
			echo "<script>
					alert('Gagal Upload');
					window.location.href = '" . base_url() . "Admin/Iklan';
					</script>";
		} else {
			$result = $this->upload->data();
			$data = array(
				'gambar' 	=> $result['file_name'],
				'link'		=> $this->input->post('link')
			);
			$cek = $this->Model_fids->select_condition('tabel_iklan', ['link' => $this->input->post('link')])->num_rows();
			if ($cek > 0) {
				echo "<script>
					alert('Iklan sudah ada');
					window.location.href = '" . base_url() . "Admin/Iklan';
					</script>";
			} else {
				$hasil = $this->Model_fids->simpan_data("tabel_iklan", $data);
				if ($hasil) {
					echo "<script>
					alert('Iklan Berhasil di Simpan');
					window.location.href = '" . base_url() . "Admin/Iklan';
					</script>";
				} else {
					echo "<script>
					alert('Iklan Gagal di Simpan');
					window.location.href = '" . base_url() . "Admin/Iklan';
					</script>";
				}
			}
		}
	}
	public function UpdateIklan()
	{
		$config['upload_path']          = './images';
		$config['allowed_types']        = 'jpg|jpeg|png|PNG|JPEG|JPG';
		$config['max_size']             = 20440700;
		$lokasi_file    				= $_FILES['foto']['tmp_name'];
		$this->load->library('upload', $config);
		$id	  = $this->input->post('id');
		$link = $this->input->post('link');
		$old_pict = $this->input->post('old_pict');
		if (empty($lokasi_file)) {
			$cek = $this->Model_fids->select_condition('tabel_iklan', ['link' => $link])->num_rows();
			if ($cek > 0) {
				echo "<script>
					alert('Link sudah ada');
					window.location.href = '" . base_url() . "Admin/Iklan';
					</script>";
			} else {
				$hasil = $this->Model_fids->update("tabel_iklan", ['id' => $id], ['link' => $link]);
				if ($hasil) {
					echo "<script>
					alert('Link Berhasil di Update');
					window.location.href = '" . base_url() . "Admin/Iklan';
					</script>";
				} else {
					echo "<script>
					alert('Link Gagal di Update');
					window.location.href = '" . base_url() . "Admin/Iklan';
					</script>";
				}
			}
		} else {
			unlink('./images/' . $old_pict);
			if (!$this->upload->do_upload('foto')) {
				echo "<script>
						alert('Gagal Upload');
						window.location.href = '" . base_url() . "Admin/iklan';
						</script>";
			} else {
				$result = $this->upload->data();
				$data = array(
					'gambar' 	=> $result['file_name'],
					'link'		=> $link
				);
				$cek = $this->Model_fids->select_condition('tabel_iklan', ['link' => $link, 'gambar' => $result['file_name']])->num_rows();
				if ($cek > 0) {
					echo "<script>
						alert('Iklan sudah ada');
						window.location.href = '" . base_url() . "Admin/iklan';
						</script>";
				} else {
					$hasil = $this->Model_fids->update("tabel_iklan", ['id' => $id], $data);
					if ($hasil) {
						echo "<script>
						alert('Iklan Berhasil di Update');
						window.location.href = '" . base_url() . "Admin/Iklan';
						</script>";
					} else {
						echo "<script>
						alert('Iklan Gagal di Update');
						window.location.href = '" . base_url() . "Admin/Iklan';
						</script>";
					}
				}
			}
		}
	}
	public function HapusIklan($id = '', $gambar = '')
	{
		unlink('./images/' . $gambar);
		$hasil = $this->Model_fids->hapus('tabel_iklan', array('id' => $id));
		if ($hasil) {
			echo "<script>
				alert('Iklan Berhasil di Hapus');
				window.location.href = '" . base_url() . "Admin/Iklan';
				</script>";
		} else {
			echo "<script>
				alert('Iklan Gagal di Hapus');
				window.location.href = '" . base_url() . "Admin/Iklan';
				</script>";
		}
	}
}
