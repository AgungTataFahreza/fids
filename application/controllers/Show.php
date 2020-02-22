<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Show extends CI_Controller
{
    public $JumlahBaris = 4;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_fids');
    }

    public function daftarMaskapai()
    {
        $date = date('w');
        $data['daftar'] = $this->Model_fids->query("SELECT * FROM tabel_flight as a, tabel_keberangkatan as b WHERE a.id_penerbangan=b.id_flight AND b.hari=$date GROUP BY b.id_flight")->result();
        $this->load->view('checkin/daftarMaskapai', $data);
    }

    public function dashboard($maskapai='')
    {
        if($maskapai!=='')
        {
        $maskapai = str_replace("%20", " ", $maskapai);
        $data['maskapai'] = $maskapai;
        $date = date('w');
        $data['checkin'] = $this->Model_fids->query("SELECT b.image, c.id, b.nama_penerbangan, c.flight_number, a.nama_kota,c.waktu, c.est, c.remark, c.status_gate, d.status_english, c.gate FROM tabel_city AS a, tabel_flight AS b, tabel_keberangkatan AS c, tabel_status as d WHERE a.id_kota = c.id_city AND b.nama_penerbangan= '$maskapai' AND b.id_penerbangan=c.id_flight AND b.id_penerbangan=c.id_flight AND c.hari=$date AND c.remark=d.id")->result();
        $this->load->view('checkin/index',$data);
        }
    }

    public function checkin($maskapai='',$penerbangan='')
    {
        date_default_timezone_set("Asia/Jakarta");
        $date = date("w");
        $this->Model_fids->query("UPDATE tabel_keberangkatan SET status_gate ='1' where hari=$date AND status_gate='0'");
        $this->Model_fids->query("UPDATE tabel_keberangkatan SET status_gate ='0' where hari!=$date");

        if($maskapai!=='' && $penerbangan!=='')
        {
            $gate = '';
            $maskapai = str_replace("%20", " ", $maskapai);
            $penerbangan = str_replace("%20", " ", $penerbangan);
            
            $data['checkin'] = $this->Model_fids->query("SELECT *, a.image as gambar_kota, b.image as gambar, c.id as id_keberangkatan FROM tabel_city AS a, tabel_flight AS b, tabel_keberangkatan AS c, tabel_status AS d WHERE a.id_kota = c.id_city AND b.nama_penerbangan= '$maskapai' AND c.flight_number='$penerbangan' AND b.id_penerbangan = c.id_flight AND c.hari=$date AND c.status_gate='1' AND c.remark=d.id")->row();
            
            $data['data_gambar'] = $this->Model_fids->query("SELECT * FROM tabel_keberangkatan as a, tabel_flight as b WHERE a.id_flight=b.id_penerbangan AND a.flight_number='$penerbangan' AND b.nama_penerbangan='$maskapai'")->row();
            $this->load->view('checkin/tampil.php',$data);
        }
    }

    public function aksi_status()
	{
		$id		= $_GET['id'];
		$cekStatus	= $_GET['cekStatus'];

        if ($cekStatus == '2' || $cekStatus == '' || $cekStatus == null) 
        {
			$ubah_status = '1';
		} else if ($cekStatus == '1') {
			$ubah_status = '2';
		}

		$hasil	= $this->Model_fids->update("tabel_keberangkatan", array('id' => $id), array('status_gate' => $ubah_status));
		$callback = array('hasil' => $hasil, 'status' =>$ubah_status);
		echo json_encode($callback);
    }

    // function loadStatus($id)
    // {
    //     $cekStatus = $this->Model_fids->select_condition('tabel_keberangkatan', ['id' => $id])->row();
    //     // if($_SESSION['status_gate']!=$cekStatus)
    //     // {
    //     //     $hasil  = 'berubah';
    //     //     $_SESSION['status_gate']=$cekStatus;	
    //     // }
    //     // else
    //     // {
    //     //     $hasil  = 'tetap';
    //     // }
    //     $hasil = $cekStatus->status_gate;
    //     $hasil = array('hasil' => $hasil);
	// 	echo json_encode($hasil);
    // }
    
}
