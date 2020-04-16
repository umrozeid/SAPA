<?php
$connection = new mysqli('localhost', 'root', 'TalaHethnawi1', 'sapa');
if(!empty($_POST['action']) && $_POST['action'] == 'getGraphInfo') {
    if (empty($_POST['faculty'])){
        $sql = 'SELECT concat(monthname(creationTime), " ", year(creationTime)) as "date",SUM(isApproved) as "sum" from members WHERE creationTime > DATE_SUB(DATE_FORMAT(now(),"%Y-%m-01"), INTERVAL 12 MONTH) GROUP BY year(creationTime),monthname(creationTime) HAVING SUM(isApproved) > 0 ORDER BY year(creationTime)  , month(creationTime) ';
        $stmt = $connection->prepare($sql);
    }
    else{
        $sql = 'SELECT concat(monthname(creationTime), " ", year(creationTime)) as "date",SUM(isApproved) as "sum" from members WHERE creationTime > DATE_SUB(DATE_FORMAT(now(),"%Y-%m-01"), INTERVAL 12 MONTH) AND faculty = ? GROUP BY year(creationTime),monthname(creationTime) HAVING SUM(isApproved) > 0 ORDER BY year(creationTime)  , month(creationTime) ';
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("s", $_POST['faculty']);
    }
    $stmt->execute();
    $result = $stmt->get_result()->fetch_all();
    echo json_encode($result);
    $connection->close();
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>S.A.P.A</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    <style>
        body{
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
    </style>
</head>

<body>

<div class="container flex-grow-1 d-flex flex-column justify-content-center mt-5">
    <form method="POST" id="facultyForm">
        <div class="form-group">
            <label for="faculty">Select Faculty</label>
            <select class="form-control" id="faculty" name="faculty" form="facultyForm">
                <option value=''>All</option>
                <?php
                $sql = 'SELECT distinct faculty from members WHERE creationTime > DATE_SUB(DATE_FORMAT(now(),"%Y-%m-01"), INTERVAL 12 MONTH) AND isApproved = 1 order by faculty';
                $stmt = $connection->prepare($sql);
                $stmt->execute();
                $result = $stmt->get_result();
                while($row = $result->fetch_assoc()) {
                    echo '<option value="'.$row["faculty"].'">'.$row["faculty"].'</option>';
                }
                ?>
            </select>
        </div>
    </form>
    <canvas id="membersChart"></canvas>
</div>

<script>
    $(document).ready(function(){
        let membersChart = null;
        let formatData = function(data){
            let membersCount = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
            let monthsArray = [];
            let monthsNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
            let date = new Date();
            for(let i = 0; i < 13; i++){
                monthsArray.unshift(monthsNames[date.getMonth()] + " " + date.getFullYear());
                date.setMonth(date.getMonth() - 1);
            }
            let j = 0;
            for(let i = 0; i < data.length; i++){
                for(let k = j; k < monthsArray.length; k++){
                    if(data[i][0] === monthsArray[k]){
                        membersCount[k] = data[i][1];
                         j = k + 1;
                         break;
                    }
                }
            }
            return([monthsArray, membersCount]);
        };
        let updateGraph = function(faculty){
            if (membersChart != null)
                membersChart.destroy();
            $.ajax({
                method: "POST",
                data:{action: "getGraphInfo", faculty: faculty},
                success: function(data) {
                    data = formatData(JSON.parse(data));
                    let ctx = $("#membersChart").get(0).getContext('2d');
                    membersChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: data[0],
                            datasets: [{
                                label: 'NUMBER OF APPROVED MEMBERS IN THE LAST YEAR PER MONTH',
                                data: data[1],
                                backgroundColor: [
                                    'rgba(61, 61, 61,0.5)',
                                    'rgba(113, 88, 226,0.5)',
                                    'rgba(23, 192, 235,0.5)',
                                    'rgba(103, 230, 220,0.5)',
                                    'rgba(58, 227, 116,0.5)',
                                    'rgba(255, 242, 0,0.5)',
                                    'rgba(255, 159, 26,0.5)',
                                    'rgba(255, 56, 56,0.5)',
                                    'rgba(255, 184, 184,0.5)',
                                    'rgba(197, 108, 240,0.5)',
                                    'rgba(61, 61, 61,0.5)',
                                    'rgba(113, 88, 226,0.5)',
                                    'rgba(23, 192, 235,0.5)'
                                ],
                                borderColor: [
                                    'rgba(61, 61, 61,1.0)',
                                    'rgba(113, 88, 226,1.0)',
                                    'rgba(23, 192, 235,1.0)',
                                    'rgba(103, 230, 220,1.0)',
                                    'rgba(58, 227, 116,1.0)',
                                    'rgba(255, 242, 0,1.0)',
                                    'rgba(255, 159, 26,1.0)',
                                    'rgba(255, 56, 56,1.0)',
                                    'rgba(255, 184, 184,1.0)',
                                    'rgba(197, 108, 240,1.0)',
                                    'rgba(61, 61, 61,1.0)',
                                    'rgba(113, 88, 226,1.0)',
                                    'rgba(23, 192, 235,1.0)'
                                ],
                                borderWidth: 2
                            }]
                        }
                    });
                }
            });
        };
        $("#faculty").change(function () {
            updateGraph($(this).val());
        });
        $("#faculty").change();
    });
</script>
</body>
</html>