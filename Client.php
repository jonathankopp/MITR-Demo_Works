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
            <a class="navbar-brand" href="index.html"><img class="navbar-brand" src="img/logo.png" alt="logo"></a>
        </div>

        <div class="collapse navbar-collapse navbar-right">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.html">Home</a></li>
                <li><a href="info.html">Printer Info</a></li>
                <li><a href="setup.html">Setup Printer</a></li>
                <li><a href="tips.html">Tips</a></li>
            </ul>
        </div>
    </div><!--/.container-->
</nav>

<div class="container">
    <div class="row">
        <div class="col-sm-8 left">
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
                                    <th scope="col">Building</th>
                                    <th scope="col">Room</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Resolution</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>BARH</td>
                                    <td>1A09</td>
                                    <td><a href="http://www.rpi.edu/dept/arc/web/printing/ptrinfo.html#BH1A09LW">bh1A09lw</a></td>
                                    <td>600 dpi</td>
                                    <td>&nbsp;</td>
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
                                    <th scope="col">Address</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Postal Code</th>
                                    <th scope="col">Date Of Demo</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <!-- TODO:  Implement php here to dynamically load in jobs
                                                Jobs must be clickable links to their job.php page -->
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
</body>

</html>
