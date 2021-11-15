<?php 
    require("../PHP/database.php");

    $movieIden = filter_input(INPUT_POST, 'movie_id');
    


    $changequery = "SELECT title FROM movie
                        WHERE id= '$movieIden'
                        ";
    $changestatement = $db->prepare($changequery);
    $changestatement->execute();
    $rowcount = $changestatement->rowCount();

    $mNameTitle = filter_input(INPUT_POST, 'new_mName');
    $changeTitle = "UPDATE movie
    SET title = '$mNameTitle' WHERE id= '$movieIden'";
    $db->exec($changeTitle);


    $changequery2 = "SELECT category FROM movie
                        WHERE id= '$movieIden'
                        ";
    $changestatement2 = $db->prepare($changequery2);
    $changestatement2->execute();
    $rowcount2 = $changestatement2->rowCount();

    $mCat = filter_input(INPUT_POST, 'new_mCategory');
    $changeCategory = "UPDATE movie
    SET category = '$mCat' WHERE id= '$movieIden'";
    $db->exec($changeCategory);


    $changequery3 = "SELECT movieCast FROM movie
                        WHERE id= '$movieIden'
                        ";
    $changestatement3 = $db->prepare($changequery3);
    $changestatement3->execute();
    $rowcount3 = $changestatement3->rowCount();

    $mCastMems = filter_input(INPUT_POST, 'new_mCast');
    $changeCast = "UPDATE movie
    SET movieCast = '$mCastMems' WHERE id= '$movieIden'";
    $db->exec($changeCast);

    $changequery4 = "SELECT director FROM movie
                        WHERE id= '$movieIden'
                        ";
    $changestatement4 = $db->prepare($changequery3);
    $changestatement4->execute();
    $rowcount4 = $changestatement4->rowCount();

    $mDirec = filter_input(INPUT_POST, 'new_mDirector');
    $changeDirector = "UPDATE movie
    SET director = '$mDirec' WHERE id= '$movieIden'";
    $db->exec($changeDirector);

    $changequery5 = "SELECT producer FROM movie
                        WHERE id= '$movieIden'
                        ";
    $changestatement5 = $db->prepare($changequery5);
    $changestatement5->execute();
    $rowcount5 = $changestatement3->rowCount();

    $mProd = filter_input(INPUT_POST, 'new_mProducer');
    $changeProducer = "UPDATE movie
    SET producer = '$mProd' WHERE id= '$movieIden'";
    $db->exec($changeProducer);

    $changequery6 = "SELECT synopsis FROM movie
                        WHERE id= '$movieIden'
                        ";
    $changestatement6 = $db->prepare($changequery6);
    $changestatement6->execute();
    $rowcount6 = $changestatement6->rowCount();

    $mSynop = filter_input(INPUT_POST, 'new_mSynopsis');
    $changeSynopsis = "UPDATE movie
    SET synopsis = '$mSynop' WHERE id= '$movieIden'";
    $db->exec($changeSynopsis);
    

    
    $changequery7 = "SELECT reviews FROM movie
                        WHERE id = '$movieIden'
                        ";
    $changestatement7 = $db->prepare($changequery7);
    $changestatement7->execute();
    $rowcount7 = $changestatement7->rowCount();

    $mReviews = filter_input(INPUT_POST, 'new_mReviews');
    $changeReviews = "UPDATE movie
    SET reviews = '$mReviews' WHERE id = '$movieIden'";
    $db->exec($changeReviews);


    $changequery8 = "SELECT trailer FROM movie
                        WHERE id = '$movieIden'
                        ";
    $changestatement8 = $db->prepare($changequery8);
    $changestatement8->execute();
    $rowcount8 = $changestatement8->rowCount();

    $mTrailer = filter_input(INPUT_POST, 'new_mTrailerLink');
    $changeTrailer = "UPDATE movie
    SET trailer = '$mTrailer' WHERE id = '$movieIden'";
    $db->exec($changeTrailer);


    $changequery9 = "SELECT picture FROM movie
                        WHERE id = '$movieIden'
                        ";
    $changestatement9 = $db->prepare($changequery9);
    $changestatement9->execute();
    $rowcount9 = $changestatement9->rowCount();

    $mPicture = filter_input(INPUT_POST, 'new_mMoviePic');
    $changePicture = "UPDATE movie
    SET picture = '$mPicture' WHERE id = '$movieIden'";
    $db->exec($changePicture);



    $changequery10 = "SELECT ratingCode FROM movie
                        WHERE id = '$movieIden'
                        ";
    $changestatement10 = $db->prepare($changequery10);
    $changestatement10->execute();
    $rowcount10 = $changestatement10->rowCount();

    $mRatingCode = filter_input(INPUT_POST, 'new_mRating');
    $changeRatingCode = "UPDATE movie
    SET ratingCode = '$mRatingCode' WHERE id = '$movieIden'";
    $db->exec($changeRatingCode);


    $changequery11 = "SELECT showTime FROM movie
                        WHERE id = '$movieIden'
                        ";
    $changestatement11 = $db->prepare($changequery11);
    $changestatement11->execute();
    $rowcount11 = $changestatement11->rowCount();

    $mShowTime = filter_input(INPUT_POST, 'new_mTime');
    $changeShowTime = "UPDATE movie
    SET showTime = '$mShowTime' WHERE id = '$movieIden'";
    $db->exec($changeShowTime);


    $changequery12 = "SELECT showDate FROM movie
                        WHERE id = '$movieIden'
                        ";
    $changestatement12 = $db->prepare($changequery12);
    $changestatement12->execute();
    $rowcount12 = $changestatement12->rowCount();

    $mShowDate = filter_input(INPUT_POST, 'new_mDate');
    $changeShowDate = "UPDATE movie
    SET showDate = '$mShowDate' WHERE id = '$movieIden'";
    $db->exec($changeShowDate);

   

    $changequery13 = "SELECT comingSoon FROM movie
                        WHERE id = '$movieIden'
                        ";
    $changestatement13 = $db->prepare($changequery13);
    $changestatement13->execute();
    $rowcount13 = $changestatement13->rowCount();

    $comeSoon = filter_input(INPUT_POST, 'new_mComingSoon');
    
    # if checked, prom = 1, 0 otherwise
    if($comeSoon == NULL){
        $comeSoon = 0;
    } 
    else {
        $comeSoon = 1;
    }
    
    $changeComingSoon = "UPDATE movie
    SET comingSoon = '$comeSoon' WHERE id = '$movieIden'";
    $db->exec($changeComingSoon);

    include("../HTML/adminMenu.php");
?>

