<?php

include_once 'databaseConnection.php';
class UsersControl
{

    private $connection;

    public function __construct()
    {
        $this->connection = (new DatabaseConnection())->getConnection();
    }

    public function isUserAuthenticated($username,$password):bool
    {
        $username = strtolower($username);
        $sql = 'select id,username,password,isAdmin,canViewMembers,canEditMembers,canAddAnnouncements,canAddEvents from users where username = ?';
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("s",$username);
        if($stmt->execute()){
            $result = $stmt->get_result();
            //check if username exists
            if($result->num_rows == 1){
                $user = $result->fetch_assoc();
                //check if password is right
                if(password_verify($password,$user['password'])){
                    //start session and store date in session variables
                    session_start();
                    $_SESSION['loggedIn'] = true;
                    $_SESSION['username'] = $username;
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['isAdmin'] = $user['isAdmin'];
                    $_SESSION['canViewMembers'] = $user['canViewMembers'];
                    $_SESSION['canEditMembers'] = $user['canEditMembers'];
                    $_SESSION['canAddAnnouncements'] = $user['canAddAnnouncements'];
                    $_SESSION['canAddEvents'] = $user['canAddEvents'] ;
                    $stmt->close();
                    return true;
                }
            }
        }
        $stmt->close();
        return false;
    }

    public function addUser($username,$password,$isAdmin,$canViewMembers,$canEditMembers,$canAddAnnouncements,$canAddEvents):bool
    {
        $username = strtolower($username);
        $sql = 'select username from users where username = ?';
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("s",$username);
        if($stmt->execute()){
            $result = $stmt->get_result();
            //check if username exists
            if($result->num_rows == 0){
                $stmt->close();
                $sql = 'insert into users(username, password, isAdmin, canViewMembers, canEditMembers, canAddAnnouncements, canAddEvents) values (?,?,?,?,?,?,?)';
                $stmt = $this->connection->prepare(($sql));
                $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
                $stmt->bind_param("ssiiiii",$username,$hashedPassword,$isAdmin,$canViewMembers,$canEditMembers,$canAddAnnouncements,$canAddEvents);
                return $stmt->execute();
            }
        }
        $stmt->close();
        return false;
    }

    public function updateUser($id,$username,$password,$isAdmin,$canViewMembers,$canEditMembers,$canAddAnnouncements,$canAddEvents):bool
    {
        $sql = 'select id from users where id = ?';
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i",$id);
        if($stmt->execute()){
            $result = $stmt->get_result();
            //check if id exists
            if($result->num_rows == 1){
                $stmt->close();
                if ($password == ""){
                    $sql = 'update users set username = ?, isAdmin = ?, canViewMembers = ?, canEditMembers= ? , canAddAnnouncements = ?, canAddEvents= ?  where  id = ?';
                    $stmt = $this->connection->prepare(($sql));
                    $stmt->bind_param("siiiiii",$username,$isAdmin,$canViewMembers,$canEditMembers,$canAddAnnouncements,$canAddEvents,$id);
                }else{
                    $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
                    $sql = 'update users set username = ?,password = ?, isAdmin = ?, canViewMembers = ?, canEditMembers= ? , canAddAnnouncements = ?, canAddEvents= ?  where  id = ?';
                    $stmt = $this->connection->prepare(($sql));
                    $stmt->bind_param("ssiiiiii",$username,$hashedPassword,$isAdmin,$canViewMembers,$canEditMembers,$canAddAnnouncements,$canAddEvents,$id);
                }
                return $stmt->execute();
            }
        }
        $stmt->close();
        return false;
    }

    public function deleteUser($userID):bool
    {
        session_start();
        if($userID == $_SESSION["id"])
             return false;
        $sql = "delete from users where id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i",$userID);
        return $stmt->execute();
    }

    public function getUsers()
    {
        $usersArray = array();
//        $sql = 'select id, username, isAdmin, canViewMembers, canEditMembers, canAddAnnouncements, canAddEvents, creationTime from users';
        $sql = 'select * from users ';
        $stmt = $this->connection->prepare($sql);
        $recordsTotal = 0;
        $recordsFiltered = 0;
        if ($stmt->execute()){
            $result = $stmt->get_result();
            $recordsTotal =$result->num_rows;
            if (!empty($_POST["search"]["value"])){
                $sql .= 'where(username LIKE "%'.$_POST["search"]["value"].'%" ';
                $sql .= ' OR creationTime LIKE "%'.$_POST["search"]["value"].'%") ';
            }
            if (!empty($_POST["order"])){
                $colunmIndex = $_POST['order']['0']['column'];
                $sql .= 'order by '.$_POST["columns"][$colunmIndex]["name"].' '.$_POST['order']['0']['dir'].' ';
            } else {
                $sql .= 'order by username ';
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
                        $user = array();
                        $user[] = $row['id'];
                        $user[] = $row['username'];
                        $user[] = "********";
                        $user[] = $row['isAdmin'];
                        $user[] = $row['canViewMembers'];
                        $user[] = $row['canEditMembers'];
                        $user[] = $row['canAddAnnouncements'];
                        $user[] = $row['canAddEvents'];
                        $user[] = $row['creationTime'];
                        $user[] = '<button type="button" name="update" data-row-id="'.$row['id'].'" class="update btn btn-warning btn-sm">Update</button>';
                        $user[] = '<button type="button" name="delete" data-row-id="'.$row['id'].'" class="delete btn btn-danger btn-sm">Delete</button>';
                        $usersArray[] = $user;
                    }
                }
            }
        }
        $stmt->close();
        $output =array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $recordsTotal,
            "recordsFiltered" => $recordsFiltered,
            "data" => $usersArray
        );
       echo json_encode($output);
    }
    public function getUser($id){
        $sql = 'select * from users where id = ?';
        $stmt =$this->connection->prepare($sql);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $user["password"] = "********";
        echo json_encode($user);
    }
    public static function logOut()
    {
        session_start();
        $_SESSION = array();
        session_destroy();
        header("location: ../../index.php");
    }
}