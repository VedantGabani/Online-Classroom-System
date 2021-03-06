<?php
$mysql_hostname = "localhost";
$mysql_user = "oepwt";
$mysql_password = "oepwt07";
$mysql_database = "scet";

$con = new PDO('mysql:host=localhost;dbname=scet', $mysql_user, $mysql_password);

session_start();

if ($_SESSION["login_user"] == null) {
    header("location:../login/facultylogin.php");
} else {
    print_r($_SESSION["login_user"]);
}

?>

<?php

if (isset($_POST) && !empty($_POST)) {
    $classID = $_POST['classNames'];
    $text = $_POST['assignment_text'];
    $addAssignment = "INSERT INTO assignment_master (class_id, details, f_id) VALUES (?, ?, ?);";
    $stmt = $con->prepare($addAssignment);
    $result = $stmt->execute([$classID, $text, $_SESSION['login_user']]);
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Computer Engineering Department, SCET</title>
    <meta property="og:type" content="website">
    <meta name="description" content="Computer Engineering Department Intranet">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/logo/16%20x%2016.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/logo/32%20x%2032.png">
    <link rel="icon" type="image/png" sizes="180x180" href="assets/img/logo/180%20x%20180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/img/logo/192%20x%20192.png">
    <link rel="icon" type="image/png" sizes="512x512" href="assets/img/logo/512%20x%20512.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Duru+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,400i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Proza+Libre:400,400i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400">
    <link rel="stylesheet" href="../assets/css/Footer-Clean.css">
    <link rel="stylesheet" href="../assets/css/Social-Icons.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body class="body-style">
    <div id="header-div" class="w-100" style="margin-top: 15px;margin-bottom: 15px;">
        <div class="row d-flex justify-content-center align-items-center" style="margin: 0px;">
            <div class="col-12 col-md-auto text-center"><img src="../assets/img/logo/scet_logo.png" id="header-college-logo"></div>
            <div class="col-auto text-center">
                <p id="trust-name" class="heading">Sarvajanik Education Society</p>
                <p id="college-name" class="heading main">Sarvajanik College of Engineering and Technology</p>
                <p id="department-name" class="heading">Computer Engineering Department</p>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-dark navbar-expand-md sticky-top bg-dark navbar-style" id="nav-bar-linked">
        <div class="container-fluid"><a class="navbar-brand" href="../index.html">CO INTRA</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav mx-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="../index.php">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="../attendance/findex.php">Mark Attendance</a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="../login/logout.php">log out</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section id="main-content" class="w-100 h-100">
        <ol class="breadcrumb" id="page-location">
            <li class="breadcrumb-item active"><span>Home</span></li>
            <li class="breadcrumb-item active"><span>Annoucement</span></li>
        </ol>
        <div class="container">
            <div class="row">
                <div class="col">
                    <form action="" method="POST">
                        <?php
                        $classSelectQuery = "SELECT * FROM `class_master` WHERE 1";
                        $classSelectQueryResult = $con->query($classSelectQuery);

                        echo '<select class="form-control" name="classNames">';
                        foreach ($classSelectQueryResult as $row) {
                            echo '<option value="', $row['id'], '">', $row['class_name'], '</option>';
                        }
                        echo '</select><br />';
                        ?>
                        <div class="form-group">
                            <label for="list">Add Annoucement: </label>
                            <textarea class="form-control" rows="5" id="list" name="assignment_text"></textarea>
                            <br />
                            <br />
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col">

                </div>
            </div>
        </div>
    </section>
    <div class="d-block footer-clean" id="footer-bar">
        <footer>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-auto item">
                        <h3>Quick Links</h3>
                        <ul>
                            <li><a href="http://35.198.226.140/" target="_blank">Moodle</a></li>
                            <li><a href="/assets/files/quicklinks/GTUACD2019.pdf">Academic Calendar</a></li>
                            <li><a href="/assets/files/quicklinks/SCET BE-SEM-4-6-8-EVEN calendar 2018-19.pdf" target="_blank">College Academic Calendar</a></li>
                            <li><a href="/assets/files/quicklinks/Continuous evaluation scheme CO (B.E.) Aug 2018.pdf" target="_blank">Continuous Evaluation Scheme (BE-II/III/IV)</a></li>
                            <li><a href="/assets/files/quicklinks/HL2019.pdf" target="_blank">List of Holidays-2019</a></li>
                            <li><a href="/assets/files/quicklinks/intra.pdf" target="_blank">Intra Phone Directory</a></li>
                        </ul>
                    </div>
                    <div class="col-auto item">
                        <h3>Miscellaneous</h3>
                        <ul>
                            <li><a href="http://172.16.11.2/" target="_blank">College-Intranet</a></li>
                            <li><a href="http://172.16.3.1:4080/" target="_blank">Kerio Firewall</a></li>
                            <li><a href="/assets/files/quicklinks/Internet Usage Policy_SCET V3.pdf" target="_blank">Policy for Internet Usage</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>