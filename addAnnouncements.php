<?php
session_start();

if (!(isset($_SESSION['canAddAnnouncements']) && $_SESSION['canAddAnnouncements'] == 1)) {
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
    <title>Announcements</title>
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
        <button type="button" name="add" id="addAnnouncement" class="btn btn-primary mb-2">Add New Announcement</button>
    </div>
    <div class="table-responsive">
        <table id="announcementsTable" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>URL</th>
                <th>Image</th>
                <th>Creation Time</th>
                <th></th>
            </tr>
            </thead>
        </table>
    </div>
    <div id="announcementsModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" id="announcementsForm" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Announcement</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="url">URL</label>
                            <input type="url" name="url" id="url" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control-file" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="action" id="action" value="addAnnouncement">
                        <input type="submit" name="add" id="add" class="btn btn-primary" value="Add">
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
<script src="assets/js/addAnnouncements.js"></script>
</body>
</html>
