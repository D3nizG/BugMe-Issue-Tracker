function validate() {
    
    var firstName = document.forms['adduserForm']["fname"].value;
    var lastName = document.forms['adduserForm']["lname"].value;
    var password = document.forms['adduserForm']["pass"].value;
    var email = document.forms['adduserForm']["email"].value;
 
    if (firstName == "") {
        alert("Name must be filled out");
        return false;
      }
      if (lastName == "") {
        alert("Name must be filled out");
        return false;
      }

      if (password == "") {
        alert("Password must be filled out");
        return false;
      }
      if (email == "") {
        alert("Email must be filled out");
        return false;
      }

}
