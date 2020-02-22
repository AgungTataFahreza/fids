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
            <!-- <div class="block-header">
                <h2>DASHBOARD</h2>
            </div> -->
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>IKLAN</h2>
                            <br>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#tambah"><i class="material-icons">add</i> Tambah iklan</button>
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
                                                <center>Iklan</center>
                                            </th>
                                            <th>
                                                <center>Link</center>
                                            </th>
                                            <th>
                                                <center>Aksi</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($iklan as $data) {
                                            ?>
                                            <tr align="center">
                                                <td><?= $no ?>.</td>
                                                <td>
                                                    <img src="<?=base_url()?>images/<?= $data->gambar ?>" width="150" height="50">
                                                </td>
                                                <td><?= $data->link ?></td>
                                                <td>
                                                    <button data-toggle="modal" data-target="#edit" onclick="update('<?= $data->id ?>','<?= $data->gambar ?>','<?= base_url('images/iklan/') . $data->gambar ?>','<?= $data->link ?>');" class="btn btn-warning"><i class="material-icons">edit</i></button>
                                                    <a href="<?= base_url() ?>Admin/HapusIklan/<?= $data->id ?>/<?= $data->gambar ?>" class="btn btn-danger"><i class="material-icons">delete</i></a>
                                                </td>
                                            </tr>
                                        <?php
                                            $no++;
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="tambah" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="judulModal">Tambah Iklan</h4>
                    </div>
                    <div class="modal-body">
                        <div class="body">
                            <form action="<?= base_url() ?>Admin/SimpanIklan" id="formBackground" method="post" enctype="multipart/form-data">
                                <div class="body">
                                    <div id="tambahAdd" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label for="gol">Iklan</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="file" name="foto" class="form-control">
                                            </div>
                                        </div>
                                        <label for="gol">Link</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="link" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                                </div>
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

        <div class="modal fade" id="edit" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="judulModal">Update Iklan</h4>
                    </div>
                    <div class="modal-body">
                        <div class="body">
                            <form action="<?= base_url() ?>Admin/UpdateIklan" id="formBackground" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" id="id">
                                <input type="hidden" name="old_pict" id="old_pict">
                                <div class="body">
                                    <div id="tambahAdd" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label for="gol">Iklan</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="file" name="foto" class="form-control">
                                            </div>
                                        </div>
                                        <img id="imgView2" src="" alt="" width="150" height="150">
                                        <label for="gol">Link</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="link" name="link" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                                </div>
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
<script src="<?php //echo base_url('assets/jquery.min.js') 
                ?>" type="text/javascript"></script>
<script type="text/javascript">
    function update($id, $old_pict, $gambar, $link) {
        $("#id").val($id);
        document.getElementById("old_pict").value = $old_pict;
        document.getElementById("imgView2").src = $gambar;
        $("#link").val($link);
    }
    $("#inputFile2").change(function(event) {
        fadeInAdd();
        getURL(this);
    });

    $("#inputFile2").on('click', function(event) {
        fadeInAdd();
    });

    function getURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var filename = $("#inputFile2").val();
            filename = filename.substring(filename.lastIndexOf('\\') + 1);
            reader.onload = function(e) {
                debugger;
                $('#imgView2').attr('src', e.target.result);
                $('#imgView2').hide();
                $('#imgView2').fadeIn(500);
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