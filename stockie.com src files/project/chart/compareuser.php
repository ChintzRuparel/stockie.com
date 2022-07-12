<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>comaprison</title>
<style>
    table, th, td {
  border: 1px solid black;
  text-align: center;
 
  
}
th,td{
    padding-top: 10px;
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
echo '<a href="logout.php"><img src="https://cdn2.iconfinder.com/data/icons/android-12/512/logout_signout-512.png" alt="" id="icon" style=" height: 50px;width: 50px;margin: 10px; position:absolute;right:10px" title="Logout"></a><br><br><br>';
$connect = mysqli_connect("localhost", "root", "", "dbms_project");
error_reporting(0);
$sql = "SELECT * FROM user_details";
$result = mysqli_query($connect,$sql);
echo"<center>";
echo "<form action='' method='POST'>";
echo "<select name='username1' id='username1'> <option value='value' selected>Select user</option>";
while ($row = mysqli_fetch_array($result)) {
    echo "<option value='" . $row['secure_key'] ."'>" . $row['Name'] ."</option>";
}
echo "</select><br><br>";
$sql1 = "SELECT * FROM user_details";
$result1 = mysqli_query($connect,$sql1);
echo"<center>";
echo "<select name='username2' id='username2'> <option value='value' selected>Select user</option>";
while ($row1 = mysqli_fetch_array($result1)) {
    echo "<option value='" . $row1['secure_key']."'>" . $row1['Name'] ."</option>";
}
echo "</select><br><br><input type='submit' value='SUBMIT' id='submitbtn1' name='submitbtn1'></form><br><br></center>";

if(isset($_POST['submitbtn1'])){
    $secure_key1= $_POST['username1'];
    $secure_key2= $_POST['username2'];
    
    $sql2 = "(Select a.company_name as company1,a.byprice as byprice1,b.company_name as company2,b.byprice as byprice2 from `".$secure_key1."` as a left outer join `".$secure_key2."` as b on a.company_name=b.company_name) union (Select a.company_name as company1,a.byprice as byprice1,b.company_name as company2,b.byprice as byprice2 from `".$secure_key1."` as a right outer join `".$secure_key2."` as b on a.company_name=b.company_name)";
    $result2 = mysqli_query($connect,$sql2);
    $totalrows = mysqli_num_rows($result2);
    if ($totalrows>0){
    echo "<table border='4' class='stats' cellspacing='0'>
            <tr>
            <td class='hed' colspan='8'>COMAPRISON TABLE </td>
              </tr>
            <tr>
            <th>Company 1</th>
            <th>buyprice 1</th>
            <th>company 2</th>
            <th>buyprice 2</th>
            </tr>";
            while ($row2 = mysqli_fetch_array($result2)){
                
                echo "<tr>";
                if (is_null($row2['company2'])){
                    $row2['company2']="-";
                    $row2['byprice2']="-";
                }
                if (is_null($row2['company1'])){
                    $row2['company1']="-";
                    $row2['byprice1']="-";
                }
               

              echo "<td>" .$row2['company1']  . "</td>";
              echo "<td>" . $row2['byprice1'] . "</td>";
              echo "<td>" .$row2['company2']  . "</td>";
              echo "<td>" . $row2['byprice2'] . "</td>";
              echo "</tr>";
            }
            echo "</table>";
        }
        else{
            echo "Both user have not bought any stocks";
        }
    }
?>