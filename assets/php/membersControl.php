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

    public function getMemberRequests(){
        $membersArray = array();
        $sql = 'select * from members where isApproved = 0 ';
        $stmt = $this->connection->prepare($sql);
        $recordsTotal = 0;
        $recordsFiltered = 0;
        if ($stmt->execute()){
            $result = $stmt->get_result();
            $recordsTotal =$result->num_rows;
            if (!empty($_POST["search"]["value"])){
                $sql .= 'AND (name LIKE "%'.$_POST["search"]["value"].'%" ';
                $sql .= ' OR email LIKE "%'.$_POST["search"]["value"].'%" ';
                $sql .= ' OR faculty LIKE "%'.$_POST["search"]["value"].'%" ';
                $sql .= ' OR program LIKE "%'.$_POST["search"]["value"].'%" ';
                $sql .= ' OR universityID LIKE "%'.$_POST["search"]["value"].'%" ';
                $sql .= ' OR address LIKE "%'.$_POST["search"]["value"].'%" ';
                $sql .= ' OR facebook LIKE "%'.$_POST["search"]["value"].'%" ';
                $sql .= ' OR phoneNumber LIKE "%'.$_POST["search"]["value"].'%" ';
                $sql .= ' OR creationTime LIKE "%'.$_POST["search"]["value"].'%") ';
            }
            if (!empty($_POST["order"])){
                $colunmIndex = $_POST['order']['0']['column'];
                $sql .= 'order by '.$_POST["columns"][$colunmIndex]["name"].' '.$_POST['order']['0']['dir'].' ';
            } else {
                $sql .= 'order by creationTime DESC ';
            }
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            $recordsFiltered = $result->num_rows;
            if ($_POST["length"] != -1){
                $sql .= 'limit ' . $_POST['start'] . ', ' . $_POST['length'];
            }
            $driver = new mysqli_driver();
            $driver->report_mode  = MYSQLI_REPORT_ERROR;
            try {
                $stmt = $this->connection->prepare($sql);
            } catch (mysqli_sql_exception $e){
                echo json_encode($e->__toString());
            }
            $stmt = $this->connection->prepare($sql);
            if ($stmt->execute()){
                $result = $stmt->get_result();
                if ($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $member = array();
                        $member[] = $row['id'];
                        $member[] = $row['name'];
                        $member[] = $row['email'];
                        $member[] = $row['faculty'];
                        $member[] = $row['program'];
                        $member[] = $row['universityID'];
                        $member[] = $row['address'];
                        $member[] = $row['facebook'];
                        $member[] = $row['phoneNumber'];
                        $member[] = $row['isApproved'];
                        $member[] = $row['creationTime'];
                        $member[] = '<button type="button" name="approve" data-row-id="'.$row['id'].'" class="approve btn btn-primary btn-sm">Approve</button>';
                        $membersArray[] = $member;
                    }
                }
            }
        }
        $stmt->close();
        $output =array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $recordsTotal,
            "recordsFiltered" => $recordsFiltered,
            "data" => $membersArray
        );
        echo json_encode($output);
    }

    public function approveMember($memberID):bool
    {
        $sql = 'update members set isApproved = 1 where  id = ?';
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i",$memberID);
        if($stmt->execute()){
            return true;
        }else {
            return false;
        }
    }

    public function getCurrentMembers(){
        $membersArray = array();
        $sql = 'select * from members where isApproved = 1 ';
        $stmt = $this->connection->prepare($sql);
        $recordsTotal = 0;
        $recordsFiltered = 0;
        if ($stmt->execute()){
            $result = $stmt->get_result();
            $recordsTotal =$result->num_rows;
            if (!empty($_POST["search"]["value"])){
                $sql .= 'AND (name LIKE "%'.$_POST["search"]["value"].'%" ';
                $sql .= ' OR email LIKE "%'.$_POST["search"]["value"].'%" ';
                $sql .= ' OR faculty LIKE "%'.$_POST["search"]["value"].'%" ';
                $sql .= ' OR program LIKE "%'.$_POST["search"]["value"].'%" ';
                $sql .= ' OR universityID LIKE "%'.$_POST["search"]["value"].'%" ';
                $sql .= ' OR address LIKE "%'.$_POST["search"]["value"].'%" ';
                $sql .= ' OR facebook LIKE "%'.$_POST["search"]["value"].'%" ';
                $sql .= ' OR phoneNumber LIKE "%'.$_POST["search"]["value"].'%" ';
                $sql .= ' OR creationTime LIKE "%'.$_POST["search"]["value"].'%") ';
            }
            if (!empty($_POST["order"])){
                $colunmIndex = $_POST['order']['0']['column'];
                $sql .= 'order by '.$_POST["columns"][$colunmIndex]["name"].' '.$_POST['order']['0']['dir'].' ';
            } else {
                $sql .= 'order by creationTime DESC ';
            }
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            $recordsFiltered = $result->num_rows;
            if ($_POST["length"] != -1){
                $sql .= 'limit ' . $_POST['start'] . ', ' . $_POST['length'];
            }
            $driver = new mysqli_driver();
            $driver->report_mode  = MYSQLI_REPORT_ERROR;
            try {
                $stmt = $this->connection->prepare($sql);
            } catch (mysqli_sql_exception $e){
                echo json_encode($e->__toString());
            }
            $stmt = $this->connection->prepare($sql);
            if ($stmt->execute()){
                $result = $stmt->get_result();
                if ($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $member = array();
                        $member[] = $row['id'];
                        $member[] = $row['name'];
                        $member[] = $row['email'];
                        $member[] = $row['faculty'];
                        $member[] = $row['program'];
                        $member[] = $row['universityID'];
                        $member[] = $row['address'];
                        $member[] = $row['facebook'];
                        $member[] = $row['phoneNumber'];
                        $member[] = $row['isApproved'];
                        $member[] = $row['creationTime'];
                        if(isset($_SESSION["canEditMembers"]) && $_SESSION["canEditMembers"] == 1){
                            $member[] = '<button type="button" name="update" data-row-id="'.$row['id'].'" class="update btn btn-warning btn-sm">Update</button>';
                            $member[] = '<button type="button" name="delete" data-row-id="'.$row['id'].'" class="delete btn btn-danger btn-sm">Delete</button>';
                        }else{
                            $member[] = "";
                            $member[] = "";
                        }
                        $membersArray[] = $member;
                    }
                }
            }
        }
        $stmt->close();
        $output =array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $recordsTotal,
            "recordsFiltered" => $recordsFiltered,
            "data" => $membersArray
        );
        echo json_encode($output);
    }

    public function addMember($name, $email, $faculty, $program, $universityID, $address, $facebook, $phoneNumber, $isApproved):bool
    {
        /*$sql = 'select email from members where email = ?';
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
        return false;*/
        $sql = 'insert into members(name, email, faculty, program, universityID, address, facebook, phoneNumber, isApproved) values (?,?,?,?,?,?,?,?,?)';
        $stmt = $this->connection->prepare(($sql));
        $stmt->bind_param("ssssssssi",$name,$email,$faculty,$program,$universityID,$address,$facebook,$phoneNumber,$isApproved);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function getMember($memberID)
    {
        $sql = 'select * from members where id = ?';
        $stmt =$this->connection->prepare($sql);
        $stmt->bind_param('i',$memberID);
        $stmt->execute();
        $result = $stmt->get_result();
        $member = $result->fetch_assoc();
        echo json_encode($member);
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
}