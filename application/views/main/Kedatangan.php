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
        .green-badge{
            background-color:#008000;
            color:#fff;
            display:inline-block;
            padding-left:8px;
            padding-right:8px;
            text-align:center;
            border-radius:10px;
        }
        .yellow-badge{
            background-color:#f2f200;
            color:#000;
            display:inline-block;
            padding-left:8px;
            padding-right:8px;
            text-align:center;
            border-radius:10px;
        }
        .black-badge{
            background-color:#000;
            color:#fff;
            display:inline-block;
            padding-left:8px;
            padding-right:8px;
            text-align:center;
            border-radius:10px;
        }
        .red-badge{
            background-color:#cc0000;
            color:#fff;
            display:inline-block;
            padding-left:8px;
            padding-right:8px;
            text-align:center;
            border-radius:10px;
        }
        .orange-badge{
            background-color:#ff9933;
            color:#fff;
            display:inline-block;
            padding-left:8px;
            padding-right:8px;
            text-align:center;
            border-radius:10px;
        }
    </style>
</head>

<body onload="startTime();zoom();">
    <div class="container-fluid">
    <div id="isii">
        <div class="row" style="margin-left:1px;display:inline">
            <div class="col-md-1 col-lg-1">
                <img style="padding:20px;border: 2px solid #ffffff;border-radius:15px;" src="<?= base_url() ?>images/landing.png">
            </div>
            <div class="col-md-2 col-lg-2" style="vertical-align:center;">
                <h1 class='judul'>KEDATANGAN</h1>
            </div>
            <!-- <div class="col-md-offset-7 col-lg-offset-7 col-md-1 col-lg-1" style="vertical-align:center;">
                <h1 id="txt" style="border: 2px solid #ffffff;border-radius:5px;width:150px"></h1>
            </div> -->
        </div>
        <table border="1">
            <tr class='baris1' style="font-size:30px;">
                <th style="text-align: center; padding: 0px; width: 15%;" colspan="2">PENERBANGAN</th>
                <th style="width: 35%;">
                    <center>ASAL</center>
                </th>
                <th style="width: 15%;">
                    <center>JADWAL</center>
                </th>
                <th style="width: 15%;">
                    <center>EST</center>
                </th>
                <th style="text-align: right;width: 20%;">
                    <center>KETERANGAN</center>
                </th>
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
                <tr <?= $class ?> style="font-size:30px;">
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
                    <td style="text-align: center;">
                        <div 
                            <?php 
                                if($data->status_indo == "MENDARAT")
                                { echo'class="green-badge"';}
                                else if($data->status_indo == "TERLAMBAT")
                                { echo'class="orange-badge"';}
                                else if($data->status_indo == "DIBATALKAN")
                                { echo'class="red-badge"';}
                            ?>><center><?= $data->status_indo ?></center>
                        </div>
                    </td>
                </tr>
            <?php
                $warna++;
                $a--;
            } ?>
            <?php for ($i = 0; $i < $a; $i++) {
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
            <tr class='baris1' style="font-size:30px;">
                <th style="text-align: center; padding: 0px; width: 15%;" colspan="2">FLIGHT</th>
                <th style="width: 35%;">
                    <center>ORIGIN</center>
                </th>
                <th style="width: 15%;">
                    <center>SCH</center>
                </th>
                <th style="width: 15%;">
                    <center>EST</center>
                </th>
                <th style="text-align: right; width: 20%;">
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
            foreach ($kedatangan as $dataa) {
                if ($warna % 2 == 0) {
                    $class = "class='baris2'";
                } else {
                    $class = "class='baris1'";
                }
                ?>
                <tr <?= $class ?> style="font-size:30px;">
                    <td id="gambar"><img style="vertical-align: bottom;" width="140px" height="50px" src="<?= base_url() ?>image/<?= $dataa->image ?>" /></td>
                    <td style="text-align: left; padding: 0px; width: 100px;">
                        <center><?= $dataa->flight_number ?></center>
                    </td>
                    <td>
                        <center><?= $dataa->nama_kota ?></center>
                    </td>
                    <td>
                        <center><?= $dataa->waktu ?></center>
                    </td>
                    <td>
                        <center><?= $dataa->est ?></center>
                    </td>
                    <td style="text-align: center;">
                        <div 
                            <?php 
                                if($dataa->status_english == "LANDING")
                                { echo'class="green-badge"';}
                                else if($dataa->status_english == "DELAY")
                                { echo'class="orange-badge"';}
                                else if($dataa->status_english == "CANCEL")
                                { echo'class="red-badge"';}
                            ?>><center><?= $dataa->status_english ?></center>
                        </div>
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
        <div id="databmkg_eng" class="row" style="margin-right: 0px;margin-left: 0px;">
            <?php
                $url = "http://data.bmkg.go.id/datamkg/MEWS/DigitalForecast/DigitalForecast-Aceh.xml";
                $sUrl = file_get_contents($url, False);
                $xml = simplexml_load_string($sUrl);
                $xml = json_decode(json_encode($xml), true);
                for ($i = 0; $i < 6; $i++) {
                    $waktu = $xml["forecast"]["area"][7]["parameter"][6]["timerange"][$i]["@attributes"]["datetime"];
                    $weather = $xml["forecast"]["area"][7]["parameter"][6]["timerange"][$i]["value"];
                    $suhu = $xml["forecast"]["area"][7]["parameter"][5]["timerange"][$i]["value"][0];
                    $kelembapan = $xml["forecast"]["area"][7]["parameter"][0]["timerange"][$i]["value"];
                    $kecepatanAngin = $xml["forecast"]["area"][7]["parameter"][8]["timerange"][$i]["value"][0];
                    $arahAngin = $xml["forecast"]["area"][7]["parameter"][7]["timerange"][$i]["value"][1];
                    $gambar = null;
                    foreach ($cuaca as $data) {
                        if ($data->id == $weather) {
                            $weather = $data->cuaca_eng;
                            $gambar = $data->gambar;
                        }
                    }
                    foreach ($angin as $data) {
                        if ($data->id == $arahAngin) {
                            $arahAngin = $data->angin_eng;
                        }
                    }
                    $data_time = date("H", strtotime($waktu));
                    if ($data_time == "00" || $data_time == "18") {
                        $result_time = "pm";
                    } else {
                        $result_time = "am";
                    }
                    ?>
                    <div class="kolom <?= $result_time ?> col-md-2 col-lg-2">
                        <table>
                            <br>
                            <tr>
                                <center><strong style="font-size:15px;color:white;"><?= date("l", strtotime($waktu)) . "<br>" . date("H:i", strtotime($waktu)) ?> WIB</strong></center>
                            </tr>
                            <tr>
                                <center>
                                    <img src="<?= base_url() ?>images/cuaca/<?= $gambar . $result_time ?>.png" alt="" width="100px" height="100px">
                                </center>
                            </tr>
                            <tr>
                                <center><strong style="font-size:15px;color:white;"><?= $weather ?></strong></center>
                            </tr>
                            <tr>
                                <center><strong style="font-size:15px;color:white;"><i class="fa fa-snowflake-o" style="width:17.78px;height:17.78px;"></i><?= $suhu ?>&degC</strong></center>
                            </tr>
                            <tr>
                                <center><strong style="font-size:15px;color:white;"><i class="fa fa-tint" style="width:17.78px;height:17.78px;"></i><?= $kelembapan ?>%</strong></center>
                            </tr>
                            <tr>
                                <center><strong style="font-size:15px;color:white;"><i class="fa fa-flag" style="width:17.78px;height:17.78px;"></i><?= $kecepatanAngin ?> knot</strong></center>
                            </tr>
                            <tr>
                                <center><strong style="font-size:15px;color:white;"><i class="fa fa-compass" style="width:17.78px;height:17.78px;"></i><?= $arahAngin ?></strong></center>
                            </tr>
                            <br>
                        </table>
                    </div>
                <?php } ?>
            </div>
            <div id="databmkg_indo" class="row" style="margin-right: 0px;margin-left: 0px;">
            <?php
                function hari_indo($hari)
                {
                    $arr_hari = array(
                        "Sunday" => "Minggu",
                        "Monday" => "Senin",
                        "Tuesday" => "Selasa",
                        "Wednesday" => "Rabu",
                        "Thursday" => "Kamis",
                        "Friday" => "Jumat",
                        "Saturday" => "Sabtu"
                    );
                    return $arr_hari[$hari];
                }
                // $url = "http://data.bmkg.go.id/datamkg/MEWS/DigitalForecast/DigitalForecast-Aceh.xml";
                // $sUrl = file_get_contents($url, False);
                // $xml = simplexml_load_string($sUrl);
                // $xml = json_decode(json_encode($xml), true);
                for ($i = 0; $i < 6; $i++) {
                    $waktu = $xml["forecast"]["area"][7]["parameter"][6]["timerange"][$i]["@attributes"]["datetime"];
                    $weather = $xml["forecast"]["area"][7]["parameter"][6]["timerange"][$i]["value"];
                    $suhu = $xml["forecast"]["area"][7]["parameter"][5]["timerange"][$i]["value"][0];
                    $kelembapan = $xml["forecast"]["area"][7]["parameter"][0]["timerange"][$i]["value"];
                    $kecepatanAngin = $xml["forecast"]["area"][7]["parameter"][8]["timerange"][$i]["value"][0];
                    $arahAngin = $xml["forecast"]["area"][7]["parameter"][7]["timerange"][$i]["value"][1];
                    $gambar = null;
                    foreach ($cuaca as $data) {
                        if ($data->id == $weather) {
                            $weather = $data->cuaca_indo;
                            $gambar = $data->gambar;
                        }
                    }
                    foreach ($angin as $data) {
                        if ($data->id == $arahAngin) {
                            $arahAngin = $data->angin_indo;
                        }
                    }
                    $data_time = date("H", strtotime($waktu));
                    if ($data_time == "00" || $data_time == "18") {
                        $result_time = "pm";
                    } else {
                        $result_time = "am";
                    }
                    ?>
                    <div class="kolom col-md-2 col-lg-2 <?= $result_time ?>" >
                        <table>
                            <br>
                            <tr>
                                <center><strong style="font-size:15px; color:white;"><?= hari_indo(date("l", strtotime($waktu))) . "<br>" . date("H:i", strtotime($waktu)) ?> WIB</strong></center>
                            </tr>
                            <tr>
                                <center>
                                    <img src="<?= base_url() ?>images/cuaca/<?= $gambar . $result_time ?>.png" alt="" width="100px" height="100px">
                                </center>
                            </tr>
                            <tr>
                                <center><strong style="font-size:15px;color:white;"><?= $weather ?></strong></center>
                            </tr>
                            <tr>
                                <center><strong style="font-size:15px;color:white;"><i class="fa fa-snowflake-o" style="width:17.78px;height:17.78px;"></i><?= $suhu ?>&degC</strong></center>
                            </tr>
                            <tr>
                                <center><strong style="font-size:15px;color:white;"><i class="fa fa-tint" style="width:17.78px;height:17.78px;"></i><?= $kelembapan ?>%</strong></center>
                            </tr>
                            <tr>
                                <center><strong style="font-size:15px;color:white;"><i class="fa fa-flag" style="width:17.78px;height:17.78px;"></i><?= $kecepatanAngin ?> knot</strong></center>
                            </tr>
                            <tr>
                                <center><strong style="font-size:15px;color:white;"><i class="fa fa-compass" style="width:17.78px;height:17.78px;"></i><?= $arahAngin ?></strong></center>
                            </tr>
                            <br>
                        </table>
                    </div>
                <?php } ?>
            </div>
            
            <div id="rText">
                <div class="row" style="margin-left:1px;display:inline">
                    <div class="col-md-11 col-lg-11">
                        <marquee>
                            <!-- <h1 style="color:white;"><img src="<?= base_url() ?>images/angkasapura.png" alt="" width="50px" height="50px"><?= $text->text ?></h1> -->
                            <h1 style="color:white;"><img src="<?= base_url() ?>images/Logo_Dishub.png" alt="" width="50px" height="50px"> <?=$_SESSION['running_text'] ?></h1>
                        </marquee>
                    </div>
                    <div class="col-md-1 col-lg-1">
                        <h1 id="txt" style="border: 2px solid #ffffff;border-radius:5px;width:95px"></h1>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>
<script src="<?php echo base_url('assets/jquery.min.js')?>" type="text/javascript"></script>
<script>
var toogle = "0";
    function startTime() 
    {
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

    $(document).ready(function() 
    {
        $("#databmkg_indo").show();
        $("#databmkg_eng").hide();
        $("#isi").show();
        $("#isii").hide();
        loadRunningText();
        loadlink();
        setInterval(function()
        {
            loadlink()
        }, 5000);
    });

    function loadlink()
    { 
        if(toogle=='0')
        {
            loadRunningText();
            $("#isii").show();
            $("#isi").hide();
            $("#databmkg_indo").show();
            $("#databmkg_eng").hide();
            $('#isii').load('<?=base_url()?>Overview/Kedatangan #isii',function () 
            {
                $(this).unwrap();
            });
            $('#databmkg_indo').load('<?=base_url()?>Overview/Keberangkatan #databmkg_indo',function () 
            {
                $(this).unwrap();
            });
            toogle='1';
        }
        else if(toogle=='1')
        {
            loadRunningText();
            $("#isi").show();
            $("#isii").hide();
            $("#databmkg_indo").hide();
            $("#databmkg_eng").show();
            $('#isi').load('<?=base_url()?>Overview/Kedatangan #isi',function () 
            {
                $(this).unwrap();
            });
            $('#databmkg_eng').load('<?=base_url()?>Overview/Keberangkatan #databmkg_eng',function () 
            {
                $(this).unwrap();
            });
            toogle='0';
        }
    }
    function loadRunningText()
    {
        $.ajax({
            url: "<?php echo base_url(); ?>Overview/loadRunningText",
            success: function(data) {
                var hasil = JSON.parse(data);
                $.each(hasil, function(key, val) 
                {
                    if(hasil.hasil=='berubah')
                    {
                        $('#rText').load('<?=base_url()?>Overview/Keberangkatan #rText',function () 
                        {
                            $(this).unwrap();
                        });
                    }
                });
            }
        });
    }

    function zoom()
    {
        document.body.style.zoom="90%";
    }
</script>