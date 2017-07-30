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
<div id="first" style="height: 1000px;">
            <h1 id="page_name">Add new dream</h1>
        <div id="mainBut" style="height: 800px;">
            <h2 id="welcome" style="padding: 20px;"> Fill the forms</h2>
                <form action="dream_process.php" method="post">
                    <table>
                        
                        <tr>
                            <th>Title:</th>
                            <th><input type="text" name="title"></th>
                        </tr>
                        
                        <tr>
                            <th>First image name :</th>
                            <th><input type="text" name="img1"></th>
                        </tr>
                        
                        <tr>
                            <th>Second image name:</th>
                            <th><input type="text" name="img2"></th>
                        </tr>
                        
                        <tr>
                            <th>Third image name:</th>
                            <th><input type="text" name="img3"></th>
                        </tr>
                        
                        <tr>
                            <th>Price: </th>
                            <th><input type="text" name="price"></th>
                        </tr>
                        
                        <tr>
                            <th>Address:</th>
                            <th><input type="text" name="address"></th>
                        </tr>
                    
                        <tr>
                            <th>Details</th>
                            <th><textarea name="details" id="" cols="30" rows="10"></textarea></th>
                        </tr>
                       
                    </table>
                     <input type="submit" id="add_trip" value="Add trip">
                </form>
    <?php 
       
            if (isset($_SESSION["message"]))
            {
            ?>
            <div id="message" style="color: red;"><?=$_SESSION["message"]?></div>
            <?php
                unset($_SESSION["message"]);
            }
                ?>
         </div>
 </div>
	
 
                   <style>
                    input[type=text]
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
                       #add_trip
                       {
                           margin-left: 250px;
                           margin-top: 10px;
                           height: 50px;
                           width: 100px;
                       }
                    </style> 
</body>
</html>