<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Overview extends CI_Controller
{
    public $JumlahBaris = 4;
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_fids');
    }
    public function index()
    {
        $_SESSION['running_text'] = $this->Model_fids->select_condition('running_text', ['status' => 1])->row('text');
        $this->load->view('main/index');
    }

    public function Kedatangan()
    {
        date_default_timezone_set("Asia/Jakarta");
        $date = date("w");
        $this->Model_fids->query("UPDATE tabel_kedatangan SET status ='1' where hari=$date AND status='0'");
        //update jadi 0 jika hari tidak sama
        $this->Model_fids->query("UPDATE tabel_kedatangan SET status='0' where hari!=$date");
        $data['cuaca'] = $this->Model_fids->select_data('tabel_cuaca')->result();
        $data['angin'] = $this->Model_fids->select_data('tabel_angin')->result();
        $data['JumlahBaris'] = $this->JumlahBaris;
        // $data['kedatangan'] = $this->Model_fids->query("SELECT * FROM tabel_city AS a, tabel_flight AS b, tabel_kedatangan AS c, tabel_status AS d WHERE a.id_kota = c.id_city AND b.id_penerbangan = c.id_flight AND c.hari=$date AND c.status='1' AND c.remark=d.id ORDER BY c.waktu")->result();
        $data['kedatangan'] = $this->Model_fids->query("SELECT * FROM tabel_city AS a, tabel_flight AS b, tabel_kedatangan AS c, tabel_status AS d WHERE a.id_kota = c.id_city AND b.id_penerbangan = c.id_flight AND c.hari=$date AND c.status='1' AND c.remark=d.id AND c.waktu < DATE_ADD(CURTIME(), INTERVAL 3 HOUR) AND c.waktu > (CURTIME() - INTERVAL 3 HOUR) ORDER BY c.waktu")->result();
        $data['text'] = $this->Model_fids->select_condition('running_text', ['status' => 1])->row();
        $_SESSION['running_text'] = $this->Model_fids->select_condition('running_text', ['status' => 1])->row('text');
        $this->load->view('main/Kedatangan', $data);
    }

    public function Keberangkatan()
    {
        date_default_timezone_set("Asia/Jakarta");
        $date = date("w");
        $this->Model_fids->query("UPDATE tabel_keberangkatan SET status ='1' where hari=$date AND status='0'");
        //update jadi 0 jika hari tidak sama
        $this->Model_fids->query("UPDATE tabel_keberangkatan SET status ='0' where hari!=$date");
        $data['cuaca'] = $this->Model_fids->select_data('tabel_cuaca')->result();
        $data['angin'] = $this->Model_fids->select_data('tabel_angin')->result();
        $data['JumlahBaris'] = $this->JumlahBaris;
        // $data['keberangkatan'] = $this->Model_fids->query("SELECT * FROM tabel_city AS a, tabel_flight AS b, tabel_keberangkatan AS c, tabel_status AS d WHERE a.id_kota = c.id_city AND b.id_penerbangan = c.id_flight AND c.hari=$date AND c.status='1' AND c.remark=d.id AND c.waktu < NOW() - INTERVAL 3 HOUR  ORDER BY c.waktu")->result();
        $data['keberangkatan'] = $this->Model_fids->query("SELECT * FROM tabel_city AS a, tabel_flight AS b, tabel_keberangkatan AS c, tabel_status AS d WHERE a.id_kota = c.id_city AND b.id_penerbangan = c.id_flight AND c.hari=$date AND c.status='1' AND c.remark=d.id AND c.waktu < DATE_ADD(CURTIME(), INTERVAL 3 HOUR) AND c.waktu > (CURTIME() - INTERVAL 3 HOUR)  ORDER BY c.waktu")->result();
        $data['text'] = $this->Model_fids->select_condition('running_text', ['status' => 1])->row();

        $data['running_text'] = $this->Model_fids->select_condition('running_text', ['status' => 1])->row('text');

        $this->load->view('main/Berangkat', $data);
    }

    function loadRunningText()
    {
        $cekRunningText = $this->Model_fids->select_condition('running_text', ['status' => 1])->row('text');
        if($_SESSION['running_text']!=$cekRunningText)
        {
            $hasil  = 'berubah';
            $_SESSION['running_text']=$cekRunningText;	
        }
        else
        {
            $hasil  = 'tetap';
        }
        $hasil = array('hasil' => $hasil);
		echo json_encode($hasil);
    }
}
