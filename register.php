<?php
require_once "assets/php/membersControl.php";
$membersControl = new MembersControl();
$name = $email = $faculty = $program = $universityID = $address = $facebook = $phoneNumber = "";
$message = "";
$success = false;
$error = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $faculty = $_POST["faculty"];
    $program = $_POST["program"];
    $universityID = $_POST["universityID"];
    $address = $_POST["address"];
    $facebook = $_POST["facebook"];
    $phoneNumber = $_POST["phoneNumber"];
    if($membersControl->addMember($name, $email, $faculty, $program, $universityID, $address, $facebook, $phoneNumber, 0)){
        $message = "Thank You for Registration";
        $success = true;
    }else {
        $message = "PLEASE TRY AGAIN LATER";
        $error = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Join Us</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/styles/signup.css">
    <script src="https://kit.fontawesome.com/7429bca8b0.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=ABeeZee&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Zilla+Slab&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100%">
    <div class="form-content row">
        <div class="form-left d-flex justify-content-center align-items-center flex-column col-12 col-md-6">
            <div class="text-1">
                <p>Welcome to SAPA</p>
            </div>
            <div class="text-2">
                <p>Are you ready to join us?</p>
            </div>
        </div>
        <form class="form-detail col-12 col-md-6" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" name="registerForm" id="registerForm">
            <div class="form-row">
                <label for="name">NAME</label>
                <input type="text" name="name" id="name" class="input-text" placeholder="" required>
            </div>
            <div class="form-row">
                <label for="email">EMAIL</label>
                <input type="email" name="email" id="email" class="input-text" placeholder="" required>
            </div>
            <div class="form-row">
                <label for="universityID">UNIVERSITY ID</label>
                <input type="number" name="universityID" id="universityID" class="input-text" placeholder="" required>
            </div>
            <div class="form-row">
                <label for="faculty">FACULTY</label>
                <input type="text" name="faculty" id="faculty" class="input-text" placeholder="" required>
            </div>
            <div class="form-row">
                <label for="program">PROGRAM</label>
                <input type="text" name="program" id="program" class="input-text" placeholder="" required>
            </div>
            <div class="form-row">
                <label for="address">ADDRESS</label>
                <input type="text" name="address" id="address" class="input-text" placeholder="" required>
            </div>
            <div class="form-row">
                <label for="facebook">FACEBOOK ACCOUNT LINK</label>
                <input type="text" name="facebook" id="facebook" class="input-text" placeholder="" required>
            </div>
            <div class="form-row">
                <label for="phoneNumber">PHONE NUMBER</label>
                <input type="tel" name="phoneNumber" id="phoneNumber" class="input-text" placeholder="" pattern="[0]{1}[5]{1}[0-9]{8}"  title="i.e. 0598765432" required>
            </div>
            <!--<div class="student-type">
                <div class="radio-field">
                    <input checked="checked" id="school-student" name="student-type" type="radio">
                    <label for="school-student">School Student</label>
                </div>
                <div class="radio-field">
                    <input id="university-student" name="student-type" type="radio">
                    <label for="university-student">University Student</label>
                </div>
            </div>-->
            <div class="form-row row my-3">
                <div class="col-12 col-md-4 d-flex align-items-center justify-content-center">
                    <input type="submit" name="register" class="buttons" value="Register" >
                </div>
                <div class="mt-md-0 mt-2 col-12 col-md-8 d-flex align-items-center justify-content-center">
                    <a href="index.php">Go Back to Home</a>
                </div>
            </div>
            <div class="form-row <?php echo $error == true ? 'alert alert-warning' : ''; ?> <?php echo $success == true ? 'alert alert-success' : ''; ?>">
                <p><?php echo $message; ?></p>
            </div>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>
