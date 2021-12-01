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
        <div id="seats" style="padding-left: 35%;"></div>
        <!-- insert arrays of seats   -->
    <script>
            function seats() {
                var seatId = 0;
                var div = document.getElementById("seats");
                for(i=0; i < 7; i++) {
                    for (n=0; n < 15; n++) {
                        
                        let btn = document.createElement("button");
                        btn.innerHTML = "<img src=\"../Assets/Avalible-Seat.png\" alt=\"Avalible-Seat\">";
                        btn.style.border = "none";
                        btn.onclick = "window.location.href = \"order-summary.php\";"
                        div.appendChild(btn);
                        //document.body.appendChild(btn);
                        // let num = document.createTextNode(seatId);
                        // document.body.appendChild(num);
                        seatId++;
                        if (n == 14) {
                            let br = document.createElement("br");
                            div.appendChild(br);
                            //document.body.appendChild(br);
                        }
                    }
                }
            }       
    </script>
    <input class="continue" type="button" onclick="window.location.href='../HTML/order-summary.php';" value="Continue">
    </main>
</body>
</html>