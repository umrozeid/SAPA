<?php declare(strict_types=1);
include_once 'usersControl.php';
include_once 'membersControl.php';
$memberClass = new MembersControl();
$usersClass = new UsersControl();
//$memberClass->addMember("ABED","sda@gmail.com","dasd","dsad","dad","dad","dasda","dasd",0);
//$memberClass->editMember(2,"ABED","sda@gmail.com","dasd","dsad","dad","dad","dasda","dasd",1);
//$memberClass->deleteMember(2);
echo json_encode($memberClass->getMembers());
//$usersClass = new UsersControl();
//echo json_encode($usersClass->getUsers());
//if($usersClass->addUser("amr","111",1,0,0,1)){
//    echo "success";
//}else {
//    echo "false";
//}
////if($usersClass->deleteUser(5)){
//    echo "success";
//}else {
//    echo "false";
//}
//if($usersClass->isUserAuthenticated("sapaadmin","UmroZeid1")){
//    echo "success";
//}else {
//    echo "false";
//}
//$usersClass->addUser("sapaadmin","UmroZeid1",1,1,1,1,1);
$usersClass->logOut();