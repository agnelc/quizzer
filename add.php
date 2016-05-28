<?php include("database.php") ?>
<?php include("include/functions.php"); ?>
<?php
if (isset($_POST['submit'])) {

    $question_number = $_POST['question_number'];
    $question_text = $_POST['question_text'];
    //Choices array
    $choices = array();
    $choices[1] = $_POST['choice1'];
    $choices[2] = $_POST['choice2'];
    $choices[3] = $_POST['choice3'];
    $choices[4] = $_POST['choice4'];
    $choices[5] = $_POST['choice5'];
    $correct_choice = $_POST['correct_choice'];

    $query = "INSERT INTO questions (question_number,text)"
            . "VALUES ('$question_number','$question_text')";

    $insert_row = $mysqli->query($query) or die($mysqli->error . __LINE__);

    if ($insert_row) {
        foreach ($choices as $choice => $value) {
            if ($value != '') {
                if ($correct_choice == $choice) {
                    $is_correct = 1;
                } else {
                    $is_correct = 0;
                }

                $query = "INSERT INTO `choices`(`question_number`, `is_correct`, `text`) "
                        . "VALUES ($question_number,$is_correct,'$value')";

                $insert_choices = $mysqli->query($query) or die($mysqli->error . __LINE__);

                if ($insert_row) {
                    continue;
                } else {
                    die('Error : (' . $mysqli->errno . ') ' . $mysqli->error);
                }
            }
        }
        
        $msg = "Question added successfully";
    }
}
$total = totalquestions();
$next = $total+1;

?>



<?php include("include/header.php") ?>
<main>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <h4>Add a Question</h4>
                <?php 
                    if(isset($msg)){
                        echo "<p>".$msg."</p>";
                    }
                ?>
                
                <form method="post" action="add.php">
                    <p>
                        <label>Question Number: </label>
                        <input type="number" value="<?php echo $next;?>" name="question_number" />
                    </p>
                    <p>
                        <label>Question Text: </label>
                        <input type="text" name="question_text" />
                    </p>
                    <p>
                        <label>Choice #1: </label>
                        <input type="text" name="choice1" />
                    </p>
                    <p>
                        <label>Choice #2: </label>
                        <input type="text" name="choice2" />
                    </p>
                    <p>
                        <label>Choice #3: </label>
                        <input type="text" name="choice3" />
                    </p>
                    <p>
                        <label>Choice #4: </label>
                        <input type="text" name="choice4" />
                    </p>
                    <p>
                        <label>Choice #5: </label>
                        <input type="text" name="choice5" />
                    </p>
                    <p>
                        <label>Correct Choice Number: </label>
                        <input type="number" name="correct_choice" />
                    </p>
                    <p>
                        <input type="submit" name="submit" value="Submit" />
                    </p>


                </form>



            </div>

        </div>

    </div>
</main>
<?php include("include/footer.php") ?>  
