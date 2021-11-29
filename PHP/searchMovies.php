<?php
    require("../Modal/database.php");
    require("../PHP/getMovieInfo.php");

    if (isset($_POST['search'])) {
        $search = filter_input(INPUT_POST, "search");
        $querySearch = "SELECT * FROM movie 
                        WHERE title LIKE '%".$search."%' 
                        OR category LIKE '%".$search."%'
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

        $date = $_POST['date'];
        $query = "SELECT DISTINCT movieId FROM showinfo 
                WHERE date LIKE '$date'";
        $statement = $db->prepare($query);
        $statement->execute();
        $ids = $statement->fetchAll();
        $rowCount = $statement->rowCount();
        $statement->closeCursor();
        #foreach($ids as $id){
        #    echo $id['movieId'];
        #}

        $group = "(";
        for ($x = 0; $x < $rowCount; $x++) {
            $group .= $ids[$x]['movieId'];
            if ($x != $rowCount-1) {

                $group .= ", ";
            }
        }
        $group .= ")";

        $query = "SELECT DISTINCT * FROM movie WHERE id IN $group ";
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