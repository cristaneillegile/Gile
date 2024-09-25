
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        
        body {
            font-family: "Lato", sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(90deg, #00d2ff 0%, #3a47d5 100%); 
            color: #fff;
            overflow: hidden;
            position: relative;
        }

    
        body::before,
        body::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            z-index: 0;
            opacity: 0.2;
        }

        body::before {
            width: 500px;
            height: 500px;
            background: rgba(0, 210, 255, 0.1);
            top: -150px;
            left: -150px;
            transform: rotate(45deg);
        }

        body::after {
            width: 400px;
            height: 400px;
            background: rgba(58, 71, 213, 0.1);
            bottom: -150px;
            right: -150px;
            transform: rotate(-45deg);
        }

        .container {
            text-align: center;
            background: rgba(255, 255, 255, 0.1); 
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            z-index: 1;
        }

        h1 {
            font-size: 48px;
            color: #fff;
            margin-bottom: 30px;
        }

        .btn-logout {
            background: linear-gradient(135deg, #3a47d5, #00d2ff); 
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-logout:hover {
            background: linear-gradient(135deg, #00d2ff, #3a47d5);
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>HOMEPAGE</h1>

        <?php 
        session_start();
        echo $_SESSION['encry'] ?>
        <form action="logout.php" method="post">
            <button type="submit" class="btn-logout">Logout</button>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
