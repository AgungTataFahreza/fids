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
                                Status Informasi
                            </h2>
                            <br>
                            <button type="button" class="btn btn-primary waves-effect m-r-20" data-toggle="modal" data-target="#tambah" onclick="tambah();"><i class="material-icons">add</i><b>Tambah</button>
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
                                                <center>Jenis</center>
                                            </th>
                                            <th>
                                                <center>Status Bahasa Indonesi</center>
                                            </th>
                                            <th>
                                                <center>Status Bahasa Inggris</center>
                                            </th>
                                            <th>
                                                <center>Aksi</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($statusInfo as $data) {
                                            ?>
                                            <tr align="center">
                                                <td><?= $no ?>.</td>
                                                <td><?= $data->jenis ?></td>
                                                <td><?= $data->status_indo ?></td>
                                                <td><?= $data->status_english ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-warning waves-effect m-r-20" data-toggle="modal" data-target="#tambah" onclick="update('<?= $data->id ?>','<?= $data->jenis ?>','<?= $data->status_indo ?>','<?= $data->status_english ?>');"><i class="material-icons">edit</i> Edit</button> <a href="<?= base_url() ?>Admin/deleteStatusInfo/<?= $data->id ?>" class='btn btn-danger' onclick="return confirm_delete();"><i class="material-icons">delete</i> Hapus</a>
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
                        <h4 class="modal-title" id="judulModal"></h4>
                    </div>
                    <div class="modal-body">
                        <div class="body">
                            <form action="" id="formStatus" method="post">
                                <div class="body">
                                <input type="hidden" name="id" id="id">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  ">
                                        <label for="gol">Jenis</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select name="jenis" id="jenis" class="form-control">
                                                    <option value="Keberangkatan">Keberangkatan</option>
                                                    <option value="Kedatangan">Kedatangan</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  ">
                                        <label for="gol">Status Bahasa Indonesia</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="status_indo" id="status_indo" class="form-control" onkeyup="this.value = this.value.toUpperCase()" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label for="gol">Status Bahasa Inggris</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="status_english" id="status_english" class="form-control" onkeyup="this.value = this.value.toUpperCase();" required>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="button" data-dismiss="modal" class="btn btn-light">Batal</button>
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

<script src="<?php echo base_url('assets/jquery.min.js')?>" type="text/javascript"></script>
<script type="text/javascript">
    function update(id, jenis, status_indo, status_english) 
    {
        document.getElementById("judulModal").innerHTML = "Edit Status Informasi";
        var x = document.getElementById("formStatus");
        x.action = "<?php echo base_url() ?>Admin/editStatusInfo";
        document.getElementById('id').value             = id;
        document.getElementById('jenis').value          = jenis;
        document.getElementById('status_indo').value    = status_indo;
        document.getElementById('status_english').value = status_english;
    }

    function tambah() 
    {
        document.getElementById("judulModal").innerHTML = "Tambah Status Informasi";
        var x = document.getElementById("formStatus");
        x.action = "<?php echo base_url() ?>Admin/tambahStatusInfo";
        document.getElementById('id').value             = null;
        document.getElementById('status_indo').value    = null;
        document.getElementById('status_english').value = null;
    }

    function confirm_delete() 
    {
        return confirm('Apakah Anda Ingin Menghapus Data?');
    }

</script>