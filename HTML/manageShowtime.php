<!DOCTYPE html>
<html lang="en">
<html> 
<div id="managePromotions" class="content">       
            


        <p>Select Time for <?php echo $movieName; ?>:</p>    
        <?php foreach ($specificShowInfs as $specificShowInf) : ?>
            <form method="POST" action="">
                <input type="hidden" value="<?php echo $specificShowInf['showId'] ?>" name="promId">
                <p><?php echo $specificShowInf['time'].' '. $specificShowInf['date']; ?> <button type="submit" class="changeButton">Change</button>  </p>
            </form>
        <?php endforeach; ?>

         
            <div class="addShowTime">
                
                
                <form class = "promotionForm" method='POST' action='../PHP/addMovieShowtime.php'> 
                    <fieldset>
                        <p>Add new show time:</p>
                        <label>Date:</label>
                        <input type="text" name='date'><br><br><br>
                        <label>Time:</label>
                        <input type="text" name='time'><br><br><br> 
                        <input type="hidden" name="movieId" value="<?php echo $specificShowInfs[0]['movieId']; ?>">
                        
                        <input class = "bookMovie" type="submit" value="Submit">
                    </fieldset>
                </form>
            </div> 
            
        </div>
</html>
