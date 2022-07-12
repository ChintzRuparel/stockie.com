<?php
include("connection.php");
session_start();
$a=$_SESSION["table"];
$sql = 	"Select * from `".$a."`";
$result = mysqli_query($conn, $sql);
$totalrows = mysqli_num_rows($result);

?>
<!DOCTYPE html>
<html>
<head>
  <title>Stockie.com</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<style type="text/css">
	#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 40%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: rgb(0,255,255);
  color: white;
}

  
* {
  box-sizing: border-box;
}


</style>

</head>
<body>
<a href="logout.php"><img src="https://cdn2.iconfinder.com/data/icons/android-12/512/logout_signout-512.png" alt="" id="icon" style=" height: 50px;width: 50px;margin: 10px; position:absolute;right:10px" title="Logout"></a>
<p><center><img src="https://media2.giphy.com/media/6k9CcAl36voZx7MvF0/giphy.gif ">
    </center></p>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a style="color: black;font-size: 35px;" class="navbar-brand" href="#">Stockie.com</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="buyform.php">Place Order</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="sellform.php">Sell Stock</a>
        </li>
        
		<li class="nav-item">
          <a class="nav-link" href="../trader/PORTFOLIO/sportfolioo.html">Superstar's Portfolio</a>
        </li>
        <li class="nav-item">
    <a class="nav-link" href="../trader/TRADINGOUTLOOKS/blog.html">Trade Outlooks<span class="sr-only">(current)</span></a>
   </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Investopedia
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="../trader/investopedia/courses/courses.html">Courses</a>
          <a class="dropdown-item" href="../trader/investopedia/ebook/ebook.html">Ebook</a>
        </div>
      </li>
   <li class="nav-item">
    <a class="nav-link" href="../trader/reports/reportsdirectory.html">Reports</a>
   </li>
   
        <li class="nav-item">
          <a class="nav-link" href="../trader/abtus/about.html">About Us</a>
        </li>

      </ul>
      
    </div>
  </div>
</nav>

<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <div class="tradingview-widget-copyright"><a href="https://in.tradingview.com" rel="noopener" target="_blank"><span class="blue-text"></span></a> </div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
  {
  "symbols": [
    {
      "description": "SENSEX",
      "proName": "INDEX:SENSEX"
    },
    {
      "description": "Dow Jones",
      "proName": "CURRENCYCOM:US30"
    },
    {
      "description": "S&P500",
      "proName": "CURRENCYCOM:US500"
    },
    {
      "description": "Bovespa",
      "proName": "INDEX:JZY0"
    },
    {
      "description": "DAX",
      "proName": "CURRENCYCOM:DE30"
    },
    {
      "description": "FTSE",
      "proName": "CURRENCYCOM:UK100"
    },
    {
      "description": "CAC",
      "proName": "INDEX:CAC40"
    },
    {
      "description": "FTSE MIB",
      "proName": "INDEX:FTSEMIB"
    },
    {
      "description": "Nikkei 225",
      "proName": "INDEX:NKY"
    },
    {
      "description": "SZSE Component",
      "proName": "SZSE:399106"
    },
    {
      "description": "Hang Seng",
      "proName": "INDEX:HSI"
    },
    {
      "description": "KOSPI",
      "proName": "INDEX:KSIC"
    },
    {
      "description": "KLCI",
      "proName": "INDEX:KLSE"
    },
    {
      "description": "Nasdaq",
      "proName": "NASDAQ:NDX"
    },
    {
      "description": "IBEX",
      "proName": "CURRENCYCOM:SP35"
    },
    {
      "description": "Tadawul All Share",
      "proName": "TADAWUL:MT30"
    }
  ],
  "colorTheme": "light",
  "isTransparent": false,
  "displayMode": "adaptive",
  "locale": "in"
}
  </script>
</div><center>

  <?php
  if ($totalrows >=1){?>
  
  <table  id="customers">
  <tr>
    <th>Company</th>
    <th>Quantity</th>
    <th>Buy Price</th>
    <th>Status</th>
    <th>Last Traded Price</th>
    
  </tr>
  <?php
  while($row = mysqli_fetch_assoc($result)) {
    if ($row['profit_loss']=="P"){
      $row['profit_loss']="Profit";
     
  }
  else if($row['profit_loss']=="L"){
      $row['profit_loss']="Loss";
  }
  else{
    $row['profit_loss']="-";
  }
    $api=str_replace(' ', '', $row['api']);
    
  echo '<tr><td>'.$row['company_name'].'</td>
  <td>'.$row['quantity'].'</td>
  <td>'.$row['byprice'].'</td>
  <td>'.$row['profit_loss'].'</td>
  <td>'?>
  <div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <div class="tradingview-widget-copyright"><a href="https://in.tradingview.com/symbols/EURUSD/?exchange=FX" rel="noopener" target="_blank"></div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-single-quote.js" async>
  {
  "symbol": "<?php echo $api;?>",
  "width": 350,
  "colorTheme": "light",
  "isTransparent": false,
  "locale": "in"
}
  </script>
</div></td>
<?php }}
else
{echo "No Purchases yet!!!! <br>";
  echo "Buy a stock to get the experience";
}?>
<br></table></center>
<center><a href="quiz.php"><img src="https://media0.giphy.com/media/YqukXc3tzSUoL4bgQg/source.gif" alt="" style="width:40%;"></a>
</center></body>
</html>









