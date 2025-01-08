<?php
session_start();
error_reporting(0);
include('includes/config.php');
if($_SESSION['alogin']!=''){
$_SESSION['alogin']='';
}
if(isset($_POST['login']))
{
$uname=$_POST['umail'];
$password=md5($_POST['upass']);
$sql ="SELECT `StudentEmail`,`Pass` FROM tblstudents WHERE UserName=:umail and Pass=:upass";
$query= $dbh -> prepare($sql);
$query-> bindParam(':umail', $uname, PDO::PARAM_STR);
$query-> bindParam(':upass', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['alogin']=$_POST['umail'];
echo "<script type='text/javascript'> document.location = 'stddashboard.php'; </script>";
} else{

    echo "<script>alert('Invalid Details');</script>";

}

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NDUB Student Management System</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="css/prism/prism.css" media="screen">
    <link rel="stylesheet" href="css/main.css" media="screen">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/css/style22.css" rel="stylesheet">
    <script src="js/modernizr/modernizr.min.js"></script>
    <style>
    body {
        font-family: Arial, sans-serif;
        background: url(./back3.jpg) no-repeat;
        //background-position: center;
        background-size: cover;
        background-color: #6055c7;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 1400px;
        margin: 100px auto;
        padding: 20px;
        background-color: #ffffff;
        background: transparent;
        border: #91e0ff solid rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        border-radius: 10px;
        box-shadow: 0 10px 10px rgba(0, 0, 0, 1);
        text-align: center;
        animation: fadeInOut 2s;
    }

    h1 {
        margin-top: 00;
        font: 1;
        color: #ffffff;
    }

    #welcome-text {
        font-size: 24px;
        margin-bottom: 20px;
        color: #ffffff;
        animation: fadeInOut 5s infinite alternate;
    }

    @keyframes fadeInOut {
        0% {
            opacity: 0;
            transform: scale(0.9);
        }

        100% {
            opacity: 1;
            transform: scale(1);
        }
    }
    </style>
</head>

<body class="">
    <div class="main-wrapper">
        <!--#021b3c-->
        <div style="background-color:#afa014;height:4px; margin: 0px 0px 0px 0px"></div>
        <div style="background-color:#021b3c;height:4px; margin: 0px 0px 0px 0px"></div>
        <div style="background-color:#021b3c;height:4px; margin: 0px 0px 0px 0px"></div>
        <div style="background-color:#021b3c;height:72px; margin: 0px 0px 0px 0px">..
            <img src="https://ndub.edu.bd/wp-content/uploads/2023/06/NDUB-Logo-1.png" alt="logo" width="270"
                height="60">
            </img>
        </div>

        <div class="main-wrapper">
            <div class="container">

                <h1><img align="left" src="./logobg.png" width="100" height="100" alt="logo">Notre Dame University
                    Bangladesh
                    <br><br>Student Management System
                </h1>

                <div class="col-lg-6 visible-lg-block">

                    <section class="section">
                        <div class="row mt-40">
                            <div class="col-md-10 col-md-offset-1 pt-50">

                                <div class="row mt-30 ">
                                    <div class="col-md-11">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title text-center">
                                                    <h4>Student Result Portal</h4>
                                                </div>
                                            </div>
                                            <div class="panel-body p-20">

                                                <div class="section-title">
                                                    <p class="sub-title" align='center'></p>

                                                </div>

                                                <form class="form-horizontal" method="post">
                                                    <a href="find-result.php">click here for Result</a>
                                                    <div class="form-group" align='center'>

                                                        <label for="inputEmail3" class="col-sm-6 control-label"></label>
                                                        <div class="col-sm-6">
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>

                                        </div>
                                        <!-- /.panel -->

                                    </div>
                                    <!-- /.col-md-11 -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.col-md-12 -->
                        </div>
                        <!-- /.row -->
                    </section>
                </div>
                <section class="section">
                    <div class="row mt-40">
                        <div class="col-md-10 col-md-offset-1 pt-50">

                            <div class="row mt-30 ">
                                <div class="col-md-11">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <div class="panel-title text-center">
                                                <h4>Student Portal</h4>
                                            </div>
                                        </div>
                                        <div class="panel-body p-20">

                                            <div class="section-title">
                                                <p class="sub-title">Student Login</p>
                                            </div>

                                            <form class="form-horizontal" action="stddashboard.php" method="post" >
                                                <div class="form-group">
                                                    <label for="umail"
                                                        class="col-sm-2 control-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" name="umail" class="form-control"
                                                            id="umail" placeholder="Student Email">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="upass"
                                                        class="col-sm-2 control-label">Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" name="upass" class="form-control"
                                                            id="upass" placeholder="Password">
                                                    </div>
                                                </div>

                                                <div class="form-group mt-20">
                                                    <div class="col-sm-offset-2 col-sm-10">

                                                        <button type="submit" name="login"
                                                            class="btn btn-success btn-labeled pull-right">Sign
                                                            in<span class="btn-label btn-label-right"><i
                                                                    class="fa fa-check"></i></span></button>
                                                        <button type="submit" name="create"
                                                            class="btn btn-labeled pull-left"> <a
                                                                href="add-students.php">Create New Account</a>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.panel -->
                                    <p class="text-muted text-center"><small><a>Istiaq Alam</a></small> </p>
                                </div>
                                <!-- /.col-md-11 -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.col-md-12 -->
                    </div>
                    <!-- /.row -->
                </section>
            </div>


        </div>
        <div class="foot">
            <footer>
                <rssapp-ticker id="6vqEeswtmez1iGJk"></rssapp-ticker>
                <script src="https://widget.rss.app/v1/ticker.js" type="text/javascript" async></script>

            </footer>
            <!-- /.row -->
        </div>
        <!-- /. -->

    </div>
</body>

</html>