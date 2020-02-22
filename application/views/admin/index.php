<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('partial/head') ?>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
</head>
<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input { 
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: #2196F3;
        /* background-color: #FF0000; */
    }

    input:checked + .slider:before 
    {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

    .slider.box
    {
        border-radius: 0px;
    }

    .slider.box:before
    {
        border-radius: 50%;
        background-color: #FFFF00;
    }

    input:checked + .slider.box {
        background-color: #2196F3;
    }

    .btn-biru
    {
        background: #1A385A;
        color : #FFF;
    }
    .btn:hover, .btn:focus, .btn.focus {
        color: #FFF;
        text-decoration: none;
    }

</style>
<body class="theme-brown">
    <!-- Page Loader -->
    <!-- <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div> -->
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <?php $this->load->view('partial/topbar') ?>
    <!-- #Top Bar -->
    <?php $this->load->view('partial/sidebar') ?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a href="<?= base_url() ?>Admin/penerbangan">
                        <div class="info-box bg-pink hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">airplanemode_active</i>
                            </div>
                            <div class="content">
                                <div class="text">PENERBANGAN</div>
                                <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a href="<?= base_url() ?>Admin/kota">
                        <div class="info-box bg-cyan hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">location_city</i>
                            </div>
                            <div class="content">
                                <div class="text">KOTA</div>
                                <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a href="<?= base_url() ?>Admin/keberangkatan">
                        <div class="info-box bg-light-green hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">flight_takeoff</i>
                            </div>
                            <div class="content">
                                <div class="text">KEBERANGKATAN</div>
                                <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a href="<?= base_url() ?>Admin/kedatangan">
                        <div class="info-box bg-orange hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">flight_land</i>
                            </div>
                            <div class="content">
                                <div class="text">KEDATANGAN</div>
                                <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- #END# Widgets -->
            <!-- CPU Usage -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                KEBERANGKATAN
                            </h2>
                            <h5><?= hari_indo(date('w')) . ", " . date("d-m-Y") ?></h5>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th colspan="2" rowspan="2">
                                            <center>Penerbangan</center>
                                        </th>
                                        <th rowspan="2">
                                            <center>Kota Tujuan</center>
                                        </th>
                                        <th rowspan="2">
                                            <center>Jadwal</center>
                                        </th>
                                        <th rowspan="2">
                                            <center>Est</center>
                                        </th>
                                        <th rowspan="2">
                                            <center>Keterangan</center>
                                        </th>
                                        <th rowspan="2">
                                            <center>Gate</center>
                                        </th>
                                        <th colspan="3" width="15%">
                                            <center>Aksi</center>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th><center>Status</center></th>
                                        <th><center>Tampilan Utama</center></th>
                                        <th><center>Tampilan Checkin</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($keberangkatan as $data) {
                                        ?>
                                        <tr align="center">
                                            <td>
                                                <img src=" <?= base_url() ?>image/<?= $data->image ?>" width="150" height="50">
                                            </td>
                                            <td><?= $data->flight_number ?></td>
                                            <td><?= $data->nama_kota ?></td>
                                            <td><?= $data->waktu ?></td>
                                            <td><?= $data->est ?></td>
                                            <td><?= $data->status_english ?></td>
                                            <td><?= $data->gate?></td>
                                            <td>
                                                <button title="Ubah Status" class="btn btn-success btn-xs waves-effect" data-toggle="modal" data-target="#status" onclick="status('Keberangkatan','<?= $data->id ?>','<?= $data->nama_penerbangan ?>','<?= $data->flight_number ?>','<?= $data->nama_kota ?>','<?= $data->waktu ?>','<?= $data->est ?>','<?= $data->remark ?>','<?= $data->gate ?>');" ><i class="material-icons">info</i> STATUS</button><br>
                                            </td>
                                            <td>
                                                <label class="switch">
                                                <input type="checkbox" value="<?=$data->status?>" id="status_keberangkatan" name="status" onchange="aksi_status('keberangkatan','<?=$data->id ?>','<?=$data->status ?>');" <?php if($data->status == '1') echo 'checked'; ?>>
                                                <span class="slider round"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <label class="switch">
                                                <input type="checkbox" value="<?=$data->status_gate?>" id="status_gate" name="status_gate" onchange="aksi_status_gate('<?=$data->id ?>','<?=$data->status_gate ?>');" <?php if($data->status_gate == '1') echo 'checked'; ?>>
                                                <span class="slider box"></span>
                                                </label>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# CPU Usage -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                KEDATANGAN
                            </h2>
                            <h5><?= hari_indo(date('w')) . "," . date("d-m-Y") ?></h5>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th colspan="2">
                                            <center>Penerbangan</center>
                                        </th>
                                        <th>
                                            <center>Kota Asal</center>
                                        </th>
                                        <th>
                                            <center>Jadwal</center>
                                        </th>
                                        <th>
                                            <center>Est</center>
                                        </th>
                                        <th>
                                            <center>Keterangan</center>
                                        </th>
                                        <th colspan="3" width="15%">
                                            <center>Aksi</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($kedatangan as $data) {
                                        ?>
                                        <tr align="center">
                                            <td>
                                                <img src=" <?= base_url() ?>image/<?= $data->image ?>" width="150" height="50">
                                            </td>
                                            <td><?= $data->flight_number ?></td>
                                            <td><?= $data->nama_kota ?></td>
                                            <td><?= $data->waktu ?></td>
                                            <td><?= $data->est ?></td>
                                            <td><?= $data->status_english ?></td>
                                            <td>
                                                <button class="btn btn-success btn-xs waves-effect" data-toggle="modal" data-target="#status" onclick="status('Kedatangan','<?= $data->id ?>','<?= $data->nama_penerbangan ?>','<?= $data->flight_number ?>','<?= $data->nama_kota ?>','<?= $data->waktu ?>','<?= $data->est ?>','<?= $data->remark ?>');"><i class="material-icons">info</i> STATUS</button><br>
                                            </td>
                                            <td>
                                                <label class="switch">
                                                <input type="checkbox" value="<?=$data->status?>" id="status_kedatangan" name="status" onclick="aksi_status('kedatangan','<?=$data->id ?>', '<?=$data->status ?>');" <?php if($data->status == '1') echo 'checked'; ?>>
                                                <span class="slider round"></span>
                                                </label>
                                            </td>
                                            <td></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="status" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="smallModalLabel">Status</h4>
                    </div>
                    <div class="modal-body">
                        <div class="body">
                            <form action="" id="formStatus" method="post">
                                <div class="body">
                                    <input type="hidden" id="id_status" name="id">
                                    <input type="hidden" value="dashboard" name="jenis">
                                    <div id="" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label for="gol">Penerbangan</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input readonly type="text" name="nama_penerbangan" id="penerbangan_status" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div id="" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label for="gol">No. Penerbangan</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input readonly  type="text" name="no_penerbangan" id="no_penerbangan_status" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div id="" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label for="gol">Tujuan</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input readonly type="text" name="kota" id="kota_status" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div id="add" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label for="gol">Jadwal Penerbangan</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input readonly type="time" name="jadwal" id="jam_status" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div id="status_keterangan">
                                    </div>

                                    <div id="est" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label for="gol">Est</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="time" id="delay" name="delay" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div id="div_gate" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label for="gol">Gate</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input required type="text" placeholder="Gate" name="gate" id="gate" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php $this->load->view('partial/js') ?>
</body>

</html>
<?php
function hari_indo($hari = "")
{
    if ($hari == 0) {
        $hari = "Minggu";
    } else if ($hari == 1) {
        $hari = "Senin";
    } else if ($hari == 2) {
        $hari = "Selasa";
    } else if ($hari == 3) {
        $hari = "Rabu";
    } else if ($hari == 4) {
        $hari = "Kamis";
    } else if ($hari == 5) {
        $hari = "Jum'at";
    } else if ($hari == 6) {
        $hari = "Sabtu";
    }
    return $hari;
}
?>

<script src="<?php echo base_url('assets/jquery.min.js')?>" type="text/javascript"></script>
<script type="text/javascript">
    
    function aksi_status(param,id,cekStatus) 
    {
        if (param=="keberangkatan") 
        {
            var informasi_tabel = "tabel_keberangkatan";
        } 
        else 
        {
            var informasi_tabel = "tabel_kedatangan";
        }

        $.ajax({
            url: "<?php echo base_url(); ?>Admin/aksi_status",
            data: '&id=' + id + '&informasi_tabel=' + informasi_tabel + '&cekStatus=' + cekStatus,
            success: function(data) 
            {			
                var hasil = JSON.parse(data);
                $.each(hasil, function(key, val)
                {
                    document.location.reload(true);
                }
                );
            }
            });
    }

    function status(jenis, id, flight, flight_number, city, time, est, keterangan,gate) 
    {
        document.getElementById("id_status").value = id;
        document.getElementById("penerbangan_status").value = flight;
        document.getElementById("no_penerbangan_status").value = flight_number;
        document.getElementById("kota_status").value = city;
        document.getElementById("jam_status").value = time;
        document.getElementById("delay").value = est;
        document.getElementById("gate").value = gate;

        var x = document.getElementById("formStatus");

        if(jenis=='Keberangkatan')
        {
            x.action = "<?= base_url() ?>Admin/update_status/keberangkatan";
            $("#div_gate").show();
        }
        else if(jenis=='Kedatangan')
        {
            x.action = "<?= base_url() ?>Admin/update_status/kedatangan";
            $("#div_gate").hide();
        }
        
        $.ajax({
            url: "<?php echo base_url(); ?>Admin/cek_status",
            data: '&keterangan='+keterangan + '&jenis='+jenis,
            success: function(data) 
            {
                var hasil = JSON.parse(data);
                $.each(hasil, function(key, val) 
                {
                    $('#status_keterangan').html(hasil.result).show();
                    var status = hasil.status;
                    if (status == 'DELAY') 
                    {
                        $("#est").show();
                    } else 
                    {
                        $("#est").hide();
                    }
                });
            }
        });
    }

    $(document).ready(function() 
    {
        // setInterval(function() 
        // {
        //     document.location.reload(true);
        // }, 5000);
        
        $('#status_keterangan').change(function() {
            var keterangan = document.getElementById('keterangan').value;
            $.ajax({
            url: "<?php echo base_url(); ?>Admin/change_status",
            data: '&keterangan=' + keterangan,
            success: function(data) {
                var hasil = JSON.parse(data);
                $.each(hasil, function(key, val) {
                    // alert("HAI");
                    var status = hasil.status;
                    if (status == 'DELAY') 
                    {
                        $("#est").show();
                    } else 
                    {
                        $("#est").hide();
                    }
                });
            }
        });
        });
    });

    function aksi_status_gate(id,cekStatus) 
    {
        $.ajax({
            url: "<?php echo base_url(); ?>Admin/aksi_status_gate",
            data: '&id=' + id + '&cekStatus=' + cekStatus,
            success: function(data) 
            {			
                var hasil = JSON.parse(data);
                $.each(hasil, function(key, val)
                {
                    document.location.reload(true);
                }
            );
            }
            });
    }
</script>
