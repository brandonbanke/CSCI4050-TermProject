<?php

require("database.php");

$query0 = "USE cinema_booking";
$db->exec($query0);

$query1 = "CREATE TABLE IF NOT EXISTS movie
(
    title VARCHAR(255) NOT NULL,
    category VARCHAR(255) NOT NULL,
    movieCast VARCHAR(255) NOT NULL,
    director VARCHAR(255) NOT NULL,
    producer VARCHAR(255) NOT NULL,
    synopsis VARCHAR(255) NOT NULL,
    reviews VARCHAR(255) NOT NULL,
    trailer VARCHAR(255) NOT NULL,
    picture VARCHAR(255) NOT NULL,
    ratingCode enum('G','PG','PG-13','R','NC-17') DEFAULT NULL,
    showTime VARCHAR(255) NOT NULL,
    showDate VARCHAR(255) NOT NULL,
    id VARCHAR(255) NOT NULL AUTO_INCREMENT PRIMARY KEY
)";
$db->exec($query1);


# gets the info
$name = filter_input(INPUT_POST, 'mName');
$category = filter_input(INPUT_POST, 'mCategory');
$director = filter_input(INPUT_POST, 'mDirector');
$cast = filter_input(INPUT_POST, 'mCast');
$producer = filter_input(INPUT_POST, 'mProducer');
$synopsis = filter_input(INPUT_POST, 'mSynopsis');
$reviews = filter_input(INPUT_POST, 'mReviews');
$trailerLink = filter_input(INPUT_POST, 'mTrailerLink');
$picture = filter_input(INPUT_POST, 'mMoviePic');
$rating = filter_input(INPUT_POST, 'mRating');
$date = filter_input(INPUT_POST, 'mDate');
$time = filter_input(INPUT_POST, 'mTime');

echo "name: " .$name;


$query2 = "INSERT INTO movie
(title, category, movieCast, director, producer, synopsis, reviews, trailer, picture, ratingCode, showTime, showDate, id)
VALUE
(:m_title, :category, :movieCast, :director, :producer, :synopsis, :reviews, :trailer, :picture, :ratingCode, :showTime, :showDate, :id)
";
$insertinfo = $db->prepare($query2);
$insertinfo->bindValue(':m_title', $name);
$insertinfo->bindValue(':category', $category);
$insertinfo->bindValue(':movieCast', $cast);
$insertinfo->bindValue(':director', $director);
$insertinfo->bindValue(':producer', $producer);
$insertinfo->bindValue(':synopsis', $synopsis);
$insertinfo->bindValue(':reviews', $reviews);
$insertinfo->bindValue(':trailer', $trailerLink);
$insertinfo->bindValue(':picture', $picture);
$insertinfo->bindValue(':ratingCode', $rating);
$insertinfo->bindValue(':showTime', $date);
$insertinfo->bindValue(':showDate', $time);
$insertinfo->execute();
$insertinfo->closeCursor();

?>