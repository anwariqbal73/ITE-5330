
function validateForm() {
    var first_name = document.forms["myForm"]["fname"];
    var last_name = document.forms["myForm"]["lname"];
    var email = document.forms["myForm"]["email"];
    var pass = document.forms["myForm"]["psw"];
    var city = document.forms["myForm"]["city"];
    var gender = document.forms["myForm"]["gender"];
    
    if (first_name.value == "") {
        alert("First Name must be filled out");
        first_name.focus();
        return false;
    }
    if (last_name.value == "") {
        alert("Last Name must be filled out");
        last_name.focus();
        return false;
    }
    if (email.value == "") {
        alert("Email must be filled out");
        email.focus();
        return false;
    }
    if (!validateEmail(email.value)) {
        alert("Email should be like abc@xyz.com");
        email.focus();
        return false;

    }
    if (pass.value == "") {
        alert("Password must be filled out");
        pass.focus();
        return false;
    }
    if (!isOneChecked(gender)) {
        alert("Select gender");
        //email.focus();
        return false;

    }
    
    if (city.value=="") {
       alert("Please select city");
        city.focus();
        return false;
    }
    


}
function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
function isOneChecked(gender) {
  // All <input> tags...
 
  for (var i=0; i<gender.length; i++) {
    if (gender[i].type == 'radio' && gender[i].checked) {
      return true;
    } 
  }
  // End of the loop, return false
  return false;
}