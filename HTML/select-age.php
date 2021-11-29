<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Cinema E Booking Website! </title>
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="../CSS/nav-bar.css">
    <link rel="stylesheet" href="../CSS/select-age.css">
</head>
    <body>
        <header> 
            <h1 class = "title">Booking Website!</h1>
        </header>
        <main>
            <div id="nav-menu">
                <ul class="one">
                    <li><a href="../HTML/home.php"> Home </a></li>
                    <li><a href="../HTML/select-movie.php"> Find Movie </a></li>
                    <li><a href="../HTML/account.php"> Account </a></li>
                </ul>
                <form id="search-form" action="search.php" method="GET">
                    <input type="search" id="search-bar" name="searchTerm" placeholder="What are you watching?">
                </form>  
            </div>
            <h1>Number of Tickets</h1>
            <div class="tickets">
                <script type="text/javascript">
                    var adultCount = 0;
                    var childCount = 0;
                    var seniorCount = 0;
                    function addAdult(){
                        adultCount++;
                        document.getElementById('displayAdult').innerHTML = adultCount;
                    }
                    function subAdult(){
                        if (adultCount != 0) {
                            adultCount--;
                        }
                        document.getElementById('displayAdult').innerHTML = adultCount;
                    }
                    function addChild(){
                        childCount++;
                        document.getElementById('displayChild').innerHTML = childCount;
                    }
                    function subChild(){
                        if (childCount != 0) {
                            childCount--;
                        }
                        document.getElementById('displayChild').innerHTML = childCount;
                    }
                    function addSenior(){
                        seniorCount++;
                        document.getElementById('displaySenior').innerHTML = seniorCount;
                    }
                    function subSenior(){
                        if (seniorCount != 0) {
                            seniorCount--;
                        }
                        document.getElementById('displaySenior').innerHTML = seniorCount;
                    }
                    
                </script>
                <h3> <button style = "color: #e7e7e7; margin-top: 2rem; font-family: 'Roboto', sans-serif; font-size: 30pt; border: none;" onclick="subAdult()">-</button> &emsp;Adult&emsp; <button style = "color: #e7e7e7; margin-top: 2rem; font-family: 'Roboto', sans-serif; font-size: 30pt; border: none;" onclick="addAdult()">+</button></h3> 
                <div id="displayAdult"><script type="text/javascript">document.write('<p>' + adultCount + '</p>');</script></div>
                <h3> <button style = "color: #e7e7e7; margin-top: 2rem; font-family: 'Roboto', sans-serif; font-size: 30pt; border: none;" onclick="subChild()">-</button> &emsp;Child&emsp; <button style = "color: #e7e7e7; margin-top: 2rem; font-family: 'Roboto', sans-serif; font-size: 30pt; border: none;" onclick="addChild()">+</button></h3> 
                <div id="displayChild"><script type="text/javascript">document.write('<p>' + childCount + '</p>');</script></div>
                <h3> <button style = "color: #e7e7e7; margin-top: 2rem; font-family: 'Roboto', sans-serif; font-size: 30pt; border: none;" onclick="subSenior()">-</button> &emsp;Senior&emsp; <button style = "color: #e7e7e7; margin-top: 2rem; font-family: 'Roboto', sans-serif; font-size: 30pt; border: none;" onclick="addSenior()">+</button></h3> 
                <div id="displaySenior"><script type="text/javascript">document.write('<p>' + seniorCount + '</p>');</script></div>
            </div>
        </main>
        <footer>
            <a href="select-seat.html">Continue</a>
        </footer>
    </body>
</html>