<?php
    require("../PHP/database.php");
    require("../PHP/getMovieInfo.php");

    if (isset($_POST['search'])) {
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
    } else if (isset($_POST['date'])) {

        #LEFT OFF HERE, NEEDS TO LOOK UP ALL MOVIES BASED ON DATE #
        $date = $_POST['date'];
        $query = "SELECT * FROM movie WHERE id = 
        (SELECT movieId FROM showinfo WHERE showId = 
        (SELECT showId FROM showinfo WHERE date = '$date'))";
        $statement = $db->prepare($query);
        $statement->execute();
        $information= $statement->fetchAll();
        $rowCount = $statement->rowCount();
        $statement->closeCursor();

        include("../HTML/search-results.php");
        if ($rowCount == 0) {
            echo "<p> Movie was not found. </p>";
        }
    }
    

    
?>