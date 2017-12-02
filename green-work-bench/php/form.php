	
    <?php 
       if (isset($_POST["userid"]) && isset($_POST["projectid"])){ 
               $result1 = $_POST["userid"];
              $result2 = $_POST["projectid"];

              echo $result1." ".$result2;
             }
    ?> 
    <body>
		<main>
            <h3 class="text-center">High Priority Criteria</h3>
            <hr>
			<form>
                <div class="container-fluid">
				    <dl class="accordion">
                        <!--==============================================================================-->
				        <dt><a href="">Student Experience</a></dt>
                        <dd>
                            <div class="row content">
                                <div class="col-md-7 col">
                                    <p>
                                        Project includes opportunities for student involvement and/or will positively impact the student experience.
                                    </p>
                                </div>
                                <div class="col-md-5 col text-left">
                                    <input type="radio" name="q1" value="excellent"><label>Excellent</label><br>
                                    <input type="radio" name="q1" value="veryGood"><label>Very Good</label><br>
                                    <input type="radio" name="q1" value="good"><label>Good</label><br>
                                    <input type="radio" name="q1" value="fair"><label>Fair</label><br>
                                    <input type="radio" name="q1" value="minimal"><label>Minimal</label><br>
                                    <input type="radio" name="q1" value="na"><label>NA</label><br>
                                </div>
                            </div>
                            <div class="row content">
                                <div class="col-md-12 col text-left">
                                    Comments:<br>
                                    <textarea name="comment1"></textarea>
                                </div>
                            </div>
                        </dd>
                        <!--===================================================================================-->
				        <dt><a href="">Connection to Campus</a></dt>
                        <dd>
                            <div class="row content">
                                <div class="col-md-7 col">
                                    <p>
                                        Project directly addresses environmental sustainability on the WSU campus or in the capacity that on-campus activities directly influence environmental sustainability in the surrounding community.
                                    </p>
                                </div>
                                <div class="col-md-5 col text-left">
                                    <input type="radio" name="q2" value="excellent"><label>Excellent</label><br>
                                    <input type="radio" name="q2" value="veryGood"><label>Very Good</label><br>
                                    <input type="radio" name="q2" value="good"><label>Good</label><br>
                                    <input type="radio" name="q2" value="fair"><label>Fair</label><br>
                                    <input type="radio" name="q2" value="minimal"><label>Minimal</label><br>
                                    <input type="radio" name="q2" value="na"><label>NA</label><br>
                                </div>
                            </div>
                            <div class="row content">
                                <div class="col-md-12 col text-left">
                                    Comments:<br>
                                    <textarea name="comment2"></textarea>
                                </div>
                            </div>
				        </dd>
				        <dt><a href="">Feasibility and Institutional Support</a></dt>
                        <dd>
                            <div class="row content">
                                <div class="col-md-7 col">
                                    <p>
                                        Project is feasible and has support from appropriate campus individuals and entities. Individual students or student organizations must have the signature of a faculty or staff advisor who is committed to advising throughout project implementation.
                                    </p>
                                </div>
                                <div class="col-md-5 col text-left">
                                    <input type="radio" name="q3" value="excellent"><label>Excellent</label><br>
                                    <input type="radio" name="q3" value="veryGood"><label>Very Good</label><br>
                                    <input type="radio" name="q3" value="good"><label>Good</label><br>
                                    <input type="radio" name="q3" value="fair"><label>Fair</label><br>
                                    <input type="radio" name="q3" value="minimal"><label>Minimal</label><br>
                                    <input type="radio" name="q3" value="na"><label>NA</label><br>
                                </div>
                            </div>
                            <div class="row content">
                                <div class="col-md-12 col text-left">
                                    Comments:<br>
                                    <textarea name="comment3"></textarea>
                                </div>
                            </div>
				        </dd>
                        <dt><a href="">Appropriateness of Schedule and Budget Request</a></dt>
                        <dd>
                            <div class="row content">
                                <div class="col-md-7 col">
                                    <p>
                                        Project schedule and budget are reasonable and conform to established timelines, constraints and parameters.
                                    </p>
                                </div>
                                <div class="col-md-5 col text-left">
                                    <input type="radio" name="q4" value="excellent"><label>Excellent</label><br>
                                    <input type="radio" name="q4" value="veryGood"><label>Very Good</label><br>
                                    <input type="radio" name="q4" value="good"><label>Good</label><br>
                                    <input type="radio" name="q4" value="fair"><label>Fair</label><br>
                                    <input type="radio" name="q4" value="minimal"><label>Minimal</label><br>
                                    <input type="radio" name="q4" value="na"><label>NA</label><br>
                                </div>
                            </div>
                            <div class="row content">
                                <div class="col-md-12 col text-left">
                                    Comments:<br>
                                    <textarea name="comment4"></textarea>
                                </div>
                            </div>
				        </dd>
                        <dt><a href="">Accountability</a></dt>
                        <dd>
                            <div class="row content">
                                <div class="col-md-7 col">
                                    <p>
                                        Project includes mechanism for evaluation and follow-up. At a minimum, a project plan includes appropriate progress reports to the Sustainability Committee based on the duration of the project and a final report within 60 days following completion of the project.
                                    </p>
                                </div>
                                <div class="col-md-5 col text-left">
                                    <input type="radio" name="q5" value="excellent"><label>Excellent</label><br>
                                    <input type="radio" name="q5" value="veryGood"><label>Very Good</label><br>
                                    <input type="radio" name="q5" value="good"><label>Good</label><br>
                                    <input type="radio" name="q5" value="fair"><label>Fair</label><br>
                                    <input type="radio" name="q5" value="minimal"><label>Minimal</label><br>
                                    <input type="radio" name="q5" value="na"><label>NA</label><br>
                                </div>
                            </div>
                            <div class="row content">
                                <div class="col-md-12 col text-left">
                                    Comments:<br>
                                    <textarea name="comment5"></textarea>
                                </div>
                            </div>
				        </dd>
                    </dl>
                </div>
			</form>
		</main>
	</body>



