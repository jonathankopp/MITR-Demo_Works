<?php 
	session_start();
?>

<?php
	$dbh = new PDO('mysql:host=localhost;dbname=Demo_Works', "root", "password");
	if(isset($_POST['FirstName'])){
		// echo "<script>console.log('".$_POST['FirstName']."');</script>";
		if(trim($_POST['CompanyName'])==NULL){
			$sqlInsert = "INSERT INTO customers (`FirstName`,`LastName`,`Address`,`City`,`PostalCode`,`Phone`,`Email`) VALUES(?,?,?,?,?,?,?)";
			$submit = $dbh->prepare($sqlInsert);
			$submit->execute([$_POST['FirstName'],$_POST['LastName'],$_POST['Address'],$_POST['City'],$_POST['PostalCode'],$_POST['ContactNum'],$_POST['ContactEmail']]);

		}else{
			$sqlInsert = "INSERT INTO customers (`FirstName`,`LastName`,`ContactTitle`,`Address`,`City`,`PostalCode`,`Phone`,`Email`) VALUES(?,?,?,?,?,?,?,?)";
			$submit = $dbh->prepare($sqlInsert);
			$submit->execute([$_POST['FirstName'],$_POST['LastName'],$_POST['CompanyName'],$_POST['Address'],$_POST['City'],$_POST['PostalCode'],$_POST['ContactNum'],$_POST['ContactEmail']]);
		}
		
	}
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
				<div class="text-center">
				
					<h1>All clients</h1>
					<?php
						try {
							$dbh = new PDO('mysql:host=localhost;dbname=Demo_Works', "root", "password");
							$res = $dbh->prepare("
							SELECT `LastName`, `FirstName`,`CustomerID`,`ContactTitle`
							FROM `customers`
								ORDER BY `LastName`, `FirstName` ASC");
					
							$res->execute();
							while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
								if($row['ContactTitle']!=NULL){
									echo '<h3><a href=client.php?ID='.$row['CustomerID'].'>'.$row["LastName"].', '. $row["FirstName"] .' ['.$row['ContactTitle'] .']</a></h3>';
								}else{ 
									echo '<h3><a href=client.php?ID='.$row['CustomerID'].'>'.$row["LastName"].', '. $row["FirstName"] .' </a></h3>';
								}
							}
							$dbh = null;
						
						}catch (PDOException $e) {
							die("DB ERROR:" . $e->getMessage());
						}
					?>
					
				</div>
			</div>
		</div>

	</body>
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>
	<script src="js/jquery.hideseek.min.js" type="text/javascript"></script>
	<script src="js/main.js" type="text/javascript"></script>
</html>
