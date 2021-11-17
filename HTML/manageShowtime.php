<!DOCTYPE html>
<html lang="en">
<html> 
<div id="managePromotions" class="content">       
        
        <p>Select promotion:</p>    
        <?php foreach ($specificShowInfs as $specificShowInf) : ?>
            <form method="POST" action="">
                <input type="hidden" value="<?php echo $specificShowInf['showId'] ?>" name="promId">
                <p><?php echo $specificShowInf['time'].' '. $specificShowInf['date']; ?> <button type="submit" class="changeButton">Change</button>  </p>
            </form>
        <?php endforeach; ?>

        <!-- Add promotion 
            <div class="addPromo">
                <p>Add new promotion:</p>
                
                <form class = "promotionForm" method='POST' action='../PHP/promotionInformation.php'> 
                    <fieldset>
                        
                        <label>Promotion Name:</label>
                        <input type="text" name='pName'><br><br><br>
                        <label>Promotion Code:</label>
                        <input type="text" name='pCode'><br><br><br>
                        <label>Promotion Description:</label>
                        <input type="text" name='pDescription'><br><br><br>
                        
                        <input class = "bookMovie" type="submit" value="Submit">
                    </fieldset>
                </form>
            </div> 
            -->
        </div>
</html>
