<?php 
session_start();
$_SESSION["loggedIn"] = false;
if(isset($_POST["uname"]) && isset($_POST["uname"])){
    $redirect = "workbench.php";
    $user = 'root';
    $host = 'localhost';
    $dbname = 'greenfee';
    $password = '';
    $dsn = 'mysql:host='.$host.';dbname='.$dbname;
    $pdo = new PDO($dsn, $user);

    if($pdo){
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $uname =  $_POST["uname"];
        $password = $_POST["password"];

        $sql = "SELECT u_name, pwd, f_name, id FROM user WHERE u_name = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$uname]);
        $rs = $stmt->fetch();
        if ($rs){
             if($password === $rs->pwd){
                 $_SESSION["fname"] = $rs->f_name;
                 $_SESSION["userid"] = $rs->id;
                 $_SESSION["uname"] = $rs->u_name;
                 $_SESSION["loggedIn"] = true;
                 unset($_POST);
                die('<script type="text/javascript">window.location.href="' . $redirect . '";</script>');
             }
            }
        }

        
}

?>   
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <script src="js/jq.js"></script>
        <link href="style/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
      <!-- <script src="style/bootstrap/js/bootstrap.min.js"></script> -->
        <link href="style/styles.css" rel="stylesheet" type="text/css">
        <title>Green Fee: Workbench</title>
    </head>
    <body id="loginbody">
       
        <form id="logform" action="index.php" method="post">
            <input class="loginput" type="text" name="uname" placeholder="Username"><br>
            <input class="loginput" type="password" name="password" placeholder="Password"><br>
            <input id="login-submit" type="submit" value="Login">
            <?php
                if(isset($_POST["uname"]) && isset($_POST["password"])){
                    if (!$rs){
                        print "unknown user";
                    }
                    else{
                        print "invalid password";
                    } 
                }?>
        </form>
    </body>
</html>