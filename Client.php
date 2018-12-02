<!DOCTYPE html>
<html lang="en">

<link rel="stylesheet" href="bootstrap.css">
<link rel="stylesheet" href="main.css">
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<head>
    <meta charset="UTF-8">
    <title>RPI Printers</title>
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
                <li><a href="addJob.php">Add Job</a></li>
                <li><a href="AddClient.php">Add Client</a></li>
            </ul>
        </div>
    </div><!--/.container-->
</nav>

<div class="container">
    <div class="row">
        <div class="col-lg middle">
            <h2>Client</h2>
            
            <h3>Client Information</h3>
            <div class=accordion>
                <div class="card"> 
                        <div class="card-header" id="headingClientInfo">
                            <h4>
                                <button class="btn btn-link" data-toggle="collapse" data-target="#clientInfo" aria-expanded="true" aria-controls="clientInfo">
                                    Contact Information
                                </button>
                            </h4>
                        </div>
                    <div id="clientInfo" class="collapse" aria-labelledby="headingClientInfo" data-parent="#accordion">
                        <div class="card-body">
                            <table class=table table-striped>
                                <thead>
                                <tr>
                                    <th scope="col">Client Name</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Postal Code</th>
                                    <th scope="col">Contact Number</th>
                                    <th scope="col">Contact Email</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <?php
                                        if(!(isset($_GET['ID']))){
                                            echo "<h1>ERROR</h1>";
                                        }else{
                                            $dbh = new PDO('mysql:host=localhost;dbname=Demo_Works', "root", "password");
                                            $res = $dbh->prepare("
                                            SELECT * FROM `customers`
                                                WHERE CustomerID='".$_GET['ID']."'");
                            
                                            $res->execute();
                                            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                                                if($row['ContactTitle']!=NULL){
                                                    $disp=$row['ContactTitle'];
                                                }else{
                                                    $disp=$row['FirstName']." ".$row['LastName'];
                                                }
                                                echo '<td>'.$disp.'</td>';
                                                echo '<td>'.$row['Address'].'</td>';
                                                echo '<td>'.$row['City'].'</td>';
                                                echo '<td>'.$row['PostalCode'].'</td>';
                                                echo '<td>'.$row['Phone'].'</td>';
                                                echo '<td>'.$row['Email'].'</td>';
                                            }
                                            $dbh = null;
                                        }
                                        
                                    ?>
                                    
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <h3>Client Jobs</h3>
            <div class=accordion>
                <div class="card"> 
                        <div class="card-header" id="headingJobInfo">
                            <h4>
                                <button class="btn btn-link" data-toggle="collapse" data-target="#jobInfo" aria-expanded="true" aria-controls="jobInfo">
                                    Client Jobs
                                </button>
                            </h4>
                        </div>
                    <div id="jobInfo" class="collapse" aria-labelledby="headingJobInfo" data-parent="#accordion">
                        <div class="card-body">
                            <table class=table table-striped>
                                <thead>
                                <tr>
                                    <th scope="col">See Job</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Block Lot</th>
                                    <th scope="col">Community Board</th>
                                    <th scope="col">Postal Code</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <!-- TODO:  Implement php here to dynamically load in jobs
                                                Jobs must be clickable links to their job.php page -->
                                    <?php
                                        if(!(isset($_GET['ID']))){
                                            echo "<h1>ERROR</h1>";
                                        }else{
                                            $dbh = new PDO('mysql:host=localhost;dbname=Demo_Works', "root", "password");
                                            $res = $dbh->prepare("
                                            SELECT * FROM `jobs`
                                                WHERE CustomerID='".$_GET['ID']."'");
                            
                                            $res->execute();
                                            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                                               

                                                echo '<td> <input type="button" class="btn btn-info" value="View Job" onclick=" relocate_home('.$row['jID'].')">
                                                </td>';
                                                echo '<td>'.$row['Address'].'</td>';
                                                echo '<td>'.$row['City'].'</td>';
                                                echo '<td>'.$row['Block Lot'].'</td>';
                                                echo '<td>'.$row['Community Board'].'</td>';
                                                echo '<td>'.$row['PostalCode'].'</td>';
                                            }
                                            $dbh = null;
                                        }
                                        
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <h3>Additional Notes</h3>
            <div class=accordion>
                <div class="card"> 
                        <div class="card-header" id="headingNotes">
                            <h4>
                                <button class="btn btn-link" data-toggle="collapse" data-target="#notes" aria-expanded="true" aria-controls="notes">
                                    Notes
                                </button>
                            </h4>
                        </div>
                    <div id="notes" class="collapse" aria-labelledby="headingNotes" data-parent="#accordion">
                        <div class="card-body">
                           
                            <?php

                                $dbh = new PDO('mysql:host=localhost;dbname=Demo_Works', "root", "password");
                                if(isset($_POST['notes'])){
                                    //push new notes to database
                                    $sqlInsert = "UPDATE customers SET `Notes` = CONCAT(`Notes`,"."'\n- ".$_POST['notes'].".'".") WHERE `CustomerID`=".$_GET['ID'];
                                    $submit = $dbh->prepare($sqlInsert);
                                    $submit->execute();
                                }
                                if(isset($_GET['update'])){
                                    //setup a forum for adding notes
                                    echo "<section>
                                    <form name='notesForum' action='Client.php?ID=".$_GET['ID']."' method='POST'>
                                        <fieldset> 
                                            <legend>Notes</legend>
                                            <div class='formData'>
                                                <label class='field'>Add Notes</label>
                                                <div class='value'>
                                                    <input type='text' size='180' value='' name='notes'  class='form-control' placeholder = 'Anything'/>
                                                </div>
                                            </span>
                                            </div>
                                        </fieldset>
                                    </form>
                                    </section>";
                                }else{
                                    //display current notes
                                    $queryCall = $dbh->prepare("
                                            SELECT `Notes` FROM `customers`
                                                WHERE CustomerID='".$_GET['ID']."'");
                    
                                    $queryCall->execute();
                                    while ($row = $queryCall->fetch(PDO::FETCH_ASSOC)) {
                                        echo '<td> <input type="button" class="btn btn-info" value="Add Notes" onclick=" relocate_homeTwo('.$_GET['ID'].');">
                                                </td>';
                                        $notesArr = explode("\n",$row['Notes']);
                                        for ($x = 0; $x < sizeof($notesArr); $x++) {
                                            echo "<h2>".$notesArr[$x]."</h2>";
                                            echo "<br/>";
                                        }

                                    }

                                }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
<script src="js/jquery.hideseek.min.js" type="text/javascript"></script>
<script src="js/main.js" type="text/javascript"></script>
<script>
function relocate_home(jID)
{
     location.href = "job.php?ID="+jID;
} 
function relocate_homeTwo(CustomerID)
{
     location.href = "Client.php?ID="+CustomerID+"&update="+0;
} 
</script>
</body>

</html>
