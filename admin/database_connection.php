<?php
if (!isset($_SESSION))
           session_start();
require_once ("app_config.php");
#return true if password is correct
function is_password_correct($login,$password)
{
    db_connect();
    $query = mysql_query("SELECT name,login,password FROM admins WHERE login='$login'");
     $data=mysql_fetch_assoc($query);
 
        if($data['password']==$password &&             $data['password']!=null)
        {
            return true;
        }
    else
        return false;
}

function verify_user($email, $password)
{
    db_connect();
    $query = mysql_query("SELECT name,email,password FROM users WHERE email='$email'");
     $data=mysql_fetch_assoc($query);
 
        if($data['password']==$password && $data['password']!=null)
        {
            return true;
        }
    else
        return false;
}
function db_connect()
{
    require_once ("app_config.php");
	$link=mysql_connect(DATABASE_HOST, DATABASE_USERNAME, DATABASE_PASSWORD);
	mysql_select_db(DATABASE_NAME);
}

function redirect($url,$message)
{
    
    $_SESSION["message"]=$message;
    
    header("Location: $url");
}

function ensure_login()
{
    if(!isset($_SESSION["name"]))
        redirect("\project\accsess.php","First you must login");
}

    function get_order_trip()
    {
    db_connect();
    $query = mysql_query("SELECT * FROM events LEFT OUTER JOIN dream_order ON events.dream_id=dream_order.id WHERE events.dream_id!=0");
        echo "<table>";
    echo "<tr>";
         echo "<td>"; echo "Check";  echo "</td>";
        echo "<td>"; echo "ID";  echo "</td>";
         echo "<td>"; echo "User id";  echo "</td>";
      echo "<td>"; echo "Dream id";  echo "</td>";
    echo "<td>"; echo "Total cost";  echo "</td>";
    echo "<td>"; echo "Phone number";  echo "</td>";
    echo "</tr>";    
    
        while ($row=mysql_fetch_array($query))
        {
            echo "<tr>";
            
             echo "<td>";?> 
            <input type="checkbox" name="check[]" value="<?php echo $row["id"]?>">
            <?php echo "</td>";
            echo "<td>"; echo $row["id"];  echo "</td>";
            echo "<td>"; echo $row["user_id"]; echo "</td>";
            echo "<td>"; echo $row["order_id"]; echo "</td>";
             echo "<td>"; echo $row["cost"]; echo "</td>";
            echo "<td>"; echo $row["phone_numb"]; echo "</td>";

            echo "</tr>";
        }
        echo "</table>";
        
             
    }

function get_order_dream()
{
    db_connect();
    $query = mysql_query("SELECT * FROM events LEFT OUTER JOIN tour_order ON events.tour_id=tour_order.id WHERE events.tour_id!=0");
        echo "<table>";
    echo "<tr>";
         echo "<td>"; echo "Check";  echo "</td>";
        echo "<td>"; echo "ID";  echo "</td>";
         echo "<td>"; echo "User id";  echo "</td>";
      echo "<td>"; echo "Trip id";  echo "</td>";
    echo "<td>"; echo "Phone number";  echo "</td>";
    echo "<td>"; echo "Number of adults";  echo "</td>";
    echo "<td>"; echo "Number of children";  echo "</td>";
    echo "<td>"; echo "Total cost";  echo "</td>";
    echo "</tr>";    
    
        while ($row=mysql_fetch_array($query))
        {
            echo "<tr>";
            
             echo "<td>";?> 
            <input type="checkbox" name="check[]" value="<?php echo $row["id"]?>">
            <?php echo "</td>";
            echo "<td>"; echo $row["id"];  echo "</td>";
            echo "<td>"; echo $row["user_id"]; echo "</td>";
            echo "<td>"; echo $row["order_id"]; echo "</td>";
            echo "<td>"; echo $row["phone_numb"]; echo "</td>";
            echo "<td>"; echo $row["numb_adult"]; echo "</td>";
            echo "<td>"; echo $row["numb_child"]; echo "</td>";
            echo "<td>"; echo $row["total_price"]; echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
}

function is_exist($co,$c,$h,$a,$chi,$n,$i,$d)
{
    $query=mysql_query("SELECT * FROM trips where details='$d'");
    $data=mysql_fetch_assoc($query);
    if($co==$data["country"] && $d=$data["details"])
    {
        return true;
    }else
        return false;
    
}
function trip_verify($co,$c,$h,$a,$chi,$n,$i,$d)
{
    
    if($co!=NULL && $c!=NULL && $h!=NULL && $a!=NULL && $chi!=NULL && $n!=NULL && $i!=NULL && $d!=NULL)
    {
        return true;
    }
    else
        return false;
    
}

function dream_verify($ti,$i1,$i2,$i3,$p,$ad,$d)
{
    if($ti!=NULL && $i1!=NULL && $i2!=NULL && $i3!=NULL && $p!=NULL && $ad!=NULL && $d!=NULL)
    {
        return true;
    }
    else
        return false;
}

function dream_exist($ti,$i1,$i2,$i3,$p,$ad,$d)
{
    $query=mysql_query("SELECT * FROM dreams where details='$d'");
    $data=mysql_fetch_assoc($query);
    if($ti==$data["name"] && $i1=$data["img1"] && $i2=$data["img2"]&& $i3=$data["img3"] && $p=$data["price"] && $ad=$data["address"])
    {
        return true;
    }else
        return false;
}

function hotel_exist($name, $city,$des)
{
   
     $query=mysql_query("SELECT name, city, description FROM hotels WHERE name='$name' AND city='$city' AND description='$des'");
    $data=mysql_fetch_assoc($query);
    if($data!=NULL)
    {
        return true;
    }else
        return false;
}

function hotel_not_empty($n,$c,$p,$w,$a,$ad,$sd,$ra,$nr,$np,$pl,$rt,$bh,$ga,$img,$des)
{
    if($n!=NULL && $c!=NULL && $p!=NULL && $w!=NULL && $a!=NULL && $ad!=NULL && $sd!=NULL && $ra!=NULL && $nr!=NULL && $np!=NULL && $pl!=NULL && $rt!=NULL && $bh!=NULL && $ga!=NULL  && $des!=NULL){
        return true;
    }else
        return false;
}
?>


 