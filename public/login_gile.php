    <?php
        session_start();
        include "../private/config.php";

        $message = '';
        $showAlert = false;

        if (!isset($_SESSION['ctr'])) {
            $_SESSION['ctr'] = 0;
        }

        if (!isset($_SESSION['last_failed_attempt'])) {
            $_SESSION['last_failed_attempt'] = time(); 
        }

        // Reset counter if 5 minutes have passed
        if (time() - $_SESSION['last_failed_attempt'] > 60) { 
            $_SESSION['ctr'] = 0;
        }

        if (isset($_POST['ssubnet'])) {

            $Q = mysqli_query($con, "SELECT * FROM account WHERE username = '".$_POST['uname']."' AND password = '".$_POST['psw']."'");
            $N = mysqli_num_rows($Q);//checking
            


            if ($N > 0) {
                $showAlert = true;
                
            
            } else {
                $message = '<div class="alert alert-danger" role="alert">Invalid login credentials, please try again.</div>';
                $_SESSION['ctr']++;
                 $_SESSION['last_failed_attempt'] = time();
            }

            
        }
    ?>
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

            body {
        font-family: "Lato", sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        
        background-image: url('bg.jpg'); 
        background-size: cover; 
        background-position: center; 
        background-repeat: no-repeat;
        
        color: #333;
        overflow: hidden;
        position: relative;
    }




    .login-container {
    background: linear-gradient(90deg, #00d2ff 0%, #3a47d5 100%); 
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
    padding: 30px;
    border-radius: 20px;
    width: 350px;
    text-align: center; /* Center the content inside the container */
    animation: fadeIn 1s ease-in-out;

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: scale(0.9);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .login-container h2 {
        text-align: center;
        color: #fff;
        margin-bottom: 20px;
        position: relative;
        z-index: 1;
    }

    .form-group label {
        color: #fff;
    }

    .form-group input {
        background-color: rgba(255, 255, 255, 0.2); 
        border: 1px solid #fff;
        color: #fff;
    }

    .form-group input:focus {
        border-color: #00d2ff;
        box-shadow: 0 0 10px rgba(0, 210, 255, 0.5);
    }

    .form-group button {
        background: linear-gradient(135deg, #3a47d5, #00d2ff); 
        color: #fff;
        border: none;
        padding: 12px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        width: 100%;
        transition: background-color 0.3s ease;
    }

    .form-group button:hover {
        background: linear-gradient(135deg, #00d2ff, #3a47d5);
    }

            





        </style>
    </head>
    <body>
        <div class="login-container">
            
            <?php
            if ($_SESSION['ctr'] < 5) {
                echo $message;
             } else {
               $lock = '<div class="alert alert-danger" role="alert">too many failed login attempts wait 1 min to login again.</div>';
               echo $lock;
             }
              
             ?>

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
                    <button type="submit" name="ssubnet" class="btn btn-primary" <?php echo $_SESSION['ctr'] >= 5 ? 'disabled' : ''; ?>>Login</button>
                </div>
            </form>
        </div>

        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <?php if ($showAlert): ?>
            <script>
                $(document).ready(function() {
                    Swal.fire({
                        title: "Login Successful!",
                        text: "Redirecting to home page...",
                        icon: "success",
                        confirmButtonText: "Go to Home",
                        width: '40%',
                        padding: '20px',
                        fontSize: '16px'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "Home"; 
                        }
                    });
                });
            </script>
        <?php endif; ?>
    </body>
    </html>
