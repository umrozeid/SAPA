<?php
session_start();

if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true){
    header("location: user.php");
    exit;
}

require_once "assets/php/usersControl.php";
$usersControl = new UsersControl();
$username = $password = "";
$userError = $passwordError = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty($_POST["username"])){
        $userError = "Username is Required";
    } else{
        $username = $_POST["username"];
    }

    if(empty($_POST["password"])){
        $password_err = "Password is Required";
    } else{
        $password = $_POST["password"];
    }

    if(empty($userError) && empty($passwordError)){
        if($usersControl->isUserAuthenticated($username,$password)){
            header("location: user.php");
            exit;
        }else{
            $userError = $passwordError = "PLEASE CHECK YOUR INFORMATION";
        }
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/styles/signup.css">
    <script src="https://kit.fontawesome.com/7429bca8b0.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=ABeeZee&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Zilla+Slab&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
<div class="container h-100 justify-content-center align-items-center d-flex">
    <div class="form-content row ">
        <div class="form-left d-flex justify-content-center align-items-center flex-column col-12 col-md-6" id="sign-in-form-left-background">
            <div class="text-1">
                <p>Welcome to SAPA</p>
            </div>
            <!--<div class="text-2">
                <p>.....</p>
            </div>-->
        </div>
        <form class="form-detail col-12 col-md-6" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" id="myform">
            <div class="form-row">
                <label for="username">USERNAME</label>
                <input type="text" name="username" id="username"
                       class="input-text <?php echo (!empty($userError)) ? 'credentials-error' : ''; ?>"
                       placeholder="<?php echo $userError; ?>" required>
            </div>
            <div class="form-row">
                <label for="password">PASSWORD</label>
                <input type="password" name="password" id="password"
                       class="input-text <?php echo (!empty($passwordError)) ? 'credentials-error' : ''; ?>"
                       placeholder="<?php echo $passwordError; ?>" required>
            </div>
            <div class="form-row row my-3">
                <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                    <input type="submit" name="login" class="buttons" value="Login">
                </div>
                <div class="mt-md-0 mt-2 col-12 col-md-6 d-flex align-items-center justify-content-center">
                    <a href="index.php">Go Back to Home</a>
                </div>
            </div>
        </form>
    </div>
</div>
</body>

</html>
