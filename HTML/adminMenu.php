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
</head>
<body>
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
                <button class="adminButton"><a href="../HTML/admin-home.php">Go back</a></button>

            </div>
           
        <!-- Manage movies tab-->
        <div id="manageMovies" class="content">
            <form id="add-movie" action="search.php" method="GET">
                <input class= "addMovieButton" type="button" id="button" name="addMovieButton" onclick="showWindow()" value = "Add Movie">
            </form> 
        
            <section class="movies">
                <?php $counter = 0;?>
                <?php foreach ($movieInfs as $movieInf) : ?>
                <div class="movie">
                    <img src="<?php echo $movieInf['picture']; ?>" alt="pic">                
                    
                    <form method='POST' action='../PHP/getMovieInformation.php'>
                        <input type="hidden" name="movie_id" value="<?php echo $movieInf['id']; ?>">
                        <button type="submit" class="manageButton">Edit</button>
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
                                echo "<p>" .$info['userId']. "<button type='submit' value='" .$info['userId']. "class='manageButton' >block</button> </p>";
                            } else {
                                echo "<button type='submit' value='" .$info['userId']. "class='manageButton' '>un-block</button>";
                            }



                        } ?>                      

                    <!-- different for blocked and not blocked, still needs to add the submit-->
                    <?php 
                        if ($info['isAdmin'] != 1) {
                            
                        }
                        
                        
                    ?>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Promotions -->
        <div id="managePromotions" class="content">       
            <div class = managePromo>
                <p>Select promotion:</p>    
                <?php foreach ($promInfs as $promInf) : ?>
                <p>'<?php echo $promInf['promoName']; ?>'</p>
                <button class="changeButton" onclick="showWindowPromotion()">Change</button>
                <div class="modal" id="promotion-screen">
                    <div class="modal-content">
                        <span class="close" onclick="closeWindowPromotion()">&times;</span>

                        <form method='POST' action='../PHP/editPromotion.php'>
                                <p>Name</p>
                                <input type="text" value = "<?php echo $promInf['promoName']; ?>" name='new_pName'>
                                <p>Code</p>
                                <input type="text" value = "<?php echo $promInf['code']; ?>" name='new_pCode'>
                                <p>Description</p>
                                <input type="text" value = "<?php echo $promInf['promDescription']; ?>" name='new_pDescription'>
                                
                                
                                <input type="hidden" name="promotion_id" value = "<?php echo $promoInf['id']; ?>">
                                <input type="submit" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

        <!-- Add promotion -->
        </div> 
            <div class="addPromo">
                <p>Add new promotion:</p>
                
                <form class = "promotionForm" method='POST' action='../PHP/promotionInformation.php'> 
                    <fieldset>
                        
                        <label>Promotion Name:</label>
                        <input type="text" name='pName'><br><br><br>
                        <label>Promotion Code:</label>
                        <input type="text" name='pCode'><br><br><br>
                        <label>Promotion Description:</label>
                        <input type="text" name='pDescription'><br><br><br>
                        
                        <input class = "bookMovie" type="submit" value="Submit">
                    </fieldset>
                </form>
            </div>          
        </div>

        <!--popup window to manage movies-->
        <div id="movie-screen" class="modal">

            <!-- Add movie content -->
            <div class="modal-content">
                <span class="close" onclick="closeWindow()">&times;</span>
                <div class="imgAddMovie">
                    <img src="https://www.lonestarpark.com/wp-content/uploads/2019/04/image-placeholder-500x500.jpg" alt="placeholder image">
                </div>
                
                <div class="addMovieModal">
                <form method='POST' action='../PHP/movieInformation.php'>
                    <fieldset><br><br>
                    <label>name:</label>
                    <input type="text" name='mName'><br><br>
                    <label>Category</plabel>
                    <input type="text" name="mCategory"><br><br>
                    <label>Cast</label>
                    <input type="text" name="mCast"><br><br>
                    <label>director</label>
                    <input type="text" name="mDirector"><br><br>
                    <label>Producer</label>
                    <input type="text" name="mProducer"><br><br>
                    <label>synopsis</label>
                    <input type="text" name="mSynopsis"><br><br>
                    <label>reviews</label>
                    <input type="text" name="mReviews"><br><br>
                    <label>trailer link</label>
                    <input type="text" name="mTrailerLink"><br><br>
                    <label>movie picture</label>
                    <input type="text" name="mMoviePic"><br><br>
                    <label>MPPA-US film rating code</label>
                    <input type="text" name="mRating"><br><br>
                    <label>show date</label>
                    <input type="text" name="mDate"><br><br>
                    <label>show time</label>
                    <input type="text" name="mTime"><br><br>
                    <input id="check" type="checkbox" name="mComingSoon" value="1">
                    <label id="checkLabel" for="mComingSoon"> Coming Soon? </label><br><br><br>
                    <br>
                    <br>
                    <input type="submit" value="submit">
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