<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> Cinema E Booking Website! </title>
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="../CSS/nav-bar.css">
    <link rel="stylesheet" href="../CSS/order-summary.css">
</head>

<body>
    <header>
        <h1 class="title">Booking Website!</h1>
    </header>
    <main>
        <div id="nav-menu">
            <ul class="one">
                <li><a href="../HTML/home.php"> Home </a></li>
                <li><a href="../HTML/select-movie.html"> Find Movie </a></li>
                <li><a href="../HTML/account.php"> Account </a></li>
            </ul>
            <form id="search-form" action="search.php" method="GET">
                <input type="search" id="search-bar" name="searchTerm" placeholder="What are you watching?">
            </form>
        </div>
        <div class="content">
            <h1>Tickets</h1>
            <table>
                <tbody>
                    <tr>
                        <td><p>Movie</p></td>
                        <td><a href="select-movie.php"><button type="button" name="edit"
                                    class="editbtn">Edit</button></a></td>
                    </tr>
                    <tr>
                        <td><p>Showtime</p></td>
                        <td><a href="select-showtime.php"><button type="button" name="edit"
                                    class="editbtn">Edit</button></a></td>
                    </tr>
                    <tr>
                        <td>
                            <p>Seat</p>
                        </td>
                        <td><a href="select-seat.html"><button type="button" name="edit"
                                    class="editbtn">Edit</button></a></td>
                    </tr>
                    <tr>
                        <td>
                            <p>Convenience Fees</p>
                        </td>
                        <td>
                            <p>$</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Taxes</p>
                        </td>
                        <td>
                            <p>$</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Total</p>
                        </td>
                        <td>
                            <p>$</p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div id="continue">
                <a href="checkout.html"><button type="button" class="continueButton">Continue</button></a>
            </div>
        </div>

</body>

</html>