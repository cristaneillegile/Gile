<?php
include "../private/config.php";

if (isset($_POST['ssubnet'])) {

	$gl = md5($_POST['psw']);
	
	$gile = mysqli_query($con, "INSERT INTO account (username,password) VALUES ('".$_POST['uname']."','$gl' )");
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

	<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Form</title>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
        
        <style>


        </style>
    </head>
    <body>
        <div class="login-container">
            


            <form action="#" method="post">
                <div class="form-group">
                    <label for="uname">Username:</label>
                    <input type="text" id="uname" name="uname" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="psw">Password:</label>
                    <input type="password" id="psw" name="psw" class="form-control" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="ssubnet">register</button>
                </div>
            </form>
        </div>

        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    </body>
    </html>


</body>
</html>>