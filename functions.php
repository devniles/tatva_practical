<?php
  include("config.php");
 
 
 function resultToArray($result) {
    $rows = array();
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;
}

function dayDiffrance($date1,$date2){
    
    $now = time(); // or your date as well

$datediff = $date2 - $date1;

return round($datediff / (60 * 60 * 24));
}

 


// Usage


