<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('partial/head') ?>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
</head>
<style>
    .switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
    }

    .switch input { 
    opacity: 0;
    width: 0;
    height: 0;
    }

    .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
    }

    .slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
    }

    input:checked + .slider {
    background-color: #2196F3;
    }

    input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
    border-radius: 34px;
    }

    .slider.round:before {
    border-radius: 50%;
    }

    .btn-biru
    {
        background: #1A385A;
        color : #FFF;
    }
    .btn:hover, .btn:focus, .btn.focus {
        color: #FFF;
        text-decoration: none;
    }

    td{
        text-align:center;
    }

    th{
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
    <!-- #Top Bar -->
    <?php $this->load->view('partial/sidebarcheckin') ?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                            <?=$maskapai;?>
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th colspan="2">
                                            Penerbangan
                                        </th>
                                        <th>
                                            Kota Asal
                                        </th>
                                        <th>
                                            Jadwal
                                        </th>
                                        <th>
                                            Est
                                        </th>
                                        <th>
                                            Keterangan
                                        </th>
                                        <th>
                                            Gate
                                        </th>
                                        <th>
                                            Aksi Gate
                                        </th>
                                        <th>
                                            Link Checkin
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    foreach($checkin as $data)
                                    {
                                ?>
                                    <tr>
                                        <td>
                                            <img src=" <?= base_url() ?>image/<?= $data->image ?>" width="150" height="50">
                                        </td>
                                        <td><?= $data->flight_number ?></td>
                                        <td><?= $data->nama_kota ?></td>
                                        <td><?= $data->waktu ?></td>
                                        <td><?= $data->est ?></td>
                                        <td><?= $data->status_english ?></td>
                                        <td><?= $data->gate?></td>
                                        <td>
                                            <label class="switch">
                                                <input type="checkbox" value="<?=$data->status_gate?>" id="status_gate" name="status_gate" onchange="aksi_status('<?=$data->id ?>','<?=$data->status_gate ?>');" <?php if($data->status_gate == '1') echo 'checked'; ?>>
                                                <span class="slider round"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <a href="<?= base_url() ?>checkin/<?=$data->nama_penerbangan?>/<?=$data->flight_number?>" target="_blank" class="btn btn-primary">Link</a>
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
<script src="<?php echo base_url('assets/jquery.min.js')?>" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() 
    {
        setInterval(function() 
        {
            document.location.reload(true);
        }, 10000);
    });

    function aksi_status(id,cekStatus) 
    {
        // alert(id);
        // alert(cekStatus);
        $.ajax({
            url: "<?=base_url()?>Show/aksi_status",
            data: '&id='+id + '&cekStatus='+cekStatus,
            success: function(data) 
            {			
                var hasil = JSON.parse(data);
                $.each(hasil, function(key, val)
                {
                    document.location.reload(true);
                });
            }
            });
    }
</script>
