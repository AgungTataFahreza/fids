<?php
$this->load->model('Model_fids');
$data = $this->Model_fids->query("SELECT * FROM gambar WHERE status=1")->row();
?>
<title>FIDS</title>
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('plugins/bootstrap/css/bootstrap.css') ?>" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    body {
        background: url(<?= base_url() ?>images/<?= $data->judul_gambar ?>) no-repeat fixed;
        -webkit-background-size: 100% 100%;
        -moz-background-size: 100% 100%;
        -o-background-size: 100% 100%;
        background-size: 100% 100%;
        /* background-color: #42daf5; */
        font-family: roboto;
    }

    .judul {
        margin-top: 35px;
        margin-bottom: 10px;
        margin-left: 20px;
        color: white;
    }

    table {
        border-spacing: 0px;
        border-collapse: collapse;
        width: 100%;
        border-color: #ffffff;
        color: #ffffff;
        /* background-color: rgba(163, 137, 137, 1); */
        font-size: large;
    }

    .baris1 {
        background-color: rgba(74, 74, 74, 0.90);
    }

    .baris2 {
        background-color: rgba(74, 74, 74, 0.5);
    }

    /* .baris1 {
        background-color: rgba(0, 0, 0, 0.75);
    }

    .baris2 {
        background-color: rgba(0, 0, 0, 0.5);
    } */

    th,
    td {
        text-align: left;
        padding: 15px;
        /* font-weight: bold; */
    }

    td#gambar {
        text-align: left;
        padding: 5px;
        width: 130px;
    }

    #txt {
        color: white;
        /* margin-top: 35px; */
        margin-bottom: 10px;
        /* margin-left: 10px; */
    }

    .pm {
        background: url(<?= base_url() ?>images/<?= $data->judul_gambar ?>) no-repeat fixed;
        filter: alpha(opacity=90);
    }

</style>