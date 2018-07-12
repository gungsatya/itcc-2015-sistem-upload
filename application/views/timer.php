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
        <div class="col-md-12">
            <center>
            <span id="cd_h" style="color:white;font-family:verdana;font-size:90px;">00</span>
            <span style="color:white;font-family:verdana;font-size:90px;">:</span>
            <span id="cd_m" style="color:white;font-family:verdana;font-size:90px;">00</span>
            <span style="color:white;font-family:verdana;font-size:90px;">:</span>
            <span id="cd_s" style="color:white;font-family:verdana;font-size:90px;">00</span>
            <span style="color:white;font-family:verdana;font-size:90px;">:</span>
            <span id="cd_ms" style="color:white;font-family:verdana;font-size:90px;">00</span>
            <br/>
            <br/>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                <div class="input-group">
                <input class="form-control" type="text" value="3600" id="cd_seconds" />
                <div class="input-group-addon">Sec</div>
                </div>
                </div>
                <div class="col-md-4"></div>
            </div>
            <br />
            <input type="button" class="btn btn-lg btn-success" value="Start" id="cd_start" />
            <input type="button" class="btn btn-lg btn-primary" value="Pause" id="cd_pause" />
            <input type="button" class="btn btn-lg btn-danger" value="Stop"  id="cd_stop" />
            <input type="button" class="btn btn-lg btn-default" value="Reset" id="cd_reset" />
            <br/>
            <br/>
            
            <br/>
            <br/>
            </center>
        </div>
        
    </div>
</div>
</body>
</html>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript">
/*

JQUERY: STOPWATCH & COUNTDOWN

This is a basic stopwatch & countdown plugin to run with jquery. Start timer, pause it, stop it or reset it. Same behaviour with the countdown besides you need to input the countdown value in seconds first. At the end of the countdown a callback function is invoked.

Any questions, suggestions? marc.fuehnen(at)gmail.com

*/

$(document).ready(function() {

    (function($){
    
        $.extend({
            
            APP : {                
                
                formatTimer : function(a) {
                    if (a < 10) {
                        a = '0' + a;
                    }                              
                    return a;
                },    
                
                startTimer : function(dir) {
                    
                    var a;
                    
                    // save type
                    $.APP.dir = dir;
                    
                    // get current date
                    $.APP.d1 = new Date();
                    
                    switch($.APP.state) {
                            
                        case 'pause' :
                            
                            // resume timer
                            // get current timestamp (for calculations) and
                            // substract time difference between pause and now
                            $.APP.t1 = $.APP.d1.getTime() - $.APP.td;                            
                            
                        break;
                            
                        default :
                            
                            // get current timestamp (for calculations)
                            $.APP.t1 = $.APP.d1.getTime(); 
                            
                            // if countdown add ms based on seconds in textfield
                            if ($.APP.dir === 'cd') {
                                $.APP.t1 += parseInt($('#cd_seconds').val())*1000;
                            }    
                        
                        break;
                            
                    }                                   
                    
                    // reset state
                    $.APP.state = 'alive';   
                    $('#' + $.APP.dir + '_status').html('Running');
                    
                    // start loop
                    $.APP.loopTimer();
                    
                },
                
                pauseTimer : function() {
                    
                    // save timestamp of pause
                    $.APP.dp = new Date();
                    $.APP.tp = $.APP.dp.getTime();
                    
                    // save elapsed time (until pause)
                    $.APP.td = $.APP.tp - $.APP.t1;
                    
                    // change button value
                    $('#' + $.APP.dir + '_start').val('Resume');
                    
                    // set state
                    $.APP.state = 'pause';
                    $('#' + $.APP.dir + '_status').html('Paused');
                    
                },
                
                stopTimer : function() {
                    
                    // change button value
                    $('#' + $.APP.dir + '_start').val('Restart');                    
                    
                    // set state
                    $.APP.state = 'stop';
                    $('#' + $.APP.dir + '_status').html('Stopped');
                    
                },
                
                resetTimer : function() {

                    // reset display
                    $('#' + $.APP.dir + '_ms,#' + $.APP.dir + '_s,#' + $.APP.dir + '_m,#' + $.APP.dir + '_h').html('00');                 
                    
                    // change button value
                    $('#' + $.APP.dir + '_start').val('Start');                    
                    
                    // set state
                    $.APP.state = 'reset';  
                    $('#' + $.APP.dir + '_status').html('Reset & Idle again');
                    
                },
                
                endTimer : function(callback) {
                   
                    // change button value
                    $('#' + $.APP.dir + '_start').val('Restart');
                    
                    // set state
                    $.APP.state = 'end';
                    
                    // invoke callback
                    if (typeof callback === 'function') {
                        callback();
                    }    
                    
                },    
                
                loopTimer : function() {
                    
                    var td;
                    var d2,t2;
                    
                    var ms = 0;
                    var s  = 0;
                    var m  = 0;
                    var h  = 0;
                    
                    if ($.APP.state === 'alive') {
                                
                        // get current date and convert it into 
                        // timestamp for calculations
                        d2 = new Date();
                        t2 = d2.getTime();   
                        
                        // calculate time difference between
                        // initial and current timestamp
                        if ($.APP.dir === 'sw') {
                            td = t2 - $.APP.t1;
                        // reversed if countdown
                        } else {
                            td = $.APP.t1 - t2;
                            if (td <= 0) {
                                // if time difference is 0 end countdown
                                $.APP.endTimer(function(){
                                    $.APP.resetTimer();
                                    $('#' + $.APP.dir + '_status').html('Ended & Reset');
                                });
                            }    
                        }    
                        
                        // calculate milliseconds
                        ms = td%1000;
                        if (ms < 1) {
                            ms = 0;
                        } else {    
                            // calculate seconds
                            s = (td-ms)/1000;
                            if (s < 1) {
                                s = 0;
                            } else {
                                // calculate minutes   
                                var m = (s-(s%60))/60;
                                if (m < 1) {
                                    m = 0;
                                } else {
                                    // calculate hours
                                    var h = (m-(m%60))/60;
                                    if (h < 1) {
                                        h = 0;
                                    }                             
                                }    
                            }
                        }
                      
                        // substract elapsed minutes & hours
                        ms = Math.round(ms/100);
                        s  = s-(m*60);
                        m  = m-(h*60);                                
                        
                        // update display
                        $('#' + $.APP.dir + '_ms').html($.APP.formatTimer(ms));
                        $('#' + $.APP.dir + '_s').html($.APP.formatTimer(s));
                        $('#' + $.APP.dir + '_m').html($.APP.formatTimer(m));
                        $('#' + $.APP.dir + '_h').html($.APP.formatTimer(h));
                        
                        // loop
                        $.APP.t = setTimeout($.APP.loopTimer,1);
                    
                    } else {
                    
                        // kill loop
                        clearTimeout($.APP.t);
                        return true;
                    
                    }  
                    
                }
                    
            }    
        
        });
          
        $('#sw_start').on('click', function() {
            $.APP.startTimer('sw');
        });    

        $('#cd_start').on('click', function() {
            $.APP.startTimer('cd');
        });           
        
        $('#sw_stop,#cd_stop').on('click', function() {
            $.APP.stopTimer();
        });
        
        $('#sw_reset,#cd_reset').on('click', function() {
            $.APP.resetTimer();
        });  
        
        $('#sw_pause,#cd_pause').on('click', function() {
            $.APP.pauseTimer();
        });                
                
    })(jQuery);
        
});
</script>