<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('partial/head') ?>
    <style>

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
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                PENERBANGAN
                            </h2>
                            <br>
                            <button type="button" class="btn btn-primary waves-effect m-r-20" data-toggle="modal" data-target="#tambah"><i class="material-icons">add</i><b>Tambah</button>
                            <!-- <a href="<?= base_url() ?>Admin/tambahPenerbangan" class="btn btn-primary waves-effect m-r-20"><i class="material-icons">add</i>Tambah</a> -->
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>
                                                <center>No.</center>
                                            </th>
                                            <th>
                                                <center>Penerbangan</center>
                                            </th>
                                            <th>
                                                <center>Aksi</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($penerbangan as $data) {
                                            ?>
                                            <tr align="center">
                                                <td><?= $no ?>.</td>
                                                <td>
                                                    <img src="<?= base_url() ?>image/<?= $data->image ?>" width="150" height="50">
                                                </td>
                                                <td>
                                                    <a href="<?= base_url() ?>Admin/TampilEditPenerbangan/<?= $data->id_penerbangan ?>" class="btn btn-warning text-light" title="Edit Penerbangan"><i class="material-icons">edit</i> Edit</a>
                                                    <a href="<?= base_url() ?>Admin/HapusPenerbangan/<?= $data->id_penerbangan ?>" class="btn btn-danger text-light" title="Edit Penerbangan"><i class="material-icons">delete</i> Hapus</a>
                                                </td>
                                            </tr>
                                        <?php
                                            $no++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Small Size -->
        <div class="modal fade" id="tambah" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Tambah Jadwal Penerbangan</h4>
                    </div>
                    <div class="modal-body">
                        <div class="body">
                            <form action="<?= base_url() ?>Admin/tambahPenerbangan" id="frmFileUpload" method="post" enctype="multipart/form-data">
                                <div class="body">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  ">
                                        <label for="gol">Penerbangan</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="nama" class="form-control" placeholder="Nama Penerbangan">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <img id="imgView" src="" alt="Pilih Foto" width="150" height="50">
                                    <br>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label for="LNK">Logo</label>
                                        <div class="fallback">
                                            <input id="inputFile" name="foto" type="file" multiple />
                                            <br>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="button" data-dismiss="modal" class="btn btn-light">Batal</button>
                            </form>
                        </div>
                    </div>
                    <!-- <div class="modal-footer">
                        <button type="button" class="btn" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save</button>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
    <?php $this->load->view('partial/js') ?>
</body>

</html>
<!-- <script src="<?php //echo base_url('assets/jquery.min.js') 
                    ?>" type="text/javascript"></script> -->
<script>
    $("#inputFile").change(function(event) {
        fadeInAdd();
        getURL(this);
    });

    $("#inputFile").on('click', function(event) {
        fadeInAdd();
    });

    function getURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var filename = $("#inputFile").val();
            filename = filename.substring(filename.lastIndexOf('\\') + 1);
            reader.onload = function(e) {
                debugger;
                $('#imgView').attr('src', e.target.result);
                $('#imgView').hide();
                $('#imgView').fadeIn(500);
                $('.custom-file-label').text(filename);
            }
            reader.readAsDataURL(input.files[0]);
        }
        $(".alert").removeClass("loadAnimate").hide();
    }

    function fadeInAdd() {
        fadeInAlert();
    }

    function fadeInAlert(text) {
        $(".alert").text(text).addClass("loadAnimate");
    }
</script>
