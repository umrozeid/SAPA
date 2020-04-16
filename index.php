<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>S.A.P.A</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/styles/teamGrid.css">
    <link rel="stylesheet" href="assets/styles/main.css">
    <script src="https://kit.fontawesome.com/7429bca8b0.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=ABeeZee&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Volkhov&display=swap" rel="stylesheet">
</head>

<body>
<?php include "assets/php/visitorNavbar.php"; ?>
  <div id="top-div">
<!--    <div class="top-left">Top ;ljljjg kljhjcd ;lkjhgf</div>-->
<!--    <div class="top-left1">Top ;ljljjg kljhjcd ;lkjhgf</div>-->
  </div>
<!--    About Us Section-->
<div id="aboutUs">
    <div class="container-md" id="AU">
        <h2 class="sections-heading pt-3" >About Us</h2>
        <div class="row align-items-center justify-content-center">
            <div class="col-12 col-md-4 d-flex justify-content-center align-items-center">
                <img class="img-fluid" src="assets/img/logo.jpg" alt="logo">
            </div>
            <div class="col-12 col-md-8">
                <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur justo turpis, interdum dignissim tortor non, vestibulum iaculis justo. Donec non nisl malesuada, malesuada eros ac, tempor felis. Cras ac urna nulla. Vivamus convallis vel risus porttitor tincidunt. Suspendisse in diam ut ante cursus suscipit. Fusce cursus eu velit in venenatis. Mauris porttitor tortor ipsum, sit amet volutpat augue accumsan nec.</p>
            </div>
            <div class="col-12" style="padding-top: 1%;">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur justo turpis, interdum dignissim tortor non, vestibulum iaculis justo. Donec non nisl malesuada, malesuada eros ac, tempor felis. Cras ac urna nulla. Vivamus convallis vel risus porttitor tincidunt. Suspendisse in diam ut ante cursus suscipit. Fusce cursus eu velit in venenatis. Mauris porttitor tortor ipsum, sit amet volutpat augue accumsan nec.</p>
            </div>
        </div>
        <div id="poly-div"></div>
    </div>
</div>
<!--    Our Team Section-->
<div class="container mt-4" id="ot">
    <div class="at-section">
        <div class="at-section__title">OUR TEAM</div>
        <div class="at-grid" id="first-members-container"></div>
        <div class="at-grid" id="second-members-container"></div>
    </div>
</div>
<!--Achievements Section-->
 <div class="container-md mt-5" id="AC">
    <h2 class="sections-heading">Achievements</h2>
    <hr>
    <div class="row align-items-center">
        <div class="col-12 col-md-4 d-flex flex-column align-items-center justify-content-center">
            <i class="fas fa-trophy achievements-icon" ></i>
            <p class="text-center achievements-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur justo turpis, interdum dignissim tortor non, vestibulum iaculis justo.</p>
        </div>
        <div class="col-12 col-md-4 d-flex flex-column align-items-center justify-content-center">
            <i class="fas fa-school achievements-icon"></i>
            <p class="text-center achievements-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur justo turpis, interdum dignissim tortor non, vestibulum iaculis justo.</p>
        </div>
        <div class="col-12 col-md-4 d-flex flex-column align-items-center justify-content-center">
            <i class="fas fa-chalkboard-teacher achievements-icon"></i>
            <p class="text-center achievements-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur justo turpis, interdum dignissim tortor non, vestibulum iaculis justo.</p>
        </div>
    </div>
</div>
<!--Join Us Section-->
    <div class="container-md mt-5" id="JU">
        <hr>
        <div class="row align-items-center justify-content-center">
            <div class="col-12 col-md-8">
                <h2>Would you like to become a part of SAPA ?</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur justo turpis, interdum dignissim tortor non, vestibulum iaculis justo.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur justo turpis, interdum dignissim tortor non, vestibulum iaculis justo.</p>
                <button class="buttons" onclick="window.location.href = 'register.php'">Join Us</button>
            </div>
            <div class="col-12 col-md-4 d-flex justify-content-center">
                <img class="img-fluid" src="assets/img/logo.jpg" alt="logo">
            </div>
        </div>
    </div>
