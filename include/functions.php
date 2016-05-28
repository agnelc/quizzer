<?php
include("database.php");


function choices($number){
    
global $mysqli;
$query = "SELECT * FROM choices "
        . " WHERE question_number = $number";
	$choices = $mysqli->query($query) or die($mysqli->error.__LINE__);
        return $choices;
}

function question($number){
    
global $mysqli;
$query = "SELECT * FROM questions "
        . " WHERE question_number = $number";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

$question = $result->fetch_assoc();
        return $question;
}

function totalquestions(){   
global $mysqli;
    $query = "SELECT * FROM questions";
$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
$total = $results->num_rows;
return $total;
}