<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>ITCC 2015</title>

	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/ikon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.11.3.js"></script>
    <style>
      .hb {height: 250px;}
    </style>
</head>
<body>

<?php
if(!empty($error))
{
?>
<div class="col-md-4"></div>
<div class="col-md-4">
    <div class="alert alert-danger alert-block fade in">
        <a class="close" data-dismiss="alert" href="#">&times;</a>
        <center><h4 class="alert-heading">ERROR</h4></center>
        <center><?php echo $error;?></center>
    </div>
</div>
<?php
}
?>

<?php
if(!empty($upload_data))
{
    ?>
<div class="col-md-4"></div>
<div class="col-md-4">
    <div class="alert alert-success alert-block fade in">
        <a class="close" data-dismiss="alert" href="#">&times;</a>
        <center><h4 class="alert-heading">Sukses</h4></center>
        <center>Data Anda Berhasil di Upload</center>
    </div>
</div>
<?php
}
?>

<div id="wrapper" class="container" >
    <div id="header" class="row">
        <div id="logo" class="col-md-12"><center><img src="<?php echo base_url(); ?>assets/1.png"></center></div>
    </div>
    <div id="category" class="row ">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
            <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>do_upload">
            <table class="table">
                <thead>
                        <td colspan="2"><center><b>Upload File</b></center></td>
                </thead>
                <tr>
                        <div class="form-group">
                            <td><b>File</b></td>
                            <td><input type="file" class="form-control" name="data_upload" required="required"/></td>
                        </div>
                </tr>
                <tr>
                        <div class="form-group">
                            <td><b>Soal</b></td>
                            <td><select class="form-control" name="soal">
                                    <option value="1">Soal 1</option>
                                    <option value="2">Soal 2</option>
                                    <option value="3">Soal 3</option>
                                    <option value="4">Soal 4</option>
                                    <option value="5">Soal 5</option>
                                    <option value="6">Soal 6</option>
                                    <option value="7">Soal 7</option>
                                    <option value="8">Soal 8</option>
                                    <option value="9">Soal 9</option>
                                    <option value="10">Soal 10</option>
                                </select>
                            </td>
                        </div>
                </tr>
                <tr>
                        <td colspan="2"> <input class="btn btn-success btn-block" type="submit" name="btnUpload" value="Submit"/>
                                <input type="button" class="btn btn-danger btn-block" name="logout" value="Logout" onclick="return keluar()"/>
                        </td>
                </tr>
            </table>
            </form> 
        </div>
        <div class="col-md-4">
        </div>
    </div>
</div>
</body>
</html>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript">
function keluar()
{
    document.location='<?php echo base_url(); ?>logout';
}
</script>