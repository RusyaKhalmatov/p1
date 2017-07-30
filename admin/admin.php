<!DOCTYPE html>
<html>
<head>
   <?php
    //include ("database_connection.php");
    if(!isset($_SESSION))
   //session_start();
   // ensure_login();
   
    ?>
    <title>Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/headerStyle.css" rel="stylesheet" type="text/css"/>
     <link href="css/main_bodyStyle.css" rel="stylesheet" type="text/css" />
     <link href="css/left_sidebar.css" rel="stylesheet" type="text/css" />
     
</head>
<body>
	<?php require ("header.php");?>
    <div class="container-fluid" style="margin-top: 20px;">
        <div class="row">
            <div class="container-fluid">
                <div class="col-lg-2 col-md-2" id="leftAdm">
                    <?php require ("left_sidebar.php");?>
                </div>

                <div class="col-lg-10 col-md-10" id="mainAdm">
                <?php require ("main_body.php");?>
                </div>
            </div>
        </div>
    </div>
	
	



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
	
</body>
</html>