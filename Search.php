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
        <title>Demo Works Expediting Inc</title>
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
                        <form name="Search" action="Search.php" method="POST">
                            <fieldset> 
                                <legend>Search Client</legend>
                                <div class="formData">
                                    <label class="field">Search</label>
                                    <div class="value">
                                        <input type="text" size="60" value="" name="SearchQuery"  class="form-control" placeholder = "'Johnson' or 'johnson doe' or '30 Cedar Street' THEN Press ENTER to Search"/>
                                    </div>
                                </span>
                                </div>
                                
                            </fieldset>
                        </form>
                    </section>
                </div>
            </div>
            <?php
                //TODO: IMPLEMENT SEARCH ALGO
                if(isset($_POST['SearchQuery'])){
                    //IMPLEMENT SEARCH ALGORITHIM
                    $searchArray = explode(" ",$_POST['SearchQuery']);
                    try {
                        $dbh = new PDO('mysql:host=localhost;dbname=Demo_Works', "root", "password");
                        if(sizeof($searchArray)==2){
                            //First and Last name
                            $res = $dbh->prepare("
                            SELECT `LastName`, `FirstName`,`CustomerID`
                            FROM `customers`
                                WHERE FirstName='".$searchArray[0]."'OR LastName='".$searchArray[1]."'");
                    
                            $res->execute();
                            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                                echo '<h3><a href=client.php?ID='.$row['CustomerID'].'>'.$row["LastName"].', '. $row["FirstName"] .' </a></h3>';
                            }
                            $dbh = null;
                        }else if(sizeof($searchArray)==3){
                            //Most Likely Address Search clients related to job address
                            // SELECT students.rin,`first_name`, `last_name`,`street`,`city`,`state`,`zip` FROM students INNER JOIN grades on students.rin = grades.rin WHERE 			
                            //  grade > 90 LIMIT 0, 30

                            //DOESNT WORK
                            $res = $dbh->prepare("
                            SELECT customers.CustomerID, customers.`FirstName`, customers.`LastName` FROM customers INNER JOIN jobs on customers.CustomerID = jobs.CustomerID WHERE
                                Address='".$_POST['SearchQuery']."'");
                           

                            $res->execute();
                            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                                echo '<h3><a href=client.php?ID='.$row['CustomerID'].'>'.$row["LastName"].', '. $row["FirstName"] .' </a></h3>';
                            }
                            $dbh = null;
    
                        }else{
                            //First or last name
                            $res = $dbh->prepare("
                            SELECT `LastName`, `FirstName`,`CustomerID`
                            FROM `customers`
                                WHERE FirstName='".$searchArray[0]."' OR LastName='".$searchArray[0]."'");
                    
                            $res->execute();
                            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                                echo '<h3><a href=client.php?ID='.$row['CustomerID'].'>'.$row["LastName"].', '. $row["FirstName"] .' </a></h3>';
                            }
                            $dbh = null;
                        }



                        
                    
                    }catch (PDOException $e) {
                        die("DB ERROR:" . $e->getMessage());
                    }
                    
                }



            ?>
        </div>
        
    </body>

    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>
    <script src="js/jquery.hideseek.min.js" type="text/javascript"></script>
    <script src="js/main.js" type="text/javascript"></script>
</html>