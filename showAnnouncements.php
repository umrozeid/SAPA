<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Announcements</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css"/>
    <link rel="stylesheet" href="assets/styles/main.css">
    <script src="https://kit.fontawesome.com/7429bca8b0.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=ABeeZee&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Volkhov&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png">
</head>

<body>
<?php include "assets/php/visitorNavbar.php"; ?>
<div class="container flex-grow-1 d-flex flex-column justify-content-center mt-5">
    <h1 class="text-center">Announcements</h1>
    <div id="announcementsCarousel" class="carousel slide mt-4" data-ride="carousel">
        <div class="carousel-inner" id="announcements-container"></div>
        <a class="carousel-control-prev" href="#announcementsCarousel" role="button" data-slide="prev">
            <i class="far fa-arrow-alt-circle-left announcement-carousel-buttons" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#announcementsCarousel" role="button" data-slide="next">
            <i class="far fa-arrow-alt-circle-right announcement-carousel-buttons" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<?php include "assets/php/visitorFooter.php"; ?>
<template class="announcement-template">
    <div class="col-12 col-md-4 d-flex justify-content-center align-items-center">
        <div class="card">
            <img src="" class="card-img-top announcement-image" alt="...">
            <div class="card-body">
                <a href="#" target="_blank" class="announcement-card-link">Read more...</a>
            </div>
        </div>
    </div>
</template>
<template class="carousel-item-template">
    <div class="carousel-item">
        <div class="row justify-content-around align-items-center"></div>
    </div>
</template>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
<script src="assets/js/showAnnouncements.js"></script>
</body>
</html>