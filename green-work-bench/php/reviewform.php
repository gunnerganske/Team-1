	<?php
    if(!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] == false){
        exit();
    }
	$user = 'root';
    $host = 'localhost';
    $dbname = 'greenfee';
    $password = '';
    $dsn = 'mysql:host='.$host.';dbname='.$dbname;

    $pdo = new PDO($dsn, $user); //creates new PDO instance
    if (!$pdo){
        alert("Problem connecting to the database");
    }
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $question = $pdo->query('SELECT * FROM question WHERE type="review"');
    //$answer = $pdo->query('SELECT * FROM answer WHERE question_id in (SELECT id FROM question WHERE type="propose") AND user_id='.$userid.' AND project_id='.$projectid);
    ?>
	<body>
       
		<main>
            <script src="../js/reviewform.js"></script>
            <script src="../js/accordion.js"></script>
            <h3 class="text-center">High Priority Criteria</h3>
                <div class="container-fluid">
                <!-- <div id="hidden"><img src="../style/greenfeecheck.png" alt="confirmation">
                    <h1>Review Submitted</h1>
                </div> -->
                    <div class="row content">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
				    <dl class="accordion">
				    <?php
                    $i = 0;
				    foreach($question as $row){
				    $temp = explode(" - ", $row->q_text);
				    ?>
                        <dt><a href=""><?php print $temp[0] ?></a></dt>
                       
                        <dd>
                            <div class="row content">
                                <div class="col-md-7 col">
                                    <p>
                                        <?php print $temp[1] ?>
                                    </p>
                                 </div>
                                 <form id="<?print "form".$i?>" method="post">
                                    <div class="col-md-5 col">
                                        <input name="rating" type="radio" value="5"><label>Excellent</label><br>
                                        <input name="rating" type="radio" value="4"><label>Very Good</label><br>
                                        <input name="rating" type="radio" value="3"><label>Good</label><br>
                                        <input name="rating" type="radio" value="2"><label>Fair</label><br>
                                        <input name="rating" type="radio" value="1"><label>Minimal</label><br>
                                        <input name="rating" type="radio" value="0"><label>NA</label><br>
                                    </div>
                                </div>
                                <div class="row content">
                                    <div class="col-md-12 col text-left">
                                    Comments:<br>
                                    <textarea name="comment"></textarea>
                                    </div>
                                </div>
                                <input type="hidden" name="qid" value="<? print $row->id?>">
                               
                                <input type="hidden" name="userid" value="<?php print $userid ?>">
                                <input type="hidden" name="projectid" value="<?php print $projectid ?>">
                    </form>    
                            
                        </dd> 
                              
				    <?php 
                        $i = $i + 1;
                    }?>
                    <button id="submitReview">Submit</button>
                    </dl>
                    </div>
                    <p id="test"></p>
                    <div class="col-md-1"></div>
                    </div>
                </div>
        </main>
        
	</body>



