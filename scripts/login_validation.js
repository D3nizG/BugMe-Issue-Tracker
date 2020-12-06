"use strict"

window.addEventListener("load", function(){
    validate()
})



function validate() {
    var valid = true;
    var pattern = "^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$"
    document.getElementById("email").innerHTML = "";
            // console.log(document.getElementById("email").innerHTML="hello")
    document.getElementById("password").innerHTML = "";
    
    var email = document.getElementById("email").value;
            // console.log(email)
    var password = document.getElementById("password").value;

    if(email == "") 
        {
            document.getElementById("email").innerHTML = "required";
            valid = false;
        }
    if(password == "") 
        {
            document.getElementById("password").innerHTML = "required";
            valid = false;
        }

    return valid;
}