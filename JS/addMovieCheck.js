function stylePage() {
    document.getElementById("titleValidity").style.display = "none";
    document.getElementById("categoryValidity").style.display = "none";
    document.getElementById("castValidity").style.display = "none";
    document.getElementById("directorValidity").style.display = "none";
    document.getElementById("producerValidity").style.display = "none";
    document.getElementById("synopsisValidity").style.display = "none";
    document.getElementById("reviewsValidity").style.display = "none";
    document.getElementById("trailerValidity").style.display = "none";
    document.getElementById("pictureValidity").style.display = "none";
    document.getElementById("ratingValidity").style.display = "none";
    document.getElementById("dateValidity").style.display = "none";
    document.getElementById("timeValidity").style.display = "none";

    document.getElementById("titleValidity").style.color = "red";
    document.getElementById("categoryValidity").style.color = "red";
    document.getElementById("castValidity").style.color = "red";
    document.getElementById("directorValidity").style.color = "red";
    document.getElementById("producerValidity").style.color = "red";
    document.getElementById("synopsisValidity").style.color = "red";
    document.getElementById("reviewsValidity").style.color = "red";
    document.getElementById("trailerValidity").style.color = "red";
    document.getElementById("pictureValidity").style.color = "red";
    document.getElementById("ratingValidity").style.color = "red";
    document.getElementById("dateValidity").style.color = "red";
    document.getElementById("timeValidity").style.color = "red";
  }

  function validateTitle() {
    var mT = document.getElementById("mName");
    if (mT.value == "") {
        document.getElementById("titleValidity").style.display = "block";
        return false;
      } else {
        document.getElementById("titleValidity").style.display = "none";
        return true; 
      } 
  }

  function validateCategory() {
    var mC = document.getElementById("catName");
    if (mC.value == "") {
        document.getElementById("categoryValidity").style.display = "block";
        return false;
      } else {
        document.getElementById("categoryValidity").style.display = "none";
        return true; 
      } 
  }

  function validateCast() {
    var mCa = document.getElementById("casName");
    if (mCa.value == "") {
        document.getElementById("castValidity").style.display = "block";
        return false;
      } else {
        document.getElementById("castValidity").style.display = "none";
        return true; 
      } 
  }

  function validateDirector() {
    var mD = document.getElementById("dirName");
    if (mD.value == "") {
        document.getElementById("directorValidity").style.display = "block";
        return false;
      } else {
        document.getElementById("directorValidity").style.display = "none";
        return true; 
      } 
  }

  function validateProducer() {
    var mP = document.getElementById("proName");
    if (mP.value == "") {
        document.getElementById("producerValidity").style.display = "block";
        return false;
      } else {
        document.getElementById("producerValidity").style.display = "none";
        return true; 
      } 
  }

  function validateSynopsis() {
    var mS = document.getElementById("synName");
    if (mS.value == "") {
        document.getElementById("synopsisValidity").style.display = "block";
        return false;
      } else {
        document.getElementById("synopsisValidity").style.display = "none";
        return true; 
      } 
  }

  function validateReviews() {
    var mRe = document.getElementById("revName");
    if (mRe.value == "") {
        document.getElementById("reviewsValidity").style.display = "block";
        return false;
      } else {
        document.getElementById("reviewsValidity").style.display = "none";
        return true; 
      } 
  }

  function validateTrailer() {
    var mTrail = document.getElementById("trailName");
    if (mTrail.value == "") {
        document.getElementById("trailerValidity").style.display = "block";
        return false;
      } else {
        document.getElementById("trailerValidity").style.display = "none";
        return true; 
      } 
  }

  function validatePic() {
    var mPic = document.getElementById("picName");
    if (mPic.value == "") {
        document.getElementById("pictureValidity").style.display = "block";
        return false;
      } else {
        document.getElementById("pictureValidity").style.display = "none";
        return true; 
      } 
  }

  function validateRating() {
    var mRat = document.getElementById("ratCodName");
    if (mRat.value == "") {
        document.getElementById("ratingValidity").style.display = "block";
        return false;
      } else {
        document.getElementById("ratingValidity").style.display = "none";
        return true; 
      } 
  }

  function validateDate() {
    var mRe = document.getElementById("dateName");
    if (mRe.value == "") {
        document.getElementById("dateValidity").style.display = "block";
        return false;
      } else {
        document.getElementById("dateValidity").style.display = "none";
        return true; 
      } 
  }

  function validateTime() {
    var mRe = document.getElementById("timeName");
    if (mRe.value == "") {
        document.getElementById("timeValidity").style.display = "block";
        return false;
      } else {
        document.getElementById("timeValidity").style.display = "none";
        return true; 
      } 
  }

  function movieCheck() {
    var v1 = validateTitle();
    var v2 = validateCategory();
    var v3 = validateCast();
    var v4 = validateDirector();
    var v5 = validateProducer();
    var v6 = validateSynopsis();
    var v7 = validateReviews();
    var v8 = validateTrailer();
    var v9 = validatePic();
    var v10 = validateRating();
    var v11 = validateDate();
    var v12 = validateTime();


    if (v1 && v2 && v3 && v4 && v5 && v6 && v7 && v8 && v9 && v10 && v11 && v12) {   
      return true;
    } else {
      return false;
    }
      
  }