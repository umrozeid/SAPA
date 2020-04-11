<?php


class eventsControl
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

    public function loadEvents():bool
    {
        $sql = "SELECT * FROM events ORDER BY id";
        $stmt = $this->connection->prepare($sql);
        if($stmt->execute())
        {
            $result = $stmt->get_result();
            $result = $result->fetch_all();
            $data = array();
            foreach ($result as $row)
            {
                $data[] = array(
                    'id'   => $row[0],
                    'title'   => $row[1],
                    'start'   => $row[2],
                    'end'   => $row[3]
                );
            }
            echo json_encode($data);
            return true;
        }
        return false;
    }

    public function addEvent($title, $start, $end):bool
    {
        $sql = 'insert into events (title, start_event, end_event) values (?,?,?)';
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("sss", $title, $start, $end);
        return $stmt->execute();
    }

    public function updateEvent($id, $title, $start, $end):bool
    {
        $sql = 'update events set title = ?, start_event = ?, end_event = ? where id = ?';
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("sssi",$title, $start, $end, $id);
        return $stmt->execute();
    }

    public function deleteEvent($id):bool
    {
        $sql = 'delete from events where id = ?';
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function getEvent($id):bool
    {
        $sql = 'select * from events where id = ?';
        $stmt =$this->connection->prepare($sql);
        $stmt->bind_param('i',$id);
        if($stmt->execute()){
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $event =  array(
                'id'   => $row['id'],
                'title'   => $row["title"],
                'start'   => $row["start_event"],
                'end'   => $row["end_event"]
            );
            echo json_encode($event);
            return true;
        }
        return false;
    }
}