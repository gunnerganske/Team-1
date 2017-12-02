<?php
  $user = 'root';
  $host = 'localhost';
  $dbname = 'greenfee';
  $password = '';
  $dsn = 'mysql:host='.$host.';dbname='.$dbname;
  $pdo = new PDO($dsn, $user);
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
  if ($pdo){
    if(isset($_POST["passed"])){
        $recievedVal = $_POST["passed"];
        $calledMethod = $_POST["method"];
  
        if($calledMethod === trim("getProjectDescription")){
            getProjectDescription($recievedVal);
        }
        elseif($calledMethod === trim("searchProjects")) {
              $searchtype = $_POST["type"];
              searchProjects($recievedVal, $searchtype);
              
        } 
      }

  }
  else{
     die();
  }


  function getProjects(){
      global $pdo;
      $sql = 'SELECT id, user_id, title, pdate FROM project';
      $stmt = $pdo->prepare($sql);
      $stmt-> execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  function getProjectDescription($anId){
      global $pdo;
      $qtype = 'propose';
      $sql1 = 'SELECT DISTINCT q_text, comment FROM question NATURAL JOIN answer WHERE project_id = ? AND `type` = ?';
      $sql2 = 'SELECT title, id, amount, contact_name, user_id  FROM project WHERE id = ?';
      $sql3 = 'SELECT email, phone_primary  FROM user WHERE id = ?';
      $stmt1 = $pdo->prepare($sql1);
      $stmt2 = $pdo->prepare($sql2);
      $stmt3 = $pdo->prepare($sql3);
      $stmt1->execute([$anId, $qtype]);
      $stmt2->execute([$anId]);
      $results1 = $stmt1-> fetchAll(PDO::FETCH_ASSOC);
      $results2 = $stmt2-> fetch(PDO::FETCH_ASSOC);
      $stmt3->execute([$results2["user_id"]]);
      $results3 = $stmt3->fetch(PDO::FETCH_ASSOC);
      print '<h3 id="project-title-header">'.$results2["title"]."</h3>";
      print "<span class=\"proj-detail-span\" id=\"project-id-span\">Project ID: ".$results2["id"]."</span><br>";
      print "<span class=\"proj-detail-span\" id=\"project-amtrequest-span\">Budget Requested: $".$results2["amount"]."</span><br>";
      print "<span class=\"proj-detail-span\" id=\"contact-name-span\">Contact Name: ".$results2["contact_name"]."</span><br>";
      print "<span class=\"proj-detail-span\" id=\"contact-email-span\">Contact Email: ".$results3["email"]."</span><br>";
      print "<span class=\"proj-detail-span\" id=\"contact-phone-span\">Contact Phone#: ".$results3["phone_primary"]."</span><br>";
      foreach ($results1 as $result){
                print "<span class=\"question-text\">".$result["q_text"]."</span> <br> <span class=\"qeustion-answer\">".$result["comment"]."</span><hr>";
      }
  }

  function searchProjects($aQueryString, $searchType){
    global $pdo;
    $finalQuery = '%'.$aQueryString.'%';
    if($searchType === trim("byTitle")){
        $sql = 'SELECT id, user_id, title, pdate FROM project WHERE title LIKE ?';
        $stmt = $pdo->prepare($sql);
        $stmt-> execute([$finalQuery]);

    }
    else{
        $sql = 'SELECT id, user_id, title, pdate FROM project WHERE id LIKE ?';
        $stmt = $pdo->prepare($sql);
        $stmt-> execute([$finalQuery]);
    }
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $result){
            print "<div class=\"project-select-form\">";
            print "<button class=\"projectnav\" value=\"".$result["id"]."\"><span id=\"name-on-button\">".$result["title"]."</span> <span id=\"date-on-button\">".$result["pdate"]."</span></button><br>";
            print "<input type=\"hidden\" id=\"proposed-by\" value=\"".$result["user_id"]."\">";
            print "<input type=\"hidden\" id=\"proj-title\" value=\"".$result["title"]."\">";
            print "</div>";
        }
    
  }
?>