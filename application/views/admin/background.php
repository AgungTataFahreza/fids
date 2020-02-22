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
                            <h2>BACKGROUND</h2>
                            <br>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#tambah" onclick="tambah();"><i class="material-icons">add</i> Add Background</button>
                        </div>
                        <div class="body">
                            <div id="carousel-example-generic_2" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <?php
                                    $i = 0;
                                    foreach ($gambar as $data) {
                                        if ($data->status == 1) {
                                            $active = "class='active'";
                                        } else {
                                            $active = '';
                                        }
                                        ?>
                                        <li data-target="#carousel-example-generic_2" data-slide-to="<?= $i ?>" <?= $active ?>></li>
                                    <?php
                                        $i++;
                                    } ?>
                                </ol>
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">
                                    <?php
                                    foreach ($gambar as $data) {
                                        if ($data->status == 1) {
                                            $active = 'active';
                                            $judul = 'Selected Background';
                                        } else {
                                            $active = '';
                                            $judul = '';
                                        }
                                        ?>
                                        <div class="item <?= $active ?>">
                                            <img src="<?= base_url() ?>images/<?= $data->judul_gambar ?>">
                                            <div class="carousel-caption">
                                                <h3><?= $judul ?></h3>
                                                <p><?= $data->judul_gambar ?></p>
                                                <?php if ($data->status == 0) { ?>
                                                    <a href="<?php echo base_url() ?>Admin/changeBackground/<?= $data->id_gambar ?>" class="btn btn-success"><i class="material-icons">done</i> Apply</a> <a href="<?php echo base_url() ?>Admin/hapusBackground/<?= $data->id_gambar ?>" class="btn btn-danger"><i class="material-icons">delete</i> Hapus</a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <!-- Controls -->
                                <a class="left carousel-control" href="#carousel-example-generic_2" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example-generic_2" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
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
                        <h4 class="modal-title" id="judulModal">Judul Modal</h4>
                    </div>
                    <div class="modal-body">
                        <div class="body">
                            <form action="<?= base_url() ?>" id="formBackground" method="post" enctype="multipart/form-data">
                                <div class="body">
                                    <div id="tambahAdd" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label for="gol">Add Picture</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="file" name="foto" class="form-control">
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
    function tambah() {
        document.getElementById("judulModal").innerHTML = "Add Picture";
        var x = document.getElementById("formBackground");
        x.action = "<?php echo base_url() ?>Admin/tambahBackground";
        $("#update").hide();
        $("#tambahAdd").show();
    }
</script>