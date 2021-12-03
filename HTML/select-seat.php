<?php
    require("../PHP/getTicketInfo.php"); 
    $showMovieId = $_POST['movieId'];
    $showInfo = $_POST['showId'];  
    $numAdult = $_POST['numAdult'];
    $numChild = $_POST['numChild'];
    $numSenior = $_POST['numSenior'];
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Cinema E Booking Website! </title>
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="../CSS/nav-bar.css">
    <link rel="stylesheet" href="../CSS/select-seat.css">
    <script src="../JS/selectingSeats.js"></script>
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
    <?php
        
        $ticketTotal = $numAdult + $numChild + $numSenior;
        
    ?>
    <script>
            function seats() {
                var seatId = 0;
                var div = document.getElementById("seats");
                for(i=0; i < 7; i++) {
                    for (n=0; n < 15; n++) {
                        
                        let btn = document.createElement("button");
                        btn.innerHTML = "<label class=\"container\"><input class=\"checkboxes\"type=\"checkbox\" id=seatId onclick=myFunc() name=\"seat\"><span class=\"checkmark\"></span></label>";
                        btn.style.border = "none";
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
            
            function myFunc() {
                var numberOfTickets = "<?php echo $ticketTotal; ?>";
                var counter = 0;
                var checkboxes = document.getElementsByName('seat');
                for (var checkbox of checkboxes)
                {
                    if (checkbox.checked) {
                        counter++;
                    }
                    if (counter >= numberOfTickets) {
                        for (let i = 0; i < 105; i++) {
                            if (!checkboxes[i].checked) {
                                checkboxes[i].disabled = true;
                                document.getElementById("contButton").style.display = "block";
                            }
                        }
                    } else if (counter < numberOfTickets) {
                        for (let i = 0; i < 105; i++) {
                            checkboxes[i].disabled = false;
                            document.getElementById("contButton").style.display = "none";
                        }
                    }
                }
            }

    </script>

    </main>
    <footer>
        <form action="../HTML/order-total.php" method="POST">
            <input type="hidden" name="movieId" value="<?php echo $showMovieId; ?>">
            <input type="hidden" name="showId" value="<?php echo $showInfo; ?>">
            <input type="hidden" name="numAdult" value="<?php echo $numAdult; ?>">
            <input type="hidden" name="numChild" value="<?php echo $numChild; ?>">
            <input type="hidden" name="numSenior" value="<?php echo $numSenior; ?>">
            <input style="display: none; float: right; margin-right: 3rem;"class="manageButton" type="submit" id="contButton" value="Continue">
        </form>
    </footer>
</body>
</html>