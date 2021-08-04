<?php

session_start();
$userAt = $_SESSION['email'];
if ($_GET['do'] == 'logout') {
    unset($_SESSION['email']);
    session_destroy();
}



if ($_POST['submit']) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $dt = DATE('Y-m-d H:i:s');
    $name =  $_SESSION['user'];
    $conn = new mysqli("localhost", "root", "root", "mysql");
    if ($conn->connect_error) {
        die("Ошибка: " . $conn->connect_error);
    }
    $sql = "INSERT INTO POSTS VALUES('$title', '$content', '$name', '$dt')";
    if ($conn->query($sql)) {
        header("Location: index.php");
        exit;
    } else {
        /* print("<script>
window.alert('Name or password is incorrect!');
</script>");*/
        echo $title . $content;
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Posts</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <!--===============================================================================================-->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->

    <link rel="stylesheet" type="text/css" href="css/main_2.css">

    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/tilt/tilt.jquery.min.js"></script>

    <!--===============================================================================================-->
    <script src="js/main.js"></script>
    <!--===============================================================================================-->
</head>

<body>
    <header>



    </header>
    <div class="main">
        <div class="menu">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                <a class="navbar-brand"
                    href="#"><?php echo 'Wellcome, ' . $_SESSION['user'] . ' you are logined at ' . $_SESSION['dt_come']; ?></a>
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link" href="#"> </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="newPost.php?do=newPost">Add post</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?do=logout">logout</a>
                    </li>
                </ul>
            </nav>

        </div>

    </div>
    <div class="posts_add">
        <form method="post" class="login100-form validate-form">
            <span class="login100-form-title">
                Add New Post
            </span>
            <div class="form-group">
                <textarea class="form-control" id="exampleFormControlTextarea1" name="title" placeholder="title"
                    rows="2" required></textarea>
            </div>

            <div class="form-group">
                <textarea class="form-control" id="exampleFormControlTextarea1" name="content" placeholder="content"
                    rows="6" required></textarea>
            </div>

            <div class="container-login100-form-btn">
                <input class="btn btn-primary" type="submit" name="submit" value="Submit" />
            </div>




        </form>

    </div>
</body>

</html>