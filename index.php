<?php

session_start();
if ($_GET['do'] == 'logout') {
    unset($_SESSION['admin']);
    session_destroy();
}
if ($_SESSION['admin'] != "admin") {
    header("Location: login.php");
    exit;
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
        <?php $show = 'none'; ?>
        <div class="menu">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                <a class="navbar-brand" href="#">Лого</a>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            АВР/РНР
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#box" onclick="openbox(box); return false">Відкрити
                                АВР/РНР</a>
                            <a class="dropdown-item" href="#box2" onclick="openbox(box2); return false">Закрити
                                АВР/РНР</a>
                            <a class="dropdown-item" href="#">Спец.форма</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#box" onclick="openbox('box'); return false">Відкрити
                            АВР/РНР</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?do=logout">Вихід</a>
                    </li>
                </ul>
            </nav>

        </div>
        <div id="box" style="display: none">
            <P>box</P>
        </div>
        <div id="resbox2" style="display: block">
            <?php
            include 'work2.php';
            ?>

        </div>
        <div class="boxtwo">
            <div id="box2" style="display: <?php echo $show; ?>">

                <form method="post" action="index.php">
                    <div class="form-row">
                        <div class="col-auto">

                            <label for="example">Номер ЕН</label>
                            <input class="form-control" name="form_id_en" type="text" placeholder="вкажіть номер ЕН">
                        </div>
                        <div class="col-auto">

                            <label for="example">Номер обладнання</label>
                            <input class="form-control" name="form_id_dslam" type="text"
                                placeholder="вкажіть номер обладнання">
                        </div>
                        <div class="col-auto">
                            <label for="exampleInputEmail1">Вкажіть дату завершення АВР\РНР</label>
                            <input type="date" class="form-control" name="form_date_e" id="exampleInputDate"
                                aria-describedby="Дата початку АВР\РНР" placeholder="Вкажіть дату завершення АВР\РНР">

                        </div>

                        <div class="col-auto">
                            <label for="exampleInputEmail1">Вкажіть рекомендації</label>
                            <input type="text" class="form-control" name="form_recom" id="exampleInputDate"
                                aria-describedby="Дата завершення АВР\РНР" placeholder="Вкажіть рекомендації">

                        </div>
                    </div>
                    <button type="submit" name="send-param" class="btn btn-primary">Відправити</button>
                </form>

            </div>
            <script>
            var box = document.getElementById('box');
            var box2 = document.getElementById('box2');
            var resbox2 = document.getElementById('resbox2');

            function openbox(boxer) {
                fix = box.style.display;
                fix2 = box2.style.display;
                console.log(box);
                display = boxer.style.display;
                if (display == "none") {
                    if (fix == "block") {
                        box.style.display = "none";
                    } else if (fix2 == "block") {
                        box2.style.display = "none";
                        resbox2.style.display = "none";
                    }
                    boxer.style.display = "block";
                } else {
                    boxer.style.display = "none";
                }
            }
            </script>
        </div>


        <div class=" info">
            <p>hi</p>
        </div>
    </div>

</body>

</html>