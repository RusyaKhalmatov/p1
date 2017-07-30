<?php 
require("database_connection.php");
db_connect();

$title=$_POST["title"];
$img1=$_POST["img1"];
$img2=$_POST["img2"];
$img3=$_POST["img3"];
$price=$_POST["price"];
$address=$_POST["address"];
$details=$_POST["details"];

if(dream_verify($title,$img1,$img2,$img3,$price,$address,$details))
{
    if(dream_exist($title,$img1,$img2,$img3,$price,$address,$details))
    {
        redirect("add_dream.php","Dream is already exist");//checks whether new trip is already exist (function in file database_connection.php)
        
    }else
    $data=mysql_query("INSERT INTO dreams (name,description, img1,img2,img3,price,address) VALUES ('$title','$details','$img1','$img2','$img3','$price','$address')");
    redirect("add_dream.php","Dream is created");
}else
    redirect("add_dream.php","Fill all the fields");
?>