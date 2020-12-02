function validate() {
    var valid = true;
    document.getElementById("email").innerHTML = "";
    document.getElementById("pword").innerHTML = "";
    
    var email = document.getElementById("email").value;
    var password = document.getElementById("pword").value;
    if(email == "") 
    {
        document.getElementById("email").innerHTML = "required";
        $valid = false;
    }
    if(password == "") 
    {
        document.getElementById("pword").innerHTML = "required";
        valid = false;
    }
}
    return $valid;