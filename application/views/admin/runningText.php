<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('partial/head') ?>
    <style>

    </style>
</head>

<body class="theme-brown">
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
                                Running Text
                            </h2>
                            <br>
                            <button type="button" class="btn btn-primary waves-effect m-r-20" data-toggle="modal" data-target="#tambah" onclick="tambah();"><i class="material-icons">add</i><b>Tambah</button>
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
                                                <center>Text</center>
                                            </th>
                                            <th>
                                                <center>Status</center>
                                            </th>
                                            <th>
                                                <center>Aksi</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($runningText as $data) {
                                            ?>
                                            <tr align="center">
                                                <td><?= $no ?>.</td>
                                                <td><?= $data->text ?></td>
                                                <td>
                                                    <?php
                                                        if ($data->status == 1) { ?>
                                                        <a href="" class='btn btn-success'>Aktif</a>
                                                    <?php } else { ?>
                                                        <a href="<?= base_url() ?>Admin/toggleRunningText/<?= $data->id ?>" class='btn bg-black'>Tidak Aktif</a>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-warning waves-effect m-r-20" data-toggle="modal" data-target="#tambah" onclick="update('<?= $data->id ?>','<?= $data->text ?>');"><i class="material-icons">edit</i> Edit</button> <a href="<?= base_url() ?>Admin/deleteRunningText/<?= $data->id ?>" class='btn btn-danger'><i class="material-icons">delete</i> Hapus</a>
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
                        <h4 class="modal-title" id="judulModal">Tambah Running Text</h4>
                    </div>
                    <div class="modal-body">
                        <div class="body">
                            <form action="<?= base_url() ?>Admin/tambahRunningText" id="frmTxt" method="post" enctype="multipart/form-data">
                                <div class="body">
                                    <input type="hidden" name="id" id="id">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  ">
                                        <label for="gol">Text</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="text" id="text" class="form-control">
                                                <!-- <textarea name="text" id="" cols="30" rows="3" class='form-control'></textarea> -->
                                            </div>
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

    function update(id, text) {
        document.getElementById("judulModal").innerHTML = "Edit Running Text";
        var x = document.getElementById("frmTxt");
        x.action = "<?php echo base_url() ?>Admin/editRunningText";
        document.getElementById('id').value = id;
        document.getElementById('text').value = text;
    }

    function tambah() {
        document.getElementById("judulModal").innerHTML = "Tambah Running Text";
        var x = document.getElementById("frmTxt");
        x.action = "<?php echo base_url() ?>Admin/tambahRunningText";
        document.getElementById('id').value = null;
        document.getElementById('text').value = null;
    }
</script>