<?php 
    #require("../PHP/getMovieInformation.php");
    require("../PHP/getUserInfo.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="../CSS/adminMenu.css">
    </head>

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
            <button ><a href="../HTML/adminMenu.php">Back to Admin Menu</a></button>
        </div>
        <?php foreach ($specificMovieInfs as $specificMovieInf) : ?>
            <form method='POST' action='../PHP/editMovieInfo.php'>
                <fieldset><br><br>
                    <label>name:</label>
                    <input type="text" name="new_mName" value = "<?php echo $specificMovieInf['title']; ?>" id="input"><br><br>
                    <label>Category</plabel>
                    <input type="text" name="new_mCategory" value = "<?php echo $specificMovieInf['category']; ?>" id="input"><br><br>
                    <label>Duration</plabel>
                    <input type="text" name="new_mDuration" value = "<?php echo $specificMovieInf['duration']; ?>" id="input"><br><br>
                    <label>Cast</label>
                    <input type="text" name="new_mCast" value = "<?php echo $specificMovieInf['movieCast']; ?>" id="input"><br><br>
                    <label>director</label>
                    <input type="text" name="new_mDirector" value = "<?php echo $specificMovieInf['director']; ?>" id="input"><br><br>
                    <label>Producer</label>
                    <input type="text" name="new_mProducer" value = "<?php echo $specificMovieInf['producer']; ?>" id="input"><br><br>
                    <label>synopsis</label>
                    <input type="text" name="new_mSynopsis" value = "<?php echo $specificMovieInf['synopsis']; ?>" id="input"><br><br>
                    <label>reviews</label>
                    <input type="text" name="new_mReviews" value = "<?php echo $specificMovieInf['reviews']; ?>" id="input"><br><br>
                    <label>trailer link</label>
                    <input type="text" name="new_mTrailerLink" value = "<?php echo $specificMovieInf['trailer']; ?>" id="input"><br><br>
                    <label>movie picture</label>
                    <input type="text" name="new_mMoviePic" value = "<?php echo $specificMovieInf['picture']; ?>" id="input"><br><br>
                    <label>MPPA-US film rating code</label>
                    <input type="text" name="new_mRating" value = "<?php echo $specificMovieInf['ratingCode']; ?>" id="input"><br><br>
                 
                    <?php
                        $checked = "";
                        if ($specificMovieInf['comingSoon'] == 1) {
                            $checked = "checked";
                        }
                    ?>
                    <input id="check" type="checkbox" name="new_mComingSoon" <?php echo $checked;?>>
                    <label id="checkLabel" for="new_mComingSoon"> Coming Soon? </label><br><br>
                    <input type="hidden" name="movie_id" value = "<?php echo $specificMovieInf['id']; ?>">
                    <input type="submit" class="manageButton" value="submit">
                </fieldset>
            </form>
        <?php endforeach; ?>
    </main>

</html>


