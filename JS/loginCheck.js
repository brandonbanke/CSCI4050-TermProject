function stylePage() {
    document.getElementById("userValidity").style.display = "none";
    document.getElementById("passValidity").style.display = "none";
    document.getElementById("loginValidity").style.display = "none";
    document.getElementById("userValidity").style.color = "red";
    document.getElementById("passValidity").style.color = "red";
    document.getElementById("loginValidity").style.color = "red";
  }

  function validateUser() {
    var user = document.getElementById("loguser");
    if (user.value == "") {
        document.getElementById("userValidity").style.display = "block";
        return false;
      } else {
        document.getElementById("userValidity").style.display = "none";
        return true; 
      } 
  }

  function validatePassword() {
    var pass = document.getElementById("logpass");
    if (pass.value == "") {
      document.getElementById("passValidity").style.display = "block";
      return false;
    } else {
      document.getElementById("passValidity").style.display = "none";
      return true; 
    }  
  }

  function login() {
    var valid1 = validateUser();
    var valid2 = validatePassword();
    if (valid1 && valid2) {   
      return true;
    } else {
      return false;
    }
      
  }