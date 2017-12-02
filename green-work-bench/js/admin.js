var unameIn;
var pwd;
var confrimpwd;
var validUname = false;
var validPwd = false;
var confirmedPwd = false;
$(document).ready(function(){
var showCreateUser = $("#create-user-btn");
var submitUser = $("#submit-new-user-btn");

unameIn = $("#newuname");
unameIn.on("input propertychange", checkUnameAvail);

$("#newpwd").on("input propertychange",function(){
    pwd = $("#newpwd").val();
    if(pwd.length > 0){
        if (pwd.length < 7){
            validPwd = false;
            $("#passValidity").attr("src", "../style/redx.png");
            $("#passConfirm").attr("src", "");
        }
        else {
            comparePasswords();
            validPwd = true;
            $("#passValidity").attr("src", "../style/gcheck.png");
            if($("#confirmpwd").val().length > 0){
                if(confirmedPwd){
                    $("#passConfirm").attr("src", "../style/gcheck.png");
                }
                else {
                    $("#passConfirm").attr("src", "../style/redx.png");
                }
        
            }
            else {
                $("#passConfirm").attr("src", "");
                confirmedPwd = false;
            }

        }
    }
    else{
        $("#passValidity").attr("src", "");
        validPwd = false;
    }
});

$("#confirmpwd").on("input propertychange",function(){
    comparePasswords();
    if($(this).val().length > 0){
        if(confirmedPwd){
            $("#passConfirm").attr("src", "../style/gcheck.png");
        }
        else {
            $("#passConfirm").attr("src", "../style/redx.png");
        }

    }
    else {
        $("#passConfirm").attr("src", "");
        confirmedPwd = false;
    }
});
//showCreateUser.on("click", showForm);
submitUser.on("click", submitNewUser);
});

function comparePasswords() {
    var pass1 = $("#newpwd").val();
    var pass2 = $("#confirmpwd").val();

    if(pass1 == pass2){
        confirmedPwd = true;
    }
    else {
        confirmedPwd = false;
    }
}

function checkUnameAvail(){
    if(unameIn.val().length < 7){
        if(unameIn.val().length > 0){
        $("#unameValidity").attr("src","../style/redx.png");
        }
        else{
            $("#unameValidity").attr("src","");
        }
        validUname = false;
        return;
    }
    else{
        var uname = unameIn.val();
    }
    $.ajax("adminDBI.php", {
        type: "POST",
        data: {
            usern: uname,
            method: "isUnameValid"
        },
        success: function(data){
            console.log("ajax success");
            console.log(data);
            if(data == "true"){
                $("#unameValidity").attr("src","../style/gcheck.png");
                validUname = true;
            }
            else{
                $("#unameValidity").attr("src","../style/redx.png");
                validUname = false;
            }
        }

    });

}

function submitNewUser(){
    if(validUname && validPwd && confirmedPwd){
        var fname = $("#newfname").val();
        var lname = $("#newlname").val();
        var uname = $("#newuname").val();
        console.log(uname);
        var pwd = $("#newpwd").val();
        var priviledge = $("#userPriv").val();
    
        $.ajax("adminDBI.php", {
            type: "POST",
            data: {
                first: fname,
                last: lname,
                usern: uname,
                pass: pwd,
                priv: priviledge,
                method: "insertUser"
            },
            success: function(){
                $("#newUserNotification").html("User Successfully Added");
                 $("#newfname").val('');
                $("#newlname").val('');
                 $("#newuname").val('');
                 $("#newpwd").val('');
                 $("#confirmpwd").val('');
                 $("#unameValiditySpan").html("");
                 $("#passValidity").html("");

            }
    
        });

    }
    else{
        $("#newUserNotification").html("User Was Not Added");
    }
   
}



