
 // PAGE ANIMATE (PANEL SLIDING)
    var revpanel;
  var searchpanel;
  var searchbtntop;
  var reviewbtntop;
  var searchbtnbot;
  var reviewbtnbot;
  var centerpanel;
  var centerheader;
  var activebtn;
  var proposed_by;
  var proj_title;
  var toReview;
  var subReview;
  var projIdInputs;
$(document).ready(function() {
    revpanel = $("#questionsdiv");
    searchpanel = $("#searchdiv");
    searchbtntop = $("#arrow-search-top");
    reviewbtntop = $("#arrow-review-top");
    searchbtnbot = $("#arrow-search-bottom");
    reviewbtnbot = $("#arrow-review-bottom");
    centerpanel = $("#centerdiv");
    centerheader = $("#header");
    toReview = $("#to-review");
    subReview = $("#")
    toReview.click(shiftLeft);
    searchbtntop.click(shiftRight);
    reviewbtntop.click(shiftLeft);
    searchbtnbot.click(shiftRight);
    reviewbtnbot.click(shiftLeft);
    revpanel.animate({width: "0%"}, 0);
    centerpanel.css("width", "75%");
    $(".proj-id-input").each(function(){
        $(this).attr("value",$("#init-proj-id").val());
    });
    makeDescriptionRequest($("#init-proj-id").val());

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

//AJAX for project descriptions
$(".projectnav").on("click", function(){
    var projid = $(this).val();
    makeDescriptionRequest(projid);
    $(".proj-id-input").each(function(){
        $(this).attr("value",projid);
    });
});

function makeDescriptionRequest(aProjId){ //initiate ajax request
    // Call to dbinterface to retrieve project description
    $.ajax('../php/workbenchDBI.php',{ 
            type: 'POST',
            data:{ passed: aProjId,
                   method: "getProjectDescription"},
            success: function (descriptions){
                    $("#load").html(descriptions);
                    // let userid = $("#proposed-by").val();
                    // sendProjectData(aProjId); //once the project description is loaded a second ajax funtion is called to pass info to the review form
            }
    });
}
 //AJAX for project search
 $("#searchQuery").on("input propertychange", function(){
     let searchstring = $(this).val();
     let searchtype = $("#searchType").val();
     searchRequest(searchstring, searchtype);

 })

 function searchRequest(string, type){
     $.ajax("../php/workbenchDBI.php",{
            type: 'POST',
            data: {
                passed: string,
                type: type,
                method: "searchProjects"
            },
            success: function (data) {
                $("#projectWrapper").html("");
                $("#projectWrapper").html(data);
                $(".projectnav").on("click", function(){
                    let projid = $(this).val();
                    makeDescriptionRequest(projid);
                });
            }
     });
 }



}); 

