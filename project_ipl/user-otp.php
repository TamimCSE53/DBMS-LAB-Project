<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: login-user.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Code Verification</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">


    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
        html,body{
            background: url("image/img7.jpg");
            font-family: 'Poppins', sans-serif;
        }
        ::selection{
            color: #fff;
            background: #6665ee;
        }
        .container{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .container .form {
            color: white;
            background: rgba(40, 42, 43, 0.7); 
            padding: 30px 35px;
            border-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(255, 255, 255, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            opacity: 95%;
            backdrop-filter: blur(20px); 
            -webkit-backdrop-filter: blur(20px); 
        }

        .container .form form .form-control {
            height: 43px;
            font-size: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(54, 50, 50, 0.2), 0 6px 20px 0 rgba(126, 115, 115, 0.19);
            transition: background-color 0.3s ease, color 0.3s ease; 
        }

        .container .form form .form-control:hover {
            background: black;
            color: white; 
        }

        .container .form form .form-control:focus {
            background: black;    
            color: white;        
            border-color:rgb(255, 255, 255); 
            box-shadow: 0 4px 8px 0 rgba(54, 50, 50, 0.2), 0 6px 20px 0 rgba(126, 115, 115, 0.19);
            outline: none; 
        }


        .container .form form .forget-pass{
            margin: -15px 0 15px 0;
        }
        .container .form form .forget-pass a{
        font-size: 15px;
        }
        
        .container .form form .button{
            background: #fff;
            color: black;
            font-size: 17px;
            font-weight: 600;
            border-radius: 10px;
            transition: all 0.3s ease;
        }
        .container .form form .button:hover{
            background:rgb(0, 0, 0);
            color: white;
            border-radius: 10px;
        }
        .container .form form .link{
            padding: 5px 0;
        }
        .container .form form .link a{
            color:rgb(255, 255, 255);
        }
        .container .form form .link a:hover{
            color:rgb(255, 219, 219);
        }
        .container .login-form form p{
            font-size: 14px;
        }
        .container .row .alert{
            font-size: 14px;
        }
    </style>


</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="user-otp.php" method="POST" autocomplete="off">
                    <h2 class="text-center">Code Verification</h2>
                    <?php 
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="alert alert-success text-center">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="number" name="otp" placeholder="Enter verification code" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="check" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>