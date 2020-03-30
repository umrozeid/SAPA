<?php
include_once 'databaseConnection.php';
include_once 'usersControl.php';
session_start();
if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1){
    $usersControl = new UsersControl();
    if(!empty($_POST['action']) && $_POST['action'] == 'getUsers') {
        $usersControl->getUsers();
    }
    if(!empty($_POST['action']) && $_POST['action'] == 'addUser') {
        $usersControl->addUser($_POST["username"], $_POST["password"], $_POST["isAdmin"], $_POST["canViewMembers"], $_POST["canEditMembers"], $_POST["canAddAnnouncements"], $_POST["canAddEvents"]);
    }
    if(!empty($_POST['action']) && $_POST['action'] == 'getUser') {
        $usersControl->getUser($_POST["id"]);
    }
    if(!empty($_POST['action']) && $_POST['action'] == 'updateUser') {
        $usersControl->updateUser($_POST["id"],$_POST["username"], $_POST["password"], $_POST["isAdmin"], $_POST["canViewMembers"], $_POST["canEditMembers"], $_POST["canAddAnnouncements"], $_POST["canAddEvents"]);
    }
    if(!empty($_POST['action']) && $_POST['action'] == 'deleteUser') {
        $usersControl->deleteUser($_POST["id"]);
    }
}else{
    die("Not Authorized");
}

