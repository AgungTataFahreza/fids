<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('partial/head') ?>
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
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                KOTA
                            </h2>
                            <br>
                            <a href="cursor: pointer;" class="btn btn-primary waves-effect m-r-20" data-toggle="modal" data-target="#tambah" onclick="tambah()"><i class="material-icons">add</i>Tambah</a>
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
                                                <center>Nama Kota</center>
                                            </th>
                                            <th>
                                                <center>Negara</center>
                                            </th>
                                            <th>
                                                <center>Gambar</center>
                                            </th>
                                            <th>
                                                <center>Aksi</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($kota as $data) {
                                            ?>
                                            <tr align="center">
                                                <td><?= $no ?>.</td>
                                                <td><?= $data->nama_kota ?></td>
                                                <td><?= $data->negara ?></td>
                                                <td>
                                                <img src="<?=base_url()?>image/gambar_kota/<?=$data->image?>" width="150px" height="100px" alt="">
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-warning text-light" data-toggle="modal" data-target="#tambah" title="Edit Kota" onclick="update('<?= $data->id_kota ?>', '<?= $data->nama_kota ?>', '<?= $data->negara ?>', '<?= $data->image?>')"><i class="material-icons">edit</i> Edit</button>
                                                    <a href="<?= base_url() ?>Admin/HapusKota/<?= $data->id_kota ?>" class="btn btn-danger text-light"><i class="material-icons">delete</i> Hapus</a>
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
    </section>

    <div class="modal fade" id="tambah" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="judulModal">Tambah Kota</h4>
                </div>
                <div class="modal-body">
                    <div class="body">
                        <form action="<?php echo base_url() ?>Admin/TambahKota" id="formKota" method="post" enctype="multipart/form-data">
                            <div class="body">
                                <input type="hidden" name="id" id="id">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  ">
                                    <label for="gol">Nama Kota</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="hidden" id="nama_kota1" name="kota1" class="form-control" placeholder="Nama Kota">
                                            <input type="text" id="nama_kota2" name="kota2" class="form-control" placeholder="Nama Kota">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="gol">Nama Negara</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="hidden" id="negara1" name="negara1" class="form-control" placeholder="Nama Negara">
                                            <input type="text" id="negara2" name="negara2" class="form-control" placeholder="Nama Negara">
                                        </div>
                                    </div>
                                </div>
                                <div id="div_gambar" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <img src="" alt="" id="gambar" width="200px" height="150px">
                                        <br>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="LNK">Gambar Simbol Kota Tujuan</label>
                                    <div class="fallback">
                                        <input id="inputFile" name="foto" type="file" multiple />
                                        <br>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
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
    <?php $this->load->view('partial/js') ?>
</body>

</html>
<!-- <script src="<?php echo base_url('assets/jquery.min.js') ?>" type="text/javascript"></script> -->
<script type="text/javascript">
    function update(id, nama_kota, negara, gambar) {
        $("#div_gambar").show();
        document.getElementById("judulModal").innerHTML = "Edit Kota";
        var x = document.getElementById("formKota");
        x.action = "<?php echo base_url() ?>Admin/EditKota";
        document.getElementById('id').value = id;
        document.getElementById('nama_kota1').value = nama_kota;
        document.getElementById('nama_kota2').value = nama_kota;
        document.getElementById('negara1').value = negara;
        document.getElementById('negara2').value = negara;
        document.getElementById('gambar').src = "<?=base_url()?>image/gambar_kota/" + gambar;

    }

    function tambah() {
        $("#div_gambar").hide();
        document.getElementById("judulModal").innerHTML = "Tambah Kota";
        var x = document.getElementById("formKota");
        x.action = "<?php echo base_url() ?>Admin/TambahKota";
        document.getElementById('id').value = null;
        document.getElementById('nama_kota1').value = null;
        document.getElementById('nama_kota2').value = null;
        document.getElementById('negara1').value = null;
        document.getElementById('negara2').value = null;
        document.getElementById('gambar').src = null;
    }
</script>
