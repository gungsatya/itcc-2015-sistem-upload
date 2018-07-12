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
    if(isset($_GET['login']) && $_GET['login'] =='error')
    {
        ?>
        <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="alert alert-danger alert-block fade in">
                <a class="close" data-dismiss="alert" href="#">&times;</a>
                <center><h4 class="alert-heading">ERROR</h4></center>
                <center>Login failed</center>
                </div>
            </div>
    <?php
    }
?>

<div class="col-md-4">
</div>;
<div id="wrapper" class="container" >
    <div id="header" class="row">
        <div id="logo" class="col-md-12"><center><img src="<?php echo base_url(); ?>assets/1.png"></center></div>
    </div>
    <div id="category" class="row ">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
            <form method="post" enctype="multipart/form-data" action="login">
            <table class="table">
                <thead>
                        <td colspan="2"><center><b>Login</b></center></td>
                </thead>
                <tr>
                        <div class="form-group">
                            <td><b>Username</b></td>
                            <td><input type="text" class="form-control" name="username" required="required" placeholder="Username"/></td>
                        </div>
                </tr>
                <tr>
                        <td><b>Password</b></td>
                        <td><input type="password" class="form-control" name="password" required="required" placeholder="Password" /></td>
                </tr>
                <tr>
                        <td colspan="2"> <input class="btn btn-primary btn-block" type="submit" name="btnUpload" value="Login"/></td>
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

