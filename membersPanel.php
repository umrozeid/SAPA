<?php
session_start();

if(!isset($_SESSION["loggedIn"]) || !$_SESSION["loggedIn"] === true){
    header("location: signin.php");
    exit;
}
if(!((isset($_SESSION['canViewMembers'])&&$_SESSION['canViewMembers'] == 1)||(isset($_SESSION['canEditMembers'])&&$_SESSION['canEditMembers'] == 1))){
    header("location: user.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>S.A.P.A</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/styles/user.css">
    <script src="https://kit.fontawesome.com/7429bca8b0.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=ABeeZee&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Volkhov&display=swap" rel="stylesheet">
</head>

<body>
<?php include "assets/php/navbar.php"; ?>
<div class="container flex-grow-1 d-flex flex-column justify-content-center">
    <h1 class="text-center mt-5 heading">Members</h1>
    <div class="row justify-content-between align-items-center mt-5 mb-5">
        <div class="col-12 col-md-5 feature mb-3 d-flex flex-column justify-content-center align-items-center p-2 gradient-scooter clickable"
            onclick="window.location.href = 'currentMembers.php'">
            <h3 class="feature-text mb-3">Current Members</h3>
            <i class="fas fa-users feature-icon"></i>
        </div>
        <div class="col-12 col-md-5 feature mb-3 d-flex flex-column justify-content-center align-items-center p-2 gradient-quepal <?php echo (isset($_SESSION['canEditMembers'])&&$_SESSION['canEditMembers'] == 1) ? 'clickable' : 'not-clickable'; ?>"
            <?php
            if (isset($_SESSION['canEditMembers'])&&$_SESSION['canEditMembers'] == 1){
                echo "onclick=\"window.location.href = 'memberRequests.php' \"";
            }
            ?>
        >
            <h3 class="feature-text mb-3">Member Requests</h3>
            <i class="fas fa-user-plus feature-icon"></i>
        </div>
    </div>
</div>
<?php include "assets/php/footer.php"; ?>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
