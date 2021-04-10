<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
    table, th, td {
  border: 1px solid black;
  text-align: center;
  
}

table{
    width: 80%;
    height: 100px;
}

    </style>
</head>
<body>
    
</body>
</html>
<?php 
//index.php
$connect = mysqli_connect("localhost", "root", "", "dbms_project");
$a=$_SESSION["charttable"];
$sql = "SELECT profit_loss,count(*) as count FROM `".$a."` group by profit_loss having profit_loss='P' OR profit_loss='L'";
$result = mysqli_query($connect,$sql);
echo "<h2 align='center'>Profit Loss Status</h2><table >
            <tr>
            <td><b>Profit or Loss</b></td>
            <td><b>Count</b></td>
            </tr>";
            while ($row = mysqli_fetch_array($result)){
                
                echo "<tr>";
                if ($row['profit_loss']=="P"){
                    $row['profit_loss']="Profit";
                   
                }
                else{
                    $row['profit_loss']="Loss";
                }
              echo "<td>" .$row['count']  . "</td>";
              echo "<td>" . $row['profit_loss'] . "</td>";
              
              echo "</tr>";
            }
            echo "</table>";

$sql1 = "SELECT DATEDIFF( CURRENT_DATE,max(date_of_transaction)) as datediff,max(date_of_transaction) as lastday from `".$a."`";
$result1 = mysqli_query($connect,$sql1);

while ($row1 = mysqli_fetch_array($result1)){
    echo "<br><br><br><h4>";
    echo "<b>Days of inactivity:</b>  ".$row1['datediff'];
    echo "<br><br>";
    echo "<b>Last date of transaction:</b>  ".$row1['lastday'];
    echo "</h4>";
}
?>
