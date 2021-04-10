<?php
include("connection.php");
session_start();
$a=$_SESSION["table"];
echo $a;
$conn = mysqli_connect($servername, $username, $password, $dbname);
$sql = 	"Select * from `".$a."`";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)) {
    echo $row['api'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <div class="tradingview-widget-copyright"><a href="https://in.tradingview.com/symbols/EURUSD/?exchange=FX" rel="noopener" target="_blank"><span class="blue-text">EURUSD Rates</span></a> by TradingView</div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-single-quote.js" async>
  {
  "symbol": "<?php echo $row['api'];?>",
  "width": 350,
  "colorTheme": "light",
  "isTransparent": false,
  "locale": "in"
}
  </script>
</div>
<?php }?>
<!-- TradingView Widget END -->
</body>
</html>

