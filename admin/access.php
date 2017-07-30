<html>
    <head>
        <title>login</title>
        <link href="css/adm_log.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        
        <?php  if(!isset($_SESSION))
        {
            session_start();    
        }
        
        if(isset($_SESSION["name"]))
            header("Location: admin/admin.php");
            
        ?>
        <div id="EnterWindow">
            <h1>Welcome</h1>
            <h3>Enter your login and password</h3>
            <div id="enterLines">
              <form action="admin/adm_log_action.php"  method="post">
               <label for="login">Login:</label>
                <input type="text" id="login" style="height:30px; margin-left:22px; width: 150px;" name="login">
                <br /> <br />
                <label for="password">Password:</label>
                <input type="password" id="password" name="password"><br />
                <input type="submit">
                </form>
            </div>
           <?php 
       
            if (isset($_SESSION["message"]))
            {
            ?>
            <div id="message"><?=$_SESSION["message"]?></div>
            <?php
                unset($_SESSION["message"]);
            }
                ?>
        </div>
        
    </body>
    
</html>