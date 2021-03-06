<?php require("getUserInfo.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Cinema E Booking Website! </title>
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="../CSS/adminMenu.css">
</head>
<header>
    <h2 class="title">Admin Menu</h2>     
</header>
<main class="manage">
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
                <button ><a href="../HTML/adminMenu.php">Go back</a></button>

            </div>
        
        
        <?php if (isset($_POST['editTime']) || isset($_POST['editForm']) || isset($_POST['deleteTime']) || isset($_POST['addShowtime'])) :?>
        <div id="managePromotions" class="content" style="display: flex">       
        
            <div>
                <h3 class="selectTime">Select Time(s) for <?php echo $movieName; ?>:</h3><br><br>   
                <?php 
                if ($rowCount == 0) {
                    echo "<p>No showtimes for this movie</p>";
                }
                else {
                     foreach ($specificShowInfs as $specificShowInf) :?>
                    <form method="POST" action="../PHP/getShowTimeInfo.php">
                        <input type="hidden" value="<?php echo $specificShowInf['showId'] ?>" name="showId">
                        <input type="hidden" name="showmovie_id" value = "<?php echo $specificShowInf['movieId']; ?>">
                        <p class="pTime"><?php echo $specificShowInf['time'].' '. $specificShowInf['date']; ?> <button type="submit" class="manageButton timeButton" name="changeForm">Change</button> <button type="submit" class="manageButton timeButton" name="deleteTime">Delete</button></p><br>
                    </form>
                    <?php endforeach;
                } 
                ?>
                
                <br><br>
            </div>

            
            <div class="addShowTime" style="padding-left: 30px">
                <form class = "promotionForm" method='POST' action='../PHP/addMovieShowtime.php'> 
                    <fieldset class="addTime">
                        <h3 class="selectTime">Add new show time:</h3><br><br>
                        <p>Date:</p>
                        <input type="text" name='date'><br><br>
                        <p>Time:</p>
                        <input type="text" name='time'><br><br><br> 
                        <input type="hidden" name="showmovie_id" value="<?php echo $showMovieId; ?>">
                        <input class="manageButton" type="submit" name="addShowtime">

                    </fieldset>
                </form>
            </div> 
            
        </div>
        <?php endif;
        if (isset($_POST['changeForm'])) :?>
        <?php foreach ($specificShowInfs as $info) : ?>
        
        <form method='POST'>
            <fieldset><br><br>
                <p>Date:</p>
                <input type="text" name="date" value = "<?php echo $info['date']; ?>" id="input"><br><br>
                <p>Time:</p>
                <input type="text" name="time" value = "<?php echo $info['time']; ?>" id="input"><br><br>
                <br>
                <br>
                <input type="hidden" name="showId" value = "<?php echo $info['showId']; ?>">
                <input type="hidden" name="showmovie_id" value = "<?php echo $info['movieId']; ?>">
                <input type="submit" value="submit" style="background-color:lightgrey" name="editForm">
            </fieldset>
        </form>
        
        <?php endforeach; ?>
        <?php endif?>
        </main>        
      
</html>
