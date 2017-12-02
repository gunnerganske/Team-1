<?php session_start();
    if($_SESSION["loggedIn"] == false || !isset($_SESSION["loggedIn"])){
        exit();
    }
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <script src="../js/jq.js"></script>
        <link href="../style/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
       <script src="../style/bootstrap/js/bootstrap.min.js"></script> 
        <script src="../js/dropdown.js"></script>
        <script src="../js/admin.js"></script>
        <link href="../style/styles.css" rel="stylesheet" type="text/css">
        <title>Green Fee: Workbench</title>
    </head>
    <body>
        <header></header>
        <main>
            <div id="createUser">
                <input id="newfname" type="text" name="fname" placeholder="First Name"><br>
                <input id="newlname"type="text" name="lname" placeholder="Last Name"><br>
                <input id="newuname" type="text" name="uname" placeholder="User Name"><img class="userValidityico" id="unameValidity" src=""><br>
                <input id="newpwd" type="password" name="pwd" placeholder="Password (7+ characters)"><img class="userValidityico" id="passValidity" src=""><br>
                <input id="confirmpwd" type="password" name="confirmpwd" placeholder="Re-Enter Password"><img class="userValidityico" id="passConfirm" src=""><br>
                <select id="userPriv">
                    <option value="admin">Admin</option>
                    <option value="nonadmin">Non Admin</option>
                </select><br>
                <button id="submit-new-user-btn" class="admin-submit-btn">Submit</button><br>
                <span id="newUserNotification"></span>
            </div>
        </main>
        <footer></footer>
    </body>
</html>