<?php include("database.php"); ?>

<?php session_start(); ?>
<?php include("include/functions.php"); ?>
<?php 
//Set question  number
$number = (int)$_GET['n'];

$question = question($number);

$choices = choices($number);


$total = totalquestions();
?>

<?php include("include/header.php") ?>
        <main>

            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                        <h4 class="current">Question <?php echo $question['question_number']; ?> of <?php echo $total; ?>
                        <!--<small class="text-left"> Timer : <span id="timer">00:00:42</span> </small>--></h4>
                            <div class="cont" id="question_splitter_1">							
                                <div id="question1">
                                    <p class="questions" id="qname1"><?php echo $question['text']; ?></p>
                                    
                                    <form class="form-horizontal" role="form" id="quiz_form" method="post" action="process.php">
                                        <ul>
                                        <?php while($row = $choices->fetch_assoc()) :?>
                                        
                                        <li class="radio"><input type="radio" name="choice" value="<?php echo $row['id']?>" ><?php echo $row['text']?></li>
                                        
                                        <?php endwhile;?>
                                        
                                        </ul>
                                   


                                   <input class="btn btn-primary" type="submit" value="Submit" />
                                   <input type="hidden" name="number" value="<?php echo $number; ?>" />
                                  
                                    </form>
                                </div>
                                
                            </div>
                                

                        </form>
                        
                    </div>

                </div>

            </div>
        </main>
 <?php include("include/footer.php"); ?>  
