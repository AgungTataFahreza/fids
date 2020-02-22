<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_fids');
        date_default_timezone_set("Asia/Jakarta");
    }
    public function keberangkatan()
    {
        $date = date("w");
        // $keberangkatan = $this->Model_fids->query("SELECT * FROM tabel_city AS a, tabel_flight AS b, tabel_keberangkatan AS c, tabel_status AS d WHERE a.id_kota = c.id_city AND b.id_penerbangan = c.id_flight AND c.hari=$date AND c.status='1' AND c.remark=d.id AND c.waktu < DATE_ADD(CURTIME(), INTERVAL 3 HOUR) AND c.waktu > (CURTIME() - INTERVAL 3 HOUR)  ORDER BY c.waktu")->result();
        $keberangkatan = $this->Model_fids->query("SELECT * FROM tabel_city AS a, tabel_flight AS b, tabel_keberangkatan AS c, tabel_status AS d WHERE a.id_kota = c.id_city AND b.id_penerbangan = c.id_flight AND c.hari=$date AND c.status='1' AND c.remark=d.id ORDER BY c.waktu")->result();
        $keberangkatan = (array) $keberangkatan;
        for ($i = 0; $i < 10; $i++) {
            $data[] = " ";
        }
        //var_dump($data);
        $i = 0;
        foreach ($keberangkatan as $key) {
            if ($key->est == null || $key->est == '') {
                $est = " ";
            } else {
                $est = $key->est;
            }
            $data[$i] = $key->image . "," . $key->flight_number . "," . $key->nama_kota . "," . $key->waktu . "," . $est . "," . $key->status_english;
            $i++;
        }
        echo implode("#", $data);
    }
    public function kedatangan()
    {
        $date = date("w");
        // $kedatangan = $this->Model_fids->query("SELECT * FROM tabel_city AS a, tabel_flight AS b, tabel_kedatangan AS c, tabel_status AS d WHERE a.id_kota = c.id_city AND b.id_penerbangan = c.id_flight AND c.hari=$date AND c.status='1' AND c.remark=d.id AND c.waktu < DATE_ADD(CURTIME(), INTERVAL 3 HOUR) AND c.waktu > (CURTIME() - INTERVAL 3 HOUR) ORDER BY c.waktu")->result();
        $kedatangan = $this->Model_fids->query("SELECT * FROM tabel_city AS a, tabel_flight AS b, tabel_kedatangan AS c, tabel_status AS d WHERE a.id_kota = c.id_city AND b.id_penerbangan = c.id_flight AND c.hari=$date AND c.status='1' AND c.remark=d.id ORDER BY c.waktu")->result();
        $kedatangan = (array) $kedatangan;
        for ($i = 0; $i < 10; $i++) {
            $data[] = " ";
        }
        $i = 0;

        foreach ($kedatangan as $key) {
            if ($key->est == null || $key->est == '') {
                $est = " ";
            } else {
                $est = $key->est;
            }
            $data[$i] = $key->image . "," . $key->flight_number . "," . $key->nama_kota . "," . $key->waktu . "," . $est . "," . $key->status_english;
            $i++;
        }
        echo implode("#", $data);
    }
    public function JumlahIklan()
    {
        $jumlah = $this->Model_fids->select_data("tabel_iklan")->num_rows();
        echo $jumlah;
    }

    public function GetIklan($id = '')
    {
        $ArrayIklan = $this->Model_fids->select_data("tabel_iklan")->result();
        $ArrayIklan = (array) $ArrayIklan;
        // var_dump($ArrayIklan);
        for ($i = 0; $i < $id; $i++) {
            $hasil = $ArrayIklan[$i];
        }
        echo $hasil->gambar . "," . $hasil->link;
    }
}
