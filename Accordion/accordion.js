

$(document).ready(function ($){
    var panels = $(".accordion > dd").hide();

    

    $(".accordion > dt > a").click(function(){
        
        var $this = $(this);

        panels.slideUp();

        $this.parent().next().slideDown();
        return false;
    });

});









