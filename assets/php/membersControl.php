<?php

include_once 'databaseConnection.php';
include_once 'member.php';
class MembersControl
{

    private $connection;

    public function __construct()
    {
        $this->connection = (new DatabaseConnection())->getConnection();
    }

    function _destruct()
    {
        $this->connection->close();
    }

    public function addMember($name, $email, $faculty, $program, $universityID, $address, $facebook, $phoneNumber, $isApproved):bool
    {
        $sql = 'select email from members where email = ?';
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("s",$email);
        if($stmt->execute()){
            $result = $stmt->get_result();
            //check if email exists
            if($result->num_rows == 0){
                $stmt->close();
                $sql = 'insert into members(name, email, faculty, program, universityID, address, facebook, phoneNumber, isApproved) values (?,?,?,?,?,?,?,?,?)';
                $stmt = $this->connection->prepare(($sql));
                $stmt->bind_param("ssssssssi",$name,$email,$faculty,$program,$universityID,$address,$facebook,$phoneNumber,$isApproved);
                if($stmt->execute()){
                    return true;
                }else{
                    return false;
                }
            }
        }
        $stmt->close();
        return false;
    }

    public function deleteMember($memberID):bool
    {
        $sql = "delete from members where id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i",$memberID);
        if($stmt->execute()){
            return true;
        }else {
            return false;
        }
    }

    public function updateMember($id,$name, $email, $faculty, $program, $universityID, $address, $facebook, $phoneNumber, $isApproved):bool
    {
        $sql = 'select id from members where id = ?';
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i",$id);
        if($stmt->execute()){
            $result = $stmt->get_result();
            //check if id exists
            if($result->num_rows == 1){
                $stmt->close();
                $sql = 'update members set name = ?,email = ?, faculty = ?, program = ?, universityID = ? , address = ?, facebook = ?, phoneNumber = ? , isApproved = ? where  id = ?';
                $stmt = $this->connection->prepare(($sql));
                $stmt->bind_param("ssssssssii",$name,$email,$faculty,$program,$universityID,$address,$facebook,$phoneNumber,$isApproved,$id);
                if($stmt->execute()){
                    return true;
                }else{
                    return false;
                }
            }
        }
        $stmt->close();
        return false;
    }

    public function getMembers()
    {
        $membersArray = array();
        $sql = 'select id, name, email, faculty, program, universityID, address, facebook, phoneNumber, isApproved, creationTime from members';
        $stmt = $this->connection->prepare($sql);
        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $member = new Member();
                    $member->id = $row['id'];
                    $member->name = $row['name'];
                    $member->email = $row['email'];
                    $member->faculty = $row['faculty'];
                    $member->program = $row['program'];
                    $member->universityID = $row['universityID'];
                    $member->address = $row['address'];
                    $member->facebook = $row['facebook'];
                    $member->phoneNumber = $row['phoneNumber'];
                    $member->isApproved = $row['isApproved'];
                    $member->creationTime = $row['creationTime'];
                    $membersArray[] = $member;
                }
            }
        }
        $stmt->close();
        return $membersArray;
    }

}