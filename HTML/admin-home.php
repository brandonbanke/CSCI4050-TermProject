<?php require("../PHP/getUserInfo.php")?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Cinema E Booking Website! </title>
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="../CSS/home.css">
    <link rel="stylesheet" href="../CSS/nav-bar.css">
    <link rel="stylesheet" href="../CSS/admin-home.css">
</head>

<body>
    <header> 
        <h1 class = "title">Booking Website!</h1>
        <!-- add "Welcome back, 'user's name'" here-->
        <?php 
        if ($userOnCheck == 1) {
        foreach($userInfs as $userInfo) {
            $name = $userInfo['firstName'];
        } 
            
        echo "<p style=\"align-text: center; padding-left:60px; color: #d6d5d6;\">Welcome back, " .$name ."</p>";
        } ?>
    </header>
    <main>
        <div id="nav-menu">
            <ul class="one">
                <li class="active"><a href="../HTML/admin-home.php"> Home </a></li>
                <li><a href="../HTML/select-movie.html"> Find Movie </a></li>
                <li><a href="../HTML/account.php"> Account </a></li>
            </ul>
            <form id="search-form" action="search.php" method="GET">
                <input type="search" id="search-bar" name="searchTerm" placeholder="What are you watching?">
            </form>  
        </div>
        <h2 class = "adminTitle">Admin View</h2>
            <a href="../HTML/adminMenu.html" class="manage">Manage Movies</a>
            <a href="../HTML/adminMenu.html" class="manage">Manage Promotions</a>
        <section class="trailerList">
            <div class = "trailer">
                <iframe width="350" height="250"
                src="https://www.youtube.com/embed/8YjFbMbfXaQ">
                </iframe><br>
                <button class='bookMovie' type='button'>Book Movie </button>
            </div>
            <div class = "trailer">
                <iframe width="350" height="250"
                src="https://www.youtube.com/embed/TPBH3XO8YEU">
                </iframe><br>
                <button class='bookMovie' type='button'>Book Movie </button>
            </div>
            <div class = "trailer">
                <iframe width="350" height="250"
                src="https://www.youtube.com/embed/Gczt0fhawDs">
                </iframe><br>
                <button class='bookMovie' type='button'>Book Movie </button>
            </div>
            <div class = "trailer">
                <iframe width="350" height="250"
                src="https://www.youtube.com/embed/f_HvoipFcA8">
                </iframe><br>
                <button class='bookMovie' type='button'>Book Movie </button>
            </div>
            <div class = "trailer">
                <iframe width="350" height="250"
                src="https://www.youtube.com/embed/LRMTr2VZcr8">
                </iframe><br>
                <button class='bookMovie' type='button'>Book Movie </button>
            </div>
            <div class = "trailer">
                <iframe width="350" height="250"
                src="https://www.youtube.com/embed/JVc8SI5CAKw">
                </iframe><br>
                <button class='bookMovie' type='button'>Book Movie </button>
            </div>
            <div class = "trailer">
                <iframe width="350" height="250"
                src="https://www.youtube.com/embed/g_c_Jd-hP-s">
                </iframe><br>
                <button class='bookMovie' type='button'>Book Movie </button>
            </div>
        </section>
        <h2>Coming Soon</h2>
        <section class="trailerList">
            <div class = "trailer">
                <iframe width="350" height="250"
                src="https://www.youtube.com/embed/x_me3xsvDgk">
                </iframe><br>
                <button class='bookMovie' type='button'>Book Movie </button>
            </div>
            <div class = "trailer">
                <iframe width="350" height="250"
                src="https://www.youtube.com/embed/gxc6y2ZVfCU">
                </iframe><br>
                <button class='bookMovie' type='button'>Book Movie </button>
            </div>
            <div class = "trailer">
                <iframe width="350" height="250"
                src="https://www.youtube.com/embed/S-GJ3lk0GCA">
                </iframe><br>
                <button class='bookMovie' type='button'>Book Movie </button>
            </div>
            <div class = "trailer">
                <iframe width="350" height="250"
                src="https://www.youtube.com/embed/ahZFCF--uRY">
                </iframe><br>
                <button class='bookMovie' type='button'>Book Movie </button>
            </div>
            <div class = "trailer">
                <iframe width="350" height="250"
                src="https://www.youtube.com/embed/LLFSNWU8yx8">
                </iframe><br>
                <button class='bookMovie' type='button'>Book Movie </button>
            </div>
            <div class = "trailer">
                <iframe width="350" height="250"
                src="https://www.youtube.com/embed/WgU7P6o-GkM">
                </iframe><br>
                <button class='bookMovie' type='button'>Book Movie </button>
            </div>
        </section>
    </main>

</body>
</html>