<!DOCTYPE html>
<html>

<head>
    <style>
        td {
            text-align: left;
            padding-left: 20px;
        }
        table
        {
            width: 1350px;
            min-width : 100%;
        }

        body {
            overflow: hidden;
            }
        body::-webkit-scrollbar { width: 0 !important; }
        body { overflow: -moz-scrollbars-none; }
        body { -ms-overflow-style: none; }

        .square {
            height: 150px;
            width: 150px;
            background-color: #FFFF00;
            padding : 15px;
        }
        .image-blurred-edge 
        {
            background-image: url('<?=base_url()?>image/gambar_kota/<?=$checkin->gambar_kota?>');
            box-shadow: 20px 50px 40px 0 #2f318b inset;
            border-radius: 50px 50px 0 0 #2f318b;
            background-repeat: no-repeat;
            background-size: auto;
            background-size: 100% 100%;
        }
        p{
            color:#FFF;
        }
    </style>
</head>

<body onload="zoom();">
    <div style="overflow: hidden">
        <?php
            if(!empty($checkin))
            {
        ?>
            <table cellspacing="0">
                <thead>
                    <tr style="background:#fff; height:200px;">
                        <td colspan="2">
                            <img src="<?=base_url()?>image/<?=$checkin->gambar?>" alt="" style="height:220px; width:400px;">
                        </td>
                    </tr>
                    <tr style="background:#192039; height:230px;">
                        <td>
                            <p>
                            <font style="font-size:50px; font-weight:bold; font-family: Arial;"><?=$checkin->flight_number?> </font>
                            <br>
                            <font style="font-size:35px; font-weight:bold; font-family: Arial;"><?=$checkin->waktu?></font>
                            </p>
                        </td>
                        <td style="width:300px; align-content:center;">
                            <center><div class="square"><p style="color:#000; font-size:50px; font-weight:bold;"><?=$checkin->gate?></p><div></center>
                        </td>
                    </tr>
                    <tr style="background:#2f318b; height:300px;">
                        <td style="width:800px;"><p style="font-size:60px; font-weight:bold; font-family: Arial;"><?=$checkin->nama_kota?></p></td>
                        <td style="width:500px;" class="image-blurred-edge"></td>
                    </tr>
                </thead>
            </table>
            <?php
                }
                else if(!empty($data_gambar))
                {
                    
            ?>
            <!-- <table cellspacing="0" style="overflow-y:hidden; overflow-x: hidden;">
                <thead>
                    <tr style="height:350px; background:#fff">
                        <td>
                            <center><img src="<?=base_url()?>image/<?=$data_gambar->image?>" style="height:350px; width:600px"></center>
                        </td>
                    </tr>
                    <tr style="background:#2f318b; height:400px">
                        <td>
                            <center><p style="font-size:80px; color:#fff"><img src="<?= base_url() ?>images/takeoff.png"> ALL FLIGHT</p></center>
                        </td>
                    </tr>
                </thead>
            </table> -->
            <div style="display: grid;">
                <img src='<?=base_url('image/BandaraRembele.jpg')?>' style="max-width: 100%;
            max-height: 100%; width:88%; max-width: 100%; margin: auto; padding:0;">
            </div>
            <?php } ?>
        </div>
</body>
</html>

<script src="<?php echo base_url('assets/jquery.min.js') ?>" type="text/javascript"></script>
<script>
$(document).ready(function() 
{
    setInterval(function() 
    {
        document.location.reload(true);
    }, 5000);
});
function zoom() {
        document.body.style.zoom = "100%";
    }
</script>