<!--FOOTER-->
<?php include "assets/php/visitorFooter.php"; ?>
<!--Member Template-->
<template class="member-template">
    <div class="at-column">
        <div class="at-user">
            <div class="at-user__avatar"><img class="member-image" src=""/></div>
            <div class="at-user__name member-name"></div>
            <div class="at-user__title member-title"></div>
            <ul class="at-social">
                <li class="at-social__item"><a class="member-facebook" href="">
                        <svg viewBox="0 0 24 24" width="18" height="18" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14 9h3l-.375 3H14v9h-3.89v-9H8V9h2.11V6.984c0-1.312.327-2.304.984-2.976C11.75 3.336 12.844 3 14.375 3H17v3h-1.594c-.594 0-.976.094-1.148.281-.172.188-.258.5-.258.938V9z" fill-rule="evenodd"></path>
                        </svg></a></li>
                <li class="at-social__item"><a class="member-twitter" href="">
                        <svg viewBox="0 0 24 24" width="18" height="18" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20.875 7.5v.563c0 3.28-1.18 6.257-3.54 8.93C14.978 19.663 11.845 21 7.938 21c-2.5 0-4.812-.687-6.937-2.063.5.063.86.094 1.078.094 2.094 0 3.969-.656 5.625-1.968a4.563 4.563 0 0 1-2.625-.915 4.294 4.294 0 0 1-1.594-2.226c.375.062.657.094.844.094.313 0 .719-.063 1.219-.188-1.031-.219-1.899-.742-2.602-1.57a4.32 4.32 0 0 1-1.054-2.883c.687.328 1.375.516 2.062.516C2.61 9.016 1.938 7.75 1.938 6.094c0-.782.203-1.531.609-2.25 2.406 2.969 5.515 4.547 9.328 4.734-.063-.219-.094-.562-.094-1.031 0-1.281.438-2.36 1.313-3.234C13.969 3.437 15.047 3 16.328 3s2.375.484 3.281 1.453c.938-.156 1.907-.531 2.907-1.125-.313 1.094-.985 1.938-2.016 2.531.969-.093 1.844-.328 2.625-.703-.563.875-1.312 1.656-2.25 2.344z" fill-rule="evenodd"></path>
                        </svg></a></li>
                <li class="at-social__item"><a class="member-linkedin" href="">
                        <svg viewBox="0 0 24 24" width="18" height="18" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.547 3c.406 0 .75.133 1.031.398.281.266.422.602.422 1.008v15.047c0 .406-.14.766-.422 1.078a1.335 1.335 0 0 1-1.031.469h-15c-.406 0-.766-.156-1.078-.469C3.156 20.22 3 19.86 3 19.453V4.406c0-.406.148-.742.445-1.008C3.742 3.133 4.11 3 4.547 3h15zM8.578 18V9.984H6V18h2.578zM7.36 8.766c.407 0 .743-.133 1.008-.399a1.31 1.31 0 0 0 .399-.96c0-.407-.125-.743-.375-1.009C8.14 6.133 7.813 6 7.406 6c-.406 0-.742.133-1.008.398C6.133 6.664 6 7 6 7.406c0 .375.125.696.375.961.25.266.578.399.984.399zM18 18v-4.688c0-1.156-.273-2.03-.82-2.624-.547-.594-1.258-.891-2.133-.891-.938 0-1.719.437-2.344 1.312V9.984h-2.578V18h2.578v-4.547c0-.312.031-.531.094-.656.25-.625.687-.938 1.312-.938.875 0 1.313.578 1.313 1.735V18H18z" fill-rule="evenodd"></path>
                        </svg></a></li>
            </ul>
        </div>
    </div>
</template>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="assets/js/main.js"></script>
</body>
</html>