<?php
if (!isset($_SESSION))
           session_start();
require_once ("scripts/app_config.php");
#return true if password is correct
function is_password_correct($login,$password)
{
    db_connect();
    $query = mysql_query("SELECT name,login,password FROM admins WHERE login='$login'");
     $data=mysql_fetch_assoc($query);
 
        if($data['password']==$password && $data['password']!=null)
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
 $pass=$data['password'];
     
    $dec_password=decr($pass);
    $val=trim($dec_password);
        if($val==$password && $val!==0)
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

    function get_trip($id)
    {
    
        db_connect();
        
        $query = mysql_query("SELECT * FROM `trips`
FULL OUTER JOIN `hotels`
ON `trips`.`hotel` = `hotels`.`name` WHERE 'trips'.'trip_id'=$id");
     $data=mysql_fetch_assoc($query);
        
        
        
        
    }


function overall_trip($table, $id, $col)
{
    $result = mysql_query("SELECT Avg(score) AS averageScore FROM $table WHERE $col='$id'");
    $data=mysql_fetch_assoc($result);
    return $data["averageScore"];
}

function encr($plaintext)
    {
        $key = pack('H*', "aec45b7e103a0cd8b54763051cef08bc55abe029fdebae5e1d417e2ffb2a00a3");
    $key_size =  strlen($key);
    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $encrpttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key,$plaintext, MCRYPT_MODE_CBC, $iv);
    $encrpttext = $iv . $encrpttext;
    $encrpttext_base64 = base64_encode($encrpttext);
      return $encrpttext_base64;  
    }

function decr($dectext)
{
    $key = pack('H*', "aec45b7e103a0cd8b54763051cef08bc55abe029fdebae5e1d417e2ffb2a00a3");
     $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
    $decrpttext_dec = base64_decode($dectext);
    $iv_dec = substr($decrpttext_dec, 0, $iv_size);
    $decrpttext_dec = substr($decrpttext_dec, $iv_size);
    $plaintext_dec = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key,
                                    $decrpttext_dec, MCRYPT_MODE_CBC, $iv_dec);
    return $plaintext_dec;
}
?>


 