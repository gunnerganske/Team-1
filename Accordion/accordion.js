
var temp = null;
$(document).ready(function ($){
    var panels = $(".accordion > dd").hide();
    $(".accordion > dt > a").click(function(){
        
        var $this = $(this);
        panels.slideUp();
        var temp1 = $this.parent().children().html() + "";
        if(temp == null || temp != temp1){
        	$this.parent().next().slideDown();
        	temp = String($this.parent().children().html() + "");
        }
        else{temp = null;}
        return false;
    });

});









