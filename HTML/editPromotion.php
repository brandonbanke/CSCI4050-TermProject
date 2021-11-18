<?php 
require("../PHP/getPromotion.php");
require("../PHP/getUserInfo.php");

if (isset($_POST['change'])) {
    $promId = filter_input(INPUT_POST, 'promId');
    $query = "SELECT * FROM promotion WHERE id = '$promId'";
    $statement = $db->prepare($query);
    $statement->execute();
    $info = $statement->fetchAll();
    $count = $statement->rowCount();
    $statement->closeCursor();

    $promoName = $info[0]['promoName'];
    $code = $info[0]['code'];
    $description = $info[0]['promDescription'];
}?>

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
                <button ><a href="../HTML/adminMenu.php">Go back</a></button>

            </div>
        <body>
        <!-- NEEDS TO SHOW SPECIFIC PROMOTION -->
        <div id="promotion-screen">
            <div>
                <form method='POST' action='../PHP/getPromotion.php'>
                        <p>Name</p>
                        <input type="text" value = "<?php echo $promoName; ?>" name='name'>
                        <p>Code</p>
                        <input type="text" value = "<?php echo $code; ?>" name='code'>
                        <p>Description</p>
                        <input type="text" value = "<?php echo $description; ?>" name='description'>
                        
                        
                        <input type="hidden" name="promotion_id" value = "<?php echo $promId; ?>">
                        <input type="submit" value="Submit" name="changePromoForm">
                </form>
            </div>
        </div>
        <!-- SPECIFIC PROMO -->
        </body>
    </main>
</html>
