<?php 
	session_start();
?>


<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="main.css">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    

    <head>
        <meta charset="UTF-8">
        <title>Add Job</title>
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><img class="navbar-brand" src="img/logo.png" alt="logo">DemoWorks Expediting Inc</a>
                </div>

                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="Search.php">Search</a></li>
                        <li><a href="AddClient.php">Add Client</a></li>
                    </ul>
                </div>
            </div><!--/.container-->
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-8">
                    <section>
                        <?php
                        echo '
                        <form name="Add_Client" action="index.php" method="POST">
                            <fieldset> 
                                <legend>Add Client</legend>
                                <div class="formData">


                                    <label class="field">First Name (contact)</label>
                                    <div class="value">
                                        <input type="text" size="60" value="" name="FirstName"  class="form-control" placeholder = "Matt"/>
                                    </div>

                                    <label class="field">Last Name (contact)</label>
                                    <div class="value">
                                        <input type="text" size="60" value="" name="LastName"  class="form-control" placeholder = "Grill"/>
                                    </div>

                                   <label class="field">Company Name (if applies)</label>
                                    <div class="value">
                                        <input type="text" size="60" value="" name="CompanyName"  class="form-control" placeholder = "DemoWorks Expediting Inc"/>
                                    </div>

                                    <label class="field">Address</label>
                                    <div class="value">
                                        <input type="text" size="60" value="" name="Address"  class="form-control" placeholder = "1501 Sage Ave"/>
                                    </div>

                                    <label class="field">City</label>
                                    <div class="value">
                                        <input type="text" size="60" value="" name="City"  class="form-control" placeholder = "1501 Sage Ave"/>
                                    </div>

                                    <label class="field">Postal Code</label>
                                    <div class="value">
                                        <input type="text" size="60" value="" name="PostalCode"  class="form-control" placeholder = "11021"/>
                                    </div>
                                    
                                    <label class="field">Contact Number</label>
                                    <div class="value">
                                        <input type="text" size="60" value="" name="ContactNum"  class="form-control" placeholder = "5168508576"/>
                                    </div>

                                    <label class="field">Contact Email</label>
                                    <div class="value">
                                        <input type="text" size="60" value="" name="ContactEmail"  class="form-control" placeholder = "example@gmail.com"/>
                                    </div>


                                </div>
                                <input type="submit" value="Add Client" id="save" name="AddClient" class="btn btn-primary"/> </div>
                            </fieldset>
                        </form>';
                        ?>
                    </section>
                </div>
            </div>
        </div>
    </body>

    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>
    <script src="js/jquery.hideseek.min.js" type="text/javascript"></script>
    <script src="js/main.js" type="text/javascript"></script>
</html>
