<?php


class User
{
    public $id;
    public $username;
    public $password = "";
    public $isAdmin;
    public $canViewMembers;
    public $canEditMembers;
    public $canAddAnnouncements;
    public $canAddEvents;
    public $creationTime;
}