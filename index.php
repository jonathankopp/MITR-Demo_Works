<?php 
	session_start();
?>

<?php
	$dbh = new PDO('mysql:host=localhost;dbname=Demo_Works', "root", "password");
	if(isset($_POST['FirstName'])){
		$fname=htmlspecialchars($_POST['FirstName']);
		$lname=htmlspecialchars($_POST['LastName']);
		$add=htmlspecialchars($_POST['Address']);
		$city=htmlspecialchars($_POST['City']);
		$pcode=htmlspecialchars($_POST['PostalCode']);
		$contactN=htmlspecialchars($_POST['ContactNum']);
		$contactE=htmlspecialchars($_POST['ContactEmail']);
		$companyName=htmlspecialchars($_POST['CompanyName']);

		// echo "<script>console.log('".$_POST['FirstName']."');</script>";
		if(trim($_POST['CompanyName'])==NULL){
			$sqlInsert = "INSERT INTO customers (`FirstName`,`LastName`,`Address`,`City`,`PostalCode`,`Phone`,`Email`) VALUES(?,?,?,?,?,?,?)";
			$submit = $dbh->prepare($sqlInsert);
			$submit->execute([$fname,$lname,$add,$city,$pcode,$contactN,$contactE]);

		}else{
			$sqlInsert = "INSERT INTO customers (`FirstName`,`LastName`,`ContactTitle`,`Address`,`City`,`PostalCode`,`Phone`,`Email`) VALUES(?,?,?,?,?,?,?,?)";
			$submit = $dbh->prepare($sqlInsert);
			$submit->execute([$fname,$lname,$companyName,$add,$city,$pcode,$contactN,$contactE]);
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
				
				
						
						<h1>All Clients</h1>
						<form id="myform" method="post">
							<select  name = 'Alpha' style = 'position: relative' onchange="change()">
								<option value="0">Filter</option>
								<option value="1">All</option>
								<option value="A">A</option>
								<option value="B">B</option>
								<option value="C">C</option>
								<option value="D">D</option>
								<option value="E">E</option>
								<option value="F">F</option>
								<option value="G">G</option>
								<option value="H">H</option>
								<option value="I">I</option>
								<option value="J">J</option>
								<option value="K">K</option>
								<option value="L">L</option>
								<option value="M">M</option>
								<option value="N">N</option>
								<option value="O">O</option>
								<option value="P">P</option>
								<option value="Q">Q</option>
								<option value="R">R</option>
								<option value="S">S</option>
								<option value="T">T</option>
								<option value="U">U</option>
								<option value="V">V</option>
								<option value="W">W</option>
								<option value="X">X</option>
								<option value="Y">Y</option>
								<option value="Z">Z</option>
							</select>
						</form>
						

					<?php
						try {
							$dbh = new PDO('mysql:host=localhost;dbname=Demo_Works', "root", "password");
							if(isset($_POST['Alpha']) and $_POST['Alpha']!="1"){
								$res = $dbh->prepare("
								SELECT `LastName`, `FirstName`,`CustomerID`,`ContactTitle`
								FROM `customers`
									WHERE  `LastName` LIKE'".$_POST['Alpha']."%'");

							}else{
								$res = $dbh->prepare("
								SELECT `LastName`, `FirstName`,`CustomerID`,`ContactTitle`
								FROM `customers`
									ORDER BY `LastName`, `FirstName` ASC");
							}
							
					
							$res->execute();
							$isRows = false;
							while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
								$isRows=true;
								if($row['ContactTitle']!=NULL){
									echo '<h3><a href=client.php?ID='.$row['CustomerID'].'>'.$row["LastName"].', '. $row["FirstName"] .' ['.$row['ContactTitle'] .']</a></h3>';
								}else{ 
									echo '<h3><a href=client.php?ID='.$row['CustomerID'].'>'.$row["LastName"].', '. $row["FirstName"] .' </a></h3>';
								}
							}
							if(!$isRows){
								echo"<h3 href='#'>No Results</h3>";
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
	<script>
		function change(){
			document.getElementById("myform").submit();
		}
	</script>		
</html>
