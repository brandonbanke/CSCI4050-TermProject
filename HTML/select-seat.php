<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Cinema E Booking Website! </title>
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="../CSS/nav-bar.css">
    <link rel="stylesheet" href="../CSS/select-seat.css">
</head>

<body onload="seats();">
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
        <h1>Select Seats Now</h1>
        <!-- insert arrays of seats   -->
    <script>
            function seats() {
                for(i=0; i < 16; i++) {
                    for (n=0; n < 16; n++) {
                    let btn = document.createElement("button");
                    btn.innerHTML = "<img src=\"../Assets/Avalible-Seat.png\" alt=\"Avalible-Seat\">";
                    btn.style.border = "none";
                    btn.onclick = "window.location.href = \"order-summary.html\";"
                    document.body.appendChild(btn);
                    }
                }
            }       
    </script>
    <input class="continue" type="button" onclick="window.location.href='../HTML/order-summary.html';" value="Continue">
    </main>
</body>
</html>