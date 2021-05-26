<?php
$genres = array( "musicals" => array("Oklahoma", "The Music Man", "South Pacific"),
"dramas" => array("Lawrence of Arabia", "To Kill a Mockingbird", "Casablanca"),
"mysteries" => array("The Maltese Falcon", "Rear Window", "North by Northwest"));


foreach ($genres as $key=>$value) {

echo (strtoupper($key))."<br />";
foreach ($value as $iKey => $iValue) {
echo " ----> $iKey = $iValue<br />";
}
}

ksort($genres);
$genreslength = count($genres);
foreach ($genres as $key => $value) {
     echo "Movie Genre Values for Key #".$key.":<br />";
     foreach ($value as $iKey => $iValue) {
     echo " ----> $iKey = $iValue<br />";
     }
    }

?>
