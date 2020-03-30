<?php
session_start();

if(!isset($_SESSION["loggedIn"]) || !$_SESSION["loggedIn"] === true){
    header("location: signin.php");
    exit;
}
if (!isset($_SESSION["isAdmin"])|| $_SESSION["isAdmin"] == 0){
    header("location: signin.php");
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
</head>

<body>
<nav class="navbar navbar-expand-lg">
    <a class="nav-title navbar-title" href="#">SAPA</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars toggle-icon"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#AU">About US</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#ot" tabindex="-1" aria-disabled="true">Our Team</a>
            </li>
            <!-- <li class="nav-item">
                  <a class="nav-link" href="#AR" tabindex="-1" aria-disabled="true">Articles</a>
              </li>-->
            <li class="nav-item">
                <a class="nav-link" href="#AC" tabindex="-1" aria-disabled="true">Achievements</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#JU" tabindex="-1" aria-disabled="true">Join Us</a>
            </li>
            <!--<li class="nav-item">
                <a class="nav-link" href="signin.php" tabindex="-1" aria-disabled="true">Log In</a>
            </li>-->
        </ul>
    </div>
</nav>
<div class="container flex-grow-1 d-flex flex-column justify-content-center mt-5">
    <div class="align-self-end">
        <button type="button" name="add" id="addUser" class="btn btn-primary mb-2">Add New User</button>
    </div>
    <div class="table-responsive">
        <table id="usersTable" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Password</th>
                <th>Admin</th>
                <th>Can View Members</th>
                <th>Can Edit Members</th>
                <th>Can Edit Announcements</th>
                <th>Can Edit Events</th>
                <th>Creation Time</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
        </table>
    </div>
    <div id="usersModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" id="usersForm">
                    <div class="modal-header">
                        <h5 class="modal-title">Add User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="isAdmin">Admin</label>
                            <select class="form-control" id="isAdmin" name="isAdmin" required form="usersForm">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="canViewMembers">Can View Members</label>
                            <select class="form-control" id="canViewMembers" name="canViewMembers" required form="usersForm">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="canEditMembers"> Can Edit Members</label>
                            <select class="form-control" id="canEditMembers" name="canEditMembers" required form="usersForm">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="canAddAnnouncements">Can Edit Announcements</label>
                            <select class="form-control" id="canAddAnnouncements" name="canAddAnnouncements" required form="usersForm">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="canAddEvents">Can Edit Events</label>
                            <select class="form-control" id="canAddEvents" name="canAddEvents" required form="usersForm">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="action" id="action" value="">
                        <input type="submit" name="save" id="save" class="btn btn-primary" value="Save">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Exit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<footer class="mt-4">
    <div class="py-5" id="footer-upper-part">
        <div class="container-md">
            <div class="row">
                <div class="col-12 col-md-6">
                    <h4>About SAPA</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur justo turpis, interdum dignissim tortor non, vestibulum iaculis justo.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur justo turpis, interdum dignissim tortor non, vestibulum iaculis justo.</p>
                </div>
                <div class="col-12 col-md-3">
                    <h4>Site Links</h4>
                    <ul>
                        <li>
                            <a href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li>
                            <a href="#AU">About US</a>
                        </li>
                        <li>
                            <a href="#ot">Our TEAM</a>
                        </li>
                        <li>
                            <a href="#AC">Achievements</a>
                        </li>
                        <li>
                            <a href="#JU">Join Us</a>
                        </li>
                        <li>
                            <a href="signin.php">Log In</a>
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-md-3">
                    <h4>Follow Us</h4>
                    <a href="" class="d-block">
                        <i class="fab fa-facebook mr-2"></i>
                        <p class="d-inline">Facebook</p>
                    </a>
                    <a href="" class="d-block">
                        <i class="fab fa-instagram mr-2"></i>
                        <p class="d-inline">Instagram</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div id="footer-lower-part">
        <div class="container-md pt-2">
            <p class="mb-1">Copyright © 2020 The Student Association for Physics and Astronomy. All Rights Reserved.</p>
            <p>Developed by <a href="">Tala Hethnawi</a>.</p>
        </div>
    </div>
</footer>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<script src="assets/js/usersPanel.js"></script>
</body>
</html>
