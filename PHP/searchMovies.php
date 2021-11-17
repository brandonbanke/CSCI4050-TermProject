<?php
    require("../PHP/database.php");
    require("../PHP/getMovieInfo.php");

    $search = filter_input(INPUT_POST, "search");

    $querySearch = "SELECT * FROM movie 
                    WHERE title LIKE '%".$search."%' 
                    OR category LIKE '%".$search."%'
                    OR showDate LIKE '%".$search."%'
                    GROUP BY title
                    ";
    $results = $db->query($querySearch);
    $information = $results->fetchAll();
    $rowCount = $results->rowCount();
    $results->closeCursor();

    include("../HTML/search-results.php");
    if ($rowCount == 0) {
        echo "<p> Movie was not found. </p>";
    }

    
?>