<?php include("database.php"); ?>

<?php include("include/functions.php"); ?>
<?php 
//Get Total Questions

$total = totalquestions();

?>


<?php include("include/header.php") ?>
        <main>

            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                        <p> This is your multiple choice quiz to test your knowledge</p>
                        <ul>
                            <li>
                                <strong>Number of questions</strong> <?php echo $total;?>
                            </li>
                            <li>
                                <strong>Type:</strong> Multiple choice
                            </li>
                            <li>
                                <strong>Estimated time</strong> <?php echo $total;?>
                            </li>
                        </ul>
                        <a class="btn btn-primary" href="question.php?n=1" class="start">Start Quiz</a>
                        
                    </div>

                </div>

            </div>
        </main>
 <?php include("include/footer.php") ?>      