<?php 
	session_start();
?>
<?php
		$dbOk = false;

		//connects to the database
		@ $db =  new mysqli('localhost', 'root', 'password', 'Demo_Works');

		//error if connection fails
		if ($db->connect_error) {
	    echo '<div class="messages">Could not connect to the database. Error: ';
	    echo $db->connect_errno . ' - ' . $db->connect_error . '</div>';
	  } else {
	    $dbOk = true; 
	  }

	  $errors = '';

      //Have New Job
	  if (isset($_POST['save'])) {
          //add the new job into database
      }
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
                        <form name="Add_Job" action="Client.php?ID='.$_GET['ID'].'" method="POST">
                            <fieldset> 
                                <legend>Add Job</legend>
                                <div class="formData">
                                    <label class="field">Address</label>
                                    <div class="value">
                                        <input type="text" size="60" value="" name="Address"  class="form-control" placeholder = "36 Leg St"/>
                                    </div>

                                    <label class="field">City</label>
                                    <div class="value">
                                        <input type="text" size="60" value="" name="City"  class="form-control" placeholder = "Great Neck"/>
                                    </div>

                                   <label class="field">Block Lot</label>
                                    <div class="value">
                                        <input type="text" size="60" value="" name="BlockLot"  class="form-control" placeholder = "36 Leg St"/>
                                    </div>

                                    <label class="field">Community Board</label>
                                    <div class="value">
                                        <input type="text" size="60" value="" name="CommunityBoard"  class="form-control" placeholder = "36 Leg St"/>
                                    </div>
                                    
                                    <label class="field">Postal Code</label>
                                    <div class="value">
                                        <input type="text" size="60" value="" name="PostalCode"  class="form-control" placeholder = "11021"/>
                                    </div>


                                </div>
                                <input type="submit" value="Save" id="save" name="save" class="btn btn-primary"/> </div>
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
