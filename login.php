<?php
session_start();

//conncet to DB on local machine
$conn = new mysqli("localhost", "root", "root", "mysql");
if ($conn->connect_error) {
    die("Ошибка: " . $conn->connect_error);
}
//if user click on button submit we get some info from form
if ($_POST['submit']) {
    $email = $_POST['email'];
    $password = $_POST['pass'];
    //check input info in oure db
    $sql = "SELECT * FROM users WHERE email = '$email' AND PASSWORD = '$password'";
    $result = $conn->query($sql);
    //if we get info from db we will be redirected user to the next page
    if ($result->num_rows == '1') {
        foreach ($result as $row) {
            $row["firstName"];
        }
        //we gives info to redirected page
        $_SESSION['email'] = $email;
        $_SESSION['user'] =  $row["firstName"];
        $_SESSION['dt_come'] =  DATE('H:i:s');
        header("Location: index.php");
        exit;
    } else {
        print("<script>
window.alert('Login or password is incorrect!');
</script>");
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/tilt/tilt.jquery.min.js"></script>
</head>

<body>

    <div class="limiter">

        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="images/img-01.png" alt="IMG">
                </div>



                <form method="post" class="login100-form validate-form">
                    <span class="login100-form-title">
                        Authorization
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="ninput100" type="text" name="email" placeholder="email" required>
                        <span class="focus-input100"></span>

                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="ninput100" type="password" name="pass" placeholder="password" required>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <input class="btn btn-primary" type="submit" name="submit" value="Submit" />
                    </div>

                    <div class="text-center p-t-12">
                        <span class="txt1">
                            Do you want
                        </span>
                        <a class="txt2" href="registration.php">
                            Registration?
                        </a>
                    </div>


                </form>
            </div>
        </div>
    </div>





    <script>
    $('.js-tilt').tilt({
        scale: 1.1
    })
    </script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>

</html>