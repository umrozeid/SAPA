<?php
session_start();

if (!isset($_SESSION["isAdmin"]) || $_SESSION["isAdmin"] == 0) {
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
    <title>Users</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/styles/user.css">
    <script src="https://kit.fontawesome.com/7429bca8b0.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=ABeeZee&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Volkhov&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png">
</head>

<body>
<?php include "assets/php/userNavbar.php"; ?>
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
                            <select class="form-control" id="canViewMembers" name="canViewMembers" required
                                    form="usersForm">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="canEditMembers"> Can Edit Members</label>
                            <select class="form-control" id="canEditMembers" name="canEditMembers" required
                                    form="usersForm">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="canAddAnnouncements">Can Edit Announcements</label>
                            <select class="form-control" id="canAddAnnouncements" name="canAddAnnouncements" required
                                    form="usersForm">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="canAddEvents">Can Edit Events</label>
                            <select class="form-control" id="canAddEvents" name="canAddEvents" required
                                    form="usersForm">
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
<?php include "assets/php/userFooter.php"; ?>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<script src="assets/js/usersPanel.js"></script>
</body>
</html>
