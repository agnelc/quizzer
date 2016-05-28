<?php session_start(); ?>

<?php include("include/header.php") ?>
        <main>

            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                        <h4>You're Done </h4>
                        <p>Congrats! You have completed the test.</p>
                        <p>Final Score : <?php echo $_SESSION['score']; ?></p>
                        
                        <a class="btn btn-primary  start" href="question.php?n=1">Take Again</a>
                          <?php session_destroy(); ?> 

                        
                    </div>

                </div>

            </div>
        </main>
 <?php include("include/footer.php") ?>  
