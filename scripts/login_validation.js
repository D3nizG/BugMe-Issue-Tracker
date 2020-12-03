window.onload = function() {
    var httpRequest;
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var loginBtn = document.getElementById("loginBtn");

    loginBtn.onclick = login;
    
    function login() {
        event.preventDefault();

        if(email.value === "" || password.value === "") {
            alert("Please fill in all fields before submission!");
            return;
        }

        httpRequest = new XMLHttpRequest();
        var url = "scripts/login.php";
        httpRequest.onreadystatechange = processLogin;
        httpRequest.open('POST', url);
        httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        httpRequest.send('email=' + encodeURIComponent(email.value) + "&password=" + encodeURIComponent(password.value));
    }

    function processLogin() {
        if (httpRequest.readyState === XMLHttpRequest.DONE) {
            if (httpRequest.status === 200) {
                var response = httpRequest.responseText;
                if(response === "true") {
                    alert("Login successful");
                    window.location = "home.php";
                } else {
                    alert("Invalid Credentials!");
                }
            } else {
                alert('There was a problem with the request.');
            }
        }
    }
}

// function validate() {
//     var valid = true;
//     document.getElementById("email").innerHTML = "";
//     document.getElementById("pword").innerHTML = "";
    
//     var email = document.getElementById("email").value;
//     var password = document.getElementById("pword").value;
//     if(email == "") 
//     {
//         document.getElementById("email").innerHTML = "required";
//         $valid = false;
//     }
//     if(password == "") 
//     {
//         document.getElementById("pword").innerHTML = "required";
//         valid = false;
//     }
// }
//     return $valid;