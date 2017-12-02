<?php
$user = 'root';
$host = 'localhost';
$dbname = 'greenfee';
$password = '';
$dsn = 'mysql:host='.$host.';dbname='.$dbname;
$pdo = new PDO($dsn, $user); //creates new PDO instance
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$anstype = "review";
if($pdo){
    $alldata = $_POST["forminputs"];
    $rating = $alldata[0]["rating"];
    $comment = $alldata[1]["comment"];
    $qid = $alldata[2]["qid"];
    $userid = $alldata[3]["userid"];
    $projid = $alldata[4]["projectid"];
    echo $rating.",".$comment.",".$qid.",".$userid.",".$projid.",".$anstype;
    $insert = "INSERT INTO answer (user_id,question_id,project_id,answer,comment, anstype) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($insert);
    $stmt->bindParam(1,$userid);
    $stmt->bindParam(2,$qid);
    $stmt->bindParam(3,$projid);
    $stmt->bindParam(4,$rating);
    $stmt->bindParam(5,$comment);
    $stmt->bindParam(6,$anstype);
    $stmt->execute();
}
else{
    die();
}
?>