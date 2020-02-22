<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('partial/head') ?>
    <style>
        .card .body .col-xs-12,
        .card .body .col-sm-12,
        .card .body .col-md-12,
        .card .body .col-lg-12 {
            margin-bottom: 0px;
        }
    </style>
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
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Edit Keberangkatan
                                </h2>
                            </div>
                            <form action="<?php echo base_url() ?>Admin/EditKeberangkatan" id="frmFileUpload" method="post" enctype="multipart/form-data">
                                <div class="body">
                                    <input type="hidden" name="id" value="<?= $keberangkatan->id ?>">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  ">
                                        <label for="gol">Penerbangan</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select name="id_penerbangan" id="" class="form-control">
                                                    <?php
                                                    foreach ($penerbangan as $penerbangann) {
                                                        if ($penerbangann->id == $keberangkatan->id_flight) {
                                                            $s = 'selected';
                                                        } else {
                                                            $s = '';
                                                        }
                                                        ?>
                                                        <option value="<?= $penerbangann->id ?>" <?= $s ?>><?= $penerbangann->nama_penerbangan ?> <?= $penerbangann->flight_number ?></option>
                                                    <?php } ?>
                                                </select>
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
                                                        if ($kotaa->id == $keberangkatan->id_city) {
                                                            $s = 'selected';
                                                        } else {
                                                            $s = '';
                                                        }
                                                        ?>
                                                        <option value="<?= $kotaa->id ?>" <?= $s ?>><?= $kotaa->nama_kota ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <label for="gol">Tanggal</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="date" name="tanggal" value="<?= $keberangkatan->tanggal ?>" class="form-control" placeholder="jadwal">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <label for="gol">Waktu</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="time" name="waktu" value="<?= $keberangkatan->waktu ?>" class="form-control" placeholder="jadwal">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  ">
                                        <label for="gol">Keterangan</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select name="keterangan" id="keterangan" class="form-control">
                                                    <option value="PINTU DIBUKA" <?php if ($keberangkatan->remark == 'PINTU DIBUKA') {
                                                                                        echo 'selected';
                                                                                    } ?>>PINTU DIBUKA
                                                    </option>
                                                    <option value="TERLAMBAT" <?php if ($keberangkatan->remark == 'TERLAMBAT') {
                                                                                    echo 'selected';
                                                                                } ?>>TERLAMBAT
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="est" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label for="gol">EST</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="time" value="<?= $keberangkatan->est ?>" name="est" class="form-control" placeholder="Est">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="<?= base_url() ?>Admin/keberangkatan" class="btn btn-light">Batal</a>
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
<script src="<?php echo base_url('assets/jquery.min.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        a = document.getElementById('keterangan').value;
        if (a == 'TERLAMBAT') {
            $("#est").show();
        } else {
            $("#est").hide();
        }

        $('#keterangan').change(function() {
            a = document.getElementById('keterangan').value;
            if (a == 'TERLAMBAT') {
                $("#est").show();
            } else {
                $("#est").hide();
            }
        });
    });
</script>