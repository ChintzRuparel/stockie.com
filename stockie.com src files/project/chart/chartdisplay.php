

<?php 
//index.php
echo '<a href="logout.php"><img src="https://cdn2.iconfinder.com/data/icons/android-12/512/logout_signout-512.png" alt="" id="icon" style=" height: 50px;width: 50px;margin: 10px; position:absolute;right:10px" title="Logout"></a><br><br><br>';
$connect = mysqli_connect("localhost", "root", "", "dbms_project");
error_reporting(0);
$sql = "SELECT * FROM user_details";
$result = mysqli_query($connect,$sql);
echo"<center>";
echo "<form action='' method='POST'>";
echo "<select name='username' id='username'> <option value='value' selected>Select user</option>";
while ($row = mysqli_fetch_array($result)) {
    echo "<option value='" . $row['secure_key'] ."'>" . $row['Name'] ."</option>";
}
echo "</select><br><br><input type='submit' value='SUBMIT' id='submitbtn1' name='submitbtn1'></form></center>";
if(isset($_POST['submitbtn1'])){
    $secure_key= $_POST['username'];
    $_SESSION["charttable"] = $secure_key;
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANALYSIS</title>
</head>
<body>


<div>
 <?php include('quantitychart.php'); ?>
</div>
<br><br><br><br>
<hr style="height:5px;border-width:0;color:black;background-color:black;width: 85%">
<div class="container" style="display: flex; ">
<div style="width: 50%;"><center>
<br><br><br><br><br><br><br><br>
 <?php include('useranalysis.php'); ?>
 </center></div>
<br><br><br>
<div style="flex-grow: 1;" >
 <?php include('balancechart.php'); ?>
</div>
</div>



</body>
</html>