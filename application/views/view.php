<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="refresh" content="5">
	<title>ITCC 2015</title>

	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/ikon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.11.3.js"></script>
    <style>
      .hb {height: 250px;}
    </style>
</head>
<body>

<div class="col-md-4">
</div>
<div id="wrapper" class="container" >
    <div id="header" class="row">
        <div id="logo" class="col-md-12"><center><img width="300" src="<?php echo base_url(); ?>assets/1.png"></center></div>
    </div>
    <div id="category" class="row ">
        <!-- <div class="col-md-2">
        </div> -->
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>No Peserta</th>
                        <th>Nama Peserta</th>
                        <th>Nama Sekolah</th>
                        <th>Soal</th>
                        <th>Waktu Upload</th>
                    </tr>
                </thead>
                <tbody>
                
                    <?php 
                    $i = 1;
                    //var_dump($upload);
                    if (sizeof($upload) == 0) {
                        ?>
                            <tr>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                        <?php
                    }
                    else{
                        foreach ($upload as $value) {
                            ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $value->no_peserta ?></td>
                                <td><?php echo $value->nama_peserta ?></td>
                                <td><?php echo $value->nama_sekolah ?></td>
                                <td><?php echo 'Soal '.$value->soal ?></td>
                                <td><?php echo $value->waktu ?></td>
                            </tr>
                            <?php
                            $i++;
                        }
                    }
                    ?>
                
            </tbody>
            </table>
        </div>
        <!-- <div class="col-md-2">
        </div> -->
    </div>
</div>
</body>
</html>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>