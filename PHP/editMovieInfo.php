<?php 
    require("../PHP/database.php");
    $mNameTitle = filter_input(INPUT_POST, 'new_mName');
    $movieIden = filter_input(INPUT_POST, 'movie_id');
    $mCat = filter_input(INPUT_POST, 'new_mCategory');
    $mCastMems = filter_input(INPUT_POST, 'new_mCast');
    $mDirec = filter_input(INPUT_POST, 'new_mDirector');
    $mProd = filter_input(INPUT_POST, 'new_mProducer');
    $mSynop = filter_input(INPUT_POST, 'new_mSynopsis');
    $mReviews = filter_input(INPUT_POST, 'new_mReviews');
    $mTrailer = filter_input(INPUT_POST, 'new_mTrailerLink');
    $mPicture = filter_input(INPUT_POST, 'new_mMoviePic');
    $mRatingCode = filter_input(INPUT_POST, 'new_mRating');
    $mShowTime = filter_input(INPUT_POST, 'new_mTime');  
    $mShowDate = filter_input(INPUT_POST, 'new_mDate');
    $comeSoon = filter_input(INPUT_POST, 'new_mComingSoon');
    
    # if checked, prom = 1, 0 otherwise
    if($comeSoon == NULL){
        $comeSoon = 0;
    } 
    else {
        $comeSoon = 1;
    }

    $changeTitle = "UPDATE movie
    SET title = '$mNameTitle',
    category = '$mCat',
    movieCast = '$mCastMems',
    director = '$mDirec',
    producer = '$mProd',
    synopsis = '$mSynop',
    reviews = '$mReviews',
    trailer = '$mTrailer',
    picture = '$mPicture',
    ratingCode = '$mRatingCode',
    showTime = '$mShowTime',
    showDate = '$mShowDate',
    comingSoon = '$comeSoon'
    WHERE id= '$movieIden'";
    $db->exec($changeTitle);
   
    
    header("Location: ../HTML/adminMenu.php");
?>

