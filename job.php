<?php
    if(!(isset($_GET['ID']))){
        echo "<h1>ERROR</h1>";
    }else{
        $dbh = new PDO('mysql:host=localhost;dbname=Demo_Works', "root", "password");
        $res = $dbh->prepare("
        SELECT * FROM `Check_Off`
            WHERE jID='".$_GET['ID']."'");

        $res->execute();
        if($res->rowCount()==0){
            //Add all forms under this id
            $dbh = new PDO('mysql:host=localhost;dbname=Demo_Works', "root", "password");
            $statement = "INSERT INTO `Check_Off` (`jID`, `FormType`) VALUES
            (?,?),(?,?),(?,?),(?,?),(?,?),(?,?),(?,?),(?,?),(?,?),(?,?),(?,?),(?,?),(?,?),(?,?),(?,?),(?,?),(?,?),(?,?)";
            $submit = $dbh->prepare($statement);
            $submit->execute(

                            [
                                $_GET['ID'],"PGL Insurance WC/Liab/Dis Ins",
                                $_GET['ID'],"Rodent Control Letter",
                                $_GET['ID'],"Gas Cut Off",
                                $_GET['ID'],"Rodent Control Letter",
                                $_GET['ID'],"Gas Cut Off",
                                $_GET['ID'],"Water/Sewer Cut Off",
                                $_GET['ID'],"SRO Intake Form",
                                $_GET['ID'],"10 Day Notice Letter",
                                $_GET['ID'],"Community Board Notice",
                                $_GET['ID'],"Asbestos Report ACP5/AP21",
                                $_GET['ID'],"Photographs",
                                $_GET['ID'],"Landmark Letter",
                                $_GET['ID'],"PW-1 Application",
                                $_GET['ID'],"PW-2 App. Demo/Fence",
                                $_GET['ID'],"Blank Check DOB Filing/Perimit",
                                $_GET['ID'],"TR1/DS1 from Engineer",
                                $_GET['ID'],"Tax Map",
                                $_GET['ID'],"Fence Filing"
                            ]
            );
            
        }
        //Display all forms with button for editing.
    }
?>
<!DOCTYPE html>
<html lang="en">

<link rel="stylesheet" href="bootstrap.css">
<link rel="stylesheet" href="main.css">
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<head>
    <meta charset="UTF-8">
    <title>Jobs</title>
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
        <div class="col-lg middle">
        <?php
                if(!(isset($_GET['ID']))){
                    echo "<h1>ERROR</h1>";
                }else{
                    $dbh = new PDO('mysql:host=localhost;dbname=Demo_Works', "root", "password");
                    $res = $dbh->prepare("
                    SELECT * FROM `jobs`
                        WHERE jID='".$_GET['ID']."'");
    
                    $res->execute();
                    
                    while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                        $disp=$row['Address'].", ".$row['City']." | Block Lot: ".$row['Block Lot'];
                        echo "<h2>".$disp."</h2>";
                    }
                    $dbh = null;
                }
                
            ?>
            
            <h3>Check Off List</h3>
            <div class=accordion>
                <div class="card"> 
                        <div class="card-header" id="headingCheckOff">
                            <h4>
                                <button class="btn btn-link" data-toggle="collapse" data-target="#checkOff" aria-expanded="true" aria-controls="checkOff">
                                    Check Off
                                </button>
                            </h4>
                        </div>
                    <div id="checkOff" class="collapse" aria-labelledby="headingCheckOff" data-parent="#accordion">
                        <div class="card-body">
                            <table class=table table-striped>
                                <thead>
                                <tr>
                                    <th scope="col">Form Type</th>
                                    <th scope="col">Date Required</th>
                                    <th scope="col">Date Recieved</th>
                                    <th scope="col">Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                 <!-- TODO:  Implement php here to dynamically edit in client info -->
                                    <?php
                                        if(!(isset($_GET['ID']))){
                                            echo "<h1>ERROR</h1>";
                                        }else{
                                            $dbh = new PDO('mysql:host=localhost;dbname=Demo_Works', "root", "password");
                                            $res = $dbh->prepare("
                                            SELECT * FROM `Check_Off`
                                                WHERE jID='".$_GET['ID']."'");
                            
                                            $res->execute();
                                            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                                               
                                                echo '<tr>';
                                                echo '<td>'.$row['FormType'].'</td>';
                                                echo '<td>'.$row['D_Req'].'</td>';
                                                echo '<td>'.$row['D_Rec'].'</td>';
                                                echo '<td>'.$row['Price'].'</td>';
                                                echo '</tr>';
                                            }
                                            //Display all forms with button for editing.
                                        }
                                    ?>
                                    
                                </tr>
                                </tbody>
                            </table>
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
function relocate_home(jID){
     location.href = "job.php?ID="+jID;
} 
function relocate_homeTwo(CustomerID){
     location.href = "Client.php?ID="+CustomerID+"&update="+0;
} 
function relocate_addJob(CustomerID){
     location.href = "addJob.php?ID="+CustomerID;
}
</script>
</body>

</html>
