<?php 
    require_once 'config.php';
    //Employee EID FORM process
    if (isset($_POST['signin'])) {
        $eid = $_POST['eid'];
        $date = date("D,F j, Y");
        $timein = date("g:i a"); 
        $timeout = date("g:i a");
        $sql = $conn->query("INSERT INTO time(eid,date,timein,timeout)VALUES('$eid','$date','$timein','')");
    }
    if (isset($_POST['signout'])) {
        $eid = $_POST['eid'];
        $date = date("D,F j, Y");
        $timein = date("g:i a"); 
        $timeout = date("g:i a");
        $sqltwo = $conn->query("UPDATE time SET timeout = '$timeout' WHERE eid = '$eid'");
    }
    //LOGIN FORM PROCESS

?>

<!Doctype html>
<html>
	<head>
		<title>TimeSheet</title>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="assets/css/material-kit.css" rel="stylesheet"/>
        <link rel="stylesheet" type="text/css" href="main.css">
		<meta name="viewport" content="width=device-width initial-scale=1">
		<!--JS  -->
        <script src="bootstrap/js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	
	</head>
	<body>
    <div class="container">
        <div class="col-md-8"> 
            <h3 class="text-center">Employee Sign In</h3>
            <form class="form-group" action="" method="post">
             <label class=""for="eid">Employee Id<span style="color:red">*</span>:</label>
             <input type="text" id="eid" name="eid" class="form-control" placeholder="Employee Id number"value=""><br><br>
             <input type="submit" name="signin" class="btn btn-success" value = "Sign In">
             <input type="submit" name="signout" class="btn btn-info" value = "Sign out">
            </form>
        </div>
        <div class="col-md-4">
            <h3 class="text-center">Admin Log In</h3>
            <form class="form-group" action="" method="post">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Username" value=""><br>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" value=""><br>
                <input type="submit" id="submit" name="login"  class="btn btn-primary form-control" value="Login">
            </form>
        </div>    
    </div>
    </body>
</hmtl>