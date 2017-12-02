var navbtn;
$(document).ready(function(){
navbtn = $("#navBtn");
navbtn.on("click", dropDown);
});

function dropDown(){
    var dropmenu = $("#dropMenu");
    if(dropmenu.css("visibility") == "hidden"){
        dropmenu.css("visibility","visible");
        navbtn.css("box-shadow", "0px 0px 0px");
        dropmenu.animate({width: "110px"},500);
    }
    else{
        dropmenu.css("visibility", "hidden");
        dropmenu.animate({width: "0px"},500);
        navbtn.css("box-shadow", "3px 3px 3px rgba(60,86,64,.7)");
    }
}