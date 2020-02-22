<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('partial/mainHead') ?>
    <style>
        .text {
            color: white;
            font-size: 50px;
        }
    </style>
</head>

<body onload="startTime()">
    <div class="container-fluid">
        <center>
            <div class="text">
                <h1>Flight Information Display System</h1>
                <br>
                <!-- <a href="<?= base_url() ?>Overview/Departure">DEPARTURE</a> /  -->
                <a href="<?= base_url() ?>Overview/Keberangkatan">KEBERANGKATAN</a>
                <br>
                <!-- <a href="<?= base_url() ?>Overview/Arrival">ARRIVAL</a> /  -->
                <a href="<?= base_url() ?>Overview/Kedatangan">KEDATANGAN</a>
            </div>
        </center>
    </div>
</body>

</html>