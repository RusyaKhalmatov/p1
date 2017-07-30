<!DOCTYPE html>
<html>
<head>
   <?php
    include ("database_connection.php");
    if(!isset($_SESSION))
   session_start();
    ensure_login();
    
db_connect();
$date= date("Y-m-d");
    
$query=mysql_query("SELECT * FROM visits WHERE date='$date'");

$row=mysql_fetch_assoc($query);
$q1= mysql_query("SELECT * FROM trips");
  $numbOfTrips=mysql_num_rows($q1);  
$q2=mysql_query("SELECT * FROM dreams");
    $numbOfDreams=mysql_num_rows($q2);
$q3=mysql_query("SELECT * FROM admins");
    $numbOfAdmins=mysql_num_rows($q3);
$q4=mysql_query("SELECT * FROM users");
    $numbOfUsers=mysql_num_rows($q4); 
$q5=mysql_query("SELECT * FROM tour_order");
    $numbOfDreamOrders=mysql_num_rows($q5); 
$q6=mysql_query("SELECT * FROM dream_order");
    $numbOfTripOrders=mysql_num_rows($q6);    
    ?>
    <title>Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Contact page dreamsatellite"/>
     
    <link href="css/headerStyle.css" rel="stylesheet" type="text/css" />
     <link href="css/main_bodyStyle.css" rel="stylesheet" type="text/css" />
     <link href="css/left_sidebar.css" rel="stylesheet" type="text/css" />
      <link href="css/statisticsStyle.css" rel="stylesheet" type="text/css" />
     
</head>
<body>
	<?php require ("header.php");?>
	<?php require ("left_sidebar.php")?>
	<div id="first">
            <h1 id="page_name">Welcome to statistics, <?= $_SESSION["name"]?></h1>
            <div id="mainBut">
            <h2 id="welcome"> </h2>
        
        <table>
            <tr>
                <th>The number of trips:</th>
                <th><?=$numbOfTrips;?></th>
                <th>The number of dreams:</th>
                <th><?=$numbOfDreams ?></th>
            </tr>
            
            <tr>
                <th>Number of users: </th>
                <th><?=$numbOfUsers;?></th>
                <th>Number of admins: </th>
                <th><?=$numbOfAdmins; ?></th>
            </tr>
            
            <tr>
                <th>Dream orders: </th>
                <th><?=$numbOfDreamOrders; ?></th>
                
                <th>Trips order: </th>
                <th><?=$numbOfTripOrders; ?></th>
                
            </tr>
            <tr>
                <th>Number of views:</th>
                <th><?=$row["views"]; ?></th>
                <th>Number of visitors:</th>
                <th><?=$row["hosts"]; ?></th>
            </tr>
            
        </table>
         </div>
    </div>
	
</body>
</html>