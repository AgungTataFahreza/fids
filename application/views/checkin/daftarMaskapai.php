<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('partial/head') ?>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
</head>
<style>    
    section.content
    {
        margin: 100px 15px 15px 15px;
    }

    td,th {
        text-align:center;
        
    }
</style>
<body class="theme-brown">
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

    <section class="content">
    <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            Nama Penerbangan
                                        </th>
                                        <th>
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    foreach($daftar as $data)
                                    {
                                ?>
                                        <tr>
                                            <td><?=$data->nama_penerbangan?></td>
                                            <td>
                                                <a href="<?= base_url() ?>dashboard/<?=$data->nama_penerbangan?>" class="btn btn-primary">Link</a>
                                            </td>
                                        </tr>
                                <?php } ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            </div>
    </section>
    <?php $this->load->view('partial/js') ?>
</body>
</html>
