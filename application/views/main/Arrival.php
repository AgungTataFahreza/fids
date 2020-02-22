<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('partial/mainHead') ?>
    <style>
        html {
            overflow: hidden;
        }
        .kolom {
            border: 1px solid #ccc !important;
            border-radius: 16px;
        }
    </style>
</head>

<body onload="startTime()">
    <div class="container-fluid">
    <div id="isi">
        <div class="row" style="margin-left:1px;display:inline">
            <div class="col-md-1 col-lg-1">
                <img style="padding:20px;border: 2px solid #ffffff;border-radius:15px;" src="<?= base_url() ?>images/landing.png">
            </div>
            <div class="col-md-2 col-lg-2" style="vertical-align:center;">
                <h1 class='judul'>ARRIVAL</h1>
            </div>
            <!-- <div class="col-md-offset-7 col-lg-offset-7 col-md-1 col-lg-1" style="vertical-align:center;">
                <h1 id="txt" style="border: 2px solid #ffffff;border-radius:5px;width:150px"></h1>
            </div> -->
        </div>
        <table border="1">
            <tr class='baris1'>
                <th style="text-align: center; padding: 0px; width: 140px;" colspan="2">FLIGHT</th>
                <th>
                    <center>ORIGIN</center>
                </th>
                <th>
                    <center>SCH</center>
                </th>
                <th>
                    <center>EST</center>
                </th>
                <th style="text-align: right;">
                    <center>REMARK</center>
                </th>
            </tr>
            <?php
            $jumlah = count($kedatangan);
            $a = 0;
            if ($jumlah < $JumlahBaris) {
                $a = $JumlahBaris;
            }
            $warna = 0;
            foreach ($kedatangan as $data) {
                if ($warna % 2 == 0) {
                    $class = "class='baris2'";
                } else {
                    $class = "class='baris1'";
                }
                ?>
                <tr <?= $class ?>>
                    <td id="gambar"><img style="vertical-align: bottom;" width="140px" height="50px" src="<?= base_url() ?>image/<?= $data->image ?>" /></td>
                    <td style="text-align: left; padding: 0px; width: 100px;">
                        <center><?= $data->flight_number ?></center>
                    </td>
                    <td>
                        <center><?= $data->nama_kota ?></center>
                    </td>
                    <td>
                        <center><?= $data->waktu ?></center>
                    </td>
                    <td>
                        <center><?= $data->est ?></center>
                    </td>
                    <td style="text-align: right;">
                        <center><?= $data->remark ?></center>
                    </td>
                </tr>
            <?php
                $warna++;
                $a--;
            } ?>
            <?php
            for ($i = 0; $i < $a; $i++) {
                if ($warna % 2 == 0) {
                    $class = "class='baris2'";
                } else {
                    $class = "class='baris1'";
                }
                ?>
                <tr <?= $class ?> style="height:61px">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            <?php
                $warna++;
            } ?>
        </table>
        </div>
        <footer style="color:white;">
        <br>
            <div class="row" style="margin-right: 0px;margin-left: 0px;">
                <?php for ($i = 0; $i < 6; $i++) { ?>
                    <div class="kolom col-md-2 col-lg-2">
                        <table>
                            <br>
                            <tr>
                                <center><strong style="font-size:15px;">13:00 WIB</strong></center>
                            </tr>
                            <tr>
                                <center>
                                    <img src="<?= base_url() ?>images/cloudy.png" alt="" width="100px" height="100px">
                                </center>
                            </tr>
                            <tr>
                                <center><strong style="font-size:15px;">Berawan</strong></center>
                            </tr>
                            <tr>
                                <center><strong style="font-size:15px;">12&degC</strong></center>
                            </tr>
                            <tr>
                                <center><strong style="font-size:15px;">90%</strong></center>
                            </tr>
                            <tr>
                                <center><strong style="font-size:15px;">10 knot</strong></center>
                            </tr>
                            <tr>
                                <center><strong style="font-size:15px;">Barat</strong></center>
                            </tr>
                            <br>
                        </table>
                    </div>
                <?php } ?>
            </div>

            <div class="row" style="margin-left:1px;display:inline">
                <div class="col-md-11 col-lg-11">
                    <marquee>
                        <h1 style="color:white;"><img src="<?= base_url() ?>images/Logo_Dishub.png" alt="" width="50px" height="50px"><?= $text->text ?></h1>
                    </marquee>
                </div>
                <div class="col-md-1 col-lg-1">
                    <h1 id="txt" style="border: 2px solid #ffffff;border-radius:5px;width:95px"></h1>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>
<script>
    function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('txt').innerHTML =
            h + ":" + m;
        var t = setTimeout(startTime, 500);
    }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i
        }; // add zero in front of numbers < 10
        return i;
    }
</script>