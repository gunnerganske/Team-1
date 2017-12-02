<?php
  $user = 'root';
  $host = 'localhost';
  $dbname = 'greenfee';
  $password = '';
  $dsn = 'mysql:host='.$host.';dbname='.$dbname;
  $pdo = new PDO($dsn, $user);
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
  if ($pdo){
    if(isset($_POST["usern"])){
        $recievedUname = $_POST["usern"];
        $calledMethod = $_POST["method"];
  
        if($calledMethod === trim("isUnameValid")){
            isUnameValid($recievedUname);
        }
        elseif($calledMethod === trim("insertUser")) {
              $fname = $_POST["first"];
              $lname = $_POST["last"];
              $uname = $_POST["usern"];
              $pwd = $_POST["pass"];
              $priv = $_POST["priv"];

              insertUser($fname, $lname, $uname, $pwd, $priv);
        } 
      }

  }
  else{
     die();
  }


  function isUnameValid($aUname){
      global $pdo;
      $checkUname = $aUname;
      $sql = 'SELECT * FROM user WHERE u_name = ?';
      $stmt = $pdo->prepare($sql);
      $stmt->execute([$checkUname]);

      $rs = $stmt->fetch();
    
      if(!$rs){
            print "true";
        }
        else{
            print "false";
        }
  }

  function insertUser($afname, $alname, $auname, $apwd, $apriv){
    global $pdo;
    if ($apriv == "admin"){
        $apriv = 1;
    } else {
        $apriv = 0;
    }
    $sql = 'INSERT INTO user (u_name, pwd, f_name, l_name, priviledge) VALUES (?,?,?,?,?)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$auname, $apwd, $afname,$alname,$apriv]);
  }
  ?>