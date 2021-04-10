<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbms_project";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$sql = 	"Select * from user_details";
$result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {
        //$sql2="Create table`".$row['secure_key']."`(company_name varchar(200),quantity int not null,byprice int not null,api varchar(500),primary key(company_name))";
        //$sql2="alter table `".$row['secure_key']."` add buy_quantity int(11),add sell_quantity int(11),add date_of_transaction date";
        $sql2="alter table `".$row['secure_key']."` add profit_loss varchar(1)";
        //$sql2="ALTER TABLE `".$row['secure_key']."` ALTER buy_quantity set DEFAULT 0 ";
        $result2=mysqli_query($conn, $sql2);

}

?>