<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('partial/head') ?>
</head>

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
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                TAMBAH KEBERANGKATAN
                            </h2>
                        </div>
                        <div class="body">
                            <form action="<?php echo base_url() ?>Admin/TambahKeberangkatan" id="frmFileUpload" method="post" enctype="multipart/form-data">
                                <div class="body">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  ">
                                        <label for="gol">Penerbangan</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select name="id_penerbangan" id="" class="form-control">
                                                    <?php
                                                    foreach ($penerbangan as $penerbangann) {
                                                        ?>
                                                        <option value="<?= $penerbangann->id_penerbangan ?>"><?= $penerbangann->nama_penerbangan ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  ">
                                        <label for="gol">Kode Penerbangan</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="kode_penerbangan" class="form-control" placeholder="Kode Penerbangan">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  ">
                                        <label for="gol">Kota Tujuan</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select name="id_kota" id="" class="form-control">
                                                    <?php
                                                    foreach ($kota as $kotaa) {
                                                        ?>
                                                        <option value="<?= $kotaa->id_kota ?>"><?= $kotaa->nama_kota ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label for="gol">Hari</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <div class="demo-checkbox">
                                                    <input type="checkbox" onchange="tambah('tambah');loop_hari('tambah');" name="hari_senin" id="md_checkbox_1" class="filled-in chk-col-red">
                                                    <label for="md_checkbox_1">SENIN</label>
                                                    <input type="checkbox" onchange="tambah('tambah');loop_hari('tambah');" name="hari_selasa" id="md_checkbox_2" class="filled-in chk-col-pink">
                                                    <label for="md_checkbox_2">SELASA</label>
                                                    <input type="checkbox" onchange="tambah('tambah');loop_hari('tambah');" name="hari_rabu" id="md_checkbox_3" class="filled-in chk-col-purple">
                                                    <label for="md_checkbox_3">RABU</label>
                                                    <input type="checkbox" onchange="tambah('tambah');loop_hari('tambah');" name="hari_kamis" id="md_checkbox_4" class="filled-in chk-col-deep-purple">
                                                    <label for="md_checkbox_4">KAMIS</label>
                                                    <input type="checkbox" onchange="tambah('tambah');loop_hari('tambah');" name="hari_jumat" id="md_checkbox_5" class="filled-in chk-col-indigo">
                                                    <label for="md_checkbox_5">JUM'AT</label>
                                                    <input type="checkbox" onchange="tambah('tambah');loop_hari('tambah');" name="hari_sabtu" id="md_checkbox_6" class="filled-in chk-col-blue">
                                                    <label for="md_checkbox_6">SABTU</label>
                                                    <input type="checkbox" onchange="tambah('tambah');loop_hari('tambah');" name="hari_minggu" id="md_checkbox_7" class="filled-in chk-col-light-blue">
                                                    <label for="md_checkbox_7">MINGGU</label>
                                                    <input type="checkbox" id="md_checkbox_16" class="filled-in chk-col-deep-orange" onchange="toggle();tambah('tambah');loop_hari('tambah');">
                                                    <label for="md_checkbox_16">Pilih Semua</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="waktu_tambah">
                                    </div>
                                    <input type="hidden" id="hari_tambah" name="hari">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //edit -->
    </section>

    <?php $this->load->view('partial/js') ?>
</body>

</html>
<script src="<?php echo base_url('assets/jquery.min.js') ?>" type="text/javascript"></script>
<script language="JavaScript">
    //untuk setiap load modal

    function form(data) {
        console.log(data);
        if (data == "tambah") {
            $("#waktu_tambah").empty();
            document.getElementById("md_checkbox_1").checked = false;
            document.getElementById("md_checkbox_2").checked = false;
            document.getElementById("md_checkbox_3").checked = false;
            document.getElementById("md_checkbox_4").checked = false;
            document.getElementById("md_checkbox_5").checked = false;
            document.getElementById("md_checkbox_6").checked = false;
            document.getElementById("md_checkbox_7").checked = false;
        } else {
            $("#waktu_edit").empty();
            document.getElementById("md_checkbox_8").checked = false;
            document.getElementById("md_checkbox_9").checked = false;
            document.getElementById("md_checkbox_10").checked = false;
            document.getElementById("md_checkbox_11").checked = false;
            document.getElementById("md_checkbox_12").checked = false;
            document.getElementById("md_checkbox_13").checked = false;
            document.getElementById("md_checkbox_14").checked = false;
        }
    }

    //untuk load modal update
    function update(id_penerbangan, kode_penerbangan, id_kota, hari, waktu) {
        var hari_pecah = hari.split(",");
        var waktu_pecah = waktu.split(",");
        var hari_indo = [];
        var param = null;
        var daftar_hari = ['minggu', 'senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'];
        document.getElementById("id_penerbangan").value = id_penerbangan;
        document.getElementById("kode_penerbangan").value = kode_penerbangan;
        document.getElementById("kode").value = kode_penerbangan;
        document.getElementById("id_kota").value = id_kota;
        $.ajax({
            url: "<?php echo base_url(); ?>Admin/loop_penerbangan",
            data: '&id_penerbangan=' + id_penerbangan,
            success: function(data) {
                var hasil = JSON.parse(data);
                $.each(hasil, function(key, val) {
                    $('#penerbangan').html(hasil.penerbangan).show();
                });
            }
        });
        $.ajax({
            url: "<?php echo base_url(); ?>Admin/loop_kota",
            data: '&id_kota=' + id_kota,
            success: function(data) {
                var hasil = JSON.parse(data);
                $.each(hasil, function(key, val) {
                    $('#kota').html(hasil.kota).show();
                });
            }
        });

        //console.log(hari_pecah);
        for (var i = 0; i < hari_pecah.length; i++) {
            param = parseInt(hari_pecah[i]);
            for (var j = 0; j < daftar_hari.length; j++) {
                if (param == j) {
                    hari_indo.push(daftar_hari[j]);
                }
            }
            if (hari_pecah[i] == 0) {
                document.getElementById("md_checkbox_14").checked = true;
            } else {
                var cx = "md_checkbox_" + (parseInt(hari_pecah[i]) + 7);
                //console.log(parseInt(hari_pecah[i]) + 7);
                document.getElementById(cx).checked = true;
            }
        }
        document.getElementById("hari_edit").value = hari_indo;
        //console.log(hari_indo[0]);
        loop(waktu);
    }

    function loop(time) {
        var hari = document.getElementById('hari_edit').value;
        //console.log(hari);
        $.ajax({
            url: "<?php echo base_url(); ?>Admin/LoopHariEdit",
            data: '&hari=' + hari + '&waktu=' + time,
            success: function(data) {
                var hasil = JSON.parse(data);
                $.each(hasil, function(key, val) {
                    $('#waktu_edit').html(hasil.hari).show();
                });
            }
        });
    }

    //untuk generate form jam berdasarkan hari
    function loop_hari(param) {
        if (param == "tambah") {
            var hari = document.getElementById('hari_tambah').value;
        } else {
            var hari = document.getElementById('hari_edit').value;
        }
        //console.log(hari);
        $.ajax({
            url: "<?php echo base_url(); ?>Admin/loop_hari",
            data: '&hari=' + hari,
            success: function(data) {
                var hasil = JSON.parse(data);
                $.each(hasil, function(key, val) {
                    if (param == "tambah") {
                        $('#waktu_tambah').html(hasil.hari).show();
                    } else {
                        $('#waktu_edit').html(hasil.hari).show();
                    }
                });
            }
        });
    }

    //untuk cek/uncheck all hari
    function toggle() {
        var a = null;
        var b = null;
        if (a == false) {
            b = false;
        } else {
            b = true;
        }
        document.getElementById("md_checkbox_1").checked = b;
        document.getElementById("md_checkbox_2").checked = b;
        document.getElementById("md_checkbox_3").checked = b;
        document.getElementById("md_checkbox_4").checked = b;
        document.getElementById("md_checkbox_5").checked = b;
        document.getElementById("md_checkbox_6").checked = b;
        document.getElementById("md_checkbox_7").checked = b;
    }

    //untuk menambah hari ke array
    function tambah(param) {
        var data = [];
        var senin, selasa, rabu, kamis, jumat, sabtu, minggu = null;
        if (param == "tambah") {
            var senin = document.getElementById("md_checkbox_1").checked;
            var selasa = document.getElementById("md_checkbox_2").checked;
            var rabu = document.getElementById("md_checkbox_3").checked;
            var kamis = document.getElementById("md_checkbox_4").checked;
            var jumat = document.getElementById("md_checkbox_5").checked;
            var sabtu = document.getElementById("md_checkbox_6").checked;
            var minggu = document.getElementById("md_checkbox_7").checked;
        } else {
            var senin = document.getElementById("md_checkbox_8").checked;
            var selasa = document.getElementById("md_checkbox_9").checked;
            var rabu = document.getElementById("md_checkbox_10").checked;
            var kamis = document.getElementById("md_checkbox_11").checked;
            var jumat = document.getElementById("md_checkbox_12").checked;
            var sabtu = document.getElementById("md_checkbox_13").checked;
            var minggu = document.getElementById("md_checkbox_14").checked;
        }
        if (senin == true) {
            data.push("senin");
        }
        if (selasa == true) {
            data.push("selasa");
        }
        if (rabu == true) {
            data.push("rabu");
        }
        if (kamis == true) {
            data.push("kamis");
        }
        if (jumat == true) {
            data.push("jumat");
        }
        if (sabtu == true) {
            data.push("sabtu");
        }
        if (minggu == true) {
            data.push("minggu");
        }
        //console.log(data);
        if (param == "tambah") {
            document.getElementById("hari_tambah").value = data;
        } else {
            document.getElementById("hari_edit").value = data;
        }
    }
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#keterangan').change(function() {
            var keterangan = document.getElementById('keterangan').value;
            $.ajax({
                url: "<?php echo base_url(); ?>Admin/change_status",
                data: '&keterangan=' + keterangan,
                success: function(data) {
                    var hasil = JSON.parse(data);
                    $.each(hasil, function(key, val) {
                        var status = hasil.status;
                        if (status == 'DELAY') {
                            $("#est").show();
                        } else {
                            $("#est").hide();
                        }
                    });
                }
            });

        });
    });
</script>
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