<?php
include_once 'databaseConnection.php';
include_once 'eventsControl.php';
session_start();
$eventsControl = new eventsControl();
if (isset($_SESSION['canAddEvents'])&&$_SESSION['canAddEvents'] == 1){
    if(!empty($_POST['action'])){
        if($_POST['action'] == 'addEvent') {
            $eventsControl->addEvent($_POST["title"], $_POST["start"], $_POST["end"]);
        }
        if($_POST['action'] == 'updateEvent') {
            $eventsControl->updateEvent($_POST["id"], $_POST["title"], $_POST["start"], $_POST["end"]);
        }
        if($_POST['action'] == 'deleteEvent') {
            $eventsControl->deleteEvent($_POST["id"]);
        }
        if($_POST['action'] == 'getEvent') {
            $eventsControl->getEvent($_POST["id"]);
        }
    }else{
        $eventsControl->loadEvents();
    }
}else{
    $eventsControl->loadEvents();
}

