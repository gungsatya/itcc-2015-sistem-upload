<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en" ng-app="todoApp">
<head>
	<meta charset="utf-8">
	<title>ITCC 2015</title>

	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/ikon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.11.3.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/angular.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/todo.js"></script>
    <style>
      .hb {height: 250px;}
    </style>
</head>
<body>

<div class="col-md-4">
</div>';
<div id="wrapper" class="container" ng-controller="TodoListController as todoList">
    <div id="header" class="row">
        <div id="logo" class="col-md-12"><center><img src="<?php echo base_url(); ?>assets/1.png"></center></div>
    </div>
    <div id="category" class="row">
        <div class="col-md-6">
            <form ng-submit="todoList.addTodo()">
            <table class="table">
                <thead>
                        <td colspan="2"><center><b>Finalis</b></center></td>
                </thead>
                <tr>
                        <div class="form-group">
                            <td><b>No Peserta</b></td>
                            <td><input type="text" ng-model="todoList.todoNo" class="form-control" name="No Peserta" required="required" placeholder="Username"/></td>
                        </div>
                </tr>
                <tr>
                        <td><b>Nama Peserta</b></td>
                        <td><input type="text" ng-model="todoList.todoNama" class="form-control" name="Nama Peserta" required="required" placeholder="Nama Peserta" /></td>
                </tr>
                <tr>
                        <td colspan="2"> <input class="btn btn-primary btn-block" type="submit" name="btnUpload" value="Save"/></td>
                </tr>
            </table>
            </form> 
        </div>
        <div class="col-md-6" style="margin-top:15px;">
            <table class="table">
                <tr>
                    <th>No Peserta</th>
                    <th>Nama Peserta</th>
                </tr>
                <tr ng-repeat="todo in todoList.todos" id="test{{todo.no}}">
                    <td>{{todo.no}}</td>
                    <td>{{todo.nama}}</td>
                </tr>
                <tr>
                    <td colspan='2'><input class="btn btn-success btn-block" type="button" name="btnRandom" value="Random" ng-click="todoList.shuffleanim()"/></td>
                </tr>
            </table>
        </div>
        
    </div>
</div>
</body>
</html>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

