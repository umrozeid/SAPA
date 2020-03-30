<?php
include_once 'databaseConnection.php';
include_once 'membersControl.php';
session_start();
if ((isset($_SESSION['canViewMembers'])&&$_SESSION['canViewMembers'] == 1)||(isset($_SESSION['canEditMembers'])&&$_SESSION['canEditMembers'] == 1)){
    $membersControl = new MembersControl();

    if(!empty($_POST['action']) && $_POST['action'] == 'getMemberRequests' && isset($_SESSION['canEditMembers']) && $_SESSION['canEditMembers'] == 1) {
        $membersControl->getMemberRequests();
    }
    if(!empty($_POST['action']) && $_POST['action'] == 'approveMember' && isset($_SESSION['canEditMembers']) && $_SESSION['canEditMembers'] == 1) {
        $membersControl->approveMember($_POST["id"]);
    }
    if(!empty($_POST['action']) && $_POST['action'] == 'getCurrentMembers') {
        $membersControl->getCurrentMembers();
    }
    if(!empty($_POST['action']) && $_POST['action'] == 'addMember' && isset($_SESSION['canEditMembers']) && $_SESSION['canEditMembers'] == 1) {
        $membersControl->addMember($_POST["name"], $_POST["email"], $_POST["faculty"], $_POST["program"], $_POST["universityID"], $_POST["address"], $_POST["facebook"], $_POST["phoneNumber"], 1);
    }
    if(!empty($_POST['action']) && $_POST['action'] == 'getMember' && isset($_SESSION['canEditMembers']) && $_SESSION['canEditMembers'] == 1) {
        $membersControl->getMember($_POST["id"]);
    }
    if(!empty($_POST['action']) && $_POST['action'] == 'updateMember' && isset($_SESSION['canEditMembers']) && $_SESSION['canEditMembers'] == 1) {
        $membersControl->updateMember($_POST["id"], $_POST["name"], $_POST["email"], $_POST["faculty"], $_POST["program"], $_POST["universityID"], $_POST["address"], $_POST["facebook"], $_POST["phoneNumber"], 1);
    }
    if(!empty($_POST['action']) && $_POST['action'] == 'deleteMember' && isset($_SESSION['canEditMembers']) && $_SESSION['canEditMembers'] == 1) {
        $membersControl->deleteMember($_POST["id"]);
    }
}else{
    die("Not Authorized");
}

