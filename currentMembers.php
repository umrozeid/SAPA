<?php
session_start();

if (!((isset($_SESSION['canViewMembers'])&&$_SESSION['canViewMembers'] == 1)||(isset($_SESSION['canEditMembers'])&&$_SESSION['canEditMembers'] == 1))){
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
</head>

<body>
<?php include "assets/php/userNavbar.php"; ?>
<div class="container flex-grow-1 d-flex flex-column justify-content-center mt-5">
    <div class="align-self-end">
        <button type="button" name="add" id="addMember" class="btn btn-primary mb-2 <?php echo !(isset($_SESSION['canEditMembers'])&&$_SESSION['canEditMembers'] == 1) ? 'd-none' : ''; ?>">Add New Member</button>
    </div>
    <div class="table-responsive">
        <table id="membersTable" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Faculty</th>
                <th>Program</th>
                <th>University ID</th>
                <th>Address</th>
                <th>Facebook</th>
                <th>Phone Number</th>
                <th>Approved</th>
                <th>Approval Time</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
        </table>
    </div>
    <div id="membersModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" id="membersForm">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Member</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="universityID">University ID</label>
                            <input type="number" name="universityID" id="universityID" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="faculty">Faculty</label>
                            <input type="text" name="faculty" id="faculty" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="program">Program</label>
                            <input type="text" name="program" id="program" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="facebook">Facebook</label>
                            <input type="text" name="facebook" id="facebook" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="phoneNumber">Phone Number</label>
                            <input type="tel" name="phoneNumber" id="phoneNumber" class="form-control" pattern="[0]{1}[5]{1}[0-9]{8}"  title="i.e. 0598765432" required>
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
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<script src="assets/js/currentMembers.js"></script>
</body>
</html>
