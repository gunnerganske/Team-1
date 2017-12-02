
<?php session_start();
if(!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] == false){
    exit();
}
$userid = $_SESSION["userid"];
if(isset($_POST["projectid"])){
    $projid = $_POST["projectid"];
}
include "workbenchDBI.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <script src="../js/jq.js"></script>
        <link href="../style/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
      <!-- <script src="style/bootstrap/js/bootstrap.min.js"></script> -->
        <script src="../js/workbench.js"></script>
        <script src="../js/dropdown.js"></script>
        <link href="../style/styles.css" rel="stylesheet" type="text/css">
        <title>Green Fee: Workbench</title>
    </head>
    <body id="mainbody">
       
            <div id="searchdiv">
                <div id="search-criteria-div">
                    <h4 class="sideHead">Proposal Search</h4>
                    Search By:
                    <select id="searchType">
                        <option value="byTitle">Title</option>
                        <option value="byId">Project ID</option>
                    </select>
                    <input type="text" id="searchQuery" placeholder="Search Projects"><br>
                </div>
                <hr>
                <div id="projectWrapper">
                    <?php $projects = getProjects(); ?>
                        <input type="hidden" id="init-proj-id" value="<?print $projects[0]["id"];?>">
                    <?php foreach ($projects as $project) { ?>
                            <div class="project-select-form">
                                <button class="projectnav" value="<?print $project["id"];?>"><span id="name-on-button"><?print $project["title"];?></span> <span id="date-on-button"><?print $project["pdate"];?></span></button><br>
                                <input type="hidden" id="proj-title" value="<?print $project["title"];?>">
                            </div>                
                        <? }?> 
                 </div>
            </div>
                
            <div id="centerdiv">
                <div id="header">
                    <?php 
                          if ($_SESSION["isAdmin"] == 1){include "adminNav.php";}
                          else{include "nav.php";} 
                    ?>
                    <h6 id="return-greeting"><?php print "WELCOME ".strtoupper($_SESSION["fname"])."."; ?></h6>
                    <hr id="header-hr">
                    <h1 id="project-details-header">Project Details</h1>
                    
                </div>
                <div id="confirm-ico-wrap"> 
                    <img id="confirmico" src="../style/confirmico.png" alt="Confirm"> 
                 </div>
                <div id="load">
                
                 <?php $initdescript = getProjectDescription($firstID);
                        print $initdescript; ?>
                </div>
                
                <footer>
                <div id="foot-nav-button-wrap">
                </div>
                <button id="to-review">Review</button>
            <div class="container-fluid">
                <div class="row content">
                    <div class="col-3 col-sm-4 col-md-4"></div>
                    <div class="col-6 col-sm-4 col-md-4 text-center">
                        <br>
                        Computer Science Department
                        <br>
                        Winona State University
                        <br>
                        &copy; 2017
                    </div>
                    <div class="col-3 col-sm-4 col-md-4"></div>
                </div>
            </div>
        </footer>
            </div>
            <div id="questionsdiv" class="">
                <h4 class="sideHead2">Proposal Review</h4>
                <?php include "reviewform.php" ?>
            </div>
        </main>
    </body>
</html>