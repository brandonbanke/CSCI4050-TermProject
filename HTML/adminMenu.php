<?php 
    require("../PHP/getUserInfo.php");
    require("../PHP/getMovieInfo.php");
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
        <h1 class="title" style="padding-top: 10px;">Admin Menu</h1>
            <a href="admin-home.php" class="manageButton">Go back</a>
    </header>
    <br>
    
    <main>

            <div class="adminTab">
                <div class="userName">
                    <h3 style="padding-left: 5px;">Welcome back</h3>
                    <?php 
                        if ($userOnCheck == 1) {
                            foreach($userInfs as $userInfo) {
                                $name = $userInfo['firstName'];
                            } 
                            echo "<p style=\"padding-left:5px;\">" .$name ."</p>";
                        } 
                    ?>
                </div>

                <button class="adminButton" onclick="openTab(event, 'manageMovies')" id="defaultOpen" style="padding-left: 5px;">Manage Movies</button>
                <button class="adminButton" onclick="openTab(event, 'managePromotions')" style="padding-left: 5px;">Manage Promotions</button>
            </div>
           
        </div>

        <div id="manageMovies" class="content">
            <br>
            <h2 style="padding-left: 10px;">Manage Movies</h2>    
            <br>
            <form id="search-form" action="search.php" method="GET">
                <input type="search" id="search-bar" name="searchTerm" placeholder="Seach movie">
                <input type="button" id="button" name="addMovieButton" style="width:60px" onclick="showWindow()">
            </form> 
            <br>
            <section class="movies">
            
                
                <?php foreach ($movieInfs as $movieInf) : ?>
                <div class="movie">
                <img src="<?php echo $movieInf['picture']; ?>">                
                <br>
                <button class="manageButton" type='button' onclick="showWindow()">Edit</button>
                </div>
                <?php endforeach; ?>


            </section>
        </div>

        <div id="managePromotions" class="content">
            <br>
            <div style="background-color: inherit; float: left;">
                <h2 style="padding-left: 10px;">Manage Promotions</h2>
                <br>
                <p style="padding-left: 10px;">Select promotion:</p>    
                <br>
                <p style="padding-left: 10px; display: inline-block;">1. Buy 2 get one free</p>
                <button class="changeButton" onclick="showWindowPromotion()">Change</button>
                <br>
                <p style="padding-left: 10px; display: inline-block;">2. Test promotion</p>
                <button class="changeButton" onclick="showWindowPromotion()">Change</button>
                <br>
                <p style="padding-left: 10px; display: inline-block;">3. Another promotion</p>
                <button class="changeButton" onclick="showWindowPromotion()">Change</button>
            </div> 
            <div style="background-color: inherit; float: left; padding-left: 100px; padding-top: 50px;">
                <p>Add new promotion:</p>
                <br>
                <form class = "promotionForm" method='POST' action='../PHP/promotionInformation.php'> 
                    <fieldset>
                        
                        <label>Promotion Name:</label>
                        <input type="text" style="background-color:lightgrey;" name='pName'><br><br><br>
                        <label>Promotion Code:</label>
                        <input type="text" style="background-color:lightgrey" name='pCode'><br><br><br>
                        <label>Promotion Description:</label>
                        <input type="text" style="background-color:lightgrey" name='pDescription'><br><br><br>
                        
                        <input class = "bookMovie" type="submit" value="Submit" style="background-color:lightgrey">
                    </fieldset>
                </form>
            </div>          
        </div>



        <!--popup window to manage movies-->
        <div id="movie-screen" class="modal">

            <!-- Modal content -->
            <div class="modal-content" style="display: flex; text-align: center;">
                <span class="close" onclick="closeWindow()" style="background-color: inherit">&times;</span>
                <div style="float: left; width: 50%; align-items: center; background-color: inherit;">
                    <img src="https://www.lonestarpark.com/wp-content/uploads/2019/04/image-placeholder-500x500.jpg" style="width: 300px; height: auto; padding-top: 100px;">
                </div>

                
                <div style="float: left; width: 50%; background-color: inherit;">
                <form method='POST' action='../PHP/movieInformation.php'>
                    <fieldset><br><br>
                    <label>name:</label>
                    <input type="text" style="background-color: lightgrey; display: inline-flexbox;" name='mName'><br><br>
                    <label>Category</plabel>
                    <input type="text" style="background-color: lightgrey; display: inline-flexbox;" name="mCategory"><br><br>
                    <label>Cast</label>
                    <input type="text" style="background-color: lightgrey; display: inline-flexbox;" name="mCast"><br><br>
                    <label>director</label>
                    <input type="text" style="background-color: lightgrey; display: inline-flexbox;" name="mDirector"><br><br>
                    <label>Producer</label>
                    <input type="text" style="background-color: lightgrey; display: inline-flexbox;" name="mProducer"><br><br>
                    <label>synopsis</label>
                    <input type="text" style="background-color: lightgrey; display: inline-flexbox;" name="mSynopsis"><br><br>
                    <label>reviews</label>
                    <input type="text" style="background-color: lightgrey; display: inline-flexbox;" name="mReviews"><br><br>
                    <label>trailer link</label>
                    <input type="text" style="background-color: lightgrey; display: inline-flexbox;" name="mTrailerLink"><br><br>
                    <label>movie picture</label>
                    <input type="text" style="background-color: lightgrey; display: inline-flexbox;" name="mMoviePic"><br><br>
                    <label>MPPA-US film rating code</label>
                    <input type="text" style="background-color: lightgrey; display: inline-flexbox;" name="mRating"><br><br>
                    <label>show date</label>
                    <input type="text" style="background-color: lightgrey; display: inline-flexbox;" name="mDate"><br><br>
                    <label>show time</label>
                    <input type="text" style="background-color: lightgrey; display: inline-flexbox;" name="mTime"><br><br>
                    <br>
                    <br>
                    <input type="submit" value="submit" style="background-color:lightgrey">
                    </fieldset>
                    </form>
                </div>
                 

            </div>
          
        </div>

        <div class="modal" id="promotion-screen">
            <div class="modal-content">
                <span class="close" onclick="closeWindowPromotion()" style="background-color: inherit">&times;</span>
                <br>
                <p>name</p>
                <input type="text" style="background-color: lightgrey; display: inline-flexbox;">
                <p>code</p>
                <input type="text" style="background-color: lightgrey; display: inline-flexbox;">
                <p>Description</p>
                <input type="text" style="background-color: lightgrey; display: inline-flexbox;">
                <br>
                <br>
                <input type="submit" value="Submit" style="background-color:lightgrey" onclick="closeWindowPromotion()">
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