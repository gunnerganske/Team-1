var NUM_OF_QUESTIONS = 12;
var revpanel;
var searchpanel;
var centerpanel;
var centerheader;
$(document).ready(function ($){

    revpanel = $("#questionsdiv");
    searchpanel = $("#searchdiv");
    centerpanel = $("#centerdiv");
    centerheader = $("#header");


    //SUBMIT FORMS TO DATABASE
    var forms = [];
    var inputs = [];
    $("#submitReview").on("click", function(){
         for(var i = 0; i < NUM_OF_QUESTIONS-1; i++ ){
            forms.push($("#form"+[i]));
         }
        for(var i = 0; i <= forms.length - 2; i++){
            let form = forms[i].serializeArray();
            var formData = pair(form);
                $.ajax({
                    data: {forminputs: formData},
                    type: "post",
                    url: "reviewformDBI.php",
                    success: function(data) {

                }
            });
        }
        searchpanel.animate({width: "25%"}, 500);
        centerpanel.animate({width: "75%"}, 500);
        centerheader.animate({width: "100%"}, 500);
        revpanel.animate({width: "0%"}, 500);
        var lastform = forms[forms.length-1].serializeArray();
        formData = pair(lastform);
        $.ajax({
            data: {forminputs: formData},
            type: "post",
            url: "reviewformDBI.php",
            success: function(data) {
                for (var i = 0; i < forms.length; i++){
                    forms[i].trigger("reset");
                }
                $("#hidden").animate({opacity: 1.0},1000);
                $("#hidden").css({"height":"100%","width":"100%"});
                setTimeout(function(){
                     $("#hidden").css("opacity","0.0");
                    $("#hidden").css({"height":"100px","width":"100px"});
                },1501);

        }
        
    });
    
});
 //
 
 
 });

 function pair(serialForm){
     var result = []
    var temp = {};
     for(var i = 0; i < serialForm.length; i++){
        var temp = {};
        temp[serialForm[i]["name"]]= serialForm[i]["value"] ;
        result.push(temp);
     }
     return result;
 }
