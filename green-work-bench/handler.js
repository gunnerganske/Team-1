
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

