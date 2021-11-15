<?php 
    require("../PHP/getMovieInformation.php");
?>

<!DOCTYPE html>
<html lang="en">
    <?php foreach ($specificMovieInfs as $specificMovieInf) : ?>
    <div style="float: left; width: 50%; background-color: inherit;">
        <form method='POST' action='../PHP/editMovieInfo.php'>
            <fieldset><br><br>
            <label>name:</label>
            <input type="text" value = "<?php echo $specificMovieInf['title']; ?>"><br><br>
            <label>Category</plabel>
            <input type="text" name="new_mCategory" value = "<?php echo $specificMovieInf['category']; ?>"><br><br>
            <label>Cast</label>
            <input type="text" name="new_mCast" value = "<?php echo $specificMovieInf['movieCast']; ?>"><br><br>
            <label>director</label>
            <input type="text" name="new_mDirector" value = "<?php echo $specificMovieInf['director']; ?>"><br><br>
            <label>Producer</label>
            <input type="text" name="new_mProducer" value = "<?php echo $specificMovieInf['producer']; ?>"><br><br>
            <label>synopsis</label>
            <input type="text" name="new_mSynopsis" value = "<?php echo $specificMovieInf['synopsis']; ?>"><br><br>
            <label>reviews</label>
            <input type="text" name="new_mReviews" value = "<?php echo $specificMovieInf['reviews']; ?>"><br><br>
            <label>trailer link</label>
            <input type="text" name="new_mTrailerLink" value = "<?php echo $specificMovieInf['trailer']; ?>"><br><br>
            <label>movie picture</label>
            <input type="text" name="new_mMoviePic" value = "<?php echo $specificMovieInf['picture']; ?>"><br><br>
            <label>MPPA-US film rating code</label>
            <input type="text" name="new_mRating" value = "<?php echo $specificMovieInf['ratingCode']; ?>"><br><br>
            <label>show date</label>
            <input type="text" name="new_mDate" value = "<?php echo $specificMovieInf['showDate']; ?>"><br><br>
            <label>show time</label>
            <input type="text" name="new_mTime" value = "<?php echo $specificMovieInf['showTime']; ?>"><br><br>
            <?php
                $checked = "";
                if ($specificMovieInf['comingSoon'] == 1) {
                    $checked = "checked";
                }
            ?>
            <input id="check" type="checkbox" name="new_mComingSoon" <?php echo $checked;?>>
            <label id="checkLabel" for="new_mComingSoon"> Coming Soon? </label><br><br><br>
            <br>
            <br>
            <input type="hidden" name="movie_id" value = "<?php echo $specificMovieInf['id']; ?>">
            <input type="submit" value="submit" style="background-color:lightgrey">
            </fieldset>
        </form>
    </div>
<?php endforeach; ?>

    </html>