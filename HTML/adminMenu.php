<?php 
    require("../PHP/getUserInfo.php");
    require("../PHP/getMovieInfo.php");
    require("../PHP/getPromotion.php");
    require("../PHP/getCustomer.php");   
    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> Cinema E Booking Website! </title>
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="../CSS/adminMenu.css">
    <script src="../JS/addMovieCheck.js"></script>
</head>
<body onload="stylePage();">
    <header>
        <h2 class="title">Admin Menu</h2>
            
    </header>
    <main>
        <div class="adminTab">
            <div class="userName">
                <h3>Welcome back, </h3>
                <?php 
                    if ($userOnCheck == 1) {
                        foreach($userInfs as $userInfo) {
                            $name = $userInfo['firstName'];
                        } 
                        echo "<p>" .$name ."</p>";
                    } 
                ?>
            </div>
            <button class="adminButton" onclick="openTab(event, 'manageMovies')" id="defaultOpen"> Manage Movies</button>
            <button class="adminButton" onclick="openTab(event, 'managePromotions')"> Manage Promotions</button>
            <button class="adminButton" onclick="openTab(event, 'manageUsers')"> Manage Users</button>  
            <button ><a href="../HTML/home.php">Go back</a></button>
        </div>
           
        <!-- Manage movies tab-->
        <div id="manageMovies" class="content">
            <form id="add-movie" action="search.php" method="GET">
                <input class= "manageButton" type="button" id="button" name="addMovieButton" onclick="showWindow()" value = "Add Movie">
            </form> 
        
            <section class="movies">
                <?php $counter = 0;?>
                <?php foreach ($movieInfs as $movieInf) : ?>
                <div class="movie">
                    <img src="<?php echo $movieInf['picture']; ?>" alt="pic">                
                    <p><?php echo$movieInf['title'];?> </p>
                    <form method='POST' action='../PHP/getMovieInformation.php'>
                        <input type="hidden" name="movie_id" value="<?php echo $movieInf['id']; ?>">
                        <button type="submit" class="manageButton">Edit Information</button>
                    </form>
                    <form method='POST' action='../PHP/getShowTimeInfo.php'>
                        <input type="hidden" name="showmovie_id" value="<?php echo $movieInf['id']; ?>">
                        <button type="submit" class="manageButton" name="editTime">Edit Time</button>
                    </form>
                    <form method='POST' action='../PHP/movieInformation.php'>
                        <input type="hidden" name="deleteMovieID" value="<?php echo $movieInf['id']; ?>">
                        <button type="submit" class="manageButton" name="deleteMovie">Delete</button>
                    </form>
                </div>
                <?php endforeach; ?>
                
            </section>
        </div>
        <!-- manage users tab -->
        <div id="manageUsers" class="content">
            <!-- gets all the users in the db -->
            <?php foreach($custInfs as $info) :?>
                <div id="box">
                    <?php 
                        if ($info['isAdmin'] != 1) {
                            if ($info['isBlocked'] == 0) {
                                $value = 'block';
                            } else {
                                $value = 'un-block';
                            }
                            
                            echo "
                                <form method='POST' action='../PHP/changeIsBlocked.php'>
                                    <p>" .$info['userId'].  "&nbsp&nbsp&nbsp<button type='submit' name='userBlockButton' value='" .$info['userId']. "' class='manageButton'>" .$value. "</button></p>
                                </form>
                            
                            ";
                } ?>   
                </div>
            <?php endforeach; ?>

        </div>

        <!-- Promotions -->
        <div id="managePromotions" class="content">  
             <!-- Add promotion --> 
            <div class="addPromo">
                    <h2 class="select">Add new promotion:</h2>
                    <form class = "promotionForm" method='POST' action='../PHP/promotionInformation.php' onsubmit="return promoCheck();"> 
                        <fieldset>
                            <p id="pNameValidity"> Name not entered</p>
                            <p id="pCodeValidity"> Code not entered</p>
                            <p id="pDescValidity"> Description not entered</p>
                            <label>Promotion Name:</label>
                            <input type="text" name='pName' id='pName'><br><br><br>
                            <label>Promotion Code:</label>
                            <input type="text" name='pCode' id='pCode'><br><br><br>
                            <label>Promotion Description:</label>
                            <input type="text" name='pDescription' id='pDescription'><br><br>
                            <label>Promotion Discount:</label>
                            <input type="text" name='pDiscount' id='pDescription'><br><br>
                            <input class = "manageButton sub" type="submit" value="Submit">
                        </fieldset>
                    </form>
            </div>     
            <h2 class="select">Select promotion:</h2>    
            <?php foreach ($promInfs as $promInf) : ?>
                <form method="POST" >
                    <input type="hidden" value="<?php echo $promInf['id'] ?>" name="promId">

                        <p class="promoName"><?php echo $promInf['promoName']; ?> &nbsp&nbsp&nbsp
                        <button type="submit" class="manageButton" name="change" formmethod="POST" formaction="../HTML/editPromotion.php">Change</button> 
                        <button type="submit" class="manageButton"name="deletePromo">Delete</button></p><br>
                
                </form>
            <?php endforeach; ?>
        </div>

        <!-- NEEDS TO SHOW SPECIFIC PROMOTION -->
        <div class="modal" id="promotion-screen">
            <div class="modal-content">
                <span class="close" onclick="closeWindowPromotion()">&times;</span>

                <form method='POST' action='../PHP/editPromotion.php'>
                        <p>Name</p>
                        <input type="text" value = "<?php echo $name; ?>" name='new_pName'>
                        <p>Code</p>
                        <input type="text" value = "<?php echo $code; ?>" name='new_pCode'>
                        <p>Description</p>
                        <input type="text" value = "<?php echo $description; ?>" name='new_pDescription'>
        
                        <input type="hidden" name="promotion_id" value = "<?php echo $promoInf['id']; ?>">
                        <input type="submit" class="manageButton" value="Submit" name="changePromoForm">
                </form>
            </div>
        </div>
        <!-- SPECIFIC PROMO -->

        <!--popup window to add movie-->
        <div id="movie-screen" class="modal">
            <!-- Add movie content -->
            <div class="modal-content">
                <span class="close" onclick="closeWindow()">&times;</span>
                <div class="addMovieModal">
                <form method='POST' action='../PHP/movieInformation.php' onsubmit="return movieCheck();">
                    <fieldset class="mod">
                    <p id="titleValidity"> Title not entered</p>
                    <p id="categoryValidity"> Category not entered</p>
                    <p id="castValidity"> Cast not entered</p>
                    <p id="directorValidity"> Director not entered</p>
                    <p id="producerValidity"> Producer not entered</p>
                    <p id="synopsisValidity"> Synopsis not entered</p><br>
                    <p id="reviewsValidity"> Review not entered</p>
                    <p id="trailerValidity"> Trailer not entered</p>
                    <p id="pictureValidity"> Picture not entered</p>
                    <p id="ratingValidity"> Rating not entered</p>
                    <p id="dateValidity"> Show Date not entered</p>
                    <p id="timeValidity"> Show Time not entered</p><br>
                    <!--<p id="durationValidity"> Duration not entered</p><br> NEEDS TO BE IMPLEMENTED FOR ERROR CHECKING-->
                    <label>Name</label>
                    <input class="modInput" type="text" name='mName' id='mName'>
                    <label class='mand'>*</label><br><br>
                    <label>Category</plabel>
                    <input class="modInput" type="text" name="mCategory" id='catName'>
                    <label class='mand'>*</label><br><br>
                    <label>Duration</plabel>
                    <input class="modInput" type="text" name="mDuration" id='mDuration'>
                    <label class='mand'>*</label><br><br>
                    <label>Cast</label>
                    <input class="modInput" type="text" name="mCast" id='casName'>
                    <label class='mand'>*</label><br><br>
                    <label>director</label>
                    <input class="modInput" type="text" name="mDirector" id='dirName'>
                    <label class='mand'>*</label><br><br>
                    <label>Producer</label>
                    <input class="modInput" type="text" name="mProducer" id='proName'>
                    <label class='mand'>*</label><br><br>
                    <label>synopsis</label>
                    <input class="modInput" type="text" name="mSynopsis" id='synName'>
                    <label class='mand'>*</label><br><br>
                    <label>reviews</label>
                    <input class="modInput" type="text" name="mReviews" id='revName'>
                    <label class='mand'>*</label><br><br>
                    <label>trailer link</label>
                    <input class="modInput" type="text" name="mTrailerLink" id='trailName'>
                    <label class='mand'>*</label><br><br>
                    <label>movie picture</label>
                    <input class="modInput" type="text" name="mMoviePic" id='picName'>
                    <label class='mand'>*</label><br><br>
                    <label>MPPA-US film rating code</label>
                    <input class="modInput" type="text" name="mRating" id='ratCodName'>
                    <label class='mand'>*</label><br><br>
                    <input id="check" type="checkbox" name="mComingSoon" value="1">
                    <label id="checkLabel" for="mComingSoon"> Coming Soon? </label>
                    <label class='mand'>*</label><br><br><br>
                    <input class="manageButton" type="submit" value="submit" name="addMovie">
                    </fieldset>
                    </form>
                </div>
            </div>
        </div>


 </main>

<script>
function openTab(evt, tabName) {
    // Declare all variables
    var i, tabcontent, tablinks;
  
    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("content");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
  
    // Get all elements with class="adminButton" and remove the class "active"
    tablinks = document.getElementsByClassName("adminButton");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
  
    // Show the current tab, and add an "active" class to the link that opened the tab
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
  }

  document.getElementById("defaultOpen").click();
</script>


<script>
//var Alert = new showWindow();

function showWindow() {
    let popupBox = document.getElementById("movie-screen");
    popupBox.style.display = "block"; 
}

function closeWindow() {
    let popupBox = document.getElementById("movie-screen");
    popupBox.style.display = "";
}

function showEditWindow() {
    let popupBox = document.getElementById("movie-edit-screen");
    popupBox.style.display = "block"; 
}

function closeEditWindow() {
    let popupBox = document.getElementById("movie-edit-screen");
    popupBox.style.display = "";
}

function showWindowPromotion() {
    let popupBox = document.getElementById("promotion-screen");
    popupBox.style.display = "block"; 
}

function closeWindowPromotion() {
    let popupBox = document.getElementById("promotion-screen");
    popupBox.style.display = "";
}
</script>

</body>
</html>