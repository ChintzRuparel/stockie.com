<?php 
//index.php
$connect = mysqli_connect("localhost", "root", "", "dbms_project");
$a=$_SESSION["charttable"];
$query = "SELECT * FROM `".$a."`";
$result = mysqli_query($connect, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{ COMPANY:'".$row["company_name"]."', QUANTITY:".$row["quantity"].", SELL_QUANTITY:".$row["sell_quantity"].", BUY_QUANTITY:".$row["buy_quantity"]."}, ";
}
$chart_data = substr($chart_data, 0, -2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  
</head>
<body>
<h2 align="center">Quantity chart</h2>
<div id="chart1"></div>
<div id="donut-example"></div>
</body>
</html>
<script>
Morris.Bar({
 element : 'chart1',
 data:[<?php echo $chart_data; ?>],
 xkey:'COMPANY',
 ykeys:['QUANTITY','SELL_QUANTITY','BUY_QUANTITY'],
 labels:['QUANTITY','SELL_QUANTITY','BUY_QUANTITY'],
 hideHover:'auto',
 stacked:true
});
</script>