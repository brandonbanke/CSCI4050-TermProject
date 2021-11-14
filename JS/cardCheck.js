function stylePage() {
    document.getElementById("billingValidity").style.display = "none";
    document.getElementById("exDateValidity").style.display = "none";
    document.getElementById("cardNumValidity").style.display = "none";
    document.getElementById("cvvValidity").style.display = "none";
    document.getElementById("nameValidity").style.display = "none";
    document.getElementById("billingValidity").style.color = "red";
    document.getElementById("exDateValidity").style.color = "red";
    document.getElementById("cardNumValidity").style.color = "red";
    document.getElementById("cvvValidity").style.color = "red";
    document.getElementById("nameValidity").style.color = "red";
  }

  function validateBilling() {
    var billing = document.getElementById("cardBill");
    if (billing.value == "") {
        document.getElementById("billingValidity").style.display = "block";
        return false;
      } else {
        document.getElementById("billingValidity").style.display = "none";
        return true; 
      } 
  }

  function validateExDate() {
    var date = document.getElementById("cardExDate");
    if (date.value == "") {
      document.getElementById("exDateValidity").style.display = "block";
      return false;
    } else {
      document.getElementById("exDateValidity").style.display = "none";
      return true; 
    }  
  }

  function validateCardNum() {
    var num = document.getElementById("cardNumb");
    if (num.value == "") {
        document.getElementById("cardNumValidity").style.display = "block";
        return false;
      } else {
        document.getElementById("cardNumValidity").style.display = "none";
        return true; 
      } 
  }

  function validateCVV() {
    var cvv = document.getElementById("cardVV");
    if (cvv.value == "") {
        document.getElementById("cvvValidity").style.display = "block";
        return false;
      } else {
        document.getElementById("cvvValidity").style.display = "none";
        return true; 
      } 
  }

  function validateName() {
    var name = document.getElementById("cardFlName");
    if (name.value == "") {
        document.getElementById("nameValidity").style.display = "block";
        return false;
      } else {
        document.getElementById("nameValidity").style.display = "none";
        return true; 
      } 
  }

  function addCard() {
    var valid1 = validateBilling();
    var valid2 = validateExDate();
    var valid3 = validateCardNum();
    var valid4 = validateCVV();
    var valid5 = validateName();
    if (valid1 && valid2 && valid3 && valid4 && valid5) {   
      return true;
    } else {
      return false;
    }
      
  }