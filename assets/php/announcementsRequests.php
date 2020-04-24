<?php
include_once 'announcementsControl.php';
session_start();
$announcementsControl = new AnnouncementsControl();
if (isset($_SESSION['canAddAnnouncements']) && $_SESSION['canAddAnnouncements'] == 1) {
    if (!empty($_POST['action']) && $_POST['action'] == 'getAnnouncements') {
        $announcementsControl->getAnnouncementsFotDataTable();
    } elseif (!empty($_POST['action']) && $_POST['action'] == 'addAnnouncement') {
        $announcementsControl->addAnnouncement($_POST["url"], $_FILES["image"]);
    } elseif (!empty($_POST['action']) && $_POST['action'] == 'deleteAnnouncement') {
        $announcementsControl->deleteAnnouncement($_POST["id"]);
    } else {
        $announcementsControl->getAnnouncements();
    }
} else {
    $announcementsControl->getAnnouncements();
}
