<?php

include_once 'databaseConnection.php';

class AnnouncementsControl
{

    private $connection;

    public function __construct()
    {
        $this->connection = (new DatabaseConnection())->getConnection();
    }

    public function addAnnouncement($url, $imageArr): bool
    {
        $imageName = basename($imageArr["name"]);
        $extension = pathinfo($imageName)['extension'];
        $imageName = uniqid("announcementImage") . "." . $extension;
        $target = "../img/announcementsImages/" . $imageName;
        if (move_uploaded_file($imageArr["tmp_name"], $target)) {
            $sql = 'insert into announcements(url, imageName) values (?,?)';
            $stmt = $this->connection->prepare(($sql));
            $stmt->bind_param("ss", $url, $imageName);
            return $stmt->execute();
        } else {
            return false;
        }
    }


    public function deleteAnnouncement($id): bool
    {
        $sql = "select * from announcements where id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $announcement = $result->fetch_assoc();
            $imageName = $announcement["imageName"];
            $target = "../img/announcementsImages/" . basename($imageName);
            if (unlink($target)) {
                $sql = "delete from announcements where id = ?";
                $stmt = $this->connection->prepare($sql);
                $stmt->bind_param("i", $id);
                return $stmt->execute();
            } else {
                return false;
            }
        }
        return false;
    }

    public function getAnnouncementsFotDataTable()
    {
        $announcementsArray = array();
        $sql = 'select * from announcements ';
        $stmt = $this->connection->prepare($sql);
        $recordsTotal = 0;
        $recordsFiltered = 0;
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $recordsTotal = $result->num_rows;
            if (!empty($_POST["search"]["value"])) {
                $sql .= 'where(url LIKE "%' . $_POST["search"]["value"] . '%" ';
                $sql .= ' OR creationTime LIKE "%' . $_POST["search"]["value"] . '%") ';
            }
            if (!empty($_POST["order"])) {
                $colunmIndex = $_POST['order']['0']['column'];
                $sql .= 'order by ' . $_POST["columns"][$colunmIndex]["name"] . ' ' . $_POST['order']['0']['dir'] . ' ';
            } else {
                $sql .= 'order by creationTime desc ';
            }
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            $recordsFiltered = $result->num_rows;
            if ($_POST["length"] != -1) {
                $sql .= 'limit ' . $_POST['start'] . ', ' . $_POST['length'];
            }
            $stmt = $this->connection->prepare($sql);
            if ($stmt->execute()) {
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $announcement = array();
                        $announcement[] = $row['id'];
                        $announcement[] = '<a href="' . $row['url'] . '" target="_blank">Announcement Link</a>';
                        $imageLink = "assets/img/announcementsImages/" . $row["imageName"];
                        $announcement[] = '<a target="_blank" href="' . $imageLink . '"><img src="' . $imageLink . '" width="100%"></a>';
                        $announcement[] = $row['creationTime'];
                        $announcement[] = '<button type="button" name="delete" data-row-id="' . $row['id'] . '" class="delete btn btn-danger btn-sm">Delete</button>';
                        $announcementsArray[] = $announcement;
                    }
                }
            }
        }
        $stmt->close();
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $recordsTotal,
            "recordsFiltered" => $recordsFiltered,
            "data" => $announcementsArray
        );
        echo json_encode($output);
    }

    public function getAnnouncements()
    {
        $sql = "SELECT * FROM announcements order by creationTime desc";
        $stmt = $this->connection->prepare($sql);
        if ($stmt->execute()) {
            $result = $stmt->get_result()->fetch_all();
            $data = array();
            foreach ($result as $row) {
                $data[] = array(
                    'url' => $row[1],
                    'imageName' => $row[2]
                );
            }
            echo json_encode($data);
            return true;
        }
        return false;
    }
}