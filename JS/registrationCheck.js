function stylePage() {
    document.getElementById("fNameValidity").style.display = "none";
    document.getElementById("lNameValidity").style.display = "none";
    document.getElementById("emailValidity").style.display = "none";
    document.getElementById("userValidity").style.display = "none";
    document.getElementById("passValidity").style.display = "none";
    document.getElementById("cPassValidity").style.display = "none";

    document.getElementById("fNameValidity").style.color = "red";
    document.getElementById("lNameValidity").style.color = "red";
    document.getElementById("emailValidity").style.color = "red";
    document.getElementById("userValidity").style.color = "red";
    document.getElementById("passValidity").style.color = "red";
    document.getElementById("cPassValidity").style.color = "red";
  }

  function validateFName() {
    var fN = document.getElementById("uFName");
    if (fN.value == "") {
        document.getElementById("fNameValidity").style.display = "block";
        return false;
      } else {
        document.getElementById("fNameValidity").style.display = "none";
        return true; 
      } 
  }

  function validateLName() {
    var lN = document.getElementById("uLName");
    if (lN.value == "") {
      document.getElementById("lNameValidity").style.display = "block";
      return false;
    } else {
      document.getElementById("lNameValidity").style.display = "none";
      return true; 
    }  
  }

  function validateEmail() {
    var em = document.getElementById("uEmail");
    if (em.value == "") {
        document.getElementById("emailValidity").style.display = "block";
        return false;
      } else {
        document.getElementById("emailValidity").style.display = "none";
        return true; 
      } 
  }
  function validateUser() {
    var user = document.getElementById("uName");
    if (user.value == "") {
        document.getElementById("userValidity").style.display = "block";
        return false;
      } else {
        document.getElementById("userValidity").style.display = "none";
        return true; 
      } 
  }

  function validatePassword() {
    var pass = document.getElementById("uPass");
    if (pass.value == "") {
      document.getElementById("passValidity").style.display = "block";
      return false;
    } else {
      document.getElementById("passValidity").style.display = "none";
      return true; 
    }  
  }

  function validateCPassword() {
    var cpass = document.getElementById("uCPass");
    if (cpass.value == "") {
      document.getElementById("cPassValidity").style.display = "block";
      return false;
    } else if (cpass.value != document.getElementById("uPass").value) {
      document.getElementById("cPassValidity").style.display = "block";
      return false;
    } else {
      document.getElementById("cPassValidity").style.display = "none";
      return true; 
    }  

  }

  function regis() {
    var v1 = validateFName();
    var v2 = validateLName();
    var v3 = validateEmail();
    var v4 = validateUser();
    var v5 = validatePassword();
    var v6 = validateCPassword();

    if (v1 && v2 && v3 && v4 && v5 && v6) {   
      return true;
    } else {
      return false;
    }
      
  }