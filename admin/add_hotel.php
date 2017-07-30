<!DOCTYPE html>
<?php 
require ("database_connection.php");
?>
<html>

<head>
    <title>Admin</title>
    <link href="css/headerStyle.css" rel="stylesheet" type="text/css" />
     <link href="css/main_bodyStyle.css" rel="stylesheet" type="text/css" />
     <link href="css/left_sidebar.css" rel="stylesheet" type="text/css" />
      
</head>
<body>
	<!--?php require ("\project\scripts\header.php");?-->
	<?php require ("header.php");?>
	<?php require ("left_sidebar.php")?>
<div id="first" style="height: 1100px;">
            <h1 id="page_name">Add new hotels</h1>
            
        <div id="mainBut" style="height: 900px;">
            <h2 id="welcome" style="padding: 20px;"> Add hotel</h2>
                <?php 
       
            if (isset($_SESSION["message"]))
            {
            ?>
            <div id="message" style="color: red; font-size: 18px; margin-left:150px; margin-bottom:30px; margin-top:-20px;
        "><?=$_SESSION["message"]?></div>
            <?php
                unset($_SESSION["message"]);
            }
                ?>
                <form action="hotel_process.php" method="post">
                    <table>
                        
                        <tr>
                            <th>Name:</th>
                            <th><input type="text" name="name"></th>
                            
                            <th>City:</th>
                            <th><input type="text" name="city"></th>      
                        </tr>
                        <tr>
                            <th>Image name:</th>
                            <th><input type="text" name="img"></th>
                            <th>Number of stars (not necessary):</th>
                            <th><input type="number" name="stars"></th>
   
                        </tr>
                        
                        <tr>
                            <th>Phone number:</th>
                            <th><input type="number" name="phone"></th>
                            <th>Web page:</th>
                            <th><input type="text" name="webpage"></th>
                            
                        </tr>
                        <tr>
                            <th>Airport: </th>
                            <th><input type="text" name="airport"></th>
                            <th>Distance to the nearest airport(km):</th>
                            <th><input type="number" name="dist_air"></th>
                            
                        </tr>
                        <tr>
                            <th>Distance to the nearest sea(km):</th>
                            <th><input type="number" name="dist_sea"></th>
                            <th>Game area(yes/no):</th>
                            <th><input type="text" name="game_area"></th>
                            
                        </tr>    
                        <tr>
                            <th>Number of rooms:</th>
                            <th><input type="number" name="room_numb"></th>
                            <th>People per room:</th>
                            <th><input type="number" name="room_people"></th>
                            
                        </tr>
                 
                        <tr>
                            <th>Room area:</th>
                            <th><input type="number" name="room_area"></th>
                            <th>Pool(yes/no):</th>
                            <th><input type="text" name="pool"></th>
                            
                        </tr>
          
                         <tr>
                            <th>Restaurant(yes/no):</th>
                            <th><input type="text" name="restaurant"></th>
                            <th>beach(yes/no):</th>
                            <th><input type="text" name="beach"></th>
                        </tr>
                       
                        <tr>
                            
                        </tr>
              
                    </table>
                    <table style="margin-left:250px;">
                    <tr>
                        <th>Details:</th>
                    <th><textarea name="details" id="" cols="50" rows="10"></textarea></th>   
                    </tr>
                    
                    </table>
                     <input type="submit" id="add_hotel" value="Add hotel">
                </form>
                
         </div>
 </div>
	
 
                   <style>
                    input[type=text], input[type=number]
                       {
                           width:200px;
                           height: 30px;
                       }
                    th
                       {
                           padding: 10px;
                       }
                       table
                       {
                           margin-left: 50px;
                       }
                       #add_hotel
                       {
                           margin-left: 450px;
                           margin-top: 10px;
                           height: 50px;
                           width: 100px;
                       }
                    </style> 
</body>
</html>