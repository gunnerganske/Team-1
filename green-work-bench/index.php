
<?php
    $user = 'root';
    $host = 'localhost';
    $dbname = 'greenfee';
    $password = '';
    $dsn = 'mysql:host='.$host.';dbname='.$dbname;
    $pdo = new PDO($dsn, $user);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    function getProjects(){
        global $pdo;
        $sql = 'SELECT id, title, pdate FROM project';
        $stmt = $pdo->prepare($sql);
        $stmt-> execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link href="style/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <script src="style/bootstrap/js/bootstrap.min.js"></script>
        <script src="jq.js"></script>
        <script src="accordion.js"></script>
        <script src="handler.js"></script>
        <link href="styles.css" rel="stylesheet" type="text/css">
        <title>Green Fee: Workbench</title>
    </head>
    <body>
       
            <div id="searchdiv">
                <h4>Proposal Search</h4>
                <input type="text" value="search"><br>
                <?php $projects = getProjects();
                      foreach ($projects as $project) { 
                          ?>
                        <form class="project-select-form" method="post">
                            <button class="projectnav" value="<?print $project["id"];?>"><span id="name-on-button"><?print $project["title"];?></span> <span id="date-on-button"><?print $project["pdate"];?></span></button><br>
                        </form>                
                      <? }?>
            </div>
                
            <div id="centerdiv">
                <div id="header">
                    <button id="btn1">search</button>
                    <button id="btn2">review</button>
                    <h3>Project Details</h3>
                    <p id="titlepara">
                    </p>
                    <p id=""

                </div>
                <footer>
            <div class="container-fluid">
                <div class="row content">
                    <div class="col-3 col-sm-4 col-md-5"></div>
                    <div class="col-6 col-sm-4 col-md-2 text-center">
                        <img src="../style/winonaLogo.png" alt="Winona Logo">
                        <br>
                        Computer Science Department
                    </div>
                    <div class="col-3 col-sm-4 col-md-5"></div>
                </div>
            </div>
        </footer>
            </div>
            <div id="questionsdiv">
                <h4>Proposal Review</h4>
                <?php include "form.php" ?>
            </div>
        </main>
    </body>
</html>