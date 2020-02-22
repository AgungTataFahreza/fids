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
    <div class="page-loader-wrapper">
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
    </div>
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
                                    Edit Penerbangan
                                </h2>
                            </div>
                            <form action="<?php echo base_url() ?>Admin/EditPenerbangan" id="frmFileUpload" method="post" enctype="multipart/form-data">
                                <div class="body">
                                    <input type="hidden" name="id" value="<?= $penerbangan->id_penerbangan ?>" class="form-control">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label for="gol">Penerbangan</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="nama" class="form-control" placeholder="Nama Penerbangan" value="<?= $penerbangan->nama_penerbangan ?>">
                                                <input type="hidden" name="nama2" class="form-control" placeholder="Nama Penerbangan" value="<?= $penerbangan->nama_penerbangan ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <img id="imgView" src="<?= base_url() ?>image/<?= $penerbangan->image ?>" width="150" height="50">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label for="LNK">Logo</label>
                                        <div class="fallback">
                                            <input name="foto" type="file" multiple>
                                            <br>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="<?php echo base_url() ?>Admin/penerbangan" class="btn btn-light">Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php $this->load->view('partial/js') ?>
    <!-- <script src="<?= base_url() ?>plugins/jquery/jquery.min.js"></script> -->

    <!-- Bootstrap Core Js -->
    <!-- <script src="<?= base_url() ?>plugins/bootstrap/js/bootstrap.js"></script> -->

    <!-- Select Plugin Js -->
    <!-- <script src="<?= base_url() ?>plugins/bootstrap-select/js/bootstrap-select.js"></script> -->

    <!-- Slimscroll Plugin Js -->
    <!-- <script src="<?= base_url() ?>plugins/jquery-slimscroll/jquery.slimscroll.js"></script> -->

    <!-- Waves Effect Plugin Js -->
    <!-- <script src="<?= base_url() ?>plugins/node-waves/waves.js"></script> -->

    <!-- Autosize Plugin Js -->
    <!-- <script src="<?= base_url() ?>plugins/autosize/autosize.js"></script> -->

    <!-- Moment Plugin Js -->
    <!-- <script src="<?= base_url() ?>plugins/momentjs/moment.js"></script> -->

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <!-- <script src="<?= base_url() ?>plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script> -->

    <!-- Bootstrap Datepicker Plugin Js -->
    <!-- <script src="<?= base_url() ?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script> -->

    <!-- Custom Js -->
    <!-- <script src="<?= base_url() ?>js/admin.js"></script> -->
    <!-- <script src="<?= base_url() ?>js/pages/forms/basic-form-elements.js"></script> -->

    <!-- Demo Js -->
    <!-- <script src="<?= base_url() ?>js/demo.js"></script> -->
</body>

</html>
