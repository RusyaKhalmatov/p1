<?php
require ("database_connection.php");
$name=$_POST["name"];
$city=$_POST["city"];
$phone=$_POST["phone"];
$stars=$_POST["stars"];
$webpage=$_POST["webpage"];
$airport=$_POST["airport"];
$airport_dist=$_POST["dist_air"];
$sea_dist=$_POST["dist_sea"];
$room_area=$_POST["room_area"];
$numb_rooms=$_POST["room_numb"];
$numb_people=$_POST["room_people"];
$pool=$_POST["pool"];
$rest=$_POST["restaurant"];
$beach=$_POST["beach"];
$game_area=$_POST["game_area"];
$img=$_POST["img"];
$description=$_POST["details"];
    

if(hotel_not_empty($name,$city,$phone,$webpage,$airport,$airport_dist,$sea_dist,$room_area,$numb_rooms,$numb_people,$pool,$rest,$beach,$game_area,$img,$description))
{

     db_connect();
    
    if(hotel_exist($name, $city,$description))
    {
        redirect("add_hotel.php","The hotel is already exist!");
    }else
    {
        mysql_query("INSERT INTO hotels (name,stars,description,phone,webpage,airport,airport_distance, sea_distance,room_area,numbofrooms,people_per_room,pool,restaurant,beach,game_area,city,img) VALUES ('$name','$stars','$description','$phone','$webpage','$airport','$airport_dist','$sea_dist','$room_area','$numb_rooms','$numb_people','$pool','$rest','$beach','$game_area','$city','$img')");
        redirect("add_hotel.php","Successfully created!");
    }
}else
    redirect("add_hotel.php","Fill all the fields");

?>