<?php include("database.php"); ?>
<?php include("include/functions.php"); ?>
<?php session_start(); ?>
<?php 

if(!isset($_SESSION['score'])){
    $_SESSION['score']=0; 
}

if($_POST){
    $number = $_POST['number'];
    $selected_choice = $_POST['choice'];
    
    echo $number."<br/>";
    echo $selected_choice."<br/>";
    $next = $number+1;
    
    $total = totalquestions();
    
    $query = "SELECT * FROM choices WHERE question_number = $number AND is_correct = 1";
    
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
    
    $row = $result->fetch_assoc();
    
    $correct_choice = $row['id'];
    
    if($correct_choice == $selected_choice){
        $_SESSION['score']++;
    }
    
    if($number == $total){
        header("Location:final.php");
        exit();
    }else{
        header("Location:question.php?n=".$next);
    }
    
} 