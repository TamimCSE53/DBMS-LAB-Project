<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn Page</title>
    <link rel="stylesheet" href="LogIn_Page.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="styles.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <style>
        *{
            margin: 0;
            padding:0;
            box-sizing: border-box;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url("image/img7.jpg");
            background-size: cover;
            background-position: center;
        }

        .aukkhar{
            width: 450px;
            background: transparent;
            border: 2px solid rgba(253, 252, 252, 0.934);
            backdrop-filter: blur(20px);
            color: aliceblue;
            border-radius: 10px;
            padding: 30px 40px;
            box-shadow: 0 0 10px rgba(6, 231, 36, 0.2);
        }

        .aukkhar .input-box{
            position: relative;
            width: 100%;
            height: 50px;

            margin: 30px 0;
        }
        .aukkhar h1{
            font-size: 36px;
            text-align: center;
        }
        .input-box input{
            width: 100%;
            height: 100%;
            background: transparent;
            border: none;
            outline:none;
            border: 2px solid rgba(255,255,255,5);
            border-radius: 40px;
            font-size: 16px;
            color: rgb(255, 255, 255);
            padding: 20px 45px 20px 20px;
        }
        .input-box input::placeholder{
            color: aliceblue;
        }
        .input-box i{
            position: absolute;
            right: 20px;
            top: 30%;
        
            font-size: 20px;
            
        }
        .aukkhar .remember-forgot{
        display: flex;
        justify-content: space-between;
        font-size: 14.5px;
        margin: -15px 0 15px;

        }
        .remember-forgot label input{
            accent-color: #fff;
            margin-right: 3px;
        }
        input[type="checkbox"]{
        appearance: none;
        -webkit-appearance: none;
        height: 15px;
        width: 15px;
        background-color: #ae7f7f9d;
        text-align: center;
        }
        input[type="checkbox"]:after{
            font-family: "Font Awesome 5 Free";
            content: "\f00c";
            font-weight: 1000;
            color: rgb(255, 255, 255);
            display: none;
        }
        input[type="checkbox"]:hover{
            background-color: #a5a5a5;
        }
        input[type="checkbox"]:checked{
            background-color: rgb(14, 206, 72);
        }
        input[type="checkbox"]:checked::after{
            display: block;
        }   

        .remember-forgot a{
            color: #fff;
            text-decoration: none;

        }
        .remember-forgot a:hover{
            text-decoration: underline;
        }
        .aukkhar .btn{
            width: 100%;
            height: 45px;
            background-color: white;
            border: none;
            outline: none;
            border-radius: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
            cursor: pointer;
            font-size: 16px;
        color: black;
        font-weight: 600;
        border: 2px solid rgba(255,255,255,5);
        }
        .aukkhar .register-link{
            font-size: 14.5px;
            text-align: center;
            margin-top: 25px;
        }
        .register-link p a{
            color: #dedbdb;
            text-decoration: none;
            font-weight: 600;
        }
        .register-link p {
            color: #dedbdb;
            text-decoration: none;
            
        }

        .register-link p a:hover{
            text-decoration: underline;
        }
    </style>
    <body>
        <div class="aukkhar">
            <form action="carosel.html" method="get">
                <h1>Login</h1>
                <div class="input-box">
                    <input type="text" placeholder="Email" required>
                    <i class='bx bxl-gmail'></i>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Password" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox">Remember me</label>
                    <a href="#">Forget Password?</a>
                </div>
                <button type="submit" class="btn">Login</button>
                <div class="register-link">
                    <p>Don't have an account?
                        <a href="#">Register</a>
                    </p>
                </div>
            </form>
        </div>
    </body>
</html>
</html>
