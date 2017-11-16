
 // PAGE ANIMATE (PANEL SLIDING)
 var revpanel;
  var searchpanel;
  var searchbtn;
  var reviewbtn;
  var centerpanel;
  var centerheader;
$(document).ready(function() {
    revpanel = $("#questionsdiv");
    searchpanel = $("#searchdiv");
    searchbtn = $("#btn1");
    reviewbtn = $("#btn2");
    centerpanel = $("#centerdiv");
    centerheader = $("#header");
    searchbtn.click(shiftRight);
    reviewbtn.click(shiftLeft);
    revpanel.animate({width: "0%"}, 0);
    centerpanel.css("width", "75%");
    
    
});
function shiftRight() {
        searchpanel.animate({width: "25%"}, 500);
        centerpanel.animate({width: "75%"}, 500);
        centerheader.animate({width: "100%"}, 500);
        revpanel.animate({width: "0%"}, 500);
       
}
function shiftLeft() {
    revpanel.animate({width: "40%"}, 500);
    centerpanel.animate({width: "60%" }, 500);
    centerheader.animate({width: "100%"}, 500);
    searchpanel.animate({width: "0%"}, 500);
}

//AJAX
var activebtn;
var i = 0;
$(document).ready(function() {
    activebtn = $(".projectnav");
    for(i; i < count(activebtn); i++){
        activebtn[i].click(makeRequest); //Adds listener to the list of project buttons
    }

    function makeRequest(){ //initiate ajax request
        var $this = $(this);
        var projectid = $this.val();
        // Call to dbinterface to retrieve project description
        $.ajax({ 
            url: 'dbinterface.php',
            type: 'POST',
            data:{id:projectid},
            dataType: 'json',
            success: function (data){
                var project = JSON.parse(data);
                title = project.title;
                // set variables equal to all the different project attributes
                //set paragraphs within centerdiv to those attribute values
            }
        });
        // Call to form to let the form know which project it is reviewing
        $.ajax({
            url: 'form.php',
            type: 'POST',
            data:{id:projectid},
        });
    }


});