<?php 
//index.php
$connect = mysqli_connect("localhost", "root", "", "dbms_project");
$a=$_SESSION["charttable"];
$sub_query = "select * from user_account where secure_key='$a'";
$result = mysqli_query($connect, $sub_query);
$data = array();
while($row = mysqli_fetch_array($result))
{
  $difference=$row["limit_available"]-$row["balance"];
 $data[] = array(
  'label'  => "INITIAL BALANCE",
  'value'  => $row["balance"]
 );
 $data[] = array(
    'label'  => "VALUE OF PURCHASE",
    'value'  => $row["value_of_purchase"]
   );
   $data[] = array(
    'label'  => "LIMIT AVAILABLE",
    'value'  => $row["limit_available"]
   );
   if ($difference<0){
    $data[] = array(
      'label'  => "LOSS",
      'value'  => $difference*(-1)
     );
  }
  else{
    $data[] = array(
      'label'  => "PROFIT",
      'value'  => $difference
     );
  }
}
$data = json_encode($data);
?>
<!DOCTYPE html>
<html>
 <head>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" />  
 </head>
 <body>
   <h2 align="center">Balance chart</h2>
   <div id="chart"></div>
 </body>
</html>

<script>
$(document).ready(function(){
 
 var donut_chart = Morris.Donut({
     element: 'chart',
     data: <?php echo $data; ?>
    });});
</script>

