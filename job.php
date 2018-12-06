<?php
    if(!(isset($_GET['ID']))){
        echo "<h1>ERROR</h1>";
    }else{
        $dbh = new PDO('mysql:host=localhost;dbname=Demo_Works', "root", "password");
        $res = $dbh->prepare("
        SELECT * FROM `Check_Off`
            WHERE ID='".$_GET['ID']."'");

        $res->execute();
        if($res->rowCount()==0){
            // echo"<script>console.log('asdfas');</script>";  
            //Add all forms under this id
            $statement = "INSERT INTO `Check_Off` (`ID`, `FormType`) VALUES
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
                                $_GET['ID'],"PW-2 App Demo/Fence",
                                $_GET['ID'],"Blank Check DOB Filing/Perimit",
                                $_GET['ID'],"TR1/DS1 from Engineer",
                                $_GET['ID'],"Tax Map",
                                $_GET['ID'],"Fence Filing"
                            ]
            );
            
        }
        //Display all forms with button for editing.
        if(isset($_POST['updateCheck'])){
            //push to database
            $i=0;
            foreach ($_POST as $key => $value){  
                $need = substr($key, 5);
                $need = str_replace("_"," ",$need);
                if($i==0){
                    //Date Req
                    $dateReqQ = 'UPDATE `Check_Off` SET `D_Req` ="'. $value .'" WHERE `FormType`= "'.$need.'" AND `ID`='.$_GET['ID'].';';
					$dateReqCall = $dbh->prepare($dateReqQ);
					$dateReqCall->execute();
                    // echo"<script>console.log('".$need.', '.$value.', '.$i."');</script>";  
                }else if($i==1){
                    //Date Rec
                    $dateRecQ = 'UPDATE `Check_Off` SET `D_Rec` ="'. $value .'" WHERE `FormType`= "'.$need.'" AND `ID`='.$_GET['ID'].';';
					$dateRecCall = $dbh->prepare($dateRecQ);
					$dateRecCall->execute();
                    // echo"<script>console.log('".$need.', '.$value.', '.$i."');</script>";  
                }else{
                    //Price
                    $priceQ = 'UPDATE `Check_Off` SET `Price` ="'. $value .'" WHERE `FormType`= "'.$need.'" AND `ID`='.$_GET['ID'].';';
					$priceCall = $dbh->prepare($priceQ);
					$priceCall->execute();
                    // echo"<script>console.log('".$need.', '.$value.', '.$i."');</script>";  
                    $i=-1;
                }
                $i++;
            }

        }
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
            <?php
                if(!(isset($_GET['ID']))){
                    echo "<h1>ERROR</h1>";
                }else{
                    $dbh = new PDO('mysql:host=localhost;dbname=Demo_Works', "root", "password");
                    echo '<a class="navbar-brand mb-0 h1" href="client.php?ID='.$_GET['cID'].'"> Back </a>';
                }
            ?>
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
                         <?php
                            if(!(isset($_GET['update']))){
                                echo'<table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">Form Type</th>
                                    <th scope="col">Date Requsted</th>
                                    <th scope="col">Date Recieved</th>
                                    <th scope="col">Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>';
                            }
                            
                        ?>
                                 <!-- TODO:  Implement php here to dynamically edit in client info -->
                                    <?php
                                        if(!(isset($_GET['ID']))){
                                            echo "<h1>ERROR</h1>";
                                        }else{
                                            $dbh = new PDO('mysql:host=localhost;dbname=Demo_Works', "root", "password");
                                            $res = $dbh->prepare("
                                            SELECT * FROM `Check_Off`
                                                WHERE ID='".$_GET['ID']."'");
                            
                                            $res->execute();
                                            
                                            if(!(isset($_GET['update']))){
                                                echo '<input type="button" class="btn btn-primary btn-lg btn-block" value="Edit" onclick=" editChecklist('.$_GET['ID'].', '.$_GET['cID'] .');">
                                                ';
                                                $price=0;
                                                while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                                                    echo '<tr>';
                                                    echo '<td>'.$row['FormType'].'</td>';
                                                    echo '<td>'.$row['D_Req'].'</td>';
                                                    echo '<td>'.$row['D_Rec'].'</td>';
                                                    echo '<td>'.$row['Price'].'</td>';
                                                    echo '</tr>';
                                                    $price+=$row['Price'];
                                                }
                                                echo '<tr>';
                                                echo '<td><strong>FINAL PRICE:</strong></td>';
                                                echo '<td></td>';
                                                echo '<td></td>';
                                                echo '<td><strong><i>$'.$price.'</i></strong></td>';
                                                echo '</tr>';
                                            }else{
                                                $output='<form name="update" action="job.php?ID='.$_GET['ID'].'&cID='.$_GET['cID'].'" method="POST">
                                                <fieldset><legend>Edit Checklist</legend><div class="formData">
                                                <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th scope="col">Form Type</th>
                                                    <th scope="col">Date Requested</th>
                                                    <th scope="col">Date Recieved</th>
                                                    <th scope="col">Price</th>
                                                </tr>
                                                </thead>
                                                <tbody>';
                                                
                                                while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                                                    $output.='
                                                        <tr>
                                                        <td><label class="field">'.$row['FormType'].'</label></td>
                                                        <td><input type="text" size="60" value="'.$row['D_Req'].'" name="D_Req'.$row['FormType'].'"  class="form-control" placeholder = "'.$row['D_Req'].'"/></td>
                                                        <td><input type="text" size="60" value="'.$row['D_Rec'].'" name="D_Rec'.$row['FormType'].'"  class="form-control" placeholder = "'.$row['D_Rec'].'"/></td>
                                                        <td><input type="text" size="60" value="'.$row['Price'].'" name="Price'.$row['FormType'].'"  class="form-control" placeholder = "'.$row['Price'].'"/></td>
                                                        </tr>
                                                    ';
                                                    
                                                }
                                                $output.='
                                                <tr><td></td><td></td><td></td><td><input type="submit" value="Save" id="save" name="updateCheck" class="btn btn-primary btn-block"></td></tr></div>
                                                </fieldset></tbody>';
                                                
                                                echo $output;

                                            }
                                            
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
function relocate_addJob(CustomerID){
     location.href = "addJob.php?ID="+CustomerID;
}
function editChecklist(jID,cID){
    location.href = "job.php?ID="+jID+"&update="+0+"&cID="+cID;
}
</script>
</body>

</html>
